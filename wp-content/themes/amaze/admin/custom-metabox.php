<?php
/*--Add a meta box for pages--*/
function amaze_define_page_metabox($post) 
{ 
  global $post,$amaze_meta;


  $meta_one_page         = get_post_meta($post->ID,'one_page',true);
  $meta_heading_highlight= get_post_meta($post->ID,'heading_highlight',true);
  $meta_heading_style    = get_post_meta($post->ID,'heading_style',true);

//Animation
  $meta_heading_animation = get_post_meta($post->ID,'heading_animation',true);
  $meta_hh_animation      = get_post_meta($post->ID,'hh_animation',true);

  $meta_parallax_bg      = get_post_meta($post->ID,'parallax_bg',true);
  $meta_bg_position      = get_post_meta($post->ID,'bg_position',true);
  $meta_bg_color         = get_post_meta($post->ID,'bg_color',true);

  $meta_bg_animatein_sp  = get_post_meta($post->ID,'bg_animatein_sp',true); /*Scroll Position*/
  $meta_bg_animateout_sp = get_post_meta($post->ID,'bg_animateout_sp',true); /*Scroll Position*/
  // Use nonce for verification
  wp_nonce_field(plugin_basename( __FILE__ ), 'amaze_page_noncename' );


if($meta_one_page =='yes')
  {
    $yes = 'checked="checked"';
    $no  = '';
  }
  elseif($meta_one_page =='no')
  {
    $no = 'checked="checked"';
    $yes = '';
  }
  else
  {
    $yes = 'checked="checked"';
    $no = '';
  }
//Switch case for heading style
  switch($meta_heading_style)
  {
    case 'dark':
      $dark = 'checked="checked"';
      $light = '';
    break;
    case 'light':
      $light = 'checked="checked"';
      $dark = '';
    break;
   default;
       $dark = '';
       $light = '';
    break;    
  }
//BG position
  switch($meta_bg_position)
  {
    case 'left':
     $bp_left = "selected";
      $bp_right = "";
      $bp_center = "";
      $bp_rx = "";
      $bp_ry = "";
      $bp_r = "";     
    break;
      
    case 'right':
      $bp_right = "selected";
      $bp_left = "";
      $bp_center = "";
      $bp_rx = "";
      $bp_ry = "";
      $bp_r = "";      
    break;

    case 'center':
      $bp_center = "selected";
      $bp_left = "";
      $bp_right = "";
      $bp_rx = "";
      $bp_ry = "";
      $bp_r = "";      
    break;
    
    case 'repeat-x':
     $bp_rx = "selected";
      $bp_left = "";
      $bp_right = "";
      $bp_center = "";
      $bp_ry = "";
      $bp_r = "";     
    break;

    case 'repeat-y':
      $bp_ry = "selected";
      $bp_left = "";
      $bp_right = "";
      $bp_center = "";
      $bp_rx = "";
      $bp_r = "";      
    break;

    case 'repeat':
     $bp_r = "selected";
      $bp_left = "";
      $bp_right = "";
      $bp_center = "";
      $bp_rx = "";
      $bp_ry = ""; 
    break;
    default;
      $bp_left = "";
      $bp_right = "";
      $bp_center = "";
      $bp_rx = "";
      $bp_ry = "";
      $bp_r = "";
    break;
  }
//Heading Animation
  switch($meta_heading_animation)
  {
    case 'fade':
      $ha_fade  = "selected";
      $ha_sl  ="";
      $ha_sr  ="";
      $ha_flip  ="";
      $ha_rl  ="";
      $ha_rr  ="";
      $ha_default  ="";      
    break;

    case 'slide-left':
      $ha_sl  = "selected";
      $ha_fade  = "";
      $ha_sl  ="";
      $ha_sr  ="";
      $ha_flip  ="";
      $ha_rl  ="";
      $ha_rr  ="";  
      $ha_default  ="";    
    break;

    case 'slide-right':
      $ha_sr  = "selected";
      $ha_fade  = "";
      $ha_sl  ="";
      $ha_flip  ="";
      $ha_rl  ="";
      $ha_rr  ="";
      $ha_default  ="";       
    break; 

    case 'flip':
      $ha_flip  = "selected"; 
      $ha_fade  = "";
      $ha_sl  ="";
      $ha_sr  ="";
      $ha_rl  ="";
      $ha_rr  =""; 
      $ha_default  ="";     
    break; 

    case 'rotate-left':
      $ha_rl  = "selected";
      $ha_fade  = "";
      $ha_sl  ="";
      $ha_sr  ="";
      $ha_flip  ="";
      $ha_rr  ="";
      $ha_default  ="";      
    break; 

    case 'rotate-right':
      $ha_rr  = "selected";
      $ha_fade  = "";
      $ha_sl  ="";
      $ha_sr  ="";
      $ha_flip  ="";
      $ha_rl  ="";  
      $ha_default  ="";
    break;  

    case 'default':
      $ha_default  = "selected";
      $ha_fade  = "";
      $ha_sl  ="";
      $ha_sr  ="";
      $ha_flip  ="";
      $ha_rl  ="";
      $ha_rr  ="";      
    break;    

    default:
      $ha_fade  = "";
      $ha_sl  ="";
      $ha_sr  ="";
      $ha_flip  ="";
      $ha_rl  ="";
      $ha_rr  ="";
      $ha_default  ="selected";
  }
//Heading highlight Animation
  switch($meta_hh_animation)
  {
    case 'fade':
      $hh_fade  = "selected";
      $hh_sl  ="";
      $hh_sr  ="";
      $hh_flip  ="";
      $hh_rl  ="";
      $hh_rr  =""; 
      $hh_default = "";             
    break;

    case 'slide-left':
      $hh_sl  = "selected";
      $hh_fade  = "";
      $hh_sr  ="";
      $hh_flip  ="";
      $hh_rl  ="";
      $hh_rr  =""; 
      $hh_default = "";             
    break;

    case 'slide-right':
      $hh_sr  = "selected"; 
      $hh_fade  = "";
      $hh_sl  ="";
      $hh_flip  ="";
      $hh_rl  ="";
      $hh_rr  ="";  
      $hh_default = "";            
    break; 

    case 'flip':
      $hh_flip  = "selected"; 
      $hh_fade  = "";
      $hh_sl  ="";
      $hh_sr  ="";
      $hh_rl  ="";
      $hh_rr  =""; 
      $hh_default = "";             
    break; 

    case 'rotate-left':
      $hh_rl  = "selected";
      $hh_fade  = "";
      $hh_sl  ="";
      $hh_sr  ="";
      $hh_flip  ="";
      $hh_rr  ="";   
      $hh_default = "";     
    break; 

    case 'rotate-right':
      $hh_rr  = "selected";
      $hh_fade  = "";
      $hh_sl  ="";
      $hh_sr  ="";
      $hh_flip  ="";
      $hh_rl  ="";  
      $hh_default = "";  
    break;  

    case 'default':
      $hh_default  = "selected";
      $hh_fade  = "";
      $hh_sl  ="";
      $hh_sr  ="";
      $hh_flip  ="";
      $hh_rl  ="";
      $hh_rr  ="";      
    break;    

    default:
      $hh_fade  = "";
      $hh_sl  ="";
      $hh_sr  ="";
      $hh_flip  ="";
      $hh_rl  ="";
      $hh_rr  ="";
      $hh_default  ="selected";
  }
//Include in One page
  $html = "<div class='title_boost' style=\"border-top: solid 0px #DFDFDF;\">";
  $html .= '<div class="title_boost">';  
  $html .= "<div class='labelclass'>Include to Onepage</div>";
  $html .= '<input type="radio" id="amaze_hht" name="include_onepage" value="yes" '.$yes.' /> Yes &nbsp;&nbsp;';
  $html .= '<input type="radio" id="amaze_hht" name="include_onepage" value="no"  '.$no.'/> No';  
  $html .= '<small>';
  $html .= "If checked 'No' page will be excluded from one page";
  $html .= '</small>'; 
  $html .= '</div>';
  $html .= '</div>';
//Heading Dark light
  $html .= "<div class='title_boost' style=\"border-top: solid 0px #DFDFDF;\">";
  $html .= '<div class="title_boost">';  
  $html .= "<div class='labelclass'>Heading Style</div>";
  $html .= '<input type="radio" id="amaze_hhs" name="heading-style" value="dark" '.$dark.' /> Dark &nbsp;&nbsp;';
  $html .= '<input type="radio" id="amaze_hhs" name="heading-style" value="light"  '.$light.'/> Light';  
  $html .= '<small>';
  $html .= "White and Black varients";
  $html .= '</small>'; 
  $html .= '</div>';
  $html .= '</div>';

//Heading Hightligh
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #DFDFDF;\">";
  $html .= '<div class="title_boost">';
  $html .= "<div class='labelclass'>Heading Promo Text</div>";
  $html .= '<div class="title_boost">';
  $html .= '<textarea  id="heading_highlight" name="heading_highlight" cols="50" rows="3" >'.$meta_heading_highlight.'</textarea>'; 
  $html .= '<small>';
  $html .= "Heading promo Text appears on the right side of heading";
  $html .= '</small>';
  $html .= '</div>';
  $html .= '</div>';

//heading animation

  $html .= '<div class="title_boost">';
  $html .= "<div class='labelclass'>Heading Animation </div>";
  $html .= '<select name="heading_animation">';
  $html .= '<option value="default" '.$ha_default.'>Default</option>'; 
  $html .= '<option value="fade" '.$ha_fade.'>Fade</option>'; 
  $html .= '<option value="slide-left" '.$ha_sl.'>Slide-left</option>';
  $html .= '<option value="slide-right" '.$ha_sr.'>Slide-right</option>';
  $html .= '<option value="flip" '.$ha_flip.'>Flip</option>';
  $html .= '<option value="rotate-left" '.$ha_rl.'>Rotate-left</option>';
  $html .= '<option value="rotate-right" '.$ha_rr.'>Rotate-right</option>';
  $html .= '</select><br/>';
  $html .= '</div>'; 


  $html .= '<div class="title_boost">';
  $html .= "<div class='labelclass'>Heading Highlight Animation </div>";
  $html .= '<select name="hh_animation">';
  $html .= '<option value="default" '.$hh_default.'>Default</option>'; 
  $html .= '<option value="fade" '.$hh_fade.'>Fade</option>'; 
  $html .= '<option value="slide-left" '.$hh_sl.'>Slide-left</option>';
  $html .= '<option value="slide-right" '.$hh_sr.'>Slide-right</option>';
  $html .= '<option value="flip" '.$hh_flip.'>Flip</option>';
  $html .= '<option value="rotate-left" '.$hh_rl.'>Rotate-left</option>';
  $html .= '<option value="rotate-right" '.$hh_rr.'>Rotate-right</option>';
  $html .= '</select><br/>';
  $html .= '</div>'; 


//Parallax Background
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #DFDFDF;\">";

  $html .= '<div class="title_boost">';
  $html .= "<div class='labelclass'>Page/Section Background</div>";
  $html .= "<input readonly='readonly' value='$meta_parallax_bg' name='amaze_parallax_image'  class='kp_input_box' type='hidden'>";
  $html .= "<input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload' value='Add' type='button'>";
  $html .= "<input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove' value='Remove' type='button'>";
  $html .= "<img class='image_preview' src='$meta_parallax_bg' title='Image URL' alt=''>";
  $html .= '</div>'; 
//BG color
  $html .= '<div class="title_boost">';
  $html .= "<div class='labelclass'>Background Color</div>";
  $html .= '<input type="text" id="amaze_pagebg_color" name="bg-color" value="'.$meta_bg_color.'" />';
  $html .= '<small>';
  $html .= "Leave Blank for trasparent background";
  $html .= '</small>';
  $html .= '</div>'; 

//Position Properties
  $html .= '<div class="title_boost">';
  $html .= "<div class='labelclass'>Background Image Position </div>";
  $html .= '<select name="bg_position">';
  $html .= '<option value="left" '.$bp_left.'>Left</option>'; 
  $html .= '<option value="right" '.$bp_right.'>Right</option>';
  $html .= '<option value="center" '.$bp_center.'>Center</option>';
  $html .= '<option value="repeat-x" '.$bp_rx.'>Repeat-x</option>';
  $html .= '<option value="repeat-y" '.$bp_ry.'>Repeat-y</option>';
  $html .= '<option value="repeat" '.$bp_r.'>Repeat</option>';
  $html .= '</select><br/>';
  $html .= '</div>'; 


  $html .= "</div>";
//Animation Scroll POsition Trigger

  $html .= "<div class='title_boost' style=\"border-top: solid 1px #DFDFDF;\">";

  $html .= "<div class='labelclass'>Start Animation</div>";
  $html .= '<div class="title_boost">';
  $html .= '<input type="text"  id="animation-trigger-start" name="animation-trigger-start" value="'.$meta_bg_animatein_sp.'"/>'; 
  $html .= '<small>';
  $html .= "Start 'animate-in' when scroll postion reaches your chosen value. Applicable only for heading text in common pages";
  $html .= '</small>';
  $html .= "</div>";

  $html .= "<div class='labelclass'>End Animation</div>";
  $html .= '<div class="title_boost">';
  $html .= '<input type="text"  id="animation-trigger-end" name="animation-trigger-end" value="'.$meta_bg_animateout_sp.'"/>'; 
  $html .= '<small>';
  $html .= "Start animate-out when scroll postion reaches your chosen value. Applicable only for heading text in common pages";
  $html .= '</small>';
  $html .= "</div>";

  $html .= '</div>';

  echo $html;


}
//Invoke the box
function amaze_create_page_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
    add_meta_box( 'page', 'Page Options', 'amaze_define_page_metabox', 'page', 'normal', 'high' );
  }
}
/*-for saving the meta--*/
function amaze_save_metaboxdata($post_id)
{
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset($_POST['amaze_page_noncename'])):  
    if (!wp_verify_nonce( $_POST['amaze_page_noncename'], plugin_basename( __FILE__ ) ) )
      return;
  endif;  
  // Check permissions
  if(isset($_POST['post_type'])): 
  if ( 'page' == $_POST['post_type'] ) {
      if ( !current_user_can( 'edit_page', $post_id ) )
      return;
    } else {
      if ( !current_user_can( 'edit_post', $post_id ) )
      return;
    }
  endif; 
 if(isset($_POST['amaze_page_noncename'])):  

   //sanitization
    $hh_html_strip  = wp_kses($_POST['heading_highlight'], array('span' => array(),   'strong' => array()) );
    $hh_balance_tag = balanceTags($hh_html_strip,true);

    $get_ats = $_POST['animation-trigger-start'];
    $get_ate = $_POST['animation-trigger-end'];
    if(is_numeric($get_ats)){ $ats  = $get_ats; }else { $ats = 0; }
    if(is_numeric($get_ate)) { $ate = $get_ate; }else { $ate = 0; }

    $onepage        = $_POST['include_onepage'];
    $hh             = $hh_balance_tag;
    $heading_anim   = $_POST['heading_animation'];
    $hh_anim        = $_POST['hh_animation'];
    $hstyle         = $_POST['heading-style'];
    $bg_image       = $_POST['amaze_parallax_image'];
    $bg_color       = $_POST['bg-color'];
    $bg_position    = $_POST['bg_position'];

    $animate_start  = $ats;
    $animate_end    = $ate;

    update_post_meta($post_id,'one_page',$onepage);
    update_post_meta($post_id,'heading_highlight',$hh);
    update_post_meta($post_id,'heading_style',$hstyle);
    update_post_meta($post_id,'heading_animation',$heading_anim);
    update_post_meta($post_id,'hh_animation',$hh_anim);
    update_post_meta($post_id,'parallax_bg',$bg_image);
    update_post_meta($post_id,'bg_position',$bg_position);
    update_post_meta($post_id,'bg_color',$bg_color);

    update_post_meta($post_id,'bg_animatein_sp',$animate_start);
    update_post_meta($post_id,'bg_animateout_sp',$animate_end);
  

  endif;
  
}

