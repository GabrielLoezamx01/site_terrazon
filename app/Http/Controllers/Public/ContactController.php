<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Js;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.', 
            'telefono.required' => 'El telefono es obligatorio.', 
            'email.required' => 'El email es obligatorio.', 
            'mensaje.required' => 'El mensaje es obligatorio.', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $validator->validated();
        $payload = [
            'from' => config('app.name') . ' <terrazon@echamelamano.online>',
            'to' =>  config('app.contact_to'),
            'subject' => 'Contácto desde terrazon.mx',
            'html' => $this->buildEmailContent($request),
            'headers' => [
                'X-Entity-Ref-ID' => Str::random(6)
            ],
        ];
        $email = $this->sendEmail($payload);

        return response()->json([
            'message' => 'Mensaje de contacto enviado exitosamente',
            'data' => $request,
            'response' => $email
        ], 201);
    }
    public function suscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email|max:255', 
        ], [ 
            'email.required' => 'El email es obligatorio.',  
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $validator->validated();
        $payload = [
            'from' => config('app.name') . ' <terrazon@echamelamano.online>',
            'to' =>  config('app.contact_to'),
            'subject' => 'Nuevo suscriptor terrazon.mx',
            'html' => $this->buildSuscribeContent($request),
            'headers' => [
                'X-Entity-Ref-ID' => Str::random(6)
            ],
        ];
        $email = $this->sendEmail($payload);

        return response()->json([
            'message' => 'Mensaje de contacto enviado exitosamente',
            'data' => $request,
            'response' => $email
        ], 201);
    }
    private function sendEmail($payload)
    {
        $caCertPath = storage_path('cacert.pem');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.KEYRESEND'),
            'Content-Type' => 'application/json'
        ])->withOptions([
            'verify' => $caCertPath,
        ])->post(config('app.RESENDAPI'), $payload);
    }

    private function buildEmailContent($contact)
    {
        return "
            <h3>Has recibido un mensaje de contacto</h3>
            <p><strong>Nombre:</strong> {$contact["nombre"]} {$contact["apellido"]}</p>
            <p><strong>Teléfono:</strong> {$contact["telefono"]}</p>
            <p><strong>Email:</strong> {$contact["email"]}</p>
            <p><strong>Mensaje:</strong> {$contact["mensaje"]}</p>
        ";
    }
    private function buildSuscribeContent($contact)
    {
        return "
            <h3>Ha recibido un nuevo suscriptor</h3>
            <p><strong>Email:</strong> {$contact["email"]}</p>
        ";
    }
}
