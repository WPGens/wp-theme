<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="tw-bg-white tw-shadow-sm">
        <div class="tw-container tw-mx-auto tw-px-4">
            <div class="tw-flex tw-items-center tw-justify-between tw-h-20">
                <!-- Logo -->
                <div class="tw-flex-shrink-0">
                    <?php if (has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php else: ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="tw-text-2xl tw-font-bold">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Desktop Menu -->
                <nav class="tw-hidden md:tw-flex tw-space-x-8">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'tw-flex tw-space-x-8',
                        'fallback_cb' => false,
                    ));
                    ?>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="md:tw-hidden" id="mobile-menu-button" aria-label="Toggle Menu">
                    <svg class="tw-w-6 tw-h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="tw-hidden md:tw-hidden" id="mobile-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'tw-py-4 tw-space-y-4',
                    'fallback_cb' => false,
                ));
                ?>
            </div>
        </div>
    </header>