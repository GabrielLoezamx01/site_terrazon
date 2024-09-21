<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{

    public function index (){
        $occupations = DB::table('occupations')->get();
        return view('user.admin.home')->with('occupations', $occupations);
    }

    public function update(Request $request)
    {
        try {
            if (!auth('custom_users')->check()) {
                return response()->json(['error' => 'No authenticated user'], 401);
            }
            if(count($request->all()) == 1){
                return redirect()->back();
            }

            $user = Auth::guard('custom_users')->user();
            if ($request->has('first_name') && !empty($request->input('first_name'))) {
                $user->first_name = $request->input('first_name');
            }

            if ($request->has('last_name') && !empty($request->input('last_name'))) {
                $user->last_name = $request->input('last_name');
            }

            if ($request->has('middle_name') && !empty($request->input('middle_name'))) {
                $user->middle_name = $request->input('middle_name');
            }


            if ($request->has('sex') && !empty($request->input('sex'))) {
                $user->gender = $request->input('sex');
            }

            if ($request->has('occupations') && !empty($request->input('occupations'))) {
                $user->occupation = $request->input('occupations');
            }


            if ($request->has('birth_date') && !empty($request->input('birth_date'))) {
                $user->date_of_birth = $request->input('birth_date');
            }

            if ($request->has('password') && !empty($request->input('password'))) {
                $user->password = bcrypt($request->input('password'));
            }

            if ($request->has('phone2') && !empty($request->input('phone2'))) {
                $user->landline = $request->phone2;
            }

            if ($request->has('phone') && !empty($request->input('phone'))) {
                $user->cell_phone = $request->phone;

            }

            $user->save();

            // Redirigir a la vista anterior con un mensaje de éxito
            return redirect()->back()->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            // Manejo de la excepción y redirigir con un mensaje de error
            return redirect()->back()->withErrors(['error' => 'Failed to update user: ' . $e->getMessage()]);
        }
    }
}
