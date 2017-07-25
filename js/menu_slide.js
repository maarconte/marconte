jQuery(document).ready(function() {

  jQuery( ".btn-burger" ).click(function() {
    jQuery( this ).toggleClass( "active" );
    jQuery(".navigation").toggleClass("opened");
  });

    jQuery( ".btn-burger" ).click(function() {
      jQuery( ".menu-slide").animate({
                    width: "toggle"
                });
  });

  	jQuery('.portfolio').on('click', function() { // Au clic sur un élément
			var page = jQuery(this).attr('href'); // Page cible
			var speed = 750; // Durée de l'animation (en ms)
			var nav = jQuery('#portfolio').offset();
			jQuery('html, body').animate( { scrollLeft: jQuery(page).offset().left - 85}, speed ); // Go
			return false;
		});
});

jQuery(window).on('load resize', function(){
        var html = jQuery('html');
        var slider = jQuery('.portfolio_slider');
        var desc = jQuery('.portfolio_txt');
        var viewportwidth;

        if(typeof window.innerWidth!='undefined'){
              viewportwidth=window.innerWidth;
        }

        if(viewportwidth >= 1200){
           html.addClass("desktop-xl");
            slider.removeClass("col-md-12 mobile");
           desc.removeClass("col-md-12 mobile");
        }else{
           html.removeClass("desktop-xl");
        }

        if(viewportwidth < 1200 && viewportwidth >= 992){
           html.addClass("desktop");
            slider.removeClass("col-md-12 mobile");
           desc.removeClass("col-md-12 mobile");
        }else{
           html.removeClass("desktop");
        }

        if(viewportwidth < 992  && viewportwidth >= 768 ){
           html.addClass("tablet");
           slider.addClass("col-md-12 tablet");
           desc.addClass("col-md-12 tablet");
        }else{
           html.removeClass("tablet");
           slider.removeClass("col-md-12 tablet");
           desc.removeClass("col-md-12 tablet");
        }

        if( viewportwidth < 768 ){
           html.addClass("mobile");
          slider.addClass("col-md-12 mobile");
           desc.addClass("col-md-12 mobile");
           
        }else{
           html.removeClass("mobile");
        }
});