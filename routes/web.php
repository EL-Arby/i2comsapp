<?php

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
Route::get('/sponsors', [PageController::class, 'sponsors'])->name('sponsors');
Route::get('/program', [PageController::class, 'program'])->name('program');
Route::get('/registration', [PageController::class, 'registration'])->name('registration');

Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
Route::post('/paper-submit', [PaperController::class, 'store'])->name('paper.submit');
