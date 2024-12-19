<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use App\Models\Especialidad;
use App\Models\Formulario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    
    public function index()
    {
        $usuario=User::whereHas('roles', function($query){
            $query->where('name', 'doctor');
        })->get();

        $especialidad=Especialidad::all();

        return view('evento.index', compact('usuario', 'especialidad'));  
    }

    
    public function create()
    {}
 
    public function store(Request $request)
    {
        $bodyWithValidations = $request->validate(Evento::$rules);
        $evento = Evento::create($bodyWithValidations);

        return response()->json($evento);
    }

    public function show(Evento $evento)
    {
        $evento = Evento::all();
        return response()->json($evento);
    }

    
    public function edit($id)
    {
        $evento = Evento::find($id);

        return response()->json($evento);
    }

    public function update(Request $request, Evento $evento)
    {
        request()->validate(Evento::$rules);
        $evento->update($request->all());

        return response()->json($evento);
    }
    
    public function destroy($id)
    {
        $evento= Evento::find($id)->delete();

        return response()->json($evento);
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
            if ($cita->estado == "ASIGNADA") {
                $color = "#00ff6a";
            } else if ($cita->estado == "CANCELADA") {
                $color = "#f93f3f";
            }

            $doctor = DB::table('users')->where('id', $cita->doctor_id)
            ->first(['name', 'last_name']);

            $tratamiento = DB::table('tratamientos')->where('name', $cita->tratamiento)->value('description');

            return [
                'id' => $cita->id,
                'title' => $cita->name . ' ' . $cita->last_name,
                'start' => $cita->fecha,
                'extendedProps' => [
                    'estado' => $cita->estado,
                    'doctor' => $doctor->name . ' ' . $doctor->last_name,
                    'tratamiento' => $tratamiento,
                    'user_id' => $cita->user_id,
                ],

                'backgroundColor' => $color,
                'borderColor' => $color,
            ];
        });

        return response()->json($events);
    }
}
