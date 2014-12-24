<?php

function gei_topic_init() {
	register_taxonomy( 'gei_topic', array( 'gei_resource' ), array(
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
			'name'                       => __( 'Topics', 'gei' ),
			'singular_name'              => _x( 'Topic', 'taxonomy general name', 'gei' ),
			'search_items'               => __( 'Search Topics', 'gei' ),
			'popular_items'              => __( 'Popular Topics', 'gei' ),
			'all_items'                  => __( 'All Topics', 'gei' ),
			'parent_item'                => __( 'Parent Topic', 'gei' ),
			'parent_item_colon'          => __( 'Parent Topic:', 'gei' ),
			'edit_item'                  => __( 'Edit Topic', 'gei' ),
			'update_item'                => __( 'Update Topic', 'gei' ),
			'add_new_item'               => __( 'New Topic', 'gei' ),
			'new_item_name'              => __( 'New Topic', 'gei' ),
			'separate_items_with_commas' => __( 'Topics separated by comma', 'gei' ),
			'add_or_remove_items'        => __( 'Add or remove Topics', 'gei' ),
			'choose_from_most_used'      => __( 'Choose from the most used Topics', 'gei' ),
			'menu_name'                  => __( 'Topics', 'gei' ),
		),
	) );

}
add_action( 'init', 'gei_topic_init' );
