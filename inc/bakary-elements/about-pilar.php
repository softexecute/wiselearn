<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_about_piller_short($atts){
  $atts = shortcode_atts(array(
    'about_piller_img'=>'',
    'about_piller_title'=>'',
    'about_piller_description'=>'',

  ),$atts);
  extract($atts);
  ob_start();
  ?>
  <!-- Output Start -->

<?php
  $image=wp_get_attachment_url( $about_piller_img );
  ?>
  <div class="about-pillar-inner">
						<div class="about-pillar-thumb">
							<img src="<?php echo esc_url($image)?>" alt="/">
						</div>
						<div class="about-pillar-desc">
							<h4><?php echo esc_html($about_piller_title,'wiselearn');?> </h4>
							<p><?php echo esc_html($about_piller_description,'wiselearn');?></p>
						</div>
			</div>

<?php
  return ob_get_clean();
}


add_shortcode('about_piller_shortcode','wiselearn_about_piller_short');
add_action('vc_before_init','about_piller_func');
if(!function_exists('about_piller_func')):
  function about_piller_func(){
    if(function_exists('vc_map')):
      vc_map( array(
          "name" => __( "Pillar", "wiselearn" ),
          "base" => "about_piller_shortcode",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon" =>"dashicons dashicons-media-text",
          "params" => array(
              array(
                'param_name'=>'about_piller_img',
                'heading'=> esc_html__('Add a Image','wiselearn'),
                'type'=> 'attach_image',
              ),
              array(
                'param_name'=>'about_piller_title',
                'heading'=> esc_html__('Title','wiselearn'),
                'type'=> 'textfield',
              ),
              array(
                'param_name'=>'about_piller_description',
                'heading'=> esc_html__('Description','wiselearn'),
                'type'=> 'textarea',
              ),


            )

          )
        );
     endif;
  }
endif;
?>