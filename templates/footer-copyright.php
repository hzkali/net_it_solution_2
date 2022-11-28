<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
$netmix_copyright_scheme = netmix_get_theme_option( 'copyright_scheme' );
if ( ! empty( $netmix_copyright_scheme ) && ! netmix_is_inherit( $netmix_copyright_scheme  ) ) {
	echo ' scheme_' . esc_attr( $netmix_copyright_scheme );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$netmix_copyright = netmix_get_theme_option( 'copyright' );
			if ( ! empty( $netmix_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$netmix_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $netmix_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$netmix_copyright = netmix_prepare_macros( $netmix_copyright );
				// Display copyright
				echo wp_kses( nl2br( $netmix_copyright ), 'netmix_kses_content' );
			}
			?>
			</div>
		</div>
	</div>
</div>
