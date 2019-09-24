<?php  
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_section_slider( $atts ) {
 extract( shortcode_atts( array(
 'wiselearn_slider_group'=>' ',
 ), $atts ) );
ob_start();
?>

 <div class="slider">
	<div class="all-slide owl-item">	
<?php
$slides = vc_param_group_parse_atts( $atts["wiselearn_slider_group"] );
  foreach ((array)$slides as $key) {
    $img = wp_get_attachment_url( $key['slide_image'] );
    $link = vc_build_link($key['extra_link']);
?>

<!-- Slider Single Item Start -->
		<div class="single-slide" style="background-image:url(<?php echo esc_url($img);?>);">
				<div class="slider-wrapper">
					<div class="slider-text">
						<div class="slider-caption">
							<span class="slider-sub-title"><?php echo esc_html__($key['slide_title'],'wiselearn')?></span>
							<h1><?php echo esc_html__($key['slide_description'],'wiselearn')?></h1>							
							<ul>
								<li> <a target="<?php echo esc_attr($link['Target'])?>" href="<?php echo esc_url($link['Url'])?>"><?php echo esc_html__($link['title'],'wiselearn')?></a></li>					
							</ul>							
						</div>	
					</div>
				</div>				
			</div>

<?php 
}
?>

	</div>
</div>
<?php

    return ob_get_clean();
}






add_shortcode('wiselearn_slider','wiselearn_section_slider');
add_action('vc_before_init', 'wiselearn_slide' );
if(!function_exists('wiselearn_slide')):
function wiselearn_slide(){
	if(function_exists('vc_map')):
		vc_map( array(
          "name" 		=> __( "Slider", "wiselearn" ),
          "base" 		=> "wiselearn_slider",
          "class" 		=> "",
          "category" 	=> __( "Wiselearn", "wiselearn"),
          "icon" 		=>"dashicons dashicons-slides",
          "params" 		=> array(
          array(
            'type'      	=> 'param_group',
            'heading'   	=> __('Slider', 'wiselearn'),
            'param_name'  	=> 'wiselearn_slider_group',
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