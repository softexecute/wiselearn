<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function testimonial_el( $atts ) {
 extract( shortcode_atts( array(
 'testimonials'=>' ',
 ), $atts ) );
ob_start();
?>


<div class="testimonial-page pt-100 pb-70">
  <div class="all-testimonial">

 <?php
 $testimonial = vc_param_group_parse_atts( $atts["testimonials"] );
  foreach ((array)$testimonial as $key) {
    $img = wp_get_attachment_image_url( $key['client_image'] );
  ?>
     <div class="single-testimonial">          
              <div class="client-comment">
                <div class="client-thumb">
                  <img src="<?php echo esc_url($img)?>" alt="">
                </div>                          
                <p><?php echo esc_html__($key['description'],'wiselearn')?> </p> 
                <div class="client-info">
                  <h2><?php echo esc_html__($key['client_name'],'wiselearn')?></h2>
                  <h3><?php echo esc_html__($key['degree_name'],'wiselearn')?></h3>                 
                </div>
              </div>                          
            </div>
  <?php
 }?>
   

<?php
 return ob_get_clean();
}

//kc_function
add_shortcode( 'testimonial_section', 'testimonial_el' );
	add_action('vc_before_init','wiselearn_testimonial_func');
  if (!function_exists('wiselearn_testimonial_func')) :
	function wiselearn_testimonial_func(){
    if(function_exists('vc_map')):
		vc_map( array(
          "name" => __( "Testimonial", "wiselearn" ),
          "base" => "testimonial_section",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon" =>"dashicons dashicons-testimonial",
          "params" => array(
              array(
                'type'      => 'param_group',
                'heading'   => __('Testimonial', 'wiselearn'),
                'param_name'  => 'testimonials',
                'description' => __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'wiselearn' ),

                'params' => array(
                  array(
                    'param_name' => 'client_name',
                    'heading' => esc_html__('Name whose for testimonilal','wiselearn'),
                    'type' => 'textfield',
                  ), 
                   array(
                    'param_name' => 'degree_name',
                    'heading' => esc_html__('Degree Name','wiselearn'),
                    'type' => 'textfield',
                  ),
                  array(
                    'param_name' => 'description',
                    'heading' => esc_attr__('Testimonial Description','wiselearn'),
                    'type' => 'textarea',
                  ),
                  array(
                    'param_name' => 'client_image',
                    'heading' => esc_html__('Client Image','wiselearn'),
                    'type' => 'attach_image',
                  ),
              


            ),
        )
      )
    )
  );
    endif;
  }
endif;
?>
