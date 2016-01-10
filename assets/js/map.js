jQuery(document).ready(function(){
	// Change from style positioning to custom data attributes
	jQuery('.map-point').each(function(){
		var top = jQuery(this).attr('data-top') + '%';
		var left = jQuery(this).attr('data-left') + '%';
		jQuery(this).animate({
			top: top,
			left: left
		});
	});


  var activeClass = 'active';


  jQuery('.map-point').click(function(e){
    jQuery('.map-point').removeClass(activeClass).focusout();
    jQuery(this).addClass(activeClass).focus();
    e.stopPropagation();


  });

  jQuery('body').click(function(e){
    jQuery('.map-point').removeClass(activeClass);
    e.stopPropagation();

  });
});
