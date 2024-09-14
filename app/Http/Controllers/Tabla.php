<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Tabla extends Controller
{
    public function pacientesView()
    {
        $usuario=User::whereHas('roles', function($query){
            $query->where('name','paciente');
        })->orderBy('id','DESC')->get();
        return view('tablas.pacientes')->with('users', $usuario); 
    }
    public function doctoresView()
    {
        $usuario=User::whereHas('roles', function($query){
            $query->where('name','doctor');
        })->orderBy('id','DESC')->get();
        
        return view('tablas.doctores')->with('users', $usuario); 
    }  
    public function citasPacientes(){

        $usuario=Evento::whereHas('user', function($query){
            $query->where('user_id', Auth::user()->id);
        })->orderBy('id','DESC')->get();

        return view('tablas.citasPacientes')->with('users', $usuario); 
    }

    public function citasDoctores(){

        $usuario=Evento::whereHas('user', function($query){
            $query->where('doctor_id', Auth::user()->id);
        })->orderBy('id','DESC')->get();

        return view('tablas.citasDoctores')->with('users', $usuario); 
    }

    public function citasAdmin(){
        $cita = Evento::all();

        return view('tablas.citasAdmin')->with('citas', $cita);
    }
}
