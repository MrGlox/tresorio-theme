<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class ListSection
{
    public function register()
    {
        Block::make('section_list_classic', __('List section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'title', __('Main title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Content'))
                    ->set_required(),
                Field::make('complex', 'list', __('Links list'))
                    ->add_fields('item', array(
                        Field::make('image', 'icon', __('Icon'))
                            ->set_value_type('url')
                            ->set_required(),
                        Field::make('text', 'title', __('Title'))
                            ->set_required(),
                        Field::make('rich_text', 'content', __('Content'))
                            ->set_required(),

                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/list-section', $fields);
            });
    }
}
