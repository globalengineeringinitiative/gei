<?php
/**
 * Global Engineering Initiative functions and definitions
 *
 * @package Global Engineering Initiative
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'gei_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gei_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Global Engineering Initiative, use a find and replace
	 * to change 'gei' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'gei', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'slide', 1600, 900 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'gei' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gei_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // gei_setup
add_action( 'after_setup_theme', 'gei_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gei_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'gei' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'gei_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gei_scripts() {
	$v = '1.01';
	
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|Alegreya:400italic,700italic,900italic,400,700,900|Raleway:400,300,200,100,500,600,700,800,900' );
	
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'gei-style', get_template_directory_uri() . '/assets/stylesheets/gei.css', array(), $v );
	
	wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/assets/javascripts/fastclick.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/javascripts/bootstrap.min.js', array( 'jquery' ), '3.3.1', true );
	
	wp_enqueue_script( 'gei', get_template_directory_uri() . '/assets/javascripts/gei.min.js', array( 'jquery' ), $v, true );
	
	if ( is_front_page() ) {
	
		wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/assets/javascripts/jquery.cycle2.min.js', array( 'jquery' ), '2.1.6', true );
	
	}
	
	if ( is_page( __( 'library', 'gei' ) ) ) {
		
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/javascripts/isotope.pkgd.min.js', array( 'jquery' ), '2.1', true );
		
		wp_enqueue_script( 'gei-library', get_template_directory_uri() . '/assets/javascripts/gei-library.min.js', array( 'jquery' ), $v, true );
		
	}

}
add_action( 'wp_enqueue_scripts', 'gei_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Initialize post types.
 */
require get_template_directory() . '/inc/post-types/gei_resource.php';

/**
 * Initialize taxonomies.
 */
require get_template_directory() . '/inc/taxonomies/gei_discipline.php';
require get_template_directory() . '/inc/taxonomies/gei_module.php';
require get_template_directory() . '/inc/taxonomies/gei_region.php';
require get_template_directory() . '/inc/taxonomies/gei_skill.php';
require get_template_directory() . '/inc/taxonomies/gei_topic.php';
require get_template_directory() . '/inc/taxonomies/gei_type.php';

/**
 * Initialize API.
 */
// require get_template_directory() . '/inc/api/api.php';


