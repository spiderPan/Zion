jQuery(document).ready( function() {

        jQuery('.is_onepage').each( function() 
        {
          var hash = jQuery(this).attr('href');
          jQuery(this).attr('href', singobj.home_url +'/'+ hash);
        });
        //Mobile
        jQuery('.is_mob_onepage_single').each( function() 
        {
          var hash = jQuery(this).attr('value');
          jQuery(this).attr('value', singobj.home_url +'/'+ hash);
        });

});


  