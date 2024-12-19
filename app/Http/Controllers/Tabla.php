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

        $perPage = 8; // Items per page
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        if(Auth::user()->hasRole('paciente')){
            
            $citas=Formulario::whereHas('user', function($query){
                $query->where('user_id', Auth::user()->id);
            })->orderBy('id','DESC')->offset($offset)->limit($perPage)->get();

            $totalPages = ceil(Formulario::whereHas('user', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->count() / $perPage);

        } else if (Auth::user()->hasRole('doctor')){

            $citas=Formulario::whereHas('user', function($query){
                $query->where('doctor_id', Auth::user()->id);
            })->orderBy('id','DESC')->offset($offset)->limit($perPage)->get();
            
        }
        return view('tablas.citas')
        ->with('citas', $citas)
        ->with('currentPage', $currentPage)
        ->with('totalPages', $totalPages);
    }

    public function citasAdmin(){
        $cita = Formulario::all();

        $usuario=User::whereHas('roles', function($query){
            $query->where('name','doctor');
        })->orderBy('id','DESC')->get();

        return view('tablas.citasAdmin')->with('citas', $cita)->with('doctores', $usuario);
    }
}
