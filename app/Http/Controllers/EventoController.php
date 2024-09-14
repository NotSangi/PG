<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use App\Models\Especialidad;

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
}
