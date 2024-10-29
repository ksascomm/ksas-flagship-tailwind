/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 * 
 * @link https://medium.com/@bogdanfromkyiv/enhancing-web-accessibility-locking-the-tab-button-within-modals-and-menus-cb1ad3b7eff1
 * @link https://codepen.io/bogdanfromkyiv/pen/gOQjmPg
 */
// Get the menu button element
const menuBtn = document.querySelector(".menu-btn");

// Get the close menu button element
const closeMenuBtn = document.querySelector(".close-btn");

// Get the fullscreen menu element
const fullscreenMenu = document.getElementById("fullscreenMenu");

// Function to toggle the menu
function toggleMenu() {
  fullscreenMenu.classList.toggle("active");
  menuBtn.classList.toggle("active");
}

// Add event listener to the menu button for the 'click' event
menuBtn.addEventListener("click", toggleMenu);
closeMenuBtn.addEventListener("click", toggleMenu);

// Add event listener to the 'keydown' event on the document
document.addEventListener("keydown", function (e) {
  const target = e.target;
  const shiftPressed = e.shiftKey;

  // If TAB key pressed
  if (e.keyCode === 9) {
    // If inside a fullscreen menu (determined by attribute role="dialog")
    if (target.closest('[role="dialog"]')) {
      // Find the first or the last input element in the dialog parent (depending on whether Shift was pressed).
      // Get the focusable elements (links and buttons)
      let focusElements = target
        .closest('[role="dialog"]')
        .querySelectorAll("a[href], button");
      let borderElem = shiftPressed
        ? focusElements[0]
        : focusElements[focusElements.length - 1];

      if (borderElem) {
        // If the current target element is the first or last focusable element in the dialog, prevent the default behaviour.
        if (target === borderElem) {
          e.preventDefault();

          // move focus to the first element when the last one is reached and vice versa
          borderElem === focusElements[0]
            ? focusElements[focusElements.length - 1].focus()
            : focusElements[0].focus();
        }
      }
    }
  }
});
