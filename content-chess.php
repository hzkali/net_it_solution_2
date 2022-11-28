<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

$netmix_template_args = get_query_var( 'netmix_template_args' );
if ( is_array( $netmix_template_args ) ) {
	$netmix_columns    = empty( $netmix_template_args['columns'] ) ? 1 : max( 1, min( 3, $netmix_template_args['columns'] ) );
	$netmix_blog_style = array( $netmix_template_args['type'], $netmix_columns );
} else {
	$netmix_blog_style = explode( '_', netmix_get_theme_option( 'blog_style' ) );
	$netmix_columns    = empty( $netmix_blog_style[1] ) ? 1 : max( 1, min( 3, $netmix_blog_style[1] ) );
}
$netmix_expanded    = ! netmix_sidebar_present() && netmix_is_on( netmix_get_theme_option( 'expand_content' ) );
$netmix_post_format = get_post_format();
$netmix_post_format = empty( $netmix_post_format ) ? 'standard' : str_replace( 'post-format-', '', $netmix_post_format );

?><article id="post-<?php the_ID(); ?>"	data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item'
		. ' post_layout_chess'
		. ' post_layout_chess_' . esc_attr( $netmix_columns )
		. ' post_format_' . esc_attr( $netmix_post_format )
		. ( ! empty( $netmix_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
	);
	netmix_add_blog_animation( $netmix_template_args );
	?>
>

	<?php
	// Add anchor
	if ( 1 == $netmix_columns && ! is_array( $netmix_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" icon="' . esc_attr( netmix_get_post_icon() ) . '"]' );
	}

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	$netmix_hover = ! empty( $netmix_template_args['hover'] ) && ! netmix_is_inherit( $netmix_template_args['hover'] )
						? $netmix_template_args['hover']
						: netmix_get_theme_option( 'image_hover' );
	netmix_show_post_featured(
		array(
			'class'         => 1 == $netmix_columns && ! is_array( $netmix_template_args ) ? 'netmix-full-height' : '',
			'hover'         => $netmix_hover,
			'no_links'      => ! empty( $netmix_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_ratio'   => '1:1',
			'thumb_bg'      => true,
			'thumb_size'    => netmix_get_thumb_size(
				strpos( netmix_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $netmix_columns ? 'huge' : 'original' )
										: ( 2 < $netmix_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php
			do_action( 'netmix_action_before_post_title' );

			// Post title
			if ( empty( $netmix_template_args['no_links'] ) ) {
				the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			} else {
				the_title( '<h3 class="post_title entry-title">', '</h3>' );
			}

			do_action( 'netmix_action_before_post_meta' );

			// Post meta
			$netmix_components = netmix_array_get_keys_by_value( netmix_get_theme_option( 'meta_parts' ) );
			$netmix_post_meta  = empty( $netmix_components ) || in_array( $netmix_hover, array( 'border', 'pull', 'slide', 'fade' ) )
										? ''
										: netmix_show_post_meta(
											apply_filters(
												'netmix_filter_post_meta_args', array(
													'components' => $netmix_components,
													'seo'  => false,
													'echo' => false,
												), $netmix_blog_style[0], $netmix_columns
											)
										);
			netmix_show_layout( $netmix_post_meta );
			?>
		</div><!-- .entry-header -->

		<div class="post_content entry-content">
			<?php
			// Post content area
			if ( empty( $netmix_template_args['hide_excerpt'] )  && netmix_get_theme_option( 'excerpt_length' ) > 0 ) {
				netmix_show_post_content( $netmix_template_args, '<div class="post_content_inner">', '</div>' );
			}
			// Post meta
			if ( in_array( $netmix_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				netmix_show_layout( $netmix_post_meta );
			}
			// More button
			if ( empty( $netmix_template_args['no_links'] ) && ! in_array( $netmix_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				netmix_show_post_more_link( $netmix_template_args, '<p>', '</p>' );
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
