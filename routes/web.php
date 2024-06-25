<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Referrals\ReferralsController;
use App\Http\Controllers\Emails\VerifyController;
use App\Http\Controllers\Admin\AmenitiesController;
use App\Http\Controllers\Admin\TypesController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\ConditionController;





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

Route::get('/registerEMAIL', function () {
    return view('emails.register');
});
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::apiResource('users', ReferralsController::class);
    Route::apiResource('amenities', AmenitiesController::class);
    Route::apiResource('types', TypesController::class);
    Route::apiResource('features', FeaturesController::class);
    Route::apiResource('condition', ConditionController::class);
});


Route::apiResource('emails/verify', VerifyController::class);
