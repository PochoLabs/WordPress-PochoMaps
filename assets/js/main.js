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
	jQuery('#preview-image').mousemove(function(e){
		var offset = jQuery(this).offset();
		var imgWidth = jQuery(this).width();
		var imgHeight = jQuery(this).height();
	  var relativeX = ( 100 - ((((e.pageX - offset.left) - imgWidth) / imgWidth) * -100) );
	  var relativeY = (100 - ((((e.pageY - offset.top) - imgHeight) / imgHeight) * -100) );

		jQuery('#input-data-top').val(relativeY);
		jQuery('#input-data-left').val(relativeX);


	});

});
