<?php
// list of available languages
$hyphenator_langindex = array(
	"be" => "Беларуская (Belarusian)",
	"bn" => "বাংলা (Bengali)",
	"ca" => "Català (Catalan)",
	"cs" => "Česky (Czech)",
	"da" => "Dansk (Danish)",
	"de" => "Deutsch (German)",
	"el-monoton" => "Ελληνική monotone (monotone greek)",
	"el-polyton" => "Ελληνική polytone (polytone greek)",
	"en-gb" => "British English (en-gb)",
	"en-us" => "American English (en-us/en)",
	"eo" => "Esperanto (Esperanto)",
	"es" => "Español (Spanish)",
	"et" => "Eesti (Estonian)",
	"fi" => "Suomi (Finnish)",
	"fr" => "Français (French)",
	"grc" => "Ελληνική ancient (ancient greek)",
	"gu" => "ગુજરાતી (Gujarati)",
	"hi" => "हिंदी (Hindi)",
	"hu" => "Magyar (Hungarian)",
	"hy" => "Հայերեն լեզու (Armenian)",
	"it" => "Italiano (Italian)",
	"ka" => "ಕನ್ನಡ (Kannada)",
	"la" => "Latina (Latin)",
	"lt" => "Lietuvių (Lithuanian)",
	"lv" => "latviešu valoda (Latvian)",
	"ml" => "മലയാളം (Malayalam)",
	"nl" => "Nederlands (Dutch)",
	"nb-no" => "Norsk (Norwegian)",
	"or" => "ଓଡ଼ିଆ (Oriya)",
	"pa" => "ਪੰਜਾਬੀ (Punjabi)",
	"pl" => "Polski (Polish)",
	"pt" => "Português (Portuguese)",
	"ro" => "Român (Romanian)",
	"ru" => "Pyccĸий (Russian)",
	"sk" => "Slovenčina (Slovak)",
	"sl" => "Slovenščina (Slovenian)",
	"sr-cyrl" => "Српска ћирилица (Serbian, Cyrillic)",
	"sr-latn" => "Srpski (Serbian, Latin script)",
	"sv" => "Svenska (Swedish)",
	"ta" => "தமிழ் (Tamil)",
	"te" => "తెలుగు (Telugu)",
	"tr" => "Türkçe (Turkish)",
	"uk" => "Українська (Ukrainian)"
);

// list of option names (without "languages' )
$hyphenator_options = array( 'scripthook', 'classname', 'donthyphenateclassname', 'minwordlenght', 'defaultlanguage', 'addexceptions', 'displaytogglebox', 'hypenchar', 'usetrunk', 'intermediatestate' );

// get current plugin version
function hyphenator_version() {
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH .'wp-admin/includes/plugin.php' );

	$plugin_folder = get_plugins( '/hyphenator' );
	return $plugin_folder['plugin.php']['Version'];
}

// update options on version updates
function hyphenator_update() {
	switch ( get_option( 'hyphenator_version' ) ) {
		case '': // previous version <= 3.2.0 (test function exists since 3.3.0)
			// option 'en' -> 'en-us'
			$array = get_option( 'hyphenator_languages' );
			if ( is_array( $array ) && ( ( $key = array_search( 'en', $array ) ) !== false ) ) {
				unset( $array[$key] );
				if ( ! in_array( 'en-us', $array ) ) {
					$array[$key] = 'en-us';
				}
				update_option( 'hyphenator_languages', array_values( $array ) );
			}

		case '3.3.0':
		case '3.3.0.1':
			// option 'no-nb' -> 'nb-no'
			$array = get_option( 'hyphenator_languages' );
			if ( is_array( $array ) && ( ( $key = array_search( 'no-nb', $array ) ) !== false) ) {
				$array[$key] = 'nb-no';
				update_option( 'hyphenator_languages', array_values( $array ) );
			}

			// automatically set new default language option if only one language is used
			$hyphenator_languages = get_option( 'hyphenator_languages' );
			if ( $hyphenator_languages != 'auto' && count( $hyphenator_languages ) == 1 ) {
				update_option( 'hyphenator_defaultlanguage', $hyphenator_languages[0] );
			}
	}
}

// check for fixes because of version updates
if ( get_option( 'hyphenator_version' ) != hyphenator_version() ) {
	hyphenator_update();
	update_option( 'hyphenator_version', hyphenator_version() );
}

