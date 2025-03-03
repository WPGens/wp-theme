<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!function_exists('wpgens_setup')):
    function wpgens_setup()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('align-wide');
        add_theme_support('responsive-embeds');
        add_theme_support('custom-line-height');
        add_theme_support('experimental-link-color');
        add_theme_support('custom-spacing');
        add_theme_support('custom-units');
        add_theme_support('editor-styles');
        add_editor_style('assets/css/editor-style.css');
        add_theme_support('wp-block-styles');
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ));

        add_image_size('portfolio-thumbnail', 512, 512, true);

        load_theme_textdomain('wpgens', get_template_directory() . '/languages');

        register_nav_menus(array(
            'header-menu' => __('Header Menu', 'wpgens'),
            'footer-menu' => __('Footer Menu'),
        ));
    }
endif;
add_action('after_setup_theme', 'wpgens_setup');

function wpgens_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wpgens_content_width', 1180);
}
add_action('after_setup_theme', 'wpgens_content_width', 0);

// WP ticket: http://core.trac.wordpress.org/ticket/16382
function theme_current_type_nav_class($css_class, $item)
{
    static $custom_post_types, $post_type, $filter_func;

    if (empty($custom_post_types))
        $custom_post_types = get_post_types(array('_builtin' => false));

    if (empty($post_type))
        $post_type = get_post_type();

    if ('page' == $item->object && in_array($post_type, $custom_post_types)) {
        $css_class = array_filter($css_class, function ($el) {
            return $el !== "current_page_parent";
        });

        $template = get_page_template_slug($item->object_id);
        if (!empty($template) && preg_match("/^page(-[^-]+)*-$post_type/", $template) === 1)
            array_push($css_class, 'current_page_parent');
    }

    return $css_class;
}
add_filter('nav_menu_css_class', 'theme_current_type_nav_class', 1, 2);