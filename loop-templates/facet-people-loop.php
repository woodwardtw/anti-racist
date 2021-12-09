<?php
/**
 * facet loop for people
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

while ( have_posts() ): the_post(); ?>
    <div class="col-md-4">
        <div class="card h-100 facet-people-block">           
          <div class="card-body">
              <?php echo people_related_image('facet-ppl-img');?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
            <?php the_field('summary')?>     
          </div>
        </div>
    </div>
<?php endwhile;?> 