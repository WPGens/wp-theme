<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

function wpgens_gutenberg_setup()
{
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Primary', 'wpgens'),
            'slug'  => 'primary',
            'color' => '#79AD36',
        ),
        array(
            'name'  => __('Secondary', 'wpgens'),
            'slug'  => 'secondary',
            'color' => '#404041',
        ),
        array(
            'name'  => __('Primary 100', 'wpgens'),
            'slug'  => 'primary-100',
            'color' => '#f2f7eb',
        ),
        array(
            'name'  => __('Primary 200', 'wpgens'),
            'slug'  => 'primary-200',
            'color' => '#AAD475',
        ),
        array(
            'name'  => __('Primary 300', 'wpgens'),
            'slug'  => 'primary-300',
            'color' => '#5E862A',
        ),
        array(
            'name'  => __('Primary 400', 'wpgens'),
            'slug'  => 'primary-400',
            'color' => '#435F1E',
        ),
        array(
            'name'  => __('Secondary 100', 'wpgens'),
            'slug'  => 'secondary-100',
            'color' => '#F3F3F3',
        ),
        array(
            'name'  => __('Secondary 200', 'wpgens'),
            'slug'  => 'secondary-200',
            'color' => '#C0C0C0',
        ),
        array(
            'name'  => __('Secondary 300', 'wpgens'),
            'slug'  => 'secondary-300',
            'color' => '#8C8C8E',
        ),
        array(
            'name'  => __('Secondary 400', 'wpgens'),
            'slug'  => 'secondary-400',
            'color' => '#59595B',
        ),
        array(
            'name'  => __('Secondary 500', 'wpgens'),
            'slug'  => 'secondary-500',
            'color' => '#272727',
        ),
    ));

    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('Small', 'wpgens'),
            'size' => 12,
            'slug' => 'small'
        ),
        array(
            'name' => __('Regular', 'wpgens'),
            'size' => 16,
            'slug' => 'regular'
        ),
        array(
            'name' => __('Large', 'wpgens'),
            'size' => 18,
            'slug' => 'large'
        ),
    ));
}
add_action('after_setup_theme', 'wpgens_gutenberg_setup');

function wpgens_block_assets()
{
    wp_enqueue_style('wpgens-blocks-style', get_theme_file_uri('/assets/css/blocks.css'), array(), wp_get_theme()->get('Version'));
}
add_action('enqueue_block_assets', 'wpgens_block_assets');

function wpgens_block_editor_assets()
{
    wp_enqueue_style('editor-css', get_stylesheet_directory_uri() . '/assets/css/editor-style.css', array(), wp_get_theme()->get('Version'));
}
add_action('enqueue_block_editor_assets', 'wpgens_block_editor_assets');


function my_custom_block_styles()
{
    register_block_style(
        'core/group',
        array(
            'name'  => 'full-width',
            'label' => __('Full Width', 'your-theme-textdomain'),
        )
    );

    register_block_style(
        'core/group',
        array(
            'name'  => 'container',
            'label' => __('Container', 'your-theme-textdomain'),
        )
    );

    register_block_style(
        'core/group',
        array(
            'name'  => 'small-container',
            'label' => __('Small Container', 'your-theme-textdomain'),
        )
    );
}
add_action('init', 'my_custom_block_styles');
