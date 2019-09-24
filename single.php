<?php

get_header();

?>
<div class="course-details-sec pt-50 pb-100">
	<div class="container">
			<div class="row">
			<div class="col-md-8">

			<?php 
			if ( 'post' == get_post_type() ) {
			 ?>
					<div class="blog-details-desc">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content',get_post_type() );

						// the_post_navigation();
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

							endwhile; // End of the loop.
							?>	
					</div>

			<?php
			}
// Event Section code goes here
elseif ('event' == get_post_type()){
	while (have_posts() ) : the_post();
	$meta = get_post_meta( $post->ID, 'event_fields', true ); 
	get_template_part( 'template-parts/content', get_post_type());
	endwhile; 
	wp_reset_postdata(); 
	}
// Course Section code goes here
elseif ('course' == get_post_type()){

	while (have_posts() ) : the_post();
	$meta = get_post_meta( $post->ID, 'course_fields', true ); 
	get_template_part( 'template-parts/content', get_post_type());
if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile; 
	wp_reset_postdata(); 
	}

	?>
</div> <!-- End col md 8 -->

<?php

if ( 'course' == get_post_type() ) {
get_template_part( 'template-parts/course-feature-template');
}
else {
get_sidebar();
}

?>
</div><!-- End The Row -->
</div> <!-- Blog Details Section End -->
</div>
<?php

get_footer();
?>


