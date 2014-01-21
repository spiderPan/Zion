<?php 

/*-------------------------------------
 Portfolio 
--------------------------------------*/

function portfolio($atts, $content = null)
{
  global $post;

  $categories = get_categories(array('type' => 'portfolio_item', 'taxonomy' => 'portfolio_category'));


  $html = '<div class="row">
            <article class="span12">
             <section id="options" class="clearfix">
                  <ul id="filters" class="option-set clearfix" data-option-key="filter">

                    <li class="inner-link"><a href="#filter" data-option-value="*" class="selected">all</a></li>';
                                   
                      foreach($categories as $category): 
                                $categoryClass = strtolower($category->slug);
                                $html .= '<li class="inner-link"><a href="#filter" data-option-value=".'.$categoryClass.'">'.$category->name.'</a></li>';      
                      endforeach;
                          
                  $html .= '</ul>
              </section>
            </article>
        </div>

        <div class="row">
                <article class="span12">
                    <div id="container" class="clearfix portfolio">';

       $loop = new WP_Query( array( 'post_type' => 'portfolio_item', 'orderby' => 'date', 'order' => 'ASC','posts_per_page' => 50,'paged'=>false ) ); 
       while ( $loop->have_posts() ) : $loop->the_post(); 
       $cate = wp_get_post_terms($post->ID, $taxonomy = 'portfolio_category'); 

if($cate)
{
       $html .= '<div class="element '.strtolower($cate[0]->slug).' '.get_post_meta($post->ID,'f_image_style',true).' folio-item" data-category="'.strtolower($cate[0]->slug).'">';
            
            if(has_post_thumbnail()): 
               $thumbnail_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '', true, '');
               $html .= '<img src="'.$thumbnail_img[0].'"  alt="'.get_the_title().'"/>';
            else: 
               $html .= '<img src="'.get_stylesheet_directory_uri().'/images/default-featured-image.png"  alt="'.get_the_title().'"/>';
            endif;

            $html .= '<a href="';

            $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', true, '' );
            
            $alternative = get_post_meta($post->ID,'expansion_image',true);
             
              if(!$alternative):
                 $html .= $src[0];
              else:
                $html .= $alternative;
              endif;

            $html .='" class="zoom-info" title="'.get_the_title().'">
            <h3 class="icon-zoom-sosa folio-trigger-icon">\</h3>
            </a>';

            $html .= '<a href="'.get_permalink().'" target="_blank"  title="'.get_the_title().'">
            <h3 class="icon-link-sosa folio-trigger-icon">ä</h3>
            </a>';

            $html .= '<h5 class="folio-subtitle titles">'.get_the_title().'</h5>';
            
        $html .= '</div>';

}

      endwhile;  


  $html .= '</div>
              </article>
            </div>';

  return $html;

}


/*-------------------------------------
 Row 
--------------------------------------*/
function row($atts, $content = null)
{
  extract(shortcode_atts(array( "additional_class" => ''), $atts));
  //Return content  
   $html = "\n".'<div class="row '.$additional_class.'">'.do_shortcode($content).'</div>'."\n";
   return $html;
}
/*-------------------------------------
 Column 
--------------------------------------*/
function columns($atts, $content = null)
{
  extract(shortcode_atts(array("span" => "4","start_animation" => "","end_animation" => "","animate_in" => "","animate_out" => "","additional_class"=>"","animation_preset" => ""), $atts));
  //Return content  

  switch($animation_preset)
  {
    case 'fade':
      $animate_in_p  = "opacity:0;";
      $animate_out_p = "opacity:1;";
    break;

    case 'slide-left':
      $animate_in_p  = "margin-left: -1400px;";
      $animate_out_p = "margin-left: 10px;";    
    break;

    case 'slide-right':
      $animate_in_p  = "margin-left: 1400px;";
      $animate_out_p = "margin-left: 10px;";    
    break; 

    case 'flip':
      $animate_in_p = "opacity:0;-webkit-transform: rotateX(180deg);-moz-transform: rotateX(180deg);" ;  
      $animate_out_p  = "opacity:1; -webkit-transform: rotateX(0deg); -moz-transform: rotateX(0deg);";  
    break; 

    case 'rotate-left':
      $animate_in_p  = "margin-left: 2000px; transform:rotate(0deg);";
      $animate_out_p = "margin-left: 0px; transform:rotate(360deg);";    
    break; 

    case 'rotate-right':
      $animate_in_p  = "margin-right: 2000px; transform:rotate(0deg);";
      $animate_out_p = "margin-right: 0px; transform:rotate(360deg);";     
    break;    

    default:
      $animate_in_p  = $animate_in;
      $animate_out_p = $animate_out;       
  }


  $html = '<article class="span'.$span.' '.$additional_class.'" data-'.$start_animation.'="'.$animate_in_p.'"  data-'.$end_animation.'="'.$animate_out_p.'">'.do_shortcode($content).'</article>';
  return $html;
}

