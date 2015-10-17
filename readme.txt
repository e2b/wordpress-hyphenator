=== Hyphenator ===
Contributors: e2b, odie2
Donate link:
Tags: hyphenator, hyphenation, hyphenate, hyphen, softhyphen, pattern, JavaScript, HTML, XHTML, shy, Silbentrennung, Worttrennung, Trennmuster
Requires at least: 2.7
Tested up to: 4.4.3
Stable tag: 5.1.5

Soft hyphens are automatically added in the content for a nicer automatic word wrap. Particularly suitable for justification. Uses Hyphenator.js.

== Description ==
Hyphenator automatically inserts separators in the content, so that at the end of line the text is wrapped with a dash if applicable. Hyphenator.js, a JavaScript available under the terms of LGPL v3, is used. It fields the algorithm known from OpenOffice and LaTeX. As this is executed client-sidedly, it adapts itself to the respective browser environment and thus avoids a faulty display. The script is particularly suitable for justification and supports a variety of languages.

= Supported Languages =
Беларуская (Belarusian), বাংলা (Bengali), Català (Catalan), Česky (Czech), Dansk (Danish), Deutsch (German), Ελληνική monotone (monotone greek), Ελληνική polytone (polytone greek), British English (British English), American English (American English), Esperanto (Esperanto), Español (Spanish), Eesti (Estonian), Suomi (Finnish), Français (French), Ελληνική ancient (ancient greek), ગુજરાતી (Gujarati), हिंदी (Hindi), Magyar (Hungarian), Հայերեն լեզու (Armenian), Italiano (Italian), ಕನ್ನಡ (Kannada), Latina (Latin), Lietuvių (Lithuanian), latviešu valoda (Latvian), മലയാളം (Malayalam), Nederlands (Dutch), Norsk (Norwegian), ଓଡ଼ିଆ (Oriya), ਪੰਜਾਬੀ (Punjabi), Polski (Polish), Português (Portuguese), Român (Romanian), Pyccĸий (Russian), Slovenčina (Slovak), Slovenščina (Slovenian), Српска ћирилица (Serbian, Cyrillic), Српски (Serbian, Latin script), Svenska (Swedish), தமிழ் (Tamil), తెలుగు (Telugu), Türkçe (Turkish), Українська (Ukrainian)

= Features =
This plugin includes Hyphenator.js into your blog for inserting separators automatically. The user settings backend available in English, German, Romanian and Polish is easy to understand and everything could be configured there.

