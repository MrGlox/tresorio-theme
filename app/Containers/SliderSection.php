<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class SliderSection
{
    public function register()
    {
        Block::make('slider_section', __('Slider section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'heading', __('Title')),
                Field::make('complex', 'slider', __('Slider list'))
                    ->add_fields('slide', array(
                        Field::make('rich_text', 'content', __('Content')),
                        Field::make('image', 'image', __('User picture')),
                        Field::make('text', 'name', __('Firstname and lastname')),
                        Field::make('text', 'job', __('Job and company')),
                        Field::make('urlpicker', 'link', __('Link details')),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/slider-section', $fields);
            });
    }
}
