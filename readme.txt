=== Hyphenator ===
Contributors: e2b
Donate link: http://www.bebl.eu/zeug/hyphenator
Tags: hyphenator, hyphenation, hyphenate, hypen, softhyphen, pattern, JavaScript, HTML, XHTML, shy, Silbentrennung, Worttrennung, Trennmuster
Requires at least: 2.6
Tested up to: 2.7.1
Stable tag: 1.0.2

Soft hyphen are automatically added in the content for nicer automatic word wrap. Particularly suitable for justification. Uses Hyphenator.js.


== Description ==
Hyphenator automatically inserts seperators in the content, so that at the end of line the text is wrapped with a dash if applicable. Hyphenator.js, a JavaScript available under the terms of GPL3, is used. It fields the algorithm known from OpenOffice and LaTeX. As this is executed client-sidedly, it adapts itself to the respective browser environment and thus avoids a faulty display. The script is particularly suitable for justification and supports a variety of languages.

= Supported Languages =
English, Deutsch, Français, Español, Italiano, Nederlands, suomi, svenska, polski, русский язык, বাংলা, ქართული, മലയാളം, ગુજરાતી, हिन्दी, ଓଡ଼ିଆ, ਪੰਜਾਬੀ, தமிழ், తెలుగు

= Features =
This Plugin includes Hyphenator.js into your blog for inserting separators automatically. The user settings backend available in English and German is easy to understand and everything could be configured there.

= What's Hyphenator.js? =
> Hyphenator.js …
> 
> * **automatically hyphenates texts on websites** if either the webdeveloper has included the script on the website or you use it as a [bookmarklet](http://en.wikipedia.org/wiki/Bookmarklet "Bookmarklet - Wikipedia, the free encyclopedia") on any site.
> * runs **on any modern browser** that supports JavaScript and the soft hyphen (&amp;shy;).
> * **runs on the client** in order that the HTML source of the website may be served clean and svelte.
> * follows the ideas of **[unobtrusive JavaScript](http://en.wikipedia.org/wiki/Unobtrusive_JavaScript "Unobtrusive JavaScript - Wikipedia, the free encyclopedia")**.
> * has a **[documented API](http://code.google.com/p/hyphenator/wiki/en_PublicAPI "en_PublicAPI - hyphenator - Documentation of the public API of Hyphenator.js - Google Code")** and is highly configurable to meet your needs.
> * supports a **wide range of languages**.
> * relies on Frank M. Liangs hyphenation algorithm [(PDF)](http://www.tug.org/docs/liang/liang-thesis.pdf "Word Hy-phen-a-tion by Com-put-er by Franklin Mark Liang") commonly known from LaTeX and OpenOffice.
> * is free software licensed under [GPL v3](http://www.gnu.org/licenses/gpl.html "The GNU General Public License - GNU Project - Free Software Foundation (FSF)")

Visit the [project homepage](http://code.google.com/p/hyphenator/ "hyphenator - Google Code") for more about. There you also find the documentation for all options.

== Installation ==
1. Unzip and upload the archive to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure it throught the new menu item 'Hyphenator' in 'Settings'


== Screenshots ==
1. settings backend (in English)


== Frequently Asked Questions ==

= Why shows my WordPress no update to 1.0.0.1? =
* **Reason:** I have relaunched the version numeration for Hyphenator version 1.0.0 so that it answers to the new version of the Hyphenator.js project. The downside is people using the previous version won't be notified due to the new versions 1.0.0 and 1.0.0.1. Sorry, I fizzled it.
* **Solution:** Try to install the new version manually. Maybe you have to delete the existing installation of Hyphenator first. An other option is to go to 'Edit' in 'Plugins' in Wordpress, select 'Hyphenator' and alter the version number into a minor one, 0.1 should work. Save and then WordPress will show you an Update for 'Hyphenator' you can install. Done.


== Example ==
You can see a working example [here](http://hyphenator.googlecode.com/svn/trunk/WorkingExample.html "Example of using Hyphenator.js").


== Version History ==
* 0.0.7 (12.10.2008) - first version (released first as version 1.0)
* 0.0.8 (15.10.2008) - updated to Hyphenator.js v8 (beta)
* 0.0.81 (22.10.2008) - updated to Hyphenator.js v8_1 (beta)
* 0.0.91 (04.11.2008) - updated to Hyphenator.js v9_1 (beta)
* 0.1.0 (26.11.2008) - updated to Hyphenator.js v10 (beta)
* 0.1.1 (23.12.2008) - updated to Hyphenator.js v11 (beta)
* 0.1.2 (12.01.2009) - updated to Hyphenator.js v12 (beta)
* 1.0.0 (24.02.2009) - updated to Hyphenator.js 1.0.0, new version numbers and new backend
* 1.0.0.1 (25.02.2009) - fatal bug fixed
* 1.0.1 (03.03.2009) - updated to Hyphenator.js 1.0.1
* 1.0.2 (09.03.2009) - updated to Hyphenator.js 1.0.2


== License ==
Copyright (C) 2008-2009 Benedict B. alias e2b

This program (plugin including Hyphenator.js) is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the [GNU General Public License](http://www.gnu.org/licenses/gpl.html "The GNU General Public License - GNU Project - Free Software Foundation (FSF)") for more details.
