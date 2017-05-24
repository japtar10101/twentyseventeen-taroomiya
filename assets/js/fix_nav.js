// Sticky nav on pages and posts

var body = jQuery( 'body' );
var navigation = body.find( '.navigation-top' );
var customHeader = body.find( '.custom-header' );
var navigationOuterHeight = navigation.outerHeight();
if ( body.hasClass( 'has-header-image' ) ) {
  var headerOffset = customHeader.innerHeight() - navigationOuterHeight;
}
jQuery( window ).on( 'scroll', function() {
  if ( jQuery( window ).scrollTop() >= headerOffset ) {
    navigation.addClass( 'site-navigation-fixed' );
  } else {
    navigation.removeClass( 'site-navigation-fixed' );
  }
});
