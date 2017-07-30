<?php 
/**
 * Library of Theme specific functions.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/

// Display Breadcrumb navigation
function shootingstar_get_breadcrumb() { 
if ( function_exists( 'bcn_display' ) && !is_front_page() ) { echo '<p class="breadcrumb-navigation">'; ?><?php bcn_display(); ?><?php echo '</p>'; }
} 

// Display featured images on single posts
function shootingstar_get_display_image_post() { 
		if ( get_theme_mod('shootingstar_display_image_post') == '' || get_theme_mod('shootingstar_display_image_post') == 'Display' ) { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
}

// Display featured images on pages
function shootingstar_get_display_image_page() { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } ?>