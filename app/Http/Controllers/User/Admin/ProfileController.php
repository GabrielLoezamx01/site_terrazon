<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
            try {
            if (!auth('custom_users')->check()) {
                return response()->json(['error' => 'No authenticated user'], 401);
            }


            $user = Auth::guard('custom_users')->user();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->middle_name = $request->input('middle_name');
            $user->email = $request->input('email');

            // Solo actualizar la contraseña si se proporciona
            if ($request->has('password') && !empty($request->input('password'))) {
                $user->password = bcrypt($request->input('password'));
            }

            // Guardar los cambios
            $user->save();

            // Redirigir a la vista anterior con un mensaje de éxito
            return redirect()->back()->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            // Manejo de la excepción y redirigir con un mensaje de error
            return redirect()->back()->withErrors(['error' => 'Failed to update user: ' . $e->getMessage()]);
        }
    }
}
