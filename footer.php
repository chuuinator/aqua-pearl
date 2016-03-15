<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aqua_Pearl
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
			<div id="footer-menu">
			<?php wp_nav_menu(array('theme_location'=>'secondary', 'menu_class'=>'foot-menu'));?>
		</div><!--footer-menu-->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'aqua-pearl' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'aqua-pearl' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'aqua-pearl' ), 'aqua-pearl', '<a href="http://phoenix.sheridanc.on.ca/~ccit3472" rel="designer">TMJ</a>' ); ?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
