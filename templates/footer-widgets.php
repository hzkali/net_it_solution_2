<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.10
 */

// Footer sidebar
$netmix_footer_name    = netmix_get_theme_option( 'footer_widgets' );
$netmix_footer_present = ! netmix_is_off( $netmix_footer_name ) && is_active_sidebar( $netmix_footer_name );
if ( $netmix_footer_present ) {
	netmix_storage_set( 'current_sidebar', 'footer' );
	$netmix_footer_wide = netmix_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $netmix_footer_name ) ) {
		dynamic_sidebar( $netmix_footer_name );
	}
	$netmix_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $netmix_out ) ) {
		$netmix_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $netmix_out );
		$netmix_need_columns = true;   //or check: strpos($netmix_out, 'columns_wrap')===false;
		if ( $netmix_need_columns ) {
			$netmix_columns = max( 0, (int) netmix_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $netmix_columns ) {
				$netmix_columns = min( 4, max( 1, netmix_tags_count( $netmix_out, 'aside' ) ) );
			}
			if ( $netmix_columns > 1 ) {
				$netmix_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $netmix_columns ) . ' widget', $netmix_out );
			} else {
				$netmix_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $netmix_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $netmix_footer_wide ) {
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
				netmix_show_layout( $netmix_out );
				do_action( 'netmix_action_after_sidebar' );
				if ( $netmix_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $netmix_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
