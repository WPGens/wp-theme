<div class="article-card">
	<?php if (has_post_thumbnail()) : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
	<?php else : ?>
		<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-featured-image.png" alt="Default Image" /></a>
	<?php endif; ?>

	<div class="article-card-content">
		<div class="article-meta">
			<?php
			$author_id = get_the_author_meta('ID');
			$is_wpgenser = get_the_author_meta('is_wpgenser', $author_id);
			if ($is_wpgenser) { ?>
				<a href="<?php echo get_author_posts_url($author_id); ?>"><?php the_author(); ?></a>
			<?php } else { ?>
				<span><?php the_author(); ?></span>
			<?php } ?>
			<span class="date"> — <?php echo get_the_date('M d, Y'); ?></span>
		</div>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	</div>
</div>