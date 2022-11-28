<?php
/**
 * The template 'Style 5' to displaying related posts
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.54
 */

$netmix_link        = get_permalink();
$netmix_post_format = get_post_format();
$netmix_post_format = empty( $netmix_post_format ) ? 'standard' : str_replace( 'post-format-', '', $netmix_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $netmix_post_format ) ); ?>>
	<?php
	netmix_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'netmix_filter_related_thumb_size', netmix_get_thumb_size( (int) netmix_get_theme_option( 'related_posts' ) == 1 ? 'big' : 'med' ) ),
			'show_no_image' => netmix_get_no_image() != '',
		)
	);
	?>
	<div class="post_header entry-header">
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $netmix_link ); ?>"><?php the_title(); ?></a></h6>
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<div class="post_meta">
				<a href="<?php echo esc_url( $netmix_link ); ?>" class="post_meta_item post_date"><?php echo wp_kses_data( netmix_get_date() ); ?></a>
			</div>
			<?php
		}
		?>
	</div>
</div>
