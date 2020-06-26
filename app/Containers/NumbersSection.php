<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class NumbersSection
{
    public function register()
    {
        Block::make('section_numbers', __('Numbers section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'title', __('Main title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Content'))
                    ->set_required(),
                Field::make('urlpicker', 'link', __('Call to action')),
                Field::make('complex', 'list', __('Links list'))
                    ->add_fields('item', array(
                        Field::make('text', 'number', __('Number'))
                            ->set_width(50)
                            ->set_required(),
                        Field::make('text', 'unit', __('Unit'))
                            ->set_width(50),
                        Field::make('text', 'label', __('Content'))
                            ->set_required(),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/numbers-section', $fields);
            });
    }
}
