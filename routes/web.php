<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController as UserCheckout;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
use Laravel\Socialite\Facades\Socialite;
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

Route::get('/', function () {
  return view('welcome');
})->name('welcome');

// Socialite routers
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');


// midtrans router
Route::get('payment/success', [UserCheckout::class, 'midtransCallback']);
Route::post('payment/success', [UserCheckout::class, 'midtransCallback']);


Route::middleware(['auth'])->group(function () {
  // Checkout
  Route::get('checkout/success', [UserCheckout::class, 'success'])->name('checkout.success')->middleware('ensureUserRole:user');
  Route::get('checkout/{camp:slug}', [UserCheckout::class, 'create'])->name('checkout.create')->middleware('ensureUserRole:user');
  Route::post('checkout/{camp}', [UserCheckout::class, 'store'])->name('checkout.store')->middleware('ensureUserRole:user');

  //  dashoard
  Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

  // User Dashboard
  Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function () {
    Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
  });
  // Admin Dashboard
  Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function () {
    Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::post('checkout/{checkout}', [AdminCheckout::class, 'update'])->name('checkout.update');
  });
});



require __DIR__ . '/auth.php';
