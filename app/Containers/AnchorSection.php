<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class AnchorSection
{
    public function register()
    {
        Block::make('anchor_block', __('Anchor section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'anchor', __('Name'))
                    ->set_required(),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/anchor-section', $fields);
            });
    }
}
