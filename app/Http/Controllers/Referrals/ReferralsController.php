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
        $data = Referrals::all();
        $columns = $this->columns_table();
        return view('admin.users.index', [
            'data' => $data,
            'columns' => $columns,
            'modal' => $this->form()
        ]);
    }

    private function form(): array
    {
        return [
            'title_modal' => 'Registrar nuevo usuario',
            'form' => [
                'action' => route('users.store'),
                'method' => 'POST',
                'id' => 'form',
                'class' => 'form',
                'fields' =>
                [
                    'type' => 'text',
                    'name' => 'name',
                    'label' => 'Nombre',
                    'placeholder' => 'Nombre',
                    'required' => 'required',
                    'value' => old('name'),
                    'class' => 'form-control'
                ],
                [
                    'type' => 'email',
                    'name' => 'email',
                    'label' => 'Correo',
                    'placeholder' => 'Correo',
                    'required' => 'required',
                    'value' => old('email'),
                    'class' => 'form-control'
                ],
                [
                    'type' => 'btn',
                    'name' => 'Enviar',
                    'class' => 'btn btn-primary'
                ]
            ]

        ];
    }

    private function columns_table(): array
    {
        return [
            'name' => 'Nombre',
            'email' => 'Correo',
            'status' => 'Estado',
            'created_at' => 'Fecha de registro'
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
        try {
            $password = $request->input('password');
            $passwordVerify = $request->input('password_verify');
            if ($password !== $passwordVerify) {
                return redirect()->back()->withErrors(['password' => 'Las contraseñas no coinciden'])->withInput();
            }
            $token = Str::random(6);
            $email = $request->input('email');

            Referrals::create([
                'name' => $request->input('name'),
                'email' => $email,
                'password' => $password,
                'verication_code' =>   $token,
                'verication_code_expiration' => date('Y-m-d H:i:s', strtotime('+6 minutes')),
                'status' => 'pending'
            ]);

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
