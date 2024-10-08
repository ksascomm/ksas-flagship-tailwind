/**
 * File isotope.js
 *
 * Customized isotope script for Fields of Study Page
 */

jQuery(document).ready(function($) {
    // initially hide noresult box on page load
    $("#noResult").hide();

    // Initialize Isotope
    var $grid = $('#isotope-list').isotope({
        itemSelector: '.item',
        layoutMode: 'fitRows'
    });

    var qsRegex;
    var filterValue = '*'; // Default filter to show all

    // Function to handle filtering and hash update
    function applyFilter() {
        var searchValue = $('#search-input').val();
        qsRegex = searchValue ? new RegExp(searchValue, 'gi') : null;

        // Apply Isotope filtering
        $grid.isotope({
            filter: function() {
                var $this = $(this);
                var matchesSearch = qsRegex ? $this.text().match(qsRegex) : true;
                var matchesFilter = $this.is(filterValue);
                return matchesSearch && matchesFilter;
            }
        });

        // Update the URL hash
        updateHash(filterValue, searchValue);
    }

    // Filter buttons functionality
    $('#isotope-filters').on('click', 'button', function() {
        filterValue = $(this).attr('data-filter');
        applyFilter();
    });

    // Search submit button functionality
    $('#search-form').on('submit', function(event) {
        event.preventDefault(); // Prevent form submission reload
        applyFilter();
    });

    // Listen for "Enter" key on the quicksearch input
    $('#search-input').on('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent form submission on Enter
            applyFilter();
        }
    });

    // Get current filter and search from hash
    function getHashFilter() {
        var matches = location.hash.match(/filter=([^&]+)/i);
        return matches ? decodeURIComponent(matches[1]) : '*';
    }

    function getHashSearch() {
        var matches = location.hash.match(/search=([^&]+)/i);
        return matches ? decodeURIComponent(matches[1]) : '';
    }

    // Update URL hash
    function updateHash(filter, search) {
        var hash = 'filter=' + encodeURIComponent(filter);
        if (search) {
            hash += '&search=' + encodeURIComponent(search);
        }
        location.hash = hash;
    }

    // Apply filters and search from hash on page load or hash change
    function applyFiltersFromHash() {
        filterValue = getHashFilter();
        var searchValue = getHashSearch();
        $('#search-input').val(searchValue); // Set the search input to the value from hash
        qsRegex = searchValue ? new RegExp(searchValue, 'gi') : null;

        $grid.isotope({
            filter: function() {
                var $this = $(this);
                var matchesSearch = qsRegex ? $this.text().match(qsRegex) : true;
                var matchesFilter = $this.is(filterValue);
                return matchesSearch && matchesFilter;
            }
        });
    }

    // On hash change, reapply filters
    $(window).on('hashchange', applyFiltersFromHash);

    // On page load, apply filters from hash
    $(document).ready(function() {
        applyFiltersFromHash();
    });


    (function($) {
        var $doc = $(document),
            $win = $(window);

        $win.on("load", function() {
            // document is fully loaded

            $("#isotope-list").isotope();
            // set timeout to fake 1 sec loading
            setTimeout(function() {
                $("#isotope-list").removeClass("loading");
            }, 1000);
        });
    })(jQuery);

    // change is-checked class on buttons
    var buttonGroups = document.querySelectorAll('#isotope-filters');
    for (var i = 0, len = buttonGroups.length; i < len; i++) {
        var buttonGroup = buttonGroups[i];
        radioButtonGroup(buttonGroup);
    }

    function radioButtonGroup(buttonGroup) {
        buttonGroup.addEventListener('click', function(event) {
            // only work with buttons
            if (!matchesSelector(event.target, 'button')) {
                return;
            }
            buttonGroup.querySelector('.is-checked').classList.remove('is-checked');
            event.target.classList.add('is-checked');
        });
    }
	(function() {
		// Set searchField to the search input field.
		// Set timeout to the time you want to wait after the last character in milliseconds.
		// Set minLength to the minimum number of characters that constitutes a valid search.
		var searchField = document.querySelector('#search-input'),
			timeout = 2000,
			minLength = 3;
	
		var textEntered = false;
	
		var timer, searchText;
		
		var handleInput = function() {
		  searchText = searchField ? searchField.value : '';
		  if (searchText.length < minLength) {
			return;
		  }
		  window.dataLayer.push({
			'event': 'studyfieldsInput',
			'searchTerm': searchText
		  });
		  textEntered = false;
		};
		
		var startTimer = function(e) {
		  textEntered = true;
		  window.clearTimeout(timer);
		  if (e.keyCode === 13) {
			handleInput();
			return;
		  }
		  timer = setTimeout(handleInput, timeout);
		};
		
		if (searchField !== null) {
		  searchField.addEventListener('keydown', startTimer, true);
		  searchField.addEventListener('blur', function() {
			if (textEntered) {
			  window.clearTimeout(timer);
			  handleInput();
			}
		  }, true);
		}
	  })();
});

