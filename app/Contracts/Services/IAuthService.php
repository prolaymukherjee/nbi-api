<?php

namespace App\Contracts\Services;

use App\Models\User;

interface IAuthService
{
    public function login(array $credentials): ?User;
}
