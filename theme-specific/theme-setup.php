<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'NETMIX_THEME_FREE' ) ) {
	define( 'NETMIX_THEME_FREE', false );
}
if ( ! defined( 'NETMIX_THEME_FREE_WP' ) ) {
	define( 'NETMIX_THEME_FREE_WP', false );
}

// If this theme is a part of Envato Elements
if ( ! defined( 'NETMIX_THEME_IN_ENVATO_ELEMENTS' ) ) {
	define( 'NETMIX_THEME_IN_ENVATO_ELEMENTS', false );
}

// If this theme uses multiple skins
if ( ! defined( 'NETMIX_ALLOW_SKINS' ) ) {
	define( 'NETMIX_ALLOW_SKINS', false );
}
if ( ! defined( 'NETMIX_DEFAULT_SKIN' ) ) {
	define( 'NETMIX_DEFAULT_SKIN', 'default' );
}



// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
//-------------------------------------------------------------------------
$GLOBALS['NETMIX_STORAGE'] = array(

	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'      => 'env-ancora',

	// Generate Personal token from Envato to automatic upgrade theme
	'upgrade_token_url'  => '//build.envato.com/create-token/?default=t&purchase:download=t&purchase:list=t',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => '//netmix.ancorathemes.com',
	'theme_doc_url'      => '//netmix.ancorathemes.com/doc',

	'theme_rate_url'     => '//themeforest.net/download',

	'theme_custom_url' => '//themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themedash',

	'theme_download_url'=> 'https://1.envato.market/c/1262870/275988/4415?subId1=ancora&u=themeforest.net/item/netmix-broadband-telecom-wordpress-theme/23974347?s_rank=1',        // Ancora

	'theme_support_url'  => '//themerex.net/support/',                    // Ancora



	'theme_video_url'    => '//www.youtube.com/channel/UCdIjRh7-lPVHqTTKpaf8PLA',   // Ancora


	'theme_privacy_url'  => '//ancorathemes.com/privacy-policy/',                   // Ancora


	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By size
		'xxl'        => array( 'max' => 1679 ),
		'xl'         => array( 'max' => 1439 ),
		'lg'         => array( 'max' => 1279 ),
		'md_over'    => array( 'min' => 1024 ),
		'md'         => array( 'max' => 1023 ),
		'sm'         => array( 'max' => 767 ),
		'sm_wp'      => array( 'max' => 600 ),
		'xs'         => array( 'max' => 479 ),
		// By device
		'wide'       => array(
			'min' => 2160
		),
		'desktop'    => array(
			'min' => 1680,
			'max' => 2159,
		),
		'notebook'   => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'     => array(
			'min' => 768,
			'max' => 1279,
		),
		'not_mobile' => array(
			'min' => 768
		),
		'mobile'     => array(
			'max' => 767
		),
	),
);



// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
$netmix_theme_required_plugins_group = esc_html__( 'Core', 'netmix' );
$netmix_theme_required_plugins = array(
	// Section: "CORE" (required plugins)
	// DON'T COMMENT OR REMOVE NEXT LINES!
	'trx_addons'         => array(
		'title'       => esc_html__( 'ThemeREX Addons', 'netmix' ),
		'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'netmix' ),
		'required'    => true,
		'logo'        => 'logo.png',
		'group'       => $netmix_theme_required_plugins_group,
	),
);

$netmix_theme_required_plugins['trx_updater'] = array(
	'title'       => esc_html__( 'ThemeREX Updater', 'netmix' ),
	'description' => esc_html__( "Update theme and theme-specific plugins from developer's upgrade server.", 'netmix' ),
	'required'    => true,
	'logo'        => 'trx_updater.png',
	'group'       => $netmix_theme_required_plugins_group,
);


// Section: "PAGE BUILDERS"
$netmix_theme_required_plugins_group = esc_html__( 'Page Builders', 'netmix' );
$netmix_theme_required_plugins['elementor'] = array(
	'title'       => esc_html__( 'Elementor', 'netmix' ),
	'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'netmix' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $netmix_theme_required_plugins_group,
);
$netmix_theme_required_plugins['gutenberg'] = array(
	'title'       => esc_html__( 'Gutenberg', 'netmix' ),
	'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'netmix' ),
	'required'    => false,
	'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
	'logo'        => 'logo.png',
	'group'       => $netmix_theme_required_plugins_group,
);


