<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;



Route::get('/user/login', [LoginController::class, 'index'])->name('user.login');
Route::view('/user/register', 'user.auth.register')->name('user.register');
Route::view('/user/password', 'user.auth.password')->name('user.password');

