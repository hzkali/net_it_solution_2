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
	$netmix_columns    = empty( $netmix_template_args['columns'] ) ? 2 : max( 1, $netmix_template_args['columns'] );
	$netmix_blog_style = array( $netmix_template_args['type'], $netmix_columns );
} else {
	$netmix_blog_style = explode( '_', netmix_get_theme_option( 'blog_style' ) );
	$netmix_columns    = empty( $netmix_blog_style[1] ) ? 2 : max( 1, $netmix_blog_style[1] );
}
$netmix_expanded   = ! netmix_sidebar_present() && netmix_is_on( netmix_get_theme_option( 'expand_content' ) );
$netmix_components = netmix_array_get_keys_by_value( netmix_get_theme_option( 'meta_parts' ) );

$netmix_post_format = get_post_format();
$netmix_post_format = empty( $netmix_post_format ) ? 'standard' : str_replace( 'post-format-', '', $netmix_post_format );

?><div class="
<?php
if ( ! empty( $netmix_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( 'classic' == $netmix_blog_style[0] ? 'column' : 'masonry_item masonry_item' ) . '-1_' . esc_attr( $netmix_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $netmix_post_format )
				. ' post_layout_classic post_layout_classic_' . esc_attr( $netmix_columns )
				. ' post_layout_' . esc_attr( $netmix_blog_style[0] )
				. ' post_layout_' . esc_attr( $netmix_blog_style[0] ) . '_' . esc_attr( $netmix_columns )
	);
	netmix_add_blog_animation( $netmix_template_args );
	?>
>
	<?php

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
			'thumb_size' => netmix_get_thumb_size(
				'classic' == $netmix_blog_style[0]
						? ( strpos( netmix_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $netmix_columns > 2 ? 'big' : 'huge' )
								: ( $netmix_columns > 2
									? ( $netmix_expanded ? 'med' : 'small' )
									: ( $netmix_expanded ? 'big' : 'med' )
									)
							)
						: ( strpos( netmix_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $netmix_columns > 2 ? 'masonry-big' : 'full' )
								: ( $netmix_columns <= 2 && $netmix_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $netmix_hover,
			'no_links'   => ! empty( $netmix_template_args['no_links'] ),
		)
	);

	if ( ! in_array( $netmix_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'netmix_action_before_post_title' );

			// Post title
			if ( empty( $netmix_template_args['no_links'] ) ) {
				the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
			} else {
				the_title( '<h4 class="post_title entry-title">', '</h4>' );
			}

			do_action( 'netmix_action_before_post_meta' );

			// Post meta
			if ( ! empty( $netmix_components ) && ! in_array( $netmix_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				netmix_show_post_meta(
					apply_filters(
						'netmix_filter_post_meta_args', array(
							'components' => $netmix_components,
							'seo'        => false,
						), $netmix_blog_style[0], $netmix_columns
					)
				);
			}

			do_action( 'netmix_action_after_post_meta' );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>

	<div class="post_content entry-content">
		<?php
		if ( empty( $netmix_template_args['hide_excerpt'] ) && netmix_get_theme_option( 'excerpt_length' ) > 0 ) {
			// Post content area
			netmix_show_post_content( $netmix_template_args, '<div class="post_content_inner">', '</div>' );
		}
		
		// Post meta
		if ( in_array( $netmix_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			if ( ! empty( $netmix_components ) ) {
				netmix_show_post_meta(
					apply_filters(
						'netmix_filter_post_meta_args', array(
							'components' => $netmix_components,
						), $netmix_blog_style[0], $netmix_columns
					)
				);
			}
		}
		
		// More button
		if ( empty( $netmix_template_args['no_links'] ) && ! empty( $netmix_template_args['more_text'] ) && ! in_array( $netmix_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			netmix_show_post_more_link( $netmix_template_args, '<p>', '</p>' );
		}
		?>
	</div><!-- .entry-content -->

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
