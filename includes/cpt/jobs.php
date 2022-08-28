<?php
/**
 * Register a custom post type called "job".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_job_new_init() {
  $labels = array(
      'name'                  => _x( 'Jobs', 'Post type general name', 'textdomain' ),
      'singular_name'         => _x( 'job', 'Post type singular name', 'textdomain' ),
      'menu_name'             => _x( 'Jobs', 'Admin Menu text', 'textdomain' ),
      'name_admin_bar'        => _x( 'job', 'Add New on Toolbar', 'textdomain' ),
      'add_new'               => __( 'Add New', 'textdomain' ),
      'add_new_item'          => __( 'Add New job', 'textdomain' ),
      'new_item'              => __( 'New job', 'textdomain' ),
      'edit_item'             => __( 'Edit job', 'textdomain' ),
      'view_item'             => __( 'View job', 'textdomain' ),
      'all_items'             => __( 'All jobs', 'textdomain' ),
      'search_items'          => __( 'Search jobs', 'textdomain' ),
      'parent_item_colon'     => __( 'Parent jobs:', 'textdomain' ),
      'not_found'             => __( 'No industires found.', 'textdomain' ),
      'not_found_in_trash'    => __( 'No industires found in Trash.', 'textdomain' ),
      'featured_image'        => _x( 'Desktop Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
      'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
      'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
      'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
      'archives'              => _x( 'job archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
      'insert_into_item'      => _x( 'Insert into job', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
      'uploaded_to_this_item' => _x( 'Uploaded to this job', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
      'filter_items_list'     => _x( 'Filter industires list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
      'items_list_navigation' => _x( 'jobs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
      'items_list'            => _x( 'jobs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'taxonomies'         => array('job-category'),
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      // 'rewrite'            => array( 'slug' => 'job' ),
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => null,
      'menu_icon'          => 'dashicons-universal-access',
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
  );

  register_post_type( 'jobs', $args );
}

add_action( 'init', 'wpdocs_codex_job_new_init' );


function job_category_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'menu_name' => __( 'Categories' ),
  );    

  register_taxonomy('job-category',array('jobs'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    // 'rewrite' => array( 'slug' => 'ind-category' ),
  ));
 
}

add_action( 'init', 'job_category_taxonomy', 0 );