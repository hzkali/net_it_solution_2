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
<div class="netmix_admin_notice netmix_rate_notice update-nag">
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
	<h3 class="netmix_notice_title"><a href="<?php echo esc_url( netmix_storage_get( 'theme_rate_url' ) ); ?>" target="_blank">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Rate our theme "%s", please', 'netmix' ),
				$netmix_theme_obj->name . ( NETMIX_THEME_FREE ? ' ' . esc_html__( 'Free', 'netmix' ) : '' )
			)
		);
		?>
	</a></h3>
	<?php

	// Description
	?>
	<div class="netmix_notice_text">
		<p><?php echo wp_kses_data( __( "We are glad you chose our WP theme for your website. You've done well customizing your website and we hope that you've enjoyed working with our theme.", 'netmix' ) ); ?></p>
		<p><?php echo wp_kses_data( __( "It would be just awesome if you spend just a minute of your time to rate our theme or the customer service you've received from us.", 'netmix' ) ); ?></p>
		<p class="netmix_notice_text_info"><?php echo wp_kses_data( __( '* We love receiving your reviews! Every time you leave a review, our CEO Henry Rise gives $5 to homeless dog shelter! Save the planet with us!', 'netmix' ) ); ?></p>
	</div>
	<?php

	// Buttons
	?>
	<div class="netmix_notice_buttons">
		<?php
		// Link to the theme download page
		?>
		<a href="<?php echo esc_url( netmix_storage_get( 'theme_rate_url' ) ); ?>" class="button button-primary" target="_blank"><i class="dashicons dashicons-star-filled"></i> 
			<?php
			// Translators: Add theme name
			echo esc_html( sprintf( __( 'Rate theme %s', 'netmix' ), $netmix_theme_obj->name ) );
			?>
		</a>
		<?php
		// Link to the theme support
		?>
		<a href="<?php echo esc_url( netmix_storage_get( 'theme_support_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-sos"></i> 
			<?php
			esc_html_e( 'Support', 'netmix' );
			?>
		</a>
		<?php
		// Link to the theme documentation
		?>
		<a href="<?php echo esc_url( netmix_storage_get( 'theme_doc_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-book"></i> 
			<?php
			esc_html_e( 'Documentation', 'netmix' );
			?>
		</a>
		<?php
		// Dismiss
		?>
		<a href="#" class="netmix_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="netmix_hide_notice_text"><?php esc_html_e( 'Dismiss', 'netmix' ); ?></span></a>
	</div>
</div>
