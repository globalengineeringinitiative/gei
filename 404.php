<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Global Engineering Initiative
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Page not found.', 'gei' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'We couldn&rsquo;t find your page. Perhaps it&rsquo;s in the library?', 'gei' ); ?></p>

					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>"> 
					<label class="screen-reader-text" for="s">Search for:</label> 
					<input type="hidden" value="gei_resource" name="post_type" id="post_type" /> 
					<input type="text" value="" name="s" id="s" /> 
					<button type="submit" id="searchsubmit"><i class="fa fa-search"></i><span class="screen-reader-text"> Search</span></button>
					</form>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
