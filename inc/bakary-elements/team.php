<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_team($atts,$content){
  $atts = shortcode_atts(array(
    'teacher_title'=>'',
    'teacher_img'=>'',
    'social_grp'=>'',
    'social_link'=>'',
    'social_icon'=>'',

  ),$atts);
  extract($atts);
  ob_start();

  $image= wp_get_attachment_image_url( $teacher_img, $size = 'full', $icon = false );
 
  ?>

<!-- Output Start -->
  <div class="team-member">
						<div class="team-thumb wow slideInUp" data-wow-duration="1000ms" data-wow-delay="330ms">
							<img src="<?php echo esc_url($image)?>" alt="/">
							<div class="team-overlay">
            <ul>
					   <?php  $social_gr = vc_param_group_parse_atts( $atts["social_grp"] );
              foreach ((array)$social_gr as $key) {  
                $iclass = $key['social_icon'];
                $slink = $key['social_link'];
                $video_link_path = vc_build_link($slink);
                ?>
                 <li><a target="<?php echo esc_url($video_link_path['target']);?>" href="<?php echo esc_url($video_link_path['url']);?>"><i class="<?php echo esc_attr($iclass);?>"></i></a></li>
          <?php    }?>
                  
              

          <!--    <ul>
                  <li><a href="#"><i class="icofont-twitter"></i></a></li>
                  <li><a href="#"><i class="icofont-facebook"></i></a></li>
                  <li><a href="#"><i class="icofont-dribbble"></i></a></li>                 
                  <li><a href="#"><i class="icofont-behance"></i></a></li> -->
                </ul>
   
          
							</div>
						</div>
						<h2><?php echo esc_html($teacher_title,'wiselearn');?></h2>
					</div>

<?php
  return ob_get_clean();
}






add_shortcode('team_shortcode','wiselearn_team');
add_action('vc_before_init','wiselearn_team_function');
if(!function_exists('wiselearn_team_function')):
  function wiselearn_team_function(){
    if(function_exists('vc_map')):
    vc_map( array(
       "name" => __( "Team", "wiselearn" ),
        "base" => "team_shortcode",
        "class" => "",
        "category" => __( "Wiselearn", "wiselearn"),
        "icon" =>"dashicons dashicons-buddicons-buddypress-logo",
        "params" => array(
              //sterted field type
              array(
                'param_name'=>'teacher_title',
                'heading'=> esc_html__('Name','wiselearn'),
                'type'=> 'textfield',
              ),
              array(
                'param_name'=>'teacher_img',
                'heading'=> esc_html__('Add a Image','wiselearn'),
                'type'=> 'attach_image',
              ),
              array(
                'type'      => 'param_group',
                'heading'     => __('Social Media Options', 'wiselearn'),
                'param_name'      => 'social_grp',
                'description' => __( 'Repeat this fields with each item created, Each item corresponding teacher element.', 'wiselearn' ),

                        'params' => array(
                          array(
                            'param_name'=>'social_icon',
                            'heading'=> esc_html__('Select Icon','wiselearn'),
                            'type'=> 'iconpicker',
                          ),

                          array(
                            'param_name'=>'social_link',
                            'heading'=> esc_html__('Paste Url','wiselearn'),
                            'type'=> 'vc_link',
                                ),
                            ),
                  ),


            )


        
      ));


    endif;
  }
endif;

?>
