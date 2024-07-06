<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Listeners\NotificationEventListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            NotificationEventListener::class,
        ],
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
