<?php
/**
 * Partial template for content in submit-resource.php
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
			$args = array(
			'id' => 'new-resource',
			'fields' => array('link','summary','type'),
	        'post_id'       => 'new_post',
	        'post_title'   => true,
			'post_content'	=> false,
			'html_updated_message'  => '<div id="message" class="updated"><p>Thank you for contributing!</p></div>',
	        'new_post'      => array(
	            'post_type'     => 'resource',
	            // 'tags_input' => array($type),
	        ),
	        'submit_value'  => 'Add your resource.',
		);
		acf_form($args); 
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
