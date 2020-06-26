<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class ServerSection
{
    public function register()
    {
        Block::make('server_section', __('Animated server bloc'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'title', __('Main title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Content'))
                    ->set_required(),
                Field::make('text', 'sub_title', __('Secondary title'))
                    ->set_required(),
                Field::make('urlpicker', 'link', __('Link details'))
                    ->set_required(),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/server-section', $fields);
            });
    }
}
