<?php
/*  Copyright 2009  mit3xxx.de

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
Plugin Name: Mit3xxx Toolbar
Plugin URI: http://www.mit3xxx.de/
Description: The mit3xxx toolbar allows you to add the following features to your site: * navigate to the start page * integrate a button to your rss-feed * let your users tweet your content * let your users share your content to social network sites such as Delicious, Digg, Facebook, and more social bookmarking and sharing sites * Provides more then 20 themes
Author: The mit3xxx.de Team
Version: 1.0.2
Author URI: http://www.mit3xxx.de/
*/


// register the hooks
add_action('admin_menu', 'mit3xxx_toolbar_add_menu');
add_filter('wp_footer', 'mit3xxx_toolbar_footer');


//$mit3xxx_toolbar_account = get_option('mit3xxx_toolbar_account');

if ('insert' == $HTTP_POST_VARS['action']) {
    update_option("mit3xxx_toolbar_active",$HTTP_POST_VARS['mit3xxx_toolbar_active']);
    update_option("mit3xxx_toolbar_account",$HTTP_POST_VARS['mit3xxx_toolbar_account']);
    
    update_option("mit3xxx_toolbar_website",$HTTP_POST_VARS['mit3xxx_toolbar_website']);
    update_option("mit3xxx_toolbar_rss",$HTTP_POST_VARS['mit3xxx_toolbar_rss']);
    update_option("mit3xxx_toolbar_theme",$HTTP_POST_VARS['mit3xxx_toolbar_theme']);
    update_option("mit3xxx_toolbar_position",$HTTP_POST_VARS['mit3xxx_toolbar_position']);
    update_option("mit3xxx_toolbar_twitter_account",$HTTP_POST_VARS['mit3xxx_toolbar_twitter_account']);
}


function mit3xxx_toolbar_option_page() {
    $mit3xxx_toolbar_theme = get_option("mit3xxx_toolbar_theme", "start");
    $themes = array('black-tie', 'blitzer', 'cupertino', 'dark-hive',
                    'dot-luv', 'eggplant', 'excite-bike', 'flick',
                    'hot-sneaks', 'humanity', 'le-frog', 'mint-choc',
                    'overcast', 'pepper-grinder', 'redmond', 'smoothness',
                    'south-street', 'start', 'sunny', 'swanky-purse',
                    'trontastic', 'ui-darkness', 'ui-lightness', 'vader'
                   );

    $mit3xxx_toolbar_position = get_option("mit3xxx_toolbar_position", "left");
    $positions = array('left', 'right');
    
    ?>
    <div class="wrap">
            
      <form name="form1" method="post" action="<?php echo $location; ?>">
        <h2>mit3xxx Toolbar</h2>
        <fieldset class="options" name="general">
        <legend>General settings</legend>
        <table width="100%" cellspacing="2" cellpadding="5" class="editform">
        
        <tr>
          <th nowrap valign="top" width="33%">Active</th>
          <td>
            <input name="mit3xxx_toolbar_active" value="true" type="checkbox" <?php if (get_option("mit3xxx_toolbar_active")) echo "checked"; ?> />
            <br />Activate your mit3xxx toolbar.
          </td>
        </tr>
        <tr>
          <th nowrap valign="top" width="33%">Account ID</th>
          <td>
            <input name="mit3xxx_toolbar_account" value="<?php echo get_option("mit3xxx_toolbar_account", "m3x-"); ?>" type="text" size="50" />
            <br />Enter your mit3xxx toolbar account ID.
          </td>
        </tr>
        
        <tr>
          <th nowrap valign="top" width="33%">Website</th>
          <td>
            <input name="mit3xxx_toolbar_website" value="<?php echo get_option("mit3xxx_toolbar_website", "http://"); ?>" type="text" size="50" />
            <br />Enter the url of your website.
          </td>
        </tr>
 
        <tr>
          <th nowrap valign="top" width="33%">RSS</th>
          <td>
            <input name="mit3xxx_toolbar_rss" value="<?php echo get_option("mit3xxx_toolbar_rss", "http://"); ?>" type="text" size="50" />
            <br />Enter the url of your RSS-Feed.
          </td>
        </tr>
        
        <tr>
          <th nowrap valign="top" width="33%">Twitter Account</th>
          <td>
            <input name="mit3xxx_toolbar_twitter_account" value="<?php echo get_option("mit3xxx_toolbar_twitter_account", ""); ?>" type="text" size="50" />
            <br />Enter your twitter account.
          </td>
        </tr>

        <tr>
          <th nowrap valign="top" width="33%">Theme</th>
          <td>
        <select name="mit3xxx_toolbar_theme">   
<?php 
foreach ($themes as $theme) {
    if ($mit3xxx_toolbar_theme == $theme) {
        echo "<option value='" . $theme . "' selected='selected'>" . $theme . "</option>";
    }
    else {
        echo "<option value='" . $theme . "'>" . $theme . "</option>";
    }
}
?>
        </select>
            <br />Select a theme.
          </td>
        </tr>
        
        <tr>
          <th nowrap valign="top" width="33%">Position</th>
          <td>

        <select name="mit3xxx_toolbar_position">     
<?php 
foreach ($positions as $position) {
    if ($mit3xxx_toolbar_position == $position) {
        echo "<option value='" . $position . "' selected='selected'>" . $position . "</option>";
    }
    else {
        echo "<option value='" . $position . "'>" . $position . "</option>";
    }
}
?>
        </select>
            <br />Select a position.
          </td>
        </tr>
        
        </table>
        
        <div class="submit">
            <input type="submit" value="Update Options" />
            <input name="action" value="insert" type="hidden" />
        </div>
            
        </fieldset>        
      </form>
     
    </div>
<?php
} 

