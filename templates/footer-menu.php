<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.10
 */

// Footer menu
$netmix_menu_footer = netmix_get_nav_menu( 'menu_footer' );
if ( ! empty( $netmix_menu_footer ) ) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php
			netmix_show_layout(
				$netmix_menu_footer,
				'<nav class="menu_footer_nav_area sc_layouts_menu sc_layouts_menu_default"'
					. ' itemscope itemtype="//schema.org/SiteNavigationElement"'
					. '>',
				'</nav>'
			);
			?>
		</div>
	</div>
	<?php
}
