<?php
	//Some code can go here.
 ?>

<div class='wrap'>
	<div id="pocho-main">

		<h1>PochoMaps Admin</h1>

		<?php
		global $wpdb;
		$default_img = plugins_url('../assets/img/sample.png', __FILE__);
		$img_path = get_option('pochomaps_map_image', $default_img);
?>
<div class="col-6">
<form class="ink_image" method="post" action="#">
<h2> <b>Upload your Image from here </b></h2>

<input type="text" name="path" class="image_path input-field" value="<?php echo $img_path; ?>" id="image_path">
<input type="button" value="Upload Image" class="button-primary" id="upload_image"/>
<br><br>
<input type="submit" name="submit" class="save_path button-primary" id="submit_button" value="Save Setting">
<input type="submit" name="remove" value="Remove Image" class="button-secondary" id="remove_image"/>

</form>

<?php if(! empty($img_path)){
?>
<br>

	<form id="add-point" method="post" action="#">
		<input type="text" class="input-field" name="data-top" id="input-data-top" value="" placeholder="Percent from Top">
		<input type="text" class="input-field" name="data-left" id="input-data-left" value="" placeholder="Percent from Left">

		<br>

		<input class="input-field" type="text" name="map_point_title" value="" placeholder="Title">

		<br>
		<textarea name="mappoint_content" class="mappoint_content input-field" rows="4" cols="60" placeholder="Your Map Point's content here."></textarea>


		<br>
		<input class="button-primary" type="submit" name="addpoint" value="Add Map Point">

		<input id="recheckButton" name="recheck" type="button" class="button-secondary" value="Reset Check Hover">
	</form>
</div>

<div class="distribution-map col-6" id="show_upload_preview">

<div id="preview-image-wrap">
	<img src="<?php echo $img_path ; ?>" data-checking="true" id="preview-image" class="map-image" alt="Map not found">


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





</div>
<br><br>

<?php } ?>


		</div> <!-- /#pocho-main -->
</div> <!-- /.wrap -->
