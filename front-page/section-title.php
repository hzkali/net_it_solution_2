<?php
$netmix_slider_sc = netmix_get_theme_option( 'front_page_title_shortcode' );
if ( ! empty( $netmix_slider_sc ) && strpos( $netmix_slider_sc, '[' ) !== false && strpos( $netmix_slider_sc, ']' ) !== false ) {

	?><div class="front_page_section front_page_section_title front_page_section_slider front_page_section_title_slider">
	<?php
		// Add anchor
		$netmix_anchor_icon = netmix_get_theme_option( 'front_page_title_anchor_icon' );
		$netmix_anchor_text = netmix_get_theme_option( 'front_page_title_anchor_text' );
	if ( ( ! empty( $netmix_anchor_icon ) || ! empty( $netmix_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode(
			'[trx_sc_anchor id="front_page_section_title"'
									. ( ! empty( $netmix_anchor_icon ) ? ' icon="' . esc_attr( $netmix_anchor_icon ) . '"' : '' )
									. ( ! empty( $netmix_anchor_text ) ? ' title="' . esc_attr( $netmix_anchor_text ) . '"' : '' )
									. ']'
		);
	}
		// Show slider (or any other content, generated by shortcode)
		echo do_shortcode( $netmix_slider_sc );
	?>
	</div>
	<?php

} else {

	?>
	<div class="front_page_section front_page_section_title
		<?php
		$netmix_scheme = netmix_get_theme_option( 'front_page_title_scheme' );
		if ( ! empty( $netmix_scheme ) && ! netmix_is_inherit( $netmix_scheme ) ) {
			echo ' scheme_' . esc_attr( $netmix_scheme );
		}
		echo ' front_page_section_paddings_' . esc_attr( netmix_get_theme_option( 'front_page_title_paddings' ) );
		?>
		"
		<?php
		$netmix_css      = '';
		$netmix_bg_image = netmix_get_theme_option( 'front_page_title_bg_image' );
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
		$netmix_anchor_icon = netmix_get_theme_option( 'front_page_title_anchor_icon' );
		$netmix_anchor_text = netmix_get_theme_option( 'front_page_title_anchor_text' );
	if ( ( ! empty( $netmix_anchor_icon ) || ! empty( $netmix_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode(
			'[trx_sc_anchor id="front_page_section_title"'
									. ( ! empty( $netmix_anchor_icon ) ? ' icon="' . esc_attr( $netmix_anchor_icon ) . '"' : '' )
									. ( ! empty( $netmix_anchor_text ) ? ' title="' . esc_attr( $netmix_anchor_text ) . '"' : '' )
									. ']'
		);
	}
	?>
		<div class="front_page_section_inner front_page_section_title_inner
		<?php
		if ( netmix_get_theme_option( 'front_page_title_fullheight' ) ) {
			echo ' netmix-full-height sc_layouts_flex sc_layouts_columns_middle';
		}
		?>
			"
			<?php
			$netmix_css      = '';
			$netmix_bg_mask  = netmix_get_theme_option( 'front_page_title_bg_mask' );
			$netmix_bg_color_type = netmix_get_theme_option( 'front_page_title_bg_color_type' );
			if ( 'custom' == $netmix_bg_color_type ) {
				$netmix_bg_color = netmix_get_theme_option( 'front_page_title_bg_color' );
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
			<div class="front_page_section_content_wrap front_page_section_title_content_wrap content_wrap">
				<?php
				// Caption
				$netmix_caption = netmix_get_theme_option( 'front_page_title_caption' );
				if ( ! empty( $netmix_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h1 class="front_page_section_caption front_page_section_title_caption front_page_block_<?php echo ! empty( $netmix_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $netmix_caption, 'netmix_kses_content' ); ?></h1>
					<?php
				}

				// Description (text)
				$netmix_description = netmix_get_theme_option( 'front_page_title_description' );
				if ( ! empty( $netmix_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_title_description front_page_block_<?php echo ! empty( $netmix_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $netmix_description ), 'netmix_kses_content' ); ?></div>
					<?php
				}

				// Buttons
				if ( netmix_get_theme_option( 'front_page_title_button1_link' ) != '' || netmix_get_theme_option( 'front_page_title_button2_link' ) != '' ) {
					?>
					<div class="front_page_section_buttons front_page_section_title_buttons">
					<?php
						netmix_show_layout( netmix_customizer_partial_refresh_front_page_title_button1_link() );
						netmix_show_layout( netmix_customizer_partial_refresh_front_page_title_button2_link() );
					?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
}