//_____________________Fade In Animation____________________

$(document).ready(function() {

function fadeIn(parent, child) {
    parent.each(function() { // For each parent
      TweenMax.staggerFrom($(this).find(child), 1.3, { // Find children
        y: -40, // Slide form the top
        autoAlpha: 0, // Opacity
        delay: .2, // Delay before the animation should begin
        ease: Elastic.easeInOut.config(1, .5)
      },
      0.3); // Amount of time in seconds before displaying each element
    });
}

//_______________________Animate Menu_______________________

  $( '.btn-burger' ).click(function() {
    
    $( this ).toggleClass( 'active' );
    $('.navigation').toggleClass('opened');
    $( '.menu-slide').animate({'width': 'toggle'}); // Open the menu
    fadeIn($( '.navigation.opened .menu-slide'), '.stagger-tween-item'); // Fade in child elements from .menu-slide
  });

//__________________Animate list-items CV___________________

  $('.nav-link').one('click', function(){ // On click on the CV link
   if (!$(this).hasClass("active")) { // If the CV link is not already active
    fadeIn($( '.tab-content'), '.list-item'); // Fade in list-items from CV
   }
  });

//______________________Horizontal scroll___________________

  	$('.slide-link').on('click', function() { 
      var page         = $(this).attr('href'); // Target page
      var pagePosition = $(page).offset().left; // Target page position
      var speed        = 750; // Animation duration

			$('html, body').animate( { scrollLeft: pagePosition }, speed ); // Slide to target page
      fadeIn($(page), $('.nav-item')); // Fade in nav-item in the portfolio
    });

//______________________Animate Portfolio___________________



}); // Document.ready



//_______________________Responsive_________________________

$(window).on('load resize', function(){
        var html = $('html');
        var el   = $('.resize');
        var sizeDesktop = 992;
        var sizeTablet = 768;
        var viewportwidth;

        if(typeof window.innerWidth!='undefined'){
              viewportwidth=window.innerWidth;
        }

        // if(viewportwidth >= 1200){
        //    html.addClass('desktop-xl');
        //     slider.removeClass('col-md-12 mobile');
        //    desc.removeClass('col-md-12 mobile');
        // }else{
        //    html.removeClass('desktop-xl');
        // }

        if(/* viewportwidth < 1200 &&  */ viewportwidth >= sizeDesktop){
          html.addClass('desktop'); // Viewport is desktop
          el.removeClass('col-md-12');
        }else{
           html.removeClass('desktop');
        }

        if(viewportwidth < sizeDesktop  && viewportwidth >= sizeTablet ){
          html.addClass('tablet'); // Viewport is tablet
          el.addClass('col-md-12 tablet');
        }else{
          html.removeClass('tablet');
          el.removeClass('tablet');
        }

        if( viewportwidth < sizeTablet ){
          html.addClass('mobile'); // Viewport is mobile
          el.addClass('col-md-12 mobile');           
        }else{
          html.removeClass('mobile');
          el.removeClass('mobile');
        }
});