// Adminmenu Optionen erweitern
function mit3xxx_toolbar_add_menu() {
    add_options_page('mit3xxx Toolbar', 'mit3xxx Toolbar', 9, __FILE__, 'mit3xxx_toolbar_option_page'); //optionenseite hinzufuegen
}


function mit3xxx_getAccount() {
    $sResult = "anonymus";
    $account = get_option("mit3xxx_toolbar_account", "m3x-");
    $account = trim($account);
    if ("" != $account && "m3x-" != $account) {
        $sResult = $account;
    }
    return $sResult;
}

function mit3xxx_getValidURL($sUrl) {
    $sResult = "";
    $sTrim = trim($sUrl);
    if ("http://" != $sTrim && "" != $sTrim) {
        $sResult = $sTrim;
    }
    return $sResult;
}

function mit3xxx_getWebsite() {
    $website = get_option("mit3xxx_toolbar_website", "");
    $sResult = mit3xxx_getValidURL($website);
    return $sResult;
}

function mit3xxx_getRss() {
    $website = get_option("mit3xxx_toolbar_rss", "");
    $sResult = mit3xxx_getValidURL($website);
    return $sResult;
}

function mit3xxx_getTwitterAccount() {
    $sResult = get_option("mit3xxx_toolbar_twitter_account", "");
    return $sResult;
}

function mit3xxx_toolbar_footer($content) {
    $active = get_option("mit3xxx_toolbar_active", False);
    
    if (True == $active) {
        $account = mit3xxx_getAccount();
        $website = mit3xxx_getWebsite();
        $rss = mit3xxx_getRss();
        $twitter_account = mit3xxx_getTwitterAccount();
        $theme = get_option("mit3xxx_toolbar_theme", "start");
        $position = get_option("mit3xxx_toolbar_position", "left");
     
        $codesnippet = '<div id="MIT3XXX_sidebar" name="MIT3XXX_sidebar" class="MIT3XXX_sidebar"><a id="MIT3XXX_sidebar_link" name="MIT3XXX_sidebar_link" href="http://www.mit3xxx.de/">this service is powered by www.mit3xxx.de</a></div>';
        $codesnippet .= '<script src="http://sidebar.mit3xxx.de/static/js/sidebar.js" type="text/javascript"></script><script type="text/javascript" charset="utf-8">var sidebar_options = {}; sidebar_options.homepage = "#WEBSITE#"; sidebar_options.rss = "#RSS#"; sidebar_options.theme = "#THEME#"; sidebar_options.twitter_account = "#TWITTER_ACCOUNT#"; MIT3XXX.createSidebar("#POSITION#", "#ACCOUNT#", sidebar_options); </script><script src="http://sidebar.mit3xxx.de/static/js/sidebar_custom.js" type="text/javascript"></script><link href="http://sidebar.mit3xxx.de/static/css/sidebar.css" rel="stylesheet" type="text/css" />';
    
        $codesnippet = str_replace('#ACCOUNT#', $account, $codesnippet);
        $codesnippet = str_replace('#WEBSITE#', $website, $codesnippet);
        $codesnippet = str_replace('#RSS#', $rss, $codesnippet);
        $codesnippet = str_replace('#TWITTER_ACCOUNT#', $twitter_account, $codesnippet);
        $codesnippet = str_replace('#POSITION#', $position, $codesnippet);
        $codesnippet = str_replace('#THEME#', $theme, $codesnippet);
        

        echo $codesnippet;
    }    
    return $content;
}

?>
