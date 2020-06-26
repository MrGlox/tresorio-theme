<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class EntrySection
{
    public function register()
    {
        Block::make('section_de_contenu_avec_image', __('Content section'))
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
                Field::make('complex', 'cta_button', __('Call to action'))
                    ->set_duplicate_groups_allowed(false)
                    ->add_fields('link', array(
                        Field::make('urlpicker', 'link', __('Link details'))
                            ->set_required(),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/entry-section', $fields);
            });
    }
}
