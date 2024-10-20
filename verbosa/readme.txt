===Verbosa===

Contributors: Cryout Creations
Requires at least: 4.5
Tested up to: 6.6
Stable tag: 1.2.3.1
Requires PHP: 5.6
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Donate link: https://www.cryoutcreations.eu/donate/

Are you a writer? Or maybe a photographer? An artist? Perhaps you do online reviews? Or are you just casually blogging about music, movies and such? Do you like to ramble on? Are you a creator? Do you generate content of any kind? Are we asking too many questions? Is this too much? Have we crossed the line?

Well then you should give Verbosa a try as she may have all the tools needed to assist you and your creativity. Verbosa is all about elegant typography, efficient use of contrast, spacing and simplicity. We used all the tricks at our disposal to improve legibility, create emphasis and generate a proper design flow that would make your content more inviting to be read.

Verbosa is also truly responsive, with a fluid layout, uses microformats and microdata for best SEO results, takes great advantage of featured images, supports Google fonts, has social menus with over 100 social icons, is translation ready and RTL. And everything's editable via the customizer with over 100 options! And as an extra, we've coded in a fresh and exquisite perfume that will follow you everywhere once you install the theme!

Copyright 2016-2024 Cryout Creations
https://www.cryoutcreations.eu/

== License ==

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see http://www.gnu.org/copyleft/gpl.html


== Third Party Resources ==

Verbosa WordPress Theme bundles the following third-party resources:

HTML5Shiv, Copyright Alexander Farkas (aFarkas)
Dual licensed under the terms of the GPL v2 and MIT licenses
Source: https://github.com/aFarkas/html5shiv/

FitVids, Copyright Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
Licensed under the terms of the WTFPLlicense
Source: http://fitvidsjs.com/

== Bundled Fonts ==

IcoMoon-Free, Copyright Keyamoon
Licensed under the terms of the GPL license
Source: https://github.com/Keyamoon/IcoMoon-Free

Zocial CSS social buttons, Copyright Sam Collins
Licensed under the terms of the MIT license
Source: https://github.com/smcllns/css-social-buttons

Bootstrap Icons
Copyright The Bootstrap Authors
License: MIT license, https://opensource.org/licenses/MIT
Source: https://icons.getbootstrap.com/

== Bundled Images ==

The following bundled images are released into the public domain under Creative Commons CC0:
https://www.pexels.com/photo/person-holding-white-ceramic-coffee-cup-leaning-on-brown-wooden-table-179912/
https://pixabay.com/en/leave-typewriter-old-mechanically-705747/
https://pixabay.com/en/young-woman-girl-lady-female-work-791849/
https://pixabay.com/en/home-office-workstation-office-336378/

The images used in the screenshot are also released into the public domain under Creative Commons CC0:
https://pixabay.com/en/library-book-reading-computers-488677/
https://pixabay.com/en/typewriter-book-notebook-paper-801921/
https://pixabay.com/en/knowledge-book-library-glasses-1052010/
https://pixabay.com/en/leaves-books-color-coffee-cup-1076307/

The rest of the bundled images are created by Cryout Creations and released with the theme under GPLv3


== Changelog ==

= 1.2.3.1 =
*Release date - 18.09.2024*

* Fixed XSS vulnerability allowing the output of unsanitized user names set by rogue editors/contributors

= 1.2.3 =
*Release date - 2024.08.25*

