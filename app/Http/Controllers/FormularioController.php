<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\Tratamientos;
use Illuminate\Http\Request;
use App\Models\Formulario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Documentos;
use App\Models\User;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Mail;

class FormularioController extends Controller
{

    public function index()
    {   

        $tratamiento = Tratamientos::where('estado', 1)->get();
        $document = Documentos::all();

        return view("persona.formulario")->with('documentos', $document)
        ->with('tratamientos', $tratamiento);    
    }
    public function create(Request $request)
    {
        $objeto = (object) $_POST;

        if (
            empty($objeto->tipo_documento)
            || empty($objeto->document)
            || empty($objeto->name)
            || empty($objeto->last_name)
            || empty($objeto->tel)
            || empty($objeto->email)
            || empty($objeto->tratamiento)
            || empty($objeto->prioridad)
        ) {
            return back()->withErrors(['completar_formulario' => 'Debes llenar todo el formulario']);
        } else {

            $fecha_actual = date("Y-m-d H:i:s");

            $form = Formulario::create([
                'user_id' => Auth::user()->id,
                'tipo_documento' => $request->get('tipo_documento'),
                'document' => $request->get('document'),
                'name' => $request->get('name'),
                'last_name' => $request->get('last_name'),
                'tel' => $request->get('tel'),
                'email' => $request->get('email'),
                'tratamiento' => $request->get('tratamiento'),
                'prioridad' => $request->get('prioridad'),
                'estado' => 'PENDIENTE',
            ]);


            if (Auth::check()) {
                sleep(5);
                return Redirect::to('minuevasonrisa');
            }
        }
    }

    public function show()
    {   
        $doctores = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->where('estado', 1)->get(['id', 'name', 'last_name']);

        return view("persona.agenda")->with('doctores', $doctores);
    }

    public function updateEstado(Request $request)
    {

    }
    public function update(Request $request)
    {
        $doctores = $request->input('doctor');
        $estados = $request->input('estado');
        $fechas = $request->input('fecha');

        foreach ($doctores as $cita_id => $doctor_id) {
            $cita = Formulario::find($cita_id);

            if ($cita) {
                $originalEstado = $cita->estado;

                $cita->doctor_id = $doctor_id ?? $cita->doctor_id;
                $cita->estado = $estados[$cita_id] ?? $cita->estado;
                $cita->fecha = $fechas[$cita_id] ?? $cita->fecha;
                $cita->save(); 

                $doc = User::find($cita->doctor_id);
                $tratamiento = Tratamientos::where('name', $cita->tratamiento)->value('description');
                
                if ($cita->estado === 'ASIGNADA' && $originalEstado !== 'ASIGNADA') {
                    Mail::to($cita->email)->send(new ContactEmail($cita, $doc, $tratamiento));
                }
            }
            
        }

        sleep(2);
        return Redirect::to('citasAdmin');

    }

    public function cancel(Request $request)
    {
        $citaId = $request->input('citaId');

        if (empty($citaId)) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }

        $cita = Formulario::find($citaId);

        if (!$cita) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }

        $cita->estado = 'CANCELADA';
        $cita->save();

        return response()->json(['success' => 'Cita cancelada correctamente']);
    }

    public function finalizar(Request $request){
        $citaId = $request->input('citaId');

        if (empty($citaId)) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }

        $cita = Formulario::find($citaId);

        if (!$cita) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }

        $cita->estado = 'COMPLETADA';
        $cita->descripcion = $request->input('descripcion');
        $cita->save();

        return response()->json(['success' => 'Cita finalizada correctamente']);
    }
}
