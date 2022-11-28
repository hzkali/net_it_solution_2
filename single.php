<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

get_header();

while ( have_posts() ) {
	the_post();

	// Prepare theme-specific vars:

	// Full post loading
	$full_post_loading        = netmix_get_value_gp( 'action' ) == 'full_post_loading';

	// Prev post loading
	$prev_post_loading        = netmix_get_value_gp( 'action' ) == 'prev_post_loading';

	// Position of the related posts
	$netmix_related_position = netmix_get_theme_option( 'related_position' );

	// Type of the prev/next posts navigation
	$netmix_posts_navigation = netmix_get_theme_option( 'posts_navigation' );
	$netmix_prev_post        = false;

	if ( 'scroll' == $netmix_posts_navigation ) {
		$netmix_prev_post = get_previous_post( true );         // Get post from same category
		if ( ! $netmix_prev_post ) {
			$netmix_prev_post = get_previous_post( false );    // Get post from any category
			if ( ! $netmix_prev_post ) {
				$netmix_posts_navigation = 'links';
			}
		}
	}

	// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
	if ( $full_post_loading || ( $prev_post_loading && $netmix_prev_post ) ) {
		netmix_storage_set_array( 'options_meta', 'post_thumbnail_type', 'default' );
		if ( netmix_get_theme_option( 'post_header_position' ) != 'below' ) {
			netmix_storage_set_array( 'options_meta', 'post_header_position', 'above' );
		}
		netmix_sc_layouts_showed( 'featured', false );
		netmix_sc_layouts_showed( 'title', false );
		netmix_sc_layouts_showed( 'postmeta', false );
	}

	// If related posts should be inside the content
	if ( strpos( $netmix_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'netmix_filter_get_template_part', 'content', get_post_format() ), get_post_format() );

	// If related posts should be inside the content
	if ( strpos( $netmix_related_position, 'inside' ) === 0 ) {
		$netmix_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'netmix_action_related_posts' );
		$netmix_related_content = ob_get_contents();
		ob_end_clean();

		$netmix_related_position_inside = max( 0, min( 9, netmix_get_theme_option( 'related_position_inside' ) ) );
		if ( 0 == $netmix_related_position_inside ) {
			$netmix_related_position_inside = mt_rand( 1, 9 );
		}
		
		$netmix_p_number = 0;
		$netmix_related_inserted = false;
		for ( $i = 0; $i < strlen( $netmix_content ) - 3; $i++ ) {
			if ( $netmix_content[ $i ] == '<' && $netmix_content[ $i + 1 ] == 'p' && in_array( $netmix_content[ $i + 2 ], array( '>', ' ' ) ) ) {
				$netmix_p_number++;
				if ( $netmix_related_position_inside == $netmix_p_number ) {
					$netmix_related_inserted = true;
					$netmix_content = ( $i > 0 ? substr( $netmix_content, 0, $i ) : '' )
										. $netmix_related_content
										. substr( $netmix_content, $i );
				}
			}
		}
		if ( ! $netmix_related_inserted ) {
			$netmix_content .= $netmix_related_content;
		}

		netmix_show_layout( $netmix_content );
	}

	// Author bio
	if ( netmix_get_theme_option( 'show_author_info' ) == 1
		&& ! is_attachment()
		&& get_the_author_meta( 'description' )
		&& ( 'scroll' != $netmix_posts_navigation || netmix_get_theme_option( 'posts_navigation_scroll_hide_author' ) == 0 )
		&& ( ! $full_post_loading || netmix_get_theme_option( 'open_full_post_hide_author' ) == 0 )
	) {
		do_action( 'netmix_action_before_post_author' );
		get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/author-bio' ) );
		do_action( 'netmix_action_after_post_author' );
	}

	// Previous/next post navigation.
	if ( 'links' == $netmix_posts_navigation && ! $full_post_loading ) {
		do_action( 'netmix_action_before_post_navigation' );
		?>
		<div class="nav-links-single<?php
			if ( ! netmix_is_off( netmix_get_theme_option( 'posts_navigation_fixed' ) ) ) {
				echo ' nav-links-fixed fixed';
			}
		?>">
			<?php
			the_post_navigation(
				array(
					'next_text' => '<span class="nav-arrow"></span>'
						. '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'netmix' ) . '</span> '
						. '<h6 class="post-title">%title</h6>'
						. '<span class="post_date">%date</span>',
					'prev_text' => '<span class="nav-arrow"></span>'
						. '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'netmix' ) . '</span> '
						. '<h6 class="post-title">%title</h6>'
						. '<span class="post_date">%date</span>',
				)
			);
			?>
		</div>
		<?php
		do_action( 'netmix_action_after_post_navigation' );
	}

	// Related posts
	if ( 'below_content' == $netmix_related_position
		&& ( 'scroll' != $netmix_posts_navigation || netmix_get_theme_option( 'posts_navigation_scroll_hide_related' ) == 0 )
		&& ( ! $full_post_loading || netmix_get_theme_option( 'open_full_post_hide_related' ) == 0 )
	) {
		do_action( 'netmix_action_related_posts' );
	}

	// If comments are open or we have at least one comment, load up the comment template.
	$netmix_comments_number = get_comments_number();
	if ( comments_open() || $netmix_comments_number > 0 ) {
		if ( netmix_get_value_gp( 'show_comments' ) == 1 || ( ! $full_post_loading && ( 'scroll' != $netmix_posts_navigation || netmix_get_theme_option( 'posts_navigation_scroll_hide_comments' ) == 0 || netmix_check_url( '#comment' ) ) ) ) {
			do_action( 'netmix_action_before_comments' );
			comments_template();
			do_action( 'netmix_action_after_comments' );
		} else {
			?>
			<div class="show_comments_single">
				<a href="<?php echo esc_url( add_query_arg( array( 'show_comments' => 1 ), get_comments_link() ) ); ?>" class="theme_button show_comments_button">
					<?php
					if ( $netmix_comments_number > 0 ) {
						echo esc_html( sprintf( _n( 'Show comment', 'Show comments ( %d )', $netmix_comments_number, 'netmix' ), $netmix_comments_number ) );
					} else {
						esc_html_e( 'Leave a comment', 'netmix' );
					}
					?>
				</a>
			</div>
			<?php
		}
	}

	if ( 'scroll' == $netmix_posts_navigation && ! $full_post_loading ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $netmix_prev_post ) ); ?>"
			data-post-link="<?php echo esc_attr( get_permalink( $netmix_prev_post ) ); ?>"
			data-post-title="<?php the_title_attribute( array( 'post' => $netmix_prev_post ) ); ?>">
		</div>
		<?php
	}
}

get_footer();
