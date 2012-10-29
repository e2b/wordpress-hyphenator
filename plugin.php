<?php
/*
Plugin Name: Hyphenator
Version: 4.1.0
Plugin URI: http://wordpress.org/extend/plugins/hyphenator/
Description: Soft hyphens are automatically added in the content for a nicer automatic word wrap. Particularly suitable for justification. Uses <a href="http://code.google.com/p/hyphenator/">Hyphenator.js</a> 4.1.0.
Author: Benedict B.
*/

// Pre-2.6 compatibility
if (!defined('WP_PLUGIN_URL'))
   define('WP_PLUGIN_URL', site_url() . '/wp-content/plugins');

// detect the plugin path
$hyphenator_path = WP_PLUGIN_URL . "/hyphenator";

// detect options page
$hyphenator_options_page = site_url() . '/wp-admin/admin.php?page=hyphenator/options.php';

// add default options
add_option('hyphenator_version', '');
add_option('hyphenator_classname', 'hyphenate');
add_option('hyphenator_minwordlenght', '6');
add_option('hyphenator_languages', 'auto');
add_option('hyphenator_defaultlanguage', '');
add_option('hyphenator_addexceptions', '');
add_option('hyphenator_displaytogglebox', '');
add_option('hyphenator_hypenchar', '');
add_option('hyphenator_usetrunk', '');
add_option('hyphenator_intermediatestate', '');

// load gettext files
load_plugin_textdomain('hyphenator', PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)), dirname(plugin_basename(__FILE__)).'/languages/');


## Function: hyphenator_admin
add_action('admin_menu', 'hyphenator_admin');

function hyphenator_admin() {
	add_options_page(__('Hyphenator Options', 'hyphenator'), 'Hyphenator', 'manage_options', 'hyphenator/options.php'); // under "options"
}


### Function: hyphenator_header
add_action('wp_head', 'hyphenator_header');

function hyphenator_header() {
	// get values
	$hyphenator_classname = get_option('hyphenator_classname');
	$hyphenator_minwordlenght = get_option('hyphenator_minwordlenght');
	$hyphenator_languages = get_option('hyphenator_languages');
	$hyphenator_defaultlanguage = get_option('hyphenator_defaultlanguage');
	$hyphenator_addexceptions = get_option('hyphenator_addexceptions');
	$hyphenator_displaytogglebox = get_option('hyphenator_displaytogglebox');
	$hyphenator_hypenchar = get_option('hyphenator_hypenchar');
	$hyphenator_usetrunk = get_option('hyphenator_usetrunk');
	$hyphenator_intermediatestate = get_option('hyphenator_intermediatestate');

	// set js_path
	if ($hyphenator_usetrunk == 1) {
		$js_path = "http://hyphenator.googlecode.com/svn/trunk";
	} else {
		$js_path = $GLOBALS["hyphenator_path"];
	}

	// prepare header and print
	$hyphenatorHead = "\n\t<!-- Hyphenator for WordPress -->";
    $hyphenatorHead .= "\n\t<script src=\"{$js_path}/Hyphenator.js\" type=\"text/javascript\"></script>";

	if ($hyphenator_languages != 'auto' && $hyphenator_languages != '') {
		foreach ($hyphenator_languages as $hyphenator_languages_lang) {
			$hyphenatorHead .= "\n\t<script src=\"{$js_path}/patterns/{$hyphenator_languages_lang}.js\" type=\"text/javascript\"></script>";
		}
	}

	$hyphenatorHead .= "\n\t<script type=\"text/javascript\">";
	
	$hyphenatorHeadConfig = '';
	
	if ($hyphenator_minwordlenght != '' && $hyphenator_minwordlenght != 6) {
		$hyphenatorHeadConfig .= "\n\t\t\tminwordlength: {$hyphenator_minwordlenght},";
	}
	if ($hyphenator_hypenchar === '1') {
		$hyphenatorHeadConfig .= "\n\t\t\thyphenchar: '-',";
	}
	if ($hyphenator_classname != '') {
		$hyphenatorHeadConfig .= "\n\t\t\tclassname: '{$hyphenator_classname}',";
	}
	if ($hyphenator_displaytogglebox == '1') {
		$hyphenatorHeadConfig .= "\n\t\t\tdisplaytogglebox: true,";
	}
	if ($hyphenator_intermediatestate == '1') {
		$hyphenatorHeadConfig .= "\n\t\t\tintermediatestate: 'visible',";
	}
	if ($hyphenator_languages != "auto" && $hyphenator_languages != '') {
		$hyphenatorHeadConfig .= "\n\t\t\tremoteloading: false,";
	}
	if ($hyphenator_defaultlanguage != '') {
		$hyphenatorHeadConfig .= "\n\t\t\tdefaultlanguage: '{$hyphenator_defaultlanguage}',";
	}
	
	if ($hyphenatorHeadConfig != '') {
		$hyphenatorHead .= "\n\t\tHyphenator.config({" . substr($hyphenatorHeadConfig, 0, -1) . "\n\t\t});";
	}
	
	if ($hyphenator_addexceptions != '') {
		$hyphenatorHead .= "\n\t\tHyphenator.addExceptions('', '{$hyphenator_addexceptions}');";
	}
	
	$hyphenatorHead .= "\n\t\tHyphenator.run();";
	$hyphenatorHead .= "\n\t</script>";
	$hyphenatorHead .= "\n\n";
	
	print($hyphenatorHead);
}

// plugin definitions
define( 'FB_BASENAME', plugin_basename( __FILE__ ) );
define( 'FB_BASEFOLDER', plugin_basename( dirname( __FILE__ ) ) );
define( 'FB_FILENAME', str_replace( FB_BASEFOLDER.'/', '', plugin_basename(__FILE__) ) );


### Function: hyphenator_header
global $wp_version;

if (version_compare($wp_version, '2.8alpha', '>'))
	add_filter('plugin_row_meta', 'filter_plugin_meta', 10, 2 ); // only 2.8 and higher
add_filter('plugin_action_links', 'filter_plugin_meta', 10, 2 );

function filter_plugin_meta($links, $file) {
 
	/* create link */
	if ($file == plugin_basename(__FILE__)) {
		array_unshift(
			$links,
			sprintf('<a href="options-general.php?page=%s">%s</a>', 
			        'hyphenator/options.php', 
					__('Settings'))
		);
	}
 
	return $links;
}

?>
