<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class ArticlesSection
{
    public function register()
    {
        Block::make('section_articles', __('Articles section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'heading', __('Title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Content')),
                Field::make('association', 'articles')
                    ->set_types(array(
                        array(
                            'type' => 'term',
                            'taxonomy' => 'category',
                        ),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/short-archives-section', $fields);
            });
    }
}
