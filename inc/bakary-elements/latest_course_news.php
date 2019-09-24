<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function latest_course_element( $atts ) {
 extract( shortcode_atts( array(
 'title'=>' ',
 'number'=>' ',

 ), $atts ) );
ob_start();




?>
        <div class="latest-blog-title">
            <h2><?php echo esc_html__($title);?></h2>
          </div>   
           <div class="all-latest-blog">
<?php

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
     
         
            <div class="single-latest-blog">
              <?php wiselearn_post_thumbnail(); ?>
              <div class="latest-blog-desc">
                <div class="latest-blog-desc-inner">
                  <ul>
                  <li><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html__(get_the_date(),'wiselearn')?></a></li>
                    <li><a href="#">By : <?php echo esc_html__(get_the_author(),'wiselearn')?></a></li>
                  </ul>
                  <h4><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html(the_title(),'wiselearn')?> Start From <?php echo $meta['start_date']; ?></a></h4>
                </div>
              </div>
            </div>  
          <?php endwhile;
        endif;?>
          </div>

<?php
 return ob_get_clean();
}

//kc_function
add_shortcode( 'latest_course_section', 'latest_course_element' );
	add_action('vc_before_init','wiselearn_latest_posts_func');
  if(!function_exists('wiselearn_latest_posts_func')):
  	function wiselearn_latest_posts_func(){
      if(function_exists('vc_map')):
		 vc_map( array(
  "name" => __( "Latest Course", "wiselearn" ),
  "base" => "latest_course_section",
  "class" => "",
  "category" => __( "Wiselearn", "wiselearn"),
  "icon" =>"dashicons dashicons-book",
  "params" => array(
              array(
              "type" => "textfield",
              "heading" => __( "How many Course do you want to show at a time?", "wiselearn" ),
              "param_name" => "number",
              "description" => __( "Example: 10 ", "wiselearn" ),
                ),
              array(
              "type" => "textfield",
              "heading" => __( "Section Title", "wiselearn" ),
              "param_name" => "title",
              "description" => __( "Example: Latest Course News ", "wiselearn" ),
                ),
    )
 ));
    endif;
}
endif;
?>
