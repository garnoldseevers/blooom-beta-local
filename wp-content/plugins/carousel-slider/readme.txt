=== Carousel Slider ===
Contributors: sayful
Tags: widget, shortcode, images, carousel, carousel slider, image carousel, slider, owl carousel
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3LZWQTHEVYWCY
Requires at least: 3.5
Tested up to: 4.7
Stable tag: 1.5.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Touch enabled wordpress plugin that lets you create beautiful responsive carousel slider.

== Description ==

Touch enabled WordPress plugin based on [Owl Carousel 2](http://www.owlcarousel.owlgraphic.com/) that lets you create beautiful responsive carousel slider.

If you like this plugin, please give us ratings for future improvement.

= Features =

* Fully Responsive
* Unlimited Slides
* Supported in all major browsers
* Touch and Grab enabled
* CSS3 3D Acceleration
* Multiple carousel on single page
* Lazy load images
* Navigation and pagination with unlimited colors
* Support image title and caption option
* and more options

= Usage 1st method =

Then go to `Carousels >> Add New` and fill all fields as your need and then click on "Publish" button. Now copy the generated shortcode and paste on post or page where you want to show carousel slider. See video instruction:

https://www.youtube.com/watch?v=O4-EM32h7b4&feature=youtu.be

= Usage - 2nd method =

Without using custom post (Carousels admin menu), you can use custom shortcode to link image and generate carousel slider.

To gererate carousel slider using shortcode, at first write wrapper shortcode as following:

`[carousel][/carousel]`

Now write the following shortcode inside the wrapper shortcode as many image as you want.

`[item img_link=""]`

You can add following attribute if you want to link image to custom post, page, image or anything that you want to open on click. Like as following

`[item img_link="IMAGE_URL_GOES_HERE" href="CUSTOM_URL_GOES_HERE"]`

The whole shortcode look likes as following: (See example shortcode.)

`[carousel][item img_link="IMAGE_URL_GOES_HERE"][item img_link="IMAGE_URL_GOES_HERE" href="CUSTOM_URL_GOES_HERE"][item img_link="IMAGE_URL_GOES_HERE"][/carousel]`

= Change Default Functionality =

You can change default functionality by adding following optional attributes at `[carousel][/carousel]` shortcode

`id=''`
Default: Random number
Add id if you want to use multiple carousel at same page. If you leave it blank, it will generate random number.

`items=''`
Default: 4
To set the maximum amount of items displayed at a time with the widest browser width (window >= 1200)

`items_desktop=''`
Default: 4
This allows you to preset the number of slides visible with (window >= 980) browser width.

`items_desktop_small=''`
Default: 3
This allows you to preset the number of slides visible with (window >= 768) browser width.

`items_tablet=''`
Default: 2
This allows you to preset the number of slides visible with (window >= 600) browser width.

`items_mobile=''`
Default: 1
This allows you to preset the number of slides visible with (window >= 320) browser width.

`auto_play=''`
Default: true
Write true to enable autoplay else write false.

`stop_on_hover=''`
Default: true
Write true pause autoplay on mouse hover else write false.

`navigation=''`
Default: true
Write false to hide "next" and "previous" buttons.

`nav_color=''`
Default: #d6d6d6
Enter hex value of color for carousel navigation.

`nav_active_color=''`
Default: #4dc7a0
Enter hex value of color for carousel navigation on mouse hover.

`margin_right=''`
Default: 10
margin-right(px) on item. Default value is 10. Example: 20

`inifnity_loop=''`
Default: true
Write true to show inifnity loop. Duplicate last and first items to get loop illusion

`autoplay_timeout=''`
Default: 5000
Autoplay interval timeout in millisecond.

`autoplay_speed=''`
Default: 500
Autoplay speen in millisecond.

`slide_by=''`
Default: 1
Navigation slide by x number. Default value is 1.

Example 1 (no attribute):

`[carousel][item img_link='http://lorempixel.com/400/200/city/1/'][item img_link='http://lorempixel.com/400/200/city/2/'][item img_link='http://lorempixel.com/400/200/city/3/'][item img_link='http://lorempixel.com/400/200/city/4/'][item img_link='http://lorempixel.com/400/200/city/5/'][item img_link='http://lorempixel.com/400/200/city/6/'][item img_link='http://lorempixel.com/400/200/city/7/'][item img_link='http://lorempixel.com/400/200/city/8/'][item img_link='http://lorempixel.com/400/200/city/9/'][item img_link='http://lorempixel.com/400/200/city/10/'][/carousel]`

Example 2 (with attribute):

`[carousel id='myCustomId' items='3' items_desktop='3' margin_right='5' navigation='false'][item img_link='http://lorempixel.com/400/200/city/1/'][item img_link='http://lorempixel.com/400/200/city/2/'][item img_link='http://lorempixel.com/400/200/city/3/'][item img_link='http://lorempixel.com/400/200/city/4/'][item img_link='http://lorempixel.com/400/200/city/5/'][item img_link='http://lorempixel.com/400/200/city/6/'][item img_link='http://lorempixel.com/400/200/city/7/'][item img_link='http://lorempixel.com/400/200/city/8/'][item img_link='http://lorempixel.com/400/200/city/9/'][item img_link='http://lorempixel.com/400/200/city/10/'][/carousel]`


== Installation ==

Installing the plugins is just like installing other WordPress plugins. If you don't know how to install plugins, please review the three options below:

= Install by Search =

* From your WordPress dashboard, choose 'Add New' under the 'Plugins' category.
* Search for 'Carousel Slider' a plugin will come called 'Carousel Slider by Sayful Islam' and Click 'Install Now' and confirm your installation by clicking 'ok'
* The plugin will download and install. Just click 'Activate Plugin' to activate it.

= Install by ZIP File =

* From your WordPress dashboard, choose 'Add New' under the 'Plugins' category.
* Select 'Upload' from the set of links at the top of the page (the second link)
* From here, browse for the zip file included in your plugin titled 'carousel-slider.zip' and click the 'Install Now' button
* Once installation is complete, activate the plugin to enable its features.

= Install by FTP =

* Find the directory titles 'carousel-slider' and upload it and all files within to the plugins directory of your WordPress install (WORDPRESS-DIRECTORY/wp-content/plugins/) [e.g. www.yourdomain.com/wp-content/plugins/]
* From your WordPress dashboard, choose 'Installed Plugins' option under the 'Plugins' category
* Locate the newly added plugin and click on the \'Activate\' link to enable its features.


== Frequently Asked Questions ==
Do you have questions or issues with Carousel Slider? [Ask for support here](http://wordpress.org/support/plugin/carousel-slider)

== Screenshots ==

1. Screenshot of Carousel Responsive Settings
2. Screenshot of Carousel All Carousel
3. Screenshot of Carousel Image Settings
4. Screenshot of Carousel General Settings
5. Screenshot of Carousel Navigation Settings
6. Screenshot of Carousel Autoplay Settings
7. Screenshot of Carousel Front-end Example.

== Changelog ==

= version 1.5.3 - 2016-12-08 =
* Fixed   - Issue for not saving zero value for margin.

= version 1.5.2 - 2016-12-03 =
* Added   - Added options to show title and caption on carousel item.
* Added   - Lazy Load of images.
* Added   - Support multiple carousel slide at same page.
* Added   - New Carousel Slider Widget to add carousel at widget. Especially helpful for page builder that use widget like "SiteOrigin Page Builder".
* Added   - New Element added for WPBakery Visual Composer page builder. If you are using WPBakery Visual Composer page.
* Merged  - All CSS styles in on file.

= version 1.5.1 - 2016-08-11 =
* Version compatibility check and some bug fix.

= version 1.5.0 - 2016-02-05 =

* Added graphical interface to add carousel
* Added shortcode attributes 'inifnity_loop', 'autoplay_timeout', 'autoplay_speed', 'slide_by', 'nav_color', 'nav_active_color', 'margin_right'
* Removed shortcode 'carousel_slider' and 'all-carousels'
* Removed shortcode attributes 'pagination_speed', 'rewind_speed', 'scroll_per_page', 'pagination_numbers', 'auto_height', 'single_item'

= version 1.4.0 =

* Added option to add custom image size
* Added option to link each slide to a URL
* Added option to open link in the same frame as it was clicked or in a new window or tab.
* Added feature to add multiple slider at page, post or theme by custom post category slug
* Re-write with Object-oriented programming (OOP)

= version 1.3.0 =

* Tested with WordPress version 4.1

= version 1.2.0 =

* Fixed bugs regarding shortcode.
* Added href="" to add link to post, page or media
* Translation ready

= version 1.1.0 - 2014-07-15 =

* Fixed some bugs.

= version 1.0.0 - 2014-06-30 =
* Initial release.

== Upgrade Notice ==
Update to get exciting new features and better security.
