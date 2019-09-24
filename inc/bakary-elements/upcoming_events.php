<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function upcomming_events_element( $atts ) {
 extract( shortcode_atts( array(
 'title'=>' ',
 'number'=>' ',

 ), $atts ) );
ob_start();




?>
      <div class="latest-blog-title">
            <h2>Upcoming Events</h2>
          </div>  
          <div class="event-sec"> 
<?php


        $event = new WP_Query(array( 
          'post_type'=>'event',
          'post_status' => 'publish',
          'posts_per_page' => $number,
          'order' => 'DESC',
          )); 
          
 if ($event->have_posts()) {
while($event->have_posts()): $event->the_post(); 
  $event_meta=get_post_meta( get_the_ID(),'event_fields', true ); 
          ?>
               
          
            <div class="single-event">
              <h4><a href="<?php echo esc_url(get_the_permalink());?>"><?php echo esc_html__(the_title(),'wiselearn'); ?></a></h4>
              <ul>
                <li><a href="<?php echo esc_url(get_the_permalink($post->ID));?>"><i class="fa fa-calendar" aria-hidden="true"></i>  <?php echo esc_html__( $event_meta['event_date'],'wiselearn' ); ?> </a></li>
                <li><a href="<?php echo esc_url(get_the_permalink($post->ID));?>"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html__( $event_meta['timeing'],'wiselearn' ); ?></a></li>
              </ul>
            </div>  



         <?php 
       
     endwhile;
     }
?>
      </div>


<?php
 return ob_get_clean();
}

//kc_function
add_shortcode( 'upcomming_events_section', 'upcomming_events_element' );
	add_action('vc_before_init','wiselearn_upcomming_events');
  if(!function_exists('wiselearn_upcomming_events')):
  	function wiselearn_upcomming_events(){
      if(function_exists('vc_map')):
		 vc_map( array(
  "name" => __( "Upcoming Events", "wiselearn" ),
  "base" => "upcomming_events_section",
  "class" => "",
  "category" => __( "Wiselearn", "wiselearn"),
  "icon" =>"dashicons dashicons-book",
  "params" => array(
              array(
              "type" => "textfield",
              "heading" => __( "How many Events do you want to show at a time in list?", "wiselearn" ),
              "param_name" => "number",
              "description" => __( "Example: 10 ", "wiselearn" ),
                ),
              array(
              "type" => "textfield",
              "heading" => __( "Section Title", "wiselearn" ),
              "param_name" => "title",
              "description" => __( "Example: Upcomming Events ", "wiselearn" ),
                ),
    )
 ));
    endif;
  }
endif;
?>
