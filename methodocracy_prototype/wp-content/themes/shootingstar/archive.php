<?php
/**
 * The archive template file.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>
<div class="post-loop">
<div class="entry-headline-wrapper">
  <div class="entry-headline-wrapper-inner">
    <h1 class="entry-headline"><?php if ( is_day() ) :
						printf( __( 'Daily Archive: %s', 'shootingstar' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archive: %s', 'shootingstar' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'shootingstar' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archive: %s', 'shootingstar' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'shootingstar' ) ) . '</span>' );
					else :
						_e( 'Archive', 'shootingstar' );
					endif ;?></h1>
<?php shootingstar_get_breadcrumb(); ?>
  </div>
</div>   
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?> 
<?php shootingstar_content_nav( 'nav-below' ); ?> 
</div> 
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>