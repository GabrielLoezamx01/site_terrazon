<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referrals;
use Illuminate\Support\Str;
use App\Events\UserSendEmail;
use Illuminate\Support\Facades\Crypt;

class ReferralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validar el formato del email
            $request->validate([
                'email' => 'required|email',
            ]);

            $email = $request->email;

            if (Referrals::where('email', $email)->exists()) {
                return redirect()->back()->withErrors(['email' => 'El correo electrónico ya está registrado.'])->withInput();
            }

            $token = Str::random(6);

            Referrals::create([
                'name' => 'Invitado',
                'email' => $email,
                'password' => '',
                'verication_code' => $token,
                'verication_code_expiration' => now()->addMinutes(6),
                'status' => 'pending',
            ]);

            // Enviar el correo de verificación
            event(new UserSendEmail($email, $token));

            return redirect()->back()->withSuccess('¡Operación realizada con éxito! Se ha enviado un correo de verificación.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
