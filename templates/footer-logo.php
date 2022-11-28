<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.10
 */

// Logo
if ( netmix_is_on( netmix_get_theme_option( 'logo_in_footer' ) ) ) {
	$netmix_logo_image = netmix_get_logo_image( 'footer' );
	$netmix_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $netmix_logo_image['logo'] ) || ! empty( $netmix_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $netmix_logo_image['logo'] ) ) {
					$netmix_attr = netmix_getimagesize( $netmix_logo_image['logo'] );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $netmix_logo_image['logo'] ) . '"'
								. ( ! empty( $netmix_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $netmix_logo_image['logo_retina'] ) . ' 2x"' : '' )
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'netmix' ) . '"'
								. ( ! empty( $netmix_attr[3] ) ? ' ' . wp_kses_data( $netmix_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $netmix_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $netmix_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
