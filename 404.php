<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package themanager
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

    <div class="grid-x grid-padding-x">
          <div class="large-12 cell">
            <h1>Welcome to Foundation</h1>
          </div>
          <div class="cell small-12 large-4">
<p>lkjasdflkjasdl lkjasdflkj lajsdfl kjl jasdlfkj ;jasfd;lkj aljsdf </p>
          </div>
          <div class="cell small-12 large-4">
            <p>lkjasdflkjasdl lkjasdflkj lajsdfl kjl jasdlfkj ;jasfd;lkj aljsdf </p>
            </div>
            <div class="cell small-12 large-4">
            <p>lkjasdflkjasdl lkjasdflkj lajsdfl kjl jasdlfkj ;jasfd;lkj aljsdf </p>
            </div>
        </div>

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'tm' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'tm' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'tm' ); ?></h2>
						<ul>
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$tm_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'tm' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$tm_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
