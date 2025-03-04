<?php

/**
 * Template part for displaying blog posts in standard vertical layout
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('tw-bg-white tw-rounded-lg tw-shadow-sm tw-overflow-hidden tw-mb-8'); ?>>
	<div class="tw-flex tw-flex-col md:tw-flex-row">
		<?php if (has_post_thumbnail()): ?>
			<div class="md:tw-w-1/3">
				<a href="<?php the_permalink(); ?>" class="tw-block">
					<?php the_post_thumbnail('medium', ['class' => 'tw-w-full tw-h-full tw-object-cover']); ?>
				</a>
			</div>
		<?php endif; ?>

		<div class="tw-p-6 md:tw-w-2/3">
			<?php
			$categories = get_the_category();
			if ($categories): ?>
				<div class="tw-flex tw-gap-2 tw-mb-3">
					<?php foreach ($categories as $category): ?>
						<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
							class="tw-text-sm tw-text-primary-300 hover:tw-text-primary-400">
							<?php echo esc_html($category->name); ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<h2 class="tw-text-2xl tw-font-bold tw-mb-3">
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
	</div>
</article>