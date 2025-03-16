<?php

/**
 * Post Types Manager
 * Handles registration of custom post types and taxonomies
 */
class Post_Types
{
	/**
	 * Initialize the post types and taxonomies
	 */
	public function init(): void
	{
		add_action('init', [$this, 'register_post_types']);
		add_action('init', [$this, 'register_taxonomies']);
	}

	/**
	 * Register custom post types
	 */
	public function register_post_types(): void
	{
		// // Register Event CPT
		// register_post_type('events', [
		// 	'labels' => [
		// 		'name' => __('Events', 'wpgens-event-manager'),
		// 		'singular_name' => __('Event', 'wpgens-event-manager'),
		// 		'add_new' => __('Add New Event', 'wpgens-event-manager'),
		// 		'add_new_item' => __('Add New Event', 'wpgens-event-manager'),
		// 		'edit_item' => __('Edit Event', 'wpgens-event-manager'),
		// 		'new_item' => __('New Event', 'wpgens-event-manager'),
		// 		'view_item' => __('View Event', 'wpgens-event-manager'),
		// 		'search_items' => __('Search Events', 'wpgens-event-manager'),
		// 		'not_found' => __('No events found', 'wpgens-event-manager'),
		// 		'not_found_in_trash' => __('No events found in Trash', 'wpgens-event-manager'),
		// 	],
		// 	'public' => true,
		// 	'has_archive' => true,
		// 	'supports' => ['title', 'editor', 'thumbnail'],
		// 	'menu_icon' => 'dashicons-calendar-alt',
		// 	'rewrite' => ['slug' => 'events'],
		// 	'show_in_rest' => true,
		// 	'menu_position' => 20,
		// 	'capability_type' => 'post',
		// 	'map_meta_cap' => true,
		// ]);

	}

	/**
	 * Register custom taxonomies
	 */
	public function register_taxonomies(): void
	{
		// Register Event Type Taxonomy
		// register_taxonomy('event_type', ['events'], [
		// 	'labels' => [
		// 		'name' => __('Event Types', 'wpgens-event-manager'),
		// 		'singular_name' => __('Event Type', 'wpgens-event-manager'),
		// 		'search_items' => __('Search Event Types', 'wpgens-event-manager'),
		// 		'all_items' => __('All Event Types', 'wpgens-event-manager'),
		// 		'parent_item' => __('Parent Event Type', 'wpgens-event-manager'),
		// 		'parent_item_colon' => __('Parent Event Type:', 'wpgens-event-manager'),
		// 		'edit_item' => __('Edit Event Type', 'wpgens-event-manager'),
		// 		'update_item' => __('Update Event Type', 'wpgens-event-manager'),
		// 		'add_new_item' => __('Add New Event Type', 'wpgens-event-manager'),
		// 		'new_item_name' => __('New Event Type Name', 'wpgens-event-manager'),
		// 		'menu_name' => __('Event Types', 'wpgens-event-manager'),
		// 	],
		// 	'hierarchical' => true,
		// 	'show_admin_column' => true,
		// 	'show_in_rest' => true,
		// 	'rewrite' => ['slug' => 'event-type'],
		// 	'show_in_menu' => true,
		// ]);

	}
}