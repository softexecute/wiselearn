<?php
/**
 * The template for displaying all pages
 *

 */

get_header();
?>

<div class="course-details-sec pt-50 pb-100">
	<div class="container">
			<div class="row">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type());

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div>
	</div><!-- #container -->
</div>

<?php
get_footer();
