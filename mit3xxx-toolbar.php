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
Plugin URI: http://wordpress.org/extend/plugins/mit3xxxde-toolbar
Description: The mit3xxx toolbar allows you to add the following features to your site: * navigate to the start page * integrate a button to your rss-feed * let your users tweet your content * let your users share your content to social network sites such as Delicious, Digg, Facebook, and more social bookmarking and sharing sites * Provides more then 20 themes
Author: The mit3xxx.de Team
Version: 2.1
Author URI: http://www.mit3xxx.de/
*/


// register the hooks
add_action('admin_menu', 'mit3xxx_toolbar_add_menu');
add_filter('wp_footer', 'mit3xxx_toolbar_footer');

if ('insert' == $HTTP_POST_VARS['action']) {
    update_option("mit3xxx_toolbar_account",$HTTP_POST_VARS['mit3xxx_toolbar_account']);
    
    update_option("mit3xxx_toolbar_website",$HTTP_POST_VARS['mit3xxx_toolbar_website']);
    update_option("mit3xxx_toolbar_rss",$HTTP_POST_VARS['mit3xxx_toolbar_rss']);
    update_option("mit3xxx_toolbar_theme",$HTTP_POST_VARS['mit3xxx_toolbar_theme']);
    update_option("mit3xxx_toolbar_position",$HTTP_POST_VARS['mit3xxx_toolbar_position']);
    update_option("mit3xxx_toolbar_twitter_account",$HTTP_POST_VARS['mit3xxx_toolbar_twitter_account']);
    update_option("mit3xxx_toolbar_show_back_to_top",$HTTP_POST_VARS['mit3xxx_toolbar_show_back_to_top']); 
    update_option("mit3xxx_toolbar_show_twitter",$HTTP_POST_VARS['mit3xxx_toolbar_show_twitter']);
    update_option("mit3xxx_toolbar_show_bookmarks",$HTTP_POST_VARS['mit3xxx_toolbar_show_bookmarks']);
    update_option("mit3xxx_toolbar_show_search",$HTTP_POST_VARS['mit3xxx_toolbar_show_search']);
    update_option("mit3xxx_toolbar_search_website",$HTTP_POST_VARS['mit3xxx_toolbar_search_website']);
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

    $mit3xxx_toolbar_show_back_to_top = get_option("mit3xxx_toolbar_show_back_to_top", "show");
    $showBackToTop = array('show', 'hide');
    
    $mit3xxx_toolbar_show_twitter = get_option("mit3xxx_toolbar_show_twitter", "show");
    $showTwitter = array('show', 'hide');

    $mit3xxx_toolbar_show_bookmarks = get_option("mit3xxx_toolbar_show_bookmarks", "show");
    $showBookmarks = array('show', 'hide');

    $mit3xxx_toolbar_show_search = get_option("mit3xxx_toolbar_show_search", "show");
    $showSearch = array('show', 'hide');
    
    ?>
    <div class="wrap">
            
      <form name="form1" method="post" action="<?php echo $location; ?>">
        <h2>mit3xxx Toolbar</h2>
        
        <fieldset class="options" name="general">
        <legend>Layout settings</legend>
        <table width="100%" cellspacing="2" cellpadding="5" class="editform">

        <tr>
          <th nowrap valign="top" align="left" width="33%">Theme</th>
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
          <th nowrap valign="top" align="left" width="33%">Position</th>
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

        <tr>
          <th nowrap valign="top" align="left" width="33%">Show BackToTop button</th>
          <td>
            <select name="mit3xxx_toolbar_show_back_to_top">                      
<?php 
foreach ($showBackToTop as $show) {
    if ($mit3xxx_toolbar_show_back_to_top == $show) {
        echo "<option value='" . $show . "' selected='selected'>" . $show . "</option>";
    }
    else {
        echo "<option value='" . $show . "'>" . $show . "</option>";
    }
}
?>
            </select>
            <br />Select BackToTop visibility
          </td>
        </tr>

        <tr>
          <th nowrap valign="top" align="left" width="33%">Show twitter button</th>
          <td>
            <select name="mit3xxx_toolbar_show_twitter">                      
<?php 
foreach ($showTwitter as $show) {
    if ($mit3xxx_toolbar_show_twitter == $show) {
        echo "<option value='" . $show . "' selected='selected'>" . $show . "</option>";
    }
    else {
        echo "<option value='" . $show . "'>" . $show . "</option>";
    }
}
?>
            </select>
            <br />Select twitter visibility
          </td>
        </tr>

        <tr>
          <th nowrap valign="top" align="left" width="33%">Show bookmark button</th>
          <td>
            <select name="mit3xxx_toolbar_show_bookmarks">                     
<?php 
foreach ($showBookmarks as $show) {
    if ($mit3xxx_toolbar_show_bookmarks == $show) {
        echo "<option value='" . $show . "' selected='selected'>" . $show . "</option>";
    }
    else {
        echo "<option value='" . $show . "'>" . $show . "</option>";
    }
}
?>
            </select>
            <br />Select bookmark visibility
          </td>
        </tr>


        <tr>
          <th nowrap valign="top" align="left" width="33%">Show search button</th>
          <td>
            <select name="mit3xxx_toolbar_show_search">                     
<?php 
foreach ($showSearch as $show) {
    if ($mit3xxx_toolbar_show_search == $show) {
        echo "<option value='" . $show . "' selected='selected'>" . $show . "</option>";
    }
    else {
        echo "<option value='" . $show . "'>" . $show . "</option>";
    }
}
?>
            </select>
            <br />Select search visibility
          </td>
        </tr>

       </table>
       </fieldset>


        <fieldset class="options" name="optional">
        <legend>Optional settings</legend>
        <table width="100%" cellspacing="2" cellpadding="5" class="editform">

        <tr>
          <th nowrap valign="top" align="left" width="33%">Website</th>
          <td>
            <input name="mit3xxx_toolbar_website" value="<?php echo get_option("mit3xxx_toolbar_website", "http://"); ?>" type="text" size="50" />
            <br />Enter the url of your website. For example: http://www.mit3xxx.de/
          </td>
        </tr>
 
        <tr>
          <th nowrap valign="top" align="left" idth="33%">RSS</th>
          <td>
            <input name="mit3xxx_toolbar_rss" value="<?php echo get_option("mit3xxx_toolbar_rss", "http://"); ?>" type="text" size="50" />
            <br />Enter the url of your RSS-Feed. For example: http://www.mit3xxx.de/rss
          </td>
        </tr>
        
        <tr>
          <th nowrap valign="top" align="left" width="33%">Twitter Account</th>
          <td>
            <input name="mit3xxx_toolbar_twitter_account" value="<?php echo get_option("mit3xxx_toolbar_twitter_account", ""); ?>" type="text" size="50" />
            <br />Enter your twitter account. For example: mit3xxx
          </td>
        </tr>

        <tr>
          <th nowrap valign="top" align="left" idth="33%">Search Website</th>
          <td>
            <input name="mit3xxx_toolbar_search_website" value="<?php echo get_option("mit3xxx_toolbar_search_website", "http://"); ?>" type="text" size="50" />
            <br />Enter the url of your website. For example: http://www.mit3xxx.de/
          </td>
        </tr>

        </table>
        </fieldset>
        
        


        <fieldset class="options" name="account">
        <legend>Account settings</legend>
        <table width="100%" cellspacing="2" cellpadding="5" class="editform">        
        <tr>
          <th nowrap valign="top" align="left" width="33%">Account ID (optional)</th>
          <td>
            <input name="mit3xxx_toolbar_account" value="<?php echo get_option("mit3xxx_toolbar_account", "m3x-"); ?>" type="text" size="50" />
            <br />Enter your mit3xxx toolbar account ID. The format is: m3x-****-**
          </td>
        </tr>        
        </table>
        </fieldset>        


        
        <div class="submit">
            <input type="submit" value="Update Options" />
            <input name="action" value="insert" type="hidden" />
        </div>
            
                
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

function mit3xxx_getSearchWebsite() {
    $website = get_option("mit3xxx_toolbar_search_website", "");
    $sResult = mit3xxx_getValidURL($website);
    return $sResult;
}

function mit3xxx_getShowBackToTop() {
    $bResult = 'true';
    $show = get_option("mit3xxx_toolbar_show_back_to_top", "show");
    if ("show" != $show) {        
        $bResult = 'false';
    }
    return $bResult;
}

function mit3xxx_getShowTwitter() {
    $bResult = 'true';
    $show = get_option("mit3xxx_toolbar_show_twitter", "show");
    if ("show" != $show) {        
        $bResult = 'false';
    }
    return $bResult;
}

function mit3xxx_getShowBookmarks() {
    $bResult = 'true';
    $show = get_option("mit3xxx_toolbar_show_bookmarks", "show");
    if ("show" != $show) {        
        $bResult = 'false';
    }    
    return $bResult;
}

function mit3xxx_getShowSearch() {
    $bResult = 'true';
    $show = get_option("mit3xxx_toolbar_show_search", "show");
    if ("show" != $show) {        
        $bResult = 'false';
    }    
    return $bResult;
}

function mit3xxx_getTwitterAccount() {
    $sResult = get_option("mit3xxx_toolbar_twitter_account", "");
    return $sResult;
}

function mit3xxx_toolbar_footer($content) {
    
    $theme = get_option("mit3xxx_toolbar_theme", "start");
    $position = get_option("mit3xxx_toolbar_position", "left");
    $showBackToTop = mit3xxx_getShowBackToTop();    
    $showTwitter = mit3xxx_getShowTwitter();
    $showBookmarks = mit3xxx_getShowBookmarks();
    $showSearch = mit3xxx_getShowSearch();
    
    $website = mit3xxx_getWebsite();
    $rss = mit3xxx_getRss();
    $searchWebsite = mit3xxx_getSearchWebsite();
    $twitter_account = mit3xxx_getTwitterAccount();
    
    $account = mit3xxx_getAccount();
    
    $codesnippet = '
<div id="mit3xxx_toolbar" class="mit3xxx_toolbar">
<a id="mit3xxx_toolbar_powered" href="http://www.mit3xxx.de/">
<img src="http://toolbar.mit3xxx.de/static/images/blank.gif" alt="toolbar powered by www.mit3xxx.de" title="toolbar powered by www.mit3xxx.de" />
</a>
</div>
<script type="text/javascript" charset="utf-8">
//<![CDATA[
mit3xxxToolbarOptions = {};
mit3xxxToolbarOptions.source = "wordpress";
mit3xxxToolbarOptions.version = "3-0";
mit3xxxToolbarOptions.theme = "#THEME#";
mit3xxxToolbarOptions.position = "#POSITION#";
mit3xxxToolbarOptions.show_back_to_top = #SHOW_BACK_TO_TOP#;
mit3xxxToolbarOptions.show_twitter = #SHOW_TWITTER#;
mit3xxxToolbarOptions.show_bookmarks = #SHOW_BOOKMARKS#;
mit3xxxToolbarOptions.show_search = #SHOW_SEARCH#;

mit3xxxToolbarOptions.homepage = "#WEBSITE#";
mit3xxxToolbarOptions.rss = "#RSS#";
mit3xxxToolbarOptions.search_website = "#SEARCH_WEBSITE#";

mit3xxxToolbarOptions.twitter_account = "#TWITTER_ACCOUNT#";
mit3xxxToolbarOptions.account = "#ACCOUNT#";
//]]>
</script>
<script src="http://toolbar.mit3xxx.de/static/js/m3x-toolbar.js" type="text/javascript"></script>
';
    
    $codesnippet = str_replace('#THEME#', $theme, $codesnippet);
    $codesnippet = str_replace('#POSITION#', $position, $codesnippet); 

    $codesnippet = str_replace('#SHOW_BACK_TO_TOP#', $showBackToTop, $codesnippet);
    $codesnippet = str_replace('#SHOW_TWITTER#', $showTwitter, $codesnippet);
    $codesnippet = str_replace('#SHOW_BOOKMARKS#', $showBookmarks, $codesnippet);
    $codesnippet = str_replace('#SHOW_SEARCH#', $showSearch, $codesnippet);
    
    $codesnippet = str_replace('#WEBSITE#', $website, $codesnippet);
    $codesnippet = str_replace('#RSS#', $rss, $codesnippet);
    $codesnippet = str_replace('#SEARCH_WEBSITE#', $searchWebsite, $codesnippet);
    $codesnippet = str_replace('#TWITTER_ACCOUNT#', $twitter_account, $codesnippet);
    $codesnippet = str_replace('#ACCOUNT#', $account, $codesnippet);

    echo $codesnippet;
    
    return $content;
}

?>
