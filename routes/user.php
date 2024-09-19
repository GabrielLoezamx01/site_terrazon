<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\HomeController;
use App\Http\Controllers\User\Admin\ProfileController;
use App\Http\Controllers\Admin\Property\FavoriteController;


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
    Route::post('/user/favorite/{property}', [FavoriteController::class, 'toggleFavorite']);
});

Route::prefix('custom')->middleware('custom_user')->group(function () {
    Route::view('/home', 'user.admin.home')->name('custom.home');
    Route::view('/home', 'user.admin.home')->name('custom.home');
    Route::post('/update_profile', [ProfileController::class, 'update'])->name('update_profile');
    Route::view('/update_profile', 'user.admin.home')->name('custom.home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('custom.logout');
    Route::get('/favorite', [FavoriteController::class, 'getFavorites']);
});
