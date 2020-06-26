<?php

namespace App;

use function Roots\asset;

/**
 * Inject critical assets in head as early as possible
 */
add_action('wp_head', function () {
    if ('development' === env('WP_ENV')) {
        return;
    }

    if (is_front_page()) {
        $critical_CSS = asset('styles/front-page_critical.min.css');
    } elseif (is_home()) {
        $critical_CSS = asset('styles/home_critical.min.css');
    } elseif (is_singular()) {
        $critical_CSS = asset('styles/singular_critical.min.css');
    } else {
        $critical_CSS = asset('styles/landing_critical.min.css');
    }

    echo '<!-- Critical CSS -->';
    if (file_exists($critical_CSS->path())) {
        echo '<style id="critical-css">' . get_file_contents($critical_CSS->path()) . '</style>';
    }
}, 1);

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    if (is_page_template('page-contact.blade.php')) {
        wp_enqueue_script('google-maps', 'a key', [], null, true);
    }

    wp_enqueue_script('sage/vendor', asset('scripts/vendor.js')->uri(), ['jquery'], null, true);
    wp_enqueue_script('sage/app', asset('scripts/app.js')->uri(), ['sage/vendor', 'jquery'], null, true);

    wp_add_inline_script('sage/vendor', asset('scripts/manifest.js')->contents(), 'before');

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_dequeue_style('wp-block-library');

    $styles = ['styles/app.css'];

    foreach ($styles as $stylesheet) {
        if (asset($stylesheet)->exists()) {
            wp_enqueue_style('sage/' . basename($stylesheet, '.css'), asset($stylesheet)->uri(), false, null);
        }
    }

    // Add css only in admin side
    if (is_admin()) {
        wp_enqueue_style('wp-block-library');
        wp_enqueue_style('sage/' . basename('styles/editor-style.css', '.css'), asset('styles/editor-style.css')->uri(), false, null);
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');
    add_theme_support('soil-google-analytics', 'UA-140350651-1');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'utilities_navigation' => __('Utilities Navigation', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    add_image_size('logo', 150, 100);
    add_image_size('square', 60, 60, true);
    add_image_size('square-small', 25, 25);
    add_image_size('vertical', 50, 60);
    add_image_size('preview', 740, 460, true);
    add_image_size('preview-small', 560, 400, true);
    add_image_size('thumbnail-square', 400, 400);
    add_image_size('thumbnail-small', 350, 540);

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/tinymce.scss
     */
    add_editor_style(asset('styles/editor-style.css')->uri());

    /**
     * Use local translation
     */
    load_theme_textdomain('sage', get_template_directory() . '/resources/languages');
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar',
    ] + $config);

    register_sidebar([
        'name' => __('Footer column 1', 'sage'),
        'id' => 'footer-first',
    ] + $config);

    register_sidebar([
        'name' => __('Footer column 2', 'sage'),
        'id' => 'footer-second',
    ] + $config);

    // CUSTOM SIDEBARS
    register_sidebar([
        'name' => __('Header', 'sage'),
        'id' => 'header',
    ] + [
        'before_widget' => '<nav class="widget widget__menu %1$s %2$s">',
        'after_widget' => '</nav>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'name' => __('Newsletter block', 'sage'),
        'id' => 'footer-newsletter',
    ] + [
        'before_widget' => '<section class="widget widget__menu %1$s %2$s footer__newsletter newsletter">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="newsletter__title">',
        'after_title' => '</h2>',
    ]);
});
