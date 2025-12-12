<?php

namespace App\Providers;

use App\Repositories\EventRepository;
use App\Repositories\IEventRepository;
use App\Repositories\IOrganiserRepository;
use App\Repositories\OrganiserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IEventRepository::class, EventRepository::class);
        $this->app->bind(IOrganiserRepository::class, OrganiserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
