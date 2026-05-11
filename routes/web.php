<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::controller(HomeController::class)->group(function(){

    /* HOME */

    Route::get('/','home')
        ->name('home');

    /* ABOUT */

    Route::get('/about','about')
        ->name('about');

    /* SERVICES */

    Route::get('/services','services')
        ->name('services');

    /* CONTACT */

    Route::get('/contact','contact')
        ->name('contact');

});
