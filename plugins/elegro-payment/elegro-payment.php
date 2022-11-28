<?php
/* Elegro Crypto Payment support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'netmix_elegro_payment_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'netmix_elegro_payment_theme_setup9', 9 );
	function netmix_elegro_payment_theme_setup9() {
		if ( netmix_exists_elegro_payment() ) {
			add_action( 'wp_enqueue_scripts', 'netmix_elegro_payment_frontend_scripts', 1100 );
			add_filter( 'netmix_filter_merge_styles', 'netmix_elegro_payment_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'netmix_filter_tgmpa_required_plugins', 'netmix_elegro_payment_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'netmix_elegro_payment_tgmpa_required_plugins' ) ) {
	
	function netmix_elegro_payment_tgmpa_required_plugins( $list = array() ) {
		if ( netmix_storage_isset( 'required_plugins', 'woocommerce' ) && netmix_storage_isset( 'required_plugins', 'elegro-payment' ) && netmix_storage_get_array( 'required_plugins', 'elegro-payment', 'install' ) !== false ) {
			$list[] = array(
				'name'     => netmix_storage_get_array( 'required_plugins', 'elegro-payment', 'title' ),
				'slug'     => 'elegro-payment',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'netmix_exists_elegro_payment' ) ) {
	function netmix_exists_elegro_payment() {
		return class_exists( 'WC_Elegro_Payment' );
	}
}


// Enqueue styles for frontend
if ( ! function_exists( 'netmix_elegro_payment_frontend_scripts' ) ) {
	
	function netmix_elegro_payment_frontend_scripts() {
		if ( netmix_is_on( netmix_get_theme_option( 'debug_mode' ) ) ) {
			$netmix_url = netmix_get_file_url( 'plugins/elegro-payment/elegro-payment.css' );
			if ( '' != $netmix_url ) {
				wp_enqueue_style( 'netmix-elegro-payment', $netmix_url, array(), null );
			}
		}
	}
}


// Merge custom styles
if ( ! function_exists( 'netmix_elegro_payment_merge_styles' ) ) {
	
	function netmix_elegro_payment_merge_styles( $list ) {
		$list[] = 'plugins/elegro-payment/elegro-payment.css';
		return $list;
	}
}