* Added generated 'verbosa-accent-1/2' and 'verbosa-accent-1/2-bg' classnames and '--verbosa-accent-1/2' CSS variables for easy access to the main accent colors
* Added new social icons: AliPay, Apple, Behance, Bootstrap, Git, Gitlab, Google, Mastodon, Messenger, Microsoft, Teams, Person (simple, circle, square), QR Code, Rumble, Signal, Snapchat, Sourceforge, Substack, Telegram, Threads, Trello, Unity, Whatsapp, Xbox, and one that shall not be named
* Updated social icons: Twitter (X), Facebook, Github, Google Play, PayPal, Skype, Stripe, Steam, Spotify, Linkedin, Reddit, YouTube, WordPress. Old icons are still available by adding the '-old' suffix to the classnames.
* Improved socials animation to use the corresponding icon for the hover state
* Improved accessibility by fixing tab navigation in main menu
* Improved sidebar spacing after title/tagline when not all elements are used
* Improved theme defaults to make all default configurable texts translatable
* Fixed breadcrumbs appearance on RTL scripts
* Fixed mobile menu toggle/close buttons using the wrong color on iOS 15+
* Fixed comments markup displaying erroneous 'itemprop' due to functionality change in WordPress 6.3
* Fixed local fonts still being embedded as Google Fonts
* Tested with PHP 8.3
* Updated to Cryout Framework 0.8.6.5:
	* Updated rich text schema support for comments
	* Fixed whitespaces in font control title hint due to spaces in markup
	* Precognitively fixed erroneous white square in customize screen panels with Zynith SEO plugin

= 1.2.2 =
*Release date - 2022.06.25*

* Added option to use assigned menu's title on the frontend
* Added click-navigation to target panels in header content and site identity hints
* Added configuration hint for header image when the theme's slider / banner image is active on the homepage
* Improved submenu toggling support for placeholder items
* Fixed legacy layout page templates no longer working since 1.2.1
* Fixed stray strong tag in comments markup causing comments text to become bold
* Updated to Cryout Framework 0.8.6.3:
	* Improved PHP 8.0 compatibility
	* Expanded hint control styling to apply in the Site Identity panel

= 1.2.1.1 =
*Release date - 2021.01.06*

* Fixed a typo in frontend.js causing the mobile menu and other JS-dependent features to fail
* Fixed social icons intro animation on Chrome/Edge
* Improved dropdown toggle arrow positioning for long menu items in menu navigation and mobile menu
* Improved line wrapping for long menu items

= 1.2.1 =
*Release date - 2021.01.05*

* Fixed image pages broken since 1.2.0
* Fixed plural forms in comments count for more complex languages - https://codex.wordpress.org/I18n_for_WordPress_Developers#Plurals
* Fixed gallery block layout issue with Chrome/Edge
* Added 'verbosa_logo_width' and '..._height' filters for header image size
* Optimized JavaScript to clean jQuery deprecation notices since WordPress 5.6
* Updated to Cryout Framework 0.8.5.6:
	* Added echo parameters to cryout_schema_microdata() and cryout_font_select() functions
	* Changed custom post type label in breadcrumbs from singular_name to name
	* Improved JS code to remove jQuery deprecation notices since WordPress 5.6
	* Fixed issues with font families that contain multiple words
	* Fixed Select2 selectors no longer working with WordPress 5.6 on Firefox

= 1.2.0.1 =
*Release date - 2020.11.14*

* Improved list bullets/numbers alignment in content and on landing page text areas
* Improved translations format for archive and search titles in breadcrumbs
* Fixed meta icons missing since 1.2.0 due to styling overlap
* Updated Cryout Framework to 0.8.5.3:
	* Improved breadcrumbs compatibility with plugins that filter section titles and add HTML markup
	* Better cleaning of weights in font enqueues
	* Removed PHP and WP versions checks as these are now handled by WordPress

= 1.2.0 =
*Release date - 2020.10.22*

