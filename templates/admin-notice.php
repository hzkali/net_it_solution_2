<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.1
 */

$netmix_theme_obj = wp_get_theme();
?>
<div class="netmix_admin_notice netmix_welcome_notice update-nag">
	<?php
	// Theme image
	$netmix_theme_img = netmix_get_file_url( 'screenshot.jpg' );
	if ( '' != $netmix_theme_img ) {
		?>
		<div class="netmix_notice_image"><img src="<?php echo esc_url( $netmix_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'netmix' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="netmix_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'netmix' ),
				$netmix_theme_obj->name . ( NETMIX_THEME_FREE ? ' ' . esc_html__( 'Free', 'netmix' ) : '' ),
				$netmix_theme_obj->version
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="netmix_notice_text">
		<p class="netmix_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $netmix_theme_obj->description ) );
			?>
		</p>
		<p class="netmix_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'netmix' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="netmix_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=netmix_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'netmix' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="netmix_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="netmix_hide_notice_text"><?php esc_html_e( 'Dismiss', 'netmix' ); ?></span></a>
	</div>
</div>
