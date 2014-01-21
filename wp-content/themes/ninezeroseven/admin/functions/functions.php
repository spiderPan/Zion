<?php

// Styling for the custom post type icon
add_action( 'admin_head', 'nzs_custom_type_icons' );
function nzs_custom_type_icons() {
    ?>
    <style type="text/css" media="screen">

	#icon-edit.icon32-posts-page-sections {background: url(<?php echo get_template_directory_uri(); ?>/admin/assets/images/icon-headers32.png) no-repeat;}
   	#icon-edit.icon32-posts-recent_works {background: url(<?php echo get_template_directory_uri(); ?>/admin/assets/images/icon-works32.png) no-repeat;}
   	#icon-edit.icon32-posts-one_page_portfolio {background: url(<?php echo get_template_directory_uri(); ?>/admin/assets/images/icon-portfolio32.png) no-repeat;}
   	#icon-edit.icon32-posts-team_members {background: url(<?php echo get_template_directory_uri(); ?>/admin/assets/images/icon-team32.png) no-repeat;}
   	#icon-edit.icon32-posts-parallax-sections {background: url(<?php echo get_template_directory_uri(); ?>/admin/assets/images/icon-parallax32.png) no-repeat;}


    </style>
<?php }
 
?>