// check for admin options submission and update options
if ( isset( $_POST['stage'] ) && 'process' == $_POST['stage'] ) {
	foreach ( $hyphenator_options as $opt ) {
		$new_value = ( isset( $_POST['hyphenator_' . $opt] ) ? trim( $_POST['hyphenator_' . $opt] ) : '' );

		update_option( 'hyphenator_' . $opt, $new_value );
	}

	if ( $_POST['hyphenator_lang'] != 'auto' ) {
		$deflang_is_manual = false;

		foreach ( $hyphenator_langindex as $lang => $language ) {
			if ( isset( $_POST['hyphenator_lang_' . $lang] ) && $_POST['hyphenator_lang_' . $lang] == 1 ) {
				$hyphenator_setlang[] = $lang;
				if ( $lang == $_POST['hyphenator_defaultlanguage'] )
					$deflang_is_manual = true;
			}
		}

		if ( ! $deflang_is_manual )
			$hyphenator_setlang[] = $_POST['hyphenator_defaultlanguage'];

		update_option( 'hyphenator_languages', $hyphenator_setlang );
	} else {
		update_option( 'hyphenator_languages', 'auto' );
	}
}

// get values
foreach ( $hyphenator_options as $opt ) {
	$hyphenator_[$opt] = htmlspecialchars( get_option( 'hyphenator_' . $opt ) );
}
$hyphenator_['languages'] = get_option( 'hyphenator_languages' );

?>

<style type="text/css">
fieldset { border: 0 none transparent; padding-left: 1px; }
label { font-weight: bold; }
ul#hyplang label, ul#hypdefl label { vertical-align: inherit; }
ul#hyplang ul, ul#hypdefl ul { margin-top: 0.5em; display: inline-block; vertical-align: top; padding: 0.5em 1em 1em; }
ul#hypdefl { margin-top: 0; }
ul#hyplang h5 { margin: 0; display: inline-block; font-size: 1em; }
p { text-align: justify; }
input + p, select + p, textarea + p { margin-top: 0.1em; }
p input { margin-left: 0; }
h4 { font-size: 1.1em; font-weight: bold; }
h3, h4 { margin-bottom: 0.2em; }
</style>

<script type="text/javascript">
// jQuery.noConflict();
function DisableLanguageCheckboxes() {
	jQuery( '#hyplang ul li input' ).attr( 'disabled', 'disabled' );
	jQuery( '#hyplang ul li label' ).css( 'color", "#666666' );
}
function RestoreLanguageCheckboxes() {
	jQuery( '#hyplang ul li input' ).removeAttr( 'disabled' );
	jQuery( '#hyplang ul li label' ).css( 'color", "inherit' );
}
jQuery( document ).ready( function() {
<?php if ( $hyphenator_['languages'] == 'auto' ) echo 'DisableLanguageCheckboxes();\n'; ?>
	jQuery( '#hyplang li input:first' ).click( DisableLanguageCheckboxes );
	jQuery( '#hyplang li input:eq(1)' ).click( RestoreLanguageCheckboxes );
	jQuery( '#hyplang ul li:has(input) label' ).click( function() {
		jQuery( '#hyplang li input:first, #hyplang li input:eq(1)' ).attr( 'checked', 'checked' );
		RestoreLanguageCheckboxes();
	});
});
</script>

