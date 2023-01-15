<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package industry-drive
 */

?>
  
	<footer id="colophon" class="site-footer">
		<div class="id_grid_container">
			<div class="id_row">
		    <div class="column8">		
			<?php dynamic_sidebar( 'footer_menu' ); ?>
			<?php dynamic_sidebar( 'copyright_widget' ); ?>
		
			</div>
			<div class="column4">
			  <?php dynamic_sidebar( 'newsletter' ); ?>
			</div>
			</div>
		</div>
	</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
