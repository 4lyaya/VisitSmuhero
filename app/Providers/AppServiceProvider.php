<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register services
        $this->app->bind(
            \App\Services\GuestService::class,
            function ($app) {
                return new \App\Services\GuestService(
                    $app->make(\App\Repositories\GuestRepository::class)
                );
            }
        );

        $this->app->bind(
            \App\Services\TeacherService::class,
            function ($app) {
                return new \App\Services\TeacherService(
                    $app->make(\App\Repositories\TeacherRepository::class)
                );
            }
        );

        $this->app->bind(
            \App\Services\UserService::class,
            function ($app) {
                return new \App\Services\UserService(
                    $app->make(\App\Repositories\UserRepository::class)
                );
            }
        );
    }

    public function boot(): void
    {
        //
    }
}
