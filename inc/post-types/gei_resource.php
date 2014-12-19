<?php

function gei_resource_init() {
	register_post_type( 'gei_resource', array(
		'labels'            => array(
			'name'                => __( 'Resources', 'gei' ),
			'singular_name'       => __( 'Resource', 'gei' ),
			'all_items'           => __( 'Resources', 'gei' ),
			'new_item'            => __( 'New Resource', 'gei' ),
			'add_new'             => __( 'Add New', 'gei' ),
			'add_new_item'        => __( 'Add New Resource', 'gei' ),
			'edit_item'           => __( 'Edit Resource', 'gei' ),
			'view_item'           => __( 'View Resource', 'gei' ),
			'search_items'        => __( 'Search Resources', 'gei' ),
			'not_found'           => __( 'No Resources found', 'gei' ),
			'not_found_in_trash'  => __( 'No Resources found in trash', 'gei' ),
			'parent_item_colon'   => __( 'Parent Resource', 'gei' ),
			'menu_name'           => __( 'Resources', 'gei' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'menu_position'		=> 5,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => array( 'slug' => __( 'resources', 'gei') ),
		'query_var'         => true,
	) );
	if ( function_exists( 'pti_set_post_type_icon' ) ) pti_set_post_type_icon( 'gei_resource', 'file-text-o' );
}
add_action( 'init', 'gei_resource_init' );

function gei_resource_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['gei_resource'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Resource updated. <a target="_blank" href="%s">View Resource</a>', 'gei'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'gei'),
		3 => __('Custom field deleted.', 'gei'),
		4 => __('Resource updated.', 'gei'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Resource restored to revision from %s', 'gei'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Resource published. <a href="%s">View Resource</a>', 'gei'), esc_url( $permalink ) ),
		7 => __('Resource saved.', 'gei'),
		8 => sprintf( __('Resource submitted. <a target="_blank" href="%s">Preview Resource</a>', 'gei'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Resource scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Resource</a>', 'gei'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Resource draft updated. <a target="_blank" href="%s">Preview Resource</a>', 'gei'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'gei_resource_updated_messages' );
