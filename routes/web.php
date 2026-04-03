<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use Krishna\GoogleAuth\Controllers\GoogleController;

Route::middleware(['web'])->group(function () {
    Route::get('/auth/google', [GoogleController::class, 'redirect']);
    Route::get('/auth/google/callback', [GoogleController::class, 'callback']);
});

Route::get('/', function () {
    return Inertia::render('Home', [
        'test' => 'Hello'
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About');
});