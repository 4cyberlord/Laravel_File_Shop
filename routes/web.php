<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCreateController;
use App\Http\Controllers\ProductIndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeOnboardingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class);
Route::get('/onboarding', [StripeOnboardingController::class, 'index'])->name('onboarding');
Route::get('/onboarding/redirect', [StripeOnboardingController::class, 'redirect'])->name('onboarding.redirect');
Route::get('/onboarding/verify', [StripeOnboardingController::class, 'verify'])->name('onboarding.verify');

Route::get('/dashboard', DashboardController::class)->name('dashboard');
Route::get('/products', ProductIndexController::class)->name('products');
Route::get('/products/create', ProductCreateController::class)->name('products.create');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
