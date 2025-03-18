<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

function register_portfolio_archive_widget_areas()
{
    // register_sidebar(array(
    //     'name'          => 'Blog Archive Top',
    //     'id'            => 'blog-archive-top',
    //     'description'   => 'Widgets in this area will be shown at the top of the blog archive page.',
    //     'before_widget' => '<div class="blog-archive-widget blog-archive-top-widget">',
    //     'after_widget'  => '</div>',
    //     'before_title'  => '<h2 class="blog-archive-widget-title">',
    //     'after_title'   => '</h2>',
    // ));

    // register_sidebar(array(
    //     'name'          => 'Blog Archive Bottom',
    //     'id'            => 'blog-archive-bottom',
    //     'description'   => 'Widgets in this area will be shown at the bottom of the blog archive page.',
    //     'before_widget' => '<div class="blog-archive-widget blog-archive-bottom-widget">',
    //     'after_widget'  => '</div>',
    //     'before_title'  => '<h2 class="blog-archive-widget-title">',
    //     'after_title'   => '</h2>',
    // ));
}
add_action('widgets_init', 'register_portfolio_archive_widget_areas');