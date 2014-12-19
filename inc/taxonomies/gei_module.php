<?php

function gei_module_init() {
	register_taxonomy( 'gei_module', array( 'gei_resource' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => false,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Modules', 'gei' ),
			'singular_name'              => _x( 'Module', 'taxonomy general name', 'gei' ),
			'search_items'               => __( 'Search Modules', 'gei' ),
			'popular_items'              => __( 'Popular Modules', 'gei' ),
			'all_items'                  => __( 'All Modules', 'gei' ),
			'parent_item'                => __( 'Parent Module', 'gei' ),
			'parent_item_colon'          => __( 'Parent Module:', 'gei' ),
			'edit_item'                  => __( 'Edit Module', 'gei' ),
			'update_item'                => __( 'Update Module', 'gei' ),
			'add_new_item'               => __( 'New Module', 'gei' ),
			'new_item_name'              => __( 'New Module', 'gei' ),
			'separate_items_with_commas' => __( 'Modules separated by comma', 'gei' ),
			'add_or_remove_items'        => __( 'Add or remove Modules', 'gei' ),
			'choose_from_most_used'      => __( 'Choose from the most used Modules', 'gei' ),
			'menu_name'                  => __( 'Modules', 'gei' ),
		),
	) );

}
add_action( 'init', 'gei_module_init' );
