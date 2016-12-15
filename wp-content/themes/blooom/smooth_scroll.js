// the smooth_scroll script looks for an anchor reference in the url and
// (once the document is ready) scrolls to that anchor

// execute after the document is ready to make sure that the dom and spacings
// are all done
jQuery(document).ready(function () {
  alert("test");
  // get hash from url
  var hash = window.location.hash;

  // if there is no hash, GTFO
  if (!hash || hash !== '#video') {
    return;
  }

  // find the anchor on the page...since the hash has a '#' at the front of it
  // and since the elements we want to scroll to has the hash text (without '#') as the id
  // and since specifying ids in searching the dom is done with a '#' at the front
  // we can just use the hash directly
  var anchors = jQuery(hash);

  // does the anchor exist?
  if (anchors.length) {
    // get height of top nav bar
    var navBar = jQuery('.scroll_header_top_area');
    var navBarHeight = navBar ? navBar.height() : 0;

    // scroll to section
    jQuery('html,body').animate({scrollTop: jQuery(anchors[0]).offset().top - navBarHeight}, 'slow');
  }
});
