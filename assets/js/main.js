jQuery(document).ready(function() {
	jQuery('#upload_image').click(function() {
		formfield = jQuery('#image_path').attr('name');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		return false;
	});

	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#image_path').val(imgurl);
		tb_remove();
	};

	// Detect hover position over map and populate appropriate data fields


});
