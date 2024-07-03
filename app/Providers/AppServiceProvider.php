<?php

namespace App\Providers;

use App\Contracts\Services\IAuthService;
use App\Contracts\Services\IIdeaService;
use App\Contracts\Services\IUserService;
use App\Services\Api\AuthService;
use App\Services\Api\IdeaService;
use App\Services\Api\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IAuthService::class, function ($app) {
            return AuthService::boot();
        });

        $this->app->bind(IIdeaService::class, function ($app) {
            return IdeaService::boot();
        });

        $this->app->bind(IUserService::class, function ($app) {
            return UserService::boot();
        });
    }

    public function boot(): void {}
}
