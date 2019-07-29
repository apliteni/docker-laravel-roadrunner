<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Broadcasting\BroadcastManager;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param BroadcastManager $broadcast_manager
     *
     * @return void
     */
    public function boot(BroadcastManager $broadcast_manager)
    {
        $broadcast_manager->routes();

        require base_path('routes/channels.php');
    }
}
