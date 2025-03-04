<?php

/**
 * Template part for displaying article cards in blog listings
 */
?>

<article id="post-<?php the_ID(); ?>"
	<?php post_class('tw-bg-white tw-rounded-lg tw-shadow-sm tw-overflow-hidden tw-h-full tw-flex tw-flex-col'); ?>>
	<?php if (has_post_thumbnail()): ?>
	<div class="tw-aspect-w-16 tw-aspect-h-9">
		<a href="<?php the_permalink(); ?>" class="tw-block">
			<?php the_post_thumbnail('medium', ['class' => 'tw-w-full tw-h-full tw-object-cover']); ?>
		</a>
	</div>
	<?php endif; ?>

	<div class="tw-p-4 tw-flex tw-flex-col tw-flex-grow">
		<?php
		$categories = get_the_category();
		if ($categories): ?>
		<div class="tw-flex tw-gap-2 tw-mb-2">
			<?php foreach ($categories as $category): ?>
			<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
				class="tw-text-xs tw-text-primary-300 hover:tw-text-primary-400">
				<?php echo esc_html($category->name); ?>
			</a>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<h2 class="tw-text-xl md:tw-text-2xl tw-font-bold tw-mb-3">
			<a href="<?php the_permalink(); ?>" class="hover:tw-text-primary-300">
				<?php the_title(); ?>
			</a>
		</h2>

		<div class="tw-text-gray-600 tw-mb-4">
			<?php the_excerpt(); ?>
		</div>

		<div class="tw-flex tw-items-center tw-justify-between tw-text-sm tw-text-gray-500">
			<div class="tw-flex tw-items-center tw-gap-2">
				<?php echo get_avatar(get_the_author_meta('ID'), 24, '', '', ['class' => 'tw-rounded-full']); ?>
				<span><?php the_author(); ?></span>
			</div>
			<time datetime="<?php echo get_the_date('c'); ?>">
				<?php echo get_the_date(); ?>
			</time>
		</div>
	</div>
</article>