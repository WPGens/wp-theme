<?php

/**
 * Template Name: Full Width
 * 
 * This is a full-width page template that removes the container constraints
 * and allows content to span the entire width of the viewport.
 */

get_header(); ?>

<main class="tw-w-full">
	<?php while (have_posts()): the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if (has_post_thumbnail()): ?>
		<div class="tw-w-full">
			<?php the_post_thumbnail('full', ['class' => 'tw-w-full tw-h-auto']); ?>
		</div>
		<?php endif; ?>

		<div class="tw-prose tw-prose-lg tw-mx-auto tw-px-4 tw-py-12">
			<?php the_content(); ?>
		</div>

	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>