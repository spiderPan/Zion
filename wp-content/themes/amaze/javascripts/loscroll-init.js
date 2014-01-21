// jQuery(document).ready(function($) {
	

// // jQuery(function () {

// //    alert('test');
// //    jQuery('#navigation ul').localScroll(9500);

// // });

   
// });

jQuery(document).ready(function($) {
$(document).ready(function() {

    $("#navigation ul li a").click(function() {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top + "px"
        }, {
            duration: 1500,
            easing: "swing"
        });
        return false;
    });

});
});