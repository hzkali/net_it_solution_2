<?php
// Add plugin-specific vars to the custom CSS
if ( ! function_exists( 'netmix_elm_add_theme_vars' ) ) {
	add_filter( 'netmix_filter_add_theme_vars', 'netmix_elm_add_theme_vars', 10, 2 );
	function netmix_elm_add_theme_vars( $rez, $vars ) {
		foreach ( array( 10, 20, 30, 40, 60 ) as $m ) {
			if ( substr( $vars['page'], 0, 2 ) != '{{' ) {
				$rez[ "page{$m}" ]    = ( $vars['page'] + $m ) . 'px';
				$rez[ "content{$m}" ] = ( $vars['page'] - $vars['gap'] - $vars['sidebar'] + $m ) . 'px';
			} else {
				$rez[ "page{$m}" ]    = "{{ data.page{$m} }}";
				$rez[ "content{$m}" ] = "{{ data.content{$m} }}";
			}
		}
		return $rez;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'netmix_elm_get_css' ) ) {
	add_filter( 'netmix_filter_get_css', 'netmix_elm_get_css', 10, 2 );
	function netmix_elm_get_css( $css, $args ) {

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			extract( $args['vars'] );
			$css['vars'] .= <<<CSS
/* Narrow: 5px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow {
	width: $page10; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow {
	width: $content10; 
}

/* Default: 10px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default {
	width: $page20;
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default {
	width: $content20;
}

/* Extended: 15px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended {
	width: $page30; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended {
	width: $content30; 
}

/* Wide: 20px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide {
	width: $page40; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide {
	width: $content40; 
}

/* Wider: 30px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider {
	width: $page60; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider {
	width: $content60; 
}


CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Shape above and below rows */
.elementor-shape .elementor-shape-fill {
	fill: {$colors['bg_color']};
}

/* Divider */
.elementor-divider-separator {
	border-color: {$colors['bd_color']};
}

/**** Elementor Shortcodes ****/

/* Title */
.elementor-heading-title span,
.elementor-heading-title span b{
	color: {$colors['alter_dark']};
}
.scheme_dark .elementor-heading-title span,
.scheme_dark .elementor-heading-title span b{
	color: {$colors['alter_hover2']};
}
/* Progress Bar */
.elementor-progress-bar{
	background: linear-gradient(to right,	{$colors['text_link']} 0%, {$colors['text_hover']} 100%);
	color: {$colors['inverse_hover']};
}
.elementor-progress-wrapper{
	background-color:{$colors['inverse_bd_hover']};
}

/* Accordion */
.elementor-accordion .elementor-tab-title .elementor-accordion-icon i.fa-angle-up,
.elementor-accordion .elementor-tab-title .elementor-accordion-icon i.fa-angle-down{
	background-color:{$colors['text_link']};
}
.elementor-accordion .elementor-tab-title:hover .elementor-accordion-icon i.fa-angle-up,
.elementor-accordion .elementor-tab-title:hover .elementor-accordion-icon i.fa-angle-down{
	background-color:{$colors['text_hover']};
}
/* Tabs */
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title,
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-title.elementor-tab-mobile-title{
	background-color:{$colors['alter_bg_color']};
	color:{$colors['alter_dark']};
}
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title a,
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-title.elementor-tab-mobile-title a{
	color:{$colors['alter_dark']};
}

.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active,
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-title.elementor-tab-mobile-title.elementor-active,
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title:hover,
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-title.elementor-tab-mobile-title:hover{
	background-color:{$colors['alter_hover2']};
	color:{$colors['extra_light']};
}
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active a,
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-title.elementor-tab-mobile-title.elementor-active a,
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-title.elementor-tab-mobile-title:hover a,
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title:hover a{
	color:{$colors['extra_light']};
}


CSS;
		}

		return $css;
	}
}

