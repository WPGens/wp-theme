<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="container">
            <?php
            $author = get_user_by('slug', get_query_var('author_name'));
            if ($author) :
                $desc = get_the_author_meta('description', $author->ID);
                $headline = get_the_author_meta('headline', $author->ID);
                if (get_current_blog_id() === 2) {
                    $desc_hr = get_the_author_meta('long_description_hr', $author->ID);
                    if ($desc_hr !== '') {
                        $desc = $desc_hr;
                    }
                    $headline_hr = get_the_author_meta('headline_hr', $author->ID);
                    if ($headline_hr !== '') {
                        $headline = $headline_hr;
                    }
                }

            ?>
                <div class="author-card">
                    <div>
                        <a class="all-team" href="<?php echo (get_current_blog_id() === 2) ? 'https://wpgens.hr/o-nama/' : get_home_url() . '/wpgens/#team'; ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.svg" />
                            <?php _e("Back to all team members", "wpgens"); ?>
                        </a>
                        <h1><?php echo esc_html($author->display_name); ?></h1>
                        <span class="author-card--role"><?php echo esc_html($headline); ?></span>
                        <div class="author-card--desc">
                            <?php echo wpautop($desc); ?>
                        </div>
                    </div>
                    <div class="author-image">
                        <?php $local_avatar = get_user_meta($author->ID, 'local_avatar', true); ?>
                        <?php if ($local_avatar !== '') { ?>
                            <img src="<?php echo $local_avatar; ?>" alt="Avatar">
                        <?php } else { ?>
                            <?php echo get_avatar($author->ID, 460); ?>
                        <?php } ?>
                    </div>

                </div>
        </div>

        <?php
                get_template_part('template-parts/related-posts', null, array(
                    'author_id' => $author->ID,
                    'title' => "Latest Posts by {$author->display_name}"
                ));
        ?>

    <?php else : ?>
        <p>Author not found.</p>
    <?php endif; ?>

    </main>
</div>

<?php
get_footer();
