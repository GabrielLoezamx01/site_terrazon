<?php

namespace App\Http\Controllers\Emails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Whoops\Run;
use Illuminate\Support\Facades\Crypt;
use App\Models\Referrals;
use Referrals as GlobalReferrals;

class VerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->token)){
            $token = $request->token;
            $decryptedToken = Crypt::decryptString($token);
            $data = explode('|', $decryptedToken);
            $time = date('Y-m-d H:i:s');
            $Referrals = Referrals::select('name', 'verication_code', 'verication_code_expiration', 'email', 'id_referral')->where('email', $data[0])->first();
            if($time >= $Referrals->verication_code_expiration ){
                  return response()->json(['message' => 'Token expiration'], 404);
            }
            return view('admin.verify')->with(compact('Referrals'));
        }
        return response()->json(['message' => 'Token not found'], 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
