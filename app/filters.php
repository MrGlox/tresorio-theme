<?php

namespace App;

use function Roots\view;

/**
 * Async to javascripts
 */
add_filter('script_loader_tag', function ($tag, $handle) {
    $wp_admin = is_admin();
    $wp_customizer = is_customize_preview();

    if ($wp_admin || $wp_customizer) {
        // echo 'We are in the WP Admin or in the WP Customizer';
        return $tag;
    } else {
        if (false === stripos($tag, 'async')) {
            $tag = str_replace(' src', ' async src', $tag);
        }

        if (false === stripos($tag, 'defer')) {
            $tag = str_replace('<script ', '<script defer ', $tag);
        }

        return $tag;
    }
}, 10, 2);

// Adapted from https://gist.github.com/toscho/1584783
// add_filter('clean_url', function ($url) {
//     if (false === strpos($url, '.js')) { // not our file
//         return $url;
//     }
//
//     // Must be a ', not "!
//     return "$url' defer='defer";
// }, 11, 1);

/**
 * Async style cause critical CSS optimization
 */
add_filter('style_loader_tag', function ($html, $handle) {
    return str_replace('>', " rel=\"preload\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet'\" >", $html);
}, 10, 2);

/**
 * Remove basic images sizes
 */
add_filter('intermediate_image_sizes_advanced', function ($sizes, $metadata) {
    $disabled_sizes = array(
        'medium', // max 300x300 image
        'medium_large', // max 768x0 image
        'large', // max 1024x1024 image
    );

    // unset disabled sizes
    foreach ($disabled_sizes as $size) {
        if (!isset($sizes[$size])) {
            continue;
        }

        unset($sizes[$size]);
    }

    return $sizes;
}, 10, 2);

/**
 * Remove src for lazyload purposes
 */
add_filter('wp_get_attachment_image_attributes', function ($attr, $attachment) {
    // Bail on admin
    if (is_admin()) {
        return $attr;
    }

    $attr['data-src'] = $attr['src'];
    $attr['class'] .= ' lazy';

    if (isset($attr['srcset'])) {
        $attr['data-srcset'] = $attr['srcset'];
    }

    unset($attr['srcset']);
    unset($attr['src']);

    return $attr;
}, 10, 2);

// Remove the reponsive stuff from the content
remove_filter('the_content', 'wp_make_content_images_responsive');

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

add_filter('facetwp_template_html', function ($output, $class) {
    $GLOBALS['wp_query'] = $class->query;

    $card_data = carbon_get_post_meta(url_to_postid(get_home_url() . '/' . $class->http_params['uri']), 'card');

    $index = 1;
    ob_start();

    while (have_posts()) {
        the_post();
        echo view('components.card-item');

        if ($index === 2) {
            echo view('components.card-cta', ['card' => $card_data]);
        }

        $index++;
    }

    return ob_get_clean();
}, 10, 2);

add_filter('facetwp_pager_html', function ($output, $params) {
    $output = '';

    $page = $params['page'];
    $total_pages = $params['total_pages'];

    if ($page > 1) {
        $output .= '<a class="facetwp-page" data-page="' . ($page - 1) . '">Précédent</a>';
    }

    if (1 < $params['total_pages']) {
        for ($i = 1; $i <= $params['total_pages']; $i++) {
            $is_curr = ($i === $params['page']) ? ' active' : '';
            $output .= '<a class="facetwp-page' . $is_curr . '" data-page="' . $i . '">' . $i . '</a>';
        }
    }

    if ($page < $total_pages && $total_pages > 1) {
        $output .= '<a class="facetwp-page" data-page="' . ($page + 1) . '">Suivant</a>';
    }

    return $output;
}, 10, 2);

add_filter('facetwp_is_main_query', function ($bool, $query) {
    return (true === $query->get('facetwp')) ? true : $bool;
}, 10, 2);

add_filter('facetwp_is_main_query', function ($is_main_query, $query) {
    if ('edd_wish_list' == $query->get('post_type')) {
        $is_main_query = false;
    }
    return $is_main_query;
}, 10, 2);
