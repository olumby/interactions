<?php

namespace Lumby\Interactions;

use Illuminate\Support\ServiceProvider;
use Lumby\Interactions\Console\Commands\InteractionMakeCommand;

class InteractionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InteractionMakeCommand::class
            ]);
        }
    }
}

