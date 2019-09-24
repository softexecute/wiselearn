<?php  
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_section_slider_v3( $atts ) {
 extract( shortcode_atts( array(
 'wiselearn_slider_v3_group'=>' ',
 ), $atts ) );
ob_start();
?>

 <div class="slider home-v3">
	<div class="all-slide owl-item">	
<?php
$slides_v3 = vc_param_group_parse_atts( $atts["wiselearn_slider_v3_group"] );
  foreach ((array)$slides_v3 as $key3) {
    $image = wp_get_attachment_url( $key3['slide_image'] );
    $link = vc_build_link($key3['extra_link']);

?>
			<!-- Slider Single Item Start -->
			<div class="single-slide" style="background-image:url(<?php echo esc_url($image);?>);">
				<div class="slider-overlay"></div>
				<div class="slider-wrapper">
					<div class="slider-text">
						<div class="slider-caption">
							<h1>your future begins here</h1>	
							<p><?php echo esc_html__($key3['slide_description'],'wiselearn')?></p>
							<ul>
								<li><a target="<?php echo esc_attr($link['target'])?>" href="<?php echo esc_url($link['url'])?>"><?php echo esc_html__($link['title'],'wiselearn')?></a></li>					
							</ul>							
						</div>	
					</div>
				</div>				
			</div>
			<!-- Slider Single Item End -->

<?php
}
?>

	</div>
</div>
<?php

    return ob_get_clean();
}






add_shortcode('wiselearn_slider_v3','wiselearn_section_slider_v3');
add_action('vc_before_init', 'wiselearn_slide_v3' );
if(!function_exists('wiselearn_slide_v3')):
function wiselearn_slide_v3(){
	if(function_exists('vc_map')):
		vc_map( array(
          "name" 		=> __( "Slider Version 3", "wiselearn" ),
          "base" 		=> "wiselearn_slider_v3",
          "class" 		=> "",
          "category" 	=> __( "Wiselearn", "wiselearn"),
          "icon" 		=>"dashicons dashicons-slides",
          "params" 		=> array(
          array(
            'type'      	=> 'param_group',
            'heading'   	=> __('Slider', 'wiselearn'),
            'param_name'  	=> 'wiselearn_slider_v3_group',
            'description' 	=> __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'wiselearn' ),
			'params' => array(
						array(
							'param_name' => 'slide_title',
							'heading' => esc_html__('Slider Title','wiselearn'),
							'type' => 'textfield',
						),
						array(
							'param_name' => 'slide_description',
							'heading' => esc_attr__('Description about slide','wiselearn'),
							'type' => 'textarea',
						),
						array(
							'param_name' => 'slide_image',
							'heading' => esc_html__('Slider Image','wiselearn'),
							'type' => 'attach_image',
						),
						array(
							'param_name' => 'extra_link',
							'heading' => esc_html__('Button','wiselearn'),
							'type' => 'vc_link',
						),
					),
				)
          )
      ));

    endif;
  }
endif;
?>