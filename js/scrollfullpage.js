$(document).ready(function() {
	$('#fullpage').fullpage({
		sectionsColor: ['#fff', '#F7F8F3', '#3BB2B8','#F7F8F3', '#F7F8F3'],
		anchors:['Home', 'Votre projet', 'Portfolio','Bio','Contact'],
		navigation: true,
		slidesNavigation: true,
		slidesNavPosition: 'bottom',
        //Scrolling
		css3: true,
		scrollingSpeed: 1000,
		autoScrolling: true,
		fitToSection: true,
		fitToSectionDelay: 2000,
		scrollBar: false,
		easing: 'easeInOutBack',
		easingcss3: 'ease',
		loopBottom: false,
		loopTop: false,
		loopHorizontal: true,
		continuousVertical: false,
		continuousHorizontal: false,
		scrollHorizontally: false,
		interlockedSlides: false,
		dragAndMove: false,
		offsetSections: false,
		resetSliders: false,
		fadingEffect: false,
		scrollOverflow: true,
		scrollOverflowReset: false,
		scrollOverflowOptions: null,
		touchSensitivity: 15,
		normalScrollElementTouchThreshold: 5,
		bigSectionsDestination: null,
		lazyLoading: true,

		// Animation on loaded DOM
		afterRender: function(){
			var pluginContainer = $(this);
			$("#primary").addClass("loaded");
			$(".logo-loading").delay(4000).fadeOut();
		},

		// Animations on loaded sections
		afterLoad: function(anchorLink, index){
			var loadedSection = $(this);

			const c_el = $("#section-contact .right");
			const cel_width = c_el.offsetWidth;
			c_el.css('right', cel_width + 'px');	

			const b_el = $("#section-contact .right");
			const bel_width = b_el.offsetWidth;
			b_el.css('right', bel_width + 'px');	

			if(anchorLink == 'Home'){
				// Some animation
			}

			if(anchorLink == 'Services'){
				// Somme animation
			}

			if(anchorLink == 'Portfolio'){
				// Somme animation
			}

			if(anchorLink == 'Bio'){
				$("#section-about .right").addClass("animated slideInRight");
			}

			if(anchorLink == 'Contact'){
				c_el.addClass("animated slideInRight");
			}
		}
		
    });
});