/*-------------------------------------
 Skillset
--------------------------------------*/
function skillset($atts, $content = null)
{
  //extract(shortcode_atts(array("start_animation" => "","end_animation" => ""), $atts));
   $html = "\n".'<article class="skillset" >'.do_shortcode($content).'</article>'."\n";
   return $html;
}

function skill($atts, $content = null)
{
  extract(shortcode_atts(array("start_animation" => "","end_animation" => "", "size" =>"", "color" =>""), $atts));

   $html = "\n".'<div class="progress">
        <div class="bar progress01" data-'.$start_animation.'="width:0%" data-'.$end_animation.'="width:'.$size.'%"><h5>'.do_shortcode($content).'</h5></div>
    </div>'."\n";
   return $html;
}

/*-------------------------------------
 Team Memeber
--------------------------------------*/
function team_member($atts, $content = null)
{
   extract(shortcode_atts(array("start_animation" => "","end_animation" => "","bg" => "","animate_in" => "","animate_out" => "","animation_preset" =>""), $atts));
 
  switch($animation_preset)
  {
    case 'fade':
      $animate_in_p  = "opacity:0;";
      $animate_out_p = "opacity:1;";
    break;

    case 'slide-left':
      $animate_in_p  = "margin-left: -1400px;";
      $animate_out_p = "margin-left: 10px;";    
    break;

    case 'slide-right':
      $animate_in_p  = "margin-left: 1400px;";
      $animate_out_p = "margin-left: 10px;";    
    break; 

    case 'flip':
      $animate_in_p = "opacity:0;-webkit-transform: rotateX(180deg);-moz-transform: rotateX(180deg);" ;  
      $animate_out_p  = "opacity:1; -webkit-transform: rotateX(0deg); -moz-transform: rotateX(0deg);";  
    break; 

    case 'rotate-left':
      $animate_in_p  = "margin-left: 2000px; transform:rotate(0deg);";
      $animate_out_p = "margin-left: 0px; transform:rotate(360deg);";    
    break; 

    case 'rotate-right':
      $animate_in_p  = "margin-right: 2000px; transform:rotate(0deg);";
      $animate_out_p = "margin-right: 0px; transform:rotate(360deg);";     
    break;    

    default:
      $animate_in_p  = $animate_in;
      $animate_out_p = $animate_out;       
  }

   $html = "\n".'<article class="span6 about-feat about-feat-01" data-'.$start_animation.'="'.$animate_in_p.'" data-'.$end_animation.'="'.$animate_out_p.'">'.do_shortcode($content).'</article>';
   return $html;
}
//Member name
function member_name($atts, $content = null)
{
  extract(shortcode_atts(array("designation" => ""), $atts));
  $html = "\n".'<h2>'.do_shortcode($content).'<span>'.$designation.'</span></h2>';
  return $html;
}
//Member image
function member_image($atts, $content = null)
{
  extract(shortcode_atts(array("image" => ""), $atts));
  $html = "\n".'<img title="Team" alt="Team" class="team-thumb pull-left add-right-half" src="'.$image.'"/>';
  return $html;
}
//Member Desc
function member_description($atts, $content = null)
{
  //extract(shortcode_atts(array("designation" => ""), $atts));
  $html = "\n".'<p class="text-left">'.do_shortcode($content).'<p>';
  return $html;
}
//Member social
function member_social($atts, $content = null)
{
  
/*--Customization guide--
If you want to add your own social media links apart from these, add the name as variable 
like this "YOURMEDIA" => "" and replicate the the anchor links provided here and rename it
your needs. 

*/
  extract(shortcode_atts(array("twitter" => "","linkedin" => "","facebook" => ""), $atts));
  $html = "\n".'<nav>
                        <a href="http://twitter.com/'.$twitter.'"><img title="Twitter" alt="amaze" src="'.get_stylesheet_directory_uri().'/images/social/07.png"></a>
                        <a href="http://facebook.com/'.$facebook.'"><img title="Facebook" alt="amaze" src="'.get_stylesheet_directory_uri().'/images/social/02.png"></a>
                        <a href="http://linkedin.com/'.$linkedin.'"><img title="LinkedIn" alt="amaze" src="'.get_stylesheet_directory_uri().'/images/social/04.png"></a>
                </nav>';
  return $html;
}

