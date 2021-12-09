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
		<div class='col-md-5'>
			<div class="square green">
				<?php 
				echo people_related_image('single-person-img');
				?>
			</div>
		</div>
		<div class="col-md-7">
			<?php the_field('short_biography');?>			
		</div>
	</div>
	<div class="row d-flex justify-content-around person-links">
			<?php
				echo ar_person_links('twitter');
				echo ar_person_links('personal_site');				
				echo ar_person_links('instagram');
				echo ar_person_links('facebook');
				echo ar_person_links('tiktok');
			?>
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
