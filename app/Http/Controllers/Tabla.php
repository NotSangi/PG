<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Formulario;
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
    public function citas(){

        $citas=Formulario::whereHas('user', function($query){
            $query->where('user_id', Auth::user()->id);
        })->orderBy('id','DESC')->get();

        return view('tablas.citas')->with('citas', $citas); 
    }

    public function citasAdmin(){
        $cita = Formulario::all();

        $usuario=User::whereHas('roles', function($query){
            $query->where('name','doctor');
        })->orderBy('id','DESC')->get();

        return view('tablas.citasAdmin')->with('citas', $cita)->with('doctores', $usuario);
    }
}
