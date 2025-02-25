<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Evento;
use App\Models\Formulario;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
class Tabla extends Controller
{
    public function pacientesView(Request $request)
    {
        $perPage = 8;
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $busqueda = $request->input('busqueda', '');

        if (!empty($busqueda)) {
            $usuario = User::whereHas('roles', function ($query) {
                $query->where('name', 'paciente');
            })
            ->where(function ($query) use ($busqueda) {
                $query->where('id', 'like', "%{$busqueda}%")
                      ->orWhere('name', 'like', "%{$busqueda}%")
                      ->orWhere('descrption', 'like', "%{$busqueda}%");                     
            })
            ->orderBy('id', 'DESC')
            ->offset($offset)
            ->limit($perPage)
            ->get();
        } else {
            $usuario = User::whereHas('roles', function ($query) {
                $query->where('name', 'paciente');
            })
                ->orderBy('id', 'DESC')
                ->offset($offset)
                ->limit($perPage)
                ->get();
        }

        $totalUsuarios = User::whereHas('roles', function ($query) {
            $query->where('name', 'paciente');
        })->count();

        $totalPages = ceil($totalUsuarios / $perPage);

        return view('tablas.pacientes')
            ->with('users', $usuario)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);
        
    }

    public function rolesView(Request $request)
    {
            $perPage = 8;
            $currentPage = request('page', 1);
            $offset = ($currentPage - 1) * $perPage;
            $busqueda = $request->input('busqueda', '');
    
            $query = Role::All();
    
            if (!empty($busqueda)) {
                    $query->where('id', 'like', "%{$busqueda}%")
                        ->orWhere('name', 'like', "%{$busqueda}%")
                        ->orWhere('last_name', 'like', "%{$busqueda}%")
                        ->orWhere('document', 'like', "%{$busqueda}%")
                        ->orWhere('email', 'like', "%{$busqueda}%");                     
                
                    $roles = $query->orderBy('id', 'DESC')
                        ->offset($offset)
                        ->limit($perPage)
                        ->get();
            } else {
                $roles = Role::All();
                        
            }
    
            $totalRoles = $query->count(); 
            $totalPages = ceil($totalRoles / $perPage);
    
            return view('tablas.roles')
            ->with('roles', $roles)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);

            
    }

    public function especialidadesView(Request $request)
    {
            $perPage = 8;
            $currentPage = request('page', 1);
            $offset = ($currentPage - 1) * $perPage;
            $busqueda = $request->input('busqueda', '');
    
            $query = Especialidad::All();
    
            if (!empty($busqueda)) {
                    $query->where('id', 'like', "%{$busqueda}%")
                        ->orWhere('name', 'like', "%{$busqueda}%")
                        ->orWhere('last_name', 'like', "%{$busqueda}%")
                        ->orWhere('document', 'like', "%{$busqueda}%")
                        ->orWhere('email', 'like', "%{$busqueda}%");                     
                
                    $especialidades = $query->orderBy('id', 'DESC')
                        ->offset($offset)
                        ->limit($perPage)
                        ->get();
            } else {
                $especialidades = Especialidad::All();
                        
            }
    
            $totalEspecialidades = $query->count(); 
            $totalPages = ceil($totalEspecialidades / $perPage);
    
            return view('tablas.especialidades')
            ->with('especialidades', $especialidades)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);

            
    }

    public function doctoresView(Request $request)
    {
        $perPage = 8;
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $busqueda = $request->input('busqueda', '');

        if (!empty($busqueda)) {
            $usuario = User::whereHas('roles', function ($query) {
                $query->where('name', 'doctor');
            })
            ->where(function ($query) use ($busqueda) {
                $query->where('id', 'like', "%{$busqueda}%")
                      ->orWhere('name', 'like', "%{$busqueda}%")
                      ->orWhere('last_name', 'like', "%{$busqueda}%")
                      ->orWhere('document', 'like', "%{$busqueda}%")
                      ->orWhere('email', 'like', "%{$busqueda}%");                     
            })
            ->orderBy('id', 'DESC')
            ->offset($offset)
            ->limit($perPage)
            ->get();
        } else {
            $usuario = User::whereHas('roles', function ($query) {
                $query->where('name', 'doctor');
            })
                ->orderBy('id', 'DESC')
                ->offset($offset)
                ->limit($perPage)
                ->get();
        }

        $totalUsuarios = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->count();

        $totalPages = ceil($totalUsuarios / $perPage);

        return view('tablas.doctores')
            ->with('users', $usuario)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);
    }

    public function citas(Request $request)
    {
        $perPage = 8;
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $busqueda = $request->input('busqueda', '');

        if (!empty($busqueda)) {
            $citas = Formulario::where('user_id', Auth::user()->id) 
                ->where(function ($query) use ($busqueda) {
                $query->where('id', 'like', "%{$busqueda}%")
                ->orWhere('name', 'like', "%{$busqueda}%")
                ->orWhere('last_name', 'like', "%{$busqueda}%")
                ->orWhere('email', 'like', "%{$busqueda}%")
                ->orWhere('tratamiento', 'like', "%{$busqueda}%")
                ->orWhere('prioridad', 'like', "%{$busqueda}%")
                ->orWhere('estado', 'like', "%{$busqueda}%");
                });
        } elseif (Auth::user()->hasRole('paciente')) {
            $citas = Formulario::whereHas('user', function ($query) {
                $query->where('user_id', Auth::user()->id);
            });
        } elseif (Auth::user()->hasRole('doctor')) {
            $citas = Formulario::whereHas('user', function ($query) {
                $query->where('doctor_id', Auth::user()->id);
            });
        } else {
            return redirect()->route('home')->with('error', 'Usuario no autorizado.');
        }

        $totalCitas = $citas->count();

        $citas = $citas->orderBy('id', 'DESC')->offset($offset)->limit($perPage)->get();
        $totalPages = ceil($totalCitas / $perPage);

        return view('tablas.citas')
            ->with('citas', $citas)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);
    }

    public function citasAdmin(Request $request)
    {

        $perPage = 8;
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        if (!empty($request->busqueda)) {
            $citas = Formulario::where('id', 'like', "%{$request->busqueda}%")
                ->orWhere('name', 'like', "%{$request->busqueda}%")
                ->orWhere('last_name', 'like', "%{$request->busqueda}%")
                ->orWhere('tel', 'like', "%{$request->busqueda}%")
                ->orWhere('email', 'like', "%{$request->busqueda}%")
                ->orWhere('tratamiento', 'like', "%{$request->busqueda}%")
                ->orWhere('prioridad', 'like', "%{$request->busqueda}%")
                ->orWhere('estado', 'like', "%{$request->busqueda}%");
        } else {
            $citas = Formulario::query();
        }

        $totalCitas = $citas->count();

        $citas = $citas->orderBy('id', 'DESC')->offset($offset)->limit($perPage)->get();
        $totalPages = ceil($totalCitas / $perPage);

        $doctores = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->where('estado', 1)->orderBy('id', 'DESC')->get();


        return view('tablas.citasAdmin')
            ->with('citas', $citas)
            ->with('doctores', $doctores)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);
    }

    public function show(){
        return view('mail.confirmacion');
    }

    public function updateEstado(Request $request)
    {
        $estados = $request->input('estado');

        foreach ($estados as $userId => $estado) {
            $user = User::find($userId);
    
            if ($user) {
                $user->estado = $estado;
                $user->save();
            }
        }
            

        sleep(2);
        return back();
    }
    
}
