<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/call-for-papers', [PageController::class, 'callForPapers'])->name('call_for_papers');
Route::get('/committees', [PageController::class, 'committees'])->name('committees');
Route::get('/speakers', [PageController::class, 'speakers'])->name('speakers');
Route::get('/workshops', [PageController::class, 'workshops'])->name('workshops');
Route::get('/hotels', [PageController::class, 'hotels'])->name('hotels');
Route::get('/exhibitions', [PageController::class, 'exhibitions'])->name('exhibitions');
Route::get('/sponsors', [PageController::class, 'sponsors'])->name('sponsors');
Route::get('/program', [PageController::class, 'program'])->name('program');
Route::get('/registration', [PageController::class, 'registration'])->name('registration');
Route::get('/previous-editions', [PageController::class, 'previousEditions'])->name('previous_editions');

Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
Route::post('/paper-submit', [PaperController::class, 'store'])->name('paper.submit');

// Route::middleware('guest')->group(function () {
//     Route::get('/user/login', [AuthController::class, 'showLoginForm'])->name('user.login');
//     Route::get('/user/login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('/user/login', [AuthController::class, 'login'])->name('user.login.submit');
// });

Route::middleware('guest')->group(function () {
    Route::get('/user/login', [AuthController::class, 'showLoginForm'])
        ->name('user.login');

    Route::post('/user/login', [AuthController::class, 'login'])
        ->name('user.login.submit');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');
Route::post('/user/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::middleware('auth')->get('/user/dashboard', [AuthController::class, 'dashboard'])->name('user.dashboard');
Route::middleware('auth')->get('/user/payment', [AuthController::class, 'paymentPage'])->name('user.payment');
