<?php

namespace App\Composers;

use Log1x\Navi\NaviFacade as Navi;
use Roots\Acorn\View\Composer;

class CallToAction extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.cta',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'cta' => $this->cta(),
        ];
    }

    /**
     * Returns the primary cta.
     *
     * @return array
     */
    public function cta()
    {
        return Navi::build('utilities_navigation')->toArray();
    }
}
