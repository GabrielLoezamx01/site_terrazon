<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Referrals\ReferralsController;
use App\Http\Controllers\Referrals\ReferralsPropertyController as ReferralsSettings;
use App\Http\Controllers\Referrals\ReferralsProperty;
use App\Http\Controllers\Emails\VerifyController;
use App\Http\Controllers\Admin\AmenitiesController;
use App\Http\Controllers\Admin\Cms\CmsController;
use App\Http\Controllers\Admin\TypesController;
use App\Http\Controllers\Admin\Property\PDFcontroller;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\Property\PropertyController;
use App\Http\Controllers\Admin\Property\ItemsController;
use App\Http\Controllers\Admin\Property\DistributionController;
use App\Http\Controllers\Admin\Property\GalleryController;
use App\Http\Controllers\Site\Home\HomePropertyController;
use App\Http\Controllers\Site\Home\PropertyHome;
use App\Http\Controllers\Site\Home\ContactsController;
use App\Http\Controllers\Auth\ProfileController;



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


/*
*  Define routes for the public pages here.
*/

include __DIR__ . '/home.php';


// Route::view('/email', 'emails.message');


// Route::get('/', [App\Http\Controllers\Public\HomeController::class, 'index'])->name('inicio');
// Route::get('/', [App\Http\Controllers\Public\HomeController::class, 'index'])->name('inicio');
Route::get('/', function () {
    return view('commingsoon.commingsoon');
})->name('inicio');
Route::get('/propiedades', [App\Http\Controllers\Public\PropiedadesController::class, 'index'])->name('propiedades');
Route::get('/ficha/{sku}', [App\Http\Controllers\Public\PropiedadesController::class, 'ficha']);
Route::get('/agentes', [App\Http\Controllers\Public\AgentesController::class, 'index'])->name('public.agentes');
Route::get('/acercade', function () {
    return view('public.acercade');
})->name('acercade');
Route::get('/avisoprivacidad', function () {
    return view('public.privacy');
})->name('public.avisoprivacidad');

Route::get('/contacto', function () {
    return view('public.contacto');
})->name('contacto');

Auth::routes();

Route::get('/register', function () {
    return redirect('/');
});
// Route::get('/login', function () {
//     return redirect('/');
// });
// Auth::routes(['register' => false]);


Route::post('contacts_save', [ContactsController::class, 'store'])->name('contacts_save');

// Route::get('aunlock', [ProfileController::class, 'lock_verify'])->name('aunlock');

// route::view('new_user', 'emails.new_user');

Route::prefix('admin')->middleware('auth')->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::apiResource('home', HomePropertyController::class);
    Route::apiResource('contacts', ContactsController::class);
    Route::apiResource('home_propery', PropertyHome::class);
    Route::apiResource('users', ReferralsController::class);
    Route::apiResource('list_users', ReferralsSettings::class);
    Route::apiResource('list_property', ReferralsProperty::class);
    Route::apiResource('amenities', AmenitiesController::class);
    Route::apiResource('types', TypesController::class);
    Route::apiResource('features', FeaturesController::class);
    Route::apiResource('condition', ConditionController::class);
    Route::apiResource('property', PropertyController::class);
    Route::apiResource('loading_pdf', PDFcontroller::class);
    Route::post('/upload-pdf', [PDFController::class, 'store'])->name('pdf.upload');
    Route::apiResource('cms', CmsController::class);
    Route::post('delete_details', [PropertyController::class, 'delete_details'])->name('delete_details');

    Route::get('new_property', [PropertyController::class, 'createView']);

    Route::post('active_property', [PropertyController::class, 'active_property']);
    Route::post('deactivate_property', [PropertyController::class, 'deactivate_property']);
    Route::post('destacado/{id}', [PropertyController::class, 'destacado']);


    Route::post('details_validate/{property}', [PropertyController::class, 'insert_detail'])->name('details_validate');
    Route::post('edit_property', [PropertyController::class, 'edit_property']);
    Route::get('details_property/{property}', [PropertyController::class, 'details'])->name('details_property');
    Route::apiResource('property_gallery', GalleryController::class);
    Route::apiResource('distribution_gallery', DistributionController::class);
    Route::post('maps_gallery', [PropertyController::class, 'maps_gallery'])->name('maps_gallery');

    Route::post('/property_image/{id}', [GalleryController::class, 'store'])->name('property_image.store');
    Route::post('/property_gallery/{id}', [GalleryController::class, 'gallery_property'])->name('property_gallery.all');
    Route::apiResource('items_property', ItemsController::class);

    Route::apiResource('Profile', ProfileController::class);
    Route::post('update_password', [ProfileController::class, 'update_password'])->name('update_password');
});

// Route::get('password', [ProfileController::class, 'lock']);



include __DIR__ . '/referrals.php';
include __DIR__ . '/user.php';


// Route::apiResource('emails/verify', VerifyController::class);
