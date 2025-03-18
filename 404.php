<?php

/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header(); ?>

<section class="tw-py-6 tw-px-6">
	<div
		class="tw-container tw-text-center <?php echo get_the_ID() == 7  ? "max-w-7xl" : "max-w-3xl"; ?> tw-m-auto tw-px-6">
		<div id="primary" class="tw-content">
			<p>It looks like nothing was found at this location. Go back to <a href="<?php echo home_url(); ?>"
					class="text-blue-500">Home</a>.</p>
		</div>
	</div>
</section>

<?php
get_footer();