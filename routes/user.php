<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\HomeController;

/*
* RUTAS PUBLICAS
*/

Route::get('/custom/login', [LoginController::class, 'index'])->name('custom.login.form');
Route::view('/custom/register', 'user.auth.register')->name('custom.register.form');
Route::view('/custom/password', 'user.auth.password')->name('custom.password');

/*
*
* CONTROLADORES DE AUTENTICACION
*/

Route::post('/custom/login', [LoginController::class, 'login'])->name('custom.login');
Route::post('/custom/register', [LoginController::class, 'register'])->name('custom.register');


/*
* RUTAS PROTEGIDAS
*
*/

Route::middleware('custom_user')->group(function () {
});

Route::prefix('custom')->middleware('custom_user')->group(function () {
    Route::view('/home', 'user.admin.home')->name('custom.home');
});
