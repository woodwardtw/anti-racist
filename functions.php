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
	$events = tribe_get_events( [ 'posts_per_page' => 4 ] );
 
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
			$list .=  "<li><a href='{$url}'>{$title}</a></li>";
		endwhile;
		echo "
			<ul>{$list}</ul>
		";
	endif;

	// Reset Post Data
	wp_reset_postdata();

}