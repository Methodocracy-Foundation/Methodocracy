<?php
/**
 * The main template file.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/
get_header(); ?> 
  <div class="post-loop">  
    <section class="home-latest-posts">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php shootingstar_content_nav( 'nav-below' ); ?>
    </section> 
  </div>  
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>