<?php

namespace App\Http\Controllers\Referrals\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referrals;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
class AuthController extends Controller
{
    public function login (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (RateLimiter::tooManyAttempts($request->email, 5)) {
            return redirect()->back()
            ->withErrors(['error' => 'Too many login attempts, please try again later.']);
        }

        $referral = Referrals::where('email', $request->email)
        ->select('password', 'id_referral', 'email', 'name', 'status')
        ->first();

        if (!$referral) {
            return redirect()->back()->withErrors(['error' => 'Email does not exist'])->withInput();
        }

        if (Auth::guard('referral')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('referral')->check()) {
                return redirect('referrals/dashboard');
                // return Auth::guard('referral')->user()->id_referral;
            } else {
                return redirect()->back()->withErrors(['error' => 'No hay usuario autenticado'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Password does not match'])->withInput();
        }

    }


    public function logout()
    {
        Auth::guard('referral')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('referral.login')->with('message', 'Logged out successfully.');
    }

}
