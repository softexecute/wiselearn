			
<?php

/*=====================================================================
-------------Event Typw post show in archive or home page---------------
========================================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
$meta = get_post_meta( $post->ID, 'event_fields', true );?>
<?php if ( is_home() ||	is_front_page() || is_archive() ) {?>
   
  <div class="single-event-inner"> 
    <div class="col-md-12"> 
    <div class="row"> 
    <div class="col-md-5"> 
    <div class="single-event-img"> <?php the_post_thumbnail(array(460,315) );?>

     </div> 
    </div> 
    <div class="col-md-7"> 
 <div class="single-event-desc"> 
  <h3><a href="<?php echo esc_url(the_permalink());?>"> <?php echo esc_html__(the_title(),'wiselearn'); ?> </a></h3> 
  <ul> 
    <?php
   $meta=get_post_meta( get_the_ID(),'event_fields', true ); 
   if(!empty($meta['timeing'])){ ?> 
    <li> <a href="<?php echo esc_url(get_the_permalink());?>"> 
    <i class="fa fa-clock-o" aria-hidden="true"></i> 
    <?php echo esc_html__( $meta['timeing'],'wiselearn' ); ?> </a> 
  </li> 

  <?php } 
 
 if(!empty($meta['location'])){ ?> 
    <li> <a href="<?php echo esc_url(get_the_permalink());?>"> 
      <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html__( $meta['location'],'wiselearn' ); ?> </a> 
    </li> 

  <?php } 

   if(!empty($meta['event_date'])){ ?> 
        <li> <a href="<?php echo esc_url(get_the_permalink($post->ID));?>"> 
          <i class="fa fa-calendar-check-o" aria-hidden="true"></i> 
          <?php echo esc_html__( $meta['event_date'],'wiselearn' ); ?> </a> 
        </li> 
        <?php } ?> 
      </ul> 
        <p>  
             	<?php
				echo wp_trim_words(get_the_content(),70,'<a href="'. esc_url( get_permalink() ) . '   ">...Continue Reading</a>');
				?> 
        </p> 
</div> 
</div> 
</div> 
</div> 
</div> 
<?php
}
/*=====================================================================
-------------Event Typw post show in single page---------------
========================================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
else{?>

	<div class="event-details">
						<div class="single-event-img">
							<?php wiselearn_post_thumbnail(); ?>
						</div>	
				<div class="post-meta">
					<ul>
						<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>8<?php echo $meta['timeing'];?></a></li>
						<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $meta['location'];?></a></li>
						<li><a href="#"><i class="fa fa-calendar-check-o" aria-hidden="true"></i><?php echo $meta['event_date'];?></a></li>
					</ul>						
				</div>
						<div class="single-event-desc">
			<?php
		esc_html__(the_title( '<h3><a href="' . esc_url( get_permalink() ).'" rel="bookmark">', '</a></h3>'),'wiselearn');?>						
							<p><?php
								esc_html__(the_content(),'wiselearn');
							?> </p>
						</div>					
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="event-location">
								<h4><?php echo esc_html__('Timings');?></h4>
								<span><?php echo $meta['timeing'];?></span>
							</div>
						</div>				
						<div class="col-md-6">
							<div class="event-location">
								<h4><?php echo esc_html__('Category');?></h4>
								<span><?php 
								$cats = get_the_terms($post->ID, 'Event_category'); 
								foreach ($cats as $cat) {
									echo $cat->name.', ';
								}
						?></span>
							</div>
						</div>				
						<div class="col-md-6">
							<div class="event-location">
								<h4><?php echo esc_html__('Participants');?></h4>
								<span><?php echo $meta['participants'];?></span>
								
							</div>
						</div>			
						<div class="col-md-6">
							<div class="event-location">
								<h4><?php echo esc_html__("Entry Fees");?></h4>
								<span><?php echo $meta['entryfees'];?>*</span>
								
							</div>
						</div>
					</div>
			
<?php
}
?>