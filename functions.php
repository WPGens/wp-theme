<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Define theme constants
define('MYTHEME_VERSION', '1.0.0');
define('MYTHEME_DIR', get_template_directory());
define('MYTHEME_URI', get_template_directory_uri());

require_once MYTHEME_DIR . '/inc/theme-setup.php';
require_once MYTHEME_DIR . '/inc/enqueue.php';

require_once MYTHEME_DIR . '/inc/post-metas.php';
require_once MYTHEME_DIR . '/inc/widgets.php';
require_once MYTHEME_DIR . '/inc/gutenberg.php';