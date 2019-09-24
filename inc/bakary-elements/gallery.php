<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_gallery_element( $atts ) {
 extract( shortcode_atts( array(
 'post_count'=>' ',

 ), $atts ) 
);
ob_start();
?>



<div class="gallery-sec">

  <div class="gallery-area">
    <!-- Gallery Filter Start -->
    <div class="navbarsort">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarfiltr" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="shorttitle">
        <h3><?php echo esc_html__('Gallery Filter','wiselearn');?></h3>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarfiltr">
      <ul class="simplefilter">
        <li class="active" data-filter="*"><?php echo esc_html__('All','wiselearn');?></li>
     

<?php
 $terms = get_terms('gallery_category', array('hide_empty' => true));
     foreach ( $terms as $term ) {
      echo '<li data-filter=".'.$term->slug.'">'.$term->name.'</li>';             
      }


?>
      </ul>
    </div>
    <!-- Gallery Filter End -->
    <!-- Gallery container Start -->
    <div class="gallery-container">
<?php
      $w=new WP_Query(array(
        'post_type'=>'gallery',
        'posts_per_page'=>$post_count,
      ));

      while($w->have_posts()):$w->the_post();
      $terms=get_the_terms(get_the_id(),'gallery_category');
      $array_term=array();
      foreach ((array)$terms as $term ) {
        $array_term[]=$term->slug;
      }
      $cate_class=join(' ',$array_term);
  ?>
      <!-- Gallery Item Block Start -->
      <div class="col-xs-6 col-sm-6 col-md-6 filtr-item <?php echo $cate_class;?>">
        <div class="gallery-item">
<?php
          the_post_thumbnail();
      ?>
          <div class="gallery-overlay">
            <div class="gallery-overlay-text">
              <span class="gallery-button">
                <a href="<?php the_post_thumbnail_url();?>" class="gallery-photo"><i class="fa fa-file-image-o"></i></a>
              </span>
            </div>
          </div>
        </div>
      </div>
<?php

    endwhile;
    ?>
    <!-- Gallery Item Block End -->
  </div>
  <!-- Gallery container End -->
  <!-- Gallery Load More Button Start-->
<!--   <div class="col-md-12">
    <div class="gallery-load-more-btn">
      <a href="#">Load More</a>
    </div>
  </div> -->
  <!-- Gallery Load More Button Start-->
</div>

</div>
<?php
 return ob_get_clean();
}

//kc_function
  add_shortcode( 'gallery-section', 'wiselearn_gallery_element' );
	add_action('vc_before_init','wiselearn_gallery_func');
  if(!function_exists('wiselearn_gallery_func')):
	function wiselearn_gallery_func(){
    if(function_exists('vc_map')):
		 vc_map( array(
          "name" => __( "Gallery", "wiselearn" ),
          "base" => "gallery-section",
          "class" => "",
          "category" => __( "Wiselearn", "wiselearn"),
          "icon" =>"dashicons dashicons-format-gallery",
          "params" => array(
								//sterted field type
                array(
                  "param_name" => "post_count",
                  "heading" => esc_html__( "Gallery Image Counter", "wiselearn" ),
                  'description'=>esc_html__( 'How many image do you want to show in gallery [-1 is value to show infinite image]', "wiselearn" ),
                  "value" => "-1",
                  "type" => "textfield",
                ),
							)

						)
					
			);


    endif;
  }
endif;

?>
