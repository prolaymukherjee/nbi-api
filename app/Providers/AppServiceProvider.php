<?php

namespace App\Providers;

use App\Models\Author;
use App\Observers\AuthorObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }


    public function boot(): void
    {

    }
}
