<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Referrals\LoginController;

Route::prefix('referrals')->middleware('referrals')->group(function () {
    Route::apiResource('login', LoginController::class);
});

Route::get('referrals/login', [LoginController::class, 'index']);
