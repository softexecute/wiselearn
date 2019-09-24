<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_index_2_promo_short($atts,$content){
  $wiselearn_shortcode_atts = shortcode_atts(array(
    'promo_title_second'=>'',
    'promo_description'=>'',
    'promo_link'=>'',

  ),$atts);
  extract($wiselearn_shortcode_atts);
  ob_start();
  ?>
  <!-- Output Start -->

<?php
  $link=vc_build_link($promo_link);
  $image=wp_get_attachment_url( $index_2_promo_img );
  ?>

  <div class="row pt-50">
				<div class="col-md-4">
					<div class="promo-sec-title">
						<h1><?php echo esc_html($promo_title_second,'wiselearn');?></h1>
					</div>
				</div>
				<div class="col-md-8">
					<div class="promo-desc">
						<p class="news"><?php echo esc_html__($promo_description,'wiselearn');?><br>
						<a target="<?php echo esc_attr($link['target'])?>" href="<?php echo esc_url($link['url'])?>" class="gray-btn"><?php echo esc_html__($link['title'],'wiselearn');?></a></p></div>
				</div>
			</div>


<?php
  return ob_get_clean();
}
add_shortcode('promo_second_shortcode','wiselearn_index_2_promo_short');
add_action('vc_before_init','promo_vc_section_function');
if(!function_exists('promo_vc_section_function')):

  function promo_vc_section_function(){
    if(function_exists('vc_map')):
      vc_map(array(
          "name" => __( "Promo With Columns", "wiselearn" ),
          "base" => "promo_second_shortcode",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon'=>'dashicons dashicons-video-alt",
          "params" => array(
         
              array(
                'param_name'=>'promo_title_second',
                'heading'=> esc_html__('Title','wiselearn'),
                'description'=>'Title will shown in first column',
                'type'=> 'textfield',
              ),
              array(
                'param_name'=>'promo_description',
                'heading'=> esc_html__('Description','wiselearn'),
                'description'=>'3/3 Columns Text will be here',
                'type'=> 'textarea',
              ),
              array(
                'param_name'=>'promo_link',
                'heading'=> esc_html__('Button','wiselearn'),
                'description'=>'3/3 External Button with link',
                'type'=> 'vc_link',
              ),

            )

      ));

    endif;
  }
endif;

?>
