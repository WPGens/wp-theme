<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/TheSerifB-W8ExtraBold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/TheSerifB-W5Plain.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/TheSerifB-W7Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
    $current_site_id = get_current_blog_id();
    $main_site_url = get_site_url(1); // Eng
    $croatian_site_url = get_site_url(2); // Hr

    if ($current_site_id == 1) {
        $english_element = '<span class="current">English</span>';
        $croatian_element = '<a href="' . esc_url($croatian_site_url) . '">Hrvatski</a>';
    } else {
        $english_element = '<a href="' . esc_url($main_site_url) . '">English</a>';
        $croatian_element = '<span class="current">Hrvatski</span>';
    }
    ?>

    <?php get_template_part('inc/google-tag-manager'); ?>

    <header id="header" class="header">
        <div class="header-grid">
            <a class="header-logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home" id="top-menu-item-logo"><?php bloginfo('name'); ?></a>

            <nav id="js-menu" class="menu">
                <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'menu-list', 'container' => false)); ?>
                <div class="header-lang header-lang--mobile">
                    <span class="header-lang--title"><?php _e('Select language', 'wpgens'); ?></span>
                    <?php echo $english_element; ?> | <?php echo $croatian_element; ?>
                </div>
            </nav>

            <button type="button" id="js-search-trigger" class="header-btn header-btn-search"><i class="icon-search"></i><span><?php _e('Search', 'wpgens'); ?></span></button>

            <div class="header-lang">
                <span class="header-lang--title"><?php _e('Select language', 'wpgens'); ?></span>
                <?php echo $english_element; ?> | <?php echo $croatian_element; ?>
            </div>

            <button type="button" id="js-menu-trigger" class="header-btn header-btn-menu"><i class="icon-menu"></i><span><?php _e('Menu', 'wpgens'); ?></span></button>
        </div>
    </header>

    <?php if (is_post_type_archive('post') || is_category() || is_singular('post') || is_home()) : ?>
        <section class="category-list-section">
            <div class="container">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'blog-menu',
                    'menu_class'     => 'category-list',
                ));
                ?>
            </div>
        </section>
    <?php endif; ?>

    <form class="search-form" role="search" method="get" id="js-search-form" action="<?php echo home_url('/'); ?>">
        <input type="search" class="input-text search-form-input" value="<?php echo get_search_query(true) ?>" name="s" placeholder="<?php _e('Search here...', 'wpgens'); ?>" required />
    </form>