<div class="wrap">
	<h1><?php _e( 'Hyphenator Options', 'hyphenator' ) ?></h1>

	<h2><?php _e( 'Introduction', 'hyphenator' ) ?></h2>
	<img src="<?php echo WP_PLUGIN_URL; ?>/hyphenator/logo.png" alt="" title="Logo" style="float: right;" />
	<p><?php _e( 'Hyphenator automatically inserts separators in the content, so that at the end of line the text is wrapped with a dash if applicable. Hyphenator.js, a JavaScript available under the terms of LGPL v3, is used. It fields the algorithm known from OpenOffice and LaTeX. As this is executed on client side, it adapts itself to the respective browser environment and thus avoids a faulty display. The script is particularly suitable for justification and supports a variety of languages.', 'hyphenator' ) ?></p>
	<p><?php _e( 'Supported browsers: Mozilla Firefox since version 3, Opera since version 7.10, Internet Explorer since version 6.0, Apple Safari since version 2 and any other browser supporting <strong>&amp;shy;</strong> as well as JavaScript.', 'hyphenator' ) ?></p>

	<h2><?php _e( 'Configuration', 'hyphenator' ) ?></h2>
	<p><?php _e( 'Hyphenator can only be adapted to an HTML class. It is therefore imperatively necessary that the content which should be filtered already has its own class in the source code of the page, otherwise such class should be added at the page design. Mostly, however, an appropriate class already exists and can be directly used. Unfortunately, it is necessary that you are able to read HTML. Otherwise, the only possibility is to give the often used class names "post", "entry" and "content" a try.', 'hyphenator' ) ?></p>
	<p><?php _e( 'Moreover, it is important for the filtered elements that a language is defined in the HTML code. This can also be specified by a parent element. Only then Hyphenator knows what language filter must be applied. Fortunately, this is very often defined in the design.', 'hyphenator' ) ?></p>
	<p><?php _e( 'Should there be questions regarding the right class name or the setting of the language attribute, it can be simply asked at the WordPress Forums.', 'hyphenator' ) ?></p>

	<form name="form1" method="post" action="<?php echo $hyphenator_options_page; ?>&amp;updated=true">
		<input type="hidden" name="stage" value="process" />

		<h3><?php _e( 'General', 'hyphenator' ) ?></h3>

		<h4><label for="opt10"><?php _e( 'Script hook', 'hyphenator' ) ?></label></h4>
		<select id="opt10" name="hyphenator_scripthook">
			<option value="wp_head" <?php selected( $hyphenator_['scripthook'], 'wp_head' ); ?>>wp_head()</option>
			<option value="wp_footer" <?php selected( $hyphenator_['scripthook'], 'wp_footer' ); ?>>wp_footer()</option>
		</select>
		<p><small><?php _e( 'Default', 'hyphenator' ); ?>: wp_head()</small></p>
    
		<h4><label for="opt1"><?php _e( 'Class name of content to hyphenate', 'hyphenator' ) ?></label></h4>
		<input id="opt1" name="hyphenator_classname" type="text" size="10" value="<?php echo $hyphenator_['classname'] ?>" />
		<p><small><?php _e( 'Default', 'hyphenator' ); ?>: hyphenate</small></p>
    
		<h4><label for="opt9"><?php _e( 'Class name of content to do NOT hyphenate', 'hyphenator' ) ?></label></h4>
		<input id="opt9" name="hyphenator_donthyphenateclassname" type="text" size="13" value="<?php echo $hyphenator_['donthyphenateclassname'] ?>" />
		<p><small><?php _e( 'Default', 'hyphenator' ); ?>: donthyphenate</small></p>
		
		<h4><label for="opt2"><?php _e( 'Minimal length of words', 'hyphenator' ) ?></label></h4>
		<input id="opt2" name="hyphenator_minwordlenght" type="number" size="10" value="<?php echo $hyphenator_['minwordlenght'] ?>" />
		<p><small><?php _e( 'Default', 'hyphenator' ); ?>: 6</small></p>

		<fieldset>
    		<h4><legend><?php _e( 'Filtered languages', 'hyphenator' ) ?></legend></h4>
			<ul id="hyplang">
				<li>
					<input id="lang1" type="radio" name="hyphenator_lang" value="auto" <?php checked( ! is_array( $hyphenator_['languages'] ) && $hyphenator_['languages'] == 'auto' ); ?> />
					<h5><label for="lang1"><?php _e( 'Automatic', 'hyphenator' ) ?></label></h5>
					<small>(<?php _e( 'default', 'hyphenator' ) ?>)</small>
				</li>
				<li>
					<div>
						<input id="lang2" type="radio" name="hyphenator_lang" value="manual" <?php checked( is_array( $hyphenator_['languages'] ) ); ?> />
						<h5><label for="lang2"><?php _e( 'Manual', 'hyphenator' ) ?></label></h5>
						<small>(<?php _e( 'faster', 'hyphenator' ) ?>)</small>
					</div>
					<ul>
