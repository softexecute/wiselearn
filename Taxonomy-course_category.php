<?php
get_header();



$term = get_queried_object();
the_archive_title( '<br><h4 class="page-title"><i class="fa fa-link"></i> ', '</h4>' );
the_archive_description( '<div class="archive-description">', '</div>' );
// Define the query
$args = array(
    'post_type' => 'course',
    'Course_category' => $term->slug,
);
$query = new WP_Query($args);

?>

	<div class="course-details-sec pt-50 pb-100">
		<div class="container">
			<div class="row">
				<?php
		while ($query-> have_posts() ) :$query->the_post();
				get_template_part( 'template-parts/content', 'course' );
		endwhile;
			?>
			</div>
		</div>
	</div>


<?php // use reset postdata to restore orginal query
wp_reset_postdata();
?>








<?php
get_footer();
?>