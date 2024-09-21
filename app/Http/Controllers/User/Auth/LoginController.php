<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use App\Events\CustomRegister;
class LoginController extends Controller
{
    public function index()
    {

        if (Auth::guard('custom_users')->check()) {
            Session::regenerateToken();
            return redirect('custom/home');
        } else {
            return view('user.auth.login');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (RateLimiter::tooManyAttempts($request->email, 5)) {
            return redirect()->back()
                ->withErrors(['error' => 'Too many login attempts, please try again later.']);
        }

        $referral = CustomUser::where('email', $request->email)
        ->select('password', 'id', 'email', 'first_name')
        ->first();
        if (!$referral) {
            return redirect()->back()->withErrors('Failed to authenticate user')->withInput();

        }

        if (Auth::guard('custom_users')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('custom_users')->check()) {
                Session::regenerateToken();
                return redirect('custom/home');
            } else {
                return redirect()->back()->withErrors(['error' => 'No hay usuario autenticado'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Password does not match'])->withInput();
        }
        return redirect()->back()->withErrors(['error' => 'Password does not match'])->withInput();

    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'middle_name' => 'nullable|string|max:100',
                'cell_phone' => 'required|string|max:10',
                'email' => 'required|email|unique:custom_users,email',
                'password' => 'required|string|min:6',
                'terms_accepted' => 'accepted'
            ]);
            $termsAccepted = $request->input('terms_accepted') === 'on';
            $customUser = CustomUser::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'middle_name' => $request->input('middle_name'),
                'cell_phone' => $request->input('cell_phone'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')), // Encriptar la contraseña
                'terms_accepted' => $termsAccepted, // Usar el valor booleano
            ]);

            Auth::guard('custom_users')->login($customUser);

            if (Auth::guard('custom_users')->check()) {

                event(new CustomRegister($request->input('email')));

                return redirect()->route('custom.home')->with('success', 'User registered and logged in successfully');
            } else {
                return redirect()->back()->withErrors(['error' => 'Failed to authenticate user'])->withInput();
            }

            // return redirect()->route('user.home')->with('success', 'User registered successfully');


        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();

        }
    }

    public function logout()
    {
        Auth::guard('custom_users')->logout();
        return redirect()->route('custom.login.form');
    }
}
