<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class RenderingSection
{
    public function register()
    {
        Block::make('rendering_section', __('Section rendering packs'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'title', __('Main title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Content')),
                Field::make('complex', 'cards', __('Cards list'))
                    ->add_fields('item', array(
                        Field::make('text', 'title', __('Powerpack title')),
                        Field::make('text', 'short', __('Short label')),
                        Field::make('complex', 'hardware_list', __('Components list'))
                            ->add_fields('hardware_item', array(
                                Field::make('file', 'icon', __('Icon')),
                                Field::make('text', 'label', __('Component label')),
                            )),
                        Field::make('text', 'price', __('Price')),
                        Field::make('urlpicker', 'link', __('Link details')),
                    )),
                Field::make('text', 'subtitle', __('Calculations title block'))
                    ->set_required(),
                Field::make('urlpicker', 'link', __('Calculations link')),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/rendering-section', $fields);
            });
    }
}
