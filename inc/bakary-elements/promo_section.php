<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_promo_short($atts){
  $wiselearn_shortcode_atts = shortcode_atts(array(
    'promo_img'=>'',
    'promo_icon'=>'',
    'promo_page_link'=>'',

  ),$atts);
  extract($wiselearn_shortcode_atts);
  ob_start();
  ?>
  <!-- Output Start -->

<?php
  $link=vc_build_link($promo_page_link);
  $image=wp_get_attachment_url( $promo_img );
  ?>

    <div class="promo-inner">
      <img src="<?php echo esc_url( $image)?>" alt="">
      <div class="promo-text-inner">
        <div class="promo-text">
          <i class="<?php echo esc_attr( $promo_icon )?>"></i>
          <h3><?php echo esc_html__($link['title'],'wiselearn');?></h3>
        </div>
      </div>
      <div class="promo-title">
        <h3><a target="<?php echo esc_attr($link['target'])?>" href="<?php echo esc_url($link['url'])?>"><?php echo esc_html__($link['title'],'wiselearn');?></a></h3>
      </div>
    </div>

<?php
  return ob_get_clean();
}



add_shortcode('promo_shortcode','wiselearn_promo_short');
add_action('vc_before_init','promo_func_vc');
if(!function_exists('promo_func_vc')):
  function promo_func_vc(){
    if(function_exists('vc_map')):
     vc_map( array(
        "name" => __( "Promo", "wiselearn" ),
        "base" => "promo_shortcode",
        "class" => "",
        "category" => __( "Wiselearn", "wiselearn"),
        "icon" =>"dashicons dashicons-excerpt-view",
        "params" => array(
              //sterted field type
              array(
                'param_name'=>'promo_img',
                'heading'=> esc_html__('Add a Image','wiselearn'),
                'type'=> 'attach_image',
              ),
              array(
                'param_name'=>'promo_icon',
                'heading'=> esc_html__('Icon','wiselearn'),
                'type'=> 'iconpicker',
              ),
              array(
                'param_name'=>'promo_page_link',
                'heading'=> esc_html__('Page Link','wiselearn'),
                'type'=> 'vc_link',
              ),



            

          )
        
      ));

    endif;
  }
endif;

// shortcode sterted



?>
