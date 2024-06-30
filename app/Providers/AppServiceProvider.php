<?php

namespace App\Providers;

use App\Models\Author;
use App\Observers\AuthorObserver;
use App\Services\Api\AuthService;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\IAuthService;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(IAuthService::class, AuthService::class);
    }


    public function boot(): void
    {

    }
}
