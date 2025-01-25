<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function show(){
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['document' => 'required|string']);

        $user = User::where('document', $request->document)->first();

        if ($user) {
            $token = Str::random(60);

            DB::table('password_resets')->updateOrInsert(
                ['user_id'=> $user->id,'email' => $user->email],
                ['token' => $token, 'created_at' => now()]
            );

            Mail::to($user->email)->send(new ResetPasswordMail($user, $token));

            return back()->with('showModal', true);
            
        } else {
            return back()->withErrors(['document' => 'No se encontró ningún usuario con ese documento de identidad.']);
        }
    }
}
