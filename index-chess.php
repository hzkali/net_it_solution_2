<?php
/**
 * The template for homepage posts with "Chess" style
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

netmix_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	netmix_blog_archive_start();

	$netmix_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$netmix_sticky_out = netmix_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $netmix_stickies ) && count( $netmix_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $netmix_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $netmix_sticky_out ) {
		?>
		<div class="chess_wrap posts_container">
		<?php
	}
	
	while ( have_posts() ) {
		the_post();
		if ( $netmix_sticky_out && ! is_sticky() ) {
			$netmix_sticky_out = false;
			?>
			</div><div class="chess_wrap posts_container">
			<?php
		}
		$netmix_part = $netmix_sticky_out && is_sticky() ? 'sticky' : 'chess';
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
