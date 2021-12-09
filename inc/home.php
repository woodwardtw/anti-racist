<?php
/**
 * Custom functions from the home page
 *
 * 
 *
 * @package Understrap
 */

add_filter('acf/settings/remove_wp_meta_box', '__return_false');
add_filter( 'is_protected_meta', '__return_false' ); 

//home page events loop
function ar_show_four_events(){
    $html = '';
    $events = tribe_get_events( [ 
            'posts_per_page' => 4, 
            'start_date' => 'now',
            'orderby'   => 'order_clause',//shouldn't have to do this but I do for some reason
            'meta_query' => array(
                'order_clause' => array(
                        'key' => '_EventStartDate',
                        'type' => 'date'
            ))
        ]
    );
 
    // Loop through the events, displaying the title and content for each
    foreach ( $events as $event ) {
        $link = get_permalink($event->ID);
        $date = tribe_get_start_date($event->ID, true, 'M j');
        $month = explode(' ',$date)[0];
        $day = explode(' ',$date)[1];
        $title = $event->post_title;
       $html .=     "<div class='col-md-3'>
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
            $img = people_related_image('twit');
            $url = get_permalink();
            //$description = get_content; //if we want to show more content at some point
            $html .=  "<div class='col-md-3'>
                        <a href='{$url}'>
                            <div class='{$color}'>
                                {$img}                            
                            </div>
                        </a>
                        <a href='{$url}'>{$title}</a></li>
                    </div>
                        ";
        endwhile;       
    endif;
    // Reset Post Data
    wp_reset_postdata();
    return $html;
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

//just gives the link from the repeater field of links for a person on the home page ****deprecated now links to person/group page
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


function ar_the_updates(){
    $html = '';
    $args = array(
            'post_type'  => 'post',
            'posts_per_page' => 20,
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
            $html .=  "<div class='col-md-4'><div class='news card h-100'><a href='{$url}'><h2>{$title}</h2></a><p>{$excerpt}</p></div></div>";
        endwhile;
    endif;

    // Reset Post Data
    wp_reset_postdata();
        return $html;

}