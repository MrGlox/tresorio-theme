<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.header',
        'partials.contact-header',
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
            'brand' => $this->brand(),
            'blindfold' => crb_get_i18n_theme_option('blindfold'),
            'blindfold_link' => crb_get_i18n_theme_option('blindfold_link'),
            'links' => crb_get_i18n_theme_option('cta_urls'),
        ];
    }

    public function brand()
    {
        return [
            'logo' => carbon_get_theme_option('logo'),
            'logo_light' => carbon_get_theme_option('logo_light'),
        ];
    }
}
