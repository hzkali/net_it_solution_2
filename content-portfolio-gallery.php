<?php
/**
 * The Gallery template to display posts
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
$netmix_post_format = get_post_format();
$netmix_post_format = empty( $netmix_post_format ) ? 'standard' : str_replace( 'post-format-', '', $netmix_post_format );
$netmix_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

?><div class="
<?php
if ( ! empty( $netmix_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo 'masonry_item masonry_item-1_' . esc_attr( $netmix_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $netmix_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $netmix_columns )
		. ' post_layout_gallery'
		. ' post_layout_gallery_' . esc_attr( $netmix_columns )
	);
	netmix_add_blog_animation( $netmix_template_args );
	?>
	data-size="
		<?php
		if ( ! empty( $netmix_image[1] ) && ! empty( $netmix_image[2] ) ) {
			echo intval( $netmix_image[1] ) . 'x' . intval( $netmix_image[2] );}
		?>
	"
	data-src="
		<?php
		if ( ! empty( $netmix_image[0] ) ) {
			echo esc_url( $netmix_image[0] );}
		?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$netmix_image_hover = 'icon';  
if ( in_array( $netmix_image_hover, array( 'icons', 'zoom' ) ) ) {
	$netmix_image_hover = 'dots';
}
$netmix_components = netmix_array_get_keys_by_value( netmix_get_theme_option( 'meta_parts' ) );
netmix_show_post_featured(
	array(
		'hover'         => $netmix_image_hover,
		'no_links'      => ! empty( $netmix_template_args['no_links'] ),
		'thumb_size'    => netmix_get_thumb_size( strpos( netmix_get_theme_option( 'body_style' ), 'full' ) !== false || $netmix_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only'    => true,
		'show_no_image' => true,
		'post_info'     => '<div class="post_details">'
						. '<h2 class="post_title">'
							. ( empty( $netmix_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
								: esc_html( get_the_title() )
								)
						. '</h2>'
						. '<div class="post_description">'
							. ( ! empty( $netmix_components )
								? netmix_show_post_meta(
									apply_filters(
										'netmix_filter_post_meta_args', array(
											'components' => $netmix_components,
											'seo'      => false,
											'echo'     => false,
										), $netmix_blog_style[0], $netmix_columns
									)
								)
								: ''
								)
							. ( empty( $netmix_template_args['hide_excerpt'] )
								? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
								: ''
								)
							. ( empty( $netmix_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'netmix' ) . '</span></a>'
								: ''
								)
						. '</div>'
					. '</div>',
	)
);
?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
