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
});