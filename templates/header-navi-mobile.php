<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr( netmix_get_theme_option( 'menu_mobile_fullscreen' ) > 0 ? 'fullscreen' : 'narrow' ); ?> scheme_dark">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close theme_button_close"><span class="theme_button_close_icon"></span></a>
		<?php

		// Logo
		set_query_var( 'netmix_logo_args', array( 'type' => 'mobile' ) );
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-logo' ) );
		set_query_var( 'netmix_logo_args', array() );

		// Mobile menu
		$netmix_menu_mobile = netmix_get_nav_menu( 'menu_mobile' );
		if ( empty( $netmix_menu_mobile ) ) {
			$netmix_menu_mobile = apply_filters( 'netmix_filter_get_mobile_menu', '' );
			if ( empty( $netmix_menu_mobile ) ) {
				$netmix_menu_mobile = netmix_get_nav_menu( 'menu_main' );
				if ( empty( $netmix_menu_mobile ) ) {
					$netmix_menu_mobile = netmix_get_nav_menu();
				}
			}
		}
		if ( ! empty( $netmix_menu_mobile ) ) {
			$netmix_menu_mobile = str_replace(
				array( 'menu_main',   'id="menu-',        'sc_layouts_menu_nav', 'sc_layouts_menu ', 'sc_layouts_hide_on_mobile', 'hide_on_mobile' ),
				array( 'menu_mobile', 'id="menu_mobile-', '',                    ' ',                '',                          '' ),
				$netmix_menu_mobile
			);
			if ( strpos( $netmix_menu_mobile, '<nav ' ) === false ) {
				$netmix_menu_mobile = sprintf( '<nav class="menu_mobile_nav_area" itemscope itemtype="//schema.org/SiteNavigationElement">%s</nav>', $netmix_menu_mobile );
			}
			netmix_show_layout( apply_filters( 'netmix_filter_menu_mobile_layout', $netmix_menu_mobile ) );
		}

		// Search field
		do_action(
			'netmix_action_search',
			array(
				'style' => 'normal',
				'class' => 'search_mobile',
				'ajax'  => false
			)
		);

		// Social icons
		netmix_show_layout( netmix_get_socials_links(), '<div class="socials_mobile">', '</div>' );
		?>
	</div>
</div>
