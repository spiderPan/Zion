<?php
/**
 * Created by PhpStorm.
 * User: Pan
 * Date: 18/12/13
 * Time: 9:04 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title><?php wp_title(); ?> - <?php bloginfo('name'); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- 1140px Grid styles for IE -->
    <!--[if lte IE 9]>
    <?php wp_enqueue_style('ie', get_bloginfo('template_url') . '/styles/ie.css'); ?>
    <?php wp_enqueue_script('canvas',get_bloginfo('template_url').'/js/excanvas.js');?>
    <![endif]-->

    <!--[if IE 7]>
    <?php wp_enqueue_style('ie-7', get_bloginfo('template_url') . '/styles/ie7.css'); ?>
    <![endif]-->

    <!-- The 1140px Grid - http://cssgrid.net/ -->
    <?php wp_enqueue_style('1140-grid', get_bloginfo('template_url') . '/styles/1140.css'); ?>

    <!-- Your styles -->
    <?php wp_enqueue_style('main-style', get_bloginfo('template_url') . '/style.css'); ?>

    <!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
    <?php wp_enqueue_script('media-query', get_bloginfo('template_url') . '/js/css3-mediaqueries.js'); ?>
    <?php wp_enqueue_script('modernizr', get_bloginfo('template_url') . '/js/modernizr.custom.18967.js'); ?>
    <?php wp_enqueue_script('scripts', get_bloginfo('template_url') . '/js/js.js'); ?>
    <?php wp_head(); ?>

</head>
<body>

<header class="container">
    <h2 class="hid">Header</h2>
    <nav class="row">
        <h1 class="hid">Navigation</h1>

        <?php wp_nav_menu(array(
            'menu' => 'mainNav'
        ));?>
        <div class="twocol navList">
            <h2 class="hid">Home</h2>
            <a class="navLink" href="index.html">
                <span class="ch">主页</span><br>Home
            </a>
        </div>
        <div class="twocol navList">
            <h2 class="hid">Portfolio</h2>
            <a class="navLink" href="portfolio.html">
                <span class="ch">作品</span><br>Portfolio
            </a>
        </div>
        <div class="onecol"></div>
        <section class="twocol">
            <h2 class="hid">Logo</h2>
            <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo">
        </section>
        <div class="onecol"></div>
        <div class="twocol navList">
            <h2 class="hid">About</h2>
            <a class="navLink" href="about.html">
                <span class="ch">关于</span><br>About
            </a>
        </div>
        <div class="twocol last navList">
            <h2 class="hid">Contact</h2>
            <a class="navLink" href="contact.html">
                <span class="ch">联系</span><br>Contact
            </a>
        </div>
    </nav>
</header>