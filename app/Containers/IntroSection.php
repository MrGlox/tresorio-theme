<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class IntroSection
{
    public function register()
    {
        Block::make('intro_section', __('Introduction section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'heading', __('Title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Block content'))
                    ->set_required(),
                Field::make('complex', 'main_image', __('Image block'))
                    ->set_duplicate_groups_allowed(false)
                    ->add_fields('image', array(
                        Field::make('image', 'image', __('Main image')),
                        Field::make('checkbox', 'over_size', __('Over size effect between sections')),
                    )),
                Field::make('complex', 'list', __('Items list'))
                    ->add_fields('item', array(
                        Field::make('text', 'titre', __('Label')),
                        Field::make('rich_text', 'content', __('Content')),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/intro-section', $fields);
            });
    }
}
