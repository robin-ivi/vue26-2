<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $userRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($data)
    {
        $data['password'] = bcrypt($data['password']);

        $user = $this->userRepository->create($data);

        Auth::login($user);

        return $user;
    }

    public function login($credentials)
    {
        if (!auth()->attempt($credentials)) {
            return false;
        }
        return auth()->user();
    }

    public function logout($request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
