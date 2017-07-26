$(document).ready(function() {

function displayElements(parent, child) {
    parent.each(function() {
      TweenMax.staggerFrom($(this).find(child), 1, {
        y: 40,
        autoAlpha: 0,
        delay: .5,
        ease: Power2.easeOut
      },
      0.3);
    });
}

  $( '.btn-burger' ).click(function() {

    $( this ).toggleClass( 'active' );
    $('.navigation').toggleClass('opened');
    $( '.menu-slide').toggleClass('opened').animate({ width: 'toggle'});
    displayElements($( '.menu-slide.opened'), '.stagger-tween-item');
  });

  	$('.slide-link').on('click', function() { // Au clic sur un élément
			var page = $(this).attr('href'); // Page cible
			var speed = 750; // Durée de l'animation (en ms)
			var nav = $('#portfolio').offset();
			$('html, body').animate( { scrollLeft: $(page).offset().left - 85}, speed ); // Go
			return false;
    });

});

$(window).on('load resize', function(){
        var html = $('html');
        var el = $('.resize');
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

        if(/* viewportwidth < 1200 &&  */ viewportwidth >= 992){
           html.addClass('desktop');
            el.removeClass('col-md-12');
        }else{
           html.removeClass('desktop');
        }

        if(viewportwidth < 992  && viewportwidth >= 768 ){
           html.addClass('tablet');
           el.addClass('col-md-12 tablet');
        }else{
           html.removeClass('tablet');
           el.removeClass('tablet');
        }

        if( viewportwidth < 768 ){
           html.addClass('mobile');
          el.addClass('col-md-12 mobile');           
        }else{
           html.removeClass('mobile');
           el.removeClass('mobile');
        }
});