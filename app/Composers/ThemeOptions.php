<?php

namespace App\Composers;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Roots\Acorn\View\Composer;

class ThemeOptions extends Composer
{
    public function register()
    {
        // Add class to menu
        Container::make('nav_menu_item', __('Menu Settings'))
            ->add_fields(array(
                Field::make('text', 'class_list', 'Custom class'),
            ));

        $basic_options_container = Container::make('theme_options', __('Theme Options'))
            ->add_fields(array(
                Field::make('image', 'logo', __('Main logo'))
                    ->set_required(),
                Field::make('image', 'logo_light', __('Main logo light'))
                    ->set_required(),
            ));

        Container::make('theme_options', __('Global settings'))
            ->set_page_parent($basic_options_container)
            ->add_tab(__('Socials links'), array(
                Field::make('complex', 'socials' . crb_get_i18n_suffix(), __('Socials list'))
                    ->add_fields(array(
                        Field::make('select', 'type', __('Social media'))
                            ->add_options(array(
                                'twitter' => 'Twitter',
                                'facebook' => 'Facebook',
                                'linkedin' => 'Linkedin',
                                'medium' => 'Medium',
                            ))
                            ->set_required(),
                        Field::make('urlpicker', 'link', __('Link redirection'))
                            ->set_required(),
                    )),
            ));

        Container::make('theme_options', __('Coords'))
            ->set_page_parent($basic_options_container) // reference to a top level container
            ->add_fields(array(
                Field::make('image', 'brand', __('Secondary branding'))
                    ->set_required(),
                Field::make('rich_text', 'address' . crb_get_i18n_suffix(), __('Contact address')),
            ));

        Container::make('theme_options', __('Band'))
            ->set_page_parent($basic_options_container) // reference to a top level container
            ->add_tab(__('Band'), array(
                Field::make('rich_text', 'blindfold' . crb_get_i18n_suffix(), 'Text'),
                Field::make('urlpicker', 'blindfold_link' . crb_get_i18n_suffix(), 'Link'),
            ));

        Container::make('theme_options', __('Google map'))
            ->set_page_parent($basic_options_container) // reference to a top level container
            ->add_tab(__('Map'), array(
                Field::make('map', 'map', __('Map'))
                    ->set_help_text(__('Drag and drop the pin on the map to select location')),
            ));

        Container::make('theme_options', __('Page 404'))
            ->set_page_parent($basic_options_container) // reference to a top level container
            ->add_tab(__('Title'), array(
                Field::make('text', 'title' . crb_get_i18n_suffix(), __('Main message')),
            ));

        // Add second options page under 'Basic Options'
        Container::make('theme_options', __('Footer'))
            ->set_page_parent($basic_options_container) // reference to a top level container
            ->add_tab(__('Copyright'), array(
                Field::make('text', 'copyright' . crb_get_i18n_suffix(), 'Main content')
                    ->set_required(),
            ));

        Container::make('nav_menu_item', __('Menu Settings'))
            ->add_fields(array(
                Field::make('image', 'icon', __('Item icon')),
            ));
    }
}
