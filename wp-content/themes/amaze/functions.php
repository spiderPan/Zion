<?php
/*--Basic Config calling---*/

//Update Notifier
//require (dirname( __FILE__ ) . "/admin/update-notifier.php" );
//Theme Options
require_once (dirname( __FILE__ ) . "/admin/index.php" );
// //Shortcodes
require_once (dirname( __FILE__ ) . "/admin/shortcodes.php" );
// //Metaboxes
require_once (dirname( __FILE__ ) . "/admin/custom-metabox.php" );
// //Custom Post types
require_once (dirname( __FILE__ ) . "/admin/custom-post-types.php" );
//Theme Stylesadmin
require_once (dirname( __FILE__ ) . "/admin/theme-styles.php" );
//Theme scripts
require_once (dirname( __FILE__ ) . "/admin/theme-scripts.php" );

/*---------------------------------------
---------Reason Initialiszation---------
-----------------------------------------*/
function amaze_setup() 
  {
        //Feed links
		add_theme_support( 'automatic-feed-links' );
		//Nav menu
		register_nav_menu( 'primary', __( 'Primary Menu','amazelang') );
		register_nav_menu( 'quicklinks', __( 'Footer Quick Links','amazelang') );
		//Sidebar
		$args = array(
		'name'          => __( 'amaze_side', 'amazelang' ),
		'id'            => 'amaze01',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<section id="%1$s"  class="blog-side-panel %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>' );
		register_sidebar( $args ); 

        //Content width
		if ( ! isset( $content_width ) ) $content_width = 900;
		//Initiate custom post types
        add_action( 'init', 'amaze_post_types' );
        //Load the text domain
		load_theme_textdomain('amazelang', get_template_directory() . '/languages');
		//Post Thumbnails		
		add_theme_support( 'post-thumbnails', array('portfolio_item','post' ) );
		set_post_thumbnail_size( 300, 300, true ); // Standard Size Thumbnails
		//Function to crop all thumbnails
		if(false === get_option("thumbnail_crop")) {
		add_option("thumbnail_crop", "1");
		} else {
		update_option("thumbnail_crop", "1");
		}	

  }
   add_action( 'after_setup_theme', 'amaze_setup' );
/*---------------------------------------
---------Customised Menu-----------------
-----------------------------------------*/
function custom_menu($image = NULL)
{
    global $smof_data;

	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations['primary']);


    if($smof_data['switch_sticky'] == '0'){ $sst = "";}else $sst = "moveTop";

	$return = '	<nav id="navigation" class="visible-desktop '.$sst.'">' . "\n";

	if($image):	
	 $return .= '<a href="'.get_site_url().'">
	<img alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').'"  class="logo pull-right" src="'.$image.'"/>
	</a>';	
	endif;

if($menu != '')
	{

	$menu_items = wp_get_nav_menu_items($menu->term_id);
	_wp_menu_item_classes_by_context( $menu_items );

	$return .= '<ul id="menu" class="visible-desktop pull-left">';
	$menunu = array();
	foreach((array)$menu_items as $key => $menu_item )
	{
		$menunu[ (int) $menu_item->db_id ] = $menu_item;
	}
	unset($menu_items);
	
	foreach ( $menunu as $i => $men )
	{
		if($men->menu_item_parent == '0')
		{
			    //Specific additions
				if(( 'page' == $men->object ))
				{
		            $incl_onepage = get_post_meta($men->object_id,'one_page',true);
                    //scroll position enabler
                    $spe          = get_post_meta($men->object_id,'bg_animatein_sp',true);

		            $small_title  = strtolower(preg_replace('/\s+/', '-', $men->title));

                    if($incl_onepage == 'yes' OR $incl_onepage == 'Yes')
                    {
						$href =  '#'.$small_title;
						$identifyClass = "is_onepage";
						$spe_pos = 'data-menu-top="'.$spe.'"';
				    }
				    else
				    {
                       $href = $men->url;
                       $identifyClass = "not_onepage";
                       $spe_pos = "";
				    }				
				} 
				else 
				{
					$href =  $men->url;
					$identifyClass = "not_onepage";
					$small_title  = strtolower(preg_replace('/\s+/', '-', $men->title));
				}

			$return .= '<li class="links">
                        <a id="'.$small_title.'-linker" class="'.$identifyClass.'" href="'.$href.'" >'.$men->title.'</a>
                 </li>';
			$return .= '' . "\n";
		}
	}

	}
	else
	{
      $return .= '<ul id="menu" class="visible-desktop pull-left"><li  class="links">';
 	  $return .= '<a id="defaultam-linker" title="Configure Menu" href="'.site_url().'/wp-admin/nav-menus.php">Configure Menu</a>';       
	  $return .= '</li>' . "\n";  
	}


	unset($menunu);	
	$return .= '</ul></nav>' . "\n";
	echo $return;
}

/*---------------------------------------
---------Footer quicklinks Menu-----------------
-----------------------------------------*/
function quicklinks_menu()
{
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations['quicklinks']);


