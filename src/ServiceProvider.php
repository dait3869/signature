<?php

namespace Haiju\Signature;

use Illuminate\Support\ServiceProvider as LaravelProvider;

class ServiceProvider extends LaravelProvider
{
    /**
     * Register services.
     */
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->setupConfig();
    }

    protected function setupConfig(): void
    {
        $source = realpath(__DIR__ . '/../config/e-signature.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([$source => \config_path('e-signature.php')], 'haiju-e-signature');
        }

        $this->mergeConfigFrom($source, 'e-signature');
    }
}
