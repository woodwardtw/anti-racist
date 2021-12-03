<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/acf.php',                    			// Load ACF functions.
	'/custom-data.php',                    			// Load custom post types and taxonomies
	'/home.php',                    			// Load home functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}


//LOGGER -- like frogger but more useful

if ( ! function_exists('write_log')) {
  function write_log ( $log )  {
     if ( is_array( $log ) || is_object( $log ) ) {
        error_log( print_r( $log, true ) );
     } else {
        error_log( $log );
     }
  }
}


//home page menu
function ar_home_menu() {
  register_nav_menus(
    array(
      'home-menu' => __( 'Home Main Menu' )
     )
   );
 }
 add_action( 'init', 'ar_home_menu' );


//event submission form population

function ar_gf_event_update($entry, $form ){
	$created_posts = gform_get_meta( $entry['id'], 'gravityformsadvancedpostcreation_post_id' );
    foreach ( $created_posts as $post )
    {
        $post_id = $post['post_id'];
        // Do your stuff here.
        $registration = rgar( $entry, '7' );
        $info = rgar( $entry, '8' );
        $student = rgar( $entry, '11.1');
        $faculty = rgar( $entry, '11.2');
        $staff = rgar( $entry, '11.3');
        $tags = array();
        if($student){
          array_push($tags, $student);
        }
        if($faculty){
          array_push($tags, $faculty);
        }
        if($staff){
          array_push($tags, $staff);
        }
        
        wp_set_post_tags($post_id, $tags, true);

        if($registration)   {
        	update_post_meta($post_id, 'registration_link', $registration);
        	update_field('_registration_link', 'field_61842b4ff7a25', $post_id);
        }
        if($info){
        	update_post_meta($post_id, 'more_information_link', $info);
        	update_field('_more_information_link', 'field_61842b5cf7a26', $post_id);
        }		   
    }
}

add_action( 'gform_after_submission_1', 'ar_gf_event_update', 10, 2 );


//adds ACF data to events calendar event
add_filter( 'the_content', 'ar_events_content_titler', 1 );
 
function ar_events_content_titler( $content ) {
	global $post;
	$post_id = $post->ID;
    // Check if we're inside the main loop in a single Post.
    if ( 'tribe_events' == get_post_type()) {
	    
	    	if(get_field('more_information_link',$post_id)){
	    		$info = get_field('more_information_link',$post_id);
	    	}
	    	if(get_field('registration_link',$post_id)){
	    		$reg = get_field('registration_link',$post_id);
	    	}

    		$html = '';
    		if(isset($info)){
    			$html = "<a class='btn btn-ar btn-blue' href='{$info}'>More information</a>";
    		}
    		if(isset($reg)){
    			$html .= "<a class='btn btn-ar btn-blue' href='{$reg}'>Register</a>";
    		}
        if (isset($reg) || isset($info)){
          $html = "<div class='event-link-block d-flex justify-content-around'>{$html}</div>";
        }
        return $content . $html;
    }
    return $content;
}

//Auto add and update Title field: https://support.advancedcustomfields.com/forums/topic/using-acf_form-add-post-title/

function ar_acf_save_people_title( $post_id ) {
    // Don't do this on the ACF post type
    if ( get_post_type( $post_id ) == 'people' ){
    	  // Get the Fields
    $fields = get_field_objects( $post_id );

    // Prevent Infinite Looping...
    remove_action( 'acf/save_post', 'ar_acf_save_people_title' );

    // Grab Post Data from the Form
    $post = array(
        'ID'           => $post_id,
        'post_title'   => $fields['name']['value'],
    );

    // Update the Post
    wp_update_post( $post );

    // Continue save action
    add_action( 'acf/save_post', 'ar_acf_save_people_title' );

    // Set the Return URL in Case of 'new' Post
    $_POST['return'] = add_query_arg( 'updated', 'true', get_permalink( $post_id ) );

    }
  
}
add_action( 'acf/save_post', 'ar_acf_save_people_title', 10, 1 );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
