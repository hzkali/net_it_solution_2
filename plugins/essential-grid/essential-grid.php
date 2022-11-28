<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'netmix_essential_grid_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'netmix_essential_grid_theme_setup9', 9 );
	function netmix_essential_grid_theme_setup9() {
		if ( netmix_exists_essential_grid() ) {
			add_action( 'wp_enqueue_scripts', 'netmix_essential_grid_frontend_scripts', 1100 );
			add_filter( 'netmix_filter_merge_styles', 'netmix_essential_grid_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'netmix_filter_tgmpa_required_plugins', 'netmix_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'netmix_essential_grid_tgmpa_required_plugins' ) ) {

	function netmix_essential_grid_tgmpa_required_plugins( $list = array() ) {
		if ( netmix_storage_isset( 'required_plugins', 'essential-grid' ) && netmix_storage_get_array( 'required_plugins', 'essential-grid', 'install' ) !== false && netmix_is_theme_activated() ) {
			$path = netmix_get_plugin_source_path( 'plugins/essential-grid/essential-grid.zip' );
			if ( ! empty( $path ) || netmix_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => netmix_storage_get_array( 'required_plugins', 'essential-grid', 'title' ),
					'slug'     => 'essential-grid',
					'version'  => '3.0.16',
					'source'   => ! empty( $path ) ? $path : 'upload://essential-grid.zip',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'netmix_exists_essential_grid' ) ) {
	function netmix_exists_essential_grid() {
		return defined( 'ESG_PLUGIN_PATH' ) || defined( 'EG_PLUGIN_PATH' );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'netmix_essential_grid_frontend_scripts' ) ) {

	function netmix_essential_grid_frontend_scripts() {
		if ( netmix_is_on( netmix_get_theme_option( 'debug_mode' ) ) ) {
			$netmix_url = netmix_get_file_url( 'plugins/essential-grid/essential-grid.css' );
			if ( '' != $netmix_url ) {
				wp_enqueue_style( 'netmix-essential-grid', $netmix_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'netmix_essential_grid_merge_styles' ) ) {

	function netmix_essential_grid_merge_styles( $list ) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}

