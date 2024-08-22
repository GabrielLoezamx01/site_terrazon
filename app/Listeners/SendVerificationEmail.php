<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;

class SendVerificationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $email = $event->email;
        $token = $event->token;

        $encryptedEmail = base64_encode(Crypt::encryptString($email));
        $encryptedToken = base64_encode(Crypt::encryptString($token));
        $encryptedParam = $encryptedEmail . '.' . $encryptedToken;

        $htmlContent = View::make('emails.new_user')->with('token', $encryptedParam)->render();

        $payload = [
            'from' => 'TERRAZON  <Terrazon@echamelamano.online>',
            'to' => [$email],
            'subject' => 'Verificación de usuario',
            'html' => $htmlContent,
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
    }
}
