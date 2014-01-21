<?php get_header();
  global $smof_data;

 ?>


<?php	

$count = 0; 
$countPages = wp_count_posts('page')->publish;
$pages = get_pages( 'sort_order=asc&sort_column=menu_order&depth=1');
//Count published pages
foreach($pages as $pag):

 setup_postdata($pag);

  

//Anchor point and title
$newanchorpoint = strtolower(preg_replace('/\s+/', '-', $pag->post_title)); 
$new_title      = $newanchorpoint;
$templ_name     = get_post_meta( $pag->ID, '_wp_page_template', true );
$filename       = preg_replace('"\.php$"', '', $templ_name); 



//Check wether to include in one page
$include_onepage =  get_post_meta($pag->ID,'one_page',true);
//Menu Trigger waypoint
if($include_onepage == 'yes') { $count++; }
if($count == '2' && $smof_data['switch_sticky'] == '0') 
{ 
  wp_enqueue_script( "menutrigger", get_stylesheet_directory_uri(). "/javascripts/menutrigger-init.js",array(),false,true);  
  wp_localize_script('menutrigger', 'pageid', $new_title);
}
//Background
$parallax          =  get_post_meta( $pag->ID,'parallax_bg',true); 
$bg_color          =  get_post_meta( $pag->ID,'bg_color',true); 
$bg_position       =  get_post_meta( $pag->ID,'bg_position',true); 
$heading_highlight =  get_post_meta( $pag->ID,'heading_highlight',true); 
$heading_style     =  get_post_meta( $pag->ID,'heading_style',true); 
//Animation
$heading_animation = get_post_meta($pag->ID,'heading_animation',true);
$hh_animation      = get_post_meta($pag->ID,'hh_animation',true);

//Scroll Positions
$sa = get_post_meta( $pag->ID,'bg_animatein_sp',true);
$ea = get_post_meta( $pag->ID,'bg_animateout_sp',true);

//Setting to zero as default
if($sa == ''){ $start_animation = '0';} else $start_animation = $sa;
if($ea == ''){ $end_animation = '0';} else $end_animation = $ea;

//BG positions
  switch($bg_position)
  {
    case 'left':
     $bp = "left top no-repeat";
    break;
      
    case 'right':
      $bp = "right top no-repeat";
    break;

    case 'center':
      $bp = "center top no-repeat";
    break;
    
    case 'repeat-x':
     $bp = "repeat-x";
    break;

    case 'repeat-y':
      $bp = "repeat-y";
    break;

    case 'repeat':
     $bp = "repeat";
    break;
    default;
      $bp = "right top no-repeat";
    break;
  }


if($heading_style == 'dark')
{
    $hstyle = '';
}
else $hstyle = "-inv";

//Heading Animation effect
switch($heading_animation)
  {
    case 'fade':
      $hain  = "opacity:0;";
      $haout = "opacity:1;";
    break;

    case 'slide-left':
      $hain  = "margin-left: -1400px;";
      $haout = "margin-left: 10px;";    
    break;

    case 'slide-right':
      $hain  = "margin-left: 1400px;";
      $haout = "margin-left: 10px;";    
    break; 

    case 'flip':
      $hain = "-webkit-transform: rotateX(180deg);-moz-transform: rotateX(180deg);opacity:0;" ;  
      $haout  = "-webkit-transform: rotateX(0deg); -moz-transform: rotateX(0deg);opacity:1; ";  
    break; 

    case 'rotate-left':
      $hain  = "margin-left: 2000px; transform:rotate(0deg);";
      $haout = "margin-left: 0px; transform:rotate(360deg);";    
    break; 

    case 'rotate-right':
      $hain  = "margin-right: 2000px; transform:rotate(0deg);";
      $haout = "margin-right: 0px; transform:rotate(360deg);";     
    break;    

    case 'default':
      $hain  = "margin-left: -300px;";
      $haout = "margin-left: 0px;";     
    break;    
    default:
      $hhin  = "margin-left: -300px;";
      $hhout = "margin-left: 0px;";     
    break;     
  }
//Heading highlight Animation effect
switch($hh_animation)
  {
    case 'fade':
      $hhin  = "opacity:0;";
      $hhout = "opacity:1;";
    break;

    case 'slide-left':
      $hhin  = "margin-left: -1400px;";
      $hhout = "margin-left: 10px;";    
    break;

    case 'slide-right':
      $hhin  = "margin-left: 1400px;";
      $hhout = "margin-left: 10px;";    
    break; 

    case 'flip':
      $hhin = "opacity:0;-webkit-transform: rotateX(180deg);-moz-transform: rotateX(180deg);" ;  
      $hhout  = "opacity:1; -webkit-transform: rotateX(0deg); -moz-transform: rotateX(0deg);";  
    break; 

    case 'rotate-left':
      $hhin  = "margin-left: 2000px; transform:rotate(0deg);";
      $hhout = "margin-left: 0px; transform:rotate(360deg);";    
    break; 

    case 'rotate-right':
      $hhin  = "margin-right: 2000px; transform:rotate(0deg);";
      $hhout = "margin-right: 0px; transform:rotate(360deg);";     
    break;    

    case 'default':
      $hhin  = "margin-left: -300px;";
      $hhout = "margin-left: 0px;";     
    break;   
    default:
      $hhin  = "margin-left: -300px;";
      $hhout = "margin-left: 0px;";     
    break;       
  }
