<?php

function gei_discipline_init() {
	register_taxonomy( 'gei_discipline', array( 'gei_resource' ), array(
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
			'name'                       => __( 'Disciplines', 'gei' ),
			'singular_name'              => _x( 'Discipline', 'taxonomy general name', 'gei' ),
			'search_items'               => __( 'Search Disciplines', 'gei' ),
			'popular_items'              => __( 'Popular Disciplines', 'gei' ),
			'all_items'                  => __( 'All Disciplines', 'gei' ),
			'parent_item'                => __( 'Parent Discipline', 'gei' ),
			'parent_item_colon'          => __( 'Parent Discipline:', 'gei' ),
			'edit_item'                  => __( 'Edit Discipline', 'gei' ),
			'update_item'                => __( 'Update Discipline', 'gei' ),
			'add_new_item'               => __( 'New Discipline', 'gei' ),
			'new_item_name'              => __( 'New Discipline', 'gei' ),
			'separate_items_with_commas' => __( 'Disciplines separated by comma', 'gei' ),
			'add_or_remove_items'        => __( 'Add or remove Disciplines', 'gei' ),
			'choose_from_most_used'      => __( 'Choose from the most used Disciplines', 'gei' ),
			'menu_name'                  => __( 'Disciplines', 'gei' ),
		),
	) );

}
add_action( 'init', 'gei_discipline_init' );
