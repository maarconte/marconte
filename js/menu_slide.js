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
