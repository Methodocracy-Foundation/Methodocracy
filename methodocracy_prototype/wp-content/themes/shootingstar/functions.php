<?php
/**
 * ShootingStar functions and definitions.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/

/**
 * ShootingStar Theme Customizer.
 *  
*/    
// Include Theme Customization admin screen  
require_once (get_template_directory() . '/functions/customizer.php');  
// Include Theme specific functions 
require_once (get_template_directory() . '/functions/headerdata.php');
require_once (get_template_directory() . '/functions/library.php');
// Include About ShootingStar admin page 
require_once (get_template_directory() . '/functions/about/about.php');

/**
 * ShootingStar theme basic setup.
 *  
*/
function shootingstar_setup() {
	// Makes ShootingStar available for translation.
	load_theme_textdomain( 'shootingstar', get_template_directory() . '/languages' );
  // This theme styles the visual editor to resemble the theme style.
  $shootingstar_font_url = add_query_arg( 'family', 'PT+Sans', "//fonts.googleapis.com/css" );
  add_editor_style( array( 'editor-style.css', $shootingstar_font_url ) );
	// Adds RSS feed links to <head> for posts and comments.  
	add_theme_support( 'automatic-feed-links' );
	// This theme supports custom background color and image.
	$defaults = array(
	'default-color' => '', 
  'default-image' => '',
	'wp-head-callback' => '_custom_background_cb',
	'admin-head-callback' => '',
	'admin-preview-callback' => '' );  
  add_theme_support( 'custom-background', $defaults );
	// This theme supports post thumbnails.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1170, 9999 );
  // This theme supports a custom header image.
  $args = array(
	'width' => 2000,
	'height' => 400,
  'flex-width' => true,
  'flex-height' => true,
  'header-text' => false,
  'random-default' => true,);
  add_theme_support( 'custom-header', $args );
  // This theme supports the Title Tag feature.
  add_theme_support( 'title-tag' );
  // This theme supports the WooCommerce plugin.
  add_theme_support( 'woocommerce' );
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 1130; }
}
add_action( 'after_setup_theme', 'shootingstar_setup' );

/**
 * Enqueues scripts and styles for front-end.
 *
*/
function shootingstar_scripts_styles() {
	global $wp_styles, $wp_scripts;
	// Adds JavaScript
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
  if ( get_theme_mod('shootingstar_infinite_scroll') != 'Disable' ) {
  if ( is_home() || is_archive() || is_search() ) {
  wp_enqueue_script( 'shootingstar-infinitescroll', get_template_directory_uri() . '/js/infinitescroll.min.js', array( 'jquery' ), '2.0.2', true );
  wp_enqueue_script( 'shootingstar-infinitescroll-settings', get_template_directory_uri() . '/js/infinitescroll-settings.js', array(), '1.0', true );
  $shootingstar_site_parameters = array(
  'theme_directory' => get_template_directory_uri(),
  'message_load' => __( '<p>Loading...</p>', 'shootingstar' ),
  'message_end' => __( '<p>No further posts.</p>', 'shootingstar' )
  );
  wp_localize_script( 'shootingstar-infinitescroll-settings', 'SiteParameters', $shootingstar_site_parameters ); }}
  wp_enqueue_script( 'shootingstar-placeholders', get_template_directory_uri() . '/js/placeholders.js', array( 'jquery' ), '2.0.8', true );
  if ( get_theme_mod('shootingstar_display_scroll_top') != 'Hide' ) {
  wp_enqueue_script( 'shootingstar-scroll-to-top', get_template_directory_uri() . '/js/scroll-to-top.js', array( 'jquery' ), '1.0', true ); }
  if ( get_theme_mod('shootingstar_fixed_menu') != 'Disable' && !is_page_template('template-landing-page.php') ) {
  wp_enqueue_script( 'shootingstar-menubox', get_template_directory_uri() . '/js/menubox.js', array(), '1.0', true ); }
  wp_enqueue_script( 'shootingstar-selectnav', get_template_directory_uri() . '/js/selectnav.js', array(), '0.1', true );
  wp_enqueue_script( 'shootingstar-responsive', get_template_directory_uri() . '/js/responsive.js', array(), '1.0', true );  
  wp_enqueue_script( 'shootingstar-html5-ie', get_template_directory_uri() . '/js/html5.min.js', array(), '3.7.2', false );
    $wp_scripts->add_data( 'shootingstar-html5-ie', 'conditional', 'lt IE 9' ); 
	// Adds CSS
  wp_enqueue_style( 'shootingstar-elegantfont', get_template_directory_uri() . '/css/elegantfont.css' );
  wp_enqueue_style( 'shootingstar-google-font-default', '//fonts.googleapis.com/css?family=PT+Sans&amp;subset=latin,latin-ext' );
  if ( class_exists( 'woocommerce' ) ) { wp_enqueue_style( 'shootingstar-woocommerce-custom', get_template_directory_uri() . '/css/woocommerce-custom.css' ); }
}
add_action( 'wp_enqueue_scripts', 'shootingstar_scripts_styles' );

