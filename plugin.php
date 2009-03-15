<?php
/*
Plugin Name: Hyphenator
Version: 2.0.0
Plugin URI: http://www.bebl.eu/zeug/hyphenator
Description: Soft hyphen are automatically added in the content for nicer automatic word wrap. Particularly suitable for justification. Uses <a href="http://code.google.com/p/hyphenator/">Hyphenator.js</a> 2.0.0.
Author: Benedict B.
Author URI: http://www.bebl.eu/
*/

// detect the plugin path
$hyphenator_path = get_settings('siteurl'). "/wp-content/plugins/hyphenator";

// detect options page
$hyphenator_options_page = get_option('siteurl') . '/wp-admin/admin.php?page=hyphenator/options.php';

// add default options
add_option('hyphenator_classname', 'hyphenate');
add_option('hyphenator_minwordlenght', '6');
add_option('hyphenator_languages', 'auto');
add_option('hyphenator_addexceptions', '');
add_option('hyphenator_displaytogglebox', '');
add_option('hyphenator_hypenchar', '');
add_option('hyphenator_usetrunk', '');

// load gettext files
load_plugin_textdomain(hyphenator, PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)), dirname(plugin_basename(__FILE__)).'/languages/');


## Function: hyphenator_admin
add_action('admin_menu', 'hyphenator_admin');

function hyphenator_admin() {
	add_options_page(__('Hyphenator Options', 'hyphenator'), 'Hyphenator', 10, 'hyphenator/options.php'); // under "options"
}


### Function: hyphenator_header
add_action('wp_head', 'hyphenator_header');

function hyphenator_header() {
	// get values
	$hyphenator_classname = get_option('hyphenator_classname');
	$hyphenator_minwordlenght = get_option('hyphenator_minwordlenght');
	$hyphenator_languages = get_option('hyphenator_languages');
	$hyphenator_addexceptions = get_option('hyphenator_addexceptions');
	$hyphenator_displaytogglebox = get_option('hyphenator_displaytogglebox');
	$hyphenator_hypenchar = get_option('hyphenator_hypenchar');
	$hyphenator_usetrunk = get_option('hyphenator_usetrunk');

	// set js_path
	if ($hyphenator_usetrunk == 1) {
		$js_path = "http://hyphenator.googlecode.com/svn/trunk";
	} else {
		$js_path = $GLOBALS["hyphenator_path"];
	}

	// prepare header and print
	$hyphenatorHead = "\n\t<!-- hyphenator -->";
    $hyphenatorHead .= "\n\t<script src=\"{$js_path}/Hyphenator.js\" type=\"text/javascript\"></script>";

	if ($hyphenator_languages != auto && $hyphenator_languages != '') {
		foreach ($hyphenator_languages as $hyphenator_languages_lang) {
			$hyphenatorHead .= "\n\t<script src=\"{$js_path}/patterns/{$hyphenator_languages_lang}.js\" type=\"text/javascript\"></script>";
		}
	}

	$hyphenatorHead .= "\n\t<script type=\"text/javascript\">";
	if ($hyphenator_minwordlenght != '') {
		$hyphenatorHead .= "\n\t\tHyphenator.config({minwordlegth: {$hyphenator_minwordlenght}});";
	}
	if ($hyphenator_hypenchar === '1') {
		$hyphenatorHead .= "\n\t\tHyphenator.config({hyphenchar: '-'});";
	}
	if ($hyphenator_addexceptions != '') {
		$hyphenatorHead .= "\n\t\tHyphenator.addExceptions('', '{$hyphenator_addexceptions}');";
	}
	if ($hyphenator_classname != '') {
		$hyphenatorHead .= "\n\t\tHyphenator.config({classname: '{$hyphenator_classname}'});";
	}
	if ($hyphenator_displaytogglebox == '1') {
		$hyphenatorHead .= "\n\t\tHyphenator.config({displaytogglebox: true});";
	}
	if ($hyphenator_languages != "auto" && $hyphenator_languages != '') {
		$hyphenatorHead .= "\n\t\tHyphenator.config({remoteloading: false});";
	}
	$hyphenatorHead .= "\n\t\tHyphenator.run();";
	$hyphenatorHead .= "\n\t</script>";
	$hyphenatorHead .= "\n";
	
	print($hyphenatorHead);
}

?>
