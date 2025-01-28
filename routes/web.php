<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\FormularioController;
use App\Models\Formulario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('minuevasonrisa', 'App\Http\Controllers\PersonaController');
Route::get('formulario', 'App\Http\Controllers\PersonaController@formulario');
Route::get('form', 'App\Http\Controllers\FormularioController@index');

Route::get('derechos', 'App\Http\Controllers\PersonaController@derechos');

Route::get('modal', 'App\Http\Controllers\PersonaController@modal');

Route::resource('especialidad', 'App\Http\Controllers\EspecialidadController');

//roles
Route::post('crearRole', 'App\Http\Controllers\PersonaController@crearRole');
Route::post('updateEstadoRol', 'App\Http\Controllers\PersonaController@updateEstadoRol');
Route::get('adminR', 'App\Http\Controllers\PersonaController@adminView');
Route::get('pacienteR', 'App\Http\Controllers\PersonaController@pacienteView');
Route::get('doctorR', 'App\Http\Controllers\PersonaController@doctorView');
Route::get('secretariaR', 'App\Http\Controllers\PersonaController@secretariaView');
Route::get('perfil', 'App\Http\Controllers\PersonaController@perfil')->name('perfil.perfil');
Route::match(['put','patch'], 'perfil', 'App\Http\Controllers\PersonaController@actualizar')->name('perfil.actualizar');

//tablas
Route::get('pacientes', 'App\Http\Controllers\Tabla@pacientesView');
Route::get('doctores', 'App\Http\Controllers\Tabla@doctoresView');
Route::get('roles', 'App\Http\Controllers\Tabla@rolesView');
Route::get('especialidades', 'App\Http\Controllers\Tabla@especialidadesView');
Route::post('crearEspecialidad', 'App\Http\Controllers\EspecialidadController@crearEspecialidad');
Route::post('updateEstadoEspecialidad', 'App\Http\Controllers\EspecialidadController@updateEstadoEspecialidad');

Route::get('citas', 'App\Http\Controllers\Tabla@citas');
Route::get('citasAdmin', 'App\Http\Controllers\Tabla@citasAdmin');

Route::post('updateEstado', 'App\Http\Controllers\Tabla@updateEstado');

//formulario
Route::post('post_formulario', 'App\Http\Controllers\FormularioController@create');
Route::post('citas_update', 'App\Http\Controllers\FormularioController@update');
Route::get('/appointments/events', [EventoController::class, 'eventos']);
Route::get('agenda', 'App\Http\Controllers\FormularioController@show');
Route::post('/cancel', 'App\Http\Controllers\FormularioController@cancel');
Route::post('/finalizar', 'App\Http\Controllers\FormularioController@finalizar');

Route::get('/mail', 'App\Http\Controllers\Tabla@show');


//login y registro

Auth::routes();

Route::get('showCrearUsuario', 'App\Http\Controllers\PersonaController@showCrearUsuario');
Route::post('crearUsuario', 'App\Http\Controllers\PersonaController@crearUsuario');

Route::get('preRegister', 'App\Http\Controllers\Auth\RegisterController@preRegister');

Route::get('restablecer', 'App\Http\Controllers\Auth\ForgotPasswordController@show');
Route::post('/password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