* Added meta options for layout control - page templates for controlling layout will be deprecated and removed in a future update
* Added 'verbosa_js_options' filter for JavaScript options
* Added WordPress 5.2 'wp_body_open' action call
* Added option to disable default pages navigation and improved mobile menu functionality to hide toggler when main navigation is empty
* Added support for both text domains used when translating with Loco Translate
* Added support for custom/local fonts
* Added outer #site-wrapper markup container
* Fixed incorrect layout being used when unsupported meta layout saved by other theme is found
* Fixed comments and page/category titles hiding options not working
* Fixed breadcrumbs partially hidden when hiding page/category titles
* Fixed plural forms in comments count for more complex languages - https://codex.wordpress.org/I18n_for_WordPress_Developers#Plurals
* Fixed erroneous breadcrumbs in bbPress forums/topics
* Fixed non-prefixed global variable in content.php
* Updated readme.txt and style.css headers for the current themes repository requirements
* Improved main navigation usability on tablets by adding the option to force the mobile menu activation
* Improved dark color schemes support for HTML select elements
* Improved handling of font weights
* Renamed content/author-bio.php file to content/user-bio.php to avoid name collision with WordPress' templating system
* Cleaned up and optimized frontend scripts
* Moved theme's styling enqueues from wp_head to wp_enqueue_scripts hook to improve child themes compatibility *** this will require updating the child theme if it uses the old hook
* Limited excerpt and 'more' filtering to frontend only
* Limited post meta display to default 'post' type only
* Removed Custom CSS option as requested by the WordPress TRT team - https://themes.trac.wordpress.org/ticket/78556#comment:11
* Removed options save/load functionality to comply with repository guidelines - https://themes.trac.wordpress.org/ticket/39841#comment:27
* Turned off 'not found' block on landing page when no content is available
* Code cleanup and sanitization improvements according to the theme sniffer rules
* Improved keyboard navigation accessibility:
	* Added focus support for post featured images
	* Improved mobile menu to add accessibility support
	* Improved keyboard navigation support
    * Moved screen readers skip link from menu to wp_body_open hook (before all content)
* Gutenberg editor tweaks and improvements:
	* Added styles for the new block horizontal separators
	* Added editor styles for the Gutenberg editor
	* Added support for theme colors and font sizes in the Gutenberg editor
	* Added wide image support
	* Fixed block embeds responsiveness conflict with Fitvids script
	* Fixed list margins improved general list appearance in blocks
	* Fixed margins on gallery blocks
	* Fixed caption alignment in blocks
	* Fixed cover block text styling
* Updated to Cryout Framework v0.8.5.2:
	* Added the ability to inherit the general font on all other font control options
	* Activated searchable select functionality using Select2 library on font selector controls
	* Switched enable/disable options to use the new toggle control
	* Switched number options to use the new number slider control
	* Fixed RTL issues with color controls, toggle controls, number slider
	* Fixed home icon missing link on WooCommerce sections
	* Fixed 'too few arguments' warning in breadcrumbs on some Polylang multi-lingual sites
	* Fixed color selector malfunction since WordPress 5.3
	* Additional sanitization and even more sanitization changes to comply with wp.org requirements
	* Removed theme news from the theme's management page

= 1.1.1 =
*Release date - 2018.10.28*

* Added styling to indicate current menu item
* Improved responsiveness of static slider caption on screens under 480px width
* Improved page SEO by making author bio tags H4 on posts and H1 on author sections
* Fixed featured images overflowing on WooCommerce single product pages
* Fixed site logo horizontal alignment
* Fixed typo in Google fonts processing breaking the use of manual fonts
* Updated to Cryout Framework 0.7.8.4
	* Added required PHP version check
	* Improved required WordPress version check

