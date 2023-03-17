<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontController::class, 'show'])->name('home');
Route::get('/ambulances', [FrontController::class, 'ambulances'])->name('ambualance.list');
Route::get('/ambulances/{ambulance}', [FrontController::class, 'ambulanceDetails'])->name('ambualance.details');
Route::get('/checkout/{ambulance}', [FrontController::class, 'checkout'])->name('checkout');
Route::post('/book', [BookingController::class, 'book'])->name('book');
Route::get('login', [AuthController::class, 'show'])->name('login')->middleware(['guest']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'createUser']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('login', [AuthController::class, 'authenticate']);

Route::middleware(['auth', 'users'])->group(function () {
    Route::post('login/checkout', [BookingController::class, 'loginToCheckout'])->name('login.to.checkout');
    Route::get('/profile', [FrontController::class, 'profile'])->name('profile');
});

Route::middleware(['auth', 'admins'])->group(function () {
    Route::get('/dashboard',  [AdminController::class, 'show'])->name('dashboard');
    Route::get('/dashboard/hospitals',  [AdminController::class, 'hospitals'])->name('hospitals');
    Route::get('/dashboard/users',  [AdminController::class, 'users'])->name('users');
    Route::get('/dashboard/ambulances',  [AdminController::class, 'ambulances'])->name('ambulances');
    Route::get('/dashboard/bookings',  [AdminController::class, 'bookings'])->name('bookings');
});
