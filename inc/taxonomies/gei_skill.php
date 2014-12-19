<?php

function gei_skill_init() {
	register_taxonomy( 'gei_skill', array( 'gei_resource' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
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
			'name'                       => __( 'Skills', 'gei' ),
			'singular_name'              => _x( 'Skill', 'taxonomy general name', 'gei' ),
			'search_items'               => __( 'Search Skills', 'gei' ),
			'popular_items'              => __( 'Popular Skills', 'gei' ),
			'all_items'                  => __( 'All Skills', 'gei' ),
			'parent_item'                => __( 'Parent Skill', 'gei' ),
			'parent_item_colon'          => __( 'Parent Skill:', 'gei' ),
			'edit_item'                  => __( 'Edit Skill', 'gei' ),
			'update_item'                => __( 'Update Skill', 'gei' ),
			'add_new_item'               => __( 'New Skill', 'gei' ),
			'new_item_name'              => __( 'New Skill', 'gei' ),
			'separate_items_with_commas' => __( 'Skills separated by comma', 'gei' ),
			'add_or_remove_items'        => __( 'Add or remove Skills', 'gei' ),
			'choose_from_most_used'      => __( 'Choose from the most used Skills', 'gei' ),
			'menu_name'                  => __( 'Skills', 'gei' ),
		),
	) );

}
add_action( 'init', 'gei_skill_init' );
