<?php
/**
 * Partial template for content in updates.php
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
		<a class="btn btn-ar btn-blue" href="<?php echo get_bloginfo( 'url' );?>/contribute-updates/">Add an update</a>
        <?php 
        echo ar_the_updates();
        ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
