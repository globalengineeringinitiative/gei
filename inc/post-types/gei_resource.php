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
		'supports'          => array( 'title', 'editor', 'author' ),
		'has_archive'       => true,
		'rewrite'           => array('slug' => _x( 'resources', 'URL slug', 'gei' ),
		'query_var'         => true,
	) );
	if ( function_exists( 'pti_set_post_type_icon' ) ) pti_set_post_type_icon( 'gei_resource', 'file-text-o' );
}
add_action( 'init', 'gei_resource_init' );

function gei_metadata_admin() {
	remove_meta_box( 'tagsdiv-gei_type', 'gei_resource', 'side' );
}

add_action( 'add_meta_boxes', 'gei_metadata_admin', 12 );

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

if ( function_exists('register_field_group') ):

register_field_group( array (
	'key' => 'group_5493bcb93b356',
	'title' => 'Resource Data',
	'fields' => array (
		array (
			'key' => 'field_5493bcf20f7c1',
			'label' => __('Subtitle', 'gei'),
			'name' => 'subtitle', 'gei',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5493bd060f7c3',
			'label' => __('Author(s)', 'gei'),
			'name' => 'authors',
			'prefix' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => __('Add Author', 'gei'),
			'sub_fields' => array (
				array (
					'key' => 'field_5493bfe053b7e',
					'label' => __('First Name', 'gei'),
					'name' => 'first_name',
					'prefix' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_5493bfe853b7f',
					'label' => __('Last Name', 'gei'),
					'name' => 'last_name',
					'prefix' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
		array (
			'key' => 'field_5493bd470f7c6',
			'label' => __('Source Organization / Institution', 'gei'),
			'name' => 'source',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5493bd560f7c7',
			'label' => __('Publication Date', 'gei'),
			'name' => 'publication_date',
			'prefix' => '',
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 1,
		),
array (
			'key' => 'field_54a5b4c97f3b2',
			'label' => __('Short Summary', 'gei'),
			'name' => 'short_summary',
			'prefix' => '',
			'type' => 'text',
			'instructions' => __('120 characters max.', 'gei'),
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => 120,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5493bcfa0f7c2',
			'label' => __('Summary', 'gei'),
			'name' => 'summary',
			'prefix' => '',
			'type' => 'wysiwyg',
			'instructions' => __('500 words max.', 'gei'),
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
		),
		array (
			'key' => 'field_5493be9e0f7ce',
			'label' => __('Recommended Citation', 'gei'),
			'name' => 'recommended_citation',
			'prefix' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
		),
		array (
			'key' => 'field_5493bd860f7c8',
			'label' => __('External URL', 'gei'),
			'name' => 'external_url',
			'prefix' => '',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_5493bd960f7c9',
			'label' => __('File Download URL', 'gei'),
			'name' => 'file_download_url',
			'prefix' => '',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_5493bdab0f7ca',
			'label' => __('File Format', 'gei'),
			'name' => 'file_format',
			'prefix' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'pdf' => __('Adobe PDF', 'gei'),
				'xls' => __('Excel Spreadsheet', 'gei'),
				'ppt' => __('PowerPoint Slideshow', 'gei'),
				'doc' => __('Word Document', 'gei'),
			),
			'default_value' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_5493c364da787',
			'label' => __('Language', 'gei'),
			'name' => 'language',
			'prefix' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'en' => 'English',
				'es' => 'Español',
				'fr' => 'Français',
			),
			'default_value' => array (
				'en' => 'English',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_5493bdbc0f7cb',
			'label' => __('Media Type', 'gei'),
			'name' => 'media_type',
			'prefix' => '',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'gei_type',
			'field_type' => 'select',
			'allow_null' => 0,
			'load_save_terms' => 1,
			'return_format' => 'id',
			'multiple' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'gei_resource',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'custom_fields',
		3 => 'discussion',
		4 => 'comments',
		5 => 'author',
		6 => 'format',
		7 => 'page_attributes',
		8 => 'featured_image',
		9 => 'categories',
		10 => 'tags',
		11 => 'send-trackbacks',
	),
) );

endif;