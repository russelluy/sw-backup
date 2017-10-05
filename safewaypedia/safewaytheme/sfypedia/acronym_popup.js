jQuery(document).ready(function() {      
        jQuery('a[href="http://frevvo"]').attr('href', 'frevvo');
        jQuery('a[href="frevvo"]').click(function(){		
		jQuery('<div id="ajax-popup"><iframe src="https://formsqa.safeway.com:443/frevvo/web/tn/safeway.com/user/awang04/app/_syJuAfqEEeCmGNNYI0v_FQ/formtype/_O_RAoEVmEeKCvaRHbJnHyQ/popupform?locale=" frameborder="0" width="720" height="350" scrolling="no" style="margin-left: -20px;"></iframe></div>').hide().appendTo('body').modal();
		return false;
	});    
                        
	jQuery('a.postpopup, a.post-edit-link').click(function(){
		id = jQuery(this).attr('rel');
		jQuery('<div id="ajax-popup"></div>').hide().appendTo('body').load(id).modal();                
		return false;
	});
        
        site_urls = jQuery('a.post-edit-link').attr('href');        
        if(site_urls != null && site_urls != ''){
            site_urls_tmp = site_urls.split('wp-admin');
            tmp = jQuery('a.post-edit-link').attr('href').split('post=');
            id = tmp[1].split('&action');
            jQuery('a.post-edit-link').attr('rel', site_urls_tmp[0]+'index.php/ajax/?id='+id[0]);
            jQuery('a.post-edit-link').attr('href', '#');
        }
    
});

function validateUpdate(){   
//    alert(jQuery('input[name=id]').val());
    if(jQuery('input[name=id]').val() == null || jQuery('input[name=id]').val() == ''){
        alert('Please choose an existing post.');
        return false;
    }
    if(jQuery('input[name=title]').val() == null || jQuery('input[name=title]').val() == ''){
        alert('Title cannot be empty');
        return false;
    }
    else{
	match = jQuery('input[name=title]').val().charAt(0).match(/[0-9a-z#]/i);
	if(match){		
	}
	else{
		alert('Title cannot start with special characters other than #.');
		return false;
	}
    }
    if(jQuery('input[name=description]').val() == null || jQuery('input[name=description]').val() == ''){
        alert('Description cannot be empty');
        return false;
    }
    if(jQuery('textarea[name=definition]').val() == null || jQuery('textarea[name=definition]').val() == ''){
        alert('Definition cannot be empty');
        return false;
    }    
    // make an ajax call
    jQuery.ajax( {
                        "url": jQuery('input[name=url]').val()+"/wp-content/themes/safewaytheme/updatePost.php",
                        "dataType": 'json',
                        "type": "POST",
                        "data": {"id":jQuery('input[name=id]').val(), "title":jQuery('input[name=title]').val(), "description":jQuery('input[name=description]').val(), "definition":jQuery('textarea[name=definition]').val()},
                        "beforeSend": function() {    			  		
                            jQuery('div[id=message]').css('color', 'black');
                            jQuery('div[id=message]').html('<span><img src="../../wp-content/themes/safewaytheme/images/processing.gif" /> Processing. Please wait . . . </span>');
                        }, 
                        "success": function(resu) {
//                            alert(resu.success);
                             if(resu.success != undefined && resu.success != null && resu.success == 'true'){
//                                 alert(resu.success);
                                jQuery('div[id=message]').css('color', 'green');
                                jQuery('div[id=message]').text('Update Successful. Reloading the page. Please wait.');  
                                setTimeout(function(){window.location.reload(true);},500);                                
                            }
                            else{
                                jQuery('div[id=message]').css('color', 'red');
                                jQuery('div[id=message]').text('Update failed.');
//                                jQuery('div[id=message]').show();
                            }
                        },
                        "error": function(msg) {            	         
                            jQuery('div[id=message]').css('color', 'red');
                            jQuery('div[id=message]').text('Update failed.');
    //                        jQuery('div[id=message]').show();
                        }

        });
    
}