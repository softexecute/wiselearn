<?php

/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/

function button_promo_vc_function($atts,$content){
  $atts = shortcode_atts(array(
    'button_promo_title'=>'',
    'button_promo_description'=>'',
    'button_promo_link'=>'',

  ),$atts);
  extract($atts);
  ob_start();
  ?>
  <!-- Output Start -->

<?php
  $link=vc_build_link($button_promo_link);
  ?>
  <div class="course-promo-inner">
  						<h2><?php echo esc_html__($button_promo_title,'wiselearn');?></h2>
  						<p><?php echo esc_html__($button_promo_description,'wiselearn');?> </p>
  						<a target="<?php echo esc_attr($link['target'])?>" href="<?php echo esc_url($link['url'])?>" class="simple-btn"><?php echo esc_html__($link['title'],'wiselearn');?></a>
  		</div>

<?php
  return ob_get_clean();
}



add_shortcode('button_promo_shortcode','button_promo_vc_function');
add_action('vc_before_init','promo_button_function');
if(!function_exists('promo_button_function')):
  function promo_button_function(){
    if(function_exists('vc_map')):
      vc_map(array(
        "name" => __( "Button Promo", "wiselearn" ),
          "base" => "button_promo_shortcode",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon" =>"dashicons dashicons-camera",
          "params" => array(
              array(
                'param_name'=>'button_promo_title',
                'heading'=> esc_html__('Title','wiselearn'),
                'type'=> 'textfield',
              ),
              array(
                'param_name'=>'button_promo_description',
                'heading'=> esc_html__('Description','wiselearn'),
                'type'=> 'textarea',
              ),

              array(
                'param_name'=>'button_promo_link',
                'heading'=> esc_html__('Button Link','wiselearn'),
                'type'=> 'vc_link',
              ),



            )
      ));

    endif;
  }
endif;

?>
