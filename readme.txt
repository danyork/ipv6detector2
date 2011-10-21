=== IPv6 Detector 2 ===
Contributors: Dan York
Tags: ipv6, ipv4, detect, whois
Requires at least: 2.6.0
Tested up to: 3.2.1
Stable tag: 1.0

== Description ==
Simple IPv6 detector widget for WordPress to show if user is connecting with IPv6 or IPv4.

This "IPv6 Detector 2" is a variation of "IPv6 Detector" by Andres Altamirano 
(http://patux.cl/ipv6detector ) that removes the links to IPv4 address depletion and removes 
the link to a whois service with the address. I created this second version because I wanted to 
reduce the size of the widget in the sidebar to my blogs - and I wanted to remove the whois service link.

Additionally, I added a class "ipv" to the <p> tag where the address is output so that it 
could be classed in a CSS file with a smaller font to accommodate longer IPv6 addresses.

Outside of those changes, it is essentially the same code created by Andres Altamirano.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload 'ipv6detector2' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

NOTE:  If you are installing from the source on Github, the latest downloads can be found at:

https://github.com/danyork/ipv6detector2/downloads

== Upgrade Notice ==

= 1.0 = 
First release of IPv6 Detector 2.

== Changelog ==

= 1.0 =
First release of IPv6 Detector 2. As noted in the description, the changes are:
- Removal of <ul> with links to IPv4 depletion resources
- Removal of link to whois service
- Addition of "ipv" class so that IP address can be modified via CSS

---------- ORIGINAL README FOLLOWS ----------

=== IPv6 Detector ===
Contributors: Andres Altamirano
Donate link: http://patux.cl
Tags: ipv6, ipv4, detect, whois
Requires at least: 2.6.0
Tested up to: 3.1.3
Stable tag: 1.2

== Description ==
Simple IPv6 detector widget for WordPress to show if user is connecting with IPv6 or IPv4.

Additionaly, it makes a link to a whois service with the ip address.

It was born because of my own blog. I needed to include a little box that shows users ip and different messages depending on the ip version.

The idea behind this is to promote and leave a way to discover and make sense about the ipv4 address space limits.


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `ipv6detector` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

It's so simple. There can't be questions.

Visit http://patux.cl/ipv6detector/ for further info.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.png

== Upgrade Notice ==
= 1.2 =
Bug fixes.

= 1.1 = 
Added features like stats and custom messages.


= 1.0 = The first release.

== Changelog ==
= 1.2 =
* Fixed sticky default url for whois service :)

= 1.1 = 
* Added custom msgs.
* Added stats display
* Added stats reset option

= 1.0 =
First version.

