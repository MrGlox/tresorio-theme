<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class TabSection
{
    public function register()
    {
        Block::make('tabs_section', __('Tabs section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'title', __('Main title')),
                Field::make('complex', 'tabs', __('Tabs list'))
                    ->add_fields('slide', array(
                        Field::make('image', 'icon', __('Tab icon'))
                            ->set_value_type('url'),
                        Field::make('text', 'category', __('Category')),
                        Field::make('text', 'title', __('Title')),
                        Field::make('rich_text', 'content', __('Content')),
                        Field::make('urlpicker', 'link', __('Link details')),
                        Field::make('separator', 'separator', __('Tab media')),
                        Field::make('file', 'media', __('Tab movie')),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/tabs-section', $fields);
            });
    }
}
