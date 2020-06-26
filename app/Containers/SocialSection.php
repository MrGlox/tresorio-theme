<?php

namespace App\Containers;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use function Roots\view;

class SocialSection
{
    public function register()
    {
        Block::make('liens_reseaux_sociaux', __('Social medias'))
            ->add_fields(array(
                Field::make('complex', 'socials', __('Socials medias list'))
                    ->add_fields(array(
                        Field::make('select', 'type', __('Social media'))
                            ->add_options(array(
                                'default' => 'Sélectionner...',
                                'twitter' => 'Twitter',
                                'facebook' => 'Facebook',
                                'linkedin' => 'Linkedin',
                                'medium' => 'Medium',
                            ))
                            ->set_required(),
                        Field::make('urlpicker', 'link', __('Link redirection'))
                            ->set_required(),
                    )),
            ))
            ->set_render_callback(function ($fields) {
                echo view('blocks/socials', $fields);
            });
    }
}