= 1.1.0 =
* Added auto-match for mailto: URL in social icons
* Added mobile menu close on click/tap functionality
* Added support for Polylang and WPML multi-language content for landing page elements
* Added all weight values for the typography options
* Added support for custom embedded fonts
* Added hints in the customizer interface for Site Identity / Header options
* Added shortcodes support in the custom footer text field
* Improved masonry initiation to check if function is available
* Improved 'comments moderated' text positioning
* Improved headings titles handing of custom post types and content
* Improved label hiding option to only apply to default comment form fields
* Improved content layout and responsiveness below 800px screen width
* Fixed breadrcumbs being partially cut off; moved breadcrumbs below section header on categories/archive/search result pages
* Fixed editor styling option not controlling enqueue
* Fixed large logo image overflowing available space
* Fixed description being displayed twice on attachment page
* Fixed search form on search/result section being cropped
* Fixed author avatar being cropped on author archives
* Fixed non-translatable strings in theme options
* Fixed CSS validation warnings due to empty color fields and invalid 'default' values
* Fixed cover+fixed background images zoomed incorrectly on Safari
* Fixed GDPR-related checkbox missing on comment form
* Fixed landing page content generation after first activation failing to retrieve available static pages in some cases
* Renamed some options for cross-theme documentation consistency
* Adjusted theme's body classes to all use prefix
* Adjusted customize sections and color options to match the other themes
* Updated to Cryout Framework v0.7.7
	* Framework: fixed invalid count() call in prototypes.php triggering warnings on PHP 7+

= 1.0.0 =
* Added landing page functionality (disabled by default) that features three text areas (which draw their content from pages) and a slider location
* Added a third widget area that is hidden on small mobile devices and made the existing two widget areas visible on mobile devices by default; renamed sidebar handler files
* Merged responsive styling into the theme's main style
* Improved content_width internal handling to take layouts into account (for better handling of embed media sizing)
* Changed the default magazine layout option to 2 columns
* Fixed footer widgets responsiveness when footer layout is set to more than one column
* Fixed search form using wrong colors in footer widgets
* Added social menu usage tutorial link
* Added styling to disable Chrome's built-in blue border on focused form elements
* Adjusted mobile menu to use the configured main menu colours
* Fixed mobile menu dropdown arrows slightly out of vertical centering
* Fixed image vertical alignment in main menu items
* Fixed search box submit not working (due to fix sidebar script)
* Updated Cryout Framework to 0.6.5
* Moved back-to-top button from sidebar to new 'after_footer_hook' to avoid intermittent overlapping issues with fixed sidebar

= 0.9.10 =
* Added compatibility option to disable Masonry
* Added compatibility option to disable 'defer' script loading
* Added compatibility option to disable FitVids on specific devices
* Fixed Masonry posts order on RTL
* Fixed (sub)menu arrow indicator position when submenu is open
* Fixed submenu animation hiccup with fixed sidebar
* Fixed responsive styling arranging footer widgets and above/below content widgets in two columns when it shouldn't
* Limited colophon width to the theme's configured width
* Several RTL improvements related to the fixed sidebar styling
* Updated Cryout Framework to 0.6.4

= 0.9.9 =
* Added alt attribute on featured images and header image
* Fixed naming inconsistencies in social icons classnames
* Added missing icon for audio post format
* Fixed default line height overriding configured line height
* Fixed sidebar scroll/positioning issue on certain content configurations
* Fixed sidebar slightly overlapping footer
* Fixed submenu arrow indicator misalignment in main menu
* Several customizer interface RTL fixes

= 0.9.8 =
* Fixed a typo in the styling and removed alt attribute from logo anchor
* Added menu walker to support social menu elements classes
* Improved fixed sidebar functionality to account for short content
* Fixed 1024px responsiveness limit out of sync between JS and CSS
* Fixed Google Fonts with weights merging
* Fixed automatic featured images from content not being grabbed
* Updated Cryout Framework to version 0.6.3

= 0.9.7 =
* Updated Cryout Framework to 0.6.1
* Updated comments functions to include multiple plural forms
* Updated comments query
* Added sticky sidebar feature
* Fixed menu bullets alignment
* Fixed horizontal rule (<hr> tag) not displaying
* Fixed author icon label
* Added structured markup data
* Implemented minor CSS changes: smaller default font sizes, extra margins to metas, site description, header image
* Fixed comments closed text only visible on posts
* Added hover effect to the featured bar
* Added links on post format icons
* Adjusted customizer panels for compatibility with WordPress 4.7
* Added Custom CSS hint for WordPress 4.7
* Moved Colors options section outside of General panel
* Added theme logo in the about theme section in customizer
* Merged author.php, tag.php, category.php into archive.php (and split author info to author-bio.php)
* Redesigned attachment.php as image.php
* Switched to using framework breadcrumbs
* Fixed Google fonts with weights and subsets simultaneous usage
* Added German translation

