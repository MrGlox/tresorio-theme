<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

/**
 * Update JQuery version
 *
 * Front-end not excuted in the wp admin and the wp customizer (for compatibility reasons)
 * See: https://core.trac.wordpress.org/ticket/45130 and https://core.trac.wordpress.org/ticket/37110
 */
function jquery_manager()
{
    $wp_admin = is_admin();
    $wp_customizer = is_customize_preview();

    // jQuery
    if ($wp_admin || $wp_customizer) {
        // echo 'We are in the WP Admin or in the WP Customizer';
        return;
    } else {
        // Deregister WP core jQuery, see https://github.com/Remzi1993/wp-jquery-manager/issues/2 and https://github.com/WordPress/WordPress/blob/91da29d9afaa664eb84e1261ebb916b18a362aa9/wp-includes/script-loader.php#L226
        wp_deregister_script('jquery'); // the jquery handle is just an alias to load jquery-core with jquery-migrate
        // Deregister WP jQuery
        wp_deregister_script('jquery-core');
        // Deregister WP jQuery Migrate
        wp_deregister_script('jquery-migrate');

        // Register jQuery in the head
        wp_register_script('jquery-core', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), null, false);

        /**
         * Register jquery using jquery-core as a dependency, so other scripts could use the jquery handle
         * see https://wordpress.stackexchange.com/questions/283828/wp-register-script-multiple-identifiers
         * We first register the script and afther that we enqueue it, see why:
         * https://wordpress.stackexchange.com/questions/82490/when-should-i-use-wp-register-script-with-wp-enqueue-script-vs-just-wp-enque
         * https://stackoverflow.com/questions/39653993/what-is-diffrence-between-wp-enqueue-script-and-wp-register-script
         */
        wp_register_script('jquery', false, array('jquery-core'), null, false);
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'jquery_manager');

/**
 * Defer parsing of javascript.
 */
// add_filter('clean_url', function ($url) {
//     $wp_admin = is_admin();
//     $wp_customizer = is_customize_preview();

//     if ($wp_admin || $wp_customizer) {
//         // echo 'We are in the WP Admin or in the WP Customizer';
//         return $tag;
//     } else {
//         if (false === strpos($url, '.js')) {
//             return $url;
//         }

//         if (strpos($url, 'jquery.js')) {
//             return $url;
//         }

//         return "$url' defer ";
//         // return "$url' defer onload='";
//     }
// }, 11, 1);

/**
 * Helper function for prettying up errors
 *
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1.3', phpversion(), '>')) {
    $sage_error(__('You must be using PHP 7.1.3 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('5.2', get_bloginfo('version'), '>')) {
    $sage_error(__('You must be using WordPress 5.2 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    $sage_error(
        __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
        __('Autoloader not found.', 'sage')
    );
}
require_once $composer;

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(
            sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file),
            __('File not found', 'sage')
        );
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Enable sage features
 * @link https://roots.io/acorn/
 */
add_theme_support('sage');
Roots\bootloader();

if (WP_DEBUG_DISPLAY) {
    (new Rarst\wps\Plugin())->run();
}

/**
 * Handle templates in carbons fields
 */
function get_block_template($template, $args)
{
    $template = App\locate_template(['resources/views/' . $template . ".blade.php", 'resources/views/blocks/' . $template . '.blade.php']);
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);

    /*
     * This merges data available in blade templates with data from carbon fields as ${meta_key}
     */
    $data = array_merge($data, $args);

    if ($template) {
        echo App\template($template, $args);
    } else {
        echo sprintf(__("Template for block %s not found", 'sage'), $template);
    }
}

/**
 * Handle theme languages in carbons fields
 */
function crb_get_i18n_suffix()
{
    $suffix = '';
    if (!defined('ICL_LANGUAGE_CODE')) {
        return $suffix;
    }
    $suffix = '_' . ICL_LANGUAGE_CODE;
    return $suffix;
}

function crb_get_i18n_theme_option($option_name)
{
    $suffix = crb_get_i18n_suffix();
    return carbon_get_theme_option($option_name . $suffix);
}

add_filter('carbon_fields_map_field_api_key', 'crb_get_gmaps_api_key');
function crb_get_gmaps_api_key($key)
{
    return 'AIzaSyAIidIV-Eda70bpxEIZJ7AlJfr-GtdKSgw';
}

/**
 * Returns the primary term for the chosen taxonomy set by Yoast SEO
 * or the first term selected.
 *
 * @link https://www.tannerrecord.com/how-to-get-yoasts-primary-category/
 * @param integer $post The post id.
 * @param string  $taxonomy The taxonomy to query. Defaults to category.
 * @return array The term with keys of 'title', 'slug', and 'url'.
 */
function get_primary_taxonomy_term($post = 0, $taxonomy = 'category')
{
    if (!$post) {
        $post = get_the_ID();
    }

    $terms = get_the_terms($post, $taxonomy);
    $primary_term = array();

    if ($terms) {
        $term_display = '';
        $term_slug = '';
        $term_link = '';

        if (class_exists('WPSEO_Primary_Term')) {
            $wpseo_primary_term = new WPSEO_Primary_Term($taxonomy, $post);
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term = get_term($wpseo_primary_term);

            if (is_wp_error($term)) {
                $term_display = $terms[0]->name;
                $term_slug = $terms[0]->slug;
                $term_link = get_term_link($terms[0]->term_id);
            } else {
                $term_display = $term->name;
                $term_slug = $term->slug;
                $term_link = get_term_link($term->term_id);
            }
        } else {
            $term_display = $terms[0]->name;
            $term_slug = $terms[0]->slug;
            $term_link = get_term_link($terms[0]->term_id);
        }

        $primary_term['url'] = $term_link;
        $primary_term['slug'] = $term_slug;
        $primary_term['title'] = $term_display;
    }

    return $primary_term;
}

add_filter('upload_mimes', 'allow_myme_types', 1, 1);
function allow_myme_types($mime_types)
{
    $mime_types['json'] = 'application/json'; // Adding .json extension
    return $mime_types;
}
