<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class LogoSlider
{
    public function register()
    {
        Block::make('section_de_logos', __('Logos section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'title', __('Title')),
                Field::make('complex', 'logos', __('Slider list'))
                    ->add_fields('logo', array(
                        Field::make('image', 'image', __('Profile picture')),
                        Field::make('urlpicker', 'link', __('Link details')),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/logo-slider', $fields);
            });
    }
}
