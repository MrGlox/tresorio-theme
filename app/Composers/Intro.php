<?php
namespace App\Composers;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Roots\Acorn\View\Composer;

class Intro extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.intro',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function register()
    {
        Container::make('post_meta', __('Introduction section'))
            ->where('post_id', '!=', get_option('page_on_front'))
            ->where('post_template', '=', 'page-about.blade.php')
            ->or_where('post_template', '=', 'page-legal-notice.blade.php')
            ->or_where('post_template', '=', 'page-press.blade.php')
            ->add_fields(array(
                Field::make('text', 'title', __('Title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Content')),
                Field::make('complex', 'cta_button', __('Link'))
                    ->set_duplicate_groups_allowed(false)
                    ->add_fields(array(
                        Field::make('urlpicker', 'link', __('Link details'))
                            ->set_required(),
                        Field::make('file', 'media', __('File'))
                            ->set_value_type('url'),
                    )),
            ));
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'title' => carbon_get_the_post_meta('title'),
            'content' => carbon_get_the_post_meta('content'),
            'cta_button' => carbon_get_the_post_meta('cta_button'),
        ];
    }
}
