<?php
/**
 * Headerdata of Theme Customizer.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/  

// Additional CSS
if(	!is_admin()){
function shootingstar_fonts_include() {
// Google Fonts
$bodyfont = get_theme_mod('shootingstar_body_google_fonts');
$headingfont = get_theme_mod('shootingstar_headings_google_fonts');
$descriptionfont = get_theme_mod('shootingstar_description_google_fonts');
$headlinefont = get_theme_mod('shootingstar_headline_google_fonts');
$postentryfont = get_theme_mod('shootingstar_postentry_google_fonts');
$sidebarfont = get_theme_mod('shootingstar_sidebar_google_fonts');
$menufont = get_theme_mod('shootingstar_menu_google_fonts');

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('shootingstar-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('shootingstar-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('shootingstar-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('shootingstar-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('shootingstar-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('shootingstar-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('shootingstar-google-font8', $menufonturl);
		 }
}
add_action( 'wp_enqueue_scripts', 'shootingstar_fonts_include' );
}

// Additional CSS
function shootingstar_css_include() {        
		if ( get_theme_mod('shootingstar_color_scheme') == 'Orange' ){
			wp_enqueue_style('shootingstar-style-orange', get_template_directory_uri().'/css/colors/orange.css');
		}
		if ( get_theme_mod('shootingstar_color_scheme') == 'Turquoise' ){
			wp_enqueue_style('shootingstar-style-turquoise', get_template_directory_uri().'/css/colors/turquoise.css');
		}
}
add_action( 'wp_enqueue_scripts', 'shootingstar_css_include' );

// Outputs additional CSS based on the Theme Customizer settings.
function shootingstar_styles_method() {
	wp_enqueue_style( 'shootingstar-style', get_stylesheet_uri() );
        $background_pattern_opacity = get_theme_mod('shootingstar_background_pattern_opacity');
        $display_sidebar = get_theme_mod('shootingstar_display_sidebar');
        $display_search_form = get_theme_mod('shootingstar_display_search_form');
        $display_home_icon = get_theme_mod('shootingstar_display_home_icon');
        $display_meta_post_entry = get_theme_mod('shootingstar_display_meta_post_entry');
        $bodyfont = get_theme_mod('shootingstar_body_google_fonts');
        $headingfont = get_theme_mod('shootingstar_headings_google_fonts');
        $descriptionfont = get_theme_mod('shootingstar_description_google_fonts');
        $headlinefont = get_theme_mod('shootingstar_headline_google_fonts');
        $postentryfont = get_theme_mod('shootingstar_postentry_google_fonts');
        $sidebarfont = get_theme_mod('shootingstar_sidebar_google_fonts');
        $menufont = get_theme_mod('shootingstar_menu_google_fonts'); 

// Background Pattern Opacity
if ($background_pattern_opacity != '' && $background_pattern_opacity != '100' && $background_pattern_opacity != 'Default') {
        $background_pattern_opacity_custom_css = "#wrapper .pattern { opacity: 0.$background_pattern_opacity; filter: alpha(opacity=$background_pattern_opacity); }";
        wp_add_inline_style( 'shootingstar-style', $background_pattern_opacity_custom_css );
}
elseif ($background_pattern_opacity == '100') {
        $background_pattern_opacity_custom_css = "#wrapper .pattern { opacity: 1; filter: alpha(opacity=100); }";
        wp_add_inline_style( 'shootingstar-style', $background_pattern_opacity_custom_css );
}

// Display sidebar
if ($display_sidebar == 'Hide') {
        $display_sidebar_custom_css = "#wrapper #container #main-content #content { width: 100%; }";
        wp_add_inline_style( 'shootingstar-style', $display_sidebar_custom_css );
}

// Display header Search Form - header content width
if ($display_search_form == 'Hide') {
        $display_search_form_custom_css = "#wrapper #header .header-content .site-title, #wrapper #header .header-content .site-description, #wrapper #header .header-content .header-logo { max-width: 100%; }";
        wp_add_inline_style( 'shootingstar-style', $display_search_form_custom_css );
}

// Display Home Icon in Menu
if ($display_home_icon == 'Hide') {
        $display_home_icon_custom_css = ".menu-box #nav { border-left: 1px solid #535353; float: left; } .rtl .menu-box #nav { border-left: none; border-right: 1px solid #535353; float: right; } html #wrapper .selectnav { width: 100% !important; }";
        wp_add_inline_style( 'shootingstar-style', $display_home_icon_custom_css );
}

// Display Meta Box on post entries - styling
if ($display_meta_post_entry == 'Hide') {
        $display_meta_post_entry_custom_css = "#wrapper #main-content .post-entry .attachment-post-thumbnail { margin-bottom: 25px; }";
        wp_add_inline_style( 'shootingstar-style', $display_meta_post_entry_custom_css );
}

// Body font
if ($bodyfont != 'default' && $bodyfont != '') {
        $bodyfont_custom_css = "html body, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper button, #wrapper textarea, #wrapper select, #wrapper #content .breadcrumb-navigation, #wrapper #main-content .post-meta { font-family: $bodyfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'shootingstar-style', $bodyfont_custom_css );
}

// Site title font
if ($headingfont != 'default' && $headingfont != '') {
        $headingfont_custom_css = "#wrapper #header .site-title { font-family: $headingfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'shootingstar-style', $headingfont_custom_css );
}

// Site description font
if ($descriptionfont != 'default' && $descriptionfont != '') {
        $descriptionfont_custom_css = "#wrapper #header .site-description { font-family: $descriptionfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'shootingstar-style', $descriptionfont_custom_css );
}

// Page/post headlines font
if ($headlinefont != 'default' && $headlinefont != '') {
        $headlinefont_custom_css = "#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading, #wrapper #comments .entry-headline { font-family: $headlinefont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'shootingstar-style', $headlinefont_custom_css );
}

// Post entry headline font
if ($postentryfont != 'default' && $postentryfont != '') {
        $postentryfont_custom_css = "#wrapper #main-content .post-entry .post-entry-headline { font-family: $postentryfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'shootingstar-style', $postentryfont_custom_css );
}

// Sidebar and Footer widget headlines font
if ($sidebarfont != 'default' && $sidebarfont != '') {
        $sidebarfont_custom_css = "#wrapper #container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: $sidebarfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'shootingstar-style', $sidebarfont_custom_css );
}

// Main Header menu font
if ($menufont != 'default' && $menufont != '') {
        $menufont_custom_css = "#wrapper #header .menu-box ul li a { font-family: $menufont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'shootingstar-style', $menufont_custom_css );
}

}
add_action( 'wp_enqueue_scripts', 'shootingstar_styles_method' );
?>