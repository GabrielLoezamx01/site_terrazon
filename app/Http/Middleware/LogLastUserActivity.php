<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class LogLastUserActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = Session::get('lastActivityTime');
            $currentActivity = Carbon::now();

            if ($lastActivity && $currentActivity->diffInMinutes($lastActivity) > config('session.lifetime')) {
                Auth::logout();
                Session::forget('lastActivityTime');
                return redirect('/login')->withErrors(['message' => 'Has sido desconectado por inactividad.']);
            }

            Session::put('lastActivityTime', $currentActivity);
        }

        return $next($request);
    }
}
