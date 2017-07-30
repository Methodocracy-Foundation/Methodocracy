<?php
/**
 * The sidebar template file.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/
?>
<?php if ( get_theme_mod('shootingstar_display_sidebar') != 'Hide' ) { ?>
<aside id="sidebar">
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</aside> <!-- end of sidebar -->
<?php } ?>