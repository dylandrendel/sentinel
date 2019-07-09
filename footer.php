<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="container-fluid footer">
	<div class="row">
		<div class="col-md-3">
			3000 Lawrence St
			Denver, CO 80205
			720.515.0751
		</div>
		<div class="col-md-3">

			Monday – Friday: 8AM – 5PM
			24 Hour Tech Support
		</div>
		<div class="col-md-3">
			General Inquiries:
			info@sentinelda.com
		</div>
		<div class="col-md-3">
			Product Questions or Feedback:
			products@sentinelda.com
		</div>

	</div>
</div>
</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
	integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
	integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
</script>
<script>
	$(document).ready(function () {
		$('body').bootstrapMaterialDesign();
	});
</script>
</body>

</html>
