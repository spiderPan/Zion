<?php   global $smof_data; ?>
 <section class="container-fluid address-wrap">
    <div class="row-fluid">
        <section class="container">

            <div class="row">

                <article id="link-block" class="span3">
                    <?php 
                      quicklinks_menu(); 
                     ?>  

                </article>

                <article id="address-block" class="span9">
                    <?php if($smof_data['footerlogo'] == '' && $smof_data['footer_title'] != '')
                    {
                       echo '<h2>'.esc_html($smof_data['footer_title']).'</h2>';
                    }
                    elseif( $smof_data['footerlogo'] != '' && $smof_data['footer_title'] != '')
                    {
                        echo '<img src="'.$smof_data['footerlogo'].'" alt="logo" title="'.get_bloginfo('name').'"/>';
                    }
                    ?>
                    <h3><?php  echo $smof_data['footer_addressline']; ?></h3>
                    <h5><span><?php  echo $smof_data['footer_copyright']; ?></span></h5>
                </article>

                
                
            </div><!--/ row-->

        </section><!--/ container-->        
    </div><!--/ row-fluid-->
    </section>

<footer id="mastfoot">
    <section class="container-fluid">
    <div class="row-fluid">
        <section class="container">

            <div class="row">
                <article class="span4">
                    <?php  if($smof_data['twitter'] !='') { ?>
                    <h3 class="text-left twitter-user">@<?php echo $smof_data['twitter']; ?></h3>
                    <?php } ?>
                </article>
                <nav class="span8 foot-social">
                    <?php  if($smof_data['dribbble'] !='') { ?><a href="http://dribbble.com/<?php echo sanitize_text_field($smof_data['dribbble']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/01.png"></a><?php } ?>
                    <?php  if($smof_data['facebook'] !='') { ?><a href="http://facebook.com/<?php echo sanitize_text_field($smof_data['facebook']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/02.png"></a><?php } ?>
                    <?php  if($smof_data['googleplus'] !='') { ?><a href="https://plus.google.com/<?php echo sanitize_text_field($smof_data['googleplus']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/03.png"></a><?php } ?>
                    <?php  if($smof_data['linkedin'] !='') { ?><a href="http://linkedin.com/<?php echo sanitize_text_field($smof_data['linkedin']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/04.png"></a><?php } ?>
                    <?php  if($smof_data['pintrest'] !='') { ?><a href="http://pintrest.com/<?php echo sanitize_text_field($smof_data['pintrest']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/05.png"></a><?php } ?>
                    <?php  if($smof_data['rss'] !='') { ?><a href="<?php echo $smof_data['rss'] ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/06.png"></a><?php } ?>
                    <?php  if($smof_data['twitter'] !='') { ?><a href="http://twitter.com/<?php echo sanitize_text_field($smof_data['twitter']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/07.png"></a><?php } ?>
                </nav>
            </div><!--/ row-->

        </section><!--/ container-->        
    </div><!--/ row-fluid-->
    </section>
</footer>

  <?php
  if(is_single() OR is_page() OR is_archive() OR is_search())
  {
  }
  else{
  ?> 
<div id="progress" data-0="width:0%;" data-end="width:100%;"></div>
</div>
<?php } ?>		
<?php

//localize mobile detect
  $style_uri = array( 'scriptpath' => get_stylesheet_directory_uri());
  wp_localize_script('mobile-detect', 'scripturl', $style_uri);

//Localize backstretch
if($smof_data['bg_slider'] != '')
{  
  wp_enqueue_script("backstretch-init", get_stylesheet_directory_uri(). "/javascripts/backstretch-init.js",array(),false,true); 
  $slides  = array();
  foreach($smof_data['bg_slider'] AS $bgsl)
  {
    array_push($slides, $bgsl['url']);
  }
  wp_localize_script('backstretch-init', 'slides', $slides);
}

//Localize twitter
if($smof_data['twitter'] != '')
{$twitter = $smof_data['twitter'];}else $twitter = 'designovastudio';
wp_localize_script('twitter-init', 'twithandle', $twitter);

if(is_single() OR is_page() OR is_archive()) 
{ 
  wp_enqueue_script( "issingle", get_stylesheet_directory_uri(). "/javascripts/issingle.js",array(),false,true);  
  $singpage = array( 'home_url' => home_url());
  wp_localize_script('issingle', 'singobj', $singpage);
}


?>
<?php wp_footer(); ?>	
</body>
</html>