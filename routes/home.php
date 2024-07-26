<?php

use App\Http\Controllers\Site\SearchingController;
use Illuminate\Support\Facades\Route;

Route::post('searching', [SearchingController::class, 'search']);
