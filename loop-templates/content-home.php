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
            </div>
            <div class="col-md-6">
                <?php the_content();?>
            </div>
        </div>
        <div class="row events" id="events">
            <div class="col-md-12 ">
                <div class="label">SHOW UP</div>
            </div>
            <?php echo ar_show_four_events();?>  
            <div class="col-md-12">
                <a class="btn btn-ar btn-blue" href="events">Find more events</a>
                <a class="btn btn-ar btn-blue" href="add-event">Add an event</a> 
            </div>       
        </div>

    <!--end events-->
    <div class="row media" id="resources">
        <div class="col-md-12">
            <div class="label">DIY LEARNING</div>
        </div>
        <!-- <div class="col-md-6 offset-md-3">
            <h3><a href="https://middlebury.libguides.com/antiracism">Middlebury Libraries Anti-Racism Reading Guide</a></h3><p>This anti-racism reading guide promotes works and materials that address topics of race, identity, and experience for all members of the Middlebury community, and to support members of our community in learning and thinking deeply about these ideas. The theme that connects all of these works is the exploration of our differences and commonalities. What is it like to live in a community where you sometimes feel as if you’re on the outside looking in? How does an indivi</p>
        </div>        --> 
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
        <a class="btn btn-ar btn-blue" href="diy-learning">Find more resources</a>
        <a class="btn btn-ar btn-blue" href="contribute-resource/">Add a resource</a>
    </div>
    <!--end media/resources-->
    <div class="row" id="people">
    	 <div class="col-md-12">
            <div class="label">ANTI-RACISTS</div>
        </div>
        <?php echo ar_home_people();?>
         <a class="btn btn-ar btn-blue" href="people">Find more anti-racists</a>
        <a class="btn btn-ar btn-blue" href="contribute-anti-racists">Add an anti-racist</a>
    </div>
    <div class="row justify-content-center funding" id="funding">
        <div class="col-md-12">
            <div class="label">Funding</div>
        </div>
        <?php echo ar_funding_opps();?>
           
    </div>
    <!--end funding-->
    <!--news-->
    <div class="row stories" id="news">
        <div class="col-md-12">
            <div class="label">News</div>
        </div>
            <?php echo ar_home_news();?>
  
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
