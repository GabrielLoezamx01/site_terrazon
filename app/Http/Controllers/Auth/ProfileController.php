<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = auth()->user();
        return view('auth.profile')->with(compact('auth'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $fileName = Auth::user()->img;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = $request->file('photo')->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
        }
        $auth = Auth::user();
        $auth->name = $request->name;
        $auth->img = $fileName;
        $auth->save();
        return redirect()->back()->withSuccess('¡Operación realizada con éxito!');
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

    public function update_password(Request $request){
        $request->validate([
            'pass' => 'required',
            'pass_new' => 'required',
        ]);
        $auth = Auth::user();

        if (Hash::check($request->pass, $auth->password)) {
            $auth = Auth::user();
            $auth->password = Hash::make($request->pass_new);
            $auth->save();
            $htmlContent = View::make('emails.password')->render();

            $email = $auth->email;
            $token = Str::random(6);
            $payload = [
                'from' => 'TERRAZON - Contraseña <Terrazon@echamelamano.online>',
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
            return redirect()->back()->withSuccess('¡Operación realizada con éxito!');
        }else{
            return redirect()->back()->withErrors(['error' => 'La contraseña actual no coincide']);
        }
        return redirect()->back()->withErrors(['error' => 'La contraseña actual no coincide']);

    }

    public function lock(){
        return view('emails.password');
    }

    public function lock_verify(){
        dd('Hola');
        return 'Hola';
        $token = session('token_super');
        $token_verify = request('token');
        if($token == $token_verify){
            session()->forget('super');
            return redirect('login');
        }
        return redirect('lock');
    }
}
