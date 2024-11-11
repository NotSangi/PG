<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class FormularioController extends Controller
{

    public function index()
    {
        //
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
            || empty($objeto->llamada)
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
                'llamada' => $request->get('llamada'),
                'estado' => 'PENDIENTE',
            ]);


            if (Auth::check()) {
                return Redirect::to('minuevasonrisa');
            }
        }
    }

    public function store(Request $request)
    {
        
    }

    public function eventos(Request $request)
    {
        $user = Auth::user();

        $query = Formulario::query()->with(['user']);

        if ($user->hasRole('doctor')) {
            $query->where('doctor_id', $user->id);
        } elseif ($user->hasRole('paciente')) {
            $query->where('user_id', $user->id);
        } elseif ($user->hasRole('admin') && $request->has('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }

        $citas = $query->get();

        $events = $citas->map(function ($cita) {

            $color = "";
            if ($cita->estado == "ASIGNADA"){
                $color = "#00ff6a";
            } else if ($cita->estado == "CANCELADA") {
                $color = "#f93f3f";
            }

            $doctor = DB::table('users')->where('id', $cita->doctor_id)->first(['name', 'last_name']);

            return [
                'title' => $cita->name . ' ' . $cita->last_name,
                'start' => $cita->fecha,
                'extendedProps' => [
                    'estado' => $cita->estado,
                    'doctor' => $doctor->name . ' ' . $doctor->last_name,
                    'tratamiento' => $cita->tratamiento,
                    'user_id' => $cita->user_id,
                ],
                
                'backgroundColor' => $color,
                'borderColor' => $color,
            ];
        });

        return response()->json($events); 
    }
    public function show(){
        return view("persona.agenda");
    }

    public function edit(string $id)
    {
        //
    }

    public function updateEstado(Request $request){
        
    }
    public function update(Request $request)
    {
        $doctores = $request->input('doctor');
        $estados = $request->input('estado');
        $fechas = $request->input('fecha');

        foreach ($doctores as $cita_id => $doctor_id) {
            if (!empty($doctor_id) || !empty($estados[$cita_id])) {
                // Encontrar la cita
                $cita = Formulario::find($cita_id);

                // Actualizar solo si el doctor o el estado fueron modificados
                if ($cita) {
                    $cita->doctor_id = $doctor_id ?? $cita->doctor_id;
                    $cita->estado = $estados[$cita_id] ?? $cita->estado;
                    $cita->fecha = $fechas[$cita_id] ?? $cita->fecha;
                    $cita->save(); // Guardar los cambios
                }
            }
        }

        return Redirect::to('minuevasonrisa');
    }

    public function destroy(string $id)
    {
        //
    }
}
