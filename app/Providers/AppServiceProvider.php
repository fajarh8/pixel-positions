<?php

namespace App\Providers;

use App\Events\StockUpdated;
use App\Listeners\GoodPurchased;
use App\Listeners\GoodSold;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $listen = [
        StockUpdated::class => [
            GoodSold::class,
            GoodPurchased::class
        ]
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Event::listen(
        //     StockUpdated::class,
        //     [GoodSold::class, GoodPurchased::class],
        // );
    }
}
