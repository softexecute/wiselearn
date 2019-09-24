<?php

/*=====================================================
-------Don't Change Here Slug and Taxonomy-----------
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
add_action( 'init', 'wiselearn_gallery_init' );
function wiselearn_gallery_init() {
	$labels = array(
		'name'               => _x( 'Gallery', 'post type general name', 'wiselearn' ),
		'singular_name'      => _x( 'Gallery', 'post type singular name', 'wiselearn' ),
		'menu_name'          => _x( 'Gallery', 'admin menu', 'wiselearn' ),
		'name_admin_bar'     => _x( 'Gallery', 'add new on admin bar', 'wiselearn' ),
		'add_new'            => _x( 'Add New Gallery', 'wiselearn' ),
		'add_new_item'       => __( 'Add New Gallery', 'wiselearn' ),
		'new_item'           => __( 'New Gallery', 'wiselearn' ),
		'edit_item'          => __( 'Edit Gallery', 'wiselearn' ),
		'view_item'          => __( 'View Gallery', 'wiselearn' ),
		'all_items'          => __( 'All Gallery', 'wiselearn' ),
		'search_items'       => __( 'Search Gallery', 'wiselearn' ),
		'parent_item_colon'  => __( 'Parent Gallery:', 'wiselearn' ),
		'not_found'          => __( 'No Gallery found.', 'wiselearn' ),
		'not_found_in_trash' => __( 'No Gallery found in Trash.', 'wiselearn' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'wiselearn' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_admin_column' => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_icon'           => 'dashicons-images-alt2',
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'gallery' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail', )
	);

	register_post_type( 'gallery', $args );
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'gallery_taxonomies', 0 );

// create two taxonomies, Tags and Categories for the post type "book"
function gallery_taxonomies() {

	// Add new taxonomy, NOT hierarchical (like Category)
	$labels = array(
		'name'                       => _x( 'Gallery Categories', 'taxonomy general name', 'wiselearn' ),
		'singular_name'              => _x( 'Gallery Category', 'taxonomy singular name', 'wiselearn' ),
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
		'rewrite'               => array( 'slug' => 'gallery_category' ),
	);

	register_taxonomy( 'gallery_category', 'gallery', $args );
}
