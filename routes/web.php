<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// frontend controllers here
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterTabController;

// backend controllers are below
use App\Http\Controllers\Admin\Article\ArticleController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\PaymentController;

//Clear route cache:
Route::get('/clear', function () {
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Routes cache has been cleared';
});


Auth::routes();


// navigate to the home or dashboard page
Route::get('/', function (Request $request) {
    if (Auth::check()) {
        $userType = Auth::user()->user_type;

        if ($userType == 'admin' || $userType == 'manager') {
            return redirect()->route('dashboard');
        } elseif ($userType == 'user') {
            return view('frontend.home');
        }
    } else {
        return view('frontend.home');
    }
})->name('home');


// only authenticated users and admin can access the below routes
Route::middleware('is_user')->group(
    function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

        // only admin and accountant can access below routes
        Route::middleware('is_admin_manager')->group(
            function () {
                // customers
                Route::resource('customer', CustomerController::class);
                Route::get('customer/status/{id}', [CustomerController::class, 'status'])->name('customer_status');
                Route::post('customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer_destroy');

                // articles route here
                Route::resource('article', ArticleController::class);
            }
        );
    }
);

// pages api here
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('about');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contact');
Route::get('/services', [PagesController::class, 'services'])->name('service');
Route::get('/press', [PagesController::class, 'press'])->name('press');

//contact us api
Route::post('/submit-contact-message', [ContactUsController::class, 'submitContactMessage'])->name('submit-contact-message');

// register tab api
Route::get('/register-process', [RegisterTabController::class, 'getRegisterTab'])->name('register.tab');


// checkout api's here
// Route::get('/checkout', [BookingController::class, 'checkout'])->name('checkout');
Route::post('/stripe', [PaymentController::class, 'paymentWithStripe'])->name('stripe');
Route::get('/success', [PaymentController::class, 'success'])->name('success');
Route::get('/cancel', [PaymentController::class, 'cancel'])->name('cancel');