/*-------------------------------------
 Testimonial - Prebuilt effect
--------------------------------------*/
function testimonial($atts, $content = null)
{
  extract(shortcode_atts(array("start_animation" => "","end_animation" => "", "client_name" => "", "company" => ""), $atts));
 //To customise the effect  change the css inside the data-'.$start_animation.'="YOUR CSS3"

  $html = "\n".'<article class="span4" data-'.$start_animation.'="margin-left: 1600px; transform:scale(2);" data-'.$end_animation.'="margin-left: 0px;transform:scale(1);">
                    <p class="text-left service-testimonial">'.do_shortcode($content).'</p>
                    <h3 class="testimonial-client">'.$client_name.'</h3>
                    <h5 class="testimonial-firm">'.$company.'</h5>
                </article>';
  return $html;
}

/*-------------------------------------
 FlipBoxes - Has got prebuilt flip effect
--------------------------------------*/
function flipbox($atts, $content = null)
{
  extract(shortcode_atts(array("start_animation" => "","end_animation" => "","type" => "","title" => ''), $atts));
  $html = "\n".' <article class="span4 service-item service-'.$type.'" data-'.$start_animation.'="opacity:0;-webkit-transform: rotateX(180deg);-moz-transform: rotateX(180deg);" data-'.$end_animation.'="opacity:1;  -webkit-transform: rotateX(0deg);
            -moz-transform: rotateX(0deg);">
                    <h2>'.$title.'</h2>
                    <p class="text-left">'.do_shortcode($content).'</p>
                </article>';
  return $html;                
}

/*-------------------------------------
 Carousel
--------------------------------------*/
function carousel($atts, $content = null)
{
  extract(shortcode_atts(array("unique_id" => "", "slides_count"=>"0", "pagination" => "true", "pagination_position" => "right", "nextprev" => ""), $atts));

  if($pagination_position == 'left' OR $pagination_position =="Left") { $pp = 'point-left';} else {$pp = '';}
  if($nextprev != '') { $nextprevButton = '<a class="carousel-control left" href="#ShowCarousel-'.$unique_id.'" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#ShowCarousel-'.$unique_id.'" data-slide="next">&rsaquo;</a>';} else {$nextprevButton = '';}

  $html = "\n".'<div id="ShowCarousel-'.$unique_id.'" class="carousel slide '.$pp.'">';
  
  //Pagination
  if($pagination == 'true' OR $pagination_position =="True")
  {
    $html .= '<ol class="carousel-indicators">';
    for($i=0; $i<$slides_count;$i++)
    {
      if($i==0){ $makeactive ='class="active"';}else $makeactive ='';
      
      $html .= '<li data-target="#ShowCarousel-'.$unique_id.'" data-slide-to="'.$i.'" '.$makeactive.'></li>';
    }
    $html .= '</ol>';
  }

  //Displaying the carousel
  $html .= '<div class="carousel-inner">'.do_shortcode($content).'</div>'. $nextprevButton.'</div>';
  return $html;

}
//slide item
function carousel_image($atts, $content = null)
{
  extract(shortcode_atts(array("active" => "no"), $atts));
  if($active == 'Yes'OR $active =="yes") { $state = 'active';} else {$state = '';}

  $html =  '<div class="item '.$state.'">
         '.do_shortcode($content).'
    </div>';
 return $html;
    
}
            
/*-------------------------------------
 Show Spec
--------------------------------------*/
function project_specs($atts, $content = null)
{
  //extract(shortcode_atts(array("active" => "no"), $atts));
  $html = "\n".'<div class="show-specs">'.do_shortcode($content).'</div>';
  return $html;
}

function spec($atts, $content = null)
{
  extract(shortcode_atts(array("title" => ""), $atts));
  $html = "\n".' <h6>'.$title.': <span>'.do_shortcode($content).'</span></h6>';
  return $html;
}  
/*-------------------------------------
 Amaze Button
--------------------------------------*/
function amaze_link_btn($atts, $content = null)
{
  extract(shortcode_atts(array("link" => ""), $atts));
  $html = "\n".' <a class="btn btn-amaze show-btn" href="'.$link.'">'.do_shortcode($content).'</a>';
  return $html;
} 
   
/*-------------------------------------
 Twitter feed
--------------------------------------*/
function twitterfeed($atts, $content = null)
{
  //Twitter handle can set at Theme Options panel
  //extract(shortcode_atts(array("link" => ""), $atts));
  $html = "\n".'<article id="ticker" class="query"></article>';
  return $html;
} 
                       

