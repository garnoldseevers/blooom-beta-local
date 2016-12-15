/**
 * Hides the Mobile Menu when an internal link is clicked
*/

// assign new variable to jQuery to ensure no conflicts
$jmob = jQuery.noConflict();
// once document is ready
$jmob(document).ready(function() {
    /*
        Hide mobile menu when user clicks on an internal link in the mobile menu using mouseup event handler due to conflict with on click from another plugin
    */
    $jmob( document ).on( 'mouseup', '.menu-item a[href*="#"]' , function ( ) {  
            $jmob('body').toggleClass('show-nav-left'); 
        
        if ( $jmob( 'body' ).hasClass( 'show-nav-left') ){  
            $jmob( 'body' ).css( 'overflow', 'hidden');  
        } else {
            $jmob( 'body' ).css( 'overflow', '');  
        }
        
    });
});