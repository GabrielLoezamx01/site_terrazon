<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomUser;
use App\Events\UserSendEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class RetryPasswordController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $validations = CustomUser::where('email', $request->email)->first();
        if(!$validations){
            return back()->withErrors(['email' => 'El correo no se encuentra registrado']);
        }
        $token = Str::random(6);
        $expired = now()->addMinutes(5);
        $validations->update([
            'token' => $token,
            'token_expirado' => $expired
        ]);

        $data = [
                'email' => $request->email,
                'token' => $token
            ];

        event(new UserSendEmail($data['email'], $data['token']));

        $emailEncrypted = encrypt($data['email']);



        return view('user.auth.reset')->with('email', $emailEncrypted);
    }
    public function token(Request $request)
    {

        $request->validate([
            'ca' => 'required',
            'token' => 'required',
        ]);

        $emailDecrypted = decrypt($request->ca);

        $validations = CustomUser::where('email', $emailDecrypted)->first();

        if (!$validations) {
            return back()->withErrors(['email' => 'El correo no se encuentra registrado']);
        }

        if($validations->token_expirado < now()){
            return back()->withErrors(['token' => 'El token ha expirado']);
        }

        if($validations->token != $request->token){
            return back()->withErrors(['token' => 'El token es incorrecto']);
        }

        Auth::guard('custom_users')->login($validations);

        if (Auth::guard('custom_users')->check()) {
            $payload = [
                'from' => 'TERRAZON  <Terrazon@echamelamano.online>',
                'to' => [$emailDecrypted],
                'subject' => 'Cuenta Restablecida',
                'html' => 'Tu cuenta ha sido restablecida',
                'headers' => [
                    'X-Entity-Ref-ID' => Str::random(6)
                ],
            ];

            $caCertPath = storage_path('cacert.pem');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('KEYRESEND'),
                'Content-Type' => 'application/json'
            ])->withOptions([
                'verify' => $caCertPath,
            ])->post(env('RESENDAPI'), $payload);
            return redirect()->route('custom.home')->with('success', 'Cuenta Restablecida');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to authenticate user'])->withInput();
        }
    }
}
