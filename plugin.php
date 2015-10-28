<?php
/*
Plugin Name: Hyphenator
Version: 5.1.5
Plugin URI: http://wordpress.org/extend/plugins/hyphenator/
Description: Soft hyphens are automatically added in the content for a nicer automatic word wrap. Particularly suitable for justification. Uses <a href="http://code.google.com/p/hyphenator/">Hyphenator.js</a>.
Author: Benedict B., Maciej Gryniuk
Text Domain: hyphenator
Domain Path: /languages/
*/

// Pre-2.6 compatibility
if ( ! defined( 'WP_PLUGIN_URL' ) )
   define( 'WP_PLUGIN_URL', site_url() .'/wp-content/plugins' );

// load gettext files
load_plugin_textdomain( 'hyphenator', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );

// add default options
add_option( 'hyphenator_version', '' );
add_option( 'hyphenator_scripthook', 'wp_head' );
add_option( 'hyphenator_classname', 'hyphenate' );
add_option( 'hyphenator_donthyphenateclassname', 'donthyphenate' );
add_option( 'hyphenator_minwordlenght', '6' );
add_option( 'hyphenator_languages', 'auto' );
add_option( 'hyphenator_defaultlanguage', '' );
add_option( 'hyphenator_addexceptions', '' );
add_option( 'hyphenator_displaytogglebox', '' );
add_option( 'hyphenator_hypenchar', '' );
add_option( 'hyphenator_usetrunk', '' );
add_option( 'hyphenator_intermediatestate', '1' );

if ( is_admin() ) {

	function hyphenator_init() {
		// detect options page
		$hyphenator_options_page = site_url() .'/wp-admin/options-general.php?page=hyphenator';

		require_once ( plugin_dir_path( __FILE__ ) .'options.php' );
	}

	function hyphenator_admin() {
		add_options_page( __( 'Hyphenator Options', 'hyphenator' ), 'Hyphenator', 'manage_options', 'hyphenator', 'hyphenator_init' ); // under "options"
	}

	add_action( 'admin_menu', 'hyphenator_admin' );

	// plugin definitions
	define( 'FB_BASENAME', plugin_basename( __FILE__ ) );
	define( 'FB_BASEFOLDER', plugin_basename( dirname( __FILE__ ) ) );
	define( 'FB_FILENAME', str_replace( FB_BASEFOLDER .'/', '', plugin_basename( __FILE__ ) ) );

	### Function: hyphenator_header
	global $wp_version;

	if ( version_compare( $wp_version, '2.8alpha', '>' ) )
		add_filter( 'plugin_row_meta', 'filter_plugin_meta', 10, 2 ); // only 2.8 and higher

	add_filter( 'plugin_action_links', 'filter_plugin_meta', 10, 2 );

	function filter_plugin_meta( $links, $file ) {
		/* create link */
		if ( $file == plugin_basename( __FILE__ ) ) {
			array_unshift(
				$links,
				'<a href="options-general.php?page=hyphenator">'. __( 'Settings' ) .'</a>'
			);
		}

		return $links;
	}

} else {

	function hyphenator_scripts() {
		$hyphenator_scripthook = get_option( 'hyphenator_scripthook' );
		$hyphenator_usetrunk = get_option( 'hyphenator_usetrunk' );
		$hyphenator_languages = get_option( 'hyphenator_languages' );

		// set js_path
		if ( $hyphenator_usetrunk == 1 ) {
			$js_path = 'http://hyphenator.googlecode.com/svn/trunk';
			$ver = false;
		} else {
			$js_path = WP_PLUGIN_URL .'/hyphenator';
			$ver = get_option( 'hyphenator_version' );
		}

		wp_enqueue_script( 'hyphenator', $js_path . '/Hyphenator.js', array(), $ver, ( $hyphenator_scripthook == 'wp_footer' ) );

		if ( $hyphenator_languages != 'auto' && ! empty( $hyphenator_languages ) ) {
			foreach ( $hyphenator_languages as $hyphenator_languages_lang ) {
				wp_enqueue_script( 'hyphenator-'. $hyphenator_languages_lang, $js_path .'/patterns/'. $hyphenator_languages_lang .'.js', array( 'hyphenator' ), $ver, ( $hyphenator_scripthook == 'wp_footer' ) );
			}
		}
	}

	function hyphenator_hook() {
		if ( wp_script_is( 'hyphenator', 'done' ) ) { 
			// get values
			$hyphenator_classname = get_option( 'hyphenator_classname' );
			$hyphenator_donthyphenateclassname = get_option( 'hyphenator_donthyphenateclassname' );
			$hyphenator_minwordlenght = get_option( 'hyphenator_minwordlenght' );
			$hyphenator_languages = get_option( 'hyphenator_languages' );
			$hyphenator_defaultlanguage = get_option( 'hyphenator_defaultlanguage' );
			$hyphenator_addexceptions = get_option( 'hyphenator_addexceptions' );
			$hyphenator_displaytogglebox = get_option( 'hyphenator_displaytogglebox' );
			$hyphenator_hypenchar = get_option( 'hyphenator_hypenchar' );
			$hyphenator_intermediatestate = get_option( 'hyphenator_intermediatestate' );

			$hyphenatorConfig = array();

			if ( ! empty( $hyphenator_minwordlenght ) && $hyphenator_minwordlenght != 6 )
				$hyphenatorConfig['minwordlength'] = (int) $hyphenator_minwordlenght;

			if ( $hyphenator_hypenchar === '1' )
				$hyphenatorConfig['hyphenchar'] = '-';

			if ( ! empty( $hyphenator_classname ) && $hyphenator_classname != 'hyphenate' )
				$hyphenatorConfig['classname'] = $hyphenator_classname;

			if ( ! empty( $hyphenator_donthyphenateclassname ) && $hyphenator_donthyphenateclassname != 'donthyphenate' )
				$hyphenatorConfig['donthyphenateclassname'] = $hyphenator_donthyphenateclassname;

			if ( $hyphenator_displaytogglebox == '1' )
				$hyphenatorConfig['displaytogglebox'] = true;

			if ( $hyphenator_intermediatestate == '1' )
				$hyphenatorConfig['intermediatestate'] = 'visible';

			if ( $hyphenator_languages != "auto" && ! empty( $hyphenator_languages ) )
				$hyphenatorConfig['remoteloading'] = false;

			if ( ! empty( $hyphenator_defaultlanguage ) )
				$hyphenatorConfig['defaultlanguage'] = $hyphenator_defaultlanguage;

			$hyphenatorExceptions = ( ! empty( $hyphenator_addexceptions ) ? "Hyphenator.addExceptions( '', '{$hyphenator_addexceptions}' );\n\t" : '' )
		?>
<script type="text/javascript">
	Hyphenator.config( <?php echo json_encode( $hyphenatorConfig ); ?> );
	<?php echo $hyphenatorExceptions; ?>
Hyphenator.run();
</script>
<?php
		}
	}

	add_action( 'wp_enqueue_scripts', 'hyphenator_scripts' );
	add_action( get_option( 'hyphenator_scripthook' ), 'hyphenator_hook', 100 );
}
?>