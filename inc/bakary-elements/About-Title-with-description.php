<?php
/*=====================================================
This short Code Will work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/

function wiselearn_about_desc_short($atts){
  $atts = shortcode_atts(array(
    'about_title'=>'',
    'about_desc'=>'',
  ), $atts);
  extract($atts);
  ob_start();
  ?>
       <div class="campus-desc">
            <h2><?php echo esc_html($about_title,'wiselearn');?></h2>
            <p><?php echo esc_html($about_desc,'wiselearn');?></p>
          </div>                                                          
<?php
  return ob_get_clean();
}


add_shortcode('about_desc_shortcode','wiselearn_about_desc_short');
add_action('vc_before_init','about_desc_func');
if(!function_exists('about_desc_func')):
function about_desc_func() {
  if(function_exists('vc_map')):
 vc_map( array(
  "name" => __( "About", "wiselearn" ),
  "base" => "about_desc_shortcode",
  "class" => "",
  "category" => __( "Wiselearn", "wiselearn"),
  "icon" =>"dashicons dashicons-admin-customizer",
  "params" => array(
              array(
                "type" => "textfield",
                "heading" => __( "Title", "wiselearn" ),
                "param_name" => "about_title",
                "description" => __( "About Us ", "wiselearn" ),
               ),
               array(
                "type"=> 'textarea',
               'param_name'=>'about_desc',
               "heading"=> esc_html__('Description About Your Site or You','wiselearn'),
       )
      )
)
);
    endif;
  }
endif;
?>
