<?php
global $wp;
$full_url =  home_url($wp->request);

$current_url = $full_url;
$page_string_pos = strpos($full_url, '/page');
if ($page_string_pos) {
	$current_url = substr($full_url, 0, $page_string_pos);
}

$current_page = get_query_var('paged') ? get_query_var('paged') : 1;
$next_page = $current_page + 1;
$prev_page = $current_page - 1;

$num_of_pages = $args['num_of_pages'];

$query_vars = http_build_query($_GET);
$query = '';
if ($query_vars) {
	$query = '?' . $query_vars;
}

?>

<nav aria-label="Page navigation" class="tw-text-center tw-my-12">
	<ul class="tw-inline-flex tw-space-x-px tw-text-base tw-h-10">
		<?php if ($current_page > 1) { ?>
		<li>
			<a href="<?php echo $current_url . '/page/' . $prev_page . '/' . $query; ?>"
				class="tw-flex tw-items-center tw-rounded-full tw-justify-center tw-px-4 tw-h-10 tw-ml-0 tw-leading-tight hover:tw-bg-primary hover:tw-text-white">Previous</a>
		</li>
		<?php } ?>
		<?php
		$start = max(1, $current_page - 2);
		$end = min($current_page + 2, $num_of_pages);

		for ($k = $start; $k <= $end; $k++) { ?>
		<li>
			<a href="<?php echo $current_url . '/page/' . $k . '/' . $query; ?>"
				class="tw-flex tw-items-center tw-rounded-full tw-justify-center tw-px-4 tw-h-10 tw-leading-tight hover:tw-bg-primary hover:tw-text-white <?php echo $current_page == $k ? 'tw-bg-primary tw-text-white' : ''; ?>"><?php echo $k; ?></a>
		</li>
		<?php } ?>
		<?php if ($current_page < $num_of_pages) { ?>
		<li>
			<a href="<?php echo $current_url . '/page/' . $next_page . '/' . $query; ?>"
				class="tw-flex tw-items-center tw-rounded-full tw-justify-center tw-px-4 tw-h-10 tw-leading-tight hover:tw-bg-primary hover:tw-text-white">Next</a>
		</li>
		<?php } ?>
	</ul>
</nav>