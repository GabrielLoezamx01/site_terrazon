<?php

namespace App\Listeners;

use App\Events\CustomRegister;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SendEmailListener
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
     * @param  \App\Events\CustomRegister  $event
     * @return void
     */
    public function handle(CustomRegister $event)
    {
        $email = $event->emailData;
        $htmlContent = View::make('emails.new_user')->render();

        $payload = [
            'from' => 'TERRAZON  <Terrazon@echamelamano.online>',
            'to' => [$email],
            'subject' => 'Bienvenido a Terrazon',
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
