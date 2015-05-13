=== Zia3 Rotating Words ===
Contributors: zia3wp
Donate link: http://plugins.zia3.com/donate/
Tags: rotating words, onpening sequence, typography effect, animation, css3, css animation,  responsive, shortcode, landing page, coming soon
Requires at least: 3.5
Tested up to: 4.2.2
Stable tag: 1.0
License: GPLv2+
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Zia3 Rotating Words is a pure CSS typography effect animation opening screen for any website by <a href="http://plugins.zia3.com/">Serkan Azmi</a> at <a href="http://zia3.com/">Zia3</a>

<h4>What Can This Plugin Do?</h4>

*   Cross browser compatibility
*   Responsive design (will work on any device and screen size)
*   You can specify title and link along with your website slogan and link.

This plugin does one thing and one thing only, to keep it small yet fully functional.


<h4>About the Shortcode:</h4>

There are 7 parameters total that you can use with this shortcode.  The **ID** being the only one that's absolutely **required**.

List of parameters:

*   id
*   font_family
*   font_size
*   pos_top
*   pos_left
*   rw_height
*   rw_width


`
[zia3_rw id="333" font_family="My Font Name" font_size="font_size" pos_top="Position from top of screen" pos_left="Position from left of screen" rw_height="Rotating words container height" rw_width="Rotating words container width"]
`

**NOTE FOR THEME DEVELOPERS:** This plugin makes use of both *wp_head()* and *wp_footer()* so if your theme is missing either you may experience issues using this plugin.

== Installation ==

<h4>Installation</h4>


1.   Upload the plugin zip file to the `/wp-content/plugins/` directory
2.   Activate the plugin through the 'Plugins' menu in WordPress
3.   Use the shortcode [zia3_rw id="xxx"]
4.   Customize the slideshow using the parameters explained in <a href="https://wordpress.org/plugins/zia3-rotating-words/">screenshot #4</a>


<h4>Using the Shortcode</h4>
After you've added your rotating words and generated a shortcode you just need to copy the shortcode and paste it into the content of any page or post you want the opening sequence to show up on.  If you want it to show up on every page you'll have to add some code to the header.php file in your theme.  See the codex's <a href="http://codex.wordpress.org/Function_Reference/do_shortcode">do_shortcode article</a> for more information on the matter.

<a href="https://wordpress.org/plugins/zia3-rotating-words/">See screenshot #3</a> for a description of the shortcode parameters.

== Screenshots ==

1. Demonstration 1
2. Demonstration 2
2. Backend Example
4. Shortcode Generator


== Upgrade Notice ==

Just the usual, deactivate plugin, replace files, activate.

== Changelog ==

1.0 Added link and slogan color support.

<h4>Versions 1.0 </h4>

*   1.0 Initial Release


