<?php
global $smof_data;

    if($smof_data['text_g_select'] != 'none') {$pff = $smof_data['text_g_select'];} else $pff = "Open_Sans_R"; 
    if($smof_data['heading_g_select'] != 'none') {$hf = $smof_data['heading_g_select']; } else $hf = "Carto_Sans_Bold";
    if($smof_data['ch_g_select'] != 'none') {$chf = $smof_data['ch_g_select'];} else $chf = ""; 
?>
<style type="text/css">
/*-------Font Customization---------*/
p{
  font-family: "<?php echo $pff; ?>" !important;
}

.promo-caps{
    font-size: 64px;
    color: <?php echo $smof_data['dh_color']; ?>;
    font-family:"<?php echo $hf; ?>" !important;
}

.promo-caps-inv{
    font-size: 72px;
    color: <?php echo $smof_data['lh_color']; ?>;
    font-family:"<?php echo $hf; ?>" !important;
}

.promo-one h1{
    color: <?php echo $smof_data['lh_color']; ?>;
    font-family:"<?php echo $hf; ?>" !important;

}
<?php if($chf !=''): ?>
h1, h2, h3, h4, h5, h6 { font-family:"<?php echo $chf; ?>" !important;}
<?php endif; ?>
/*-----------------*/
.carousel-indicators li{
        background: #000 !important;
        cursor: pointer;
    }
    .carousel-indicators li:hover{
        background: <?php echo $smof_data['highlight_color']; ?> !important;
        cursor: pointer;
    }
    .point-left > .carousel-indicators{
        left:0 !important;
    }
    #ticker ul.tweet_list {
        min-height: 80px;
        height:150px;
        overflow-y:hidden;
    }
    #ticker .tweet_list li {
        min-height: 80px;
        height:150px;
    }
    #progress {
        position: fixed;
        height: 5px;
        background: <?php echo $smof_data['highlight_color']; ?>;
        top: 0;
        z-index: 1000;
    }
  <?php
  if(is_single() OR is_page() OR is_archive() OR is_search())
  {
  ?> 
    .page{
    	/*padding-bottom: 60px !important;*/
    	padding-bottom: 0 !important;
        height: 0;
        min-height: 0 !important;
    }
    .carousel-indicators li{
        background: #000 !important;
        cursor: pointer;
    }
    .carousel-indicators li:hover{
        background: <?php echo $smof_data['highlight_color']; ?> !important;
        cursor: pointer;
    }
    .point-left > .carousel-indicators{
        left:0 !important;
    }
    #navigation {
    top: 0 !important;
    width: 100%;
    position: fixed !important;
    height: 70px;
    z-index: 1000;
    background: #000 !important;
}
	.show-item{
		padding-top:0px !important;
	}
    .show-item-mid{
    	padding-bottom: 30px !important;
    }  
    .show-specs{
    	margin-top: 0px !important;
    } 
  <?php } ?> 


/*Custom color*/
#navigation ul li a.lighted{
    color: <?php echo $smof_data['highlight_color']; ?> !important;
}

.promo-text{
    border-bottom: solid 10px <?php echo $smof_data['highlight_color']; ?>;
}

.promo-text-inv{

    border-bottom: solid 10px <?php echo $smof_data['highlight_color']; ?>;
}

.btn-amaze{
    background: none repeat scroll 0 0 <?php echo $smof_data['highlight_color']; ?> !important;
}

.promo-one h3{

    color: <?php echo $smof_data['highlight_color']; ?>;

}

.about-feat{

    border-left: solid 10px <?php echo $smof_data['highlight_color']; ?>;
}
.about-feat:hover{

    border-left: solid 10px <?php echo $smof_data['highlight_color']; ?>;

}

.about-feat:hover h2{

    color: <?php echo $smof_data['highlight_color']; ?>;

}

.about-feat h2 > span{

    color:<?php echo $smof_data['highlight_color']; ?>;

}
.progress01 {
    background: none repeat scroll 0 0 <?php echo $smof_data['highlight_color']; ?> !important;
}
.testimonial-client{

    color: <?php echo $smof_data['highlight_color']; ?>;

}
.service-item:hover h2{

    color: <?php echo $smof_data['highlight_color']; ?>;

}

.show-desc h5{

    color: <?php echo $smof_data['highlight_color']; ?>;

}
.show-specs h6{

    color: <?php echo $smof_data['highlight_color']; ?>;

}


.show-specs h6 > span a:hover{
    color: <?php echo $smof_data['highlight_color']; ?>;

}

.show-btn{

    background: none repeat scroll 0 0 <?php echo $smof_data['highlight_color']; ?>;;

}
.folio-item{
    background: <?php echo $smof_data['highlight_color']; ?> url('images/bg/dark.png') left top no-repeat;
}
.folio-trigger-icon:hover{
    color: <?php echo $smof_data['highlight_color']; ?>;
}

.inner-link a.selected{
  background: <?php echo $smof_data['highlight_color']; ?> !important;

}

#address-block > h2{
    color: <?php echo $smof_data['highlight_color']; ?>;
        font-family:"<?php echo $hf; ?>" !important;

}

#link-block > ul > li > a:hover{
    color: <?php echo $smof_data['highlight_color']; ?>;

}

.twitter-user:hover{
    color: <?php echo $smof_data['highlight_color']; ?>;
}

    .carousel-indicators li:hover{
        background: <?php echo $smof_data['highlight_color']; ?> !important;

    }

    #progress {

        background: <?php echo $smof_data['highlight_color']; ?>;

    }



.blog-caps{
    border-left: solid 15px <?php echo $smof_data['highlight_color']; ?>;
}

.blog-author{
    color: <?php echo $smof_data['highlight_color']; ?>;

}

.blog-side-panel > h2{
    background: <?php echo $smof_data['highlight_color']; ?>;

}

.blog-side-panel > ul > li > a{

    color: <?php echo $smof_data['highlight_color']; ?>;
}
.blog-block img{
    background: <?php echo $smof_data['highlight_color']; ?>;

}

.comments .commentlists .comment-body .comment-meta .reply a:hover {

    background: <?php echo $smof_data['highlight_color']; ?>;
}

.comments .commentlists .comment-body .comment-meta .meta-name a {
    color: <?php echo $smof_data['highlight_color']; ?>;
}
<?php echo esc_textarea($smof_data['custom_css']); ?>
</style>
