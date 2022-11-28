<div class="front_page_section front_page_section_googlemap<?php
	$netmix_scheme = netmix_get_theme_option( 'front_page_googlemap_scheme' );
	if ( ! empty( $netmix_scheme ) && ! netmix_is_inherit( $netmix_scheme ) ) {
		echo ' scheme_' . esc_attr( $netmix_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( netmix_get_theme_option( 'front_page_googlemap_paddings' ) );
?>"
		<?php
		$netmix_css      = '';
		$netmix_bg_image = netmix_get_theme_option( 'front_page_googlemap_bg_image' );
		if ( ! empty( $netmix_bg_image ) ) {
			$netmix_css .= 'background-image: url(' . esc_url( netmix_get_attachment_url( $netmix_bg_image ) ) . ');';
		}
		if ( ! empty( $netmix_css ) ) {
			echo ' style="' . esc_attr( $netmix_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$netmix_anchor_icon = netmix_get_theme_option( 'front_page_googlemap_anchor_icon' );
	$netmix_anchor_text = netmix_get_theme_option( 'front_page_googlemap_anchor_text' );
if ( ( ! empty( $netmix_anchor_icon ) || ! empty( $netmix_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_googlemap"'
									. ( ! empty( $netmix_anchor_icon ) ? ' icon="' . esc_attr( $netmix_anchor_icon ) . '"' : '' )
									. ( ! empty( $netmix_anchor_text ) ? ' title="' . esc_attr( $netmix_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_googlemap_inner
		<?php
		$netmix_layout = netmix_get_theme_option( 'front_page_googlemap_layout' );
		echo ' front_page_section_layout_' . esc_attr( $netmix_layout );
		if ( netmix_get_theme_option( 'front_page_googlemap_fullheight' ) ) {
			echo ' netmix-full-height sc_layouts_flex sc_layouts_columns_middle';
		}
		?>
		"
			<?php
			$netmix_css      = '';
			$netmix_bg_mask  = netmix_get_theme_option( 'front_page_googlemap_bg_mask' );
			$netmix_bg_color_type = netmix_get_theme_option( 'front_page_googlemap_bg_color_type' );
			if ( 'custom' == $netmix_bg_color_type ) {
				$netmix_bg_color = netmix_get_theme_option( 'front_page_googlemap_bg_color' );
			} elseif ( 'scheme_bg_color' == $netmix_bg_color_type ) {
				$netmix_bg_color = netmix_get_scheme_color( 'bg_color', $netmix_scheme );
			} else {
				$netmix_bg_color = '';
			}
			if ( ! empty( $netmix_bg_color ) && $netmix_bg_mask > 0 ) {
				$netmix_css .= 'background-color: ' . esc_attr(
					1 == $netmix_bg_mask ? $netmix_bg_color : netmix_hex2rgba( $netmix_bg_color, $netmix_bg_mask )
				) . ';';
			}
			if ( ! empty( $netmix_css ) ) {
				echo ' style="' . esc_attr( $netmix_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_googlemap_content_wrap
		<?php
		if ( 'fullwidth' != $netmix_layout ) {
			echo ' content_wrap';
		}
		?>
		">
			<?php
			// Content wrap with title and description
			$netmix_caption     = netmix_get_theme_option( 'front_page_googlemap_caption' );
			$netmix_description = netmix_get_theme_option( 'front_page_googlemap_description' );
			if ( ! empty( $netmix_caption ) || ! empty( $netmix_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'fullwidth' == $netmix_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}
					// Caption
				if ( ! empty( $netmix_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_googlemap_caption front_page_block_<?php echo ! empty( $netmix_caption ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $netmix_caption, 'netmix_kses_content' );
					?>
					</h2>
					<?php
				}

					// Description (text)
				if ( ! empty( $netmix_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_googlemap_description front_page_block_<?php echo ! empty( $netmix_description ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( wpautop( $netmix_description ), 'netmix_kses_content' );
					?>
					</div>
					<?php
				}
				if ( 'fullwidth' == $netmix_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$netmix_content = netmix_get_theme_option( 'front_page_googlemap_content' );
			if ( ! empty( $netmix_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'columns' == $netmix_layout ) {
					?>
					<div class="front_page_section_columns front_page_section_googlemap_columns columns_wrap">
						<div class="column-1_3">
					<?php
				} elseif ( 'fullwidth' == $netmix_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}

				?>
				<div class="front_page_section_content front_page_section_googlemap_content front_page_block_<?php echo ! empty( $netmix_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $netmix_content, 'netmix_kses_content' );
				?>
				</div>
				<?php

				if ( 'columns' == $netmix_layout ) {
					?>
					</div><div class="column-2_3">
					<?php
				} elseif ( 'fullwidth' == $netmix_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Widgets output
			?>
			<div class="front_page_section_output front_page_section_googlemap_output">
			<?php
			if ( is_active_sidebar( 'front_page_googlemap_widgets' ) ) {
				dynamic_sidebar( 'front_page_googlemap_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! netmix_exists_trx_addons() ) {
					netmix_customizer_need_trx_addons_message();
				} else {
					netmix_customizer_need_widgets_message( 'front_page_googlemap_caption', 'ThemeREX Addons - Google map' );
				}
			}
			?>
			</div>
			<?php

			if ( 'columns' == $netmix_layout && ( ! empty( $netmix_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>
		</div>
	</div>
</div>
