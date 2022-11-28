<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

// Header sidebar
$netmix_header_name    = netmix_get_theme_option( 'header_widgets' );
$netmix_header_present = ! netmix_is_off( $netmix_header_name ) && is_active_sidebar( $netmix_header_name );
if ( $netmix_header_present ) {
	netmix_storage_set( 'current_sidebar', 'header' );
	$netmix_header_wide = netmix_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $netmix_header_name ) ) {
		dynamic_sidebar( $netmix_header_name );
	}
	$netmix_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $netmix_widgets_output ) ) {
		$netmix_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $netmix_widgets_output );
		$netmix_need_columns   = strpos( $netmix_widgets_output, 'columns_wrap' ) === false;
		if ( $netmix_need_columns ) {
			$netmix_columns = max( 0, (int) netmix_get_theme_option( 'header_columns' ) );
			if ( 0 == $netmix_columns ) {
				$netmix_columns = min( 6, max( 1, netmix_tags_count( $netmix_widgets_output, 'aside' ) ) );
			}
			if ( $netmix_columns > 1 ) {
				$netmix_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $netmix_columns ) . ' widget', $netmix_widgets_output );
			} else {
				$netmix_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $netmix_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $netmix_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $netmix_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'netmix_action_before_sidebar' );
				netmix_show_layout( $netmix_widgets_output );
				do_action( 'netmix_action_after_sidebar' );
				if ( $netmix_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $netmix_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
