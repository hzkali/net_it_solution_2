<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

$netmix_link        = get_permalink();
$netmix_post_format = get_post_format();
$netmix_post_format = empty( $netmix_post_format ) ? 'standard' : str_replace( 'post-format-', '', $netmix_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $netmix_post_format ) ); ?>>
	<?php
	netmix_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'netmix_filter_related_thumb_size', netmix_get_thumb_size( (int) netmix_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
			'show_no_image' => netmix_get_no_image() != '',
			'post_info'     => '<div class="post_header entry-header">'
									. '<div class="post_categories">' . wp_kses( netmix_get_post_categories( '' ), 'netmix_kses_content' ) . '</div>'
									. '<h6 class="post_title entry-title"><a href="' . esc_url( $netmix_link ) . '">' . wp_kses_data( get_the_title() ) . '</a></h6>'
									. ( in_array( get_post_type(), array( 'post', 'attachment' ) )
											? '<div class="post_meta"><a href="' . esc_url( $netmix_link ) . '" class="post_meta_item post_date">' . wp_kses_data( netmix_get_date() ) . '</a></div>'
											: '' )
								. '</div>',
		)
	);
	?>
</div>