/**
 * Outputs a custom Favicon.
 *
*/
if ( get_theme_mod('shootingstar_favicon_url') != '' ) {
function shootingstar_get_favicon() { ?>
<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('shootingstar_favicon_url')); ?>" /> 
<?php }
add_action('wp_head', 'shootingstar_get_favicon');
}

/**
 * Backwards compatibility for older WordPress versions which do not support the Title Tag feature.
 *  
*/
if ( ! function_exists( '_wp_render_title_tag' ) ) {
function shootingstar_wp_title( $title, $sep ) {
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	return $title;
}
add_filter( 'wp_title', 'shootingstar_wp_title', 10, 2 );
}

/**
 * Register our menu.
 *
 */
function shootingstar_register_my_menu() {
  register_nav_menu( 'main-navigation', __( 'Main Header Menu', 'shootingstar' ) ); 
}
add_action( 'after_setup_theme', 'shootingstar_register_my_menu' );

/**
 * Register our sidebars and widgetized areas.
 *
*/
function shootingstar_widgets_init() {
  register_sidebar( array(
		'name' => __( 'Right Sidebar', 'shootingstar' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar which appears on all posts and pages.', 'shootingstar' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s"><div class="sidebar-widget-inner">',
		'after_widget' => '</div></div>',
		'before_title' => ' <p class="sidebar-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer left widget area', 'shootingstar' ),
		'id' => 'sidebar-2',
		'description' => __( 'Left column with widgets in footer.', 'shootingstar' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer middle widget area', 'shootingstar' ),
		'id' => 'sidebar-3',
		'description' => __( 'Middle column with widgets in footer.', 'shootingstar' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer right widget area', 'shootingstar' ),
		'id' => 'sidebar-4',
		'description' => __( 'Right column with widgets in footer.', 'shootingstar' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer notices', 'shootingstar' ),
		'id' => 'sidebar-5',
		'description' => __( 'The line for copyright and other notices below the footer widget areas. Insert here one Text widget. The "Title" field at this widget should stay empty.', 'shootingstar' ),
		'before_widget' => '<div class="footer-signature"><div class="footer-signature-content">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'shootingstar_widgets_init' );

/**
 * Post excerpt settings.
 *
*/
function shootingstar_custom_excerpt_length( $length ) {
if ( get_theme_mod('shootingstar_excerpt_length') != '' ) {
return get_theme_mod('shootingstar_excerpt_length');
} else { return 40; }
}
add_filter( 'excerpt_length', 'shootingstar_custom_excerpt_length', 20 );
function shootingstar_new_excerpt_more( $more ) {
global $post;
return '...<br /><a class="read-more-button" href="'. esc_url( get_permalink($post->ID) ) . '">' . __( 'Read more', 'shootingstar' ) . '</a>';}
add_filter( 'excerpt_more', 'shootingstar_new_excerpt_more' );

if ( ! function_exists( 'shootingstar_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
*/
function shootingstar_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $html_id; ?>" class="navigation" role="navigation">
    <div class="navigation-inner">
			<h2 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'shootingstar' ); ?></h2>
      <div class="nav-wrapper">
			 <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'shootingstar' ),
	'next_text' => __( 'Next &rarr;', 'shootingstar' ),
	'total' => $wp_query->max_num_pages,
  'add_args' => false
) );
?>
        </p>
      </div>
		</div>
    </div>
	<?php endif;
}
endif;

/**
 * Displays navigation to next/previous posts on single posts pages.
 *
*/
function shootingstar_prev_next($nav_id) { ?>
<?php $shootingstar_previous_post = get_adjacent_post( false, "", true );
$shootingstar_next_post = get_adjacent_post( false, "", false ); ?>
<div id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
	<div class="nav-wrapper">
<?php if ( !empty($shootingstar_previous_post) ) { ?>
  <p class="nav-previous"><a href="<?php echo esc_url(get_permalink($shootingstar_previous_post->ID)); ?>" title="<?php echo esc_attr($shootingstar_previous_post->post_title); ?>"><?php _e( '&larr; Previous post', 'shootingstar' ); ?></a></p>
<?php } if ( !empty($shootingstar_next_post) ) { ?>
	<p class="nav-next"><a href="<?php echo esc_url(get_permalink($shootingstar_next_post->ID)); ?>" title="<?php echo esc_attr($shootingstar_next_post->post_title); ?>"><?php _e( 'Next post &rarr;', 'shootingstar' ); ?></a></p>
<?php } ?>
   </div>
</div>
<?php } 

if ( ! function_exists( 'shootingstar_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
*/
function shootingstar_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'shootingstar' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'shootingstar' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<span><b class="fn">%1$s</b> %2$s</span>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author)', 'shootingstar' ) . '</span>' : ''
					);
					printf( '<time datetime="%2$s">%3$s</time>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						// translators: 1: date, 2: time
						sprintf( __( '%1$s at %2$s', 'shootingstar' ), get_comment_date(''), get_comment_time() )
					);
				?>
			</div><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'shootingstar' ); ?></p>
			<?php endif; ?>

			<div class="comment-content comment">
				<?php comment_text(); ?>
			 <div class="reply">
			   <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'shootingstar' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			   <?php edit_comment_link( __( 'Edit', 'shootingstar' ), '<p class="edit-link">', '</p>' ); ?>
			</div><!-- .comment-content -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch;
}
endif;

/**
 * Function for adding custom classes to the menu objects.
 *
*/
add_filter( 'wp_nav_menu_objects', 'shootingstar_filter_menu_class', 10, 2 );
function shootingstar_filter_menu_class( $objects, $args ) {

    $ids        = array();
    $parent_ids = array();
    $top_ids    = array();
    foreach ( $objects as $i => $object ) {

        if ( 0 == $object->menu_item_parent ) {
            $top_ids[$i] = $object;
            continue;
        }
 
        if ( ! in_array( $object->menu_item_parent, $ids ) ) {
            $objects[$i]->classes[] = 'first-menu-item';
            $ids[]          = $object->menu_item_parent;
        }
 
        if ( in_array( 'first-menu-item', $object->classes ) )
            continue;
 
        $parent_ids[$i] = $object->menu_item_parent;
    }
 
    $sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
 
    foreach ( $sanitized_parent_ids as $i => $id )
        $objects[$i]->classes[] = 'last-menu-item';
 
    return $objects; 
}

/**
 * Function for rendering CSS3 features in IE.
 *
*/
add_filter( 'wp_head' , 'shootingstar_pie' );
function shootingstar_pie() { ?>
<!--[if IE]>
<style type="text/css" media="screen">
#header, #wrapper-footer, #nav-below, #infscr-loading, .entry-content, .sidebar-widget, .search .navigation, .entry-headline-wrapper, .post-entry {
        behavior: url("<?php echo get_template_directory_uri() . '/css/pie/PIE.php'; ?>");
        zoom: 1;
}
</style>
<![endif]-->
<?php }

