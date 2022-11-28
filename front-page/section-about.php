<div class="front_page_section front_page_section_about<?php
	$netmix_scheme = netmix_get_theme_option( 'front_page_about_scheme' );
	if ( ! empty( $netmix_scheme ) && ! netmix_is_inherit( $netmix_scheme ) ) {
		echo ' scheme_' . esc_attr( $netmix_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( netmix_get_theme_option( 'front_page_about_paddings' ) );
?>"
		<?php
		$netmix_css      = '';
		$netmix_bg_image = netmix_get_theme_option( 'front_page_about_bg_image' );
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
	$netmix_anchor_icon = netmix_get_theme_option( 'front_page_about_anchor_icon' );
	$netmix_anchor_text = netmix_get_theme_option( 'front_page_about_anchor_text' );
if ( ( ! empty( $netmix_anchor_icon ) || ! empty( $netmix_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_about"'
									. ( ! empty( $netmix_anchor_icon ) ? ' icon="' . esc_attr( $netmix_anchor_icon ) . '"' : '' )
									. ( ! empty( $netmix_anchor_text ) ? ' title="' . esc_attr( $netmix_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_about_inner
	<?php
	if ( netmix_get_theme_option( 'front_page_about_fullheight' ) ) {
		echo ' netmix-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$netmix_css           = '';
			$netmix_bg_mask       = netmix_get_theme_option( 'front_page_about_bg_mask' );
			$netmix_bg_color_type = netmix_get_theme_option( 'front_page_about_bg_color_type' );
			if ( 'custom' == $netmix_bg_color_type ) {
				$netmix_bg_color = netmix_get_theme_option( 'front_page_about_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_about_content_wrap content_wrap">
			<?php
			// Caption
			$netmix_caption = netmix_get_theme_option( 'front_page_about_caption' );
			if ( ! empty( $netmix_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_about_caption front_page_block_<?php echo ! empty( $netmix_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $netmix_caption, 'netmix_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$netmix_description = netmix_get_theme_option( 'front_page_about_description' );
			if ( ! empty( $netmix_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_about_description front_page_block_<?php echo ! empty( $netmix_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $netmix_description ), 'netmix_kses_content' ); ?></div>
				<?php
			}

			// Content
			$netmix_content = netmix_get_theme_option( 'front_page_about_content' );
			if ( ! empty( $netmix_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_content front_page_section_about_content front_page_block_<?php echo ! empty( $netmix_content ) ? 'filled' : 'empty'; ?>">
				<?php
					$netmix_page_content_mask = '%%CONTENT%%';
				if ( strpos( $netmix_content, $netmix_page_content_mask ) !== false ) {
					$netmix_content = preg_replace(
						'/(\<p\>\s*)?' . $netmix_page_content_mask . '(\s*\<\/p\>)/i',
						sprintf(
							'<div class="front_page_section_about_source">%s</div>',
							apply_filters( 'the_content', get_the_content() )
						),
						$netmix_content
					);
				}
					netmix_show_layout( $netmix_content );
				?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
