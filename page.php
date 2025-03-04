<?php get_header(); ?>

<main class="tw-container tw-mx-auto tw-px-4 tw-py-12">
	<?php while (have_posts()): the_post(); ?>
	<article id="post-<?php the_ID(); ?>">
		<?php if (has_post_thumbnail()): ?>
		<div class="tw-mb-12">
			<?php the_post_thumbnail('full', ['class' => 'tw-w-full tw-h-auto tw-rounded-lg']); ?>
		</div>
		<?php endif; ?>

		<div class="tw-prose tw-prose-lg tw-mx-auto">
			<?php the_content(); ?>
		</div>

	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>