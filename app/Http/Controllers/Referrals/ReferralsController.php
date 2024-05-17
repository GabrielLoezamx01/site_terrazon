<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referrals;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
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
        $referrals = Referrals::paginate(10);
        $status = $this->statusBlade();
        return view('admin.users' , compact('referrals' , 'status'));
    }


    /**
     * Mapeo of status of model Referrals in desing blade
     *
     * @return Array
     */

    private function statusBlade(){
       return [
            'success' => [
                'class' => 'border-5 fw-bold text-success',
                'text' => 'Correcto',
            ],
            'pending' => [
                'class' => 'border-5 fw-bold text-warning',
                'text' => 'Pendiente',
            ],
            'error' => [
                'class' => 'border-5 fw-bold text-danger',
                'text' => 'Error',
            ],
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->password != $request->password_verify) {
            return redirect()->back()->withErrors(['password' => 'Las contraseñas no coinciden'])->withInput();
        }

        $token = Str::random(6);
        $email = $request->email;
        $dataToEncrypt = $email . '|' . $token;
        $encryptedData = Crypt::encryptString($dataToEncrypt);
         Referrals::create([
            'name' => $request->name,
            'email' => $email,
            'password' => $request->password,
            'verication_code' =>   $token ,
            'verication_code_expiration' => date('Y-m-d H:i:s', strtotime('+6 minutes')),
            'status' => 'pending'
        ]);

        event(new UserSendEmail($email, $encryptedData));

        return redirect()->back()->withSuccess('¡Operación realizada con éxito! Se ha enviado un correo de verificación.');
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
