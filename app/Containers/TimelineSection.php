<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class TimelineSection
{
    public function register()
    {
        Block::make('section_timeline', __('Timeline section'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('text', 'title', __('Main title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Content'))
                    ->set_required(),
                Field::make('image', 'media', __('Main image'))
                    ->set_required(),
                Field::make('complex', 'main_list', __('Links list'))
                    ->add_fields('main_item', array(
                        Field::make('text', 'year', __('Year'))
                            ->set_required(),
                        Field::make('complex', 'list', __('Links list'))
                            ->add_fields('item', array(
                                Field::make('text', 'date', __('Mounth'))
                                    ->set_required(),
                                Field::make('rich_text', 'content', __('Content'))
                                    ->set_required(),
                            )),

                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/timeline-section', $fields);
            });
    }
}
