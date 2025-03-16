<?php

/**
 * Server-side rendering of the `wpgens/venues` block.
 */

/**
 * Renders the `wpgens/venues` block on the server.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 * @return string Returns the filtered venues grid.
 */
function render_block_wpgens_venues($attributes, $content, $block)
{
	if (empty($attributes['selectedVenues'])) {
		return $content;
	}

	$venues = array_map(function ($venue_id) {
		$venue = get_post($venue_id);
		if (!$venue) return null;

		$city_terms = get_the_terms($venue->ID, 'city');
		$city = $city_terms && !is_wp_error($city_terms) ? $city_terms[0]->name : '';
		$state = get_post_meta($venue->ID, 'state', true);
		$featured_image = get_post_thumbnail_id($venue->ID);
		$image_url = '';
		if ($featured_image) {
			$image_url = wp_get_attachment_image_url($featured_image, 'full');
		}

		return array(
			'id' => $venue->ID,
			'title' => $venue->post_title,
			'city' => $city,
			'state' => $state,
			'image' => $image_url,
			'permalink' => get_permalink($venue->ID)
		);
	}, $attributes['selectedVenues']);

	$venues = array_filter($venues); // Remove any null values

	ob_start();
?>
<section class="max-w-screen-2xl px-4 md:px-8 2xl:px-0 mx-auto relative">
	<div class="text-center mb-6 md:mb-12">
		<h2 class="text-3xl md:text-4xl lg:text-5xl text-white uppercase font-light mb-2 leading-none">
			<?php echo esc_html($attributes['title']); ?>
		</h2>
		<?php if (!empty($attributes['subtitle'])) : ?>
		<p class="uppercase md:tracking-[3px] text-primary-dark">
			<?php echo esc_html($attributes['subtitle']); ?>
		</p>
		<?php endif; ?>
	</div>

	<div class="grid grid-cols-2 md:grid-cols-5 gap-x-4 md:gap-x-6 gap-y-6 md:gap-y-12">
		<?php if (!empty($venues)) : ?>
		<?php foreach ($venues as $venue) : ?>
		<a href="<?php echo esc_url($venue['permalink']); ?>"
			class="relative group flex flex-col w-full uppercase overflow-hidden">
			<div class="h-48 overflow-hidden">
				<img src="<?php echo esc_url($venue['image'] ?: get_stylesheet_directory_uri() . '/assets/images/artist-placeholder.jpeg'); ?>"
					class="h-48 object-cover w-full group-hover:scale-110 transition-all"
					alt="<?php echo esc_attr($venue['title']); ?>" />
			</div>
			<span class="text-secondary tracking-[1px] text-xs leading-none py-3">
				<?php
							if ($venue['city']) {
								echo esc_html($venue['city']);
								if ($venue['state']) {
									echo ', ' . esc_html($venue['state']);
								}
							}
							?>
			</span>
			<h2
				class="text-white text-sm md:text-lg font-medium tracking-[1.5px] leading-none group-hover:text-primary">
				<?php echo esc_html($venue['title']); ?>
			</h2>
		</a>
		<?php endforeach; ?>
		<?php else : ?>
		<div class="col-span-2 md:col-span-5 text-center py-8 text-white">
			<?php _e('No venues selected', 'wpgens-blocks'); ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php
	return ob_get_clean();
}