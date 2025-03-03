<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="blog-hero search-results-header">
            <div class="container">
                <div>
                    <span class="search-label">
                        <?php esc_html_e('Search Results for:', 'wpgens'); ?>
                    </span>
                    <h1>
                        "<?php echo esc_html(get_search_query()); ?>"
                    </h1>
                </div>
            </div>
        </section>

        <?php if (have_posts()) : ?>

            <div class="container">
                <div class="archive-row">
                    <?php
                    while (have_posts()) : the_post();
                        if (get_post_type() === 'post') {
                            get_template_part('template-parts/article', 'card');
                        } else {
                            get_template_part('template-parts/page', 'card');
                        }
                    endwhile; ?>
                </div>

                <?php the_posts_pagination(); ?>

                <?php
                if ($wp_query->max_num_pages <= 1) {
                    echo '<div class="mb-48"></div>';
                }
                ?>

            </div>

        <?php else : ?>

            <div class="container">
                <div class="no-search-results">
                    <p>
                        <?php _e('Sorry, but nothing matched your search terms.<br/>Please try again with some different keywords.', 'wpgens'); ?>
                    </p>
                </div>
            </div>

        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>