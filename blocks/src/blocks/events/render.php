<?php

/**
 * Server-side rendering of the `wpgens/events` block.
 *
 * @package WPGens
 */

/**
 * Format date for display
 */
function wpgens_format_event_date($date_string)
{
	if (empty($date_string)) {
		return array('day' => '', 'month' => '', 'date' => '');
	}

	$date = new DateTime($date_string);
	$days = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
	$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

	return array(
		'day' => $days[$date->format('w')],
		'month' => $months[$date->format('n') - 1],
		'date' => $date->format('j')
	);
}

/**
 * Truncate text with ellipsis
 */
function wpgens_truncate_text($text, $max_length)
{
	if (empty($text)) return '';
	if (strlen($text) <= $max_length) return $text;
	return substr($text, 0, $max_length) . '...';
}

/**
 * Get event image URL
 */
function wpgens_get_event_image_url($event_id)
{
	$image_url = '';

	// Try to get cover image first
	$cover_image = get_post_meta($event_id, 'cover_image', true);
	if (!empty($cover_image) && is_array($cover_image)) {
		if (isset($cover_image['medium_large']) && isset($cover_image['medium_large']['file'])) {
			$image_url = $cover_image['medium_large']['file'];
		} elseif (isset($cover_image['event-listing']) && isset($cover_image['event-listing']['file'])) {
			$image_url = $cover_image['event-listing']['file'];
		}
	}

	// If no cover image, try featured image
	if (empty($image_url)) {
		$featured_image = get_post_meta($event_id, 'featured_image', true);
		if (!empty($featured_image) && is_array($featured_image)) {
			if (isset($featured_image['medium_large']) && isset($featured_image['medium_large']['file'])) {
				$image_url = $featured_image['medium_large']['file'];
			} elseif (isset($featured_image['event-listing']) && isset($featured_image['event-listing']['file'])) {
				$image_url = $featured_image['event-listing']['file'];
			}
		}
	}

	// If still no image, try WordPress featured image
	if (empty($image_url) && has_post_thumbnail($event_id)) {
		$image_url = get_the_post_thumbnail_url($event_id, 'medium_large');
	}

	return $image_url;
}

/**
 * Renders the `wpgens/events` block on the server.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @return string Returns the events slider with selected events.
 */
function wpgens_render_block_events($attributes, $content)
{
	if (empty($attributes['selectedEvents'])) {
		return $content;
	}

	$events = array_map(function ($event_id) {
		$event = get_post($event_id);
		if (!$event) return null;

		$place_id = get_post_meta($event->ID, 'place_id', true);
		$venue = '';
		if ($place_id) {
			$place = get_post($place_id);
			if ($place) {
				$venue = $place->post_title;
			}
		}

		return array(
			'id' => $event->ID,
			'title' => $event->post_title,
			'date' => get_post_meta($event->ID, 'start_date', true),
			'venue' => $venue,
			'image' => wpgens_get_event_image_url($event->ID),
			'permalink' => get_permalink($event->ID)
		);
	}, $attributes['selectedEvents']);

	$events = array_filter($events); // Remove any null values

	ob_start();
?>
<section class="max-w-screen-2xl px-4 md:px-8 2xl:px-0 my-16 md:my-32 mx-auto relative">
	<button aria-label="slide backward"
		class="hidden md:inline-block rounded-full text-center absolute z-30 ml-5 2xl:-ml-5 w-10 h-10 bg-primary cursor-pointer"
		style="top: 40%; transform: translateY(-50%);" id="prev">
		<svg class="text-black inline" width="8" height="14" viewBox="0 0 8 14" fill="none"
			xmlns="http://www.w3.org/2000/svg">
			<path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
				stroke-linejoin="round" />
		</svg>
	</button>
	<div class="w-full mx-auto overflow-x-hidden overflow-y-hidden">
		<div id="slider" class="grid grid-cols-2 gap-4 md:flex md:space-x-4 transition ease-out duration-700">
			<?php if (!empty($events)) : ?>
			<?php foreach ($events as $event) :
						$event_date = wpgens_format_event_date($event['date']);
						$venue = $event['venue'];
						$title = $event['title'];
					?>
			<a href="<?php echo esc_url($event['permalink']); ?>"
				class="flex flex-col flex-shrink-0 bg-black md:w-[280px] border-b-[3px] border-primary">
				<?php if (!empty($event['image'])) : ?>
				<img src="<?php echo esc_url($event['image']); ?>" alt="<?php echo esc_attr($title); ?>"
					class="w-full" />
				<?php else : ?>
				<div class="w-full h-48 bg-gray-800"></div>
				<?php endif; ?>
				<div class="flex items-center text-white relative pr-4">
					<div class="absolute -top-8 h-8 w-full bg-gradient-to-t from-black to-transparent"></div>
					<div
						class="flex flex-col w-16 md:w-16 flex-shrink-0 py-2 text-center text-[12px] font-semibold tracking-[1px] uppercase">
						<span><?php echo esc_html($event_date['day']); ?></span>
						<span class="text-primary"><?php echo esc_html($event_date['month']); ?></span>
						<span
							class="text-primary text-xl md:text-[27px]"><?php echo esc_html($event_date['date']); ?></span>
					</div>
					<div class="w-[1px] bg-[#424242] h-16 mr-2 md:mr-4"></div>
					<div class="flex flex-col uppercase font-semibold justify-center">
						<span class="text-[11px] mb-1 first-letter:tracking-[0.55px] text-gray-400 font-normal">
							<?php echo esc_html(wpgens_truncate_text($venue, 30)); ?>
						</span>
						<span class="text-xs md:text-base !leading-4">
							<?php echo esc_html(wpgens_truncate_text($title, 25)); ?>
						</span>
					</div>
				</div>
			</a>
			<?php endforeach; ?>
			<?php else : ?>
			<div class="col-span-2 text-center py-8">No events selected</div>
			<?php endif; ?>
		</div>
	</div>
	<button aria-label="slide forward"
		class="hidden md:inline-block rounded-full right-0 text-center absolute z-30 mr-5 2xl:-mr-5 w-10 h-10 bg-primary cursor-pointer"
		style="top: 40%; transform: translateY(-50%);" id="next">
		<svg class="text-black inline" width="8" height="14" viewBox="0 0 8 14" fill="none"
			xmlns="http://www.w3.org/2000/svg">
			<path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
				stroke-linejoin="round" />
		</svg>
	</button>
	<?php if (!empty($attributes['viewAllUrl'])) : ?>
	<div class="text-center mt-16">
		<a href="<?php echo esc_url($attributes['viewAllUrl']); ?>" class="primary-btn">
			<?php echo esc_html__('View all events', 'wpgens-blocks'); ?>
		</a>
	</div>
	<?php endif; ?>
</section>
<?php
	return ob_get_clean();
}