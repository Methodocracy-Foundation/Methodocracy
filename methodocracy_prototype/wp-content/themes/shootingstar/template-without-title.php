<?php
/**
 * Template Name: Page without Title
 * The template file for pages without the page title.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if ( function_exists( 'bcn_display' ) ) { ?>
<div class="entry-headline-wrapper">
  <div class="entry-headline-wrapper-inner">
<?php shootingstar_get_breadcrumb(); ?>
  </div>
</div>
<?php } ?>
<div class="entry-content">
  <div class="entry-content-inner">
<?php shootingstar_get_display_image_page(); ?>
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'shootingstar' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php edit_post_link( __( 'Edit', 'shootingstar' ), '<p class="edit-link">', '</p>' ); ?>
<?php endwhile; endif; ?>
  </div>
</div>
<?php comments_template( '', true ); ?>   
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>