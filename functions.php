<?php

 function gt_setup(){
   //adding css file
  wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
 
  //adding js files
  wp_enqueue_script("main", get_theme_file_uri('/js/main.js'), NULL, microtime(), true );

  //adding google fonts
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com');
  wp_enqueue_style('google-fonts', '//fonts.gstatic.com');
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
  
  //adding font-awesome
  wp_enqueue_style('fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'gt_setup');


//adding theme support: post thumbnails (i.e featured image on posts) and custom site title and other supports
function gt_init(){
   add_theme_support('post-thumbnails');
   add_theme_support('title-tag');
   add_theme_support('html5', array('comment-list', 'comment-form', 'search-form','excerpt'));
}
add_action('after_setup_theme', 'gt_init');

//sidebar
function gt_widgets(){
  register_sidebar(
    array(
      'name' => 'Main Sidebar',
      'id' => 'main_sidebar',
      'before_title' => 'h3',
      'after_title' => 'h3',
    )
    );
}
add_action('widgets_init', 'gt_widgets');




// Register Custom Post Type
function custom_testimonial_post_type() {
  $labels = array(
      'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Testimonials', 'text_domain' ),
      'name_admin_bar'        => __( 'Testimonial', 'text_domain' ),
      'archives'              => __( 'Testimonial Archives', 'text_domain' ),
      'attributes'            => __( 'Testimonial Attributes', 'text_domain' ),
      'parent_item_colon'     => __( 'Parent Testimonial:', 'text_domain' ),
      'all_items'             => __( 'All Testimonials', 'text_domain' ),
      'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
      'add_new'               => __( 'Add New', 'text_domain' ),
      'new_item'              => __( 'New Testimonial', 'text_domain' ),
      'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
      'update_item'           => __( 'Update Testimonial', 'text_domain' ),
      'view_item'             => __( 'View Testimonial', 'text_domain' ),
      'view_items'            => __( 'View Testimonials', 'text_domain' ),
      'search_items'          => __( 'Search Testimonials', 'text_domain' ),
      'not_found'             => __( 'Not found', 'text_domain' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
      'featured_image'        => __( 'Featured Image', 'text_domain' ),
      'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
      'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
      'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
      'insert_into_item'      => __( 'Insert into testimonial', 'text_domain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'text_domain' ),
      'items_list'            => __( 'Testimonials list', 'text_domain' ),
      'items_list_navigation' => __( 'Testimonials list navigation', 'text_domain' ),
      'filter_items_list'     => __( 'Filter testimonials list', 'text_domain' ),
  );
  
  $args = array(
      'label'                 => __( 'Testimonial', 'text_domain' ),
      'description'           => __( 'Customer testimonials', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'thumbnail', 'editor','excerpt'),
      'public'                => true,
      'menu_position'         => 20,
      'menu_icon'             => 'dashicons-testimonial',
      'show_ui'               => true,
      'show_in_menu'          => true,
      'show_in_rest'          => true,
      'capability_type'       => 'post',
      'has_archive'           => true,
      'rewrite'               => array( 'slug' => 'testimonials' ),
  );
  
  register_post_type( 'testimonial', $args );
}
add_action( 'init', 'custom_testimonial_post_type', 0 );



// Register Custom Post Type 'our_clients'
function custom_post_type_our_clients() {
  $labels = array(
      'name'               => _x( 'Our Clients', 'post type general name', 'textdomain' ),
      'singular_name'      => _x( 'Client', 'post type singular name', 'textdomain' ),
      'menu_name'          => _x( 'Our Clients', 'admin menu', 'textdomain' ),
      'name_admin_bar'     => _x( 'Client', 'add new on admin bar', 'textdomain' ),
      'add_new'            => _x( 'Add New', 'client', 'textdomain' ),
      'add_new_item'       => __( 'Add New Client', 'textdomain' ),
      'new_item'           => __( 'New Client', 'textdomain' ),
      'edit_item'          => __( 'Edit Client', 'textdomain' ),
      'view_item'          => __( 'View Client', 'textdomain' ),
      'all_items'          => __( 'All Clients', 'textdomain' ),
      'search_items'       => __( 'Search Clients', 'textdomain' ),
      'parent_item_colon'  => __( 'Parent Clients:', 'textdomain' ),
      'not_found'          => __( 'No clients found.', 'textdomain' ),
      'not_found_in_trash' => __( 'No clients found in Trash.', 'textdomain' )
  );

  $args = array(
      'labels'             => $labels,
      'description'        => __( 'Description.', 'textdomain' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'our_clients' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'menu_icon'             => 'dashicons-buddicons-buddypress-logo', // Customize the menu icon
      'supports'           => array( 'title', 'thumbnail' ),
  );

  register_post_type( 'our_clients', $args );
}
add_action( 'init', 'custom_post_type_our_clients' );


//custom post type video gallery
function create_video_gallery_post_type() {
  $labels = array(
      'name'                  => _x('Video Gallery', 'Post Type General Name', 'text_domain'),
      'singular_name'         => _x('Video', 'Post Type Singular Name', 'text_domain'),
      'menu_name'             => __('Video Gallery', 'text_domain'),
      'name_admin_bar'        => __('Video Gallery', 'text_domain'),
      'archives'              => __('Item Archives', 'text_domain'),
      'attributes'            => __('Item Attributes', 'text_domain'),
      'parent_item_colon'     => __('Parent Item:', 'text_domain'),
      'all_items'             => __('All Videos', 'text_domain'),
      'add_new_item'          => __('Add New Video', 'text_domain'),
      'add_new'               => __('Add New', 'text_domain'),
      'new_item'              => __('New Video', 'text_domain'),
      'edit_item'             => __('Edit Video', 'text_domain'),
      'update_item'           => __('Update Video', 'text_domain'),
      'view_item'             => __('View Video', 'text_domain'),
      'view_items'            => __('View Videos', 'text_domain'),
      'search_items'          => __('Search Video', 'text_domain'),
      'not_found'             => __('Not found', 'text_domain'),
      'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
      'featured_image'        => __('Featured Image', 'text_domain'),
      'set_featured_image'    => __('Set featured image', 'text_domain'),
      'remove_featured_image' => __('Remove featured image', 'text_domain'),
      'use_featured_image'    => __('Use as featured image', 'text_domain'),
      'insert_into_item'      => __('Insert into item', 'text_domain'),
      'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
      'items_list'            => __('Items list', 'text_domain'),
      'items_list_navigation' => __('Items list navigation', 'text_domain'),
      'filter_items_list'     => __('Filter items list', 'text_domain'),
  );
  $args = array(
      'label'                 => __('Video', 'text_domain'),
      'description'           => __('Video Gallery', 'text_domain'),
      'labels'                => $labels,
      'supports'              => array('title', '', '', ''),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-video-alt3', // You can choose a different icon or use a custom one
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'post',
  );
  register_post_type('video_gallery', $args);
}
add_action('init', 'create_video_gallery_post_type', 0);


// Register Custom Post Type
function custom_recent_projects_post_type() {
  $labels = array(
      'name'                  => _x( 'Recent Projects', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Recent Project', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Recent Projects', 'text_domain' ),
      'name_admin_bar'        => __( 'Recent Project', 'text_domain' ),
      'archives'              => __( 'Project Archives', 'text_domain' ),
      'attributes'            => __( 'Project Attributes', 'text_domain' ),
      'parent_item_colon'     => __( 'Parent Project:', 'text_domain' ),
      'all_items'             => __( 'All Projects', 'text_domain' ),
      'add_new_item'          => __( 'Add New Project', 'text_domain' ),
      'add_new'               => __( 'Add New', 'text_domain' ),
      'new_item'              => __( 'New Project', 'text_domain' ),
      'edit_item'             => __( 'Edit Project', 'text_domain' ),
      'update_item'           => __( 'Update Project', 'text_domain' ),
      'view_item'             => __( 'View Project', 'text_domain' ),
      'view_items'            => __( 'View Projects', 'text_domain' ),
      'search_items'          => __( 'Search Project', 'text_domain' ),
      'not_found'             => __( 'Not found', 'text_domain' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
      'featured_image'        => __( 'Featured Image', 'text_domain' ),
      'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
      'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
      'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
      'insert_into_item'      => __( 'Insert into project', 'text_domain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this project', 'text_domain' ),
      'items_list'            => __( 'Projects list', 'text_domain' ),
      'items_list_navigation' => __( 'Projects list navigation', 'text_domain' ),
      'filter_items_list'     => __( 'Filter projects list', 'text_domain' ),
  );
  $args = array(
      'label'                 => __( 'Recent Project', 'text_domain' ),
      'description'           => __( 'Custom post type for recent projects', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'thumbnail' ), // Supports title and thumbnail
      'public'                => true,
      'menu_icon'             => 'dashicons-portfolio', // Customize the menu icon
      'rewrite'               => array( 'slug' => 'recent-projects' ), // Customize the URL slug
      'show_ui'               => true,
      'show_in_menu'          => true,
      'show_in_rest'          => true, // Enables the block editor (Gutenberg) support
  );
  register_post_type( 'recent_project', $args );
}
add_action( 'init', 'custom_recent_projects_post_type', 0 );


// Register Custom Post Type
function custom_post_type_team() {
  $labels = array(
      'name'                  => _x( 'Team Members', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Team', 'text_domain' ),
      'name_admin_bar'        => __( 'Team', 'text_domain' ),
      'archives'              => __( 'Team Archives', 'text_domain' ),
      'attributes'            => __( 'Team Attributes', 'text_domain' ),
      'parent_item_colon'     => __( 'Parent Team:', 'text_domain' ),
      'all_items'             => __( 'All Team Members', 'text_domain' ),
      'add_new_item'          => __( 'Add New Team Member', 'text_domain' ),
      'add_new'               => __( 'Add New', 'text_domain' ),
      'new_item'              => __( 'New Team Member', 'text_domain' ),
      'edit_item'             => __( 'Edit Team Member', 'text_domain' ),
      'update_item'           => __( 'Update Team Member', 'text_domain' ),
      'view_item'             => __( 'View Team Member', 'text_domain' ),
      'view_items'            => __( 'View Team Members', 'text_domain' ),
      'search_items'          => __( 'Search Team Member', 'text_domain' ),
      'not_found'             => __( 'Not found', 'text_domain' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
      'featured_image'        => __( 'Featured Image', 'text_domain' ),
      'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
      'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
      'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
      'insert_into_item'      => __( 'Insert into Team Member', 'text_domain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'text_domain' ),
      'items_list'            => __( 'Team Members list', 'text_domain' ),
      'items_list_navigation' => __( 'Team Members list navigation', 'text_domain' ),
      'filter_items_list'     => __( 'Filter Team Members list', 'text_domain' ),
  );
  $args = array(
      'label'                 => __( 'Team Member', 'text_domain' ),
      'description'           => __( 'Team Members', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-groups',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'post',
  );
  register_post_type( 'team', $args );
}
add_action( 'init', 'custom_post_type_team', 0 );


//adding menu
function theme_register_menus() {
  register_nav_menus(array(
    'primary' => 'Primary Menu',
  ));
}
add_action('after_setup_theme', 'theme_register_menus');

//Our Clients

function create_client_post_type() {
  register_post_type('clients',
      array(
          'labels' => array(
              'name' => __('Clients'),
              'singular_name' => __('Client'),
          ),
          'public' => true,
          'has_archive' => true,
          'supports' => array('title', 'thumbnail'),
      )
  );
}
add_action('init', 'create_client_post_type');



?>