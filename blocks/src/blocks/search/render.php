<?php

/**
 * Server-side rendering of the Search block.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 *
 * @return string Returns the search form for events.
 */
function render_block_search($attributes, $content, $block)
{
	$show_city = isset($attributes['showCity']) ? $attributes['showCity'] : true;
	$types = fetch_event_types();
	$cities = fetch_cities();

	ob_start(); ?>
	<div class="search-bar max-w-screen-xl px-8 lg:px-0 w-full m-auto -mt-12 relative">
		<form action="<?php echo get_home_url(); ?>/events/">
			<div class="bg-[#0C1015] pt-5 pb-0 pl-6 pr-6 lg:pr-0">
				<div class="grid grid-cols-1 lg:grid-cols-<?php echo $show_city ? '5' : '4'; ?> gap-6">
					<div class="flex flex-col">
						<label for="start_date" class="text-[#969696] uppercase pb-1 text-xs font-medium">From</label>
						<input onfocus="this.showPicker()" type="date" id="start_date" name="start_date"
							value="<?php echo isset($_GET['start_date']) ? esc_attr($_GET['start_date']) : ''; ?>"
							class="block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light">
					</div>
					<div class="flex flex-col with-border">
						<label for="end_date" class="text-[#969696] uppercase pb-1 text-xs font-medium">To</label>
						<input onfocus="this.showPicker()" type="date" id="end_date" name="end_date"
							value="<?php echo isset($_GET['end_date']) ? esc_attr($_GET['end_date']) : ''; ?>"
							class="block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light">
					</div>
					<div class="flex flex-col with-border">
						<label for="event_type" class="text-[#969696] uppercase pb-1 text-xs font-medium">Category</label>
						<select id="event_type" name="event_type"
							class="block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light -ml-1">
							<option value="">Event Type</option>
							<?php if ($types) : foreach ($types as $type) : ?>
									<option <?php echo isset($_GET['event_type']) && $_GET['event_type'] == $type->slug ? 'selected' : ''; ?>
										value="<?php echo esc_attr($type->slug); ?>"><?php echo esc_html($type->name); ?></option>
							<?php endforeach;
							endif; ?>
						</select>
					</div>
					<?php if ($show_city) : ?>
						<div class="flex flex-col with-border">
							<label for="city" class="text-[#969696] uppercase pb-1 text-xs font-medium">City</label>
							<select id="city" name="city"
								class="block w-full bg-[#0C1015] pr-4 outline-none pb-2 uppercase text-sm font-light -ml-1">
								<option value="">All</option>
								<?php if ($cities) : foreach ($cities as $city) : ?>
										<option <?php echo isset($_GET['city']) && $_GET['city'] == $city->slug ? 'selected' : ''; ?>
											value="<?php echo esc_attr($city->slug); ?>"><?php echo esc_html($city->name); ?></option>
								<?php endforeach;
								endif; ?>
							</select>
						</div>
					<?php endif; ?>
					<div class="block -mt-5">
						<input type="hidden" name="search" value="true" />
						<button type="submit"
							class="bg-primary text-center text-black w-full font-semibold uppercase text-[17px] tracking-[1px] h-16 my-6 lg:my-0 lg:h-20 hover:bg-black hover:text-primary">
							Search
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php
	return ob_get_clean();
}
