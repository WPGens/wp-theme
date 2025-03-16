<?php

// Define theme constants for blocks
define('WPGENS_BLOCKS_PATH', get_template_directory() . '/blocks/');
define('WPGENS_BLOCKS_URL', get_template_directory_uri() . '/blocks/');
define('WPGENS_BLOCKS_VERSION', '1.0.1');


// Include dynamic blocks render files here
require_once WPGENS_BLOCKS_PATH . 'src/blocks/events/render.php';
require_once WPGENS_BLOCKS_PATH . 'src/blocks/venues/render.php';
require_once WPGENS_BLOCKS_PATH . 'src/blocks/search/render.php';

// Register custom block category
add_filter('block_categories_all', 'wpgens_blocks_register_category');
function wpgens_blocks_register_category($categories)
{
	return array_merge(
		[
			[
				'slug'  => 'wpgens',
				'title' => __('Custom Blocks', 'wpgens-blocks'),
				'icon'  => 'block-default', // You can use any dashicon here
			],
		],
		$categories
	);
}

// Initialize the blocks
add_action('init', 'wpgens_blocks_init');
function wpgens_blocks_init()
{
	// Register blocks using block.json
	register_block_type(WPGENS_BLOCKS_PATH . 'build/blocks/button');
	register_block_type(WPGENS_BLOCKS_PATH . 'build/blocks/hero');
	register_block_type(WPGENS_BLOCKS_PATH . 'build/blocks/faq');
	register_block_type(WPGENS_BLOCKS_PATH . 'build/blocks/image-text');
	register_block_type(WPGENS_BLOCKS_PATH . 'build/blocks/hero-slider');
	register_block_type(WPGENS_BLOCKS_PATH . 'build/blocks/feature-boxes');

	register_block_type(WPGENS_BLOCKS_PATH . 'build/blocks/events', array(
		'render_callback' => 'wpgens_render_block_events',
	));

	register_block_type(WPGENS_BLOCKS_PATH . 'build/blocks/venues', array(
		'render_callback' => 'render_block_wpgens_venues',
	));

	register_block_type(WPGENS_BLOCKS_PATH . 'build/blocks/search', array(
		'render_callback' => 'render_block_search',
	));
}

// Register Gutenberg Default Block Styles
add_action('init', 'wpgens_blocks_register_block_styles');
function wpgens_blocks_register_block_styles()
{
	register_block_style('core/group', [
		'name' => 'full-width',
		'label' => __('Full Width', 'wpgens-blocks'),
		'isDefault' => true,
	]);

	register_block_style('core/group', [
		'name' => 'container',
		'label' => __('Container', 'wpgens-blocks'),
	]);

	register_block_style('core/group', [
		'name' => 'small-container',
		'label' => __('Small Container', 'wpgens-blocks'),
	]);

	// Register columns padding styles
	register_block_style('core/columns', [
		'name' => 'padding-small',
		'label' => __('Small Padding', 'wpgens-blocks'),
	]);

	register_block_style('core/columns', [
		'name' => 'padding-large',
		'label' => __('Large Padding', 'wpgens-blocks'),
	]);
}

// Enqueue default block assets for both editor and frontend
function wpgens_blocks_enqueue_assets()
{
	// Enqueue block styles
	wp_enqueue_style(
		'wpgens-blocsks',
		WPGENS_BLOCKS_URL . 'src/style.css',
		[],
		WPGENS_BLOCKS_VERSION
	);
}
add_action('enqueue_block_assets', 'wpgens_blocks_enqueue_assets');
// @todo - mozda ovo loadati samo u editoru i prebaciti front dio u inc/enqueue.php
// add_action('enqueue_block_editor_assets', 'wpgens_blocks_enqueue_assets');