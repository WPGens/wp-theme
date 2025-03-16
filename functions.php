<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Define theme constants
define('WPGENS_THEME_VERSION', '1.0.0');
define('WPGENS_THEME_DIR', get_template_directory());
define('WPGENS_THEME_URI', get_template_directory_uri());

// Include theme files
require_once WPGENS_THEME_DIR . '/inc/theme-setup.php';
require_once WPGENS_THEME_DIR . '/inc/enqueue.php';
require_once WPGENS_THEME_DIR . '/inc/post-metas.php';
require_once WPGENS_THEME_DIR . '/inc/widgets.php';
require_once WPGENS_THEME_DIR . '/inc/gutenberg.php';
require_once WPGENS_THEME_DIR . '/inc/data-helpers.php';
require_once WPGENS_THEME_DIR . '/inc/template-helpers.php';

require_once WPGENS_THEME_DIR . '/blocks/wpgens-blocks.php';