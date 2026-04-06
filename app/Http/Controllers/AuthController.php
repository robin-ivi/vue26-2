<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->authService->register($request->validated());
        return to_route('dashboard');
    }

    public function login(LoginRequest $request)
    {
        $user = $this->authService->login($request->validated());
        if (!$user) {
            return back()->withErrors([
                'email' => 'Invalid credentials'
            ]);
        }

        return to_route('dashboard');
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return to_route('login');
    }

    public function dashboard() 
    {
        return inertia('dashboard');
    }
}
