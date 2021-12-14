<?php
/**
 * Partial template for content in submit-person.php
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

			<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

			<div class="entry-content">

				<?php
				//THE FORM
				the_content();
					$args = array(
					'id' => 'new-person',
					'fields' => array('name', 'short_biography', 'twitter', 'personal_site','instagram', 'facebook', 'tiktok'),
			        'post_id'       => 'new_post',
			        'post_title'   => false,
					'post_content'	=> false,
					'html_updated_message'  => '<div id="message" class="updated"><p>Thank you for contributing!</p></div>',
			        'new_post'      => array(
			            'post_type'     => 'people',
						'post_category'	=> array(14),
			        ),
			        'submit_value'  => 'Add a person',
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
