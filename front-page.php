<?php
/**
 * The template for displaying the front page.
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

      <header class="page-header home-header flex-container align-middle">
        <div class="grid-container">
          <div class="grid-x grid-padding-x">

            <?php
            $header_title = get_post_meta( get_the_ID(), 'tm_home_page_header_title', true );
            $header_text = get_post_meta( get_the_ID(), 'tm_home_page_header_text', true );
            $header_link = get_post_meta( get_the_ID(), 'tm_home_page_header_link', true );

            if ( $header_title ) {
              ?>

              <div class="cell small-12 large-6">
                <div class="header-title">
                  <?php echo wp_kses_post( apply_filters( 'the_content', $header_title ) ); ?>
                </div>

                <?php
                if ( $header_text ) {
                  echo '<p>' . esc_html( $header_text ) . '</p>';
                }

                if ( $header_link ) {
                  echo '<a class="button secondary" href="#managers">' . esc_html( $header_link['title'] ) . '</a>';
                }
                ?>

              </div>

              <?php
            }

            if ( has_post_thumbnail() ) {
              ?>
              <div class="cell large-6 show-for-large flex-container align-right">
                <?php the_post_thumbnail(); ?>
              </div>
              <?php
            }
            ?>

          </div>
        </div>
      </header>

      <?php
      $managers = get_post_meta( get_the_ID(), 'tm_manager_types', true );

      if ( $managers ) {
        ?>

        <section id="managers" class="managers">
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
              <?php
              for ( $i = 0; $i < $managers; $i++ ) {
                $name = get_post_meta( get_the_ID(), 'tm_manager_types_' . $i . '_name', true );
                $image = get_post_meta( get_the_ID(), 'tm_manager_types_' . $i . '_image', true );
                $text = get_post_meta( get_the_ID(), 'tm_manager_types_' . $i . '_text', true );
                $link = get_post_meta( get_the_ID(), 'tm_manager_types_' . $i . '_link', true );
  
                if ( $name && $text ) {
                  ?>
  
                  <div class="cell small-12 medium-6 large-4 flex-container">
                    <div class="card">
                      <h3 class="text-center"><?php echo esc_html( $name ); ?></h3>
                      <?php
                      echo wp_get_attachment_image( $image, 'full' );
                      echo wp_kses_post( apply_filters( 'the_content', $text ) );
                      
                      if ( $link ) {
                        ?>

                        <a class="button tertiary" href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>

                        <?php
                      }
                      ?>
                    </div>
                  </div>
  
                  <?php
                }
              }
              ?>
  
            </div>
          </div>
        </section>
  
        <?php
      }

      $join = get_post_meta( get_the_ID(), 'tm_join_text', true );
      $join_link = get_post_meta( get_the_ID(), 'tm_join_link', true );
      $join_image = get_post_meta( get_the_ID(), 'tm_join_image', true );

      if ( $join ) {
        ?>

        <section class="join-cta">
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
              <div class="cell small-12 medium-6">
                <?php
                echo wp_kses_post( apply_filters( 'the_content', $join ) );
                
                if ( $join_link ) {
                  ?>

                  <a class="button tertiary" href="<?php echo esc_url( $join_link['url'] ); ?>"><?php echo esc_html( $join_link['title'] ); ?></a>

                  <?php
                }
                ?>
              </div>

              <?php
              if ( $join_image ) {
                ?>

                <div class="cell small-12 medium-6">
                  <?php echo wp_get_attachment_image( $join_image, 'full' ); ?>
                </div>

                <?php
              }
              ?>

            </div>
          </div>
        </section>

        <?php
      }

      $attend = get_post_meta( get_the_ID(), 'tm_attend_text', true );
      $attend_link = get_post_meta( get_the_ID(), 'tm_attend_link', true );
      
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

      <!-- <div class="grid-container">
        <div class="grid-x grid-padding-x">
          <div class="cell small-12">
            <?php 
            // the_title( '<h1>', '</h1>' );
            // the_content();
            ?>
          </div>
        </div>
      </div> -->

      <?php
    endwhile; // End of the loop.
    ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();