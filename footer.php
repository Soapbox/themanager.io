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


  $attend = get_option( 'options_tm_attend_text' );
  $attend_link = get_option( 'options_tm_attend_link' );

  if ( $attend ) {
    ?>
    
    <section class="attend-cta section-padding text-center">
      <div class="grid-container">
        <div class="grid-x grid-padding-x">
          <div class="cell small-12 medium-10 medium-offset-1 large-8 large-offset-2">
            <?php
            echo wp_kses_post( apply_filters( 'the_content', $attend ) );
            
            if ( $attend_link ) {
              ?>

              <a class="button secondary" href="<?php echo esc_url( $attend_link['url'] ); ?>"><?php echo esc_html( $attend_link['title'] ); ?></a>

              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </section>

    <?php
  }

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
