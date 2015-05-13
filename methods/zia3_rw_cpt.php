<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	register_post_type( 'zia3_rw',
	array(
	'menu_icon' => 'dashicons-format-gallery',
	'labels' => array(
	'name' => __( 'Zia3 RW' ),
	'singular_name' => __( 'Rotating Words' ),
	'menu_name' => __( 'Zia3 Rotating Words' ),
	'all_items' => __( 'All Rotating Words' ),
	'add_new' => _x('Add Rotating Words', 'Rotating Words'),
	'add_new_item' => __('New Rotating Words'),
	'edit_item' => __('Edit Rotating Words'),
	'new_item' => __('New Rotating Words'),
	'view_item' => __('View Rotating Words'),
	'search_items' => __('Search Your Rotating Words'),
	'not_found' =>  __('Nothing found'),
	'not_found_in_trash' => __('Nothing found in Trash'),
	),
	'public' => false,
	'has_archive' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'zia3_rotating_words'),
	'capability_type' => 'post',
	'supports' => array('title'),
	'taxonomies' => array( 'zia3_rotating_word')));