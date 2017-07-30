<?php
/**
 * The 404 page (Not Found) template file.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/
get_header(); ?>
<div class="entry-headline-wrapper">
  <div class="entry-headline-wrapper-inner">
    <h1 class="entry-headline"><?php _e( 'Nothing Found', 'shootingstar' ); ?></h1>
<?php shootingstar_get_breadcrumb(); ?>
  </div>
</div>
<div class="entry-content">
  <div class="entry-content-inner">
    <p class="without-margin"><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'shootingstar' ); ?></p>
  </div>
</div>  
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>