/**
 * Include the TGM_Plugin_Activation class.
 *  
*/
if ( current_user_can ( 'install_plugins' ) ) {
require_once get_template_directory() . '/class-tgm-plugin-activation.php'; 
add_action( 'shootingstar_register', 'shootingstar_my_theme_register_required_plugins' );

function shootingstar_my_theme_register_required_plugins() {

$plugins = array(
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => false,
		),
); 
 
$config = array(
		'domain'       => 'shootingstar',
    'menu'         => 'install-my-theme-plugins',
		'strings'    	 => array(
		'page_title'             => __( 'Install Recommended Plugins', 'shootingstar' ),
		'menu_title'             => __( 'Install Plugins', 'shootingstar' ),
		'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', 'shootingstar' ),
		'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', 'shootingstar' ),
		'button'                 => __( 'Install %s Now', 'shootingstar' ),
		'installing'             => __( 'Installing Plugin: %s', 'shootingstar' ),
		'oops'                   => __( 'Something went wrong with the plugin API.', 'shootingstar' ), // */
		'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', 'shootingstar' ),
		'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'shootingstar' ),
		'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', 'shootingstar' ),
		'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'shootingstar' ),
		'return'                 => __( 'Return to Recommended Plugins Installer', 'shootingstar' ),
),
); 
shootingstar_tgmpa( $plugins, $config ); 
}}

/**
 * WooCommerce custom template modifications.
 *  
*/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
function shootingstar_woocommerce_modifications() {
  remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 ); 
}  
add_action ( 'init', 'shootingstar_woocommerce_modifications' );
add_filter ( 'woocommerce_show_page_title', '__return_false' );
} ?>