= 0.9.6 =
* Updated Cryout Framework to 0.5.7
* Restored proper order of theme panels/sections in the Customizer
* Renamed 'Graphics' customizer section to 'General'
* Relocated 'Socials' panel under 'General' and 'Custom Footer Text' under 'General' > 'Structure'
* Added load/save settings functionality
* Updated admin URLs
* Added site title as alt text for the WP logo
* Moved microdata function to framework
* Adjusted default content width to 1024px
* Switched to using proper textdomain function for the framework translations
* Added base font name to Google fonts enqueue (when custom weights are used)
* Fixed typo in Amazon social icon URL
* Updated mobile menu background color to use the sidebar background color setting
* Removed input[type="file"] styling
* Updated searchform.php to use labels (accessibility)
* Fixed search aspect on Safari
* Fixed Adsense issues
* Removed unused /resources/patterns folder

= 0.9.5 =
* Updated theme URL in style.css
* Updated feed URL
* Updated theme URL in footer
* Fixed "aside" post format icon layout

= 0.9.4 =
* Removed "Category page with intro" template

= 0.9.3 =
* Made all text in About Verbosa page translatable
* Removed default copyright text
* Removed front-page-post-form and food-and-drink style.css theme tags
* Removed inline CSS from verbosa_master_footer()

= 0.9.2 =
* Removed verbosa_socials_menu_preset() function
* Restored default customizer Colors section
* Removed constant from translation string (Customizer > About Verbosa)
* Added text from verbosa_master_footer() and Verbosa Page links to translation
* Replaced "get_category(get_query_var('cat')" with core "get_queried_ojbect"
* Removed HTML5Shiv from header.php
* Escaped all outputs in custom controls from customizer.php
* Escaped all URLs in theme with esc_url()
* Escaped get_bloginfo( 'name' ) and get_bloginfo( 'description' )
* Escaped all theme options output
* Updated verbosa.pot

= 0.9.1 =
* Fixed widget titles line not spanning all sidebar
* Added auto-detection of RSS link in social icons
* Added margin botton for multi-line socials menu
* Fixed mobile menu out of frame on narrow screen (<400px), horizontal scroll on chrome, removed .noscroll position:fixed
* Improved mobile menu animations
* Fixed colophon flex compatibility with IE9
* Removed template-blog.php page template, license.txt, bundled masonry.js
* Improved arhive.php to handle archives, categories and tags (removed category.php and tag.php)
* Updated Cryout Framework to 0.5.5
* Rearranged customizer section overrides to account for autofocus issue
* Improved plugin/child theme styling override support by changing #main ID to .main class
* Removed social links (and respective scripts) from the admin area
* Removed import/export settings from admin area
* Renamed 'Latest News' section in admin to 'Theme Updates'
* Added unminified resources/js/html5shiv.js
* Fixed cryout_schema_microdata() call in author info page HTML
* Renamed _default.pot to verbosa.pot
* Added WordPress 4.5 site logo support
* Added second textdomain support for WordPress' language packs (also deleted languages folder under cryout and removed redundant loading of text domains in admin area)
* Fixed social menu and turned off social menu locations by default
* Switched to loading JS files as deferred to improve load speed.
* Switched to using core WordPress 'jquery-masonry'
* Removed deprecated style.css tags and added new ones
* Fixed social icons placement options not refreshing in Customizer
* Fixed 'Display Site Title and Tagline' option not affecting the tagline

= 0.9 =
Initial release
