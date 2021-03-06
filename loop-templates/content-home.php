<?php
/**
 * Partial template for content in home.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="container-fluid">    
        <div class="row intro">
            <div class="col-md-6">
                <div class="green">
                	<?php echo get_the_post_thumbnail(get_the_ID(),'large');?>
                </div>
                <div class="caption"><?php echo the_post_thumbnail_caption(get_the_ID());?></div>
            </div>
            <div class="col-md-6 home-intro">
                <?php the_content();?>
            </div>
            <!-- <div class="col-md-12 middle-menu">
            <?php //wp_nav_menu( array( 'theme_location' => 'home-middle-menu' ) ); ?>
            </div> -->
        </div>
        <div class="row events" id="events">
            <div class="col-md-12 ">
                <div class="label">SHOW UP</div>
            </div>
            <?php echo ar_show_four_events();?>  
            <div class="col-md-12 home-buttons home-event-buttons">
                <a class="btn btn-ar btn-blue" href="live-events">Find more events</a>
                <a class="btn btn-ar btn-blue" href="add-event">Add an event</a> 
            </div>       
        </div>

    <!--end events-->
    <div class="row media h-100" id="resources">
        <div class="col-md-12">
            <div class="label">DIY LEARNING</div>
        </div>
    </div>
    <div class="row h-100">
        <div class="col-md-4">
            <div class="media-box read">
                <div class="media-type">READ</div>
                <div class="media-list">
                	<?php ar_home_resources('read');?>                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media-box watch">
                <div class="media-type">WATCH</div>
                <div class="media-list">
                    <?php ar_home_resources('watch');?>                    

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media-box listen">
                <div class="media-type">LISTEN</div>
                <div class="media-list">
                	<?php ar_home_resources('listen');?>                    
                </div>
            </div>
        </div>
        <div class="col-md-12 home-buttons home-resources-buttons">
            <a class="btn btn-ar btn-blue" href="diy-learning">Find more resources</a>
            <a class="btn btn-ar btn-blue" href="contribute-resource/">Add a resource</a>
        </div>
    </div>
    <!--end media/resources-->
    <div class="row" id="people">
    	 <div class="col-md-12">
            <div class="label">CONNECT</div>
        </div>
        <?php echo ar_home_people();?>
        <div class="col-md-12 home-buttons connection-buttons home-people-buttons">
            <a class="btn btn-ar btn-blue" href="connect">Find more connections</a>
            <a class="btn btn-ar btn-blue" href="contribute-a-connection">Add a person</a>
            <a class="btn btn-ar btn-blue" href="contribute-a-group">Add a group</a>
        </div>

    </div>
    <div class="row justify-content-center funding" id="funding">
        <div class="col-md-12">
            <div class="label">Funding</div>
        </div>
        <div class="col-md-6 funding-description">
            <?php the_field('funding_introduction')?>
        </div>
        <div class="col-md-5 offset-md-1">
            <?php echo ar_funding_opps();?>
        </div>
           
    </div>
    <!--end funding-->
    <!--news-->
    <div class="row stories" id="news">
        <div class="col-md-12">
            <div class="label">Updates</div>
        </div>
            <?php echo ar_home_news();?>

        <div class="col-md-12 home-buttons home-updates-buttons">
            <a class="btn btn-ar btn-blue" href="updates">See more updates</a>
            <a class="btn btn-ar btn-blue" href="contribute-updates/">Add an update</a>
        </div>
  
    </div>
    <!--end news-->
    <!-- <div class="row stories" id="stories">
        <div class="col-md-12">
            <div class="label">Stories</div>
        </div>
  
    </div> -->
  </div>
	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