= What's Hyphenator.js? =
> **Hyphenator.js …**
> 
> * **automatically hyphenates texts on websites** if either the webdeveloper has included the script on the website or you use it as a [bookmarklet](http://en.wikipedia.org/wiki/Bookmarklet "Bookmarklet - Wikipedia, the free encyclopedia") on any site.
> * runs **on any modern browser** that supports JavaScript and the soft hyphen (&amp;shy;).
> * **automatically breaks URLs** on any browser that supports the zero width space.
> * **runs on the client** in order that the HTML source of the website may be served clean and svelte and that it can respond to text resizings by the user.
> * follows the ideas of **[unobtrusive JavaScript](http://en.wikipedia.org/wiki/Unobtrusive_JavaScript "Unobtrusive JavaScript - Wikipedia, the free encyclopedia")**.
> * has a **[documented API](http://code.google.com/p/hyphenator/wiki/en_PublicAPI "en_PublicAPI - hyphenator - Documentation of the public API of Hyphenator.js - Javascript that implements client-side hyphenation of HTML-Documents - Google Project Hosting")** and is highly configurable to meet your needs.
> * supports a **[wide range of languages](http://code.google.com/p/hyphenator/wiki/en_AddNewLanguage "en_AddNewLanguage - hyphenator - Documentation of the public API of Hyphenator.js - Javascript that implements client-side hyphenation of HTML-Documents - Google Project Hosting")**.
> * relies on Franklin M. Liangs hyphenation algorithm [(PDF)](http://www.tug.org/docs/liang/liang-thesis.pdf "Word Hy-phen-a-tion by Com-put-er by Franklin Mark Liang") commonly known from LaTeX and OpenOffice.
> * is free software licensed under [LGPL v3](http://www.gnu.org/licenses/lgpl.html "GNU Lesser General Public License (LGPL) v3.0 - GNU Projekt - Free Software
Foundation (FSF)") with additional permission to distribute non-source (e.g., minimized or compacted) forms of that code (see source code header for details).
> * provides **services for customizing, merging and packing** script and patterns.
> * supports [CSS3-hyphenation](http://code.google.com/p/hyphenator/wiki/en_CSS3Hyphenation "en_CSS3Hyphenation - hyphenator - Documentation of the public API of Hyphenator.js - Javascript that implements client-side hyphenation of HTML-Documents - Google Project Hosting")

Visit the [project homepage](http://code.google.com/p/hyphenator/ "hyphenator - Google Code") for more about. There you also find the documentation for all options.

== Installation ==
1. Unzip and upload the archive to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure it through the new menu item 'Hyphenator' in 'Settings'

== Frequently Asked Questions ==
= Supported Browsers =
* Mozilla Firefox 3+
* Google Chrome 1+
* Opera 7.1+
* Internet Explorer 6+
* Apple Safari 2+
* Konqueror 3.5+

And any other modern browser that supports JavaScript and the soft hyphen (&amp;shy;).

= Shouldn't hyphenation be done on the server side? =
> There are some arguments against client side hyphenation - true. It costs a lot of computing time and the patterns have to be loaded for each language, everytime. But I believe that hyphenation belongs to the client:
> 
> * Only the client «knows» where to break a line (and if at all).
> * A html file that has been hyphenated on the server would be full of &amp;shy;'s. That's ugly and nobody knows how that would be treated by search engines…
> * Hyphenation on the client can be turned off to work around copy&paste- and search-bugs in most browsers.
> * as JavaScript-engines are in focus of development, they become faster and faster.
> * there are billions of mostly underworked clients vs. millions of often overloaded servers.

*([Source](http://code.google.com/p/hyphenator/wiki/en_FAQ#Shouldn't_hyphenation_be_done_on_the_server_side?))*

= Hyphenator breaks the search functionality of my browser = 
> Your browser has a bug (currently, only Firefox3 finds hyphenated words). So I don't want/can't fix this in Hyphenator.js. The only thing we can do is to turn hyphenation off before searching.

*([Source](http://code.google.com/p/hyphenator/wiki/en_FAQ#Hyphenator_breaks_the_search_functionality_of_my_browser))*

= When I copy/paste hyphenated texts from a website, spaces/hyphens are inserted in almost all words =
> This is fixed since version 3.0.0.

*([Source](http://code.google.com/p/hyphenator/wiki/en_FAQ#When_I_copy/paste_hyphenated_texts_from_a_website,_spaces/hyphen))*

= JavaScript is insecure and evil. It should be turned off in every browser! =
> Welcome to Web 2.0, the world of AJAX and modern browsers! It's true, JavaScript had a very bad reputation - not because JavaScript itself is bad, but because of a very poor implementation in some browsers. As of today JavaScripts influence is growing and browser developers put a lot of work in making their JavaScript engines better, secure and really fast. There are a lot of webpages using JavaScript in a good manner. Further, Hyphenator.js follows the rules of **[unobtrusive JavaScript](http://en.wikipedia.org/wiki/Unobtrusive_JavaScript)**.

*([Source](http://code.google.com/p/hyphenator/wiki/en_FAQ#JavaScript_is_insecure_and_evil._It_should_be_turned_off_in_ever))*

= How about Accessibility? =
> Following the rules of **[unobtrusive JavaScript](http://en.wikipedia.org/wiki/Unobtrusive_JavaScript)** Hyphenator.js has AFAIK no influence on accessibility of your webpage. It just adds a feature that will not be missed by a screen reader.
> 
> Some screen readers have issues with words that contain soft hyphens (they read syllables instead of words). Please note that this is not an issue of Hyphenator but a bug in the screen reader. Please contact the makers of the screen reader application.

*([Source](http://code.google.com/p/hyphenator/wiki/en_FAQ#How_about_Accessibility?))*

= Why shows my WordPress no update to 1.0.0.1? =
* **Reason:** I have relaunched the version numeration for Hyphenator version 1.0.0 so that it answers to the new version of the Hyphenator.js project. The downside is people using the previous version won't be notified due to the new versions 1.0.0 and 1.0.0.1. Sorry, I fizzled it.
* **Solution:** Try to install the new version manually. Maybe you have to delete the existing installation of Hyphenator first. An other option is to go to 'Edit' in 'Plugins' in Wordpress, select 'Hyphenator' and alter the version number into a minor one, 0.1 should work. Save and then WordPress will show you an Update for 'Hyphenator' you can install. Done.

== Screenshots ==
1. settings backend of version 4.0.0

== Changelog ==
= 5.1.5 (18.10.2015) =
* option "Do not hide content during hyphenation" is now activated by default
* completely rewrited main plugin file
** better performance
** option to hook script in `wp_footer()` instead of `wp_head()`
** script files' version the same as plugin's version if not using developer trunk
* cleaner settings plugin file and its output

= 5.1.0 (30.07.2015) =
* updated to Hyphenator.js 5.1.0
   * Added support for Romanian and Serbian cyrillic.
   * Better performance
   * Bugfixes
* added support for `donthyphenateclassname`
* added Polish translation

= 4.1.0 (29.10.2012) =
* updated to Hyphenator.js 4.1.0
   * faster pattern checking (async)
   * globally hide and unhide text by setting CSS classes (faster)
   * made Hyphenator.js ready for IE10
   * Added support for Esperanto, Estonian and Serbian latin
   * Bugfixes

= 4.0.0 (27.02.2012) =
* updated to Hyphenator.js 4.0.0
   * Faster: 30% less execution time
   * Added support for Slovak
   * Bugfixes
      * fixed issue with Copy in IE9
      * fixed errors caused by `<math>` and `<svg>` elements
      * correct language code for Norwegian Bokmål
* new default language option

= Older Versions =
* 0.0.7   (12.10.2008) - first version (released first as version 1.0)
* 0.0.8   (15.10.2008) - updated to Hyphenator.js v8 (beta)
* 0.0.81  (22.10.2008) - updated to Hyphenator.js v8_1 (beta)
* 0.0.91  (04.11.2008) - updated to Hyphenator.js v9_1 (beta)
* 0.1.0   (26.11.2008) - updated to Hyphenator.js v10 (beta)
* 0.1.1   (23.12.2008) - updated to Hyphenator.js v11 (beta)
* 0.1.2   (12.01.2009) - updated to Hyphenator.js v12 (beta)
* 1.0.0   (24.02.2009) - updated to Hyphenator.js 1.0.0, new version numbers and new backend
* 1.0.0.1 (25.02.2009) - fatal bug fixed
* 1.0.1   (03.03.2009) - updated to Hyphenator.js 1.0.1
* 1.0.2   (09.03.2009) - updated to Hyphenator.js 1.0.2
* 2.0.0   (15.03.2009) - updated to Hyphenator.js 2.0.0
* 2.0.0.1 (16.03.2009) - bug fixed
* 2.2.0   (08.05.2009) - updated to Hyphenator.js 2.2.0
* 2.2.0.1 (19.06.2009) - bug fixed
* 2.3.0   (15.07.2009) - updated to Hyphenator.js 2.3.0
* 2.3.1   (10.08.2009) - updated to Hyphenator.js 2.3.1
* 3.2.0   (31.12.2010) - updated to Hyphenator.js 3.2.0
* 3.3.0   (29.06.2011) - updated to Hyphenator.js 3.3.0
* 3.3.0.1 (03.07.2011) - fatal error fixed

== Upgrade Notice ==
= 5.1.0 =
Updated to the latest version of Hyphenator.js (5.1.0). Please check the settings for new languages. Added "donthyphenateclassname" option. Added Polish translation.

= 4.1.0 =
Updated to the latest version of Hyphenator.js (4.1.0). Please check the settings for new languages.

= 4.0.0 =
Updated to the latest version of Hyphenator.js (4.0.0) and small improvements. Please check the settings for new and updated features.

== Example ==
You can see a working example of Hyphenator.js [here](http://hyphenator.googlecode.com/svn/trunk/WorkingExample.html "Example of using Hyphenator.js").

== Thanks to ==
* Web Geek Science ([Web Hosting Geeks](http://webhostinggeeks.com/)) for the Romanian translation

== License ==
* Plugin licensed under GPLv3: Copyright (C) 2008-2012 Benedict B. alias e2b
* Hyphenator.js licensed under LGPLv3: Copyright (C) 2011 Mathias Nater, Zürich

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the [GNU General Public License](http://www.gnu.org/licenses/gpl.html "The GNU General Public License - GNU Project - Free Software Foundation (FSF)") for more details.

Some patterns in the pattern files have different licenses specified in the pattern files.

The custom header used in the Wordpress Plugin Directory is based on the image [Compositor by Stephen Hampshire](http://www.flickr.com/photos/stephenhampshire/3337704597/) and licensed under [Creative Commons Attribution 2.0](http://creativecommons.org/licenses/by/2.0/).
