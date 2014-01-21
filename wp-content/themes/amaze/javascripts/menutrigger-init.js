jQuery(document).ready(function($) {
	
$(function () {

    //WAYPOINTS - INTERACTION
    $('#'+ pageid).waypoint(function (event, direction) {
        if (direction === 'down') {
            $('#navigation').addClass('moveTop');
        } else {
            $('#navigation').removeClass('moveTop');
        }
    });
	

});


});