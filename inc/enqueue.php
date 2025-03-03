<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

function wpgens_scripts()
{
    wp_enqueue_style('wpgens-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('wpgens-custom', get_template_directory_uri() . '/assets/css/theme.css', array(), wp_get_theme()->get('Version'), null);

    wp_enqueue_script('jquery');
    wp_enqueue_script('wpgens-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'wpgens_scripts');

function wpgens_enqueue_google_fonts()
{
    wp_register_style('google', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap', array(), null, 'all');
    wp_enqueue_style('google');
}
add_action('wp_enqueue_scripts', 'wpgens_enqueue_google_fonts');
add_action('admin_init', 'wpgens_enqueue_google_fonts');

function enqueue_media_uploader()
{
    wp_enqueue_media();

    // If select2 is needed
    if (is_admin()) {
        wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '4.0.13', true);
        wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array(), '4.0.13');
    }
}
// add_action( 'admin_enqueue_scripts', 'enqueue_media_uploader' );