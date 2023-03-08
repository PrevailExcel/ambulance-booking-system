<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [FrontController::class, 'show']);
Route::get('/ambulances', [FrontController::class, 'ambulances'])->name('ambualance.list');
Route::get('/ambulances/{ambulance}', [FrontController::class, 'ambulanceDetails'])->name('ambualance.details');
Route::get('/checkout/{ambulance}', [FrontController::class, 'checkout'])->name('checkout');
Route::get('/profile', [FrontController::class, 'profile'])->middleware(['auth', 'users'])->name('profile');

Route::get('login', [AuthController::class, 'show'])->name('login');
Route::post('login', [AuthController::class, 'authenticate']);

Route::middleware(['auth', 'admins'])->group(function () {
    Route::get('/dashboard',  [AdminController::class, 'show'])->name('dashboard');
    Route::get('/dashboard/hospitals',  [AdminController::class, 'hospitals'])->name('hospitals');
    Route::get('/dashboard/users',  [AdminController::class, 'users'])->name('users');
    Route::get('/dashboard/ambulances',  [AdminController::class, 'ambulances'])->name('ambulances');
});
