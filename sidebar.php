<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

if ( netmix_sidebar_present() ) {
	ob_start();
	$netmix_sidebar_name = netmix_get_theme_option( 'sidebar_widgets' );
	netmix_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $netmix_sidebar_name ) ) {
		dynamic_sidebar( $netmix_sidebar_name );
	}
	$netmix_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $netmix_out ) ) {
		$netmix_sidebar_position    = netmix_get_theme_option( 'sidebar_position' );
		$netmix_sidebar_position_ss = netmix_get_theme_option( 'sidebar_position_ss' );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $netmix_sidebar_position );
			echo ' sidebar_' . esc_attr( $netmix_sidebar_position_ss );

			if ( 'float' == $netmix_sidebar_position_ss ) {
				echo ' sidebar_float';
			}
			$netmix_sidebar_scheme = netmix_get_theme_option( 'sidebar_scheme' );
			if ( ! empty( $netmix_sidebar_scheme ) && ! netmix_is_inherit( $netmix_sidebar_scheme ) ) {
				echo ' scheme_' . esc_attr( $netmix_sidebar_scheme );
			}
			?>
		" role="complementary">
			<?php
			// Single posts banner before sidebar
			netmix_show_post_banner( 'sidebar' );
			// Button to show/hide sidebar on mobile
			if ( in_array( $netmix_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$netmix_title = apply_filters( 'netmix_filter_sidebar_control_title', 'float' == $netmix_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'netmix' ) : '' );
				$netmix_text  = apply_filters( 'netmix_filter_sidebar_control_text', 'above' == $netmix_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'netmix' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $netmix_title ); ?>"><?php echo esc_html( $netmix_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'netmix_action_before_sidebar' );
				netmix_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $netmix_out ) );
				do_action( 'netmix_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<div class="clearfix"></div>
		<?php
	}
}
