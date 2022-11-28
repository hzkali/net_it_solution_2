<?php
/**
 * The Portfolio template to display the content
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
		. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
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

	$netmix_image_hover = ! empty( $netmix_template_args['hover'] ) && ! netmix_is_inherit( $netmix_template_args['hover'] )
								? $netmix_template_args['hover']
								: netmix_get_theme_option( 'image_hover' );
	// Featured image
	netmix_show_post_featured(
		array(
			'hover'         => $netmix_image_hover,
			'no_links'      => ! empty( $netmix_template_args['no_links'] ),
			'thumb_size'    => netmix_get_thumb_size(
				strpos( netmix_get_theme_option( 'body_style' ), 'full' ) !== false || $netmix_columns < 3
								? 'masonry-big'
				: 'masonry'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $netmix_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $netmix_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!