<?php get_header(); ?>

<main class="tw-container tw-mx-auto tw-px-4 tw-py-12">
	<?php while (have_posts()): the_post(); ?>
	<article id="post-<?php the_ID(); ?>">
		<header class="tw-text-center tw-mb-12">
			<?php
				$categories = get_the_category();
				if ($categories): ?>
			<div class="tw-flex tw-justify-center tw-gap-2 tw-mb-4">
				<?php foreach ($categories as $category): ?>
				<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
					class="tw-text-sm tw-text-primary-300 hover:tw-text-primary-400">
					<?php echo esc_html($category->name); ?>
				</a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<h1 class="tw-text-4xl md:tw-text-5xl tw-font-bold tw-mb-4"><?php the_title(); ?></h1>

			<div class="tw-flex tw-items-center tw-justify-center tw-gap-4 tw-text-gray-600">
				<div class="tw-flex tw-items-center tw-gap-2">
					<?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', ['class' => 'tw-rounded-full']); ?>
					<span><?php the_author(); ?></span>
				</div>
				<span>•</span>
				<time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
			</div>
		</header>

		<?php if (has_post_thumbnail()): ?>
		<div class="tw-mb-12">
			<?php the_post_thumbnail('full', ['class' => 'tw-w-full tw-h-auto tw-rounded-lg']); ?>
		</div>
		<?php endif; ?>

		<div class="tw-prose tw-prose-lg tw-mx-auto">
			<?php the_content(); ?>
		</div>

		<?php if (has_tag()): ?>
		<div class="tw-mt-12 tw-pt-8 tw-border-t">
			<div class="tw-flex tw-flex-wrap tw-gap-2">
				<?php the_tags('<span class="tw-text-gray-600">Tags:</span> ', ', '); ?>
			</div>
		</div>
		<?php endif; ?>

	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>