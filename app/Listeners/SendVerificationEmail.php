<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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

        $payload = [
            'from' => 'TERRAZON  <Terrazon@echamelamano.online>',
            'to' => [$email],
            'subject' => 'Verificación de usuario',
            'html' => '<h1 style="font-weight: 800;">Bienvenido a Terrazon.</h1><div style="margin-top: 50px;">Gracias por registrarte en Terrazon. Para completar tu registro, por favor haz clic en el siguiente enlace: <a href="http://127.0.0.1:8000/emails/verify?token=' . $token . '">Verificar mi cuenta</a></div>',
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
