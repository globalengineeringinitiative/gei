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
			<?php if ( get_field( 'mailchimp', 'options' ) ) : ?><a href="<?php the_field( 'mailchimp', 'options' ); ?>" title="<?php _e( 'Subscribe to our newsletter', 'gei' ); ?>"><?php _e( 'Subscribe', 'gei' ); ?></a> | <?php endif; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &copy; 2014&ndash;<?php echo date( 'Y' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
