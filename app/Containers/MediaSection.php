<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class MediaSection
{
    public function register()
    {
        Block::make('section_de_contenu_avec_media', __('Content section with media'))
            ->set_category('custom-category', __('Custom blocs'), 'smiley')
            ->add_fields(array(
                Field::make('image', 'image', __('Decoration image')),
                Field::make('text', 'heading', __('Title'))
                    ->set_required(),
                Field::make('rich_text', 'content', __('Block content'))
                    ->set_required(),
                Field::make('complex', 'cta_button', __('Call to action'))
                    ->set_duplicate_groups_allowed(false)
                    ->add_fields('link', array(
                        Field::make('urlpicker', 'link', __('Link details'))
                            ->set_required(),
                    )),
                Field::make('image', 'preview', __('Preview media')),
                Field::make('complex', 'medias', __('Medias'))
                    ->add_fields('video', array(
                        Field::make('file', 'media', __('Media version'))
                            ->set_type(array('video/ogg', 'video/mp4', 'image'))
                            ->set_value_type('url')
                            ->set_required(),
                    )),
                Field::make('complex', 'list', __('Items'))
                    ->add_fields('item', array(
                        Field::make('text', 'number', __('Number'))
                            ->set_required(),
                        Field::make('text', 'unit', __('Unit')),
                        Field::make('text', 'label', __('Label'))
                            ->set_required(),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/media-section', $fields);
            });
    }
}
