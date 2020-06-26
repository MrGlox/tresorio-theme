<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Map extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.map',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'coords' => carbon_get_theme_option('map'),
        ];
    }
}
