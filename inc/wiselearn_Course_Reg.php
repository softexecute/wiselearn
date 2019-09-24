<?php
/*=====================================================
-------Don't Change Here Slug and Taxonomy-----------
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
add_action( 'init', 'create_post_course' );
function create_post_course() {
  register_post_type( 'course',
      array(
           'labels'       => array(
            'name'       => __( 'Courses' ),
            'singular_name'      => _x( 'Course', 'post type singular name', 'wiselearn' ),
            'menu_name'          => _x( 'Course', 'admin menu', 'wiselearn' ),
            'name_admin_bar'     => _x( 'Course', 'add new on admin bar', 'wiselearn' ),
            'add_new'            => _x( 'Add New Course', 'wiselearn' ),
            'add_new_item'       => __( 'Add New Course', 'wiselearn' ),
            'new_item'           => __( 'New Course', 'wiselearn' ),
            'edit_item'          => __( 'Edit Course', 'wiselearn' ),
            'view_item'          => __( 'View Item', 'wiselearn' ),
            'all_items'          => __( 'All Course', 'wiselearn' ),
            'search_items'       => __( 'Search Course', 'wiselearn' ),
            'parent_item_colon'  => __( 'Parent Course:', 'wiselearn' ),
            'not_found'          => __( 'No Course found.', 'wiselearn' ),
            'not_found_in_trash' => __( 'No Course found in Trash.', 'wiselearn' ),
           ),

           'public'       => true,
           'hierarchical' => true,
           'has_archive'  => true,
           'show_ui'            => true,
          'show_admin_column' => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
           'show_in_menu'       => true,
          'menu_icon'    => 'dashicons-format-aside',
           'supports'     => array('title','editor','comments','thumbnail',
                                   ),

    )

  );
}
add_action( 'init', 'Course_taxonomies', 0 );

// create two taxonomies, Tags and Categories for the post type "book"
function Course_taxonomies() {

  // Add new taxonomy, NOT hierarchical (like Category)
  $labels = array(
    'name'                       => _x( 'Course Categories', 'taxonomy general name', 'wiselearn' ),
    'singular_name'              => _x( 'Course Category', 'taxonomy singular name', 'wiselearn' ),
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
    'rewrite'               => array( 'slug' => 'course_Category' ),
  );

  register_taxonomy( 'Course_category', 'course', $args );
}




function add_course_fields_meta_box() {
  add_meta_box(
    'course_fields_meta_box', // $id
    'Course Features', // $title
    'show_course_fields_meta_box', // $callback
    'course', // $screen
    'normal', // $context
    'high' // $priority
  );
}
add_action( 'add_meta_boxes', 'add_course_fields_meta_box' );
function show_course_fields_meta_box() {
    global $post;  
    
    $meta = get_post_meta( $post->ID, 'course_fields', true ); ?>

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  
<table border="0" width="100%" bgcolor="#c3faf4" cellpadding="10">
  <tr>
    <td><label for="course_fields[start_date]">Start Date: </label></td>
    <td> <input type="text" name="course_fields[start_date]" id="course_fields[start_date]" class="timepicker1 regular-text" value="<?php if (is_array($meta) && isset($meta['start_date'])) { echo $meta['start_date']; } ?>"></td>

<tr>
  <td><label for="course_fields[end_date]">End Date: </label></td>
  <td><input type="text" name="course_fields[end_date]" id="course_fields[end_date]" class="timepicker regular-text" value="<?php if (is_array($meta) && isset($meta['end_date'])) { echo $meta['end_date']; } ?>"></td>
</tr>

<tr>
<td>  <label for="course_fields[duration]">Duration: </label>
</td><td> <input type="text" name="course_fields[duration]" id="course_fields[duration]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['duration'])) { echo $meta['duration']; } ?>"></td>
</tr>


<tr><td><label for="course_fields[seats_available]">Seats Available: </label></td>
  <td><input type="text" name="course_fields[seats_available]" id="course_fields[seats_available]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['seats_available'])) { echo $meta['seats_available']; } ?>"></td>
</tr>
<tr><td><label for="course_fields[total_class]">Total Class:</label></td>
  <td> <input type="text" name="course_fields[total_class]" id="course_fields[total_class]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['total_class'])) { echo $meta['total_class']; } ?>"></td>
</tr>
<tr><td><label for="course_fields[time]">Time : </label></td>
  <td><input type="text" name="course_fields[time]" id="course_fields[time]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['time'])) { echo $meta['time']; } ?>"></td></tr>
<tr><td><label for="course_fields[class]">Class (Days) : </label></td>
  <td><input type="text" name="course_fields[class]" id="course_fields[class]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['class'])) { echo $meta['class']; } ?>"></td>
</tr>
<tr><td><label for="course_fields[class]">Fess ($) : </label></td>
  <td><input type="text" name="course_fields[fess]" id="course_fields[fess]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['fess'])) { echo $meta['fess']; } ?>"></td>
</tr>
<tr><td><label for="course_fields[total_credit]">Total Credit:</label></td>
  <td><input type="text" name="course_fields[total_credit]" id="course_fields[total_credit]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['total_credit'])) { echo $meta['total_credit']; } ?>"></td>
</tr>
<tr>
  <td>
    <label for="course_fields[teacher_pic]">Teacher Picture:</label>
  </td>
<td>
    <input type="text" name="course_fields[teacher_pic]" id="course_fields[teacher_pic]" class="meta-image regular-text" value="<?php if (is_array($meta) && isset($meta['teacher_pic'])) { echo $meta['teacher_pic']; } ?>">
    <input type="button" class="button image-upload" value="Browse">
</td>
</tr>
<tr>
<td colspan="2" align="center">
    <div class="image-preview">
    <img src="<?php echo $meta['teacher_pic']; ?>" style="max-width: 250px;">
  </div>
  </td>
</tr>
</table>

  <script>


 jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().parent().children().children().children('.image-preview');
        // PrCourses the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
       meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: 'Upload Image',
            library : {
                type : 'image'
            },
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });


    });
</script>
  <?php 
}



function save_course_fields_meta( $post_id ) {   
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

  
  $old = get_post_meta( $post_id, 'course_fields', true );
    if (isset($_POST['course_fields'])) { //Fix 3
      $new = $_POST['course_fields'];
      if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'course_fields', $new );
      } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'course_fields', $old );
      }
    }

}
add_action( 'save_post', 'save_course_fields_meta' );