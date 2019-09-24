<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_faq_short($atts){
  $atts = shortcode_atts(array(
    'faq_grp'=>'',

  ),$atts);
  extract($atts);
  ob_start();


?>
    <div class="faq-single">
      <div class="media">
        <div class="media-left">
          <?php 
$faqs = vc_param_group_parse_atts( $atts["faq_grp"] );
foreach ((array)$faqs as $key) {
  ?>
          <div class="icon">
            <i class="<?php echo esc_attr($key['faq_icon']);?>"></i>
          </div>
        </div>
        <div class="media-body">

  <h2><?php echo esc_html($key['faq_title'],'wiselearn');?></h2>
   <p><?php echo esc_html($key['faq_desc'],'wiselearn');?> </p>
  <?php
  # code...
}?>
          
         
        </div>
      </div>
    </div>
<?php 

  return ob_get_clean();
}

add_shortcode('faq_shortcode','wiselearn_faq_short');
add_action('vc_before_init','faq_func_kc');
if(!function_exists('faq_func_kc')):
  function faq_func_kc(){
    if(function_exists('vc_map')):
         vc_map( array(
          "name" => __( "FAQ", "wiselearn" ),
          "base" => "faq_shortcode",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon" =>"dashicons dashicons-universal-access-alt",
          "params" => array(
                         array(
                        'type'      => 'param_group',
                        'heading'     => __('FAQ Answer', 'wiselearn'),
                        'param_name'      => 'faq_grp',
                        'description' => __( 'Repeat this fields with each item created, Each item corresponding faq element.', 'wiselearn' ),

                'params' => array(
                            array(
                              'param_name'=>'faq_icon',
                              'heading'=> esc_html__(' Select a Icon','wiselearn'),
                              'type'=> 'iconpicker',
                            ),
                            array(
                              'param_name'=>'faq_title',
                              'heading'=> esc_html__('Question','wiselearn'),
                              'type'=> 'textfield',
                            ),

                            array(
                              'param_name'=>'faq_desc',
                              'heading'=> esc_html__('Answer','wiselearn'),
                              'type'=> 'textarea',
                            ),
                )
              )


            )
          )
        );

    endif;
  }
endif;


?>