//Initialize
add_action('admin_menu', 'amaze_create_page_metabox'); /*--Plug the metabox*/
add_action( 'save_post', 'amaze_save_metaboxdata' ); /*--save metabox content*/



/*---------------------------------------------
-------------Portfolio Metaboxes---------------
----------------------------------------------*/
function amaze_define_portfolio_metabox($post) 
{ 
  global $post,$amaze_meta;

  //Existing Meta value
  $meta_expansion_image   = get_post_meta( $post->ID,'expansion_image',true);
  $meta_f_image_style     = get_post_meta( $post->ID,'f_image_style',true);
  //$meta_video_url       = get_post_meta( $post->ID,'video_url',true);

if($meta_f_image_style =='height-02')
  {
    $yes = 'checked="checked"';
    $no  = '';
  }
  elseif($meta_f_image_style =='height-01')
  {
    $no = 'checked="checked"';
    $yes = '';
  }
  else
  {
    $yes = 'checked="checked"';
    $no = '';
  }

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'amaze_portfolio_noncename' );

  
//Expansion Image
  $html = "<div class='title_boost'>";
  $html .= "<div class='labelclass'>Zoom image</div>";
  $html .= "<input readonly='readonly' value='$meta_expansion_image' name='amaze_expansion_image'  class='kp_input_box' type='hidden'>";
  $html .= "<input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload' value='Add' type='button'>";
  $html .= "<input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove' value='Remove' type='button'>";
  $html .= "<img class='image_preview' src='$meta_expansion_image' title='Image URL' alt=''>";
  $html .= '<small>';
  $html .= "Image to appear while clicking the zoom link, if left blank featured image will appear as default";
  $html .= '</small>'; 
  $html .= "</div>";
