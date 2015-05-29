<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Global Engineering Initiative
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gei' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<a id="menu-toggle" data-toggle="collapse" data-target="#menu-container" aria-expanded="false"><i class="fa fa-bars fa-lg"></i><span class="screen-reader-text"><?php _e( 'Primary Menu', 'gei' ); ?></span></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'menu-container', 'container_class' => 'collapse' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<?php if ( is_front_page() ) :
		$images = get_field( 'banner_images' );
		if( $images ): ?>
		    <div id="banner">
			    <h1 class="site-title"><?php _e( '<span>Global</span> <span>Engineering</span> <span>Initiative</span>', 'gei' ); ?></h1>
			    <div class="cycle-slideshow" data-cycle-auto-height="16:9" data-cycle-speed="1000">
			        <?php foreach( $images as $image ): ?>
			        	<?php echo wp_get_attachment_image( $image['ID'], 'slide' ); ?>
			        <?php endforeach; ?>
			    </div>
		    </div>
		<?php endif;
	endif; ?>

	<div id="content" class="site-content">