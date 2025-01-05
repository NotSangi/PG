<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Mail\PasswordResetSuccess;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Hash;
use App\Models\User;
use DB;
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

    $tokenRecord = DB::table('password_resets')->where('token', $validatedData['token'])->value('user_id');
    $usuario = User::findOrFail($tokenRecord);
    
    $usuario->password = bcrypt($validatedData['password']);
    $usuario->update();
            
    Mail::to($usuario->email)->send(new PasswordResetSuccess($usuario));

    sleep(3);
    return redirect('/login')->with('status', 'Contraseña actualizada correctamente.');
    
}

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
