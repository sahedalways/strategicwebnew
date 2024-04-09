<?php

use App\Http\Controllers\HomeController;
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