// Section: "E-COMMERCE"
$netmix_theme_required_plugins_group = esc_html__( 'E-Commerce', 'netmix' );
$netmix_theme_required_plugins['woocommerce']              = array(
	'title'       => esc_html__( 'WooCommerce', 'netmix' ),
	'description' => esc_html__( "Connect the store to your website and start selling now", 'netmix' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $netmix_theme_required_plugins_group,
);
$netmix_theme_required_plugins['elegro-payment']              = array(
	'title'       => esc_html__( 'Elegro Crypto Payment', 'netmix' ),
	'description' => esc_html__( "Extends WooCommerce Payment Gateways with an elegro Crypto Payment", 'netmix' ),
	'required'    => false,
	'logo'        => 'elegro-payment.png',
	'group'       => $netmix_theme_required_plugins_group,
);
// Section: "SOCIALS & COMMUNITIES"
$netmix_theme_required_plugins_group = esc_html__( 'Socials and Communities', 'netmix' );

// Section: "EVENTS & TIMELINES"
$netmix_theme_required_plugins_group = esc_html__( 'Events and Appointments', 'netmix' );

// Section: "CONTENT"
$netmix_theme_required_plugins_group = esc_html__( 'Content', 'netmix' );
$netmix_theme_required_plugins['contact-form-7'] = array(
	'title'       => esc_html__( 'Contact Form 7', 'netmix' ),
	'description' => esc_html__( "CF7 allows you to create an unlimited number of contact forms", 'netmix' ),
	'required'    => false,
	'logo'        => 'logo.jpg',
	'group'       => $netmix_theme_required_plugins_group,
);
$netmix_theme_required_plugins['wp-gdpr-compliance'] = array(
	'title'       => esc_html__( 'Cookie Information', 'netmix' ),
	'description' => esc_html__( "Allow visitors to decide for themselves what personal data they want to store on your site", 'netmix' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $netmix_theme_required_plugins_group,
);
if ( ! NETMIX_THEME_FREE ) {
	$netmix_theme_required_plugins['essential-grid']             = array(
		'title'       => esc_html__( 'Essential Grid', 'netmix' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $netmix_theme_required_plugins_group,
	);
	$netmix_theme_required_plugins['revslider']                  = array(
		'title'       => esc_html__( 'Revolution Slider', 'netmix' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $netmix_theme_required_plugins_group,
	);
}

// Section: "OTHER"
$netmix_theme_required_plugins_group = esc_html__( 'Other', 'netmix' );

// Add plugins list to the global storage
$GLOBALS['NETMIX_STORAGE']['required_plugins'] = $netmix_theme_required_plugins;



// THEME-SPECIFIC BLOG LAYOUTS
//----------------------------------------------
$netmix_theme_blog_styles = array(
	'excerpt' => array(
		'title'   => esc_html__( 'Standard', 'netmix' ),
		'archive' => 'index-excerpt',
		'item'    => 'content-excerpt',
		'styles'  => 'excerpt',
	),
	'classic' => array(
		'title'   => esc_html__( 'Classic', 'netmix' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'classic',
	),
);
if ( ! NETMIX_THEME_FREE ) {
	$netmix_theme_blog_styles['masonry']   = array(
		'title'   => esc_html__( 'Masonry', 'netmix' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'masonry',
	);
	$netmix_theme_blog_styles['portfolio'] = array(
		'title'   => esc_html__( 'Portfolio', 'netmix' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio',
		'columns' => array( 2, 3, 4 ),
		'styles'  => 'portfolio',
	);
	$netmix_theme_blog_styles['gallery']   = array(
		'title'   => esc_html__( 'Gallery', 'netmix' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio-gallery',
		'columns' => array( 2, 3, 4 ),
		'styles'  => array( 'portfolio', 'gallery' ),
	);
	$netmix_theme_blog_styles['chess']     = array(
		'title'   => esc_html__( 'Chess', 'netmix' ),
		'archive' => 'index-chess',
		'item'    => 'content-chess',
		'columns' => array( 1, 2, 3 ),
		'styles'  => 'chess',
	);
}

// Add list of blog styles to the global storage
$GLOBALS['NETMIX_STORAGE']['blog_styles'] = $netmix_theme_blog_styles;


// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'netmix_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'netmix_customizer_theme_setup1', 1 );
	function netmix_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		netmix_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',                    // none  - use separate options for the main and the child-theme
																		// child - duplicate theme options from the main theme to the child-theme only
																		// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',                     // Refresh method for preview area in the Appearance - Customize:
																		// auto - refresh preview area on change each field with Theme Options
																		// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,                          // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,                       // Place 'comment' field after the 'name' and 'email'

				'show_author_avatar'     => true,                       // Display author's avatar in the post meta

				'icons_selector'         => 'internal',                 // Icons selector in the shortcodes:
																		// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',                    // Type of icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present icons
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',                    // Type of socials icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present social networks
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'check_min_version'      => true,                       // Check if exists a .min version of .css and .js and return path to it
																		// instead the path to the original file
																		// (if debug_mode is on and modification time of the original file < time of the .min file)

				'autoselect_menu'        => true,                      // Show any menu if no menu selected in the location 'main_menu'
																		// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,                      // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,                       // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,                      // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,                      // Allow to use theme-specific image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,                       // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,                      // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
																		// In the Page Options this styles are present always
																		// (can be removed if filter 'netmix_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,                      // Add arrows on the single attachment page to navigate to the prev/next attachment

				'gutenberg_safe_mode'    => array(),                    // 'vc', 'elementor' - Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)

				'gutenberg_add_context'  => false,                      // Add context to the Gutenberg editor styles with our method (if true - use if any problem with editor styles) or use native Gutenberg way via add_editor_style() (if false - used by default)

				'allow_gutenberg_blocks' => true,                       // Allow our shortcodes and widgets as blocks in the Gutenberg (not ready yet - in the development now)

				'subtitle_above_title'   => true,                       // Put subtitle above the title in the shortcodes

				'add_hide_on_xxx'        => 'replace',                  // Add our breakpoints to the Responsive section of each element
																		// 'add' - add our breakpoints after Elementor's
																		// 'replace' - add our breakpoints instead Elementor's
																		// 'none' - don't add our breakpoints (using only Elementor's)
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'

		netmix_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Barlow',
					'family' => 'sans-serif',
					'styles' => '300,300italic,400,400italic,500,500italic,600,600italic,700,700italic',     // Parameter 'style' used only for the Google fonts
				),
				// Font-face packed with theme
				array(
					'name'   => 'Montserrat',
					'family' => 'sans-serif',
					'styles' => '300,300italic,400,400italic,500,500italic,600,600italic,700,700italic',     // Parameter 'style' used only for the Google fonts
				),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		netmix_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags
		// Attention! Font name in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!




		netmix_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'netmix' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'netmix' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.6em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.1em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'netmix' ),
					'font-family'     => '"Barlow",sans-serif',
					'font-size'       => '4.375rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1em',
					'margin-bottom'   => '0.63em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'netmix' ),
					'font-family'     => '"Barlow",sans-serif',
					'font-size'       => '3.75rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '1.1em',
					'margin-bottom'   => '0.63em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'netmix' ),
					'font-family'     => '"Barlow",sans-serif',
					'font-size'       => '2.8125rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.2em',
					'margin-bottom'   => '0.8em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'netmix' ),
					'font-family'     => '"Barlow",sans-serif',
					'font-size'       => '2.1875rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '0.9em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.3em',
					'margin-bottom'   => '2.5rem',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'netmix' ),
					'font-family'     => '"Barlow",sans-serif',
					'font-size'       => '1.5625rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.3em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '1.7em',
					'margin-bottom'   => '1.3em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'netmix' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '600',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '2.5em',
					'margin-bottom'   => '1.1em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'netmix' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'netmix' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1.8em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '1px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'netmix' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => 'normal',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'netmix' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'netmix' ),
					'font-family'     => 'inherit',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => 'normal', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'netmix' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'netmix' ),
					'font-family'     => 'inherit',
					'font-size'       => '1rem',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => 'normal',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.4em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'netmix' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'netmix' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => 'normal',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'netmix' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'netmix' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => 'normal',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
			)
		);

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		netmix_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'netmix' ),
					'description' => esc_html__( 'Colors of the main content area', 'netmix' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'netmix' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'netmix' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'netmix' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'netmix' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'netmix' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'netmix' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'netmix' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'netmix' ),
				),
			)
		);
		netmix_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'netmix' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'netmix' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'netmix' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'netmix' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'netmix' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'netmix' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'netmix' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'netmix' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'netmix' ),
					'description' => esc_html__( 'Color of the plain text inside this block', 'netmix' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'netmix' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'netmix' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'netmix' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'netmix' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'netmix' ),
					'description' => esc_html__( 'Color of the links inside this block', 'netmix' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'netmix' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'netmix' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Link 2', 'netmix' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'netmix' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Link 2 hover', 'netmix' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'netmix' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Link 3', 'netmix' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'netmix' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Link 3 hover', 'netmix' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'netmix' ),
				),
			)
		);
		$schemes = array(

			// Color scheme: 'default'
			'default' => array(
				'title'    => esc_html__( 'Default', 'netmix' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#ffffff',
					'bd_color'         => '#d8dae1',

					// Text and links colors
					'text'             => '#686d80',
					'text_light'       => '#262937',
					'text_dark'        => '#262937',
					'text_link'        => '#2cffc8',
					'text_hover'       => '#e1ff19',
					'text_link2'       => '#e1ff19',
					'text_hover2'      => '#2cffc8',
					'text_link3'       => '#ffffff',
					'text_hover3'      => '#262937',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#262937',
					'alter_bg_hover'   => '#1d202b',
					'alter_bd_color'   => '#e1e1e1',
					'alter_bd_hover'   => '#2c3040',
					'alter_text'       => '#a8aec4',
					'alter_light'      => '#a8aec4',
					'alter_dark'       => '#ffffff',
					'alter_link'       => '#10cd9c',
					'alter_hover'      => '#2cffc8',
					'alter_link2'      => '#e1ff19',
					'alter_hover2'     => '#2cffc8',
					'alter_link3'      => '#ff008a',
					'alter_hover3'     => '#ff008a',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#1d202b',
					'extra_bg_hover'   => '#1d202b',
					'extra_bd_color'   => '#1d202b',
					'extra_bd_hover'   => '#1d202b',
					'extra_text'       => '#a8aec4',
					'extra_light'      => '#262937',
					'extra_dark'       => '#ffffff',
					'extra_link'       => '#e1ff19',
					'extra_hover'      => '#10cd9c',
					'extra_link2'      => '#c3df05',
					'extra_hover2'     => '#d8dae1',
					'extra_link3'      => '#ff008a',
					'extra_hover3'     => '#ff008a',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => '#ffffff',
					'input_bg_hover'   => '#ffffff',
					'input_bd_color'   => '#ededef',
					'input_bd_hover'   => '#ededef',
					'input_text'       => '#686d80',
					'input_light'      => '#686d80',
					'input_dark'       => '#686d80',

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#e7eaed',
					'inverse_bd_hover' => '#f3f5f7',
					'inverse_text'     => '#262937',
					'inverse_light'    => '#333746  ',
					'inverse_dark'     => '#262937',
					'inverse_link'     => '#ffffff',
					'inverse_hover'    => '#262937 ',
				),
			),

			// Color scheme: 'dark'
			'dark'    => array(
				'title'    => esc_html__( 'Dark', 'netmix' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#1d202b',
					'bd_color'         => '#3d404b',

					// Text and links colors
					'text'             => '#a8aec4',
					'text_light'       => '#ffffff',
					'text_dark'        => '#ffffff',
					'text_link'        => '#e1ff19',
					'text_hover'       => '#2cffc8',
					'text_link2'       => '#2cffc8',
					'text_hover2'      => '#e1ff19',
					'text_link3'       => '#ffffff',
					'text_hover3'      => '#262937',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#262937',
					'alter_bg_hover'   => '#303343',
					'alter_bd_color'   => '#0e0d12',
					'alter_bd_hover'   => '#2c3040',
					'alter_text'       => '#a8aec4',
					'alter_light'      => '#686d80',
					'alter_dark'       => '#ffffff',
					'alter_link'       => '#e1ff19',
					'alter_hover'      => '#2cffc8',
					'alter_link2'      => '#e1ff19',
					'alter_hover2'     => '#2cffc8',
					'alter_link3'      => '#ff008a',
					'alter_hover3'     => '#ff008a',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#1d202b',
					'extra_bg_hover'   => '#f3f5f7',
					'extra_bd_color'   => '#e5e5e5',
					'extra_bd_hover'   => '#f3f5f7',
					'extra_text'       => '#333333',
					'extra_light'      => '#262937',
					'extra_dark'       => '#ffffff',
					'extra_link'       => '#2cffc8',
					'extra_hover'      => '#10cd9c',
					'extra_link2'      => '#c3df05',
					'extra_hover2'     => '#d8dae1',
					'extra_link3'      => '#ff008a',
					'extra_hover3'     => '#ff008a',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => '#ffffff',
					'input_bg_hover'   => '#ffffff',
					'input_bd_color'   => '#ffffff',
					'input_bd_hover'   => '#ffffff',
					'input_text'       => '#686d80',
					'input_light'      => '#686d80',
					'input_dark'       => '#686d80',

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#e7eaed',
					'inverse_bd_hover' => '#f3f5f7',
					'inverse_text'     => '#262937',
					'inverse_light'    => '#333746',
					'inverse_dark'     => '#1d1d1d',
					'inverse_link'     => '#ffffff',
					'inverse_hover'    => '#262937',
				),
			),
		);
		netmix_storage_set( 'schemes', $schemes );
		netmix_storage_set( 'schemes_original', $schemes );

		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		netmix_storage_set(
			'schemes_simple', array(
				'text_link'        => array(),
				'text_hover'       => array(),
				'text_link2'       => array(),
				'text_hover2'      => array(),
				'text_link3'       => array(),
				'text_hover3'      => array(),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
				'inverse_bd_color' => array(),
				'inverse_bd_hover' => array(),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		netmix_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'input_text_03'       => array(
					'color' => 'input_text',
					'alpha' => 0.3,
				),
				'alter_bg_color_06' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.6,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_00' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_05' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.5,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'alter_hover_07'     => array(
					'color' => 'alter_hover',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'extra_light_01'     => array(
					'color' => 'extra_light',
					'alpha' => 0.1,
				),
				'text_dark_01'      => array(
					'color' => 'text_dark',
					'alpha' => 0.1,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Parameters to set order of schemes in the css
		netmix_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'menu_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		netmix_storage_set(
			'theme_thumbs', apply_filters(
				'netmix_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'netmix-thumb-huge'        => array(
						'size'  => array( 1170, 658, true ),
						'title' => esc_html__( 'Huge image', 'netmix' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'netmix-thumb-big'         => array(
						'size'  => array( 782, 468, true ),
						'title' => esc_html__( 'Large image', 'netmix' ),
						'subst' => 'trx_addons-thumb-big',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'netmix-thumb-med'         => array(
						'size'  => array( 470, 264, true ),
						'title' => esc_html__( 'Medium image', 'netmix' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Small square image (for avatars in comments, etc.)
					'netmix-thumb-tiny'        => array(
						'size'  => array( 90, 90, true ),
						'title' => esc_html__( 'Small square avatar', 'netmix' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'netmix-thumb-masonry-big' => array(
						'size'  => array( 760, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'netmix' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'netmix-thumb-masonry'     => array(
						'size'  => array( 470, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'netmix' ),
						'subst' => 'trx_addons-thumb-masonry',
					),
				)
			)
		);
	}
}




//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'netmix_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'netmix_importer_set_options', 9 );
	function netmix_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url( netmix_get_protocol() . '://demofiles.ancorathemes.com/netmix/' );
			// Required plugins
			$options['required_plugins'] = array_keys( netmix_storage_get( 'required_plugins' ) );
			// Set number of thumbnails (usually 3 - 5) to regenerate at once when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 0;
			// Default demo
			$options['files']['default']['title']       = esc_html__( 'Netmix Demo', 'netmix' );
			$options['files']['default']['domain_dev']  = esc_url( 'http://netmix.dv.ancorathemes.com' );       // Developers domain
			$options['files']['default']['domain_demo'] = esc_url( netmix_get_protocol() . '://netmix.ancorathemes.com' );       // Demo-site domain
			// If theme need more demo - just copy 'default' and change required parameter




			// The array with theme-specific banners, displayed during demo-content import.
			// If array with banners is empty - the banners are uploaded directly from demo-content server.
			$options['banners'] = array();
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'netmix_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'netmix_ocdi_set_options', 9 );
	function netmix_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( netmix_get_protocol() . '://demofiles.ancorathemes.net/netmix/' );
			// Required plugins
			$options['required_plugins'] = array_keys( netmix_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'Netmix OCDI Demo', 'netmix' );
			$options['files']['ocdi']['domain_demo'] = esc_url( netmix_get_protocol() . '://netmix.dv.ancorathemes.com' );
			// If theme need more demo - just copy 'default' and change required parameter
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'netmix_create_theme_options' ) ) {

	function netmix_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = __( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'netmix' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( netmix_storage_get( 'schemes' ) ) < 2;

		netmix_storage_set(

			'options', array(

				// 'Logo & Site Identity'
				//---------------------------------------------
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'netmix' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'netmix' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'netmix' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'netmix' ) ),
					'class'    => 'netmix_column-1_2 netmix_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'netmix' ),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'netmix' ) ),
					'class'    => 'netmix_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'netmix' ),
					'desc'    => wp_kses(
									__( 'Zoom the logo (set 1 to leave original size).', 'netmix' )
									. ' <br>'
									. __( 'Attention! For this parameter to affect images, their max-height should be specified in "em" instead of "px" when creating a header.', 'netmix' )
									. ' <br>'
									. __( 'In this case maximum size of logo depends on the actual size of the picture.', 'netmix' ), 'netmix_kses_content'
								),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => NETMIX_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'netmix' ) ),
					'class'      => 'netmix_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'netmix' ) ),
					'class' => 'netmix_column-1_2 netmix_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'netmix' ) ),
					'class'      => 'netmix_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'netmix' ) ),
					'class' => 'netmix_column-1_2 netmix_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'netmix' ) ),
					'class'      => 'netmix_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_side'                     => array(
					'title' => esc_html__( 'Logo for the side menu', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu', 'netmix' ) ),
					'class' => 'netmix_column-1_2 netmix_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_side_retina'              => array(
					'title'      => esc_html__( 'Logo for the side menu on Retina', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'netmix' ) ),
					'class'      => 'netmix_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'image',
				),



				// 'General settings'
				//---------------------------------------------
				'general'                       => array(
					'title'    => esc_html__( 'General', 'netmix' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'netmix' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'netmix' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'netmix' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'qsetup'   => esc_html__( 'General', 'netmix' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => netmix_get_list_body_styles( false ),
					'type'     => 'select',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'netmix' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1270,
					'min'        => 1000,
					'max'        => 1600,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',               // SASS variable's name to preview changes 'on fly'
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'slider',
				),
				'page_boxed_extra'             => array(
					'title'      => esc_html__( 'Boxed page extra spaces', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Width of the extra side space on boxed pages', 'netmix' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'std'        => 80,
					'min'        => 0,
					'max'        => 150,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page_boxed_extra',   // SASS variable's name to preview changes 'on fly'
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'netmix' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'netmix' ),

					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'netmix' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'netmix' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_single'
						'section' => esc_html__( 'Widgets', 'netmix' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'netmix' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_position_ss'       => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'netmix' ),
					'desc'     => wp_kses_data( __( "Select position to move sidebar (if it's not hidden) on the small screen - above or below the content", 'netmix' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_ss_single'
						'section' => esc_html__( 'Widgets', 'netmix' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'      => 'below',
					'qsetup'   => esc_html__( 'General', 'netmix' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_widgets_single'
						'section' => esc_html__( 'Widgets', 'netmix' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'netmix' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'netmix' ) ),
					'std'        => 408,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',      // SASS variable's name to preview changes 'on fly'
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'netmix' ) ),
					'std'        => 80,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',          // SASS variable's name to preview changes 'on fly'
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'netmix' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'netmix' ) ),
					'refresh' => false,
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'netmix' ),
					),
					'std'     => 1,
					'type'    => 'checkbox',
				),
				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'netmix' ) ),
					'std'        => 0,
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'type'       => 'hidden',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'netmix' ),
					'desc'  => '',
					'type'  => NETMIX_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'netmix' ) ),
					'std'   => 0,
					'type'  => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'privacy_text' => array(
					"title" => esc_html__("Text with Privacy Policy link", 'netmix'),
					"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'netmix') ),
					"std"   => wp_kses_data( __( 'I agree that my submitted data is being collected and stored.', 'netmix') ),
					"type"  => "text"
				),



				// 'Header'
				//---------------------------------------------
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'netmix' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'netmix' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'netmix' ),
					),
					'std'      => 'default',
					'options'  => netmix_get_list_header_footer_types(),
					'type'     => NETMIX_THEME_FREE || ! netmix_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'netmix' ),
					'desc'       =>  esc_html__( 'Select custom header from Layouts Builder', 'netmix'),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'netmix' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => 'header-custom-elementor-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'netmix' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'netmix' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight'             => array(
					'title'    => esc_html__( 'Header fullheight', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill the whole screen. Used only if the header has a background image', 'netmix' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'netmix' ),
					),
					'std'      => 0,
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_zoom'                   => array(
					'title'   => esc_html__( 'Header zoom', 'netmix' ),
					'desc'    => wp_kses_data( __( 'Zoom the header title. 1 - original size', 'netmix' ) ),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => NETMIX_THEME_FREE ? 'hidden' : 'slider',
				),
				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'netmix' ) ),
					'type'  => NETMIX_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'netmix' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'netmix' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'netmix' ),
						'left'  => esc_html__( 'Left', 'netmix' ),
						'right' => esc_html__( 'Right', 'netmix' ),
					),
					'type'     => NETMIX_THEME_FREE || ! netmix_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'netmix' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'netmix' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'netmix' ) ),
					'std'   => 1,
					'type'  => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_image_info'             => array(
					'title' => esc_html__( 'Header image', 'netmix' ),
					'desc'  => '',
					'type'  => NETMIX_THEME_FREE ? 'hidden' : 'info',
				),
				'header_image_override'         => array(
					'title'    => esc_html__( 'Header image override', 'netmix' ),
					'desc'     => wp_kses_data( __( "Allow override the header image with the page's/post's/product's/etc. featured image", 'netmix' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'netmix' ),
					),
					'std'      => 0,
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'netmix' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'netmix' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'netmix' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'netmix' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'netmix' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'netmix' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'netmix' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'netmix' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),



				// 'Footer'
				//---------------------------------------------
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'netmix' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'netmix' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'netmix' ),
					),
					'std'      => 'default',
					'options'  => netmix_get_list_header_footer_types(),
					'type'     => NETMIX_THEME_FREE || ! netmix_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'netmix' ),
					'desc'       => esc_html__( 'Select custom footer from Layouts Builder', 'netmix' ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'netmix' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => 'footer-custom-elementor-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'netmix' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'netmix' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => netmix_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'netmix' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'netmix' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'netmix' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'netmix' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'netmix' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! netmix_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'netmix' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by AncoraThemes. All rights reserved.', 'netmix' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),



				// 'Mobile version'
				//---------------------------------------------
				'mobile'                        => array(
					'title'    => esc_html__( 'Mobile', 'netmix' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 55,
					'type'     => 'section',
				),

				'mobile_header_info'            => array(
					'title' => esc_html__( 'Header on the mobile device', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_mobile'            => array(
					'title'    => esc_html__( 'Header style', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => netmix_get_list_header_footer_types( true ),
					'type'     => NETMIX_THEME_FREE || ! netmix_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_mobile'           => array(
					'title'      => esc_html__( 'Select custom layout', 'netmix' ),
					'desc'       => esc_html__( 'Select custom header from Layouts Builder', 'netmix' ),
					'dependency' => array(
						'header_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_mobile'        => array(
					'title'    => esc_html__( 'Header position', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_sidebar_info'           => array(
					'title' => esc_html__( 'Sidebar on the mobile device', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_mobile'       => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_mobile'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on mobile devices', 'netmix' ) ),
					'dependency' => array(
						'sidebar_position_mobile' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_mobile'         => array(
					'title'   => esc_html__( 'Expand content', 'netmix' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden on mobile devices', 'netmix' ) ),
					'refresh' => false,
					'dependency' => array(
						'sidebar_position_mobile' => array( 'hide', 'inherit' ),
					),
					'std'     => 'inherit',
					'options'  => netmix_get_list_checkbox_values( true ),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_footer_info'           => array(
					'title' => esc_html__( 'Footer on the mobile device', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'footer_type_mobile'           => array(
					'title'    => esc_html__( 'Footer style', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => netmix_get_list_header_footer_types( true ),
					'type'     => NETMIX_THEME_FREE || ! netmix_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style_mobile'          => array(
					'title'      => esc_html__( 'Select custom layout', 'netmix' ),
					'desc'       => esc_html__( 'Select custom footer from Layouts Builder', 'netmix' ),
					'dependency' => array(
						'footer_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets_mobile'        => array(
					'title'      => esc_html__( 'Footer widgets', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'netmix' ) ),
					'dependency' => array(
						'footer_type_mobile' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns_mobile'        => array(
					'title'      => esc_html__( 'Footer columns', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'netmix' ) ),
					'dependency' => array(
						'footer_type_mobile'    => array( 'default' ),
						'footer_widgets_mobile' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => netmix_get_list_range( 0, 6 ),
					'type'       => 'select',
				),



				// 'Blog'
				//---------------------------------------------
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'netmix' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),


				// Blog - Posts page
				//---------------------------------------------
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'netmix' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'netmix' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'netmix' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'netmix' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'netmix' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style' => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'netmix' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'netmix' ),
						'fullpost' => esc_html__( 'Full post', 'netmix' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'netmix' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 35,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'netmix' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'netmix' ) ),
					'std'     => 2,
					'options' => netmix_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'netmix' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'netmix' ),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'netmix' ),
						'links'    => esc_html__( 'Older/Newest', 'netmix' ),
						'more'     => esc_html__( 'Load more', 'netmix' ),
						'infinite' => esc_html__( 'Infinite scroll', 'netmix' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Post animation', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'fadeIn',
					'options'    => array(),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'open_full_post_in_blog'        => array(
					'title'      => esc_html__( 'Open full post in blog', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Allow to open the full version of the post directly in the blog feed. Attention! Applies only to 1 column layouts!', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'open_full_post_hide_author'    => array(
					'title'      => esc_html__( 'Hide author bio', 'netmix' ),
					'desc'       => wp_kses_data( __( "Hide author bio after post content when open the full version of the post directly in the blog feed.", 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'open_full_post_in_blog' => array( 1 ),
					),
					'std'        => 1,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'open_full_post_hide_related'   => array(
					'title'      => esc_html__( 'Hide related posts', 'netmix' ),
					'desc'       => wp_kses_data( __( "Hide related posts after post content when open the full version of the post directly in the blog feed.", 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'open_full_post_in_blog' => array( 1 ),
					),
					'std'        => 1,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_header_info'              => array(
					'title' => esc_html__( 'Header', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_blog'              => array(
					'title'    => esc_html__( 'Header style', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => netmix_get_list_header_footer_types( true ),
					'type'     => NETMIX_THEME_FREE || ! netmix_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_blog'             => array(
					'title'      => esc_html__( 'Select custom layout', 'netmix' ),
					'desc'       => esc_html__( 'Select custom header from Layouts Builder', 'netmix'),
					'dependency' => array(
						'header_type_blog' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_blog'          => array(
					'title'    => esc_html__( 'Header position', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_blog'        => array(
					'title'    => esc_html__( 'Header fullheight', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => netmix_get_list_checkbox_values( true ),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),
				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'netmix' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'netmix' ) ),
					'std'     => 'right',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'netmix' ),
					'type'    => 'switch',
				),
				'sidebar_position_ss_blog'  => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'netmix' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'      => 'inherit',
					'qsetup'   => esc_html__( 'General', 'netmix' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'netmix' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'netmix' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'netmix' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'netmix' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options'  => netmix_get_list_checkbox_values( true ),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),


				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'netmix' ),
					'desc'  => wp_kses_data( __( "Select or upload an image used as placeholder for posts without a featured image. Placeholder is used on the blog stream page only (no placeholder in single post), and only in those styles of it where non-using featured image doesn't seem appropriate.", 'netmix' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'netmix' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'netmix' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'netmix' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'netmix' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'netmix' ),

					),
					'type'    => NETMIX_THEME_FREE ? 'hidden' : 'select',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'netmix' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'netmix' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'author=1|date=1|comments=1|categories=0|views=0|likes=0|share=0|edit=0',
					'options'    => netmix_get_list_meta_parts(),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checklist',
				),


				// Blog - Single posts
				//---------------------------------------------
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'netmix' ) ),
					'type'  => 'section',
				),

				'blog_single_header_info'       => array(
					'title' => esc_html__( 'Header', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_single'            => array(
					'title'    => esc_html__( 'Header style', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => netmix_get_list_header_footer_types( true ),
					'type'     => NETMIX_THEME_FREE || ! netmix_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_single'           => array(
					'title'      => esc_html__( 'Select custom layout', 'netmix' ),
					'desc'       => esc_html__( 'Select custom header from Layouts Builder', 'netmix'),
					'dependency' => array(
						'header_type_single' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_single'        => array(
					'title'    => esc_html__( 'Header position', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_single'      => array(
					'title'    => esc_html__( 'Header fullheight', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'netmix' ) ),
					'std'      => 'inherit',
					'options'  => netmix_get_list_checkbox_values( true ),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_sidebar_info'      => array(
					'title' => esc_html__( 'Sidebar', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_single'       => array(
					'title'   => esc_html__( 'Sidebar position', 'netmix' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar on the single posts', 'netmix' ) ),
					'std'     => 'right',
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'netmix' ),
					),
					'options' => array(),
					'type'    => 'switch',
				),
				'sidebar_position_ss_single'=> array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the single posts on the small screen - above or below the content', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'netmix' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'      => 'below',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_single'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on the single posts', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'netmix' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_single'           => array(
					'title'   => esc_html__( 'Expand content', 'netmix' ),
					'desc'    => wp_kses_data( __( 'Expand the content width on the single posts if the sidebar is hidden', 'netmix' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options'  => netmix_get_list_checkbox_values( true ),
					'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_title_info'      => array(
					'title' => esc_html__( 'Featured image and title', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'netmix' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'netmix' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'post_thumbnail_type'      => array(
					'title'      => esc_html__( 'Type of post thumbnail', 'netmix' ),
					'desc'       => wp_kses_data( __( "Select type of post thumbnail on the single post's pages", 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 ),
					),
					'std'        => 'default',
					'options'    => array(
						'default'     => esc_html__( 'Default', 'netmix' ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_position'          => array(
					'title'      => esc_html__( 'Post header position', 'netmix' ),
					'desc'       => wp_kses_data( __( "Select post header position on the single post's pages", 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 )
					),
					'std'        => 'under',
					'options'    => array(
						'above'      => esc_html__( 'Above the post thumbnail', 'netmix' ),
						'under'      => esc_html__( 'Under the post thumbnail', 'netmix' ),
						'on_thumb'   => esc_html__( 'On the post thumbnail', 'netmix' ),
						'default'    => esc_html__( 'Default', 'netmix' ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_align'             => array(
					'title'      => esc_html__( 'Align of the post header', 'netmix' ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'post_header_position' => array( 'on_thumb' ),
					),
					'std'        => 'mc',
					'options'    => array(
						'ts' => esc_html__('Top Stick Out', 'netmix'),
						'tl' => esc_html__('Top Left', 'netmix'),
						'tc' => esc_html__('Top Center', 'netmix'),
						'tr' => esc_html__('Top Right', 'netmix'),
						'ml' => esc_html__('Middle Left', 'netmix'),
						'mc' => esc_html__('Middle Center', 'netmix'),
						'mr' => esc_html__('Middle Right', 'netmix'),
						'bl' => esc_html__('Bottom Left', 'netmix'),
						'bc' => esc_html__('Bottom Center', 'netmix'),
						'br' => esc_html__('Bottom Right', 'netmix'),
						'bs' => esc_html__('Bottom Stick Out', 'netmix'),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'select',
				),
				'post_subtitle'                 => array(
					'title' => esc_html__( 'Post subtitle', 'netmix' ),
					'desc'  => wp_kses_data( __( "Specify post subtitle to display it under the post title.", 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'std'   => '',
					'hidden' => true,
					'type'  => 'text',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'netmix' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'netmix' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_single'             => array(
					'title'      => esc_html__( 'Post meta', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'netmix' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'netmix' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'author=1|date=1|comments=1|categories=0|views=0|likes=0|share=0|edit=0',
					'options'    => netmix_get_list_meta_parts(),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checklist',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'netmix' ) ),
					'std'   => 1,
					'type'  => ! netmix_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'netmix' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'netmix' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),

				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'netmix' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select style of the related posts output', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'classic',
					'options'    => array(
						'classic' => esc_html__( 'Classic', 'netmix' ),
						'wide'    => esc_html__( 'Wide', 'netmix' ),
						'list'    => esc_html__( 'List', 'netmix' ),
						'short'   => esc_html__( 'Short', 'netmix' ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'inside'        => esc_html__( 'Inside the content (fullwidth)', 'netmix' ),
						'inside_left'   => esc_html__( 'At left side of the content', 'netmix' ),
						'inside_right'  => esc_html__( 'At right side of the content', 'netmix' ),
						'below_content' => esc_html__( 'After the content', 'netmix' ),
						'below_page'    => esc_html__( 'After the content & sidebar', 'netmix' ),
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'select',
				),
				'related_position_inside'       => array(
					'title'      => esc_html__( 'Before # paragraph', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Before what paragraph should related posts appear? If 0 - randomly.', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'inside_left', 'inside_right' ),
					),
					'std'        => 2,
					'options'    => netmix_get_list_range( 0, 9 ),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'select',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'netmix' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'min'        => 1,
					'max'        => 9,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'slider',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'netmix' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page?', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'below_content', 'below_page' ),
					),
					'std'        => 2,
					'options'    => netmix_get_list_range( 1, 6 ),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'netmix'),
						'side'    => esc_html__('Side', 'netmix'),
						'outside' => esc_html__('Outside', 'netmix'),
						'top'     => esc_html__('Top', 'netmix'),
						'bottom'  => esc_html__('Bottom', 'netmix')
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'select',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'bottom',
					'options'    => array(
						'none'    => esc_html__('None', 'netmix'),
						'bottom'  => esc_html__('Bottom', 'netmix')
					),
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Space between slides', 'netmix' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'netmix' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'text',
				),
				'posts_navigation_info'      => array(
					'title' => esc_html__( 'Posts navigation', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'posts_navigation'           => array(
					'title'   => esc_html__( 'Show posts navigation', 'netmix' ),
					'desc'    => wp_kses_data( __( "Show posts navigation on the single post's pages", 'netmix' ) ),
					'std'     => 'none',
					'options' => array(
						'none'   => esc_html__('None', 'netmix'),
						'links'  => esc_html__('Prev/Next links', 'netmix'),
						'scroll' => esc_html__('Infinite scroll', 'netmix')
					),
					'type'    => NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),
				'posts_navigation_fixed'     => array(
					'title'      => esc_html__( 'Fixed posts navigation', 'netmix' ),
					'desc'       => wp_kses_data( __( "Make posts navigation fixed position. Display it when the content of the article is inside the window.", 'netmix' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'links' ),
					),
					'std'        => 0,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'posts_navigation_scroll_hide_author'  => array(
					'title'      => esc_html__( 'Hide author bio', 'netmix' ),
					'desc'       => wp_kses_data( __( "Hide author bio after post content when infinite scroll is used.", 'netmix' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 0,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'posts_navigation_scroll_hide_related'  => array(
					'title'      => esc_html__( 'Hide related posts', 'netmix' ),
					'desc'       => wp_kses_data( __( "Hide related posts after post content when infinite scroll is used.", 'netmix' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 0,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'posts_navigation_scroll_hide_comments' => array(
					'title'      => esc_html__( 'Hide comments', 'netmix' ),
					'desc'       => wp_kses_data( __( "Hide comments after post content when infinite scroll is used.", 'netmix' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 1,
					'type'       => NETMIX_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'posts_banners_info'      => array(
					'title' => esc_html__( 'Posts banners', 'netmix' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_banner_link'     => array(
					'title' => esc_html__( 'Header banner link', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'   => '',
					'type'  => 'text',
				),
				'header_banner_img'     => array(
					'title' => esc_html__( 'Header banner image', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'header_banner_height'  => array(
					'title' => esc_html__( 'Header banner height', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Specify minimal height of the banner (in "px" or "em"). For example: 15em', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'type'       => 'text',
				),
				'header_banner_code'     => array(
					'title'      => esc_html__( 'Header banner code', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'textarea',
				),
				'footer_banner_link'     => array(
					'title' => esc_html__( 'Footer banner link', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'   => '',
					'type'  => 'text',
				),
				'footer_banner_img'     => array(
					'title' => esc_html__( 'Footer banner image', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'footer_banner_height'  => array(
					'title' => esc_html__( 'Footer banner height', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Specify minimal height of the banner (in "px" or "em"). For example: 15em', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'type'       => 'text',
				),
				'footer_banner_code'     => array(
					'title'      => esc_html__( 'Footer banner code', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'textarea',
				),
				'sidebar_banner_link'     => array(
					'title' => esc_html__( 'Sidebar banner link', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'   => '',
					'type'  => 'text',
				),
				'sidebar_banner_img'     => array(
					'title' => esc_html__( 'Sidebar banner image', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'sidebar_banner_code'     => array(
					'title'      => esc_html__( 'Sidebar banner code', 'netmix' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'textarea',
				),
				'background_banner_link'     => array(
					'title' => esc_html__( "Post's background banner link", 'netmix' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'   => '',
					'type'  => 'text',
				),
				'background_banner_img'     => array(
					'title' => esc_html__( "Post's background banner image", 'netmix' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'background_banner_code'     => array(
					'title'      => esc_html__( "Post's background banner code", 'netmix' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'netmix' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'netmix' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'textarea',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),



				// 'Colors'
				//---------------------------------------------
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'netmix' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'netmix' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'netmix' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'netmix' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'netmix' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'netmix' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'netmix' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'menu_scheme'                   => array(
					'title'    => esc_html__( 'Sidemenu Color Scheme', 'netmix' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'netmix' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes || NETMIX_THEME_FREE ? 'hidden' : 'switch',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'netmix' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'netmix' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'netmix' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'netmix' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'netmix' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'netmix' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'netmix' ),
					'desc'        => '',
					'std'         => '$netmix_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);



		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			//---------------------------------------------
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'netmix' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'netmix' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'netmix' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'netmix' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'netmix' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'netmix' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'netmix' ) ),
				'class'   => 'netmix_column-1_3 netmix_new_row',
				'refresh' => false,
				'std'     => '$netmix_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= netmix_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( netmix_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'netmix' ), $i ) ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'netmix' ),
				'desc'    => '',
				'class'   => 'netmix_column-1_3 netmix_new_row',
				'refresh' => false,
				'std'     => '$netmix_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'netmix' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'netmix' ) )
							: '',
				'class'   => 'netmix_column-1_3',
				'refresh' => false,
				'std'     => '$netmix_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'netmix' ),
					'serif'      => esc_html__( 'serif', 'netmix' ),
					'sans-serif' => esc_html__( 'sans-serif', 'netmix' ),
					'monospace'  => esc_html__( 'monospace', 'netmix' ),
					'cursive'    => esc_html__( 'cursive', 'netmix' ),
					'fantasy'    => esc_html__( 'fantasy', 'netmix' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'netmix' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'netmix' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'netmix' ) )
							: '',
				'class'   => 'netmix_column-1_3',
				'refresh' => false,
				'std'     => '$netmix_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = netmix_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'netmix' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses( sprintf( __( 'Font settings of the "%s" tag.', 'netmix' ), $tag ), 'netmix_kses_content' ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				// Skip property 'text-decoration' for the main text
				if ( 'text-decoration' == $css_prop && 'p' == $tag ) {
					continue;
				}

				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'netmix' ),
						'100'     => esc_html__( '100 (Light)', 'netmix' ),
						'200'     => esc_html__( '200 (Light)', 'netmix' ),
						'300'     => esc_html__( '300 (Thin)', 'netmix' ),
						'400'     => esc_html__( '400 (Normal)', 'netmix' ),
						'500'     => esc_html__( '500 (Semibold)', 'netmix' ),
						'600'     => esc_html__( '600 (Semibold)', 'netmix' ),
						'700'     => esc_html__( '700 (Bold)', 'netmix' ),
						'800'     => esc_html__( '800 (Black)', 'netmix' ),
						'900'     => esc_html__( '900 (Black)', 'netmix' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'netmix' ),
						'normal'  => esc_html__( 'Normal', 'netmix' ),
						'italic'  => esc_html__( 'Italic', 'netmix' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'netmix' ),
						'none'         => esc_html__( 'None', 'netmix' ),
						'underline'    => esc_html__( 'Underline', 'netmix' ),
						'overline'     => esc_html__( 'Overline', 'netmix' ),
						'line-through' => esc_html__( 'Line-through', 'netmix' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'netmix' ),
						'none'       => esc_html__( 'None', 'netmix' ),
						'uppercase'  => esc_html__( 'Uppercase', 'netmix' ),
						'lowercase'  => esc_html__( 'Lowercase', 'netmix' ),
						'capitalize' => esc_html__( 'Capitalize', 'netmix' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'netmix_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$netmix_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		netmix_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			netmix_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'netmix' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'netmix' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is not 'Customize'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ! netmix_check_url( 'customize.php' ) ) {
			netmix_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'netmix' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'netmix' ) ),
					'class'    => 'netmix_column-1_2 netmix_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'netmix' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'netmix_options_get_list_cpt_options' ) ) {
	function netmix_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"content_info_{$cpt}"           => array(
				'title' => esc_html__( 'Content', 'netmix' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"body_style_{$cpt}"             => array(
				'title'    => esc_html__( 'Body style', 'netmix' ),
				'desc'     => wp_kses_data( __( 'Select width of the body content', 'netmix' ) ),
				'std'      => 'inherit',
				'options'  => netmix_get_list_body_styles( true ),
				'type'     => 'select',
			),
			"boxed_bg_image_{$cpt}"         => array(
				'title'      => esc_html__( 'Boxed bg image', 'netmix' ),
				'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'netmix' ) ),
				'dependency' => array(
					"body_style_{$cpt}" => array( 'boxed' ),
				),
				'std'        => 'inherit',
				'type'       => 'image',
			),
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'netmix' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'netmix' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'netmix' ) ),
				'std'     => 'inherit',
				'options' => netmix_get_list_header_footer_types( true ),
				'type'    => NETMIX_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'netmix' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'netmix' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => NETMIX_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'netmix' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'netmix' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => NETMIX_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_image_override_{$cpt}"  => array(
				'title'   => esc_html__( 'Header image override', 'netmix' ),
				'desc'    => wp_kses_data( __( "Allow override the header image with the post's featured image", 'netmix' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'netmix' ),
					1         => esc_html__( 'Yes', 'netmix' ),
					0         => esc_html__( 'No', 'netmix' ),
				),
				'type'    => NETMIX_THEME_FREE ? 'hidden' : 'switch',
			),
			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'netmix' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => wp_kses_data( sprintf( __( 'Sidebar position on the %s list', 'netmix' ), $title ) ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the %s list', 'netmix' ), $title ) ),
				'std'     => 'right',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_{$cpt}"=> array(
				'title'    => sprintf( __( 'Sidebar position on the %s list on the small screen', 'netmix' ), $title ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'netmix' ) ),
				'std'      => 'below',
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => wp_kses_data( sprintf( __( 'Sidebar widgets on the %s list', 'netmix' ), $title ) ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select sidebar to show on the %s list', 'netmix' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"sidebar_position_single_{$cpt}"       => array(
				'title'   => sprintf( __( 'Sidebar position on the single post', 'netmix' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the single posts of the %s', 'netmix' ), $title ) ),
				'std'     => 'right',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_single_{$cpt}"=> array(
				'title'    => esc_html__( 'Sidebar position on the single post on the small screen', 'netmix' ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'netmix' ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'      => 'below',
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_single_{$cpt}"        => array(
				'title'      => wp_kses_data( sprintf( __( 'Sidebar widgets on the single post', 'netmix' ), $title ) ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select widgets to show in the sidebar on the single posts of the %s', 'netmix' ), $title ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"expand_content_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content', 'netmix' ),
				'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'netmix' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options'  => netmix_get_list_checkbox_values( true ),
				'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
			),
			"expand_content_single_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content on the single post', 'netmix' ),
				'desc'    => wp_kses_data( __( 'Expand the content width on the single post if the sidebar is hidden', 'netmix' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options'  => netmix_get_list_checkbox_values( true ),
				'type'     => NETMIX_THEME_FREE ? 'hidden' : 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'netmix' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'netmix' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'netmix' ) ),
				'std'     => 'inherit',
				'options' => netmix_get_list_header_footer_types( true ),
				'type'    => NETMIX_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'netmix' ),
				'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'netmix' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => NETMIX_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'netmix' ),
				'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'netmix' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'netmix' ),
				'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'netmix' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => netmix_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'netmix' ),
				'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'netmix' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'netmix_options_get_list_choises' ) ) {
	add_filter( 'netmix_filter_options_get_list_choises', 'netmix_options_get_list_choises', 10, 2 );
	function netmix_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = netmix_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = netmix_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = netmix_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = netmix_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = netmix_get_list_sidebars( 'sidebar_widgets_single' != $id && ( strpos( $id, 'sidebar_widgets_' ) === 0 || strpos( $id, 'sidebar_widgets_single_' ) === 0 ), true );
			} elseif ( strpos( $id, 'sidebar_position_ss' ) === 0 ) {
				$list = netmix_get_list_sidebars_positions_ss( strpos( $id, 'sidebar_position_ss_' ) === 0 );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = netmix_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = netmix_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = netmix_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = netmix_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = netmix_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = netmix_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = netmix_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = netmix_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = netmix_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = netmix_array_merge( array( 0 => esc_html__( '- Select category -', 'netmix' ) ), netmix_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = netmix_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = netmix_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = netmix_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}
