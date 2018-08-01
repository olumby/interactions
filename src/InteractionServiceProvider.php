<?php

namespace Lumby\Interactions;

use Illuminate\Support\ServiceProvider;
use Lumby\Interactions\Console\Commands\InteractionMakeCommand;

class InteractionServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            InteractionMakeCommand::class
        ]);
    }
}

