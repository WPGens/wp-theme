<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()) : ?>


            <?php if (is_active_sidebar('blog-archive-top')) : ?>
                <section class="blog-hero">
                    <div class="container">
                        <?php dynamic_sidebar('blog-archive-top'); ?>
                    </div>
                </section>
            <?php endif; ?>

            <div class="container">
                <div class="archive-row">
                    <?php
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/article', 'card');
                    endwhile; ?>
                </div>

                <?php the_posts_pagination(); ?>

            </div>

        <?php else : ?>
            <section class="no-posts">
                <p><?php _e('No posts found.', 'wpgens'); ?></p>
            </section>
        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>