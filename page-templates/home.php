<?php
/**
 * Template Name: Home
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>


<div class="container-fluid home-img">
<div class="col-md-6 offset-md-2 col-lg-5 offset-lg-1">
	<div class="row justify-content-center">
		<h1 class="display-2 home-title">Unleash your fleet's potential</h1>
	</div>
	<div class="row justify-content-center">
		<h4 class="home-description">We build and harness the power of next-generation software to find and book more trips for our partners.</h1>
	</div>
	<div class="row justify-content-center">
		<a class="btn btn-raised btn-primary btn-lg home-cta" href="index.php/contact">Fly With Us</a>
	</div>
	</div>
</div>



<?php get_footer(); ?>