if($menu != '')
	{

	$menu_items = wp_get_nav_menu_items($menu->term_id);
	_wp_menu_item_classes_by_context( $menu_items );
	

    $return = '<h3>'.$menu->name.'</h3>';
	$return .= '<ul>';
	$menunu = array();
	foreach((array)$menu_items as $key => $menu_item )
	{
		$menunu[ (int) $menu_item->db_id ] = $menu_item;
	}
	unset($menu_items);
	
	foreach ( $menunu as $i => $men )
	{
		if($men->menu_item_parent == '0')
		{
			    //Specific additions
				if(( 'page' == $men->object ))
				{
		            $incl_onepage = get_post_meta($men->object_id,'one_page',true);
		            $small_title  = strtolower(preg_replace('/\s+/', '-', $men->title));

                    if($incl_onepage == 'yes' OR $incl_onepage == 'Yes')
                    {
						$href =  '#'.$small_title;
						$identifyClass = "is_onepage";
				    }
				    else
				    {
                       $href = $men->url;
                       $identifyClass = "not_onepage";
				    }				
				} 
				else 
				{
					$href =  $men->url;
					$identifyClass = "not_onepage";
				}
				$return .= '<li class="links">
                        <a class="'.$identifyClass.'" href="'.$href.'">'.$men->title.'</a>
                 </li>';
		}
	}
	unset($menunu);	
	$return .= '</ul>' . "\n";
	echo $return;
  }
}

/*---------------------------------------
---------Customised Mobile Menu-----------------
-----------------------------------------*/
function custom_mobile_menu($image = NULL)
{
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations['primary']);


if($menu != '')
	{

	$menu_items = wp_get_nav_menu_items($menu->term_id);
	_wp_menu_item_classes_by_context( $menu_items );

	$return = '<ul class="mobile-header visible-phone visible-tablet">
        <li><a href="'.get_site_url().'">
            <img title="'.get_bloginfo('name').'" alt="'.get_bloginfo('name').'" src="'.$image.'"/></a>
        </li>

	<li>' . "\n";
	if(is_single() OR is_page() OR is_archive()) 
	{
		$mobmenu_class = "dropmenu_sing";
		$onchange = "window.open (this.value,'_self',false)";
	}
	else { $mobmenu_class = "dropmenu"; $onchange = "moveTo(this.value)"; }

	//$return .= '<select class="'.$mobmenu_class.'" name="dropmenu" onChange="'.$onchange.'">'. "\n";
	$return .= '<select class="'.$mobmenu_class.' dropmenuam" name="dropmenu" onChange="moveTo()">'. "\n";
	$menunu = array();
	foreach((array)$menu_items as $key => $menu_item )
	{
		$menunu[ (int) $menu_item->db_id ] = $menu_item;
	}
	unset($menu_items);
	
	foreach ( $menunu as $i => $men ){
		if($men->menu_item_parent == '0')
		{
				if( ( 'page' == $men->object ))
				{
		            $incl_onepage = get_post_meta($men->object_id,'one_page',true);
		            $small_title  = strtolower(preg_replace('/\s+/', '-', $men->title));
                    if($incl_onepage == 'yes' OR $incl_onepage == 'Yes')
                    {
						$href =  '#'.$small_title;
                        $identifyClass = "is_mob_onepage";
                       // $onchange_live = "moveTo(this.value)";
				    }
				    else
				    {
                       $href = $men->url;
                       $identifyClass = "not_mob_onepage";
                       //$onchange_live = "window.open (this.value,'_self',false)";
				    }		
				} 
				else 
				{
					$href  =  $men->url;
					$identifyClass = "not_mob_onepage";
					//$onchange_live = "window.open (this.value,'_self',false)";
				}

				if(is_single() OR is_page() OR is_archive()) 
				{
                   $return .= '<option class="'.$identifyClass.'_single" value="'. $href .'">'. $men->title .'</option>';
				}
			    else
			    {
                  //$return .= '<option class="'.$identifyClass.'" value="'. $href .'" onClick="'.$onchange_live.'">'. $men->title .'</option>';
			      $return .= '<option class="'.$identifyClass.'" value="'. $href .'">'. $men->title .'</option>';
			    }
               
		}
	}

	unset($menunu);	
	$return .= '</select></li></ul>' . "\n";
	echo $return;

}//wrapper

}

/*---------------------------------------
---------Format comment Callback-----------
-----------------------------------------*/

function format_comments($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('commentlists'); ?>>
		<div id="comment-<?php comment_ID(); ?>" class="panel clearfix cmntparent <?php
                        $authID = get_the_author_meta('ID');
                                                    
                        if($authID == $comment->user_id)
                           echo "cmntbyauthor";
                       else
                           echo "";
                        ?>">
			<div class="comment">


            				<div class="comment-author image-polaroid">
            					<?php 
                                $defimg = get_stylesheet_directory_uri(). "/images/avatar.png";
                                if(get_avatar($comment)):
                                	echo get_avatar($comment,$size='75');
                                else:
                                ?>
                                <img src="<?php echo $defimg; ?>"  alt="avatar" />
            					<?php endif; ?>
            				</div>
            				<div class="comment-body">
 										<div class="comment-meta">
											<span class="meta-name"><?php printf(__('%s','amazelang'), get_comment_author_link()) ?></span>
											<span class="meta-date"> on <?php comment_time('F jS, Y'); ?></span>
											<div class="reply">
											<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
											<?php edit_comment_link(__('Edit','personalang'),'<span class="edit-comment">', '</span>'); ?>
										    </div>
									    </div>           					
                                <?php if ($comment->comment_approved == '0') : ?>
                   					<div class="alert-box success">
                      					<?php _e('Your comment is awaiting moderation.','personalang') ?>
                      				</div>
            					<?php endif; ?>
                                
                                <?php comment_text() ?>
                                
                                <!-- removing reply link on each comment since we're not nesting them -->
            					
                            </div>		
		</li>

<?php
}
/*---------------------------------------
-------BG color with alpha converter-----
-----------------------------------------*/
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}


?>