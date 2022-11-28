<?php
/* WP GDPR Compliance support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'netmix_wp_gdpr_compliance_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'netmix_wp_gdpr_compliance_theme_setup9', 9 );
	function netmix_wp_gdpr_compliance_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'netmix_filter_tgmpa_required_plugins', 'netmix_wp_gdpr_compliance_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'netmix_wp_gdpr_compliance_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('netmix_filter_tgmpa_required_plugins',	'netmix_wp_gdpr_compliance_tgmpa_required_plugins');
	function netmix_wp_gdpr_compliance_tgmpa_required_plugins( $list = array() ) {
		if ( netmix_storage_isset( 'required_plugins', 'wp-gdpr-compliance' ) && netmix_storage_get_array( 'required_plugins', 'wp-gdpr-compliance', 'install' ) !== false && netmix_is_theme_activated() ) {
			$list[] = array(
				'name'     => netmix_storage_get_array( 'required_plugins', 'wp-gdpr-compliance', 'title' ),
				'slug'     => 'wp-gdpr-compliance',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'netmix_exists_wp_gdpr_compliance' ) ) {
	function netmix_exists_wp_gdpr_compliance() {
		return defined( 'WP_GDPR_C_ROOT_FILE' ) || defined( 'WPGDPRC_ROOT_FILE' );
	}
}
