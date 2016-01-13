<?php
/**
* Plugin Name: PochoMaps
* Plugin URI: http://pocholabs.github.io
* Description: A lightweight customizable map plugin with CSS animations. Choose your own image as a map and create custom map pointers which fully customizable text. Mobile Responsive.
* Version: 0.8.8
* Author: Celso Mireles
* Author URI: http://digitalstrategy.tips
* License: MIT License
*/

/**
* Enclosing all our functions in a class
* because I am a good boy who follows directions.
*/

Class PLABS {
/* -----------------------------------------------*
* Attributes
* -----------------------------------------------*/

private static $instance = null;

 // Saved Options
public $options;

/* -----------------------------------------------*
* Constructor
* -----------------------------------------------*/

/**
* Creates or returns an instance of this class.
*
* @return PLABS_Theme_Options A single instance of this class.
*/
public static function get_instance(){

	if (null == self::$instance) {
		self::$instance = new self;
	}

	return self::$instance;
}

// end get_instance

/**
* Initialize the plugin by setting localization, filters, and administration functions.
*/

private function __construct(){
	// Add back in the registration of pochomaps post-type
	add_action( 'init', array(&$this, 'register_pochomaps') );
	// Register the top level admin menu and page

	add_action('admin_init', array(&$this, 'pochomaps_admin_init') );
	add_action('admin_menu', array(&$this, 'pochomaps_admin_page') );

	// This is do add image upload functionality
	add_action('admin_print_scripts', array(&$this, 'pocho_manager_admin_scripts') );
	add_action('admin_print_styles', array(&$this, 'pocho_manager_admin_styles') );

	// Call Function to store value into database.
	add_action('init', array(&$this, 'store_in_database'));

	// Call Function to delete image.
	add_action('init', array(&$this, 'delete_image'));

	// Call function to add map point
	add_action('init', array(&$this, 'add_mappoint'));

	// ----------------------------------
	//
	// Now register scripts for front end
	//
	// ----------------------------------

	// add_action('init', array(&$this, 'pochomaps_frontend_init'));
	// add_action( 'wp_enqueue_scripts', array(&$this,'pm_frontend_scripts') );
	// add_action( 'wp_enqueue_style', array(&$this,'pm_frontend_sty') );


}

/*********************************************************/






/* --------------------------------------------*
* Functions
* -------------------------------------------- */

public function pochomaps_admin_page() {

	add_submenu_page( 'edit.php?post_type=map-point', 'The Map Points', 'Map Settings', 'publish_posts', 'map-point', array(&$this, 'pocho_admin'));

}

public function pochomaps_admin_init() {
	wp_register_style( 'PochoStylesheet', plugins_url('assets/css/style.css', __FILE__) );
	wp_register_script('PochoAdminScript', plugins_url('assets/js/main.js', __FILE__) );
	// register map scrips and css
	wp_register_style( 'MapStylesheet', plugins_url('assets/css/map.css', __FILE__) );
	wp_register_script('MapScript', plugins_url('assets/js/map.js', __FILE__) );

	// Register jquery plugin for admin page
	wp_register_script('pressAndHold', plugins_url('assets/js/jquery.pressAndHold.min.js', __FILE__) );
}

// public function pochomaps_frontend_init() {
// 	wp_register_style( 'frontMapStylesheet', plugins_url('assets/css/map.css', __FILE__) );
// 	wp_register_script('frontMapScript', plugins_url('assets/js/map.js', __FILE__) );
// }
//
// public function pm_frontend_scripts() {
// 	wp_enqueue_script('jquery');
// 	wp_enqueue_script('frontMapStylesheet');
// }
//
// public function pm_frontend_styles() {
// 	wp_enqueue_style('frontMapStylesheet');
// }

public function pocho_admin() {
	global $pagenow;
	if ('media-upload.php' == $pagenow || 'async-upload.php' == $pagenow) {
		// Now we will replace the 'Insert into Post Button inside Thickbox'
		add_filter('gettext', array($this, 'replace_window_text'), 1, 2);
		// gettext filter and every sentence.
	}

	include('admin/admin-main.php');
}


public function pocho_manager_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
	wp_enqueue_script('pressAndHold');
	wp_enqueue_script('PochoAdminScript');
	wp_enqueue_script('MapScript');
}

public function pocho_manager_admin_styles() {
	wp_enqueue_style('thickbox');
	wp_enqueue_style('PochoStylesheet');
	wp_enqueue_style('MapStylesheet');
}


