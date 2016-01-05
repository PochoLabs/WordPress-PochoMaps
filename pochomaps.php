<?php
/**
* Plugin Name: PochoMaps
* Plugin URI: http://pocholabs.github.io
* Description: A lightweight customizable map plugin with CSS animations. Choose your own image as a map and create custom map pointers which fully customizable text. Mobile Responsive.
* Version: 1.0
* Author: Celso Mireles
* Author URI: http://digitalstrategy.tips
* License: MIT License
*/

function register_pochomaps() {
	$labels = array(
		'name' => _x( 'PochoMaps', 'pocho-maps'),
		'singular_name' => _x( 'Map', 'pocho-maps'),
		'add_new' => _x( 'Add New', 'pocho-maps'),
		'add_new_item' => _x( 'Add New Map', 'pocho-maps'),
		'edit_item' => _x( 'Edit Map', 'pocho-maps'),
		'new_item' => _x( 'New Map', 'pocho-maps'),
		'view_item' => _x( 'View Map', 'pocho-maps'),
		'search_items' => _x( 'Search Maps', 'pocho-maps'),
		'not_found' => _x( 'No Maps Found', 'pocho-maps'),
		'not_found_in_trash' => _x( 'No maps found in Trash', 'pocho-maps'),
		'parent_item_colon' => _x( 'Parent Map:', 'pocho-maps'),
		'menu_name' => _x( 'PochoMaps', 'pocho-maps'),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Custom Maps with animateds markers',
		'supports' => array( 'title', 'author', 'thumbnail', 'revisions', 'page-attributes'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 3,
		'menu_icon' => 'dashicons-location',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => false,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page'
	);

	register_post_type('pocho-maps', $args);
}

add_action( 'init', 'register_pochomaps');