$page_heading      =  $pag->post_title;

if($filename == 'home-splash' && $include_onepage == 'yes' )
   {

?>
<header id="<?php echo $new_title; ?>" class="band spalsh-page" style="background: url('<?php echo $parallax; ?>') <?php echo $bp; ?>;" data-0="background-position:250px 0px;" data-250="background-position:250px 350px;"  data-550="background-position:-300px 450px;">
    <section class="container-fluid">
    <div class="row-fluid">
        <section class="container">

             <?php the_content();?>

        </section><!--/ container-->        
    </div><!--/ row-fluid-->    
    </section>
</header><!--/ band-->

<?php
//Home Splash Ends here
   }

//Blog page
elseif($filename == 'blog-page' AND $include_onepage == 'yes')
{

//Start blog page
?>
<section id="<?php echo $new_title; ?>" class="band page top-space" style="background: url('<?php echo $parallax; ?>') <?php echo $bp; ?> <?php echo $bg_color; ?>; ">
    <section class="container-fluid">
    <div class="row-fluid">
        <section class="container">

            <div class="welcome row">
                <article class="span4" data-<?php echo $start_animation; ?>="<?php echo $hain; ?>" data-<?php echo $end_animation; ?>="<?php echo $haout; ?>">
                    <h1 class="text-left promo-caps<?php echo $hstyle;?>"><?php echo $page_heading; ?></h1>
                </article>
                <article class="span8" data-<?php echo $start_animation; ?>="<?php echo $hhin; ?>" data-<?php echo $end_animation; ?>="<?php echo $hhout; ?>">
                    <p class="text-right promo-text<?php echo $hstyle;?>"><?php echo $heading_highlight; ?></p>
                </article>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
            </div><!--/ row-->
            <?php the_content();?>
<?php
  $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 2, 'paged' => $paged ));
?> 
            

      <div id="ajax-container">
        <div id="ajax-inner">  

            <div class="row add-top add-bottom-half">


 <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <article class="span6 blog-block">
                                <section class="add-bottom">
                                    <h2 class="blog-caps"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                     <?php if(has_post_thumbnail()): the_post_thumbnail( 'full', array( 'class' => "thumbnail", ) ); endif; ?>
                                    <div class="blog-stats">
                                        <h5 class="blog-date"><?php the_time('F jS') ?></h5>
                                        <h5 class="blog-author"><?php the_author(); ?></h5>
                                        <h5 class="blog-category"><?php 
                                              $post_categories = get_the_category();
                                              $c    = array_shift($post_categories);
                                              $cats = $c->cat_name;
                                              if (count($post_categories) > 0 ) 
                                              {
                                                foreach( $post_categories as $c ) 
                                                {
                                                  $cats .=  ', ' . $c->cat_name;
                                                }
                                              }
                                              printf( __( $cats ));
                                           ?></h5>
                                        <h5 class="blog-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></h5>
                                    </div>
                                    <p class="blog-para"><?php the_excerpt();?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-amaze"><?php _e( 'Read Full Story','amazelang' ); ?></a>
    
                                </section>
                            </article><!-- left-side : ends-->
    <?php endwhile; ?>



</div>
<div class="row">
      <div class="paginate">
           <?php previous_posts_link( 'Newer Posts&rarr;' );  ?>
           <?php next_posts_link( '&larr; Older Posts', $loop->max_num_pages ); ?>
      </div>
</div>

     </div>
   </div>



        </section><!--/ container-->        
    </div><!--/ row-fluid-->    
    </section>
</section><!--/ band-->

<?php
//Ends blogs    
}
//Other type page starts here
elseif($include_onepage == 'yes' )
   {
?>

<section id="<?php echo $new_title; ?>" class="band page top-space" style="background: url('<?php echo $parallax; ?>') <?php echo $bp; ?> <?php echo $bg_color; ?>; ">
    <section class="container-fluid">
    <div class="row-fluid">
        <section class="container">

            <div class="welcome row">
                <article class="span4" data-<?php echo $start_animation; ?>="<?php echo $hain; ?>" data-<?php echo $end_animation; ?>="<?php echo $haout; ?>">
                    <h1 class="text-left promo-caps<?php echo $hstyle;?>"><?php echo $page_heading; ?></h1>
                </article>
                <article class="span8" data-<?php echo $start_animation; ?>="<?php echo $hhin; ?>" data-<?php echo $end_animation; ?>="<?php echo $hhout; ?>">
                    <p class="text-right promo-text<?php echo $hstyle;?>"><?php echo $heading_highlight; ?></p>
                </article>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
            </div><!--/ row-->


            <?php the_content();?>

           

        </section><!--/ container-->        
    </div><!--/ row-fluid-->    
    </section>
</section><!--/ band-->


<?php } ?>
<?php 
endforeach;
get_footer(); ?>