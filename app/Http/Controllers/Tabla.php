<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Formulario;
use Illuminate\Http\Request;
use App\Models\User;
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
            $usuario = User::where('id', 'like', "%{$busqueda}%")
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'paciente');
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

    public function doctoresView(Request $request)
    {
        $perPage = 8;
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $busqueda = $request->input('busqueda', '');

        if (!empty($busqueda)) {
            $usuario = User::where('id', 'like', "%{$busqueda}%")
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'doctor');
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

        if (!empty($request->busqueda)) {
            $citas = Formulario::where('id', 'like', "%{$request->busqueda}%");
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
            $citas = Formulario::where('id', 'like', "%{$request->busqueda}%");
        } else {
            $citas = Formulario::query();
        }

        $totalCitas = $citas->count();

        $citas = $citas->orderBy('id', 'DESC')->offset($offset)->limit($perPage)->get();
        $totalPages = ceil($totalCitas / $perPage);

        $doctores = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->orderBy('id', 'DESC')->get();


        return view('tablas.citasAdmin')
            ->with('citas', $citas)
            ->with('doctores', $doctores)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);
    }
}
