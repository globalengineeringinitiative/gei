<?php

function gei_region_init() {
	register_taxonomy( 'gei_region', array( 'gei_resource' ), array(
		'hierarchical'      => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Regions', 'gei' ),
			'singular_name'              => _x( 'Region', 'taxonomy general name', 'gei' ),
			'search_items'               => __( 'Search Regions', 'gei' ),
			'popular_items'              => __( 'Popular Regions', 'gei' ),
			'all_items'                  => __( 'All Regions', 'gei' ),
			'parent_item'                => __( 'Parent Region', 'gei' ),
			'parent_item_colon'          => __( 'Parent Region:', 'gei' ),
			'edit_item'                  => __( 'Edit Region', 'gei' ),
			'update_item'                => __( 'Update Region', 'gei' ),
			'add_new_item'               => __( 'New Region', 'gei' ),
			'new_item_name'              => __( 'New Region', 'gei' ),
			'separate_items_with_commas' => __( 'Regions separated by comma', 'gei' ),
			'add_or_remove_items'        => __( 'Add or remove Regions', 'gei' ),
			'choose_from_most_used'      => __( 'Choose from the most used Regions', 'gei' ),
			'menu_name'                  => __( 'Regions', 'gei' ),
		),
	) );

}
add_action( 'init', 'gei_region_init' );
