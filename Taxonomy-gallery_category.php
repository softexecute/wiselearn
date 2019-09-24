<?php
get_header();



$term = get_queried_object();
the_archive_title( '<br><h4 class="page-title"><i class="fa fa-link"></i> ', '</h4>' );
the_archive_description( '<div class="archive-description">', '</div>' );
// Define the query
$args = array(
    'post_type' => 'gallery',
    'gallery_category' => $term->slug,
    'posts_per_page'=> -1,
); 
$w = new WP_Query($args);
?>




<div class="gallery-sec">

  <div class="gallery-area">
    <!-- Gallery container Start -->
    <div class="gallery-container">
		
	<?php
      while($w->have_posts()):$w->the_post();
    ?>
      <!-- Gallery Item Block Start -->
      <div class="col-xs-6 col-sm-6 col-md-6 filtr-item ">
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
		  <div class="col-md-12">
		  </div>
  <!-- Gallery Load More Button Start-->
</div>
</div>



<?php // use reset postdata to restore orginal query
wp_reset_postdata();
get_footer();
?>