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
                <div class="label">EVENTS</div>
            </div>
            <?php echo ar_show_four_events();?>
            <div class="col-md-12 ">
                <a class="btn btn-ar btn-red" href="events">Find more events</a>
            </div>
        </div>
    <!--end events-->
    <div class="row media" id="resources">
        <div class="col-md-12">
            <div class="label">RESOURCES</div>
        </div>
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
        <a class="btn btn-ar btn-red" href="#">Find more resources</a>
    </div>
    <!--end media/resources-->
    <div class="row" id="people">
    	 <div class="col-md-12">
            <div class="label">PEOPLE</div>
        </div>
        <div class="col-md-3">
            <div class="red">
                <img class="twit" src="https://pbs.twimg.com/profile_images/911210240187731969/gEonmNwX_200x200.jpg">
            </div>
            <a href="https://twitter.com/DrIbram">Ibram X. Kendi</a>
        </div>
        <div class="col-md-3">
            <div class="green">
                <img class="twit" src="https://pbs.twimg.com/profile_images/1017569498340024320/aNtgQT1J_200x200.jpg">
            </div>
            <a href="https://twitter.com/IjeomaOluo">Ijeoma Oluo</a></li>
        </div>
         <div class="col-md-3">
            <div class="blue">
                <img class="twit" src="https://pbs.twimg.com/profile_images/840867826504204288/ZHyk1xxD_200x200.jpg">
            </div>
            <a href="https://twitter.com/renireni">Reni Eddo-Lodge</a></li>
        </div>
         <div class="col-md-3">
            <div class="yellow">
                <img class="twit" src="https://pbs.twimg.com/profile_images/1453087176003100681/IllVr2wU_200x200.jpg">
            </div>
            <a href="https://twitter.com/tressiemcphd">Tressie McMillan Cottom</a></li>
        </div>
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
            <?php echo ar_home_news();?>
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
