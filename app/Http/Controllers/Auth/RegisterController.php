<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Documentos_user;
use App\Models\Documentos;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    
     

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:255', 'unique:users'],
            'adress' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tratamiento_datos' => ['required', 'int', 'min:1', 'confirmed'],
        ]);
    }

    public function showRegistrationForm()
    {   
        $document = Documentos::all();
        return view("auth.register")->with('documentos', $document); 
    }

    protected function register(Request $request)
    {   
        if (isset($_POST['tratamiento_datos'])){
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
                ]); 
    
                $user->roles()->attach(Role::where('name', 'paciente')->first()); 

                $userId = $user->id;

                $idDocumento = DB::table('documentos')->where('name', $request->get('tipo_documento'))->value('id');

                Documentos_user::create([
                    'user_id' => $userId,
                    'documentos_id' => $idDocumento,
                ]);
    
                return Redirect::to('login');
            } else {
                return back()->withErrors(provider: ['password' => 'Las contraseñas no coinciden']);
            }
            

        } else {
            return back()->withErrors(['tratamiento_datos' => 'Debes aceptar el tratamiento de datos para registrarte']);
        }

        

       // Auth::login($user);

        
        
           
    }
}
