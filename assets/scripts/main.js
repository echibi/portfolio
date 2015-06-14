/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {

	// Use this variable to set up the common and page specific functions. If you
	// rename this variable, you will also need to rename the namespace below.
	var Sage = {
		// All pages
		'common'  : {
			init    : function () {
				// JavaScript to be fired on all pages
			},
			finalize: function () {
				// JavaScript to be fired on all pages, after page specific JS is fired
			}
		},
		// Home page
		'home'    : {
			init    : function () {
				// JavaScript to be fired on the home page
			},
			finalize: function () {
				// JavaScript to be fired on the home page, after the init JS

				var count = 2, // Start at page 2.
					wp_url = scriptParams.wp_url,// Count pagination
					total = scriptParams.total_pages, // Total nr of pages.
					$ajax_loader = $('.ajax-loader');


				var loadArticle = function(pageNumber) {
					$ajax_loader.show('fast');
					$.ajax({
						url: wp_url + "/wp-admin/admin-ajax.php",
						type:'POST',
						data: "action=infinite_scroll&page_no="+ pageNumber,
						success: function(html){
							$(".posts-wrap").append(html);    // This will be the div where our content will be loaded
							$ajax_loader.hide('1000');
						}
					});
					return false;
				};

				$(window).scroll(function(){
					if  ($(window).scrollTop() === $(document).height() - $(window).height()){
						// run our call for pagination
						if (count > total){
							return false;
						}else{
							console.log(count);
							loadArticle(count);
						}
						count++;
					}
				});
			}
		},
		// About us page, note the change from about-us to about_us.
		'about_us': {
			init: function () {
				// JavaScript to be fired on the about us page
			}
		}
	};

	// The routing fires all common scripts, followed by the page specific scripts.
	// Add additional events for more control over timing e.g. a finalize event
	var UTIL = {
		fire      : function (func, funcname, args) {
			var fire;
			var namespace = Sage;
			funcname = (funcname === undefined) ? 'init' : funcname;
			fire = func !== '';
			fire = fire && namespace[func];
			fire = fire && typeof namespace[func][funcname] === 'function';

			if (fire) {
				namespace[func][funcname](args);
			}
		},
		loadEvents: function () {
			// Fire common init JS
			UTIL.fire('common');

			// Fire page-specific init JS, and then finalize JS
			$.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
				UTIL.fire(classnm);
				UTIL.fire(classnm, 'finalize');
			});

			// Fire common finalize JS
			UTIL.fire('common', 'finalize');
		}
	};

	// Load Events
	$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
