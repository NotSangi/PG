<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PersonaController extends Controller
{
    public function index()
    {
        return view("persona.index");
    }

    public function modal()
    {
        return view("layouts.modal");
    }


    public function formulario(){
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                return Redirect::to('form');
            } else if (Auth::user()->hasRole('paciente')) {
                return Redirect::to('form');
            } else if (Auth::user()->hasRole('doctor')) {
                return Redirect::to('form');
            }
        } else {
            return view("layout.login");
        }    
    }

    public function form()
    {
        return view("persona.formulario");    
    } 

    public function derechos()
    {
        return view("persona.derechos");    
    } 

    public function store(Request $request) {}

    public function perfil()
    {
        $user = Auth::user();
        return view("persona.perfil", compact("user"));
    }

    public function actualizar(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->name = $request->get("name");
        $user->last_name = $request->get("last_name");
        $user->document = $request->get("document");
        $user->adress = $request->get("adress");
        $user->email = $request->get("email");
        $user->tel = $request->get("tel");

        $user->update();

        if (Auth::user()->hasRole('admin')) {
            return Redirect::to('adminR');
        } else if (Auth::user()->hasRole('paciente')) {
            return Redirect::to('pacienteR');
        } else if (Auth::user()->hasRole('doctor')) {
            return Redirect::to('doctorR');
        }
    }
    public function show(string $id) {}
    public function edit() {}
    public function update() {}
    public function destroy(string $id) {}
}
