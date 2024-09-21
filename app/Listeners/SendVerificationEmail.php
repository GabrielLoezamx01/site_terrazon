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

        $htmlContent = View::make('emails.token')->with('token', $token)->render();

        $payload = [
            'from' => 'TERRAZON '.'<'.config('app.resend_from').'>',
            'to' => [$email],
            'subject' => 'Recuperación de contraseña',
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
