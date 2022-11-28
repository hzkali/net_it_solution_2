<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'netmix_revslider_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'netmix_revslider_theme_setup9', 9 );
	function netmix_revslider_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'netmix_filter_tgmpa_required_plugins', 'netmix_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'netmix_revslider_tgmpa_required_plugins' ) ) {

	function netmix_revslider_tgmpa_required_plugins( $list = array() ) {
		if ( netmix_storage_isset( 'required_plugins', 'revslider' ) && netmix_storage_get_array( 'required_plugins', 'revslider', 'install' ) !== false && netmix_is_theme_activated() ) {
			$path = netmix_get_plugin_source_path( 'plugins/revslider/revslider.zip' );
			if ( ! empty( $path ) || netmix_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => netmix_storage_get_array( 'required_plugins', 'revslider', 'title' ),
					'slug'     => 'revslider',
					'version'  => '6.5.31',
					'source'   => ! empty( $path ) ? $path : 'upload://revslider.zip',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( ! function_exists( 'netmix_exists_revslider' ) ) {
	function netmix_exists_revslider() {
		return function_exists( 'rev_slider_shortcode' );
	}
}

// Set plugin's specific importer options
if ( !function_exists( 'netmix_revslider_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'netmix_revslider_importer_set_options', 9, 2 );
    function netmix_revslider_importer_set_options($options=array()) {
        if ( netmix_exists_revslider() && in_array('revslider', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'revslider-%';                    // Add slugs to export options for this plugin
        }
        return $options;
    }
}

