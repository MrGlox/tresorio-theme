<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class OffsetElement
{
    public function register()
    {
        Block::make('offset_image', __('Decoration image'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('image', 'main_image', __('Main image'))
                    ->set_required(),
                Field::make('checkbox', 'over_size', __('Over size effect between sections')),
                Field::make('checkbox', 'offset_right', __('Basically the image will be on the left, check to pass it on the right')),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/offset-element', $fields);
            });
    }
}
