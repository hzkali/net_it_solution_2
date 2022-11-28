<?php
/**
 * The template for homepage posts with custom style
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.50
 */

netmix_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	$netmix_blog_style = netmix_get_theme_option( 'blog_style' );
	$netmix_parts      = explode( '_', $netmix_blog_style );
	$netmix_columns    = ! empty( $netmix_parts[1] ) ? max( 1, min( 6, (int) $netmix_parts[1] ) ) : 1;
	$netmix_blog_id    = netmix_get_custom_blog_id( $netmix_blog_style );
	$netmix_blog_meta  = netmix_get_custom_layout_meta( $netmix_blog_id );
	if ( ! empty( $netmix_blog_meta['margin'] ) ) {
		netmix_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( netmix_prepare_css_value( $netmix_blog_meta['margin'] ) ) ) );
	}
	$netmix_custom_style = ! empty( $netmix_blog_meta['scripts_required'] ) ? $netmix_blog_meta['scripts_required'] : 'none';

	netmix_blog_archive_start();

	$netmix_classes    = 'posts_container blog_custom_wrap' 
							. ( ! netmix_is_off( $netmix_custom_style )
								? sprintf( ' %s_wrap', $netmix_custom_style )
								: ( $netmix_columns > 1 
									? ' columns_wrap columns_padding_bottom' 
									: ''
									)
								);
	$netmix_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$netmix_sticky_out = netmix_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $netmix_stickies ) && count( $netmix_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $netmix_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $netmix_sticky_out ) {
		if ( netmix_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( netmix_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'netmix_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}
		?>
		<div class="<?php echo esc_attr( $netmix_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $netmix_sticky_out && ! is_sticky() ) {
			$netmix_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $netmix_classes ); ?>">
			<?php
		}
		$netmix_part = $netmix_sticky_out && is_sticky() ? 'sticky' : 'custom';
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'content', $netmix_part ), $netmix_part );
	}
	?>
	</div>
	<?php

	netmix_show_pagination();

	netmix_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