// shame

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
	
}

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_54a5ac9e67028',
	'title' => 'Social Media',
	'fields' => array (
		array (
			'key' => 'field_54b59cf52f448',
			'label' => 'Facebook',
			'name' => 'facebook',
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
			'key' => 'field_54b59d002f449',
			'label' => 'MailChimp',
			'name' => 'mailchimp',
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
			'key' => 'field_54b59cbd2f447',
			'label' => 'Twitter',
			'name' => 'twitter',
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
			'prepend' => '@',
			'append' => '',
			'maxlength' => 15,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_54b59d582f44a',
			'label' => 'Vimeo',
			'name' => 'vimeo',
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
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

register_field_group(array (
	'key' => 'group_54a2f2c84facc',
	'title' => 'Library Options',
	'fields' => array (
		array (
			'key' => 'field_54a2f2d8ac370',
			'label' => 'No Match Title',
			'name' => 'no_match_title',
			'prefix' => '',
			'type' => 'text',
			'instructions' => 'The title of the error shown when no matches are found.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'No matching items found',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_54a2f308ac371',
			'label' => 'No Match Text',
			'name' => 'no_match_text',
			'prefix' => '',
			'type' => 'textarea',
			'instructions' => 'The content of the error shown when no matches are found.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Perhaps there are too many filters selected. Try unselecting some blue tags to get more results.',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

register_field_group(array (
	'key' => 'group_5564e99d26587',
	'title' => 'Library Options (Fran&ccedil;ais)',
	'fields' => array (
		array (
			'key' => 'field_5564e9a596204',
			'label' => 'No Match Title (Fran&ccedil;ais)',
			'name' => 'no_match_title_fr',
			'type' => 'text',
			'instructions' => 'The title of the error shown when no matches are found.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Aucun élément correspondant trouvé',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5564e9ee96205',
			'label' => 'No Match Text (Fran&ccedil;ais)',
			'name' => 'no_match_text_fr',
			'type' => 'textarea',
			'instructions' => 'The content of the error shown when no matches are found.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Peut-être qu\'il ya trop de filtres sélectionnés. Essayez décochant certaines étiquettes bleues pour obtenir davantage de résultats.',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;

add_filter('acf/settings/show_admin', '__return_false');

function gei_add_editor_styles() {
    add_editor_style( get_stylesheet_directory_uri() . '/assets/stylesheets/gei.css' );
    add_editor_style( get_stylesheet_directory_uri() . '/assets/stylesheets/editor.css' );
}
add_action( 'after_setup_theme', 'gei_add_editor_styles' );

add_filter('embed_oembed_html', 'gei_embed_oembed_html', 99, 4);

function gei_embed_oembed_html($html, $url, $attr, $post_id) {
	$html = str_replace('?feature=oembed', '?feature=oembed&controls=1&showinfo=0&modestbranding', $html);
	return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
}

include( 'inc/api/v1/class-gei-api.php');
include( 'inc/api/v1/resources/class-gei-resources-api.php');

add_filter( 'init', 'gei_rewrite_rules_for_api', 1 );

/**
 * Adding a rewrite rule for Resource API
 */
function gei_rewrite_rules_for_api() {
	add_rewrite_endpoint( 'api', EP_ROOT );
	add_action( 'template_redirect', 'gei_do_api', 0 );
}

/**
 * Expects the pattern `api/v1/books/{id}`
 * 
 */
function gei_do_api() {
	// Don't do anything and return if `api` isn't part of the URL 
	if ( ! array_key_exists( 'api', $GLOBALS['wp_query']->query_vars ) ) {
		return;
	}

	// Support only GET requests for now
	if ( 'GET' !== $_SERVER['REQUEST_METHOD'] ) {
		\GlobalEngineeringInitiative\Api_v1\Api::apiErrors( 'method' );
	}

	// Deal with the rest of the URL
	$nouns = get_query_var( 'api' );
	if ( '' === trim( $nouns, '/' ) || empty( $nouns ) ) {
		\GlobalEngineeringInitiative\Api_v1\Api::apiErrors( 'resource' );
	}

	// parse url, at minimum we need `v1` and `books`
	$parts = explode( '/', $nouns );

	// required 'v1'
	$version = array_shift( $parts );

	// required 'books'
	$resource = array_shift( $parts );

	// optional 'id'
	$resource_id = ( isset( $parts[0] ) ) ? $parts[0] : '';

	if ( 'v1' !== $version ) {
		\GlobalEngineeringInitiative\Api_v1\Api::apiErrors( 'version' );
	}

	// Filter user input
	if ( is_array( $_GET ) ) {

		$args = array(
		    'offset' => FILTER_SANITIZE_NUMBER_INT,
		    'limit' => FILTER_SANITIZE_NUMBER_INT,
		    'json' => FILTER_SANITIZE_NUMBER_INT,
		    'xml' => FILTER_SANITIZE_NUMBER_INT,
		    'title' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_HIGH
		    ),
		    'author' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_LOW
		    ),
		    'abstract' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_LOW
		    ),
		    'date' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_LOW
		    ),
		    'discipline' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_LOW
		    ),
		    'module' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_HIGH
		    ),
		    'region' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_LOW
		    ),
		    'skill' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_LOW
		    ),
		    'topic' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_LOW
		    ),
		    'type' => array(
				'filter' => FILTER_SANITIZE_STRING,
				'flags' => FILTER_FLAG_STRIP_LOW
		    ),
		);

		$variations = filter_input_array( INPUT_GET, $args, false );

		if ( $variations ) {
			// Trim whitespace
			array_filter( $variations, 'trim_value' );
		}
	}

	switch ( $resource ) {
		case 'resources':
			try {
				new \GlobalEngineeringInitiative\Api_v1\Resources\ResourcesApi( $resource_id, $variations );
			} catch ( Exception $e ) {
				echo $e->getMessage();
			}
			break;
		case 'docs':
			require( 'inc/api/v1/docs/api-documentation.php');
			break;
		default:
			\GlobalEngineeringInitiative\Api_v1\Api::apiErrors( 'resource' );
			break;
	}

	exit;
}

/**
 * Callback function that strips whitespace characters
 * 
 * @see array_filter()
 * @param array $value 
 */
function trim_value( &$value ) {
	$value = trim( $value );
}

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_54b975fe7b84b',
	'title' => 'Banner Images',
	'fields' => array (
		array (
			'key' => 'field_54b976160ec40',
			'label' => 'Banner Images',
			'name' => 'banner_images',
			'prefix' => '',
			'type' => 'gallery',
			'instructions' => 'Images should be 1600 &times; 1200 pixels minimum, 4:3 aspect ratio.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;

function gei_nav_menu_items($items,$args) {
	if ($args->theme_location == 'primary') {
		if (function_exists('icl_get_languages')) {
			$languages = icl_get_languages('skip_missing=0');
			if(1 < count($languages)){
				foreach($languages as $l){
					if(!$l['active']){
						$items = $items.'<li class="menu-item '.$l['language_code'].'"><a href="'.$l['url'].'">'.$l['native_name'].'</a></li>';
					}
				}
			}
		}
	}
 
	return $items;
}

add_filter( 'wp_nav_menu_items', 'gei_nav_menu_items',10,2 );