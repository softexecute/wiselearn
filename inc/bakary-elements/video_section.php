<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_video_sec_func($atts){
$atts=shortcode_atts(array(
				
				'video_link'=>' ',

),$atts);
extract($atts);
ob_start();
	$video_link_path=vc_build_link($video_link);
?>


				<div class="video-inner">
						<div class="vedio-button">
							<a target="<?php echo esc_attr( $video_link_path['target'],'wiselearn' )?>" href="<?php echo esc_url($video_link_path['url'],'wiselearn' )?>" class="mfp-iframe vedio-play"><i class="fa fa-play"></i></a>
						</div>	
						<h4><?php echo esc_html( $video_link_path['title'],'wiselearn' )?></h4>
					</div>


<?php
return ob_get_clean();
}
add_shortcode('video_section','wiselearn_video_sec_func');
add_action('vc_before_init','wiselearn_video_section');
if (!function_exists('wiselearn_video_section')):
function wiselearn_video_section() {
	if(function_exists('vc_map')):
 vc_map( array(
  "name" => __( "Video", "wiselearn" ),
  "base" => "video_section",
  "class" => "",
  "category" => __( "Wiselearn", "wiselearn"),
  "icon" =>"dashicons dashicons-format-video",
  "params" => array(
                array(
				'param_name'=>'video_link',
				'heading'=> esc_html__('Video Link','wiselearn'),
				'type'=> 'vc_link',							
				)
       )
      )
);
    endif;
  }
endif;