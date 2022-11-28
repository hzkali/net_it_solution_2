<?php
/**
 * Information about this theme
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0.30
 */


// Redirect to the 'About Theme' page after switch theme
if ( ! function_exists( 'netmix_about_after_switch_theme' ) ) {
	add_action( 'after_switch_theme', 'netmix_about_after_switch_theme', 1000 );
	function netmix_about_after_switch_theme() {
		update_option( 'netmix_about_page', 1 );
	}
}
if ( ! function_exists( 'netmix_about_after_setup_theme' ) ) {
	add_action( 'init', 'netmix_about_after_setup_theme', 1000 );
	function netmix_about_after_setup_theme() {
		if ( ! defined( 'WP_CLI' ) && get_option( 'netmix_about_page' ) == 1 ) {
			update_option( 'netmix_about_page', 0 );
			wp_safe_redirect( admin_url() . 'themes.php?page=netmix_about' );
			exit();
		} else {
			if ( netmix_get_value_gp( 'page' ) == 'netmix_about' && netmix_exists_trx_addons() ) {
				wp_safe_redirect( admin_url() . 'admin.php?page=trx_addons_theme_panel' );
				exit();
			}
		}
	}
}


// Add 'About Theme' item in the Appearance menu
if ( ! function_exists( 'netmix_about_add_menu_items' ) ) {
	add_action( 'admin_menu', 'netmix_about_add_menu_items' );
	function netmix_about_add_menu_items() {
		if ( ! netmix_exists_trx_addons() ) {
			$theme      = wp_get_theme();
			$theme_name = $theme->name . ( NETMIX_THEME_FREE ? ' ' . esc_html__( 'Free', 'netmix' ) : '' );
			add_theme_page(
				// Translators: Add theme name to the page title
				sprintf( esc_html__( 'About %s', 'netmix' ), $theme_name ),    //page_title
				// Translators: Add theme name to the menu title
				sprintf( esc_html__( 'About %s', 'netmix' ), $theme_name ),    //menu_title
				'manage_options',                                               //capability
				'netmix_about',                                                //menu_slug
				'netmix_about_page_builder'                                    //callback
			);
		}
	}
}


// Load page-specific scripts and styles
if ( ! function_exists( 'netmix_about_enqueue_scripts' ) ) {
	add_action( 'admin_enqueue_scripts', 'netmix_about_enqueue_scripts' );
	function netmix_about_enqueue_scripts() {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		if ( ! empty( $screen->id ) && false !== strpos( $screen->id, '_page_netmix_about' ) ) {
			// Scripts
			if ( ! netmix_exists_trx_addons() && function_exists( 'netmix_plugins_installer_enqueue_scripts' ) ) {
				netmix_plugins_installer_enqueue_scripts();
			}
			// Styles
			$fdir = netmix_get_file_url( 'theme-specific/theme-about/theme-about.css' );
			if ( '' != $fdir ) {
				wp_enqueue_style( 'netmix-about', $fdir, array(), null );
			}
		}
	}
}


// Build 'About Theme' page
if ( ! function_exists( 'netmix_about_page_builder' ) ) {
	function netmix_about_page_builder() {
		$theme = wp_get_theme();
		?>
		<div class="netmix_about">

			<?php do_action( 'netmix_action_theme_about_start', $theme ); ?>

			<?php do_action( 'netmix_action_theme_about_before_logo', $theme ); ?>

			<div class="netmix_about_logo">
				<?php
				$logo = netmix_get_file_url( 'theme-specific/theme-about/icon.jpg' );
				if ( empty( $logo ) ) {
					$logo = netmix_get_file_url( 'screenshot.jpg' );
				}
				if ( ! empty( $logo ) ) {
					?>
					<img src="<?php echo esc_url( $logo ); ?>">
					<?php
				}
				?>
			</div>

			<?php do_action( 'netmix_action_theme_about_before_title', $theme ); ?>

			<h1 class="netmix_about_title">
			<?php
				echo esc_html(
					sprintf(
						// Translators: Add theme name and version to the 'Welcome' message
						__( 'Welcome to %1$s %2$s v.%3$s', 'netmix' ),
						$theme->name,
						NETMIX_THEME_FREE ? __( 'Free', 'netmix' ) : '',
						$theme->version
					)
				);
			?>
			</h1>

			<?php do_action( 'netmix_action_theme_about_before_description', $theme ); ?>

			<div class="netmix_about_description">
				<p>
					<?php
					echo wp_kses_data( __( 'In order to continue, please install and activate <b>ThemeREX Addons plugin</b>.', 'netmix' ) );
					?>
					<sup>*</sup>
				</p>
			</div>

			<?php do_action( 'netmix_action_theme_about_before_buttons', $theme ); ?>

			<div class="netmix_about_buttons">
				<?php netmix_plugins_installer_get_button_html( 'trx_addons' ); ?>
			</div>

			<?php do_action( 'netmix_action_theme_about_before_buttons', $theme ); ?>

			<div class="netmix_about_notes">
				<p>
					<sup>*</sup>
					<?php
					echo wp_kses_data( __( "<i>ThemeREX Addons plugin</i> will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options.", 'netmix' ) );
					?>
				</p>
			</div>

			<?php do_action( 'netmix_action_theme_about_end', $theme ); ?>

		</div>
		<?php
	}
}


// Hide TGMPA notice on the page 'About Theme'
if ( ! function_exists( 'netmix_about_page_disable_tgmpa_notice' ) ) {
	add_filter( 'tgmpa_show_admin_notice_capability', 'netmix_about_page_disable_tgmpa_notice' );
	function netmix_about_page_disable_tgmpa_notice($cap) {
		if ( netmix_get_value_gp( 'page' ) == 'netmix_about' ) {
			$cap = 'unfiltered_upload';
		}
		return $cap;
	}
}

require_once NETMIX_THEME_DIR . 'includes/plugins-installer/plugins-installer.php';
