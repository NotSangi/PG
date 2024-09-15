<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;        

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $credentials = [
            "document" => $request->get('document'),
            "password" => $request->get('password'),
        ];
 
        if (Auth::attempt($credentials)) {

            if(Auth::user()->hasRole('admin')){
                return Redirect::to('adminR');
            } else if (Auth::user()->hasRole('paciente')){
                return Redirect::to('pacienteR');
            } else if (Auth::user()->hasRole('doctor')){
                return Redirect::to('doctorR');
            } else if (Auth::user()->hasRole('secretaria')){
                return Redirect::to('secretariaR');
            }

        } else {
            return Redirect::to('login');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect('/persona'); 
    }
}
