<?php
/**
 * ShootingStar Theme Customizer.
 * @package ShootingStar
 * @since ShootingStar 2.0.0
*/
function shootingstar_customize_register($wp_customize){

$shootingstar_fonts = array(
			'default' => 'default',	
			'Abel' => 'Abel',			
			'Aclonica' => 'Aclonica',
			'Actor' => 'Actor',
			'Adamina' => 'Adamina',
			'Aldrich' => 'Aldrich',
			'Alegreya Sans' => 'Alegreya Sans',
			'Alice' => 'Alice',
			'Alike' => 'Alike',
			'Allan' => 'Allan',
			'Allerta' => 'Allerta',
      'Amarante' => 'Amarante',
			'Amaranth' => 'Amaranth',
      'Andika' => 'Andika',
			'Antic' => 'Antic',
			'Anton' => 'Anton',
			'Arimo' => 'Arimo',	
			'Artifika' => 'Artifika',
			'Arvo' => 'Arvo',
			'Bitter' => 'Bitter',
			'Brawler' => 'Brawler',
			'Buda' => 'Buda',	
      'Butcherman' => 'Butcherman',	
      'Cabin' => 'Cabin',
			'Candal' => 'Candal',
			'Cantarell' => 'Cantarell',	
      'Cherry Swash' => 'Cherry Swash',				
			'Chivo' => 'Chivo',			
			'Coda' => 'Coda',	
      'Concert One' => 'Concert One',		
			'Copse' => 'Copse',
			'Corben' => 'Corben',
			'Cousine' => 'Cousine',			
			'Coustard' => 'Coustard',
			'Covered By Your Grace' => 'Covered By Your Grace',
			'Crafty Girls' => 'Crafty Girls',
			'Crimson Text' => 'Crimson Text',
			'Crushed' => 'Crushed',
			'Cuprum' => 'Cuprum',
			'Damion' => 'Damion',
			'Dancing Script' => 'Dancing Script',
			'Dawning of a New Day' => 'Dawning of a New Day',
			'Days One' => 'Days One',
			'Delius' => 'Delius',
			'Delius Swash Caps' => 'Delius Swash Caps',
			'Delius Unicase' => 'Delius Unicase',
			'Didact Gothic' => 'Didact Gothic',
			'Dorsa' => 'Dorsa',
			'Dosis' => 'Dosis',
			'Droid Sans' => 'Droid Sans',
			'Droid Sans Mono' => 'Droid Sans Mono',
      'Droid Serif' => 'Droid Serif',
			'EB Garamond' => 'EB Garamond',
			'Expletus Sans' => 'Expletus Sans',
			'Fanwood Text' => 'Fanwood Text',
			'Federo' => 'Federo',
			'Fontdiner Swanky' => 'Fontdiner Swanky',
			'Forum' => 'Forum',
			'Francois One' => 'Francois One',
			'Gentium Basic' => 'Gentium Basic',
			'Gentium Book Basic' => 'Gentium Book Basic',
			'Geo' => 'Geo',
			'Geostar' => 'Geostar',
			'Geostar Fill' => 'Geostar Fill',
      'Gilda Display' => 'Gilda Display',
			'Give You Glory' => 'Give You Glory',
			'Gloria Hallelujah' => 'Gloria Hallelujah',
			'Goblin One' => 'Goblin One',
			'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
			'Gravitas One' => 'Gravitas One',
			'Gruppo' => 'Gruppo',
			'Hammersmith One' => 'Hammersmith One',
			'Hind' => 'Hind',
			'Holtwood One SC' => 'Holtwood One SC',
			'Homemade Apple' => 'Homemade Apple',
			'Inconsolata' => 'Inconsolata',
			'Indie Flower' => 'Indie Flower',
      'IM Fell English' => 'IM Fell English',
			'Irish Grover' => 'Irish Grover',
			'Irish Growler' => 'Irish Growler',
			'Istok Web' => 'Istok Web',
			'Judson' => 'Judson',
			'Julee' => 'Julee',
			'Just Another Hand' => 'Just Another Hand',
			'Just Me Again Down Here' => 'Just Me Again Down Here',
			'Kameron' => 'Kameron',
			'Kelly Slab' => 'Kelly Slab',
			'Kenia' => 'Kenia',
			'Kranky' => 'Kranky',
			'Kreon' => 'Kreon',
			'Kristi' => 'Kristi',
			'La Belle Aurore' => 'La Belle Aurore',
      'Lato' => 'Lato',
			'League Script' => 'League Script',
			'Leckerli One' => 'Leckerli One',
			'Lekton' => 'Lekton',
      'Lily Script One' => 'Lily Script One',
			'Limelight' => 'Limelight',
			'Lobster' => 'Lobster',
			'Lobster Two' => 'Lobster Two',
			'Lora' => 'Lora',
			'Love Ya Like A Sister' => 'Love Ya Like A Sister',
			'Loved by the King' => 'Loved by the King',
      'Lovers Quarrel' => 'Lovers Quarrel',
			'Luckiest Guy' => 'Luckiest Guy',
			'Maiden Orange' => 'Maiden Orange',
			'Mako' => 'Mako',
			'Marvel' => 'Marvel',
			'Maven Pro' => 'Maven Pro',
			'Meddon' => 'Meddon',
			'MedievalSharp' => 'MedievalSharp',
      'Medula One' => 'Medula One',
			'Megrim' => 'Megrim',
			'Merienda One' => 'Merienda One',
			'Merriweather' => 'Merriweather',
			'Metrophobic' => 'Metrophobic',
			'Michroma' => 'Michroma',
			'Miltonian Tattoo' => 'Miltonian Tattoo',
			'Miltonian' => 'Miltonian',
			'Modern Antiqua' => 'Modern Antiqua',
			'Molengo' => 'Molengo',
      'Monofett' => 'Monofett',
			'Monoton' => 'Monoton',
      'Montaga' => 'Montaga',
			'Montez' => 'Montez',
      'Montserrat' => 'Montserrat',
			'Mountains of Christmas' => 'Mountains of Christmas',
			'Muli' => 'Muli',
			'Neucha' => 'Neucha',
			'Neuton' => 'Neuton',
			'News Cycle' => 'News Cycle',
			'Nixie One' => 'Nixie One',
			'Nobile' => 'Nobile',
			'Noto Sans' => 'Noto Sans',
			'Nova Cut' => 'Nova Cut',
			'Nova Flat' => 'Nova Flat',
			'Nova Mono' => 'Nova Mono',
			'Nova Oval' => 'Nova Oval',
			'Nova Round' => 'Nova Round',
			'Nova Script' => 'Nova Script',
			'Nova Slim' => 'Nova Slim',
			'Nova Square' => 'Nova Square',
			'Numans' => 'Numans',
			'Nunito' => 'Nunito',
      'Open Sans' => 'Open Sans',
			'Oswald' => 'Oswald',
			'Over the Rainbow' => 'Over the Rainbow',
			'Ovo' => 'Ovo',
			'Oxygen' => 'Oxygen',
			'Pacifico' => 'Pacifico',
			'Passero One' => 'Passero One',
			'Passion One' => 'Passion One',
			'Patrick Hand' => 'Patrick Hand',
			'Paytone One' => 'Paytone One',
			'Permanent Marker' => 'Permanent Marker',
			'Philosopher' => 'Philosopher',
			'Play' => 'Play',
			'Playfair Display' => 'Playfair Display',
			'Podkova' => 'Podkova',
			'Poller One' => 'Poller One',
			'Pompiere' => 'Pompiere',
			'Prata' => 'Prata',
			'Prociono' => 'Prociono',
			'PT Sans' => 'PT Sans',
			'PT Sans Caption' => 'PT Sans Caption',
			'PT Sans Narrow' => 'PT Sans Narrow',
			'PT Serif' => 'PT Serif',
			'PT Serif Caption' => 'PT Serif Caption',
			'Puritan' => 'Puritan',
			'Quattrocento' => 'Quattrocento',
			'Quattrocento Sans' => 'Quattrocento Sans',
			'Questrial' => 'Questrial',
			'Radley' => 'Radley',
			'Raleway' => 'Raleway', 
      'Rationale' => 'Rationale',
			'Redressed' => 'Redressed',
      'Reenie Beanie' => 'Reenie Beanie', 
      'Roboto' => 'Roboto',
      'Roboto Condensed' => 'Roboto Condensed',
			'Rock Salt' => 'Rock Salt',
			'Rochester' => 'Rochester',
			'Rokkitt' => 'Rokkitt',
			'Rosario' => 'Rosario',
			'Ruslan Display' => 'Ruslan Display',
      'Sancreek' => 'Sancreek',
			'Sansita One' => 'Sansita One',
			'Schoolbell' => 'Schoolbell',
			'Shadows Into Light' => 'Shadows Into Light',
			'Shanti' => 'Shanti',
			'Short Stack' => 'Short Stack',
			'Sigmar One' => 'Sigmar One',
			'Six Caps' => 'Six Caps',
			'Slackey' => 'Slackey',
			'Smokum' => 'Smokum',
			'Smythe' => 'Smythe',
			'Sniglet' => 'Sniglet',
			'Snippet' => 'Snippet',
			'Sorts Mill Goudy' => 'Sorts Mill Goudy',
			'Special Elite' => 'Special Elite',
			'Spinnaker' => 'Spinnaker',
			'Stardos Stencil' => 'Stardos Stencil',
			'Sue Ellen Francisco' => 'Sue Ellen Francisco',
			'Sunshiney' => 'Sunshiney',
			'Swanky and Moo Moo' => 'Swanky and Moo Moo',
			'Syncopate' => 'Syncopate',
			'Tangerine' => 'Tangerine',
			'Tenor Sans' => 'Tenor Sans',
			'Terminal Dosis Light' => 'Terminal Dosis Light',
			'Tinos' => 'Tinos',
			'Titillium Web' => 'Titillium Web',
			'Tulpen One' => 'Tulpen One',
			'Ubuntu' => 'Ubuntu',
			'Ultra' => 'Ultra',
      'UnifrakturCook' => 'UnifrakturCook',
			'UnifrakturMaguntia' => 'UnifrakturMaguntia',
      'Unkempt' => 'Unkempt',
			'Unna' => 'Unna',
			'Varela' => 'Varela',
			'Varela Round' => 'Varela Round',
			'Vibur' => 'Vibur',
			'Vidaloka' => 'Vidaloka',
			'Volkhov' => 'Volkhov',
			'Vollkorn' => 'Vollkorn',
			'Voltaire' => 'Voltaire',
			'VT323' => 'VT323',
			'Waiting for the Sunrise' => 'Waiting for the Sunrise',
			'Wallpoet' => 'Wallpoet',
			'Walter Turncoat' => 'Walter Turncoat',
			'Wire One' => 'Wire One',
			'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
			'Yellowtail' => 'Yellowtail',
			'Yeseva One' => 'Yeseva One',
			'Zeyada' => 'Zeyada');
    
    $wp_customize->add_section('shootingstar_general_settings', array(
        'title'    => __('ShootingStar General Settings', 'shootingstar'),
        'description' => '',
        'priority' => 120,
    ));
    $wp_customize->add_section('shootingstar_header_settings', array(
        'title'    => __('ShootingStar Header Settings', 'shootingstar'),
        'description' => '',
        'priority' => 130,
    ));
    $wp_customize->add_section('shootingstar_posts_settings', array(
        'title'    => __('ShootingStar Posts Settings', 'shootingstar'),
        'description' => '',
        'priority' => 140,
    ));
    $wp_customize->add_section('shootingstar_post_entries_settings', array(
        'title'    => __('ShootingStar Post Entries Settings', 'shootingstar'),
        'description' => '',
        'priority' => 150,
    ));
    $wp_customize->add_section('shootingstar_font_settings', array(
        'title'    => __('ShootingStar Font Settings', 'shootingstar'),
        'description' => '',
        'priority' => 160,
    ));
 
    //  =============================
    //  = Color Scheme              =
    //  =============================
    $wp_customize->add_setting('shootingstar_color_scheme', array(
        'default'        => 'Blue (default)',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_color_scheme_control', array(
        'label'      => __('Color Scheme', 'shootingstar'),
        'section'    => 'shootingstar_general_settings',
        'settings'   => 'shootingstar_color_scheme',
        'type'       => 'radio',
        'choices'    => array(
            'Blue (default)' => __( 'Blue (default)' , 'shootingstar' ),
            'Orange' => __( 'Orange' , 'shootingstar' ),
            'Turquoise' => __( 'Turquoise' , 'shootingstar' ),
        ),
    ));
    
    //  =============================
    //  = Background Pattern        =
    //  =============================
    $wp_customize->add_setting('shootingstar_display_background_pattern', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_background_pattern_control', array(
        'label'      => __('Background Pattern', 'shootingstar'),
        'section'    => 'shootingstar_general_settings',
        'settings'   => 'shootingstar_display_background_pattern',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  ==============================
    //  = Background Pattern Opacity =
    //  ==============================
    $wp_customize->add_setting('shootingstar_background_pattern_opacity', array(
        'default'        => 'Default',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_background_pattern_opacity_control', array(
        'label'      => __('Background Pattern Opacity', 'shootingstar'),
        'section'    => 'shootingstar_general_settings',
        'settings'   => 'shootingstar_background_pattern_opacity',
        'type'       => 'radio',
        'choices'    => array(
            'Default' => __( 'Default' , 'shootingstar' ),
            '100' => '100',
            '90' => '90',
            '80' => '80',
            '70' => '70',
            '60' => '60',
            '50' => '50',
            '40' => '40',
            '30' => '30',
            '20' => '20',
            '10' => '10',
        ),
    ));
    
    //  =============================
    //  = Display Right Sidebar     =
    //  =============================
    $wp_customize->add_setting('shootingstar_display_sidebar', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_sidebar_control', array(
        'label'      => __('Display Right Sidebar', 'shootingstar'),
        'section'    => 'shootingstar_general_settings',
        'settings'   => 'shootingstar_display_sidebar',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  =============================
    //  = Display Scroll-top Button =
    //  =============================
    $wp_customize->add_setting('shootingstar_display_scroll_top', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_scroll_top_control', array(
        'label'      => __('Display Scroll-top Button', 'shootingstar'),
        'section'    => 'shootingstar_general_settings',
        'settings'   => 'shootingstar_display_scroll_top',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  =============================
    //  = Favicon                   =
    //  =============================
    $wp_customize->add_setting('shootingstar_favicon_url', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_uri',
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'shootingstar_favicon_url_control', array(
        'label'    => __('Favicon', 'shootingstar'),
        'section'  => 'shootingstar_general_settings',
        'settings' => 'shootingstar_favicon_url',
    )));
    
    //  =============================
    //  = Display Header Image      =
    //  =============================
    $wp_customize->add_setting('shootingstar_display_header_image', array(
        'default'        => 'Everywhere',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_header_image_control', array(
        'label'      => __('Display Header Image', 'shootingstar'),
        'section'    => 'header_image',
        'settings'   => 'shootingstar_display_header_image',
        'type'       => 'radio',
        'choices'    => array(
            'Everywhere' => __( 'Everywhere' , 'shootingstar' ),
            'Only on Homepage' => __( 'Only on Homepage' , 'shootingstar' ),
        ),
    ));
    
    //  =============================
    //  = Header Logo               =
    //  =============================
    $wp_customize->add_setting('shootingstar_logo_url', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_uri',
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'shootingstar_logo_url_control', array(
        'label'    => __('Header Logo', 'shootingstar'),
        'section'  => 'shootingstar_header_settings',
        'settings' => 'shootingstar_logo_url',
    )));
    
    //  =============================
    //  = Display Site Description  =
    //  =============================
    $wp_customize->add_setting('shootingstar_display_site_description', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_site_description_control', array(
        'label'      => __('Display Site Description', 'shootingstar'),
        'section'    => 'shootingstar_header_settings',
        'settings'   => 'shootingstar_display_site_description',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  =============================
    //  = Display Search Form       =
    //  =============================
    $wp_customize->add_setting('shootingstar_display_search_form', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_search_form_control', array(
        'label'      => __('Display Search Form', 'shootingstar'),
        'section'    => 'shootingstar_header_settings',
        'settings'   => 'shootingstar_display_search_form',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  =============================
    //  = Fixed Main Header Menu    =
    //  =============================
    $wp_customize->add_setting('shootingstar_fixed_menu', array(
        'default'        => 'Enable',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_fixed_menu_control', array(
        'label'      => __('Fixed Main Header Menu', 'shootingstar'),
        'section'    => 'nav',
        'settings'   => 'shootingstar_fixed_menu',
        'type'       => 'radio',
        'choices'    => array(
            'Enable' => __( 'Enable' , 'shootingstar' ),
            'Disable' => __( 'Disable' , 'shootingstar' ),
        ),
    ));
    
    //  =============================
    //  = Display Home Icon in Menu =
    //  =============================
    $wp_customize->add_setting('shootingstar_display_home_icon', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_home_icon_control', array(
        'label'      => __('Display Home Icon in Main Header Menu', 'shootingstar'),
        'section'    => 'nav',
        'settings'   => 'shootingstar_display_home_icon',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  =============================
    //  = Postal Address            =
    //  =============================
    $wp_customize->add_setting('shootingstar_header_address', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_header_address_control', array(
        'label'      => __('Postal Address', 'shootingstar'),
        'section'    => 'shootingstar_header_settings',
        'settings'   => 'shootingstar_header_address',
    ));
    
    //  =============================
    //  = Email Address             =
    //  =============================
    $wp_customize->add_setting('shootingstar_header_email', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_header_email_control', array(
        'label'      => __('Email Address', 'shootingstar'),
        'section'    => 'shootingstar_header_settings',
        'settings'   => 'shootingstar_header_email',
    ));
    
    //  =============================
    //  = Phone Number              =
    //  =============================
    $wp_customize->add_setting('shootingstar_header_phone', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_header_phone_control', array(
        'label'      => __('Phone Number', 'shootingstar'),
        'section'    => 'shootingstar_header_settings',
        'settings'   => 'shootingstar_header_phone',
    ));
    
    //  =============================
    //  = Skype Name                =
    //  =============================
    $wp_customize->add_setting('shootingstar_header_skype', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_header_skype_control', array(
        'label'      => __('Skype Name', 'shootingstar'),
        'section'    => 'shootingstar_header_settings',
        'settings'   => 'shootingstar_header_skype',
    ));
    
    //  ==========================================
    //  = Display Featured Image on single posts =
    //  ==========================================
    $wp_customize->add_setting('shootingstar_display_image_post', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_image_post_control', array(
        'label'      => __('Display Featured Image on single posts', 'shootingstar'),
        'section'    => 'shootingstar_posts_settings',
        'settings'   => 'shootingstar_display_image_post',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  ====================================
    //  = Display Meta Box on single posts =
    //  ====================================
    $wp_customize->add_setting('shootingstar_display_meta_post', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_meta_post_control', array(
        'label'      => __('Display Meta Box on single posts', 'shootingstar'),
        'section'    => 'shootingstar_posts_settings',
        'settings'   => 'shootingstar_display_meta_post',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  =================================
    //  = Next/Previous Post Navigation =
    //  =================================
    $wp_customize->add_setting('shootingstar_next_preview_post', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_next_preview_post_control', array(
        'label'      => __('Next/Previous Post Navigation', 'shootingstar'),
        'section'    => 'shootingstar_posts_settings',
        'settings'   => 'shootingstar_next_preview_post',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  ============================================
    //  = Display About Author box on single posts =
    //  ============================================
    $wp_customize->add_setting('shootingstar_display_about_author', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_about_author_control', array(
        'label'      => __('Display About Author box on single posts', 'shootingstar'),
        'section'    => 'shootingstar_posts_settings',
        'settings'   => 'shootingstar_display_about_author',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  =============================
    //  = Infinite Scroll           =
    //  =============================
    $wp_customize->add_setting('shootingstar_infinite_scroll', array(
        'default'        => 'Enable',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_infinite_scroll_control', array(
        'label'      => __('Infinite Scroll', 'shootingstar'),
        'section'    => 'shootingstar_post_entries_settings',
        'settings'   => 'shootingstar_infinite_scroll',
        'type'       => 'radio',
        'choices'    => array(
            'Enable' => __( 'Enable' , 'shootingstar' ),
            'Disable' => __( 'Disable' , 'shootingstar' ),
        ),
    ));
    
    //  ====================================
    //  = Display Meta Box on Post Entries =
    //  ====================================
    $wp_customize->add_setting('shootingstar_display_meta_post_entry', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_display_meta_post_entry_control', array(
        'label'      => __('Display Meta Box on Post Entries', 'shootingstar'),
        'section'    => 'shootingstar_post_entries_settings',
        'settings'   => 'shootingstar_display_meta_post_entry',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'shootingstar' ),
            'Hide' => __( 'Hide' , 'shootingstar' ),
        ),
    ));
    
    //  ===============================
    //  = Featured Images Size        =
    //  ===============================
    $wp_customize->add_setting('shootingstar_featured_image_size', array(
        'default'        => 'Large',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_featured_image_size_control', array(
        'label'      => __('Featured Images Size', 'shootingstar'),
        'section'    => 'shootingstar_post_entries_settings',
        'settings'   => 'shootingstar_featured_image_size',
        'type'       => 'radio',
        'choices'    => array(
            'Large' => __( 'Large' , 'shootingstar' ),
            'Small' => __( 'Small' , 'shootingstar' ),
        ),
    ));
    
    //  ===============================
    //  = Content/Excerpt Displaying  =
    //  ===============================
    $wp_customize->add_setting('shootingstar_content_archives', array(
        'default'        => 'Excerpt',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_content_archives_control', array(
        'label'      => __('Content/Excerpt Displaying', 'shootingstar'),
        'section'    => 'shootingstar_post_entries_settings',
        'settings'   => 'shootingstar_content_archives',
        'type'       => 'radio',
        'choices'    => array(
            'Excerpt' => __( 'Excerpt' , 'shootingstar' ),
            'Content' => __( 'Content' , 'shootingstar' ),
        ),
    ));
    
    //  ==========================
    //  = Excerpt Length         =
    //  ==========================
    $wp_customize->add_setting('shootingstar_excerpt_length', array(
        'default'        => '40',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
    ));
 
    $wp_customize->add_control('shootingstar_excerpt_length_control', array(
        'label'      => __('Excerpt Length', 'shootingstar'),
        'section'    => 'shootingstar_post_entries_settings',
        'settings'   => 'shootingstar_excerpt_length',
    ));
    
    //  =============================
    //  = Body font                 =
    //  =============================
     $wp_customize->add_setting('shootingstar_body_google_fonts', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
 
    ));
    $wp_customize->add_control( 'shootingstar_body_google_fonts_control', array(
        'settings' => 'shootingstar_body_google_fonts',
        'label'   => __('Body font', 'shootingstar'),
        'section' => 'shootingstar_font_settings',
        'type'    => 'select',
        'choices'    => $shootingstar_fonts,
    ));
    
    //  =============================
    //  = Site Title font           =
    //  =============================
     $wp_customize->add_setting('shootingstar_headings_google_fonts', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
 
    ));
    $wp_customize->add_control( 'shootingstar_headings_google_fonts_control', array(
        'settings' => 'shootingstar_headings_google_fonts',
        'label'   => __('Site Title font', 'shootingstar'),
        'section' => 'shootingstar_font_settings',
        'type'    => 'select',
        'choices'    => $shootingstar_fonts,
    ));
    
    //  =============================
    //  = Site Description font     =
    //  =============================
     $wp_customize->add_setting('shootingstar_description_google_fonts', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
 
    ));
    $wp_customize->add_control( 'shootingstar_description_google_fonts_control', array(
        'settings' => 'shootingstar_description_google_fonts',
        'label'   => __('Site Description font', 'shootingstar'),
        'section' => 'shootingstar_font_settings',
        'type'    => 'select',
        'choices'    => $shootingstar_fonts,
    ));
    
    //  =============================
    //  = Page/Post Headlines font  =
    //  =============================
     $wp_customize->add_setting('shootingstar_headline_google_fonts', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
 
    ));
    $wp_customize->add_control( 'shootingstar_headline_google_fonts_control', array(
        'settings' => 'shootingstar_headline_google_fonts',
        'label'   => __('Page/Post Headlines font', 'shootingstar'),
        'section' => 'shootingstar_font_settings',
        'type'    => 'select',
        'choices'    => $shootingstar_fonts,
    ));
    
    //  =============================
    //  = Post Entry Headline font  =
    //  =============================
     $wp_customize->add_setting('shootingstar_postentry_google_fonts', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
 
    ));
    $wp_customize->add_control( 'shootingstar_postentry_google_fonts_control', array(
        'settings' => 'shootingstar_postentry_google_fonts',
        'label'   => __('Post Entry Headline font', 'shootingstar'),
        'section' => 'shootingstar_font_settings',
        'type'    => 'select',
        'choices'    => $shootingstar_fonts,
    ));
    
    //  ========================================
    //  = Sidebar/Footer Widget Headlines font =
    //  ========================================
     $wp_customize->add_setting('shootingstar_sidebar_google_fonts', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
 
    ));
    $wp_customize->add_control( 'shootingstar_sidebar_google_fonts_control', array(
        'settings' => 'shootingstar_sidebar_google_fonts',
        'label'   => __('Sidebar/Footer Widget Headlines font', 'shootingstar'),
        'section' => 'shootingstar_font_settings',
        'type'    => 'select',
        'choices'    => $shootingstar_fonts,
    ));
    
    //  =============================
    //  = Main Header Menu font     =
    //  =============================
     $wp_customize->add_setting('shootingstar_menu_google_fonts', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'shootingstar_sanitize_text',
 
    ));
    $wp_customize->add_control( 'shootingstar_menu_google_fonts_control', array(
        'settings' => 'shootingstar_menu_google_fonts',
        'label'   => __('Main Header Menu font', 'shootingstar'),
        'section' => 'shootingstar_font_settings',
        'type'    => 'select',
        'choices'    => $shootingstar_fonts,
    ));
}
 
add_action('customize_register', 'shootingstar_customize_register');

/**
 * Sanitize URIs
*/
function shootingstar_sanitize_uri($uri) {
	if('' === $uri){
		return '';
	}
	return esc_url_raw($uri);
}

/**
 * Sanitize Texts
*/
function shootingstar_sanitize_text($str) {
	if('' === $str){
		return '';
	}
	return sanitize_text_field( $str);
} ?>