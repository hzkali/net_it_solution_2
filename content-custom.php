<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.50
 */

$netmix_template_args = get_query_var( 'netmix_template_args' );
if ( is_array( $netmix_template_args ) ) {
	$netmix_columns    = empty( $netmix_template_args['columns'] ) ? 2 : max( 1, $netmix_template_args['columns'] );
	$netmix_blog_style = array( $netmix_template_args['type'], $netmix_columns );
} else {
	$netmix_blog_style = explode( '_', netmix_get_theme_option( 'blog_style' ) );
	$netmix_columns    = empty( $netmix_blog_style[1] ) ? 2 : max( 1, $netmix_blog_style[1] );
}
$netmix_blog_id       = netmix_get_custom_blog_id( join( '_', $netmix_blog_style ) );
$netmix_blog_style[0] = str_replace( 'blog-custom-', '', $netmix_blog_style[0] );
$netmix_expanded      = ! netmix_sidebar_present() && netmix_is_on( netmix_get_theme_option( 'expand_content' ) );
$netmix_components    = netmix_array_get_keys_by_value( netmix_get_theme_option( 'meta_parts' ) );

$netmix_post_format   = get_post_format();
$netmix_post_format   = empty( $netmix_post_format ) ? 'standard' : str_replace( 'post-format-', '', $netmix_post_format );

$netmix_blog_meta     = netmix_get_custom_layout_meta( $netmix_blog_id );
$netmix_custom_style  = ! empty( $netmix_blog_meta['scripts_required'] ) ? $netmix_blog_meta['scripts_required'] : 'none';

if ( ! empty( $netmix_template_args['slider'] ) || $netmix_columns > 1 || ! netmix_is_off( $netmix_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $netmix_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo ( netmix_is_off( $netmix_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $netmix_custom_style ) ) . '-1_' . esc_attr( $netmix_columns );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
			'post_item post_format_' . esc_attr( $netmix_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $netmix_columns )
					. ' post_layout_' . esc_attr( $netmix_blog_style[0] )
					. ' post_layout_' . esc_attr( $netmix_blog_style[0] ) . '_' . esc_attr( $netmix_columns )
					. ( ! netmix_is_off( $netmix_custom_style )
						? ' post_layout_' . esc_attr( $netmix_custom_style )
							. ' post_layout_' . esc_attr( $netmix_custom_style ) . '_' . esc_attr( $netmix_columns )
						: ''
						)
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
	// Custom layout
	do_action( 'netmix_action_show_layout', $netmix_blog_id, get_the_ID() );
	?>
</article><?php
if ( ! empty( $netmix_template_args['slider'] ) || $netmix_columns > 1 || ! netmix_is_off( $netmix_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
