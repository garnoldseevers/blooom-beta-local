// the relinker finds all secure.blooom.com links and reconfigures them appropriately

// execute after the document is ready to make sure that links get set after other plugins have messed with them
jQuery(document).ready(function () {
    // function to check the link and generate an updated string, if necessary
    // if not necessary, just return the original
    function generateNewUrl(originalUrl) {
        // default to original url
        var newUrl = originalUrl;

        // does the link match our regular expression for href of our login site
        if (newUrl.match(/secure\.blooom\.com/i)) {
            // append the current query parameters
            // if the link already has query parameters in it, change the '?' of location.search to a '&' and append
            // otherwise, just append location.search
            newUrl += newUrl.match(/\?/) ? location.search.replace(/\?/, '&') : location.search;
        }

        // return new url
        return newUrl;
    }

    // relink the slider, which uses its 'data-link' property to populate its 'a' element after we have already ran through the relink code.
    // find all the elements with a data-link attribute
    var links = document.querySelectorAll('[data-link]');

    // go through all the elements with a data-link attribute
    var i;
    for (i = 0; i < links.length; ++i) {
        // generate new url
        links[i].setAttribute('data-link', generateNewUrl(links[i].getAttribute('data-link')));

        // link arbitrarily stored via jQuery's data function. this is actually what the slider uses
        // to set up its link; so, update the url.
        jQuery(links[i]).data('link', generateNewUrl(jQuery(links[i]).data('link')));
    }

    // find all the links in the dom
    links = document.querySelectorAll('a');

    // go through all the links
    for (i = 0; i < links.length; ++i) {
        // generate new url
        links[i].href = generateNewUrl(links[i].href);
    }
});
