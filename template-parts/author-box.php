<?php
$author_id = get_the_author_meta('ID');
$author_name = get_the_author();
$author_link = get_author_posts_url($author_id);
$author_role = get_the_author_meta('headline', $author_id);
$is_wpgenser = get_the_author_meta('is_wpgenser', $author_id);
$short_description = get_the_author_meta('short_description', $author_id);
if (get_current_blog_id() === 2) {
	$author_role_hr = get_the_author_meta('headline_hr', $author_id);
	$short_description_hr = get_the_author_meta('short_description_hr', $author_id);

	if ($author_role_hr !== '') {
		$author_role = get_the_author_meta('headline_hr', $author_id);
	}
	if ($short_description_hr !== '') {
		$short_description = get_the_author_meta('short_description_hr', $author_id);
	}
}
if (!$is_wpgenser) {
	echo '<div class="mb-48"></div>';
	return;
}
?>
<div class="author-box">
	<div class="author-avatar">
		<?php $local_avatar = get_user_meta($author_id, 'local_avatar', true); ?>
		<?php if ($local_avatar !== '') { ?>
			<img src="<?php echo $local_avatar; ?>" alt="Avatar">
		<?php } else { ?>
			<?php echo get_avatar($author_id, 96); ?>
		<?php } ?>
	</div>
	<div class="author-info">
		<h3 class="author-name"><a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>"><?php echo esc_html($author_name); ?></a> <span class="author-role">— <?php echo esc_html($author_role); ?></span></h3>
		<div class="author-links">
			<?php echo $short_description; ?>
		</div>
	</div>
</div>