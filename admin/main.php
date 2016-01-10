<?php
	//Some code can go here.
 ?>

<div class='wrap'>
	<div id="pocho-main">
		<h1>PochoMaps Admin</h1>
		<script language="JavaScript">
			jQuery(document).ready(function() {
				jQuery('#upload_image_button').click(function() {
				formfield = jQuery('#upload_image').attr('name');
				tb_show('', 'media-upload.php?type=image&TB_iframe=true');
				return false;
				});

				window.send_to_editor = function(html) {
				imgurl = jQuery('img',html).attr('src');
				jQuery('#upload_image').val(imgurl);
				tb_remove();
				}

				var imageTextField = jQuery('#upload_image');
				if (imageTextField.attr('value').length === 0){
					imageTextField.css('display', 'none');
				}

			});
		</script>



		<label for="upload_image">
			<input id="upload_image" type="text" size="36" name="upload_image" value="" />
			<input id="upload_image_button" type="button" value="Upload Image" />
			<br />Enter an URL or upload an image of your map.
			</label>


		</div>
</div>
