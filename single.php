<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    
                    <?php get_template_part( 'template-parts/author', 'meta' ); ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <div class="entry-footer">
                    <div class="categories-list">
                        <div class="categories">
                            <?php
                            $categories = get_the_category();
                            echo ('Published in: ');
                            if (!empty($categories)) {
                                $output = array();
                                foreach ($categories as $category) {
                                    $output[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                }
                                echo implode('', $output);
                            }
                            ?>
                        </div>
                    </div>
                    
                    <?php get_template_part( 'template-parts/author', 'box' ); ?>

                    <?php get_template_part( 'template-parts/post', 'socials' ); ?>
                </div>

                <div class="services-list">
                    <?php get_template_part( 'template-parts/post', 'services' ); ?>
                </div>

            </article>
        <?php
        endwhile;
        ?>

        <?php get_template_part('template-parts/related-posts'); ?>

    </main>
</div>

<?php get_footer(); ?>
