<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

$netmix_template_args = get_query_var( 'netmix_template_args' );
if ( is_array( $netmix_template_args ) ) {
	$netmix_columns    = empty( $netmix_template_args['columns'] ) ? 1 : max( 1, $netmix_template_args['columns'] );
	$netmix_blog_style = array( $netmix_template_args['type'], $netmix_columns );
	if ( ! empty( $netmix_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $netmix_columns > 1 ) {
		?>
		<div class="column-1_<?php echo esc_attr( $netmix_columns ); ?>">
		<?php
	}
}
$netmix_expanded    = ! netmix_sidebar_present() && netmix_is_on( netmix_get_theme_option( 'expand_content' ) );
$netmix_post_format = get_post_format();
$netmix_post_format = empty( $netmix_post_format ) ? 'standard' : str_replace( 'post-format-', '', $netmix_post_format );
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class( 'post_item post_layout_excerpt post_format_' . esc_attr( $netmix_post_format ) );
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
			'no_links'   => ! empty( $netmix_template_args['no_links'] ),
			'hover'      => $netmix_hover,
			'thumb_size' => netmix_get_thumb_size( strpos( netmix_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $netmix_expanded ? 'huge' : 'big' ) ),
		)
	);

	// Title and post meta
	$netmix_show_title = get_the_title() != '';
	$netmix_components = netmix_array_get_keys_by_value( netmix_get_theme_option( 'meta_parts' ) );
	$netmix_show_meta  = ! empty( $netmix_components ) && ! in_array( $netmix_hover, array( 'border', 'pull', 'slide', 'fade' ) );
	if ( $netmix_show_title || $netmix_show_meta ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			if ( $netmix_show_title ) {
				do_action( 'netmix_action_before_post_title' );
				if ( empty( $netmix_template_args['no_links'] ) ) {
					the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
				} else {
					the_title( '<h4 class="post_title entry-title">', '</h4>' );
				}
			}
			
			// Post meta
			if ( $netmix_show_meta ) {
				do_action( 'netmix_action_before_post_meta' );
				netmix_show_post_meta(
					apply_filters(
						'netmix_filter_post_meta_args', array(
							'components' => $netmix_components,
							'seo'        => false,
						), 'excerpt', 1
					)
				);
			}
			?>
		</div><!-- .post_header -->
		<?php
	}

	// Post content
	if ( empty( $netmix_template_args['hide_excerpt'] )  && netmix_get_theme_option( 'excerpt_length' ) > 0 ) {
		?>
		<div class="post_content entry-content">
			<?php
			if ( netmix_get_theme_option( 'blog_content' ) == 'fullpost' ) {
				// Post content area
				?>
				<div class="post_content_inner">
					<?php
					do_action( 'netmix_action_before_full_post_content' );
					the_content( '' );
					do_action( 'netmix_action_after_full_post_content' );
					?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'netmix' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'netmix' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			} else {
				// Post content area
				netmix_show_post_content( $netmix_template_args, '<div class="post_content_inner">', '</div>' );
				// More button
				if ( empty( $netmix_template_args['no_links'] ) && ! in_array( $netmix_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
					netmix_show_post_more_link( $netmix_template_args, '<p>', '</p>' );
				}
			}
			?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
</article>
<?php

if ( is_array( $netmix_template_args ) ) {
	if ( ! empty( $netmix_template_args['slider'] ) || $netmix_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
