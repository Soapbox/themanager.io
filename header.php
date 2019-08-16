<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themanager
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link href="./gulp/js/vendor/all.js" rel="stylesheet">
	<?php wp_head(); ?>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-M5ZGD2Q');</script>
  <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M5ZGD2Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="page" class="site">
  <header id="masthead" class="site-header">
    <div class="grid-container flex-container align-justify align-middle">
      <div class="site-branding">
        <?php the_custom_logo(); ?>
        <a href="<?php echo esc_url( home_url() ); ?>">the<strong>Manager</strong>.io</a>
      </div><!-- .site-branding -->
      
      <?php
      $join = get_option( 'options_tm_header_join_us_button' );

      if ( $join ) {
        echo '<a class="button join-us" href="' . esc_url( $join['url'] ) . '">' . esc_html( $join['title'] ) . '</a>';
      }
      ?>
    </div>
  </header><!-- #masthead -->

	<div id="content" class="site-content">
