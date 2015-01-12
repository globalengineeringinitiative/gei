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
	$v = 201501122;
	
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|Alegreya:400italic,700italic,900italic,400,700,900|Raleway:400,300,200,100,500,600,700,800,900' );
	
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'gei-style', get_template_directory_uri() . '/assets/stylesheets/gei.css', array(), $v );
	
	wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/assets/javascripts/fastclick.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/javascripts/bootstrap.min.js', array( 'jquery' ), '3.3.1', true );
	
	wp_enqueue_script( 'gei', get_template_directory_uri() . '/assets/javascripts/gei.min.js', array( 'jquery' ), $v, true );
	
	if ( is_page( __( 'library', 'gei' ) ) ) {
		
		//wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/javascripts/isotope.pkgd.min.js', array( 'jquery' ), '2.1', true );
		
		//wp_enqueue_script( 'gei-library', get_template_directory_uri() . '/assets/javascripts/gei-library.min.js', array( 'jquery' ), $v, true );
		
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


// shame

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
	
}

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_54a5ac9e67028',
	'title' => 'General Options',
	'fields' => array (
		array (
			'key' => 'field_54a5acac72305',
			'label' => 'Short Title',
			'name' => 'short_title',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
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
			'maxlength' => '',
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

endif;

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