/*-------------------------------------
Contact Form
--------------------------------------*/
function contactform($atts,$content = null)
{
  //extract(shortcode_atts(array("heading" => ''), $atts));
  global $smof_data;
  $html =  '<div class="row">
                    <article class="span12 text-center">
                        <div id="fname"  class="alert alert-error error add-top">
                        '.esc_html($smof_data['label_name']).' must not be empty
                        </div>
                        <div id="fmail" class="alert alert-error  error add-top">
                        Please provide a valid '.esc_html($smof_data['label_email']).'
                        </div>
                        <div id="fmsg" class="alert alert-error  error add-top">
                        '.esc_html($smof_data['label_message']).' should not be empty
                        </div>
                        <div class="alert-success success">
                            '.esc_html($smof_data['msg_success']).'
                        </div>
                        <div class="alert-failure failure">
                            '.esc_html($smof_data['msg_fail']).'
                        </div>

                    </article>
                </div>

            <div class="row">
              <form name="myform" id="contactForm" action="'.get_stylesheet_directory_uri().'/sendmail.php" enctype="multipart/form-data" method="post">  
                    <article class="span6">
                        <textarea  id="msg" rows="3" cols="40" name="message" placeholder="'.esc_html($smof_data['label_message']).'"></textarea>
                    </article>

                    <article class="span6">
                        <input size="100" type="text" name="name" id="name" placeholder="'.esc_html($smof_data['label_name']).'">
                        <input type="text"  size="30" id="email" name="email" placeholder="'.esc_html($smof_data['label_email']).'">

                        <input type="hidden" value="'.esc_html($smof_data['contact_email']).'" name="receiver"/>
                        <input type="hidden" id="subject" name="subject" value="'.esc_html($smof_data['contact_subject']).'"/>

                        <button type="submit" name="submit" id="submit" class="btn btn-amaze add-top-half">Send Message</button>
                    </article>
                        
                    </form>
            </div>';

  return $html;

}

/*--------------------------------
 Register the codes
---------------------------------*/
function register_shortcodes()
{
  // add_shortcode('promotext', 'promotext');
  // add_shortcode('container', 'container');
  // add_shortcode('heading', 'heading');
  add_shortcode('row', 'row'); 
  add_shortcode('columns', 'columns');
  //Skillset
  add_shortcode('skillset', 'skillset');
  add_shortcode('skill', 'skill');
  //Team Shortcodes
  add_shortcode('team_member','team_member');
  add_shortcode('member_name','member_name');
  add_shortcode('member_image','member_image');
  add_shortcode('member_description','member_description');
  add_shortcode('member_social','member_social');
  //Testimonial
  add_shortcode('testimonial','testimonial');
  add_shortcode('flipbox','flipbox');
  //Carousel
  add_shortcode('carousel','carousel');
  add_shortcode('carousel_image','carousel_image');
  //Project Specs
  add_shortcode('project_specs','project_specs');
  add_shortcode('spec','spec');
  //Buttons
  add_shortcode('amaze_link_btn','amaze_link_btn');
  //Twitter Feed
  add_shortcode('twitterfeed','twitterfeed');  

  add_shortcode('portfolio', 'portfolio');
  add_shortcode('contactform', 'contactform');
 
}
/*Add to wordpress action*/
add_action('init','register_shortcodes');



function register_button( $buttons ) {
   array_push($buttons, "|","row");
   array_push($buttons, "|","columns");
   array_push($buttons, "|","skillset");
   array_push($buttons, "|","team");
   array_push($buttons, "|","testimonial");
   array_push($buttons, "|","flipbox");
   array_push($buttons, "|","carousel");      
   array_push($buttons, "|","project_spec");
   array_push($buttons, "|","amazebutton");
   array_push($buttons, "|","twitterfeed");
   array_push($buttons, "|","portfolio");
   array_push($buttons, "|","contact");
    return $buttons;
 }

 function add_plugin( $plugin_array ) {
    $plugin_array['shortcodes'] = get_template_directory_uri() . '/javascripts/sc/shortcodes.js';
   return $plugin_array;
}
function shortcodes_buttons() {
   
     if (!current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
        return;
     }
   
     if (get_user_option('rich_editing') == 'true' ) {
        add_filter( 'mce_external_plugins', 'add_plugin' );
        add_filter( 'mce_buttons', 'register_button' );
     }
   }
 add_action('init', 'shortcodes_buttons'); 

?>