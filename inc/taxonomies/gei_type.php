<?php

function gei_type_init() {
	register_taxonomy( 'gei_type', array( 'gei_resource' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'type' ),
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Types', 'gei' ),
			'singular_name'              => _x( 'Type', 'taxonomy general name', 'gei' ),
			'search_items'               => __( 'Search Types', 'gei' ),
			'popular_items'              => __( 'Popular Types', 'gei' ),
			'all_items'                  => __( 'All Types', 'gei' ),
			'parent_item'                => __( 'Parent Type', 'gei' ),
			'parent_item_colon'          => __( 'Parent Type:', 'gei' ),
			'edit_item'                  => __( 'Edit Type', 'gei' ),
			'update_item'                => __( 'Update Type', 'gei' ),
			'add_new_item'               => __( 'New Type', 'gei' ),
			'new_item_name'              => __( 'New Type', 'gei' ),
			'separate_items_with_commas' => __( 'Types separated by comma', 'gei' ),
			'add_or_remove_items'        => __( 'Add or remove Types', 'gei' ),
			'choose_from_most_used'      => __( 'Choose from the most used Types', 'gei' ),
			'menu_name'                  => __( 'Types', 'gei' ),
		),
	) );

}
add_action( 'init', 'gei_type_init' );
