<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.10
 */

$netmix_footer_id = netmix_get_custom_footer_id();
$netmix_footer_meta = get_post_meta( $netmix_footer_id, 'trx_addons_options', true );
if ( ! empty( $netmix_footer_meta['margin'] ) ) {
	netmix_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( netmix_prepare_css_value( $netmix_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $netmix_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $netmix_footer_id ) ) ); ?>
						<?php
						$netmix_footer_scheme = netmix_get_theme_option( 'footer_scheme' );
						if ( ! empty( $netmix_footer_scheme ) && ! netmix_is_inherit( $netmix_footer_scheme  ) ) {
							echo ' scheme_' . esc_attr( $netmix_footer_scheme );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'netmix_action_show_layout', $netmix_footer_id );
	?>
</footer><!-- /.footer_wrap -->
