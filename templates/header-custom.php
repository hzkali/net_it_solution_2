<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.06
 */

$netmix_header_css   = '';
$netmix_header_image = get_header_image();
$netmix_header_video = netmix_get_header_video();
if ( ! empty( $netmix_header_image ) && netmix_trx_addons_featured_image_override( is_singular() || netmix_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$netmix_header_image = netmix_get_current_mode_image( $netmix_header_image );
}

$netmix_header_id = netmix_get_custom_header_id();
$netmix_header_meta = get_post_meta( $netmix_header_id, 'trx_addons_options', true );
if ( ! empty( $netmix_header_meta['margin'] ) ) {
	netmix_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( netmix_prepare_css_value( $netmix_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $netmix_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $netmix_header_id ) ) ); ?>
				<?php
				echo ! empty( $netmix_header_image ) || ! empty( $netmix_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'netmix_action_show_layout', $netmix_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
