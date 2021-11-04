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

//home page menu
function ar_home_menu() {
  register_nav_menus(
    array(
      'home-menu' => __( 'Home Main Menu' )
     )
   );
 }
 add_action( 'init', 'ar_home_menu' );


//home page events loop
function ar_show_four_events(){
	$html = '';
	$events = tribe_get_events( [ 
			'posts_per_page' => 4, 
			'start_date' => 'now',
		]
	);
 
	// Loop through the events, displaying the title and content for each
	foreach ( $events as $event ) {
		$link = get_permalink($event->ID);
		$date = tribe_get_start_date($event->ID, true, 'M j');
		$month = explode(' ',$date)[0];
		$day = explode(' ',$date)[1];
	    $title = $event->post_title;
	   $html .= 	"<div class='col-md-3'>
	  			 <a href='{$link}'>
                <div class='event card h-100'>
                    <div class='month'>{$month}</div>
                    <div class='day'>{$day}</div>
                    <div class='event-title'>{$title}</div>
                </div>
                </a>
            </div>";
	}
	return $html;
}


function ar_home_resources($type){
	$list = '';
	$args = array(
		    'post_type'  => 'resource',
		    'posts_per_page' => 4,
		    'orderby'        => 'rand',
		    'tax_query' => array( // (array) - use taxonomy parameters (available with Version 3.1).
			    array(
			      'taxonomy' => 'Types', // (string) - Taxonomy.
			      'field' => 'slug', // (string) - Select taxonomy term by Possible values are 'term_id', 'name', 'slug' or 'term_taxonomy_id'. Default value is 'term_id'.
			      'terms' => array($type), // (int/string/array) - Taxonomy term(s).		     		     
			    )
			  ),
	);

	$resource_query = new WP_Query( $args ); 
	// The Loop
	if ( $resource_query->have_posts() ) :
		while ( $resource_query->have_posts() ) : $resource_query->the_post();
		  // Do Stuff
			$title = get_the_title();
			$url = get_field('link');
			$description = get_field('summary');
			$list .=  "<li><a href='{$url}'>{$title}</a><p>{$description}</p></li>";
		endwhile;
		echo "
			<ul>{$list}</ul>
		";
	endif;

	// Reset Post Data
	wp_reset_postdata();
}


function ar_home_news(){
	$html = '';
	$args = array(
		    'post_type'  => 'post',
		    'posts_per_page' => 4,
		    'category_name' => 'news',
	);
  $news_query = new WP_Query( $args ); 
  // The Loop
	if ( $news_query->have_posts() ) :
		while ( $news_query->have_posts() ) : $news_query->the_post();
		  // Do Stuff
			$title = get_the_title();
			$url = get_permalink();
			$excerpt = get_the_excerpt();
			$html .=  "<div class='col-md-3'><div class='news card h-100'><a href='{$url}'><h2>{$title}</h2></a><p>{$excerpt}</p></div></div>";
		endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata();
		return $html;

}

function ar_home_people(){
	$list = '';
	$args = array(
		    'post_type'  => 'people',
		    'posts_per_page' => 4,
		    'orderby'        => 'rand',		    
	);

	$people_query = new WP_Query( $args ); 
	// The Loop
	$html = '';
	$count = 0;
	if ( $people_query->have_posts() ) :
		while ( $people_query->have_posts() ) : $people_query->the_post(); $count++;
		  // Do Stuff
			$title = get_the_title();
			$color = ar_color_picker($count);
			$img = get_the_post_thumbnail_url();
			//$url = get_permalink(); // change to this when people single post is more robust
			$url = ar_return_first_person_link();
			//$description = get_content; //if we want to show more content at some point
			$html .=  "<div class='col-md-3'>
									<div class='{$color}'>
                <img class='twit' src='{$img}' alt='Profile image for {$title}.'>
            </div>
            <a href='{$url}'>{$title}</a></li>
        </div>
			";
		endwhile;		
	endif;
	return $html;
	// Reset Post Data
	wp_reset_postdata();
}

//for picking the color of the photo wash in the people loop on the home page
function ar_color_picker($count){
		if ($count == 1){
			return 'blue';
		}
		if ($count == 2){
			return 'red';
		}
		if ($count == 3){
			return 'green';
		}
		if ($count == 4){
			return 'yellow';
		}
}

//just gives the link from the repeater field of links for a person on the home page
function ar_return_first_person_link(){
			if(get_field('twitter')){
				return get_field('twitter');
			}
			if(get_field('personal_site')){
				return get_field('personal_site');
			}
			if(get_field('tiktok')){
				return get_field('tiktok');
			}
			if(get_field('instagram')){
				return get_field('instagram');
			}

}



function ar_gf_event_update($entry, $form ){
	$created_posts = gform_get_meta( $entry['id'], 'gravityformsadvancedpostcreation_post_id' );
    foreach ( $created_posts as $post )
    {
        $post_id = $post['post_id'];
        // Do your stuff here.
        $registration = rgar( $entry, '7' );		   
        $info = rgar( $entry, '8' );		
        if($registration)   {
        	update_post_meta($post_id, 'reg_url', $registration);
        }
        if($info){
        	update_post_meta($post_id, 'info_url', $info);
        }		   
    }
}

add_action( 'gform_after_submission_1', 'ar_gf_event_update', 10, 2 );

add_filter( 'the_content', 'ar_events_content_titler', 1 );
 
function ar_events_content_titler( $content ) {
	global $post;
	$post_id = $post->ID;
    // Check if we're inside the main loop in a single Post.
    if ( 'tribe_events' == get_post_type()) {
    		$info = get_post_meta($post_id, 'info_url', true);
    		$reg = get_post_meta($post_id, 'reg_url', true);
    		$html = '';
    		if($info){
    			$html = "<a class='btn btn-ar' href='{$info}'>More information</a>";
    		}
    		if($reg){
    			$html .= "<a class='btn btn-ar' href='{$reg}'>Register</a>";
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