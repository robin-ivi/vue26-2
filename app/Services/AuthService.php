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

        if (isset($data['avatar'])) {
            $data['avatar'] = $data['avatar']->store('avatars', 'public');
        }
        
        $user = $this->userRepository->create($data);

        Auth::login($user);

        return $user;
    }

    public function login($credentials)
    {
        if (!Auth::guard()->attempt($credentials)) {
            return false;
        }
        return Auth::user();
    }

    public function logout($request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
