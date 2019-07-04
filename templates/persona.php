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

      <!-- Responsibilities. -->
      <?php
      $resps = get_post_meta( get_the_ID(), 'tm_responsibilities', true );
      $resps_image = get_post_meta( get_the_ID(), 'tm_responsibility_image', true );
      
      if ( $resps ) {
        ?>

        <section class="grey section-padding">
          <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">

              <?php
              if ( $resps_image ) {
                ?>

                <div class="cell small-12 large-6">
                  <?php echo wp_get_attachment_image( $resps_image, 'full' ); ?>
                </div>

                <?php
              }
              ?>

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

      // Books.
      $book_header = get_post_meta( get_the_ID(), 'tm_book_header', true );
      $book_text = get_post_meta( get_the_ID(), 'tm_book_text', true );
      $books = get_post_meta( get_the_ID(), 'tm_books', true );

      if ( $books ) {
        ?>

        <section class="section-padding">
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
              <div class="cell small-12">
                
                <?php
                if ( $book_header ) {
                  echo '<h2 class="persona-section-header">' . esc_html( $book_header ) . '</h2>';
                }
                if ( $book_text ) {
                  echo '<p>' . esc_html( $book_text ) . '</p>';
                }
                ?>
                
              </div>

              <?php
              for ( $i = 0; $i < $books; $i++ ) {
                $image = get_post_meta( get_the_ID(), 'tm_books_' . $i . '_image', true );
                $title = get_post_meta( get_the_ID(), 'tm_books_' . $i . '_title', true );
                $text = get_post_meta( get_the_ID(), 'tm_books_' . $i . '_description', true );
                $link = get_post_meta( get_the_ID(), 'tm_books_' . $i . '_link', true );
                  
                if ( $title && $text && $link ) {
                  ?>

                  <div class="cell small-12 medium-6">
                    <div class="grid-x grid-padding-x grid-padding-y book">

                      <?php
                      if ( $image ) {
                        ?>
                        
                        <div class="cell small-5">
                          <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                        </div>

                        <?php
                      }
                      ?>

                      <div class="cell small-7 flex-container flex-dir-column align-justify align-top">
                        <div>
                          <h4><?php echo esc_html( $title ); ?></h4>
                          <p><?php echo esc_html( $text ); ?></p>
                        </div>
                        <a class="button" href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                      </div>
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

      $tech_header = get_post_meta( get_the_ID(), 'tm_technology_header', true );
      $tech_text = get_post_meta( get_the_ID(), 'tm_technology_text', true );
      $tech = get_post_meta( get_the_ID(), 'tm_technology_type', true );
      
      if ( $tech ) {
        ?>

        <section class="section-padding">
          <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
              <div class="cell small-12 technology-header">

                <?php
                if ( $tech_header ) {
                  echo '<h2 class="persona-section-header">' . esc_html( $tech_header ) . '</h2>';
                }
                if ( $tech_text ) {
                  echo '<p>' . esc_html( $tech_text ) . '</p>';
                }
                ?>

              </div>
              
              <?php
              for ( $i = 0; $i < $tech; $i++ ) {
                $label = get_post_meta( get_the_ID(), 'tm_technology_type_' . $i . '_header', true );
                $items = get_post_meta( get_the_ID(), 'tm_technology_type_' . $i . '_technology_item', true );
                ?>

                <div class="cell small-12">

                  <?php
                  if ( $label ) {
                    echo '<h4 class="technology-label">' . esc_html( $label ) . '</h4>';
                  }
                  ?>

                  <div class="grid-x grid-padding-x grid-padding-y">

                    <?php
                    for ( $x = 0; $x < $items; $x++ ) {
                      $icon = get_post_meta( get_the_ID(), 'tm_technology_type_' . $i . '_technology_item_' . $x . '_icon', true );
                      $item_title = get_post_meta( get_the_ID(), 'tm_technology_type_' . $i . '_technology_item_' . $x . '_title', true );
                      $item_text = get_post_meta( get_the_ID(), 'tm_technology_type_' . $i . '_technology_item_' . $x . '_text', true );
                      $link = get_post_meta( get_the_ID(), 'tm_technology_type_' . $i . '_technology_item_' . $x . '_link', true );

                      if ( $item_title && $item_text ) {
                        ?>

                        <div class="cell small-12 medium-4">
                          <div class="card">
                            <div class="flex-container align-middle" style="margin-bottom: 10px;">
                              <?php
                              if ( $icon ) {
                                echo wp_get_attachment_image( $icon, 'full', '', array( 'class' => 'tech-icon' ) );
                              }
                              ?>
                              <h4><?php echo esc_html( $item_title ); ?></h4>
                            </div>
                            <p><?php echo esc_html( $item_text ); ?></p>
                            <a class="button" href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                          </div>
                        </div>

                        <?php
                      }
                    }
                    ?>

                  </div>
                </div>

                <?php
              }
              ?>
              

            </div>
          </div>
        </section>

        <?php
      }
      
      
      // Persona CTA.
      $persona_text = get_post_meta( get_the_ID(), 'tm_persona_cta_text', true );
      $share = get_post_meta( get_the_ID(), 'tm_persona_cta_share_button', true );
      $join = get_post_meta( get_the_ID(), 'tm_persona_cta_join_button', true );

      if ( $persona_text ) {
        ?>

        <section class="persona-cta section-padding">
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
              <div class="cell small-12 medium-10 medium-offset-1 large-8 large-offset-2">
                <?php
                echo wp_kses_post( apply_filters( 'the_content', $persona_text ) );
                
                echo '<div class="text-center">';
                  if ( $share ) {
                    echo '<a class="button" href="' . esc_url( $share['url'] ) . '">' . esc_html( $share['title'] ) . '</a>';
                  }
                  if ( $join ) {
                    echo '<a class="button" href="' . esc_url( $join['url'] ) . '">' . esc_html( $join['title'] ) . '</a>';
                  }
                echo '</div>';
                ?>
              </div>
            </div>
          </div>
        </section>

        <?php
      }
      


      // Podcasts.
      $podcast_header = get_post_meta( get_the_ID(), 'tm_podcast_header', true );
      $podcast_text = get_post_meta( get_the_ID(), 'tm_podcast_text', true );
      $podcasts = get_post_meta( get_the_ID(), 'tm_podcasts', true );

      if ( $podcasts ) {
        ?>

        <section class="section-padding">
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
              <div class="cell small-12">
                
                <?php
                if ( $podcast_header ) {
                  echo '<h2 class="persona-section-header">' . esc_html( $podcast_header ) . '</h2>';
                }
                if ( $podcast_text ) {
                  echo '<p>' . esc_html( $podcast_text ) . '</p>';
                }
                ?>
                
              </div>

              <?php
              for ( $i = 0; $i < $podcasts; $i++ ) {
                $image = get_post_meta( get_the_ID(), 'tm_podcasts_' . $i . '_image', true );
                $title = get_post_meta( get_the_ID(), 'tm_podcasts_' . $i . '_title', true );
                $text = get_post_meta( get_the_ID(), 'tm_podcasts_' . $i . '_description', true );
                $link = get_post_meta( get_the_ID(), 'tm_podcasts_' . $i . '_link', true );
                  
                if ( $title && $text && $link ) {
                  ?>

                  <div class="cell small-12 medium-6">
                    <div class="grid-x grid-padding-x grid-padding-y book">

                      <?php
                      if ( $image ) {
                        ?>
                        
                        <div class="cell small-5">
                          <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                        </div>

                        <?php
                      }
                      ?>

                      <div class="cell small-7 flex-container flex-dir-column align-justify align-top">
                        <div>
                          <h4><?php echo esc_html( $title ); ?></h4>
                          <p><?php echo esc_html( $text ); ?></p>
                        </div>
                        <a class="button" href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                      </div>
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

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();