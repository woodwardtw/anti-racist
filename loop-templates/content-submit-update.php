<?php
/**
 * Partial template for content in submit-update.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<header class="entry-header">

				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			</header><!-- .entry-header -->

			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

			<div class="entry-content">

				<?php
				//THE FORM
				the_content();
					$args = array(
					'id' => 'new-update',
			        'post_id'       => 'new_post',
			        'post_title'   => true,
					'post_content'	=> true,
					'html_updated_message'  => '<div id="message" class="updated"><p>Thank you for contributing! Your submission will be reviewed and published in the near future.</p></div>',
			        'new_post'      => array(
			            'post_type'     => 'post',
			            'post_status'=> 'draft',
			            'post_category' => array(7),
			            // 'tags_input' => array($type),
			        ),
			        'submit_value'  => 'Add your update.',
				);
				acf_form($args); 
				?>

			</div><!-- .entry-content -->
		</div>
	</div>
	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
