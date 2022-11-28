<?php
//Allowed components
$components = array(
		'components_present' => 1,
		'components_api_elementor' => 1,
		'components_api_gutenberg' => 1,
		'components_api_js_composer' => 0,
		'components_api_vc-extensions-bundle' => 0,
		'components_api_bbpress' => 0,
		'components_api_booked' => 0,
		'components_api_calculated-fields-form' => 0,
		'components_api_contact-form-7' => 1,
		'components_api_content_timeline' => 0,
		'components_api_easy-digital-downloads' => 0,
		'components_api_essential-grid' => 1,
		'components_api_give' => 0,
		'components_api_instagram-feed' => 0,
		'components_api_mailchimp-for-wp' => 0,
		'components_api_mp-timetable' => 0,
		'components_api_revslider' => 1,
		'components_api_the-events-calendar' => 0,
		'components_api_the-events-calendar_layouts_sc' => array(
				'default' => 0,
				'detailed' => 0,
				'classic' => 0
				),
		'components_api_tourmaster' => 0,
		'components_api_trx_donations' => 0,
		'components_api_twitter' => 0,
		'components_api_ubermenu' => 0,
		'components_api_woocommerce' => 1,
		'components_api_sitepress-multilingual-cms' => 0,
		'components_api_wp-gdpr-compliance' => 1,
		'components_cpt_cars' => 0,
		'components_cpt_cars_layouts_arh' => array(
				'default_1' => 0,
				'default_2' => 0,
				'default_3' => 0
				),
		'components_cpt_cars_layouts_sc' => array(
				'default' => 0,
				'slider' => 0
				),
		'components_cpt_certificates' => 0,
		'components_cpt_courses' => 0,
		'components_cpt_courses_layouts_arh' => array(
				'default_2' => 0,
				'default_3' => 0
				),
		'components_cpt_dishes' => 0,
		'components_cpt_dishes_layouts_arh' => array(
				'default_2' => 0,
				'default_3' => 0
				),
		'components_cpt_dishes_layouts_sc' => array(
				'default' => 0,
				'float' => 0,
				'compact' => 0
				),
		'components_cpt_layouts' => 1,
		'components_cpt_layouts_layouts_sc' => array(
				'blog_item' => 0,
				'cart' => 1,
				'container' => 1,
				'currency' => 0,
				'featured' => 0,
				'iconed_text' => 1,
				'layouts' => 1,
				'language' => 0,
				'login' => 1,
				'logo' => 1,
				'menu' => 1,
				'meta' => 0,
				'search' => 1,
				'title' => 1,
				'widgets' => 0
				),
		'components_cpt_portfolio' => 0,
		'components_cpt_portfolio_layouts_arh' => array(
				'default_2' => 0,
				'default_3' => 0
				),
		'components_cpt_portfolio_layouts_sc' => array(
				'default' => 0,
				'simple' => 0
				),
		'components_cpt_post' => 1,
		'components_cpt_properties' => 0,
		'components_cpt_properties_layouts_arh' => array(
				'default_1' => 0,
				'default_2' => 0,
				'default_3' => 0
				),
		'components_cpt_properties_layouts_sc' => array(
				'default' => 0,
				'slider' => 0,
				'map' => 0
				),
		'components_cpt_resume' => 0,
		'components_cpt_services' => 1,
		'components_cpt_services_layouts_arh' => array(
				'default_2' => 1,
				'default_3' => 1,
				'light_2' => 1,
				'light_3' => 1,
				'callouts_2' => 0,
				'callouts_3' => 0,
				'chess_1' => 0,
				'chess_2' => 0,
				'chess_3' => 0,
				'hover_2' => 0,
				'hover_3' => 0,
				'iconed_2' => 0,
				'iconed_3' => 0
				),
		'components_cpt_services_layouts_sc' => array(
				'default' => 1,
				'light' => 1,
				'iconed' => 0,
				'callouts' => 0,
				'list' => 0,
				'hover' => 0,
				'chess' => 0,
				'timeline' => 0,
				'tabs' => 0,
				'tabs_simple' => 0
				),
		'components_cpt_sport' => 0,
		'components_cpt_sport_layouts_arh' => array(
				'default_2' => 0,
				'default_3' => 0
				),
		'components_cpt_team' => 1,
		'components_cpt_team_layouts_arh' => array(
				'default_2' => 1,
				'default_3' => 1
				),
		'components_cpt_team_layouts_sc' => array(
				'default' => 1,
				'short' => 1,
				'featured' => 1
				),
		'components_cpt_testimonials' => 1,
		'components_cpt_testimonials_layouts_sc' => array(
				'default' => 1,
				'simple' => 0
				),
		'components_sc_action' => 1,
		'components_sc_action_layouts_sc' => array(
				'default' => 1,
				'simple' => 0,
				'event' => 0
				),
		'components_sc_anchor' => 0,
		'components_sc_accordionposts' => 0,
		'components_sc_blogger' => 1,
		'components_sc_blogger_layouts_sc' => array(
				'default' => 1,
				'wide' => 0,
				'list' => 0,
				'news' => 0
				),
		'components_sc_button' => 1,
		'components_sc_button_layouts_sc' => array(
				'default' => 1,
				'bordered' => 1,
				'simple' => 1
				),
		'components_sc_content' => 1,
		'components_sc_countdown' => 1,
		'components_sc_countdown_layouts_sc' => array(
				'default' => 1,
				'circle' => 1
				),
		'components_sc_form' => 1,
		'components_sc_form_layouts_sc' => array(
				'default' => 1,
				'modern' => 0,
				'detailed' => 0
				),
		'components_sc_googlemap' => 1,
		'components_sc_googlemap_layouts_sc' => array(
				'default' => 1,
				'detailed' => 1
				),
		'components_sc_icons' => 1,
		'components_sc_icons_layouts_sc' => array(
				'default' => 1,
				'modern' => 1
				),
		'components_sc_price' => 1,
		'components_sc_promo' => 0,
		'components_sc_promo_layouts_sc' => array(
				'default' => 0,
				'modern' => 0,
				'blockquote' => 0
				),
		'components_sc_skills' => 0,
		'components_sc_skills_layouts_sc' => array(
				'pie' => 0,
				'counter' => 0
				),
		'components_sc_supertitle' => 0,
		'components_sc_socials' => 1,
		'components_sc_socials_layouts_sc' => array(
				'default' => 1,
				'names' => 1,
				'icons_names' => 1
				),
		'components_sc_table' => 1,
		'components_sc_title' => 1,
		'components_sc_title_layouts_sc' => array(
				'default' => 1,
				'shadow' => 1,
				'accent' => 1,
				'gradient' => 1
				),
		'components_sc_yandexmap' => 0,
		'components_sc_yandexmap_layouts_sc' => array(
				'default' => 0,
				'detailed' => 0
				),
		'components_widgets_aboutme' => 1,
		'components_widgets_audio' => 1,
		'components_widgets_banner' => 0,
		'components_widgets_calendar' => 1,
		'components_widgets_categories_list' => 0,
		'components_widgets_categories_list_layouts_sc' => array(
				'1' => 0,
				'2' => 0,
				'3' => 0
				),
		'components_widgets_contacts' => 1,
		'components_widgets_custom_links' => 1,
		'components_widgets_flickr' => 0,
		'components_widgets_instagram' => 0,
		'components_widgets_popular_posts' => 0,
		'components_widgets_recent_news' => 0,
		'components_widgets_recent_news_layouts_sc' => array(
				'news-announce' => 0,
				'news-excerpt' => 0,
				'news-magazine' => 0,
				'news-portfolio' => 0
				),
		'components_widgets_recent_posts' => 1,
		'components_widgets_slider' => 1,
		'components_widgets_slider_layouts_sc' => array(
				'default' => 1,
				'modern' => 1
				),
		'components_widgets_socials' => 1,
		'components_widgets_twitter' => 0,
		'components_widgets_twitter_layouts_sc' => array(
				'list' => 0,
				'default' => 0
				),
		'components_widgets_video' => 1,
		'components_widgets_rating_posts' => 0,
		'components_components_dashboard_widget' => 0,
		'components_components_editor' => 1,
		'components_components_extended-taxonomy' => 0,
		'components_components_reviews' => 0,
		'components_components_web_push' => 0,
		'components_api_trx_addons' => 1,
		'components_api_envato-market' => 0,
		'components_api_trx_updater' => 1,
		'components_api_elegro-payment' => 1
		);
?>