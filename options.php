<?php
// list of available languages
$hyphenator_langindex = array(
	"en" => "English",
	"de" => "Deutsch",
	"fr" => "Français",
	"es" => "Español",
	"it" => "Italiano",
	"nl" => "Nederlands",
	"da" => "dansk",
	"fi" => "suomi",
	"sv" => "svenska",
	"pl" => "polski",
	"ru" => "русский язык",
	"bn" => "বাংলা",
	"ka" => "ქართული",
	"ml" => "മലയാളം",
	"gu" => "ગુજરાતી",
	"hi" => "हिन्दी",
	"or" => "ଓଡ଼ିଆ",
	"pa" => "ਪੰਜਾਬੀ",
	"ta" => "தமிழ்",
	"te" => "తెలుగు"
);

// list of option names (without "languages")
$hyphenator_options = array("classname", "minwordlenght", "addexceptions", "displaytogglebox", "hypenchar", "usetrunk");

// check for admin options submission and update options
if ('process' == $_POST['stage']) {
	foreach ($hyphenator_options as $opt) {
		update_option('hyphenator_' . $opt, trim($_POST['hyphenator_' . $opt]));
	}
	
	if ($_POST['hyphenator_lang'] != "auto") {
		foreach ($hyphenator_langindex as $lang => $language) {
			if ($_POST['hyphenator_lang_' . $lang] == 1) {
				$hyphenator_setlang[] =  $lang;
			}
		}
		update_option('hyphenator_languages', $hyphenator_setlang);
	} else {
		update_option('hyphenator_languages', 'auto');
	}
}

// get values
foreach ($hyphenator_options as $opt) {
	$hyphenator_[$opt] = htmlspecialchars(get_option('hyphenator_' . $opt));
}
$hyphenator_['languages'] = get_option('hyphenator_languages');

// load gettext files
load_plugin_textdomain(hyphenator, PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)), dirname(plugin_basename(__FILE__)).'/languages/');
?>

