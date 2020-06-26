<?php

namespace App;

use function Roots\asset;

/**
 * Get the contents of a file.
 *
 * @param string $asset
 *
 * @return string
 */
function get_file_contents($asset)
{
    /** @var \WP_Filesystem_Base */
    global $wp_filesystem;

    if (empty($wp_filesystem)) {
        require_once ABSPATH . '/wp-admin/includes/file.php';
    }

    \WP_Filesystem();

    if ($wp_filesystem->is_readable($asset)) {
        return $wp_filesystem->get_contents($asset);
    }

    return '';
}
