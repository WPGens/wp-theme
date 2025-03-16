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
	<section class="pt-36 pb-24 bg-black relative overflow-hidden min-h-[240px]">
		<div class="px-12 relative z-10 max-w-7xl m-auto">
			<h1 class="text-5xl md:text-6xl text-white font-light font-neon uppercase"><?php the_title(); ?></h1>
		</div>
	</section>

	<section class="pt-6 pb-12 px-6">
		<div class="container m-auto max-w-7xl rounded-2xl overflow-hidden p-8 md:p-12">
			<div class="flex flex-col md:flex-row md:space-x-4">
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>

<?php
endwhile;
get_footer();
