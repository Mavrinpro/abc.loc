/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	// $('div.svg_search').click(function (){
	// 	console.log(1);
	// 	$('#block-search').css('top', 0);
	// })

	$(window).click(function (e){
		if (e.target.classList[0] === 'svg_search'){
			$('#block-search').css('top', 0);
		}
})
	$(document).click(function (e){ // событие клика по веб-документу
		var div = $("#block-search"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
			&& div.has(e.target).length === 0 || e.target.classList[0] === 'close_search_block') { // и не по его дочерним элементам
			$('#block-search').css('top', '-150px'); // скрываем его
		}
	});
//menu
	$('#hamburger1').click(function (){
		$('#primary-menu').toggleClass('zindex');
	})
	var screenWidth = screen.width;

	if (screenWidth < 991){
		$('#primary-menu').removeClass('d-none').addClass('nav-links');
	}else{

	}

	//preloader
	$(document).ready(function() {
		$('.preloader, .overlays').fadeOut();
	});

	//Animate btn hover
	const buttons = document.querySelectorAll(".btn");
	buttons.forEach((button) => {

		button.onmouseover = function(e){
			var targetCoords = button.getBoundingClientRect();
			var xCoord = e.clientX - targetCoords.left;
			var yCoord = e.clientY - targetCoords.top;
			let ripple = document.createElement("span");
			ripple.style.left = xCoord + 'px';
			ripple.style.top = yCoord + 'px';
			this.appendChild(ripple);
			setTimeout(function(){
				ripple.remove();
			}, 4000);
		}
	});

	// Modal
	jQuery(function($) {
		$("#modal-1").slickModals({
			// Functionality
			popupType: "",
			delayTime: 1000,
			exitTopDistance: 40,
			scrollTopDistance: 400,
			setCookie: true,
			cookieDays: 0,
			cookieTriggerClass: "setCookie-1",
			cookieName: "slickModal-1",

			// Overlay options
			overlayBg: true,
			overlayBgColor: "rgba(0,0,0,0.85)",
			overlayTransition: "ease",
			overlayTransitionSpeed: "0.4",

			// Background effects
			bgEffect: "scale",
			blurBgRadius: "2px",
			scaleBgValue: "0.9",

			// Window options
			windowWidth: "500px",
			windowHeight: "300px",
			windowLocation: "center",
			windowTransition: "ease",
			windowTransitionSpeed: "0.4",
			windowTransitionEffect: "zoomIn",
			windowShadowOffsetX: "0",
			windowShadowOffsetY: "0",
			windowShadowBlurRadius: "20px",
			windowShadowSpreadRadius: "0",
			windowShadowColor: "rgba(0,0,0,0.3)",
			windowBackground: "rgba(255,255,255,1)",
			windowRadius: "12px",
			windowMargin: "30px",
			windowPadding: "30px",

			// Close and reopen button
			closeButton: "icon",
			reopenClass: "modal__trigger",
		});
	});
	// Modal end

	//swiper


const SwiperDoc = new Swiper('.SwiperDoc', {
  // Default parameters
  slidesPerView: 1,
	slidesPerColumn: 1,
  spaceBetween: 10,
	autoplay: {
		delay: 5000,
	},
  // Responsive breakpoints
  pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	loop: false,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},

})

	//Reviews slider
	const reviews = new Swiper('.SwiperReviews', {
		// Default parameters
		slidesPerView: 1,
		slidesPerColumn: 1,
		spaceBetween: 0,
		autoplay: {
			delay: 5000,
		},
		// Responsive breakpoints
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	})
	//SwiperSertificate slider
	const SwiperSertificate = new Swiper('.SwiperSertificate', {
		// Default parameters
		slidesPerView: 5,
		spaceBetween: 10,
		autoplay: {
			delay: 5000,
		},
		loop: false,
		// Responsive breakpoints
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		breakpoints: {
			// when window width is >= 320px
			320: {
				slidesPerView: 1,
				spaceBetween: 10
			},
			// when window width is >= 480px
			480: {
				slidesPerView: 3,
				spaceBetween: 30
			},
			// when window width is >= 640px
			640: {
				slidesPerView: 5,
				spaceBetween: 40
			}
		}
	})

	// wow.js
	const wow = new WOW({
		boxClass: 'wow', /* класс, который необходим для работы wow.js */
		animateClass: 'animated', /* класс, который будет автоматически добавляться анимируемым элементам при прокрутке страницы */
		offset: 50, /* по-умолчанию установлено значение 0, то есть как только при прокрутке страницы, элемент
		 достигает низа окна браузера проигрываться анимация, в данном случае анимация начнется на 30px выше от низа окна браузера */
		mobile: true, /* если true, то на мобильных тоже будет анимация, если false, то на мобильных анимация отключается */
		live: true /* если true, то анимация будет работать даже на динамически добавляемых элементах, если false, то только на тех элементах, которые были на странице при ее загрузке */
	})
	wow.init(); /* Инициализация плагина с установленными выше свойствами */

// Animate number
	var single = $('p.h2_single').find('span');
	single.each(function (){
		$(this).prop('Counter', 0).animate({
			Counter: $(this).text()
		}, {
			duration: 1000,
			easing: 'swing',
			step: function (now){
				$(this).text(Math.ceil(now));
			}
		});
	})
		// accordion
	$('.accord_head').click(function(){
		$(this).toggleClass('active');
		$(this).find('.arrow_accordion').toggleClass('arrow-animate');
		$(this).next('.content').slideToggle(280);
	});


	// Scroll to block transition
	$('a[href^="#"]').click(function () {
		elementClick = $(this).attr("href");
		destination = $(elementClick).offset().top;

			$('html').animate( { scrollTop: destination }, 1000 );

		return false;
	});

	//Load more reviews
	var button = $('.load_more'),
		url = button.attr("data-url"),
		paged = button.attr("data-paged"),
		maxPages = button.attr("data-maxpaged"),
		load_text_ajax = $('.load_text_ajax');

	button.on('click', function (event) {
		var comment_id = $('.block_comment ');
		var counts = comment_id.attr('data-count_comment');
		var last_id = comment_id.slice(-1).data('comment_id');
		var post_id = comment_id.data('post_id');
		var next_id = button.data('next_id');

		paged++;
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: url,
			data: {
				post_id: post_id,
				last_id: last_id,
				paged: paged,
				next_id: next_id,
				action: 'loadmore'
			},
			//dataType: "json",
			beforeSend: function (xhr) {
				button.addClass('border_none');
				button.html('<img src="/wp-content/themes/abc-clinic/img/loader.svg" width="25">');
			},
			success: function (json) {
				//console.log(json);
				console.log(maxPages+'-'+paged);


				load_text_ajax.append(json);
				//load_text_ajax.append(json.next_id);

				jQuery('.load_more').attr('data-next_id', json.next_id);

				//console.log(paged+' '+maxPages);
				button.html('Загрузить еще');
				if (paged== maxPages) {
					button.remove();
				}
			}
		});
	});


}( jQuery ) );
