<?php
/**
 * The template file to display taxonomies archive
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.57
 */

// Redirect to the template page (if exists) for output current taxonomy
if ( is_category() || is_tag() || is_tax() ) {
	$netmix_term = get_queried_object();
	global $wp_query;
	if ( ! empty( $netmix_term->taxonomy ) && ! empty( $wp_query->posts[0]->post_type ) ) {
		$netmix_taxonomy  = netmix_get_post_type_taxonomy( $wp_query->posts[0]->post_type );
		if ( $netmix_taxonomy == $netmix_term->taxonomy ) {
			$netmix_template_page_id = netmix_get_template_page_id( array(
				'post_type'  => $wp_query->posts[0]->post_type,
				'parent_cat' => $netmix_term->term_id
			) );
			if ( 0 < $netmix_template_page_id ) {
				wp_safe_redirect( get_permalink( $netmix_template_page_id ) );
				exit;
			}
		}
	}
}
// If template page is not exists - display default blog archive template
get_template_part( apply_filters( 'netmix_filter_get_template_part', netmix_blog_archive_get_template() ) );
