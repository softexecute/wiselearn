
<?php

/*=====================================================================
-------------Course Typw post show in archive or home page---------------
========================================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
if ( is_home() && is_front_page() || is_archive()) {
	$meta = get_post_meta( $post->ID, 'course_fields', true ); 

?>
<div class="col-md-4 col-sm-6 grid-item">
		<div class="course-inner">
			<div class="course-inner-thumb">
				<?php wiselearn_post_thumbnail(); ?>
			</div>
			<div class="course-inner-text">
				<div class="course-author">
				<img src="<?php echo $meta['teacher_pic']; ?>">
				</div>
				<?php
		the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				?>
				<span class="publish-date"><?php echo $meta['start_date'];?> - <?php echo $meta['end_date']; ?></span>
				<?php
				echo wp_trim_words(get_the_content(),30,'<a href="'. esc_url( get_permalink() ) . '"> Continue Reading..</a>');
				?>
				<div class="course-meta">
				<ul>
									<li><a href="#">
									<!-- 	<i class="fa fa-heart" aria-hidden="true"></i> --> <?php if(function_exists('the_ratings')) { 
											the_ratings(); } ?></a></li>
									<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $meta['duration']; ?></a></li>
								</ul>
								<div class="course-rating">
									<?php if(function_exists('the_ratings')) { 
											the_ratings(); } ?>

								</div>
							</div>
							
						</div>
					</div>						
				</div>	
<?php
}
/*=====================================================================
-------------Course Typw post show in single page---------------
========================================================================*/
else{
?>

<div class="course-details grid-item">
		<div class="course-details-thumb">
					<?php wiselearn_post_thumbnail(); ?>
		</div>	

		<?php
		esc_html__(the_title( '<h3>', '</h3>' ), 'wiselearn');?>				
		<?php		esc_html__(the_content(),'wiselearn');
		?>
						
</div>

<?php
}



?>


















