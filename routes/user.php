<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\HomeController;


/*
* RUTAS PUBLICAS
*/

Route::get('/user/login', [LoginController::class, 'index'])->name('user.login');
Route::view('/user/register', 'user.auth.register')->name('user.register');
Route::view('/user/password', 'user.auth.password')->name('user.password');

/*
*
* CONTROLADORES DE AUTENTICACION
*/

Route::post('/user/login', [LoginController::class, 'login'])->name('user.login');
Route::post('/user/register', [LoginController::class, 'register'])->name('user.register');


/*
* RUTAS PROTEGIDAS
*
*/

Route::middleware('custom_user')->group(function () {
    route::view('/user/home', 'user.admin.home')->name('user.home');
});
