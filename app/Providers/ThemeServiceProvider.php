<?php

namespace App\Providers;

use function Roots\app;
use function Roots\config;
use Roots\Acorn\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        add_action('carbon_fields_register_fields', function () {
            if (is_null(config('view')) && config('app.preflight')) {
                app('files')->copy(realpath(__DIR__ . '/../config/view.php'), app()->configPath('view.php'));
            }

            collect(config('view.composers'))
                ->each(function ($container) {
                    if (is_string($container)) {
                        $container = new $container($this);
                    }

                    if (method_exists($container, 'register')) {
                        $container->register();
                    }
                });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Boot Carbon Fields
         */
        add_action('after_setup_theme', function () {
            // \Carbon_Fields\Carbon_Fields::directory_to_url( 'vendor/htmlburger/carbon-fields' )
            \Carbon_Fields\Carbon_Fields::boot();
        });
    }
}
