<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class PressArticlesSection
{
    public function register()
    {
        Block::make('section_press_articles', __('Press list section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'heading', __('Title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Content')),
                Field::make('complex', 'articles', __('Articles list'))
                    ->add_fields(array(
                        Field::make('date', 'date', __('Posted article date'))
                            ->set_required(),
                        Field::make('image', 'image', __('Image')),
                        Field::make('text', 'title', __('Title'))
                            ->set_required(),
                        Field::make('urlpicker', 'link', __('Link details'))
                            ->set_required(),
                        Field::make('file', 'media', __('Media version'))
                            ->set_value_type('url'),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/press-articles-section', $fields);
            });
    }
}
