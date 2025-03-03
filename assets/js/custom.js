(function ($) {
	jQuery(document).ready(function ($) {
		// Menu trigger
		$("#js-menu-trigger").on("click", function (e) {
			e.preventDefault();
			$("#js-menu").toggleClass("is-visible");
			$("#js-menu-trigger i").toggleClass("icon-cancel");
			$("#js-page-overlay").toggleClass("is-visible");
			$("body").toggleClass("prevent-scroll");
			$("body").toggleClass("menu-visible");
			$("body").removeClass("search-visible");

			if ($("#js-search-form").hasClass("is-visible")) {
				$("#js-search-form").removeClass("is-visible");
				$("#js-search-trigger i").removeClass("icon-cancel");
				$("#js-page-overlay").addClass("is-visible");
				$("body").addClass("prevent-scroll");
			}
		});

		// Accordion trigger
		$("#js-accordion")
			.find(".js-accordion-toggle")
			.on("click", function (e) {
				e.preventDefault();

				// Expand or collapse this panel
				$(this).toggleClass("footer-menu__title--is-visible");
				$(this).next().slideToggle("fast");

				// Hide the other panels
				$(".js-accordion-toggle")
					.not($(this))
					.removeClass("footer-menu__title--is-visible");
				$(".js-accordion-content").not($(this).next()).slideUp("fast");
			});

		// Back to top
		$(".footer-back-to-top").click(function () {
			$("html, body").animate({ scrollTop: 0 }, "normal");
			return false;
		});

		// Submenu
		$(".dropdown-menu").each(function () {
			$(this).append(
				'<a class="submenu-button" href="javascript:void(0)"><span class="arrow-down"></span></a>'
			);
		});

		$(".dropdown-menu > .sub-menu").each(function () {
			var newDiv = $("<div/>").addClass("sub-menu-wrapper");
			$(this).before(newDiv);
			var next = $(this).next();
			newDiv.append(this).append(next);
		});

		if ($(window).width() < "1140") {
			$(".submenu-button, .submenu-button-sub").on("click", function (e) {
				e.preventDefault();
				if (!$(this).parent().hasClass("sub-menu-visible")) {
					$(this).parent().addClass("sub-menu-visible");
					$(this).parent().siblings().removeClass("sub-menu-visible");
				} else {
					$(this).parent().removeClass("sub-menu-visible");
				}
			});
		} else {
			$("#js-menu .menu-item").mouseenter(function (e) {
				e.preventDefault();
				$(this).addClass("sub-menu-visible");
				$(this).siblings().removeClass("sub-menu-visible");
			});

			$("#js-menu .menu-item").mouseleave(function (e) {
				e.preventDefault();
				$(this).removeClass("sub-menu-visible");
			});
		}

		// Sticky Header
		var prevScroll = window.scrollY || document.documentElement.scrollTop;
		var curScroll;
		var direction = 0;
		var prevDirection = 0;

		var header = document.getElementById("header");

		var checkScroll = function () {
			curScroll = window.scrollY || document.documentElement.scrollTop;
			if (curScroll > prevScroll) {
				//scrolled up
				direction = 2;
			} else if (curScroll < prevScroll) {
				//scrolled down
				direction = 1;
			}

			if (direction !== prevDirection) {
				toggleHeader(direction, curScroll);
			}

			prevScroll = curScroll;
		};

		var toggleHeader = function (direction, curScroll) {
			if (direction === 2 && curScroll > 1) {
				header.classList.add("hide");
				prevDirection = direction;
			} else if (direction === 1) {
				header.classList.remove("hide");
				header.classList.add("sticky-header");
				prevDirection = direction;
			}
		};

		window.addEventListener("scroll", checkScroll);
	});
})(jQuery);
