<?php
/**
 * UnderStrap ACF specific
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


function ar_funding_opps(){
    $html = '';
    if( have_rows('funding_opportunities') ):

        // Loop through rows.
        while( have_rows('funding_opportunities') ) : the_row();

            // Load sub field value.
            $title = get_sub_field('funding_title');
            $text = get_sub_field('funding_description');
            $link = get_sub_field('funding_link');
            // Do something...
            $html .= "<div class='col-md-4'>
                         <div class='funding-details'>
                            <h2>{$title}</h2>
                            {$text}
                            <a class='btn btn-ar btn-blue' href='{$link}' aria-label='Learn more about {$title}.'>Apply</a>
                        </div>
                    </div>";
        // End loop.
        endwhile;
        return $html;
        // No value.
        else :
            // Do something...
        endif;

}


//resource to build link button in resources
function ar_go_to_link(){
    global $post;
    $post_id = $post->ID;
    $link = get_field('link');
    $type = get_field('type')->name;
    return "<a class='resource-link btn btn-ar' href='{$link}'>Click to {$type} and Learn</a>";
}


//for people to get the links

function ar_person_links($field){
    if(get_field($field)){
        $all = get_field_object($field);
        $label = $all['label'];
        $url = $all['value'];
        $class = $all['name'];
        //var_dump($name);
        return "<a class='person-link {$class}' href='{$url}'>{$label}</a>";
    }
}


/** add additional classes / id to the facetwp-template div generated by a facetwp 
 ** layout template
 **/
add_filter( 'facetwp_shortcode_html', function( $output, $atts) {
    if ( $atts['template'] = 'example' ) { // replace 'example' with name of your template
    /** modify replacement as needed, make sure you keep the facetwp-template class **/
        $output = str_replace( 'class="facetwp-template"', 'class="facetwp-template row"', $output );
    }
    return $output; 
}, 10, 2 );


    //save acf json
        add_filter('acf/settings/save_json', 'acf_special_json_save_point');
         
        function acf_special_json_save_point( $path ) {
            
            // update path
            $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
            
            
            // return
            return $path;
            
        }


        // load acf json
        add_filter('acf/settings/load_json', 'acf_special_json_load_point');

        function acf_special_json_load_point( $paths ) {
            
            // remove original path (optional)
            unset($paths[0]);
            
            
            // append path
            $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
            
            
            // return
            return $paths;
            
        }