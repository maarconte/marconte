$(document).ready(function() {
	$('#fullpage').fullpage({
		sectionsColor: ['#fff', '#fff', '#fff','#F7F8F3', '#E5B542'],
		anchors:['firstPage', 'secondPage', 'thirdPage'],
		navigation: true,
		slidesNavigation: true,
		slidesNavPosition: 'bottom',
        //Scrolling
		css3: true,
		scrollingSpeed: 1000,
		autoScrolling: true,
		fitToSection: true,
		fitToSectionDelay: 5000,
		scrollBar: true,
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
		fadingEffect: true,
		scrollOverflow: true,
		scrollOverflowReset: false,
		scrollOverflowOptions: null,
		touchSensitivity: 15,
		normalScrollElements: '.list-projects',
		normalScrollElementTouchThreshold: 5,
		bigSectionsDestination: null,
		lazyLoading: true,
    });
});