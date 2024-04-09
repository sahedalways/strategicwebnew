<?php

// frontend controllers are below
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Clear route cache:
Route::get('/clear', function () {
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Routes cache has been cleared';
});

Route::get('/', function () {
    return view('frontend.home');
});

Auth::routes();

// navigate to the home page
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

// pages api here
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('about');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contact');
Route::get('/services', [PagesController::class, 'services'])->name('service');
Route::get('/press', [PagesController::class, 'press'])->name('press');