public function register_pochomaps() {
	$labels = array(
		'name' => _x( 'MapPoints', 'map-point'),
		'singular_name' => _x( 'MapPoint', 'map-point'),
		'add_new' => _x( 'Add New', 'map-point'),
		'add_new_item' => _x( 'Add New MapPoint', 'map-point'),
		'edit_item' => _x( 'Edit MapPoint', 'map-point'),
		'new_item' => _x( 'New MapPoint', 'map-point'),
		'view_item' => _x( 'View MapPoint', 'map-point'),
		'search_items' => _x( 'Search MapPoints', 'map-point'),
		'not_found' => _x( 'No MapPoints Found', 'map-point'),
		'not_found_in_trash' => _x( 'No MapPoints found in Trash', 'map-point'),
		'parent_item_colon' => _x( 'Parent MapPoint:', 'map-point'),
		'menu_name' => _x( 'MapPoints', 'map-points'),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Map points for PochoMaps',
		'supports' => array( 'title', 'editor', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 100,
		'menu_icon' => 'dashicons-location',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => false,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page'
	);
	register_post_type('map-point', $args);
}


/*
* Referer parameter in our script file is for to know from which page we are launching the Media Uploader as we want to change the text "Insert into Post".
*/

function replace_window_text($translated_text, $text) {
if ('Insert into Post' == $text) {
$referer = strpos(wp_get_referer(), 'media_page');
if ($referer != '') {
return __('Upload Image', 'ink');
}
}
return $translated_text;
}

// This function stores the option in the database
public function store_in_database(){
	if(isset($_POST['submit'])){
		$image_path = $_POST['path'];
		update_option('pochomaps_map_image', $image_path);
	}
}

// Below Function will delete image.
function delete_image() {
	if(isset($_POST['remove'])){
		global $wpdb;
		$img_path = $_POST['path'];

		// We need to get the images meta ID.
		$query = "SELECT ID FROM wp_posts where guid = '" . esc_url($img_path) . "' AND post_type = 'attachment'";
		$results = $wpdb->get_results($query);

		// And delete it
		foreach ( $results as $row ) {
			wp_delete_attachment( $row->ID ); //delete the image and also delete the attachment from the Media Library.
		}
		delete_option('pochomaps_map_image'); //delete image path from database.
	}
}

// Add a map points
function add_mappoint() {
	if(isset($_POST['addpoint'])){
		global $wpdb;
		$data_top = $_POST['data-top'];
		$data_left = $_POST['data-left'];
		$point_tile = $_POST['map_point_title'];
		$point_content = $_POST['mappoint_content'];


		$post_id = wp_insert_post(array (
			'post_type' => 'map-point',
			'post_title' => $point_tile,
			'post_content' => $point_content,
			'post_status' => 'publish',
			'comment_status' => 'closed',   // if you prefer
			'ping_status' => 'closed',      // if you prefer
		));

		if ($post_id) {
			// insert post meta
			add_post_meta($post_id, '_data-top', $data_top);
			add_post_meta($post_id, '_data-left', $data_left);

		}

	}
}

} // End PLABS class constructor

PLABS::get_instance();


function pocho_shortcode (){
	ob_start();
	global $wpdb;
	$default_img = plugins_url('/assets/img/sample.png', __FILE__);
	$img_path = get_option('pochomaps_map_image', $default_img);
	?>
	<div class="distribution-map" id="show_upload_preview">

	<div id="preview-image-wrap">
		<img src="<?php echo $img_path ; ?>" data-checking="true" id="preview-image" class="map-image" alt="Map not found">
	</div>

	<?php
		$args = array('post_type' => 'map-point');
		$query = new WP_Query($args);

		while( $query -> have_posts() ) : $query -> the_post();

		$custom_fields = get_post_custom( get_the_ID() );
		$dtop = $custom_fields['_data-top'];
		$dleft = $custom_fields['_data-left'];

		?>

		<div data-top="<?php echo $dtop[0]; ?>" data-left="<?php echo $dleft[0]; ?>" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2><?php echo the_title(); ?></h2>

					<?php echo the_content(); ?>
				</div>
			</div>
		</div>


		<?php endwhile; ?>



	</div>
	<?php include('templates/map.php');
	 return ob_get_clean();

}
add_shortcode('pochomap', 'pocho_shortcode');




function pochomaps_frontend_init() {
	wp_register_style( 'frontMapStylesheet', plugins_url('assets/css/map.css', __FILE__) );
	wp_register_script('frontMapScript', plugins_url('assets/js/map.js', __FILE__) );
}

function pm_frontend_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('frontMapScript');
}

function pm_frontend_styles() {
	wp_enqueue_style('frontMapStylesheet');
}


add_action('init', 'pochomaps_frontend_init');
add_action( 'init', 'pm_frontend_scripts' );
add_action( 'init', 'pm_frontend_styles' );



// Include our updater file
include_once( plugin_dir_path( __FILE__ ) . 'update.php');

$updater = new Pocho_Updater( __FILE__ ); // instantiate our class
$updater->set_username( 'PochoLabs' ); // set username
$updater->set_repository( 'WordPress-PochoMaps' ); // set repo
$updater->initialize(); // initialize the updater
