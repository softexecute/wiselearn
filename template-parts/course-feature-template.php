<?php
/*=====================================================
-----Sidebar for course single view with details--------
=======================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
$meta = get_post_meta( $post->ID, 'course_fields', true ); 


?>
<div class="col-md-4">
					<div class="sidebar">
						<div class="course-cat-widget">
							<h4 class="course-widget-title"><?php echo esc_html__('Course Features','wiselearn');?></h4>
							<ul>
<li><a href="#"><?php echo esc_html__('Start Date :','wiselearn');?><?php echo $meta['start_date']; ?></a></li>
<li><a href="#"><?php echo esc_html__('End Date :','wiselearn');?><?php echo $meta['end_date']; ?></a></li>
<li><a href="#"><?php echo esc_html__('Course Duration :','wiselearn');?><?php echo $meta['duration']; ?></a></li>
<li><a href="#"><?php echo esc_html__('Available Seats :','wiselearn');?><?php echo $meta['seats_available']; ?></a></li>
<li><a href="#"><?php echo esc_html__('Total Class :','wiselearn');?><?php echo $meta['total_class']; ?></a></li>
<li><a href="#"><?php echo esc_html__('Time :','wiselearn');?><?php echo $meta['time']; ?></a></li>
<li><a href="#"><?php echo esc_html__('Days :','wiselearn');?><?php echo $meta['class']; ?></a></li>
<li><a href="#"><?php echo esc_html__('Total Credit :','wiselearn');?><?php echo $meta['total_credit']; ?></a></li>
<li><a href="#"><?php echo esc_html__('Fess :','wiselearn');?><?php echo '$ '.$meta['fess']; ?></a></li>
								
							</ul>
						</div>				
	<div class="course-cat-widget">
		<h4 class="course-widget-title"><?php echo esc_html__('All Courses', 'wiselearn');?></h4>
			<ul>
				<?php 
       			$categories = get_terms('Course_category', array('hide_empty' => true));
          			foreach ( $categories as $term ) {	  		
         echo '<li><a href="'.get_term_link($term->slug, 'Course_category').'">'.$term->name.' ('.$term->count.')</a></li>';
    		}  ?>
	
				</ul>
	</div>				
	<div class="course-cat-widget related-course-widget">
		<h4 class="course-widget-title">
			<?php echo esc_html__('Related Courses', 'wiselearn');?></h4>
			<ul>
				<?php
  $custom_taxterms = wp_get_object_terms($post->ID, 'Course_category', array('fields' => 'ids') );
        $args = array(
            'post_type' => 'course',
            'post_status' => 'publish',
            'posts_per_page' => 3, // you may edit this number
            'orderby' => 'rand',
            'post__not_in' => array ($post->ID),
            'tax_query' => array(
                array(
                    'taxonomy' => 'Course_category',
                    'field' => 'id',
                    'terms' => $custom_taxterms,
                )
            )
        );
				$loop = new WP_Query($args);
				//print_r($custom_taxterms);
				if ($loop->have_posts()) {
				while($loop->have_posts()):$loop->the_post();
				$metes = get_post_meta( $post->ID, 'course_fields', true ); 
						echo '<li><a href=';
						echo esc_url(the_permalink());
						echo '>';
						echo esc_html(the_title(), 'wiselearn');
						echo ' - $';
						echo $metes['fess'];
						echo '</a></li>';
				endwhile;
				}
			?>
							
			</ul>
	</div>	
	</div>	
</div>	