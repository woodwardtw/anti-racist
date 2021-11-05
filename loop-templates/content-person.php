<?php
/**
 * Single person partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php //understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->
	<div class="row">
		<div class='green col-md-5'>
			<?php echo get_the_post_thumbnail( $post->ID, 'medium', 'single-person-img' ); ?>
		</div>
		<div class="col-md-7">
			<?php the_field('short_biography');?>			
		</div>
		<div class="person-links col-md-12 d-flex justify-content-around">
			<?php 
				echo ar_person_links('twitter');
				echo ar_person_links('personal_site');				
				echo ar_person_links('instagram');
				echo ar_person_links('facebook');
				echo ar_person_links('tiktok');
			?>
		</div>
	</div>
	<div class="entry-content">

		<?php
		//the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
