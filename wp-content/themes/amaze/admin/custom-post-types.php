<?php
function amaze_post_types() 
{
	/*---Portfolio custom post ----*/
	register_post_type( 'portfolio_item',
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ,'amazelang'),
				'singular_name' => __( 'Project' ,'amazelang'),
				'add_new' => __( 'Add New Project' ,'amazelang'),
				'add_new_item' => __( 'Add New Project' ,'amazelang'),
				'edit' => __( 'Edit Project','amazelang' ),
				'edit_item' => __( 'Edit Project','amazelang' ),
			),
			'description' => __( 'Portfolio Items.','amazelang' ),
			'public' => true,
			'supports' => array( 'title', 'editor','thumbnail' ),
			'rewrite' => array( 'slug' => 'item', 'with_front' => false ),
			'has_archive' => true,
			'show_in_menu' => true,
			'menu_position' => 7,
			'menu_icon' => get_template_directory_uri() . '/admin/assets/images/custom/glyphicons_155_show_thumbnails.png',
		)
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio_item' ),
	array( 'hierarchical' => true, 'label' => "Categories","singular_label" => "Category" ) );	
}

function amaze_team()
{

		/*---Slider custom post ----*/
	register_post_type('team',
		array(
			'labels' => array(
				'name' => __( 'Team' ,'amazelang'),
				'singular_name' => __( 'Team' ,'amazelang'),
				'add_new' => __( 'Add Member' ,'amazelang'),
				'add_new_item' => __( 'Add Member' ,'amazelang'),
				'edit' => __( 'Edit Member','amazelang' ),
				'edit_item' => __( 'Edit Member','amazelang' ),
			),
			'description' => __( 'Team Members.','amazelang' ),
			'public' => true,
			'supports' => array( 'title', 'thumbnail'),
			'rewrite' => array( 'slug' => 'members', 'with_front' => false ),
			'has_archive' => true,
            'show_in_menu' => true,
            'menu_position' => 9,
            'menu_icon' => get_template_directory_uri() . '/admin/assets/images/custom/glyphicons_043_group.png',
		)
	);
}

?>