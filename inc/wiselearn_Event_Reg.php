<?php

/*=====================================================
-------Don't Change Here Slug and Taxonomy-----------
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
add_action( 'init', 'create_post_event' );
function create_post_event() {
	register_post_type( 'event',
		  array(
  			   'labels'       => array(
  				'name'               => _x( 'Events', 'post type general name', 'wiselearn' ),
				'singular_name'      => _x( 'Event', 'post type singular name', 'wiselearn' ),
				'menu_name'          => _x( 'Event', 'admin menu', 'wiselearn' ),
				'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'wiselearn' ),
				'add_new'            => _x( 'Add New Event', 'wiselearn' ),
				'add_new_item'       => __( 'Add New Event', 'wiselearn' ),
				'new_item'           => __( 'New Event', 'wiselearn' ),
				'edit_item'          => __( 'Edit Event', 'wiselearn' ),
				'view_item'          => __( 'View Item', 'wiselearn' ),
				'all_items'          => __( 'All Event', 'wiselearn' ),
				'search_items'       => __( 'Search Event', 'wiselearn' ),
				'parent_item_colon'  => __( 'Parent Event:', 'wiselearn' ),
				'not_found'          => __( 'No Event found.', 'wiselearn' ),
				'not_found_in_trash' => __( 'No Event found in Trash.', 'wiselearn' ),
	),

    			 'public'       => true,
    			 'has_archive'  => true,
    			 'hierarchical' => true,
           		'show_ui'            => true,
		          'show_admin_column' => true,
		          'show_in_nav_menus'   => true,
		          'show_in_admin_bar'   => true,
		           'show_in_menu'       => true,
    			'menu_icon'    => 'dashicons-editor-justify',
    			
    			 'supports'     => array(
                    				'title',
                    				'editor',
				                // 'excerpt',
				                  'thumbnail',
			                             ), 
			

		)

	);
}





add_action( 'init', 'Event_taxonomies', 0 );

// create two taxonomies, Tags and Categories for the post type "book"
function Event_taxonomies() {

  // Add new taxonomy, NOT hierarchical (like Category)
  $labels = array(
    'name'                       => _x( 'Event Categories', 'taxonomy general name', 'wiselearn' ),
    'singular_name'              => _x( 'Events Category', 'taxonomy singular name', 'wiselearn' ),
    'search_items'               => __( 'Search Categories', 'wiselearn' ),
    'popular_items'              => __( 'Popular Categories', 'wiselearn' ),
    'all_items'                  => __( 'All Categories', 'wiselearn' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Category', 'wiselearn' ),
    'update_item'                => __( 'Update Category', 'wiselearn' ),
    'add_new_item'               => __( 'Add New Category', 'wiselearn' ),
    'new_item_name'              => __( 'New Category Name', 'wiselearn' ),
    'separate_items_with_commas' => __( 'Separate Categories with commas', 'wiselearn' ),
    'add_or_remove_items'        => __( 'Add or remove Categories', 'wiselearn' ),
    'choose_from_most_used'      => __( 'Choose from the most used Categories', 'wiselearn' ),
    'not_found'                  => __( 'No Categories found.', 'wiselearn' ),
    'menu_name'                  => __( 'Categories', 'wiselearn' ),
  );

  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'event_category' ),
  );

  register_taxonomy( 'Event_category', 'event', $args );
}















function add_event_fields_meta_box() {
	add_meta_box(
		'event_fields_meta_box', // $id
		'Event Details', // $title
		'show_event_fields_meta_box', // $callback
		'event', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_event_fields_meta_box' );
function show_event_fields_meta_box() {
    global $post;  
    
		$meta = get_post_meta( $post->ID, 'event_fields', true ); ?>

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  
<table border="0" width="100%" bgcolor="#c3faf4" cellpadding="10">
  <tr>
    <td><label for="event_fields[timeing]">Timing: </label></td>
    <td> <input type="text" name="event_fields[timeing]" id="event_fields[timeing]" class=" regular-text" value="<?php if (is_array($meta) && isset($meta['timeing'])) {
    	echo $meta['timeing']; } ?>"></td>
   </tr>
    <tr>
    <td><label for="event_fields[event_date]">Event Date: </label></td>
    <td> <input type="text" name="event_fields[event_date]" id="event_fields[event_date]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['event_date'])) {
    	echo $meta['event_date']; } ?>"></td>
   </tr>
   <tr>
    <td><label for="event_fields[participants]">Participants: </label></td>
    <td> <input type="text" name="event_fields[participants]" id="event_fields[participants]" class=" regular-text" value="<?php if (is_array($meta) && isset($meta['participants'])) {
    	echo $meta['participants']; } ?>"></td>
   </tr>
   <tr>
    <td><label for="event_fields[entryfees]">Entry Fees : </label></td>
    <td> <input type="text" name="event_fields[entryfees]" id="event_fields[entryfees]" class=" regular-text" value="<?php if (is_array($meta) && isset($meta['entryfees'])) {
    	echo $meta['entryfees']; } ?>"></td>
   </tr>   
   <tr>
    <td><label for="event_fields[location]">Location : </label></td>
    <td> <input type="text" name="event_fields[location]" id="event_fields[location]" class=" regular-text" value="<?php if (is_array($meta) && isset($meta['location'])) {
    	echo $meta['location']; } ?>"></td>
   </tr>



</table>




  <?php }



function save_event_fields_meta( $post_id ) {   
	// verify nonce
	if ( isset($_POST['your_meta_box_nonce']) 
			&& !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
			return $post_id; 
		}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if (isset($_POST['post_type'])) { //Fix 2
        if ( 'page' === $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }  
        }
    }

	
	$old = get_post_meta( $post_id, 'event_fields', true );
		if (isset($_POST['event_fields'])) { //Fix 3
			$new = $_POST['event_fields'];
			if ( $new && $new !== $old ) {
				update_post_meta( $post_id, 'event_fields', $new );
			} elseif ( '' === $new && $old ) {
				delete_post_meta( $post_id, 'event_fields', $old );
			}
		}

}
add_action( 'save_post', 'save_event_fields_meta' );