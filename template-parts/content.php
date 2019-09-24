<?php
/*=====================================================
--------Default post showing code----------------
=======================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
?>

	<div class="single-news"> 
		<div class="news-content"> 
			<div class="news-thumb">
	<?php if ( has_post_thumbnail() ) { wiselearn_post_thumbnail(); } 
	else{ echo	''; 
} ?>						
			</div>
			<div class="post-meta">
				<ul>
				<li><a href="<?php get_permalink();?>"><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time('g:i a'); ?> </a></li>
				<li><a href="<?php get_permalink();?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Chattogram, Bangladesh  </a></li>
				<li><a href="<?php get_permalink();?>"><i class="fa fa-calendar-check-o" aria-hidden="true"></i><?php the_date(); ?></a></li>
				</ul>
			</div>
	<div class="news-inner"> <?php 
	if ( is_singular() ) : the_title( '<h4>',	'</h4>' );
	 else : the_title( '<h4><a href="' . esc_url( get_permalink() ) .
	'" rel="bookmark">', '</a></h4>' ); 
endif; ?> 
	<?php 
	if ( is_home() &&	is_front_page() || is_archive() ) :
	echo wp_trim_words(get_the_content(),70,'<a href="'. esc_url(
	get_permalink() ) . '"> ...Continue Reading</a>');
		else: 
		the_content( sprintf( wp_kses( /* translators: %s: Name of current
post. Only visible to screen readers */
 __( 'Continue reading<span
class="screen-reader-text"> "%s"</span>', 'wiselearn' ),
array( 'span' =>
array( 'class' => 
	array(), ), ) ), 
		get_the_title() ) );

		endif;	 ?>		 
	</div>
	<?php
/*================================================================
--------in Home or archive Page share Button Will not show---------------
=====================================================================*/
if ( is_home() && is_front_page() || is_archive() ) :

else:
/*================================================================
--------Otherwise share Button Will show---------------
=====================================================================*/
	?>
	<div class="news-post-meta">
				<div class="row">
						<div class="col-md-6">
							<div class="post-share-link">
						<span><?php echo esc_html__('Share this post:','wiselearn');?> </span>
							<ul>
								
							<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;" class="fb-xfbml-parse-ignore"><i class="fa fa-facebook"></i></a></li>

							<li><a href="https://twitter.com/intent/tweet?"onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20content ' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-twitter"></i></a></li>

							<li><a href="http://www.linkedin.com/shareArticle?mini=true&url="onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' + encodeURIComponent(document.title)); return false;"> <i class="fa fa-linkedin"></i></a></li>

							<li><a href="https://plus.google.com/share?url=" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-google-plus"></i></a></li>
							</ul>
							</div>
						</div>


						<div class="col-md-6">
						<div class="post-tag">
							<span class="post-tag-title"><?php echo esc_html__('Tags :')?></span>
								<ul>
								<?php the_tags("<li>","</li><li>","</li>");?>
								</ul>								
						</div>								
						</div>								
				</div>
			</div>	
	
<?php 
endif;
	?>
			
				</div>
			</div>