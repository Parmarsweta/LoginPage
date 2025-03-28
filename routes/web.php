<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginPageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/customer/register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('customer.register');
Route::post('/customer/register', [CustomerRegisterController::class, 'register']);




// Customer login routes
Route::get('/customer/login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [CustomerLoginController::class, 'login']);
Route::post('/customer/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');

Route::middleware(['auth:customer'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard'); // Create this view for the customer dashboard
    })->name('customer.dashboard');
});





//multiple users
Route::get('registration', function () {
    return view('auth.registration');
})->name('registration');

Route::post('registration', [RegistrationController::class, 'registration']);

Route::get('loginPage', function () {
    return view('auth.loginPage');
})->name('loginPage');

Route::post('loginPage', [LoginPageController::class, 'loginPage']);


Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return 'Admin Dashboard';
    })->name('admin.dashboard');
});

Route::middleware('auth:doctor')->group(function () {
    Route::get('/doctor/dashboard', function () {
        return 'Doctor Dashboard';
    })->name('doctor.dashboard');
});

Route::middleware('auth:staff')->group(function () {
    Route::get('/staff/dashboard', function () {
        return 'Staff Dashboard';
    })->name('staff.dashboard');
});

Route::get('change-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'gu', 'hi'])) {
        session(['locale' => $lang]);
        app()->setLocale($lang);
    }
    return redirect()->back();
});



Route::get('/students/create', [StudentController::class, 'index'])->name('students.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');


Route::get('/patient/{slug}/edit', [PatientController::class, 'edit'])->name('patient.edit');
Route::post('/patient/{slug}/update', [PatientController::class, 'update'])->name('patient.update');

//orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
/****** Product  ****/
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/download-pdfs', [ProductController::class, 'downloadPDFs'])->name('download.pdfs');
