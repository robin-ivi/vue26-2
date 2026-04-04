<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use Krishna\GoogleAuth\Controllers\GoogleController;

Route::middleware(['web'])->group(function () {
    Route::get('/auth/google', [GoogleController::class, 'redirect']);
    Route::get('/auth/google/callback', [GoogleController::class, 'callback']);
});

Route::inertia('/', 'Home')->name('home');
Route::inertia('/register', 'Register')->name('register');
Route::post('/register', [AuthController::class, 'register']);
// Route::get('/', function () {
//     return Inertia::render('Home', [
//         'test' => 'Hello'
//     ]);
// })->name('home');

Route::get('/about', function () {
    sleep(2);
    return Inertia::render('About');
})->name('about');