<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.14
 */
$netmix_header_video = netmix_get_header_video();
$netmix_embed_video  = '';
if ( ! empty( $netmix_header_video ) && ! netmix_is_from_uploads( $netmix_header_video ) ) {
	if ( netmix_is_youtube_url( $netmix_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $netmix_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php netmix_show_layout( netmix_get_embed_video( $netmix_header_video ) ); ?></div>
		<?php
	}
}
