<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.10
 */


// Socials
if ( netmix_is_on( netmix_get_theme_option( 'socials_in_footer' ) ) ) {
	$netmix_output = netmix_get_socials_links();
	if ( '' != $netmix_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php netmix_show_layout( $netmix_output ); ?>
			</div>
		</div>
		<?php
	}
}