//Heading Dark light
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #DFDFDF;\">";
  $html .= '<div class="title_boost">';  
  $html .= "<div class='labelclass'>Featured Image Style</div>";
  $html .= '<input type="radio" id="f_image_style" name="f_image_style" value="height-02" '.$yes.' /> Rectangular &nbsp;&nbsp;';
  $html .= '<input type="radio" id="f_image_style" name="f_image_style" value="height-01"  '.$no.'/> Square';  
  $html .= '<small>';
  $html .= "(For masonary style portfolio)";
  $html .= '</small>'; 
  $html .= '</div>';
  $html .= '</div>';


  echo $html;

}
//nvoke the box
function amaze_create_portfolio_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
    add_meta_box( 'expansion_images', 'Portfolio Additions', 'amaze_define_portfolio_metabox', 'portfolio_item', 'normal', 'high' );
  }
}
//for saving the meta
function amaze_save_portfolio_metabox($post_id)
{
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset( $_POST['amaze_portfolio_noncename'])) 
  {
      if (!wp_verify_nonce( $_POST['amaze_portfolio_noncename'], plugin_basename( __FILE__ ) ) )
        return;
  }
  // Check permissions
  if(isset($_POST['post_type']) AND isset($_POST['amaze_expansion_image']))
  if(isset($_POST['post_type']))
   {

      if ( 'portfolio_item' == $_POST['post_type'] ) 
      {
        if ( !current_user_can( 'edit_page', $post_id ) ) return;
      }
      else
      {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
      }

      $up_expansion_img = $_POST['amaze_expansion_image'];
      $f_image_style   = $_POST['f_image_style'];
      //$up_video_url     = $_POST['amaze_video_url'];

      update_post_meta($post_id, 'expansion_image', $up_expansion_img);
      update_post_meta($post_id, 'f_image_style', $f_image_style); 
      //update_post_meta($post_id, 'video_url', $up_video_url);  
   }

}
//Initialize
add_action('admin_menu', 'amaze_create_portfolio_metabox'); 
add_action( 'save_post', 'amaze_save_portfolio_metabox' );




?>