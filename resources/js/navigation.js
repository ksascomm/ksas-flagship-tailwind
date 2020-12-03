/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			siteNavigation.classList.remove( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll(
		'.menu-item-has-children > a, .page_item_has_children > a'
	);

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
}() );

//Overlay Navigation
const openBtn = document.querySelector( '.openSideNav' );
openBtn.addEventListener( 'click', () => {
	openNav();
} );
const closeBtn = document.querySelector( '.closeBtn' );
closeBtn.addEventListener( 'click', () => {
	closeNav();
} );

function openNav() {
	document.querySelector( '.site-navigation' ).style.height = '100%';
	document.querySelector( '.site-navigation' ).style.display = 'block';
	document.querySelector( '.site-navigation' ).setAttribute( 'aria-hidden', 'false' );
	document.documentElement.style.overflow = 'hidden';
	document.body.scroll = 'no';
}
function closeNav() {
	document.querySelector( '.site-navigation' ).style.height = '0';
	document.querySelector( '.site-navigation' ).style.display = 'none';
	document.querySelector( '.site-navigation' ).setAttribute( 'aria-hidden', 'true' );
	document.documentElement.style.overflow = 'scroll';
	document.body.scroll = 'yes';

}
jQuery( document ).ready( function( $ ) {
	$( '.openSideNav' ).on( 'click', function( e ) {
		e.preventDefault();
		$( '.overlay' ).addClass( 'active' );
	} );
	$( '.closeBtn' ).on( 'click', function( e ) {
		e.preventDefault();
		$( '.overlay' ).removeClass( 'active' );
	} );
} );
//Tabs
const tabs = document.querySelectorAll( '.tabs' );
const tab = document.querySelectorAll( '.tab' );
const panel = document.querySelectorAll( '.tab-content' );

function onTabClick( event ) {
	// deactivate existing active tabs and panel

	for ( let i = 0; i < tab.length; i++ ) {
		tab[ i ].classList.remove( 'active' );
	}

	for ( let i = 0; i < panel.length; i++ ) {
		panel[ i ].classList.remove( 'active' );
	}

	// activate new tabs and panel
	event.target.classList.add( 'active' );
	const classString = event.target.getAttribute( 'data-target' );
	console.log( classString );
	document
		.getElementById( 'panels' )
		.getElementsByClassName( classString )[ 0 ]
		.classList.add( 'active' );
}

for ( let i = 0; i < tab.length; i++ ) {
	tab[ i ].addEventListener( 'click', onTabClick, false );
}
