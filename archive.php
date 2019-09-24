<?php
get_header();
?>

<?php

/*=======================================================================
-------------This Code only for showing Couse Typw Post---------------
========================================================================*/
	if ( 'course' == get_post_type() ){
		the_archive_title( '<br><h4 class="page-title"><i class="fa fa-link"></i> ', '</h4>' );
		the_archive_description( '<div class="archive-description">', '</div>' );
		?>
		<div class="course-details-sec pt-50 pb-60">
			<div class="container">
			<div class="row grid">
				<?php
		while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content',get_post_type()  );
			endwhile;
			?>
		</div>
	</div>
	</div>
	<?php

}

/*=======================================================================
-------------This Code only for showing Event Typw Post---------------
========================================================================*/
	if ( 'event' == get_post_type() ){
		the_archive_title( '<br><h4 class="page-title"><i class="fa fa-link"></i> ', '</h4>' );
		the_archive_description( '<div class="archive-description">', '</div>' );
		?>
		<div class="event-page pt-50 pb-60"> 
				<?php
		while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			?>
		</div>


<?php
}
/*=======================================================================
-------------This Code only for showing Default Post---------------
========================================================================*/
if ( 'post' == get_post_type() ){		
	the_archive_title( '<br><h4 class="page-title"><i class="fa fa-link"></i> ', '</h4>' );
	the_archive_description( '<div class="archive-description">', '</div>' );
	?>
		
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			<?php
			/* Start the Loop */
			if (have_posts()) {
				while ( have_posts() ) :
				the_post();
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
			}
			else
			{

/*======================================================================
----------------if anyting is not found than show none---------------
========================================================================*/
			get_template_part( 'template-parts/content', 'none' );
			}
			

		?>
			</div><!-- col md 8 -->

<?php
/*====================================================================
-----------------------Sidebar form directory----------------------
========================================================================*/
get_sidebar();
}
?>

</div>

</div>


<?php

get_footer();
?>
<script type="text/javascript">
	jQuery('.grid').masonry({
  // options
  itemSelector: '.grid-item',
  //columnWidth: 150
});
</script>