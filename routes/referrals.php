<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Referrals\LoginController;
use App\Http\Controllers\Referrals\Auth\AuthController;



Route::middleware('auth.referral')->group(function () {
    // Route::get('/dashboard', [ReferralController::class, 'dashboard'])->name('referral.dashboard');
    // Otras rutas protegidas
});


Route::prefix('referrals')->middleware('auth.referral')->group(  function () {
    Route::view('/dashboard', 'referrals/admin/index');
    Route::post('/referral/logout', [AuthController::class, 'logout'])->name('referral.logout');

});
Route::post('referrals/auth', [AuthController::class, 'login'])->name('auth_referrals');
Route::get('/referrals/login', [LoginController::class, 'index'])->name('referral.login');
