		jQuery(function ($) {
				/* You can safely use $ in this code block to reference jQuery */
				$("a#mission_vision").fancybox({
						'padding' : 10,
						'margin' : 20,
						'width'				: 800,
						'height'			: 400,
						'autoScale'     	: false,
						'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe'
					});
				$("a#link-directory").fancybox({
						'padding' : 10,
						'margin' : 20,
						'width'				: 970,
						'height'			: 589,
						'autoScale'     	: false,
						'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe'
					});                                    
                                    
                            loc = window.location.href;
                            loc = loc.split('?')[0];
                            jQuery('.menu-item').each(function(){
                                li_item = jQuery(this);
                                jQuery(this).children().each(function(){
                                   link = jQuery(this).attr('href'); 
//                                   alert(link+"\t"+loc);
                                   if(endsWith(loc, link) == true){
                                       jQuery(this).css('font-weight', 'bolder');
                                       jQuery(this).css('text-decoration', 'underline');
                                   }
                                });                                
                            });    
			});


function endsWith(str, suffix) {
//    alert(str.indexOf(suffix, str.length - suffix.length));
    if(str != null && suffix != null && str != undefined && suffix != undefined){
        return str.indexOf(suffix, str.length - suffix.length) !== -1;
    }
    else{
        return false;
    }
}





