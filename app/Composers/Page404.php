<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Page404 extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '404',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'title' => crb_get_i18n_theme_option('title'),
        ];
    }
}
