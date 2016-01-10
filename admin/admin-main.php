<?php
	//Some code can go here.
 ?>

<div class='wrap'>
	<div id="pocho-main">
		<h1>PochoMaps Admin</h1>

		<?php
		global $wpdb;
		$img_path = get_option('pochomaps_map_image');
?>

<form class="ink_image" method="post" action="#">
<h2> <b>Upload your Image from here </b></h2>
<input type="text" name="path" class="image_path" value="<?php echo $img_path; ?>" id="image_path">
<input type="button" value="Upload Image" class="button-primary" id="upload_image"/> Upload your Image from here.
<input type="submit" name="submit" class="save_path button-primary" id="submit_button" value="Save Setting">
<input type="submit" name="remove" value="Remove Image" class="button-secondary" id="remove_image"/>

</form>

<?php if(! empty($img_path)){
?>
<br><br>
<div>
	<form id="form_id" action="#" method="post">
		<input type="text" name="data-top" id="input-data-top" value="" placeholder="Percent from Top">
		<input type="text" name="data-left" id="input-data-left" value="" placeholder="Percent from Left">

		<br>

		<input type="text" name="map_point_title" value="" placeholder="Title">

		<br>
		<textarea name="mappoint_content" class="mappoint_content" rows="4" cols="100" placeholder="Your Map Point's content here."></textarea>


		<br>
		<input class="button-primary" type="button" name="add" value="Add Map Point">
		<input id="recheckButton" name="recheck" type="button" class="button-secondary" value="Reset Check Hover">
	</form>
</div>

<div class="distribution-map" id="show_upload_preview">

<div id="preview-image-wrap">
	<img src="<?php echo $img_path ; ?>" data-checking="true" id="preview-image" class="map-image" alt="Map not found">
</div>

<div data-top="62" data-left="21" class="map-point">
	<div class="content">
		<div class="centered-y">
			<h2>Arizona</h2>
			<p><a href="http://www.asu.edu/" target="_blank">Arizona State University (All Campuses)</a></p>
			<p><a href="https://asuonline.asu.edu/online-degree-programs" target="_blank">Arizona State University Online (Scholar must live in AZ)</a></p>
			<p><a href="https://asuonline.asu.edu/online-degree-programs" target="_blank">Arizona State University Online (CCG only, Starbucks Program)</a></p>
			<h5 class="two-year">Maricopa Community Colleges</h5>
			<p><a href="http://www.phoenixcollege.edu/" target="_blank" class="two-year">  - Phoenix</a></p>
			<p><a href="http://www.gatewaycc.edu/" target="_blank" class="two-year">  - GateWay</a></p>
			<p><a href="http://www.southmountaincc.edu/" target="_blank" class="two-year">  - South Mountain</a></p>
		</div>
	</div>
</div>

</div>
<br><br>

<?php } ?>


		</div> <!-- /#pocho-main -->
</div> <!-- /.wrap -->
