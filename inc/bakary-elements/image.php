<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
	function wiselearn_img_short($atts,$content){
		$wiselearn_shortcode_atts = shortcode_atts(array(
				'image_single'=>'',

		),$atts);
		 extract($wiselearn_shortcode_atts);
		ob_start();

	$image= wp_get_attachment_image_url( $image_single,'full' )
		 ?>
			<!-- Output Start -->

			<div class="about-desc-img">
					<img src="<?php echo esc_url($image)?>" alt="/">
			</div>
	<?php

	return ob_get_clean();
	}
	
	add_shortcode('image_shortcode','wiselearn_img_short');
	add_action('vc_before_init','wiselearn_img_func');
if(!function_exists('wiselearn_img_func')):
	function wiselearn_img_func(){
		if(function_exists('vc_map')):
			 vc_map( array(
          "name" => __( "Image", "wiselearn" ),
          "base" => "image_shortcode",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon" =>"dashicons dashicons-format-image",
          "params" => array(
								//sterted field type
								array(
								'param_name' => 'image_single',
								'heading' => esc_html__('Upload Image','wiselearn'),
								'type' => 'attach_image',
							),
						)

					
			));
    endif;
  }
endif;

	?>
