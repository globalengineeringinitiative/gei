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

	<footer id="colophon" class="site-footer col-md-8 col-md-offset-2" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &copy; 2014&ndash;<?php echo date( 'Y' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>jQuery('.carousel').carousel()</script>

</body>
</html>
