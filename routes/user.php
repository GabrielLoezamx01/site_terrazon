<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;



Route::get('/user/login', [LoginController::class, 'index'])->name('user.login');
