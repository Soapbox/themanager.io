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
      
      <!-- Page Nav. -->
      <section id="page-nav-wrapper" class="page-nav-wrapper">
        <div class="grid-container">
          <ul class="page-nav flex-container align-justify">
            <li><a href="#books"><?php echo esc_html__( 'Books', 'tm' ); ?></a></li>
            <li><a href="#tech"><?php echo esc_html__( 'Tech', 'tm' ); ?></a></li>
            <li><a href="#blogs"><?php echo esc_html__( 'Blogs', 'tm' ); ?></a></li>
            <li><a href="#podcasts"><?php echo esc_html__( 'Podcasts', 'tm' ); ?></a></li>
            <li><a href="#videos"><?php echo esc_html__( 'Videos', 'tm' ); ?></a></li>
            <li><a href="#bookmarks"><?php echo esc_html__( 'Bookmarks', 'tm' ); ?></a></li>
          </ul>
        </div>
      </section>

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

        <section id="books" class="section-padding">
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

        <section id="tech" class="section-padding">
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
      
      // Blogs.
      $blog_header = get_post_meta( get_the_ID(), 'tm_blog_header', true );
      $blog_text = get_post_meta( get_the_ID(), 'tm_blog_text', true );
      $blogs = get_post_meta( get_the_ID(), 'tm_blogs', true );

      if ( $blogs ) {
        ?>

        <section id="blogs" class="section-padding">
          <div class="grid-container">
            <div class="grid-x grid-padding-x grid-padding-y">
              <div class="cell small-12">
                
                <?php
                if ( $blog_header ) {
                  echo '<h2 class="persona-section-header">' . esc_html( $blog_header ) . '</h2>';
                }
                if ( $blog_text ) {
                  echo '<p>' . esc_html( $blog_text ) . '</p>';
                }
                ?>
                
              </div>

              <?php
              for ( $i = 0; $i < $blogs; $i++ ) {
                $link = get_post_meta( get_the_ID(), 'tm_blogs_' . $i . '_title', true );
                $text = get_post_meta( get_the_ID(), 'tm_blogs_' . $i . '_description', true );

                if ( $link ) {
                  ?>

                  <div class="cell small-12">
                    <a class="blog-link" href="<?php echo esc_url( $link['url'] ); ?>" target="_blank"><?php echo esc_html( $link['title'] ); ?></a>
                  
                    <?php
                    if ( $text ) {
                      echo '<p>' . esc_html( $text ) . '</p>';
                    }
                    ?>

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

      // Podcasts.
      $podcast_header = get_post_meta( get_the_ID(), 'tm_podcast_header', true );
      $podcast_text = get_post_meta( get_the_ID(), 'tm_podcast_text', true );
      $podcasts = get_post_meta( get_the_ID(), 'tm_podcasts', true );

      if ( $podcasts ) {
        ?>

        <section id="podcasts" class="section-padding">
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

      // Videos.
      $video_header = get_post_meta( get_the_ID(), 'tm_video_title', true );
      $videos = get_post_meta( get_the_ID(), 'tm_videos', true );

      if ( $videos ) {
        ?>

        <section id="videos" class="section-padding green videos-wrapper">
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
              <div class="cell small-12">
                <h2 class="text-center"><?php echo esc_html( $video_header ); ?></h2>
              </div>
            </div>
          </div>

          <div class="grid-x grid-padding-x videos">
            <?php
              for ( $i = 0; $i < $videos; $i++ ) {
                $vid = get_post_meta( get_the_ID(), 'tm_videos_' . $i . '_image', true );
                $title = get_post_meta( get_the_ID(), 'tm_videos_' . $i . '_title', true );
                $text = get_post_meta( get_the_ID(), 'tm_videos_' . $i . '_text', true );
                
                if ( $vid && $title ) {
                  echo '<div class="cell small-12 large-4 flex-container">';
                    echo wp_get_attachment_image( $vid, 'full' );
                    echo '<div class="video-text">';
                      echo '<h4>' . esc_html( $title ) . '</h4>';
                      if ( $text ) {
                        echo '<p>' . esc_html( $text ) . '</p>';
                      }
                    echo '</div>';
                  echo '</div>';
                }
              }
              ?>
          </div>
        </section>

        <?php
      }

      // Bookmarks.
      $bookmark_header = get_post_meta( get_the_ID(), 'tm_bookmark_header', true );
      $bookmark_text = get_post_meta( get_the_ID(), 'tm_bookmark_text', true );
      $bookmarks = get_post_meta( get_the_ID(), 'tm_bookmarks', true );

      if ( $bookmarks ) {
        ?>
        
        <section id="bookmarks" class="section-padding">
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
              <div class="cell small-12">
                
                <?php
                if ( $bookmark_header ) {
                  echo '<h2 class="persona-section-header">' . esc_html( $bookmark_header ) . '</h2>';
                }
                if ( $bookmark_text ) {
                  echo '<p>' . esc_html( $bookmark_text ) . '</p>';
                }
                ?>
                
              </div>

              <?php
              for ( $i = 0; $i < $bookmarks; $i++ ) {
                $link = get_post_meta( get_the_ID(), 'tm_bookmarks_' . $i . '_link', true );
                $text = get_post_meta( get_the_ID(), 'tm_bookmarks_' . $i . '_text', true );

                if ( $link && $text ) {
                  ?>

                  <div class="cell small-12">
                    <div class="grid-x grid-padding-x grid-padding-y">
                      <div class="cell small-12 medium-3">
                        <a class="button" href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                      </div>
                      <div class="cell small-12 medium-9">
                        <p><?php echo esc_html( $text ); ?></p>
                      </div>
                    </div>
                  </div>

                  <?php
                }
              }
              ?>

            </div>
          </div>
        </div>

        <?php
      }

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();