<?php

namespace App\Services\Api;

use App\Contracts\Services\IAuthService;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;


class AuthService implements IAuthService
{
    public function login(array $credentials): ?User
    {
        if (!$token = JWTAuth::attempt($credentials)) {
            return;
        }

        $user = Auth::user();
        $user->token = $token;

        return $user;
    }
}
