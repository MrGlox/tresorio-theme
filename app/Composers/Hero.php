<?php
namespace App\Composers;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Roots\Acorn\View\Composer;

class Hero extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.hero',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function register()
    {
        Container::make('post_meta', __('Hero section'))
            ->where('post_id', '=', get_option('page_on_front'))
            ->or_where('post_template', '=', 'page-product.blade.php')
            ->add_fields(array(
                Field::make('text', 'title', __('Title'))
                    ->set_required(),
                Field::make('rich_text', 'description', __('Description'))
                    ->set_required(),
                Field::make('urlpicker', 'link', __('Link details')),
                Field::make('image', 'media', __('Main image'))
                    ->set_width(30)
                    ->set_required(),
                Field::make('file', 'animation_data', __('Animation data'))
                    ->set_width(70)
                    ->set_value_type('url'),
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
            'description' => carbon_get_the_post_meta('description'),
            'link' => carbon_get_the_post_meta('link'),
            'media' => carbon_get_the_post_meta('media'),
            'animation_data' => carbon_get_the_post_meta('animation_data'),
        ];
    }
}
