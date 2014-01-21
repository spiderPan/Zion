<?php
/*
Plugin Name: ScrollPo
Plugin URI: http://designova.net/scrollpo/
Description: Scroll POsition Finder for Amaze
Version:  1.0.0
Author: Rakesh
Author URI: http://www.pixelglimpse.com
License: GPLv2
Copyright 2012  Rakesh Suryavardhan (twitter : @suryavardhan)
*/
 //hook the installation function to the activation plugin
register_activation_hook(__FILE__,'scrollpo');

//Style and js



if (!is_admin()) 
{ 

    add_action('init', 'scrollpo_styles');
    add_action('init', 'scrollpo_script');
    add_action( 'wp_head', 'alert_user', 20);
}



function scrollpo_styles() 
{
  wp_enqueue_style( 'scrollpo-css', plugins_url('scrollpo/scrollpo.css'), false );
}
function scrollpo_script() 
{
 wp_enqueue_script( 'scrollpo-js', plugins_url('scrollpo/scrollpo.js'),array('jquery'),false,true);
}

function alert_user()
{
	if(is_user_logged_in() == TRUE)
	{
     echo '<div class="scrollpo-status"></div>';
    }
}
