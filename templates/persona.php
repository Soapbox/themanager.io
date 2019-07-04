<?php
/**
 * TEMPLATE NAME: Persona
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themanager
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
      ?>
      
      <header class="page-header flex-container align-middle text-center">
        <div class="grid-container">
          <div class="grid-x grid-padding-x">
            <div class="cell small-12">
              <?php
              echo '<p class="page-header-intro">' . esc_html__( 'You are a', 'tm' ) . '</p>';
              the_title( '<h1 class="underline">', '</h1>' );
              the_content();
              ?>
            </div>
          </div>
        </div>
      </header>

      <?php
      $resps = get_post_meta( get_the_ID(), 'tm_responsibilities', true );
      $resps_image = get_post_meta( get_the_ID(), 'tm_responsibility_image', true );
      
      if ( $resps ) {
        ?>

        <section class="grey section-padding">
          <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
              <div class="cell small-12 large-6">
                <?php echo wp_get_attachment_image( $resps_image, 'full' ); ?>
              </div>
              <div class="cell small-12 large-6">
                <?php
                echo '<p class="purple"><strong>' . esc_html__( 'You\'re responsible for:', 'tm' ) . '</strong></p>';

                for ( $i = 0; $i < $resps; $i++ ) {
                  $text = get_post_meta( get_the_ID(), 'tm_responsibilities_' . $i . '_text', true );
                  
                  echo '<p>' . esc_html( $text ) . '</p>';

                }
                ?>
              </div>
            </div>
          </div>
        </section>


        
        <?php
      }




		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();