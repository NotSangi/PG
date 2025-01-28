<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Especialidad_user;
use App\Models\Especialidad;
use App\Models\Tratamientos;
use DB;



use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {  
        $esp = Especialidad::where('estado', 1)->get();   
        return view("persona.especialidad")->with('especialidad',$esp); 
    }

    public function store(Request $request){

        $esp = Especialidad_user::create([
            'user_id' => Auth::user()->id,
            'especialidad_id' => $request->get('especialidad')
        ]); 

        return Redirect::to('minuevasonrisa');
    }

    public function crearEspecialidad(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'description.required' => 'El campo Descripción es obligatorio.',
        ]);

        $especialidad = new Especialidad();
        $especialidad->name = $request->name;
        $especialidad->description = $request->description;
        $especialidad->estado = 1;
        $especialidad->save();

        $tratamiento = new Tratamientos();
        $tratamiento->name = $request->name;
        $tratamiento->description = $request->description;
        $tratamiento->estado = 1;
        $tratamiento->save();


        return Redirect::to('especialidades');
                
    }

    public function updateEstadoEspecialidad(Request $request)
    {
        $estados = $request->input('estado');
        
        if($estados != null){
            foreach ($estados as $especialidadId => $estado) {
                $especialidad = Especialidad::find($especialidadId);
                $idTratamiento = DB::table('tratamientos')->where('name', $especialidad->name)->value('id');
                $tratamiento = Tratamientos::find($idTratamiento);
        
                if ($especialidad && $tratamiento) {
                    $especialidad->estado = $estado;
                    $especialidad->save();

                    $tratamiento->estado = $estado;
                    $tratamiento->save();
                }
            }

            sleep(2);
            return back();
        } else {
            return back()->withErrors('info', 'No se han realizado cambios.');
        }
        
    }
}
