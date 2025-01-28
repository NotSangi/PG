<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use DB;
USe App\Models\Documentos_user;
use App\Models\Documentos;


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
        $objeto = (object) $_POST;

        if (
            empty($objeto->document)
            || empty($objeto->name)
            || empty($objeto->last_name)
            || empty($objeto->tel)
            || empty($objeto->email)
            || empty($objeto->adress)
        ){
            return back()->withErrors(['completar_formulario' => 'No deben haber campos vacios']);
        } else {
            $user = User::findOrFail(Auth::user()->id);

            $user->name = $request->get("name");
            $user->last_name = $request->get("last_name");
            $user->document = $request->get("document");
            $user->adress = $request->get("adress");
            $user->email = $request->get("email");
            $user->tel = $request->get("tel");

            $user->update();

            return Redirect::to('minuevasonrisa');
        }
    }

    public function crearRole(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'description.required' => 'El campo Descripción es obligatorio.',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->estado = 1;
        $role->save();

        return Redirect::to('roles');
                
    }

    public function updateEstadoRol(Request $request)
    {
        $estados = $request->input('estado');
        
        if($estados != null){
            foreach ($estados as $rolId => $estado) {
                $rol = Role::find($rolId);
        
                if ($rol) {
                    $rol->estado = $estado;
                    $rol->save();
                }
            }

            sleep(2);
            return back();
        } else {
            return back()->withErrors('info', 'No se han realizado cambios.');
        }
        
    }

    public function showCrearUsuario()
    {   
        $document = Documentos::all();
        $roles = Role::where('estado', 1)->get();

        return view("layout.crearusuario")
        ->with('documentos', $document)
        ->with('roles', $roles); 
    }

    public function crearUsuario(Request $request){
        $objeto = (object) $_POST;

        if (
            empty($objeto->name)
            || empty($objeto->last_name)
            || empty($objeto->tipo_documento)
            || empty($objeto->document)
            || empty($objeto->adress)
            || empty($objeto->email)
            || empty($objeto->tel)
            || empty($objeto->password)
            || empty($objeto->password_confirm)
            || empty($objeto->rol)
        ) {
            return back()->withErrors(['completar_formulario' => 'Debes llenar todo el formulario'])
            ->withInput($request->only('name', 'last_name', 'document', 'adress', 'email', 'tel'));
        }    else if (isset($_POST['tratamiento_datos'])){
            if($request->get('password') == $request->get('password_confirm')){
                    $user = User::create(attributes: [
                        'name' => $request->get('name'),
                        'last_name' => $request->get('last_name'),
                        'document' => $request->get('document'),
                        'adress' =>$request->get('adress'),
                        'email' => $request->get('email'),
                        'tel' =>$request->get('tel'),
                        'password' => bcrypt($request->get('password')),
                        'tratamiento_datos' =>$request->get('tratamiento_datos'),   
                        'estado' => 1,
                    ]); 
        
                    $user->roles()->attach(Role::where('name', $request->get('rol'))->first());
                
                $userId = $user->id;

                $idDocumento = DB::table('documentos')->where('name', $request->get('tipo_documento'))->value('id');

                Documentos_user::create([
                    'user_id' => $userId,
                    'documentos_id' => $idDocumento,
                ]);
    
                return Redirect::to('minuevasonrisa');
            } else {
                return back()->withErrors(provider: ['password' => 'Las contraseñas no coinciden'])
                ->withInput($request->only('name', 'last_name', 'document', 'adress', 'email', 'tel'));
            }
            

        } else {
            return back()->withErrors(['tratamiento_datos' => 'Debes aceptar el tratamiento de datos'])
            ->withInput($request->only('name', 'last_name', 'document', 'adress', 'email', 'tel'));
        }
    }

    public function show(string $id) {}
    public function edit() {}
    public function update() {}
    public function destroy(string $id) {}
}
