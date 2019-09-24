<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_sec_title($atts,$content){
	$atts = shortcode_atts(array(
		  'section_title'=>'',
		  'title_color'=>'',
		  'section_desc'=>'',
		  'description_color'=>'',
		  'text_align'=>'',

	),$atts);
   extract($atts);
  ob_start();
   ?>
	 	<!-- Output Start -->
	<div class="sec-title">
<h2><?php echo esc_html__($section_title,'wiselearn');?></h2>
<p> <?php echo esc_html__($section_desc,'wiselearn');?></p>
</div>

<?php
return ob_get_clean();
}
	

// shortcode sterted
add_shortcode('section_title_shortcode','wiselearn_sec_title');
add_action('vc_before_init','wiselearn_section_title');
if(!function_exists('wiselearn_section_title')):
function wiselearn_section_title(){
	if(function_exists('vc_map')):
         vc_map( array(
          "name" => __( "Section Title", "wiselearn" ),
          "base" => "section_title_shortcode",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon" =>"dashicons dashicons-editor-paste-text",
          "params" => array(
						
			array(
				'param_name'=>'section_title',
				'heading'=> esc_html__('Title','wiselearn'),
				'type'=> 'textfield',
			),

			array(
				'param_name'=>'section_desc',
				'heading'=> esc_html__('Description','wiselearn'),
				'type'=> 'textarea',
			),
		),
		
							
	) 

				
			);
    endif;
  }
endif;

?>
