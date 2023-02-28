<?php

namespace Eolica\LaravelHubspot;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

final class HubspotServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/hubspot.php' => config_path('hubspot.php'),
            ], 'config');
        }
    }

    public function register(): void
    {
        $this->registerHubspotManager();
    }

    public function provides(): array
    {
        return ['hubspot'];
    }

    private function registerHubspotManager(): void
    {
        $this->app->singleton('hubspot', function (Container $app) {
            return new HubspotManager($app['config'], new HubspotFactory());
        });

        $this->app->alias('hubspot', HubspotManager::class);
    }
}
