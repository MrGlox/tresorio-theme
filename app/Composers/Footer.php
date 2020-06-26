<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.footer',
        'partials.contact-footer',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'brand' => carbon_get_theme_option('brand'),
            'address' => crb_get_i18n_theme_option('address'),
            'socials' => crb_get_i18n_theme_option('socials'),
            'copyright' => crb_get_i18n_theme_option('copyright'),
        ];
    }
}
