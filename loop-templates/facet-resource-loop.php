<?php
/**
 * facet loop
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

while ( have_posts() ): the_post(); ?>
    <div class="col-md-6">
        <div class="card h-100">           
          <div class="card-body">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
            <?php the_field('summary')?>     
          </div>
        </div>
    </div>
<?php endwhile;?> 