<style type="text/css">
fieldset { border: 0 none transparent; }
label, legend { font-weight: bold; display: block; margin-bottom: 0.3em; margin-left: 0.7em; clear: both; }
ul#hyplang label { display: inline; margin: 0; }
ul#hyplang ul { margin-left: 1.7em; margin-top: 0.2em; padding-bottom: 1em; float: left; }
p, input, textarea { margin-left: 1.5em; }
form p { margin-top: 0.1em; }
p input { margin-left: 0; }
h4 { font-size: 1.1em; font-weight: bold; }
h3, h4 { margin-bottom: 0.2em; }
p.moo { font-family: Georgia, Palatino, Palatino Linotype, Times, Times New Roman, serif; font-style: italic; color: #CCCCCC; text-align: center; line-height: 2em; border-top: 1px solid #CCCCCC; witdh: 90%; margin: 1.3em 0 0; }
</style>

<script type="text/javascript">
// jQuery.noConflict();
function DisableLanguageCheckboxes() {
	jQuery("#hyplang ul li input").attr('disabled', 'disabled');
	jQuery("#hyplang ul li label").css("color", "#666666");
}
function RestoreLanguageCheckboxes() {
	jQuery("#hyplang ul li input").removeAttr("disabled");
	jQuery("#hyplang ul li label").css("color", "inherit");
}
jQuery(document).ready(function() {
<?php if ($hyphenator_['languages'] == 'auto') echo "DisableLanguageCheckboxes();\n"; ?>
	jQuery("#hyplang li input:first").click(DisableLanguageCheckboxes);
	jQuery("#hyplang li input:eq(1)").click(RestoreLanguageCheckboxes);
	jQuery("#hyplang ul li:has(input) label").click(function() {
		jQuery("#hyplang li input:first, #hyplang li input:eq(1)").attr('checked', 'checked');
		RestoreLanguageCheckboxes();
	});
});
</script>

<div class="wrap">
  <h2><?php _e('Hyphenator Options', 'hyphenator') ?></h2>
  
  
  <h3><?php _e('Introduction', 'hyphenator') ?></h3>
  <img src="<?php echo $hyphenator_path ?>/logo.png" alt="" title="Logo" style="float: right;" />
  <p><?php _e("Hyphenator automatically inserts seperators in the content, so that at the end of line the text is wrapped with a dash if applicable. Hyphenator.js, a JavaScript available under the terms of GPL3, is used. It fields the algorithm known from OpenOffice and LaTeX. As this is executed client-sidedly, it adapts itself to the respective browser environment and thus avoids a faulty display. The script is particularly suitable for justification and supports a variety of languages.", 'hyphenator') ?></p>
  <p><?php _e("Supported browsers: Mozilla Firefox since version 3, Opera since version 7.10, Internet Explorer since version 6.0, Apple Safari since version 2 and any other browser supporting &amp;shy; as well as JavaScript.", 'hyphenator') ?></p>
  
  <h3><?php _e('Configuration', 'hyphenator') ?></h3>
  <p><?php _e("Hyphenator can only be adapted to an HTML class. It is therefore imperatively necessary that the content which should be filtered already has its own class in the source code of the page, otherwise such class should be adde at the page design. Mostly, however, an appropriate class already exists and can be directly used. Unfortunately, it is necessary that you are able to read HTML. Otherwise, the only possibility is to give the often used class names \"post\", \"entry\" and \"content\" a try.", 'hyphenator') ?></p>
  <p><?php _e("Moreover, it is important for the filtered elements that a language is defined in the HTML code. This can also be specified by a parent element. Only then Hyphenator knows what language filter must be applied. Fortunately, this is very often defined in the design.", 'hyphenator') ?></p>
  <p><?php _e("Should there be questions regarding the right class name or the setting of the language attribute, it can be simply asked at the WordPress Forums.", 'hyphenator') ?></p>
  
  
  <form name="form1" method="post" action="<?php echo $hyphenator_options_page ?>&amp;updated=true">
	<input type="hidden" name="stage" value="process" />
    
    <label for="opt1"><?php _e('class name of content to hyphenate', 'hyphenator') ?></label>
     <input id="opt1" name="hyphenator_classname" type="text" size="10" value="<?php echo $hyphenator_['classname'] ?>" />
     <p><small><?php _e('default', 'hyphenator'); echo ": hyphenate" ?></small></p>
     
    <label for="opt2"><?php _e('minimal length of words', 'hyphenator') ?></label>
     <input id="opt2" name="hyphenator_minwordlenght" type="text" size="10" value="<?php echo $hyphenator_['minwordlenght'] ?>" />
     <p><small><?php _e('default', 'hyphenator'); echo ": 6"; ?></small></p>
   
   
    <fieldset>
    <legend><?php _e('filtered languages', 'hyphenator') ?></legend>
     <ul id="hyplang">
      <li><input id="lang1" type="radio" name="hyphenator_lang" value="auto" <?php if ($hyphenator_['languages'] == 'auto') echo "checked=\"checked\"" ?> /> <label for="lang1"><?php _e('automatic', 'hyphenator') ?></label> <small>(<?php _e('default', 'hyphenator') ?>)</small></li>
      <li><input id="lang2" type="radio" name="hyphenator_lang" value="manual" <?php if ($hyphenator_['languages'] != 'auto') echo "checked=\"checked\"" ?> /> <label for="lang2"><?php _e('manual', 'hyphenator') ?></label> <small>(<?php _e('faster', 'hyphenator') ?>)</small>
       <ul>
<?php
	    $i = 0;
	    foreach ($hyphenator_langindex as $lang => $language) {
	    	if ($i % 4 == 0 && $i != 0) {
	    		echo "       </ul>\n       <ul>\n";
			}
			$check = '';
			if ($hyphenator_['languages'] != 'auto') {
				foreach ($hyphenator_['languages'] as $setlang) {
					if ($lang == $setlang) {
						$check = "checked=\"checked\"";
					}
				}
			}
			echo "       <li><input id=\"lang_{$lang}\" name=\"hyphenator_lang_{$lang}\" type=\"checkbox\" value=\"1\" {$check} /> <label for=\"lang_{$lang}\">{$language}</label></li>\n";
	    	$i++;
		}
    	?>
       </ul>
      </li>
     </ul>
    </fieldset>


    <label for="opt4"><?php _e('exceptions', 'hyphenator') ?></label>
     <textarea id="opt4" name="hyphenator_addexceptions" cols="70" rows="3"><?php echo $hyphenator_['addexceptions'] ?></textarea>
     <p><small><?php _e('example', 'hyphenator'); ?>: WordPress, Be-ne-dict (<?php _e("WordPress will never be devided, Benedict only on the given positions", 'hyphenator'); ?>)<br />
     <?php _e('default', 'hyphenator'); echo ": "; _e('none', 'hyphenator') ?></small></p>
    
    <h4><?php _e('Optional', 'hyphenator') ?></h4>
    <label for="opt5"><?php _e('display an on-off switch', 'hyphenator') ?></label>
     <p>
     <input id="opt5" name="hyphenator_displaytogglebox" type="checkbox" value="1" <?php if ($hyphenator_['displaytogglebox'] == 1) echo "checked=\"checked\"" ?> />
     <small><?php _e('default', 'hyphenator'); echo ": "; _e('no', 'hyphenator'); ?></small></p>
     
    <label for="opt6"><?php _e('display each hyphen character for testing', 'hyphenator') ?></label>
     <p>
     <input id="opt6" name="hyphenator_hypenchar" type="checkbox" value="1" <?php if ($hyphenator_['hypenchar'] == 1) echo "checked=\"checked\"" ?> />
     <small><?php _e('default', 'hyphenator'); echo ": "; _e('no', 'hyphenator'); ?></small></p>
     
    <label for="opt7"><?php _e('use Hyphenator.js from developer trunk', 'hyphenator') ?></label>
     <p>
     <input id="opt7" name="hyphenator_usetrunk" type="checkbox" value="1" <?php if ($hyphenator_['usetrunk'] == 1) echo "checked=\"checked\"" ?> />
     <small><?php _e('default', 'hyphenator'); echo ": "; _e('no', 'hyphenator'); echo " ("; _e('security risk', 'hyphenator'); echo ")" ?></small></p>

    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes', 'hyphenator') ?>" />
    </p>
  </form>


  <h3><?php _e('And now?', 'hyphenator') ?></h3>
  <p><?php _e("If you like the plugin, then recommend Hyphenator or donate a little money. You know? Now and forever.", 'hyphenator') ?></p>
  
  <p class="moo"><?php _e("You can never be sure.", 'hyphenator') ?></p>

</div>
