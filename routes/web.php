<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Referrals\ReferralsController;
use App\Http\Controllers\Emails\VerifyController;
use App\Http\Controllers\Admin\AmenitiesController;
use App\Http\Controllers\Admin\TypesController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\Property\PropertyController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Public\HomeController::class, 'index'])->name('inicio');
Route::get('/propiedades2', [App\Http\Controllers\Public\PropiedadesController::class, 'index'])->name('propiedades2');
Route::get('/propiedades', [App\Http\Controllers\Public\PropiedadesController::class, 'index'])->name('propiedades');
Route::get('/agentes', function () {
    return view('public.agentes');
})->name('agentes');
Route::get('/acercade', function () {
    return view('public.acercade');
})->name('acercade');
Route::get('/contacto', function () {
    return view('public.contacto');
})->name('contacto');
Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::apiResource('users', ReferralsController::class);
    Route::apiResource('amenities', AmenitiesController::class);
    Route::apiResource('types', TypesController::class);
    Route::apiResource('features', FeaturesController::class);
    Route::apiResource('condition', ConditionController::class);
    Route::apiResource('property', PropertyController::class);
    Route::get('new_property', [PropertyController::class, 'createView']);
    Route::get('continue_create', [PropertyController::class, 'continueView']);

});


Route::apiResource('emails/verify', VerifyController::class);
