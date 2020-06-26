<?php

namespace App\Providers;

use function Roots\app;
use function Roots\config;
use Roots\Acorn\ServiceProvider;

class ContainerServiceProvider extends ServiceProvider
{
    /**
     * Register and compose containers.
     *
     * @return void
     */
    public function register()
    {
        add_action('carbon_fields_register_fields', function () {
            if (is_null(config('containers')) && config('app.preflight')) {
                app('files')->copy(realpath(__DIR__ . '/../config/containers.php'), app()->configPath('containers.php'));
            }

            collect(config('containers.containers'))
                ->each(function ($container) {
                    if (is_string($container)) {
                        $container = new $container($this);
                    }

                    $container->register();
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
