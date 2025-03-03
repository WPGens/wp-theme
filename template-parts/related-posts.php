<?php

/**
 * Template part for displaying author or related posts
 *
 * @param array $args {
 *     Optional. Arguments to pass to the template part.
 *
 *     @type int    $author_id The ID of the author to display posts for.
 *     @type string $title     The title to display above the posts.
 * }
 */

$author_id = isset($args['author_id']) ? $args['author_id'] : null;
$custom_title = isset($args['title']) ? $args['title'] : null;

$query_args = array(
    'posts_per_page' => 3,
);

$css_class = 'related-posts';

if ($author_id) {
    $css_class = 'related-posts single-author';
    $query_args['author'] = $author_id;
    $query_args['posts_per_page'] = 24;
    $title = sprintf(
        __("Latest Posts by %s", "wpgens"),
        get_the_author_meta('display_name', $author_id)
    );
    $no_posts_message = sprintf(
        __("Looks like %s hasn't written any posts yet", "wpgens"),
        get_the_author_meta('display_name', $author_id)
    );
} else {
    $related_posts = get_post_meta(get_the_ID(), '_related_posts', true);
    if (!empty($related_posts)) {
        $query_args['post__in'] = array_values($related_posts);
        $query_args['orderby'] = 'post__in';
    } else {
        $categories = get_the_category();
        if ($categories) {
            $category_ids = wp_list_pluck($categories, 'term_id');
            $query_args['category__in'] = $category_ids;
        }
    }
    $query_args['post__not_in'] = array(get_the_ID());
    $title = __("You made it all the way down here so you must have enjoyed this post! You may also like:", "wpgens");
    $no_posts_message = __("No related posts found.", "wpgens");
}

$query = new WP_Query($query_args);

if ($query->have_posts()) :
?>
    <section class="<?php echo $css_class; ?>">
        <h3><?php echo esc_html($title); ?></h3>
        <div class="container">
            <div class="archive-row">
                <?php
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('template-parts/article', 'card');
                endwhile;
                ?>
            </div>
        </div>
    </section>
<?php
else:
?>
    <section class="no-posts <?php echo $css_class; ?>">
        <h3><?php echo esc_html($title); ?></h3>
        <p><?php echo esc_html($no_posts_message); ?></p>
    </section>
<?php
endif;

wp_reset_postdata();
