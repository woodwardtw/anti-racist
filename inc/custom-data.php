<?php
/**
 * UnderStrap custom tax and cpt
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//resource custom post type

// Register Custom Post Type resource
// Post Type Key: resource

function create_resource_cpt() {

  $labels = array(
    'name' => __( 'Resources', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Resource', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Resources', 'textdomain' ),
    'name_admin_bar' => __( 'Resource', 'textdomain' ),
    'archives' => __( 'Resource Archives', 'textdomain' ),
    'attributes' => __( 'Resource Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Resource:', 'textdomain' ),
    'all_items' => __( 'All Resources', 'textdomain' ),
    'add_new_item' => __( 'Add New Resource', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Resource', 'textdomain' ),
    'edit_item' => __( 'Edit Resource', 'textdomain' ),
    'update_item' => __( 'Update Resource', 'textdomain' ),
    'view_item' => __( 'View Resource', 'textdomain' ),
    'view_items' => __( 'View Resources', 'textdomain' ),
    'search_items' => __( 'Search Resources', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into resource', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this resource', 'textdomain' ),
    'items_list' => __( 'Resource list', 'textdomain' ),
    'items_list_navigation' => __( 'Resource list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Resource list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'Resources', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-links',
  );
  register_post_type( 'resource', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_resource_cpt', 0 );

add_action( 'init', 'create_type_taxonomies', 0 );
function create_type_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'popular_items' => __( 'Popular Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Types' ),
    'update_item' => __( 'Update type' ),
    'add_new_item' => __( 'Add New type' ),
    'new_item_name' => __( 'New type' ),
    'add_or_remove_items' => __( 'Add or remove Types' ),
    'choose_from_most_used' => __( 'Choose from the most used Types' ),
    'menu_name' => __( 'type' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Types',array('resource'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'meta_box_cb'                => false,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
    'show_in_rest'          => true,
    'rest_base'             => 'resource_type',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}



//people custom post type

// Register Custom Post Type people
// Post Type Key: people

function create_people_cpt() {

  $labels = array(
    'name' => __( 'people', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'People', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'People', 'textdomain' ),
    'name_admin_bar' => __( 'People', 'textdomain' ),
    'archives' => __( 'People Archives', 'textdomain' ),
    'attributes' => __( 'People Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'People:', 'textdomain' ),
    'all_items' => __( 'All Peoples', 'textdomain' ),
    'add_new_item' => __( 'Add New People', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New People', 'textdomain' ),
    'edit_item' => __( 'Edit People', 'textdomain' ),
    'update_item' => __( 'Update People', 'textdomain' ),
    'view_item' => __( 'View People', 'textdomain' ),
    'view_items' => __( 'View Peoples', 'textdomain' ),
    'search_items' => __( 'Search Peoples', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into people', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this people', 'textdomain' ),
    'items_list' => __( 'People list', 'textdomain' ),
    'items_list_navigation' => __( 'People list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter People list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'people', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-users',
  );
  register_post_type( 'people', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_people_cpt', 0 );

add_action( 'init', 'ar_group_register_tax_orgs', 0 );
/**
 * Register Taxonomy Organization
 */
function ar_group_register_tax_orgs() {

  $labels = array(
    'name'          => __( 'Organization', 'textdomain' ),
    'singular_name' => __( 'Organization', 'textdomain' ),
    'search_items'  => __( 'Search Organization', 'textdomain' ),
    'all_items'     => __( 'All Organization', 'textdomain' ),
    'edit_item'     => __( 'Edit Organization', 'textdomain' ),
    'update_item'   => __( 'Update Organization', 'textdomain' ),
    'add_new_item'  => __( 'Add New Organization', 'textdomain' ),
    'new_item_name' => __( 'Add New Organization', 'textdomain' ),
  );

  register_taxonomy(
    'orgs',
    array(
      'people',
    ),
    array(
      'hierarchical'       => true,
      'public'             => true,
      'publicly_queryable' => true,
      'labels'             => $labels,
      'show_ui'            => true,
      'show_in_rest'       => true,
      'show_admin_column'  => true,
      'query_var'          => true,
      'rewrite'            => array(
        'slug' => _x( 'orgs', 'slug', 'textdomain' ),
      ),
    )
  );
}

// Register Custom Post Type people
// Post Type Key: quote
function ar_create_quote_cpt() {
    $labels = array(
    'name' => __( 'Quote', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Quote', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Quotes', 'textdomain' ),
    'name_admin_bar' => __( 'Quotes', 'textdomain' ),
    'archives' => __( 'quote Archives', 'textdomain' ),
    'attributes' => __( 'quote Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'quote:', 'textdomain' ),
    'all_items' => __( 'All quotes', 'textdomain' ),
    'add_new_item' => __( 'Add New quote', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New quote', 'textdomain' ),
    'edit_item' => __( 'Edit quote', 'textdomain' ),
    'update_item' => __( 'Update quote', 'textdomain' ),
    'view_item' => __( 'View quote', 'textdomain' ),
    'view_items' => __( 'View quotes', 'textdomain' ),
    'search_items' => __( 'Search quotes', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into quote', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this quote', 'textdomain' ),
    'items_list' => __( 'People list', 'textdomain' ),
    'items_list_navigation' => __( 'quote list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter quote list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'Quotes', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-comments',
  );
  register_post_type( 'quote', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'ar_create_quote_cpt', 0 );

//auto set quote title based on first 40 characters of quote body
function ar_auto_quote_title(){
  global $post;
  if($post){
    $post_id = $post->ID;
    $type = get_post_type($post_id);
    if ($type === 'quote'){
      remove_action( 'save_post', 'ar_auto_quote_title' );
      $quote = substr(get_the_content($post_id),0, 30) . ' . . .';
      $my_post = array(
          'ID'           => $post_id,
          'post_title'   => wp_strip_all_tags($quote),      
      );
  
    // Update the post into the database
      wp_update_post( $my_post );
    }
  }
 
}
add_action( 'save_post', 'ar_auto_quote_title' );
