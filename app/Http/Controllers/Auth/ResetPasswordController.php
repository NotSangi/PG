<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Mail\PasswordResetSuccess;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Hash;
use Password;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function reset(Request $request)
{
    // Validar token y datos del formulario
    $validatedData = $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    
    $user = Password::broker()->getUserByToken($validatedData['token']);

    
    if ($user) {
        Password::broker()->reset($validatedData, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();

            
            Mail::to($user->email)->send(new PasswordResetSuccess($user));

            return redirect('/login')->with('status', 'Contraseña actualizada correctamente.');
        });
    } else {
        
        return back()->withErrors(['email' => 'Token inválido o usuario no encontrado']);
    }
}

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
