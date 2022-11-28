<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

// Page (category, tag, archive, author) title

if ( netmix_need_page_title() ) {
	netmix_sc_layouts_showed( 'title', true );
	netmix_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								netmix_show_post_meta(
									apply_filters(
										'netmix_filter_post_meta_args', array(
											'components' => netmix_array_get_keys_by_value( netmix_get_theme_option( 'meta_parts' ) ),
											'counters'   => netmix_array_get_keys_by_value( netmix_get_theme_option( 'counters' ) ),
											'seo'        => netmix_is_on( netmix_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$netmix_blog_title           = netmix_get_blog_title();
							$netmix_blog_title_text      = '';
							$netmix_blog_title_class     = '';
							$netmix_blog_title_link      = '';
							$netmix_blog_title_link_text = '';
							if ( is_array( $netmix_blog_title ) ) {
								$netmix_blog_title_text      = $netmix_blog_title['text'];
								$netmix_blog_title_class     = ! empty( $netmix_blog_title['class'] ) ? ' ' . $netmix_blog_title['class'] : '';
								$netmix_blog_title_link      = ! empty( $netmix_blog_title['link'] ) ? $netmix_blog_title['link'] : '';
								$netmix_blog_title_link_text = ! empty( $netmix_blog_title['link_text'] ) ? $netmix_blog_title['link_text'] : '';
							} else {
								$netmix_blog_title_text = $netmix_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $netmix_blog_title_class ); ?>">
								<?php
								$netmix_top_icon = netmix_get_term_image_small();
								if ( ! empty( $netmix_top_icon ) ) {
									$netmix_attr = netmix_getimagesize( $netmix_top_icon );
									?>
									<img src="<?php echo esc_url( $netmix_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'netmix' ); ?>"
										<?php
										if ( ! empty( $netmix_attr[3] ) ) {
											netmix_show_layout( $netmix_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses( $netmix_blog_title_text, 'netmix_kses_content' );
								?>
							</h1>
							<?php
							if ( ! empty( $netmix_blog_title_link ) && ! empty( $netmix_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $netmix_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $netmix_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						?>
						<div class="sc_layouts_title_breadcrumbs">
							<?php
							do_action( 'netmix_action_breadcrumbs' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
