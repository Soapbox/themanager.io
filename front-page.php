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

      <header class="page-header">
        <div class="grid-container">
          <div class="grid-x grid-padding-x">
            <div class="cell small-12">
              <?php the_title( '<h1>', '</h1>' ); ?>
            </div>
          </div>
        </div>
      </header>


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