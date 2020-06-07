=== CoolClock - a Javascript Analog Clock ===
Contributors: RavanH
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=ravanhagen%40gmail%2ecom&item_name=CoolClock%20for%20WordPress&item_number=1%2e3%2e4%2e9&no_shipping=0&tax=0&charset=UTF%2d8&currency_code=EUR
Tags: clock, analog clock, coolclock, javascript, jquery, widget, shortcode, logarithmic clock
Requires at least: 4.8.1
Tested up to: 5.3
Requires PHP: 5.6
Stable tag: 4.2

Show an analog clock on your WordPress site sidebar or in post and page content.

== Description ==

This plugin integrates [CoolClock - The Javascript Analog Clock](http://randomibis.com/coolclock/) into your WordPress site. You can add it as a **widget** to your sidebar or insert it into your posts and pages with a **shortcode**. See [the FAQ's](http://wordpress.org/extend/plugins/coolclock/faq/) for available shortcode parameters and how to build the clock into your theme.

= Features =

- Can be added via a widget, shortcode or theme function
- No flash, meaning compatible with tablets and most other javascript enabled mobile devices
- 22 different skins to choose from or
- Custom skin option to create your own skin style
- Linear or logarithmic time scale

Read more on the [CoolClock homepage](https://status301.net/wordpress-plugins/coolclock/) or see [the FAQ's](http://wordpress.org/extend/plugins/coolclock/faq/) to learn how to configure your own skin settings.

= Pro features =

- Show date or 24h digital time
- Background image or color
- Border radius (rounded corners for background)
- Advanced positioning options (relative to background)
- Advanced shortcode parameters (including background image and custom skin)
- One extra clean skin for use with background image
- Support on the [CoolClock Pro forum](https://premium.status301.net/support/forum/coolclock-pro/)

Pro features come with the [CoolClock - Advanced extension](https://premium.status301.net/downloads/coolclock-advanced/).

= Translators =

- **Dutch** * R.A. van Hagen https://status301.net/ (version 3.0)
- **French** * R.A. van Hagen https://status301.net/ (version 3.0)
- **German** * Manfred Mrak http://www.niftyfox.ch/ (version 3.2)
- **Serbian** * Borisa Djuraskovic - WebHostingHub http://www.webhostinghub.com/ (version 2.9.4)
- **Slovenian** * Adijan Dervišević - http://www.adijan.eu (version 3.2)
- **Russian** * Наталия Завьялова - http://time-impressions.ru (version 2.9.8)

Please [contact me](https://status301.net/contact-en/) to submit your translation and get mentioned here :)

= Privacy / GDPR =

This plugin does not collect any user or visitor data nor set browser cookies. Using this plugin should not impact your site privacy policy in any way.


== Installation ==

= Wordpress =

Quick installation: [Install now](http://coveredwebservices.com/wp-plugin-install/?plugin=coolclock) !

 &hellip; OR &hellip;

Search for "coolclock" and install with that slick **Plugins > Add New** back-end page.

 &hellip; OR &hellip;

Follow these steps:

 1. Download archive.

 2. Upload the zip file via the Plugins > Add New > Upload page &hellip; OR &hellip; unpack and upload the complete directory with your favourite FTP client to the /plugins/ folder.

 3. Activate the plugin on the Plug-ins page.

Now visit your Widgets admin page and add the Analog Clock widget to your sidebar. :)


== Frequently Asked Questions ==

= Where do I start? =

There is no options page. Just go to your Appearance > Widgets admin page and find the new Analog Clock widget. Add it to your sidebar and change settings if you want to see another than the default clock.

Other ways to integrate a clock into your site are shortcodes or a theme function. See instructions below.

= What options does the widget have? =

First of all, you can pick a preset skin. There are 21 skins made by other users and, when the Advanced extension is added, one Minimal skin that only shows the clock arms, that can be useful for placing over a custom background image.

There are these options:

- Custom skin parameters - see question below;
- Radius - changes the clock size;
- Hide second hand;
- Show digital time (more options in the Advanced version);
- Set digital time color;
- GMT Offset - use this if you want one or more clocks to show the time for other timezones;
- Scale - linear is our standard clock scale, the other two show a logarithmic time scale;
- Align - left, center or right;
- Subtext - optional text, centered below the clock.

Then there are extra options availabe in the [CoolClock - Advanced extension](https://premium.status301.net/downloads/coolclock-advanced/) which allow for more customisation:

- Background image - define the full URL or path to an image to serve as background;
- Repeat image;
- Background size - stretch or cover to make it match your clock size;
- Background position - center, top, right, bottom or left of the wrapping div (define div size below);
- Width and height - define the size of the wrapping div that holds the background image;
- Background color - define a color value in hex or rgb(a) format, or a css color name;
- Border radius - optional rounded corners, higher is rounder;
- Clock position relative to background - here you can position the clock relative to top and left border of the wrapping div (as defined above) that holds the background image.
- Custom skin parameters for shortcode

= How can I create a custom skin? =

Follow the steps on [Creating a Custom Skin](https://premium.status301.net/coolclock-custom-skin/) and if you


= Can I share this fantastic custom skin I created? =

If you made a nice skin and would like to share it, you can do so in the comments on [Creating a Custom Skin](https://premium.status301.net/coolclock-custom-skin/) or add it to your [Plugin Review](http://wordpress.org/support/view/plugin-reviews/coolclock).

Thanks for sharing! :)


= Can I insert a clock in posts or pages? =

Yes, there the shortcode **[coolclock** **/]** available. You can find all parameters on [How to use the CoolClock shrotcode](https://premium.status301.net/how-to-use-the-coolclock-shortcode/).


= I'm building my own theme. Is there a theme function available? =

Yes, you can use a built-in WordPress function that parses a shortcode. To place the same clock as in the shortcode example above, anywhere in your theme, use this:

`<?php echo do_shortcode('[ coolclock skin="chunkySwiss" radius="140" showdigital=true align="left" ]'); ?>`


== Known Issues ==

1. When IE 8 is manually put or forced (through X-UA-Compatibility meta tag or response header) into Compatibility mode, the Clock will --even though the canvas area is put in place-- remain invisible.

2. When a shortcode is not placed on its own line but on the same line with text, image or even another shortcode, then the output (div with canvas tag) will be wrapped inside a paragraph tag. While most browsers do not have a problem displaying the clock, this *will* cause a validation error.

Please report any other issues on the [Support page](http://wordpress.org/support/plugin/coolclock).


== Screenshots ==

1. Example analog clock in sidebar. The background logo is added with the [CoolClock - Advanced extension](https://premium.status301.net/downloads/coolclock-advanced/).

2. Widget settings. The background options are availabe in the [CoolClock - Advanced extension](https://premium.status301.net/downloads/coolclock-advanced/).


== Upgrade Notice ==

= 4.2 =
Plugin support and rate links, input validation and bugfixes

== Changelog ==

= 4.2 =
* Custom skin parameters in shortcode
* Plugin support and rate links
* Widget color code validation
* FIX shortcode skin names case-sensitive
* FIX undefined index

= 4.1 =
* Digital text styling
* Clock icon for widget in Customizer
* FIX: use .min script versions when not in debug mode

= 4.0 =
* Split up classes
* Don't use print_scripts the wrong way

= 3.3 =
* Wrapper div class "coolclock"
* User input shortcode attributes validation

= 3.2 =
* Dropped compatibility with PHP 4 and pre WP 3.2
* German translation

= 3.1 =
* Deprecating PHP4 style constructor for Widget
* Bugfix undefined index

= 3.0 =
* Responsive canvas styling

= 2.9.8 =
* Translation string fixes
* Russian translation by Natalia Zavyalova

= 2.9.7 =
* Prepare custom skin for shortcode in advanced extension
* BUGFIX: disable wptexturize for shortcode content

= 2.9.6 =
* Skin watermelon alpha fix
* BUGFIX: Non-static method should not be called statically
* BUGFIX: Undefined index

= 2.9.5 =
* BUGFIX: PHP 5.4 Using $this when not in object context
* BUGFIX: Non-static method should not be called statically

= 2.9.4 =
* New clock skin shared by user MrCarlLister
* Use Globaltick branch script version 3.0.0-pre
* BUGFIX: undefined index in widget form

= 2.9.2 =
* BUGFIX: Thread between tip of the second hand and 3 o'clock in IE
* Shortcode filter

= 2.9 =
* BUGFIX: excanvas included too late
* CoolClock.js version 3.0.0-pre
* Allow shortcode in text widget
* NEW: Subtext option
* NEW: Widget align option

= 2.0 =
* NEW: logClock option

= 1.1 =
* Minified javascript

= 1.0 =
* Sidebar widget overhaul
* Class
* NEW: Shortcode

= 0.1 =
* First implementation of CoolClock in sidebar widget
