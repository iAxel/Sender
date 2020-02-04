<?php

namespace iAxel\Sender\Providers;

use iAxel\Sender\Sender;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class SenderServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/sender.php' => config_path('sender.php'),
        ], 'sender-config');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/sender.php',
            'sender'
        );

        $this->app->singleton(Sender::class, function () {
            return new Sender($this->app['config']['sender']);
        });
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            Sender::class,
        ];
    }
}