<?php
	$i = 0;
	$count = ceil( count( $hyphenator_langindex ) / 2 );
	foreach ( $hyphenator_langindex as $lang => $language ) {
		if ( $i % $count == 0 && $i != 0 )
			echo '</ul><ul>';

		echo '<li><input id="lang_'. $lang .'" name="hyphenator_lang_'. $lang .'" type="checkbox" value="1" '. checked( is_array( $hyphenator_['languages'] ) && in_array( $lang, $hyphenator_['languages'] ), true, false ) .'/><label for="lang_'. $lang .'" title="patterns/'. $lang .'.js\">'. $language .'</label></li>';

		++$i;
	}
    	?>
					</ul>
				</li>
			</ul>
		</fieldset>

		<fieldset>
			<h4><legend><?php _e( 'Default language', 'hyphenator' ) ?></legend></h4>
			<small>(<?php _e( 'Used in case no lang-attribute could be found', 'hyphenator' ) ?>)</small>
			<ul id="hypdefl">
				<li>
					<ul>
<?php
	$i = 0;
	$count = ceil( count( $hyphenator_langindex ) / 2 );
	foreach ( $hyphenator_langindex as $lang => $language ) {
		if ( $i % $count == 0 && $i != 0 )
			echo '</ul><ul>';

		echo '<li><input id="deflang_'. $lang .'" name="hyphenator_defaultlanguage" type="radio" value="'. $lang .'" '. checked( $hyphenator_['defaultlanguage'], $lang, false ) .'/><label for="deflang_'. $lang .'" title="patterns/'. $lang .'.js\">'. $language .'</label></li>';

		++$i;
	}
?>
					</ul>
				</li>
			</ul>
		</fieldset>

		<h4><label for="opt4"><?php _e( 'Exceptions', 'hyphenator' ); ?></label></h4>
		<textarea id="opt4" name="hyphenator_addexceptions" cols="70" rows="3"><?php echo $hyphenator_['addexceptions'] ?></textarea>
		<p>
			<small><?php _e( 'Example', 'hyphenator' ); ?>: <strong>WordPress, Be-ne-dict</strong> (<?php _e( 'WordPress will never be devided, Benedict only on the given positions', 'hyphenator' ); ?>)<br />
			<?php echo __( 'Default', 'hyphenator' ) .': '. __( 'none', 'hyphenator' ); ?></small>
		</p>

		<h3><?php _e( 'Optional', 'hyphenator' ) ?></h3>
	
		<h4><label for="opt5"><?php _e( 'Display an on-off switch', 'hyphenator' ); ?></label></h4>
		<p>
			<input id="opt5" name="hyphenator_displaytogglebox" type="checkbox" value="1" <?php checked( $hyphenator_['displaytogglebox'] ); ?> />
			<small><?php _e( 'Default', 'hyphenator' ); echo ": "; _e( 'no', 'hyphenator' ); ?></small>
		</p>

		<h4><label for="opt6"><?php _e( 'Display each hyphen character for testing', 'hyphenator' ) ?></label></h4>
		<p>
			<input id="opt6" name="hyphenator_hypenchar" type="checkbox" value="1"  <?php checked( $hyphenator_['hypenchar'] ); ?> />
			<small><?php _e( 'Default', 'hyphenator' ); echo ": "; _e( 'no', 'hyphenator' ); ?></small>
		</p>

		<h4><label for="opt7"><?php _e( 'Use Hyphenator.js from developer trunk', 'hyphenator' ) ?></label></h4>
		<p>
			<input id="opt7" name="hyphenator_usetrunk" type="checkbox" value="1"  <?php checked( $hyphenator_['usetrunk'] ); ?> />
			<small><?php echo __( 'Default', 'hyphenator' ) .': '. __( 'no', 'hyphenator' ) .' ('. __( 'security risk', 'hyphenator' ) .')'; ?></small>
		</p>

   	<h4><label for="opt8"><?php _e( 'Do not hide content during hyphenation', 'hyphenator' ) ?></label></h4>
		<p>
			<input id="opt8" name="hyphenator_intermediatestate" type="checkbox" value="1" <?php checked( $hyphenator_['intermediatestate'] ); ?> />
			<small><?php echo __( 'Default', 'hyphenator' ) .': '. __( 'yes', 'hyphenator' ); ?></small>
		</p>

		<p class="submit">
			<input type="submit" name="Submit" id="submit" class="button button-primary" value="<?php _e( 'Save Changes', 'hyphenator' ) ?>" />
		</p>
	</form>

	<h2><?php _e( 'And now?', 'hyphenator' ) ?></h2>
	<p><?php _e( "That's all. If you like the plugin, then recommend Hyphenator to your friends.", 'hyphenator' ) ?></p>
</div>