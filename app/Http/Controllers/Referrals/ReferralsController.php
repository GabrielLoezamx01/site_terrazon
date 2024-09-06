<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referrals;
use Illuminate\Support\Str;
use App\Events\UserSendEmail;
use Illuminate\Support\Facades\Hash;
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
            $request->validate([
                'email' => 'required|email',
            ]);

            $email = $request->email;
            Referrals::create([
                'name' => 'Invitado',
                'email' => $email,
                'password' => $request->pass,
                'verication_code' => '',
                'verication_code_expiration' => now()->addMinutes(6),
                'status' => 'pending',
            ]);


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
