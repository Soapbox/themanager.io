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
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <header id="masthead" class="site-header">
    <div class="grid-container flex-container align-justify align-middle">
      <div class="site-branding">
        <?php the_custom_logo(); ?>
        themanager.io
      </div><!-- .site-branding -->
      <a class="button join-us" href="#">Join Us</a>
    </div>
  </header><!-- #masthead -->

	<div id="content" class="site-content">
