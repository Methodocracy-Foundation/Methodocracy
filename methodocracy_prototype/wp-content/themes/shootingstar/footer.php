<?php
/**
 * The footer template file.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/
?>
</div> <!-- end of main-content -->
</div> <!-- end of main-content-wrapper -->
<footer id="wrapper-footer">
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) { ?>
  <div id="footer">
    <div class="footer-widget-area footer-widget-area-1">
<?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div>    
    <div class="footer-widget-area footer-widget-area-2">
<?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div>   
    <div class="footer-widget-area footer-widget-area-3">
<?php dynamic_sidebar( 'sidebar-4' ); ?>
    </div>
  </div>
<?php }} ?>
<?php if ( dynamic_sidebar( 'sidebar-5' ) ) : else : ?>
<?php endif; ?>
</footer>  <!-- end of wrapper-footer -->
</div> <!-- end of container -->
<?php wp_footer(); ?>    
</body>
</html>