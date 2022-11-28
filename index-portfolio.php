<?php
/**
 * The template for homepage posts with "Portfolio" style
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

	// Show filters
	$netmix_cat          = netmix_get_theme_option( 'parent_cat' );
	$netmix_post_type    = netmix_get_theme_option( 'post_type' );
	$netmix_taxonomy     = netmix_get_post_type_taxonomy( $netmix_post_type );
	$netmix_show_filters = netmix_get_theme_option( 'show_filters' );
	$netmix_tabs         = array();
	if ( ! netmix_is_off( $netmix_show_filters ) ) {
		$netmix_args           = array(
			'type'         => $netmix_post_type,
			'child_of'     => $netmix_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $netmix_taxonomy,
			'pad_counts'   => false,
		);
		$netmix_portfolio_list = get_terms( $netmix_args );
		if ( is_array( $netmix_portfolio_list ) && count( $netmix_portfolio_list ) > 0 ) {
			$netmix_tabs[ $netmix_cat ] = esc_html__( 'All', 'netmix' );
			foreach ( $netmix_portfolio_list as $netmix_term ) {
				if ( isset( $netmix_term->term_id ) ) {
					$netmix_tabs[ $netmix_term->term_id ] = $netmix_term->name;
				}
			}
		}
	}
	if ( count( $netmix_tabs ) > 0 ) {
		$netmix_portfolio_filters_ajax   = true;
		$netmix_portfolio_filters_active = $netmix_cat;
		$netmix_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters netmix_tabs netmix_tabs_ajax">
			<ul class="portfolio_titles netmix_tabs_titles">
				<?php
				foreach ( $netmix_tabs as $netmix_id => $netmix_title ) {
					?>
					<li><a href="<?php echo esc_url( netmix_get_hash_link( sprintf( '#%s_%s_content', $netmix_portfolio_filters_id, $netmix_id ) ) ); ?>" data-tab="<?php echo esc_attr( $netmix_id ); ?>"><?php echo esc_html( $netmix_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$netmix_ppp = netmix_get_theme_option( 'posts_per_page' );
			if ( netmix_is_inherit( $netmix_ppp ) ) {
				$netmix_ppp = '';
			}
			foreach ( $netmix_tabs as $netmix_id => $netmix_title ) {
				$netmix_portfolio_need_content = $netmix_id == $netmix_portfolio_filters_active || ! $netmix_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $netmix_portfolio_filters_id, $netmix_id ) ); ?>"
					class="portfolio_content netmix_tabs_content"
					data-blog-template="<?php echo esc_attr( netmix_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( netmix_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $netmix_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $netmix_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $netmix_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $netmix_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $netmix_cat ); ?>"
					data-need-content="<?php echo ( false === $netmix_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $netmix_portfolio_need_content ) {
						netmix_show_portfolio_posts(
							array(
								'cat'        => $netmix_id,
								'parent_cat' => $netmix_cat,
								'taxonomy'   => $netmix_taxonomy,
								'post_type'  => $netmix_post_type,
								'page'       => 1,
								'sticky'     => $netmix_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		netmix_show_portfolio_posts(
			array(
				'cat'        => $netmix_cat,
				'parent_cat' => $netmix_cat,
				'taxonomy'   => $netmix_taxonomy,
				'post_type'  => $netmix_post_type,
				'page'       => 1,
				'sticky'     => $netmix_sticky_out,
			)
		);
	}

	netmix_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
