/* global jQuery:false */
/* global NETMIX_STORAGE:false */

jQuery( window ).load(function() {
	"use strict";
	netmix_gutenberg_first_init();
	// Create the observer to reinit visual editor after switch from code editor to visual editor
	var netmix_observers = {};
	if (typeof window.MutationObserver !== 'undefined') {
		netmix_create_observer('check_visual_editor', jQuery('.block-editor').eq(0), function(mutationsList) {
			var gutenberg_editor = jQuery('.edit-post-visual-editor:not(.netmix_inited)').eq(0);
			if (gutenberg_editor.length > 0) netmix_gutenberg_first_init();
		});
	}

	function netmix_gutenberg_first_init() {
		var gutenberg_editor = jQuery( '.edit-post-visual-editor:not(.netmix_inited)' ).eq( 0 );
		if ( 0 == gutenberg_editor.length ) {
			return;
		}
		jQuery( '.editor-block-list__layout' ).addClass( 'scheme_' + NETMIX_STORAGE['color_scheme'] );
		gutenberg_editor.addClass( 'sidebar_position_' + NETMIX_STORAGE['sidebar_position'] );
		if ( NETMIX_STORAGE['expand_content'] > 0 ) {
			gutenberg_editor.addClass( 'expand_content' );
		}
		if ( NETMIX_STORAGE['sidebar_position'] == 'left' ) {
			gutenberg_editor.prepend( '<div class="editor-post-sidebar-holder"></div>' );
		} else if ( NETMIX_STORAGE['sidebar_position'] == 'right' ) {
			gutenberg_editor.append( '<div class="editor-post-sidebar-holder"></div>' );
		}

		gutenberg_editor.addClass('netmix_inited');
	}

	// Create mutations observer
	function netmix_create_observer(id, obj, callback) {
		if (typeof window.MutationObserver !== 'undefined' && obj.length > 0) {
			if (typeof netmix_observers[id] == 'undefined') {
				netmix_observers[id] = new MutationObserver(callback);
				netmix_observers[id].observe(obj.get(0), { attributes: false, childList: true, subtree: true });
			}
			return true;
		}
		return false;
	}
} );
