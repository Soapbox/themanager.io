<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themanager
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
    <div class="grid-container">
      <div class="flex-container align-justify">
        <div class="site-info">
          <?php
          $sitename = get_bloginfo( 'name' );
          
          echo '<p>' . esc_html( $sitename ) . ' &#169 ' . date( 'Y' ) . '</p>';
          ?>
        </div><!-- .site-info -->

        <!-- Social Media. -->
        <?php tm_social_media(); ?>
      </div>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
