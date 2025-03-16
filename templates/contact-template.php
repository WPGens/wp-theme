<?php

/**
 * Template Name: Contact Page
 *
 */

get_header(); ?>

<?php
while (have_posts()) :
	the_post();
?>

	<!-- Hero -->
	<section class="pt-36 pb-24 bg-black relative overflow-hidden min-h-[240px]">
		<div class="px-12 relative z-10 max-w-7xl m-auto text-center">
			<h1 class="text-5xl md:text-6xl text-white font-light font-neon uppercase"><?php the_title(); ?></h1>
		</div>
	</section>

	<section class="pt-6 pb-12 px-6">
		<div class="m-auto max-w-6xl rounded-2xl p-8 md:p-12">
			<div class="max-w-3xl m-auto text-center mb-12"><?php echo get_field('subtitle'); ?></div>
			<div class="flex flex-col md:flex-row md:space-x-10">
				<div class="md:w-1/2">
					<div class="bg-[#0C1015] mb-4 md:mb-0 px-9 py-8 event-block md:max-w-sm rounded overflow-hidden">
						<ul class="space-y-4">
							<li class="pb-4">
								<span class="text-sm block text-[#BBBDC0] uppercase font-medium">Location</span>
								<p><?php echo get_field('street'); ?><br /><?php echo get_field('city'); ?></p>
							</li>
							<li class="pb-4">
								<span class="text-sm block text-[#BBBDC0] uppercase font-medium">Departments</span>
								<span class="block"><?php echo get_field('departments'); ?></span>
							</li>
							<li class="pb-4">
								<span class="text-sm block text-[#BBBDC0] uppercase font-medium">More Info</span>
								<p><?php echo get_field('more_info'); ?></p>
							</li>
						</ul>
					</div>
				</div>
				<div class="md:w-1/2">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>

<?php
endwhile;
get_footer();
