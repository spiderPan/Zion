//jQuery(document).ready(function($) {        contentArea
function moveTo(){
	        var ca = jQuery('.dropmenuam').val();
	        var cls =  jQuery('option:selected').attr('class');
	        if(cls == 'is_mob_onepage')
	        {
	        	var goPosition = jQuery(ca).offset().top;
	        	jQuery('html,body').animate({ scrollTop: goPosition}, 'slow');
            }
            else
            {
            	window.location.href = ca;
            	//alert('test');
            }
        }
