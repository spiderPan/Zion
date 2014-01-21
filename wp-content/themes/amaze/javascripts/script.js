//JSHint Validated Custom JS Code by Designova

/*global $:false */
/*global window: false */
jQuery(document).ready(function($) {

(function(){
  "use strict";

// Initialize prettyPhoto plugin
$(".portfolio a[data-gal^='prettyPhoto']").prettyPhoto({
    theme: 'dark_square',
    autoplay_slideshow: false,
    overlay_gallery: false,
    show_title: true
});


//MASONRY PORTFOLIO INIT:
$(function () {

    var $container = $('#container');

    $container.isotope({
        itemSelector: '.element',
        layoutMode: 'masonry'
    });


    var $optionSets = $('#options .option-set'),
        $optionLinks = $optionSets.find('a');

    $optionLinks.click(function () {
        var $this = $(this);
        // don't proceed if already selected
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        var changeLayoutMode;
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            // changes in layout modes need extra logic
            changeLayoutMode($this, options);
        } else {
            // creativewise, apply new options
            $container.isotope(options);
        }

        return false;
    });


});

//Blog paginate
  $('.paginate a').addClass('btn');
  $('#post-comment').addClass('btn btn-amaze');
  $.ajaxSetup({cache:false});
  $('.paginate a').live('click', function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    var height = $('#ajax-container').height();
     
    $('#ajax-container').fadeOut(500).load(link + ' #ajax-inner', function(){ $('#ajax-container').fadeIn(300);  $('.paginate a').addClass('btn'); });
  });



/*===========================================================*/
/*  Colorbox
/*===========================================================*/
$(function () {
    
    var viewportHeight = $(window).height();
    var introMargin = (viewportHeight / 3) - (viewportHeight / 12);
    $('.spalsh-page').height(viewportHeight);
    $('.promo-one').css('margin-top', introMargin);
    //Examples of how to assign the ColorBox event to elements
    $(".zoom-info").colorbox({
        rel: 'group1',
        maxWidth:'1000px',  
    });

    $('.band').mouseenter(function () {
        var pageInd = $(this).attr('id');
        $('#navigation ul li > a').removeClass('lighted');
        $('#' + pageInd + '-linker').addClass('lighted');
    });

    $('#navigation ul li > a').click(function () {
        $('#navigation ul li > a').removeClass('lighted');
        $(this).addClass('lighted');
    });


    //$('#navigation ul').localScroll(9500);

    $('.carousel').carousel({
        interval: false
    });


    $('.folio-item').mouseenter(function () {
        $(this).find('img').css('opacity', '0.2');
        $(this).find('.folio-trigger-icon').fadeIn();
        $(this).find('.titles').fadeIn();
    });

    $('.folio-item').mouseleave(function () {
        $('.folio-item').find('.titles').fadeOut();
        $(this).find('.folio-trigger-icon').fadeOut();
        $('.folio-item').find('img').css('opacity', '1');
    });


    $('.element > img, .service-item, .about-feat').mouseleave(function () {
        $(this).addClass('remove-zoom');
    });
});


})();

});