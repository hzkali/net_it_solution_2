<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

$netmix_header_css   = '';
$netmix_header_image = get_header_image();
$netmix_header_video = netmix_get_header_video();
if ( ! empty( $netmix_header_image ) && netmix_trx_addons_featured_image_override( is_singular() || netmix_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$netmix_header_image = netmix_get_current_mode_image( $netmix_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $netmix_header_image ) || ! empty( $netmix_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $netmix_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $netmix_header_image ) {
		echo ' ' . esc_attr( netmix_add_inline_css_class( 'background-image: url(' . esc_url( $netmix_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( netmix_is_on( netmix_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight netmix-full-height';
	}
	$netmix_header_scheme = netmix_get_theme_option( 'header_scheme' );
	if ( ! empty( $netmix_header_scheme ) && ! netmix_is_inherit( $netmix_header_scheme  ) ) {
		echo ' scheme_' . esc_attr( $netmix_header_scheme );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $netmix_header_video ) ) {
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	if ( netmix_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( netmix_is_on( netmix_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-mobile' ) );
	}

	if ( !is_single() || !is_page() || ( netmix_get_theme_option( 'post_header_position' ) == 'default' && netmix_get_theme_option( 'post_thumbnail_type' ) == 'default' ) ) {
		// Page title and breadcrumbs area
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-title' ) );

		// Display featured image in the header on the single posts
		// Comment next line to prevent show featured image in the header area
		// and display it in the post's content
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-single' ) );
	}

	// Header widgets area
	get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-widgets' ) );
	?>
</header>
