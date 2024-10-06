<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;

class FormularioController extends Controller
{

    public function index()
    {
        //
    }
    public function create(Request $request)
    {
        $objeto = (object) $_POST;

        if(empty($objeto->tipo_documento) 
        || empty($objeto->document) 
        || empty($objeto->name) 
        || empty($objeto->last_name) 
        || empty($objeto->tel)
        || empty($objeto->email)
        || empty($objeto->tratamiento)
        || empty($objeto->llamada)){
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
                'fecha' => $fecha_actual,
            ]);

            

            if (Auth::check()) {
                if (Auth::user()->hasRole('admin')) {
                    return Redirect::to('adminR');
                } else if (Auth::user()->hasRole('paciente')) {
                    return Redirect::to('pacienteR');
                } else if (Auth::user()->hasRole('doctor')) {
                    return Redirect::to('doctorR');
                }
            }
        }
    }

    public function store(Request $request)
    {
 
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
