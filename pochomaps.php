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


// Register the top level admin menu and page

function pochomaps_admin_action() {

	add_menu_page('PochoMaps Admin', 'PochoMaps', 'manage_options', 'pocho-admin', 'pocho_admin');
}

function pochomaps_admin_init() {
	wp_register_style( 'PochoStylesheet', plugins_url('assets/css/style.css', __FILE__) );
	wp_register_script('PochoAdminScript', plugins_url('assets/js/main.js', __FILE__) );
	// register map scrips and css
	wp_register_style( 'MapStylesheet', plugins_url('assets/css/map.css', __FILE__) );
	wp_register_script('MapScript', plugins_url('assets/js/map.js', __FILE__) );
}

function pocho_admin() {
	include('pocho_import_admin.php');
}

add_action('admin_init', 'pochomaps_admin_init');
add_action('admin_menu', 'pochomaps_admin_action');


// This is do add image upload functionality
function pocho_manager_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
	wp_enqueue_script('PochoAdminScript');
	wp_enqueue_script('MapScript');
}

function pocho_manager_admin_styles() {
	wp_enqueue_style('thickbox');
	wp_enqueue_style('PochoStylesheet');
	wp_enqueue_style('MapStylesheet');
}

add_action('admin_print_scripts', 'pocho_manager_admin_scripts');
add_action('admin_print_styles', 'pocho_manager_admin_styles');
