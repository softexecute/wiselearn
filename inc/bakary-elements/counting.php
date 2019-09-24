<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_counting_short($atts,$content){
  $wiselearn_shortcode_atts = shortcode_atts(array(
    'counting_icon'=>'',
    'counting_number'=>'',
    'counting_title'=>'',
  ),$atts);
  extract($wiselearn_shortcode_atts);
  ob_start();
  ?>
  <!-- Output Start -->

  <div class="counting_sl">
    <div class="countup-text">
      <div class="counter-icon">
        <i class="<?php echo esc_attr($counting_icon)?>"></i>
      </div>
      <h2 class="counter"><?php echo esc_html($counting_number,'wiselearn');?></h2>
      <h4><?php echo esc_html($counting_title,'wiselearn');?></h4>
    </div>
  </div>
<?php
  return ob_get_clean();
}
add_shortcode('counting_shortcode','wiselearn_counting_short');
add_action('vc_before_init','counting_func_kc');
if(!function_exists('')):
  function counting_func_kc(){
    if(function_exists('vc_map')):
           vc_map( array(
            "name" => __( "Counting", "wiselearn" ),
            "base" => "counting_shortcode",
            "class" => "",
            "category" => __( "Wiselearn", "wiselearn"),
            "icon" =>"fa fa-calculator",
            "params" => array(
              //sterted field type

              array(
                'param_name'=>'counting_icon',
                'heading'=> esc_html__('Select an Icon','wiselearn'),
                'type'=> 'iconpicker',
              ),
              array(
                'param_name'=>'counting_number',
                'heading'=> esc_html__('Number','wiselearn'),
                'type'=> 'textfield',
                "description" => __( "Example: 10 ", "wiselearn" ),
              ),

              array(
                'param_name'=>'counting_title',
                'heading'=> esc_html__('Name','wiselearn'),
                'type'=> 'textfield',
                 "description" => __( "Example: Student, Teacher ", "wiselearn" ),
              ),


            )

          )
        
      );
     endif;
  }
endif;
?>