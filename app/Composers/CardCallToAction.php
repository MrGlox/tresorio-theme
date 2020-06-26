<?php
namespace App\Composers;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Roots\Acorn\View\Composer;

class CardCallToAction extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'components.card-cta',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function register()
    {
        Container::make('post_meta', __("Card into the articles list"))
            ->where('post_id', '=', get_option('page_for_posts'))
            ->add_fields(array(
                Field::make('complex', 'card', __('Card details'))
                    ->set_duplicate_groups_allowed(false)
                    ->add_fields(array(
                        Field::make('text', 'title', __('Title'))
                            ->set_required(),
                        Field::make('rich_text', 'description', __('Description'))
                            ->set_required(),
                        Field::make('urlpicker', 'link', __('Link details'))
                            ->set_required(),
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
            'card' => carbon_get_the_post_meta('card'),
        ];
    }
}
