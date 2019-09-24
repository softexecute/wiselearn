<?php


get_header();
?>

<div class="course-details-sec pt-50 pb-50">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
					<h4 class="page-title screen-reader-text"><?php single_post_title(); ?></h4>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
        	?>


					<ul class="pagination custom-pagination">
							<li>
							<?php the_posts_pagination(array(
							'screen_reader_text'=>' ',
							'prev_text'=>'<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
							'next_text'=>'<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
							));?>
					
							</li>
					</ul>
		
<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>









			
	</div><!-- #primary -->


<?php
get_sidebar();
?>

</div>
</div>
</div>
<?php
get_footer();
?>