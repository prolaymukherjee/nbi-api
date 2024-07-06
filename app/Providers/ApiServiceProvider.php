<?php

namespace App\Providers;

use App\Contracts\Repositories\IdeaRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\AuthServiceInterface;
use App\Contracts\Services\IdeaServiceInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Repositories\IdeaRepository;
use App\Repositories\UserRepository;
use App\Services\Api\AuthService;
use App\Services\Api\IdeaService;
use App\Services\Api\UserService;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(IdeaRepositoryInterface::class, IdeaRepository::class);

        $this->app->bind(AuthServiceInterface::class, function ($app) {
            return AuthService::boot();
        });

        $this->app->bind(IdeaServiceInterface::class, function ($app) {
            return new IdeaService($app->make(IdeaRepositoryInterface::class));
        });

        $this->app->bind(UserServiceInterface::class, function ($app) {
            return new UserService($app->make(UserRepositoryInterface::class));
        });
    }

    public function boot(): void
    {
        //
    }
}
