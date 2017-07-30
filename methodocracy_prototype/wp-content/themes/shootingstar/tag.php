<?php
/**
 * The tag archive template file.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>
<div class="post-loop">
<div class="entry-headline-wrapper">
  <div class="entry-headline-wrapper-inner">
    <h1 class="entry-headline"><?php printf( __( 'Tag Archive: %s', 'shootingstar' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
<?php shootingstar_get_breadcrumb(); ?>
  </div>
</div>
<?php if ( tag_description() ) : ?>
<div class="entry-content">
  <div class="entry-content-inner">   
    <div class="tag-description"><?php echo tag_description(); ?></div>
  </div>
</div>
<?php endif; ?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?> 
<?php shootingstar_content_nav( 'nav-below' ); ?>  
</div>
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>