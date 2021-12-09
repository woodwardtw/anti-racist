<?php
/**
 * Partial template for content in find-people.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php
		the_content();
		//understrap_link_pages();
		?>

	</div><!-- .entry-content -->
	<div class="row facet-row">
			<div class="col-md-3">
				<div class="facet-block" id="find-people">
					<h2>Find People</h2>         
					<?php echo facetwp_display( 'facet', 'find_connections');?>	
                    <?php echo facetwp_display( 'facet', 'people');?>	
				</div>
				<a class="btn btn-ar btn-blue" href="contribute-a-connection">Add a connection</a>
			</div>
			<div class="col-md-9" id="facet-people">
				 <?php echo facetwp_display( 'template', 'people');?>	
			</div>
			<div class="col-md-12">
				<?php echo do_shortcode('[facetwp pager="true"]') ;?>
					<button class="btn btn-ar btn-blue" value="Reset" onclick="FWP.reset()" class="facet-reset" />Reset Filters</button>					
			</div>
	</div>

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
