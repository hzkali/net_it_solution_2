<div class="front_page_section front_page_section_woocommerce<?php
	$netmix_scheme = netmix_get_theme_option( 'front_page_woocommerce_scheme' );
	if ( ! empty( $netmix_scheme ) && ! netmix_is_inherit( $netmix_scheme ) ) {
		echo ' scheme_' . esc_attr( $netmix_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( netmix_get_theme_option( 'front_page_woocommerce_paddings' ) );
?>"
		<?php
		$netmix_css      = '';
		$netmix_bg_image = netmix_get_theme_option( 'front_page_woocommerce_bg_image' );
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
	$netmix_anchor_icon = netmix_get_theme_option( 'front_page_woocommerce_anchor_icon' );
	$netmix_anchor_text = netmix_get_theme_option( 'front_page_woocommerce_anchor_text' );
if ( ( ! empty( $netmix_anchor_icon ) || ! empty( $netmix_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_woocommerce"'
									. ( ! empty( $netmix_anchor_icon ) ? ' icon="' . esc_attr( $netmix_anchor_icon ) . '"' : '' )
									. ( ! empty( $netmix_anchor_text ) ? ' title="' . esc_attr( $netmix_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_woocommerce_inner
	<?php
	if ( netmix_get_theme_option( 'front_page_woocommerce_fullheight' ) ) {
		echo ' netmix-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$netmix_css      = '';
			$netmix_bg_mask  = netmix_get_theme_option( 'front_page_woocommerce_bg_mask' );
			$netmix_bg_color_type = netmix_get_theme_option( 'front_page_woocommerce_bg_color_type' );
			if ( 'custom' == $netmix_bg_color_type ) {
				$netmix_bg_color = netmix_get_theme_option( 'front_page_woocommerce_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_woocommerce_content_wrap content_wrap woocommerce">
			<?php
			// Content wrap with title and description
			$netmix_caption     = netmix_get_theme_option( 'front_page_woocommerce_caption' );
			$netmix_description = netmix_get_theme_option( 'front_page_woocommerce_description' );
			if ( ! empty( $netmix_caption ) || ! empty( $netmix_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $netmix_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_woocommerce_caption front_page_block_<?php echo ! empty( $netmix_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( $netmix_caption, 'netmix_kses_content' );
					?>
					</h2>
					<?php
				}

				// Description (text)
				if ( ! empty( $netmix_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_woocommerce_description front_page_block_<?php echo ! empty( $netmix_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( wpautop( $netmix_description ), 'netmix_kses_content' );
					?>
					</div>
					<?php
				}
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_woocommerce_output list_products shop_mode_thumbs">
			<?php
				$netmix_woocommerce_sc = netmix_get_theme_option( 'front_page_woocommerce_products' );
			if ( 'products' == $netmix_woocommerce_sc ) {
				$netmix_woocommerce_sc_ids      = netmix_get_theme_option( 'front_page_woocommerce_products_per_page' );
				$netmix_woocommerce_sc_per_page = count( explode( ',', $netmix_woocommerce_sc_ids ) );
			} else {
				$netmix_woocommerce_sc_per_page = max( 1, (int) netmix_get_theme_option( 'front_page_woocommerce_products_per_page' ) );
			}
				$netmix_woocommerce_sc_columns = max( 1, min( $netmix_woocommerce_sc_per_page, (int) netmix_get_theme_option( 'front_page_woocommerce_products_columns' ) ) );
				echo do_shortcode(
					"[{$netmix_woocommerce_sc}"
									. ( 'products' == $netmix_woocommerce_sc
											? ' ids="' . esc_attr( $netmix_woocommerce_sc_ids ) . '"'
											: '' )
									. ( 'product_category' == $netmix_woocommerce_sc
											? ' category="' . esc_attr( netmix_get_theme_option( 'front_page_woocommerce_products_categories' ) ) . '"'
											: '' )
									. ( 'best_selling_products' != $netmix_woocommerce_sc
											? ' orderby="' . esc_attr( netmix_get_theme_option( 'front_page_woocommerce_products_orderby' ) ) . '"'
												. ' order="' . esc_attr( netmix_get_theme_option( 'front_page_woocommerce_products_order' ) ) . '"'
											: '' )
									. ' per_page="' . esc_attr( $netmix_woocommerce_sc_per_page ) . '"'
									. ' columns="' . esc_attr( $netmix_woocommerce_sc_columns ) . '"'
					. ']'
				);
				?>
			</div>
		</div>
	</div>
</div>
