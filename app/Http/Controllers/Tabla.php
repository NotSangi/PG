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

        $perPage = 10; // Adjust the number of items per page as needed
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        $usuario = User::whereHas('roles', function ($query) {
            $query->where('name', 'paciente');
        })->orderBy('id', 'DESC')
            ->offset($offset)
            ->limit($perPage)
            ->get();

        $totalUsuarios = User::whereHas('roles', function ($query) {
            $query->where('name', 'paciente');
        })->count();

        $totalPages = ceil($totalUsuarios / $perPage);

        return view('tablas.pacientes')
            ->with('users', $usuario)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);

    }
    public function doctoresView()
    {

        $perPage = 10; // Adjust the number of items per page as needed
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        $usuario = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->orderBy('id', 'DESC')
            ->offset($offset)
            ->limit($perPage)
            ->get();

        $totalUsuarios = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->count();

        $totalPages = ceil($totalUsuarios / $perPage);

        return view('tablas.doctores')
            ->with('users', $usuario)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);
    }
    public function citas()
    {

        $perPage = 8; // Items per page
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        if (Auth::user()->hasRole('paciente')) {

            $citas = Formulario::whereHas('user', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->orderBy('id', 'DESC')->offset($offset)->limit($perPage)->get();

            $totalPages = ceil(Formulario::whereHas('user', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->count() / $perPage);

        } else if (Auth::user()->hasRole('doctor')) {

            $citas = Formulario::whereHas('user', function ($query) {
                $query->where('doctor_id', Auth::user()->id);
            })->orderBy('id', 'DESC')->offset($offset)->limit($perPage)->get();

            $totalPages = ceil(Formulario::whereHas('user', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->count() / $perPage);

        }
        return view('tablas.citas')
            ->with('citas', $citas)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);
    }

    public function citasAdmin()
    {

        $perPage = 8;
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        $citas = Formulario::offset($offset)->limit($perPage)->get();
        $totalCitas = Formulario::count();
        $totalPages = ceil($totalCitas / $perPage);


        $usuario = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->orderBy('id', 'DESC')->offset($offset)->limit($perPage)->get();


        return view('tablas.citasAdmin')
            ->with('citas', $citas)
            ->with('doctores', $usuario)
            ->with('currentPage', $currentPage)
            ->with('totalPages', $totalPages);
    }
}
