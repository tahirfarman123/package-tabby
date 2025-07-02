<?php

namespace muazzamkhan\Tabby;

use Illuminate\Support\ServiceProvider;

class TabbyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tabby.php', 'tabby');

        $this->app->singleton('tabby', function () {
            return new Tabby(
                config('tabby.public_key'),
                config('tabby.secret_key'),
                config('tabby.base_url')
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/tabby.php' => config_path('tabby.php'),
        ], 'tabby-config');
    }
}
