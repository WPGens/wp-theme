<div class="entry-meta">
	<?php
	$author_id = get_the_author_meta('ID');
	$is_wpgenser = get_the_author_meta('is_wpgenser', $author_id);
	?>
	<span class="author">
		<?php if ($is_wpgenser) { ?>
			<a href="<?php echo get_author_posts_url($author_id); ?>"><?php the_author(); ?></a>
		<?php } else { ?>
			<?php the_author(); ?>
		<?php } ?>

	</span>
	<span class="date">— <?php echo get_the_date(); ?></span>
	<span class="categories">
		<?php
		$categories = get_the_category();
		if (!empty($categories)) {
			$output = array();
			foreach ($categories as $category) {
				$output[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
			}
			echo implode(' ', $output);
		}
		?>
	</span>
</div>