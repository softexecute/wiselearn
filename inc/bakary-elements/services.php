<?php

/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/

function wiselearn_service_short($atts,$content){
  $wiselearn_shortcode_atts = shortcode_atts(array(
    'service_img'=>'',
    'service_title'=>'',
    'service_description'=>'',
    'page_link'=>'',

  ),$atts);
  extract($wiselearn_shortcode_atts);
  ob_start();
  ?>
  <!-- Output Start -->

<?php
  $link=vc_build_link($page_link);
  $image=wp_get_attachment_url( $service_img );
  ?>
  <div class="service-inner">
						<div class="service-icon">
							<img src="<?php echo esc_url( $image)?>" alt="/">
						</div>
			<h3><a target="<?php echo esc_attr($link['target'],'wiselearn')?>" 
      href="<?php echo esc_url($link['url'],'wiselearn')?>"><?php echo esc_html__($service_title,'wiselearn');?></a></h3>
						<p><?php echo esc_html__($service_description,'wiselearn');?> </p>
					</div>

<?php
  return ob_get_clean();
}



add_shortcode('service_shortcode','wiselearn_service_short');
add_action('vc_before_init','service_func_vc');
if(!function_exists('service_func_vc')):
  function service_func_vc(){
    if(function_exists('vc_map')):
         vc_map( array(
          "name" => __( "Sevices", "wiselearn" ),
          "base" => "service_shortcode",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon" =>"dashicons dashicons-admin-tools",
          "params" => array(
              array(
                'param_name'=>'service_img',
                'label'=> esc_html__('Add a Image','wiselearn'),
                'type'=> 'attach_image',
              ),
              array(
                'param_name'=>'service_title',
                'label'=> esc_html__('Title','wiselearn'),
                'type'=> 'textfield',
              ),
              array(
                'param_name'=>'service_description',
                'label'=> esc_html__('Description','wiselearn'),
                'type'=> 'textarea',
              ),
              array(
                'param_name'=>'page_link',
                'label'=>esc_html__('Page Link','wiselearn'),
                'type'=>'vc_link',
              ),

            )

       
      ));

    endif;
  }
endif;
?>
