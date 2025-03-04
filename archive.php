<?php get_header(); ?>

<main class="tw-container tw-mx-auto tw-px-4 tw-py-12">
    <header class="tw-text-center tw-mb-12">
        <?php
        the_archive_title('<h1 class="tw-text-4xl md:tw-text-5xl tw-font-bold tw-mb-4">', '</h1>');
        the_archive_description('<div class="tw-text-lg tw-text-gray-600 tw-max-w-2xl tw-mx-auto">', '</div>');
        ?>
    </header>

    <?php if (have_posts()): ?>
        <div>
            <?php while (have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/components/blog-post'); ?>
            <?php endwhile; ?>
        </div>

        <div class="tw-mt-12">
            <?php
            the_posts_pagination(array(
                'prev_text' => '&larr; Previous',
                'next_text' => 'Next &rarr;',
                'class' => 'tw-flex tw-justify-center tw-gap-2',
            ));
            ?>
        </div>
    <?php else: ?>
        <div class="tw-text-center tw-py-12">
            <h2 class="tw-text-2xl tw-font-bold tw-mb-4">No posts found</h2>
            <p class="tw-text-gray-600">Try adjusting your search or filter to find what you're looking for.</p>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>