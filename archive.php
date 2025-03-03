<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()) : ?>
            
		<?php get_template_part( 'template-parts/category', 'header' ); ?>

        <div class="container">
            <div class="archive-row">
            <?php 
                while (have_posts()) : the_post(); 
                    get_template_part( 'template-parts/article', 'card' );
                endwhile;
            ?>
            </div>
            
            <?php the_posts_pagination(); ?>
            
        </div>
        
        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>