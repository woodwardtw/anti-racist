<?php
/**
 * Partial template for content in archive-people.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<a href="<?php the_permalink();?>">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</a>

	</header><!-- .entry-header -->
	<div class="row">
			<div class="col-md-3">
				<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
			</div>
			<div class="col-md-9">
				<?php the_field('short_biography');?>
			</div>
	</div>	

	<footer class="entry-footer">

		<?php //understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
