<?php
// $location = $hyphenator_options_page; // Form Action URI

/* Check for admin Options submission and update options*/
if ('process' == $_POST['stage']) {
    update_option('hyphenator_minwordlenght', $_POST['hyphenator_minwordlenght']);
    update_option('hyphenator_hypenchar', $_POST['hyphenator_hypenchar']);
    update_option('hyphenator_addexceptions', $_POST['hyphenator_addexceptions']);
    update_option('hyphenator_classname', $_POST['hyphenator_classname']);
    update_option('hyphenator_languages', $_POST['hyphenator_languages']);
    update_option('hyphenator_displaytogglebox', $_POST['hyphenator_displaytogglebox']);
    update_option('hyphenator_usetrunk', $_POST['hyphenator_usetrunk']);
}
?>

<?php load_plugin_textdomain(hyphenator, PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)), dirname(plugin_basename(__FILE__)).'/languages/'); ?>

<div class="wrap">
  <h2><?php _e('Hyphenator Options', 'hyphenator') ?></h2>
  <form name="form1" method="post" action="<?php echo $hyphenator_options_page ?>&amp;updated=true">
	<input type="hidden" name="stage" value="process" />
    <table width="100%" cellspacing="2" cellpadding="5" class="form-table">

        <tr valign="baseline">
        <th scope="row"><?php _e('minimal length of words', 'hyphenator') ?></th> 
        <td>
        <?php
        $hyphenator_minwordlenght = get_option('hyphenator_minwordlenght');
        echo("\n<input name=\"hyphenator_minwordlenght\" type=\"text\" size=\"2\" maxlength=\"2\" value=\"{$hyphenator_minwordlenght}\" />\n");
        ?>
        <p><small><?php _e('default', 'hyphenator'); echo ": 6" ?></small></p>
        </td>
        </tr>

        <tr valign="baseline">
        <th scope="row"><?php _e('hyphen character', 'hyphenator') ?></th> 
        <td>
        <?php
        $hyphenator_hypenchar = htmlspecialchars(get_option('hyphenator_hypenchar'));
        echo("\n<input name=\"hyphenator_hypenchar\" type=\"text\" class=\"code\" size=\"10\" maxlength=\"20\" value=\"{$hyphenator_hypenchar}\" />\n");
        ?>
        <p><small><?php _e('default', 'hyphenator'); echo ": &amp;shy;"?></small></p>
        </td>
        </tr>

        <tr valign="baseline">
        <th scope="row"><?php _e('exceptions', 'hyphenator') ?></th> 
        <td>
        <?php
        $hyphenator_addexceptions = get_option('hyphenator_addexceptions');
        echo("\n<input name=\"hyphenator_addexceptions\" type=\"text\" size=\"10\" value=\"{$hyphenator_addexceptions}\" />\n");
        ?>
        <p><small><?php _e('default', 'hyphenator'); echo ": "; _e('none', 'hyphenator') ?></small></p>
        </td>
        </tr>

        <tr valign="baseline">
        <th scope="row"><?php _e('class name of content to hyphenate', 'hyphenator') ?></th> 
        <td>
        <?php
        $hyphenator_classname = get_option('hyphenator_classname');
        echo("\n<input name=\"hyphenator_classname\" type=\"text\" size=\"10\" value=\"{$hyphenator_classname}\" />\n");
        ?>
        <p><small><?php _e('default', 'hyphenator'); echo ": hyphenate" ?></small></p>
        </td>
        </tr>

        <tr valign="baseline">
        <th scope="row"><?php _e('filtered languages', 'hyphenator') ?></th> 
        <td>
        <?php
        $hyphenator_languages = get_option('hyphenator_languages');
        echo("\n<input name=\"hyphenator_languages\" type=\"text\" size=\"10\" value=\"{$hyphenator_languages}\" />\n");
        ?>
        <p><small><?php _e('default', 'hyphenator'); echo ": en,de,fr,nl" ?></small></p>
        </td>
        </tr>

        <tr valign="baseline">
        <th scope="row"><?php _e('display an on-off switch', 'hyphenator') ?></th> 
        <td>
        <?php
        $hyphenator_displaytogglebox = get_option('hyphenator_displaytogglebox');
		if ($hyphenator_displaytogglebox == 1) {
        	echo("\n<input name=\"hyphenator_displaytogglebox\" type=\"checkbox\" value=\"1\" checked=\"checked\" />\n");
		} else {
        	echo("\n<input name=\"hyphenator_displaytogglebox\" type=\"checkbox\" value=\"1\" />\n");
    	}
        ?>
        <p><small><?php _e('default', 'hyphenator'); echo ": "; _e('no', 'hyphenator'); ?></small></p>
        </td>
        </tr>

        <tr valign="baseline">
        <th scope="row"><?php _e('use Hyphenator.js from developer trunk', 'hyphenator') ?></th> 
        <td>
        <?php
        $hyphenator_usetrunk = get_option('hyphenator_usetrunk');
		if ($hyphenator_usetrunk == 1) {
        	echo("\n<input name=\"hyphenator_usetrunk\" type=\"checkbox\" value=\"1\" checked=\"checked\" />\n");
		} else {
        	echo("\n<input name=\"hyphenator_usetrunk\" type=\"checkbox\" value=\"1\" />\n");
    	}
        ?>
        <p><small><?php _e('default', 'hyphenator'); echo ": "; _e('no', 'hyphenator'); echo " ("; _e('security risk', 'hyphenator'); echo ")" ?></small></p>
        </td>
        </tr>

     </table>

    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes', 'hyphenator') ?>" />
    </p>
  </form>
</div>
