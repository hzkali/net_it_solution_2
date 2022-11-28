<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

							// Widgets area inside page content
							netmix_create_widgets_area( 'widgets_below_content' );
							?>
						</div><!-- </.content> -->
					<?php

					// Show main sidebar
					get_sidebar();

					$netmix_body_style = netmix_get_theme_option( 'body_style' );
					?>
					</div><!-- </.content_wrap> -->
					<?php

					// Widgets area below page content and related posts below page content
					$netmix_widgets_name = netmix_get_theme_option( 'widgets_below_page' );
					$netmix_show_widgets = ! netmix_is_off( $netmix_widgets_name ) && is_active_sidebar( $netmix_widgets_name );
					$netmix_show_related = is_single() && netmix_get_theme_option( 'related_position' ) == 'below_page';
					if ( $netmix_show_widgets || $netmix_show_related ) {
						if ( 'fullscreen' != $netmix_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $netmix_show_related ) {
							do_action( 'netmix_action_related_posts' );
						}

						// Widgets area below page content
						if ( $netmix_show_widgets ) {
							netmix_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $netmix_body_style ) {
							?>
							</div><!-- </.content_wrap> -->
							<?php
						}
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Single posts banner before footer
			if ( is_singular( 'post' ) ) {
				netmix_show_post_banner('footer');
			}
			// Footer
			$netmix_footer_type = netmix_get_theme_option( 'footer_type' );
			if ( 'custom' == $netmix_footer_type && ! netmix_is_layouts_available() ) {
				$netmix_footer_type = 'default';
			}
			get_template_part( apply_filters( 'netmix_filter_get_template_part', "templates/footer-{$netmix_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php wp_footer(); ?>

</body>
</html>