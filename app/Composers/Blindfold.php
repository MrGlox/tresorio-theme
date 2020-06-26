<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Blindfold extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.blindfold',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'blindfold' => crb_get_i18n_theme_option('blindfold'),
            'blindfold_link' => crb_get_i18n_theme_option('blindfold_link'),
        ];
    }
}
