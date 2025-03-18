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
// Load Open sans font in admin for gutenberg editor
add_action('admin_init', 'wpgens_enqueue_google_fonts');