<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_course_funcions( $atts ) {

	$atts = shortcode_atts( array(
'number'=>'12',

	), $atts);

	extract($atts);
	ob_start();




	

	$meta = get_post_meta( $post->ID, 'course_fields', true );
    $args = array(  
       'post_type' => 'course',
       'post_status' => 'publish',
       'posts_per_page' => $number,
       'order' => 'DESC',
   );
   $r = new WP_Query( $args );
  if($r->have_posts()) : 
        	while ( $r->have_posts() ) : $r->the_post(); 
        		$meta = get_post_meta(get_the_ID(), 'course_fields', true );
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
				<span class="publish-date"><?php echo $meta['start_date']; ?> - <?php echo $meta['end_date'];?></span>
				<?php
				echo wp_trim_words(get_the_content(),30,'<a href="'. esc_url( get_permalink() ) . '"> Continue Reading..</a>');
				?>
				<div class="course-meta">
				<ul>
				<li>
					<a href="#"><?php if(function_exists('the_ratings')) { 
				the_ratings(); } ?></a>	</li>
				
				<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $meta['duration']; ?></a></li>
								</ul>
								<div class="course-rating">
								
										<?php if(function_exists('the_ratings')) { 
											substr(the_ratings(),0,20); } ?>

								</div>
							</div>
							
						</div>
					</div>						
				</div>	
		<?php
	endwhile;
	 wp_reset_postdata();
	endif;
	?>
<?php
return ob_get_clean();
}

add_shortcode('course_func','wiselearn_course_funcions');
// Wp bakary page builder code goes here
add_action( 'vc_before_init', 'course_section' );
if(!function_exists('course_section')):
function course_section() {
	if(function_exists('vc_map')):
 vc_map( array(
  "name" => __( "Course", "wiselearn" ),
  "base" => "course_func",
  "class" => "",
  "category" => __( "Wiselearn", "wiselearn"),
  "icon" =>"dashicons dashicons-book-alt",
  "params" => array(
				array(
				  "type" => "textfield",
				  "heading" => __( "How many Course do you want to show at a time?", "wiselearn" ),
				  "param_name" => "number",
				  "description" => __( "Example: 10 ", "wiselearn" ),
				 )
			)
)
);
    endif;
  }
endif;

