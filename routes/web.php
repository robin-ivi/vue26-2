<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use Krishna\GoogleAuth\Controllers\GoogleController;
use Symfony\Component\HttpFoundation\Request;

Route::middleware(['web'])->group(function () {
    Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google');
    Route::get('/auth/google/callback', [GoogleController::class, 'callback']);
});

Route::get('/', function (Request $request) {
    return inertia('Home', [
        'users' => User::when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
        })->paginate(3)->withQueryString(),

        'can' => [
            'deleteUser' => Auth::user() ? Auth::user()->can('delete', User::class) : false,
        ],
    ]);
})->name('home');

Route::inertia('/register', 'Register')->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::inertia('/login', 'Login')->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::inertia('/dashboard', 'Dashboard')->name('dashboard')->middleware('auth');
// Route::get('/', function () {
//     return Inertia::render('Home', [
//         'test' => 'Hello'
//     ]);
// })->name('home');

Route::get('/about', function () {
    sleep(2);
    return Inertia::render('About');
})->name('about');
