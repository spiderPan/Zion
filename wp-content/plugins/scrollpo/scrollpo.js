jQuery(document).ready(function($) {

$(document).scroll(function(e){
    $('.scrollpo-status').html("Scroll position: "+ $(window).scrollTop());
});

});