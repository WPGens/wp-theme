<?php

/**
 * The template for displaying all pages
 *
 */

get_header(); ?>

<?php
while (have_posts()) :
	the_post();
?>

<!-- Hero -->
<section class="tw-pt-36 tw-pb-24 tw-bg-black tw-relative tw-overflow-hidden tw-min-h-[240px]">
	<div class="tw-px-12 tw-relative tw-z-10 tw-max-w-7xl tw-m-auto">
		<h1 class="tw-text-5xl md:tw-text-6xl tw-text-white tw-font-light tw-font-neon tw-uppercase">
			<?php the_title(); ?></h1>
	</div>
</section>

<section class="tw-pt-6 tw-pb-12 tw-px-6">
	<div class="tw-container tw-m-auto tw-max-w-7xl tw-rounded-2xl tw-overflow-hidden tw-p-8 md:tw-p-12">
		<div class="tw-content">
			<?php the_content(); ?>
		</div>
	</div>
</section>

<?php
endwhile;
get_footer();