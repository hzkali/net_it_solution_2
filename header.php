<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
									<?php
										// Class scheme_xxx need in the <html> as context for the <body>!
										echo ' scheme_' . esc_attr( netmix_get_theme_option( 'color_scheme' ) );
									?>
										">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action( 'netmix_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$netmix_header_type = netmix_get_theme_option( 'header_type' );
			if ( 'custom' == $netmix_header_type && ! netmix_is_layouts_available() ) {
				$netmix_header_type = 'default';
			}
			get_template_part( apply_filters( 'netmix_filter_get_template_part', "templates/header-{$netmix_header_type}" ) );

			// Side menu
			if ( in_array( netmix_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'netmix_filter_get_template_part', 'templates/header-navi-mobile' ) );
			
			// Single posts banner after header
			netmix_show_post_banner( 'header' );
			?>

			<div class="page_content_wrap">
				<?php
				// Single posts banner on the background
				if ( is_singular( 'post' ) || is_singular( 'attachment' ) ) {

					netmix_show_post_banner( 'background' );

					$netmix_post_thumbnail_type  = netmix_get_theme_option( 'post_thumbnail_type' );
					$netmix_post_header_position = netmix_get_theme_option( 'post_header_position' );
					$netmix_post_header_align    = netmix_get_theme_option( 'post_header_align' );

					// Boxed post thumbnail
					if ( in_array( $netmix_post_thumbnail_type, array( 'boxed', 'fullwidth') ) ) {
						ob_start();
						?>
						<div class="header_content_wrap header_align_<?php echo esc_attr( $netmix_post_header_align ); ?>">
							<?php
							if ( 'boxed' === $netmix_post_thumbnail_type ) {
								?>
								<div class="content_wrap">
								<?php
							}

							// Post title and meta
							if ( 'above' === $netmix_post_header_position ) {
								netmix_show_post_title_and_meta();
							}

							// Featured image
							netmix_show_post_featured_image();

							// Post title and meta
							if ( in_array( $netmix_post_header_position, array( 'under', 'on_thumb' ) ) ) {
								netmix_show_post_title_and_meta();
							}

							if ( 'boxed' === $netmix_post_thumbnail_type ) {
								?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
						$netmix_post_header = ob_get_contents();
						ob_end_clean();
						if ( strpos( $netmix_post_header, 'post_featured' ) !== false
							|| strpos( $netmix_post_header, 'post_title' ) !== false
							|| strpos( $netmix_post_header, 'post_meta' ) !== false
						) {
							netmix_show_layout( $netmix_post_header );
						}
					}
				}

				// Widgets area above page content
				$netmix_body_style   = netmix_get_theme_option( 'body_style' );
				$netmix_widgets_name = netmix_get_theme_option( 'widgets_above_page' );
				$netmix_show_widgets = ! netmix_is_off( $netmix_widgets_name ) && is_active_sidebar( $netmix_widgets_name );
				if ( $netmix_show_widgets ) {
					if ( 'fullscreen' != $netmix_body_style ) {
						?>
						<div class="content_wrap">
							<?php
					}
					netmix_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $netmix_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}
				}

				// Content area
				?>
				<div class="content_wrap<?php echo 'fullscreen' == $netmix_body_style ? '_fullscreen' : ''; ?>">

					<div class="content">
						<?php
						// Widgets area inside page content
						netmix_create_widgets_area( 'widgets_above_content' );
