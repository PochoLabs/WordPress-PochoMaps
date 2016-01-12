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
	var checkHover = true;

	jQuery('#preview-image').mousemove(function(e){
		if(jQuery(this).attr('data-checking') === 'true'){
			var offset = jQuery(this).offset();
			var imgWidth = jQuery(this).width();
			var imgHeight = jQuery(this).height();

			var posLeft = ((e.pageX - offset.left) > 0) ? (e.pageX - offset.left) : 0;
			var posTop = ((e.pageY - offset.top) > 0 ) ? (e.pageY - offset.top) : 0;

		  var relativeX = (  (( (  (posLeft) ) / imgWidth) * 100) );
			var relativeX2 = (relativeX > 100) ? 100 : relativeX;

		  var relativeY = (  (( (  (posTop)  ) / imgHeight) * 100) );
			var relativeY2 = (relativeY > 100) ? 100 : relativeY;


			jQuery('#input-data-top').val(parseFloat(relativeY2).toFixed(2));
			jQuery('#input-data-left').val(parseFloat(relativeX2).toFixed(2));
		}

	});

	jQuery('#preview-image-wrap').pressAndHold({
		holdTime: 1000,
		progressIndicatorRemoveDelay: 900,
		progressIndicatorColor: "#4aac19",
		progressIndicatorOpacity: 1
	});

	// jQuery('#preview-image-wrap').on('start.pressAndHold', function(event) {
	// 	console.log('clicking');
	// });

	jQuery('#preview-image-wrap').on('complete.pressAndHold', function(event) {
		jQuery('#preview-image').attr('data-checking', 'false');


		var topCoord = jQuery('#input-data-top').val();
		var leftCoord = jQuery('#input-data-left').val();

		var theDiv = '<div style="top:' + topCoord + '%;left:' + leftCoord + '%;" class="map-point temp"><div class="content"><div class="centered-y"></div></div></div>';

		console.log(topCoord);
		jQuery('#preview-image-wrap').append(theDiv);

	});

	jQuery('#recheckButton').click(function(e){
		e.preventDefault();
		jQuery('#preview-image').attr('data-checking', 'true');

		jQuery('.map-point.temp').remove();
	});

	// Validate add mappoint form
	jQuery('#add-point').submit(function(e){
		var dtop = e.target.data-top.value;
		var dleft = e.target.data-left.value;
		var title = e.target.map_point_title.value;
		var content = e.target.mappoint_content.value;
		var somethingIsBlank = false;

		if(dtop.length === 0 || dleft.length === 0 || title.length === 0 || content.length === 0){
			e.preventDefault();
			alert('Something Is Blank');
		}
	});

});
