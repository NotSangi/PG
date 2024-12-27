<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
 
        if (Auth::attempt($credentials, $request->has('remember'))) {

            $referer = $request->headers->get('referer');

            if(Auth::user()){
                if ($referer && str_contains($referer, 'formulario')) {
                    return Redirect::to('form');
                } else {
                    return Redirect::to('minuevasonrisa');
                }
            }

            if ($request->has('remember')) {
                // Generate a unique remember token
                $rememberToken = Str::random(60);
                Auth::user()->update(['remember_token' => $rememberToken]);
    
                // Create a cookie for the remember token (optional)
                $request->session()->put('remember_token', $rememberToken);
                $cookie = cookie('laravel_remember', $rememberToken, 1440 * 30) 
                    ->withSameSite('strict');
                $request->stack()->push($cookie);
            }

        } else {
            return back()->withErrors(['error' => 'Credenciales invalidas'])
            ->withInput($request->only('document'));
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect('/minuevasonrisa'); 
    }
}
