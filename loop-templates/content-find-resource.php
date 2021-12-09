<?php
/**
 * Partial template for content in find-resource.php
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
				<div class="facet-block">
					<h2>DIY Type</h2>
					<?php echo facetwp_display( 'facet', 'resource_type');?>	
<!-- 					<h2>Length</h2>
 -->					<?php //echo facetwp_display( 'facet', 'resource_length');?>	
				</div>
				<a class="btn btn-ar btn-blue" href="<?php echo get_bloginfo( 'url' );?>/contribute-resource/">Add a resource</a>
			</div>
			<div class="col-md-9" id="facet-resources">
				 <?php echo facetwp_display( 'template', 'resources');?>	
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
