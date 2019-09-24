<?php

/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/

function course_promo_function($atts,$content){
  $atts = shortcode_atts(array(
    'course_img'=>'',
    'course_promo_title'=>'',
    'course_promo_description'=>'',
    'course_promo_link'=>'',

  ),$atts);
  extract($atts);
  ob_start();
  ?>
  <!-- Output Start -->

<?php
  $link=vc_build_link($course_promo_link);
  $image=wp_get_attachment_url( $course_img );
  ?>
  <div class="course-promo-inner">
						<div class="course-promo-thumb">
							<img src="<?php echo esc_url($image);?>" alt="/">
						</div>
						<div class="course-promo-desc">
							<h4><a target="<?php echo esc_attr($link['target'])?>" href="<?php echo esc_url($link['url'])?>"><?php echo esc_html__($course_promo_title,'wiselearn');?></a></h4>
							<p><?php echo esc_html__($course_promo_description,'wiselearn');?></p>
						</div>
					</div>

<?php
  return ob_get_clean();
}
add_shortcode('course_promo_shortcode','course_promo_function');
add_action('vc_before_init','course_promo_vc_function');
if(!function_exists('course_promo_vc_function')):
  function course_promo_vc_function(){
    if(function_exists('vc_map')):
      vc_map(array(
         "name" => __( "Course Promo", "wiselearn" ),
          "base" => "course_promo_shortcode",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon" =>"dashicons dashicons-camera",
          "params" => array(
       
              array(
                'param_name'=>'course_img',
                'heading'=> esc_html__('Add a Image','wiselearn'),
                'type'=> 'attach_image',
              ),
              array(
                'param_name'=>'course_promo_title',
                'heading'=> esc_html__('Title','wiselearn'),
                'type'=> 'textfield',
              ),
              array(
                'param_name'=>'course_promo_description',
                'heading'=> esc_html__('Description','wiselearn'),
                'type'=> 'textfield',
              ),

              array(
                'param_name'=>'course_promo_link',
                'heading'=> esc_html__('course','wiselearn'),
                'type'=> 'vc_link',
              ),



            )
      ));

    endif;
  }
endif;
?>
