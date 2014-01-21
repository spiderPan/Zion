<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head class="no-skrollr">
    <?php   global $smof_data; ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php echo " | ".bloginfo('name').get_bloginfo('description'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>"/>
    <meta name="keywords" content="<?php bloginfo('categories'); ?>"/>

    <!-- Le fav and touch icons -->
    <?php if($smof_data['favicon'] != '') { ?>
    <link rel="shortcut icon" href="<?php echo $smof_data['favicon']; ?>">
    <?php } else {?>
    <link rel="shortcut icon" href="<?php get_stylesheet_directory_uri(); ?>images/favicon.ico">
    <?php } ?>
   
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="stylesheets/ie8.css">
    <![endif]-->
    <?php 
      //loading GF
    

    get_template_part('inpagestyles'); ?>
    <?php wp_head();  ?>
</head>
<body <?php body_class(); ?>>
    
  <div id="skrollr-body">

 <?php get_header();


 ?>
<!-- Mobile Only Navigation-->
    <?php 
      $mobilelogo = $smof_data['mobilelogo'];
      custom_mobile_menu($mobilelogo); 
    ?>
<!-- Desktop Navigation-->
    <?php 
      
      $logo = $smof_data['mainlogo'];
      custom_menu($logo); 
    ?>
<!--/Navigation-->
   