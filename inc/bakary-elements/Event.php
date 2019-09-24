<?php 
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function event_section( $atts ) {
  extract( shortcode_atts( 
  array(
   'number'=>'', 
 ),  $atts ) ); 

ob_start();?> 

<div class="event-page pt-100 pb-70"> 
<?php
        $event = new WP_Query(array( 
          'post_type'=>'event',
          'post_status' => 'publish',
          'posts_per_page' => $number,
          'order' => 'DESC',
          )); 
          
 if ($event->have_posts()) {
while($event->have_posts()):$event->the_post(); ?> 
  <div class="single-event-inner"> 
    <div class="col-md-12"> 
    <div class="row"> 
    <div class="col-md-5"> 
      <div class="single-event-img"> <?php the_post_thumbnail(array(460,315) );
?>

      </div> 
    </div> 
    <div class="col-md-7"> 
 <div class="single-event-desc"> 
  <h3><a href="<?php echo esc_url(the_permalink());?>"> <?php echo esc_html__(the_title(),'wiselearn'); ?> </a></h3> 
  <ul> 
    <?php
   $event_meta=get_post_meta( get_the_ID(),'event_fields', true ); 
   if(!empty($event_meta['timeing'])){ ?> 
    <li> <a href="<?php echo esc_url(get_the_permalink());?>"> 
    <i class="fa fa-clock-o" aria-hidden="true"></i> 
    <?php echo esc_html__( $event_meta['timeing'],'wiselearn' ); ?> </a> 
  </li> 

  <?php } 
 
 if(!empty($event_meta['location'])){ ?> 
    <li> <a href="<?php echo esc_url(get_the_permalink());?>"> 
      <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html__( $event_meta['location'],'wiselearn' ); ?> </a> 
    </li> 

  <?php } 

   if(!empty($event_meta['event_date'])){ ?> 
        <li> <a href="<?php echo esc_url(get_the_permalink($post->ID));?>"> 
          <i class="fa fa-calendar-check-o" aria-hidden="true"></i> 
          <?php echo esc_html__( $event_meta['event_date'],'wiselearn' ); ?> </a> 
        </li> 
        <?php } ?> 
      </ul> 
          <p>  
               <?php echo esc_html__(the_content(),'wiselearn');?>   
          </p> 
</div> 
</div> 
</div> 
</div> 
</div> 
<?php 
endwhile; } ?>


    </div> 
    <?php 
    return ob_get_clean(); 
  }

//kc_function 
 add_shortcode( 'event-section', 'event_section' ); 
add_action('vc_before_init','wiselearn_event_func');
if(!function_exists('wiselearn_event_func')):
	function wiselearn_event_func(){
    if(function_exists('vc_map')):
      vc_map( array(
        "name" => __( "Event", "wiselearn" ),
        "base" => "event-section",
        "class" => "",
        "category" => __( "Wiselearn", "wiselearn"),
        "icon" =>"dashicons dashicons-calendar",
        "params" => array(
                    array( 
                "param_name" => "post_count", 
                "heading" => esc_html__("Number of Event","wiselearn" ), 
               'description'=>esc_html__( 'How many Event Do you want to show at a time? [-1 is value to show infinite image]', "wiselearn" ), 
                "default" => "-1", 
                "type" =>  "textfield", 
              ), 
            )

						) 
  ) ;
    endif;
  }
endif;