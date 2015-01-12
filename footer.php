<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Global Engineering Initiative
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="desktop"><?php bloginfo( 'name' ); ?></span><span class="mobile"><?php echo get_option( 'options_short_title' ); ?></span></a> &copy; 2014&ndash;<?php echo date( 'Y' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
