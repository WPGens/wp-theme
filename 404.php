<?php

/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header(); ?>

<section class="pt-44 pb-20 px-6 bg-black">
	<div class="text-center flex justify-between flex-col">
		<h1 class="text-5xl font-bold"><?php _e('Oops! That page can&rsquo;t be found.', 'wpgens-theme'); ?></h1>
	</div>
</section>

<section class="py-6 px-6">
	<div class="container text-center <?php echo get_the_ID() == 7  ? "max-w-7xl" : "max-w-3xl"; ?> m-auto px-6">
		<div id="primary" class="content">
			<p>It looks like nothing was found at this location. Go back to <a href="<?php echo home_url(); ?>"
					class="text-blue-500">Home</a>.</p>
		</div>
	</div>
</section>

<?php
get_footer();