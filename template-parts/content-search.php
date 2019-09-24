<?php
/*=====================================================
-------------Search Result Showing Page---------------
=======================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/

?>

<div class="single-news  <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
		<div class="news-content">
			<div class="news-thumb">
				<?php if ( has_post_thumbnail() ) {
		 wiselearn_post_thumbnail();
		 }
		  else{
		 	echo '<strong>No Featured Image Uploaded</strong>';
		 }
		 ?>						
			</div>
			<div class="post-meta">
				<ul>
				<li><a href="<?php get_permalink();?>"><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time('g:i a'); ?> </a></li>
				
				<li><a href="<?php get_permalink();?>"><i class="fa fa-calendar-check-o" aria-hidden="true"></i><?php the_date('j F, Y'); ?></a></li>
				</ul>
			</div>
	<div class="news-inner">
<?php
the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
echo wp_trim_words(get_the_content(),5,'<a href="'. esc_url( get_permalink() ) . '"> ...Continue Reading</a>');
				
				
		?>		
	</div>

</div>
	<footer class="entry-footer">
		<?php wiselearn_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div>








	
