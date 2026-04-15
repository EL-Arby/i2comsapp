<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaperController;


// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/call-for-papers', [PageController::class, 'callForPapers'])->name('call_for_papers');
Route::get('/committees', [PageController::class, 'committees'])->name('committees');
Route::get('/program', [PageController::class, 'program'])->name('program');
Route::get('/registration', [PageController::class, 'registration'])->name('registration');

Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
Route::post('/paper-submit', [PaperController::class, 'store'])->name('paper.submit');
