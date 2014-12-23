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
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="sr-only" href="#content"><?php _e( 'Skip to content', 'gei' ); ?></a>
	<nav id="site-navigation" class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu">
					<span class="sr-only"><?php _e( 'Primary Menu', 'gei' ); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id' => 'primary-menu',
				'menu_class' => 'nav navbar-nav  navbar-right',
			) ); ?>
		</div>
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
