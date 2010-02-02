<?php
/*  Copyright 2010  iconcy.com

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
Description: The iconcy website toolbar allows you to add the following features to your site: * navigate to the start page * integrate a button to your rss-feed * let your users tweet your content * let your users share your content to social network sites such as Delicious, Digg, Facebook, and more social bookmarking and sharing sites * Provides more then 20 themes
Author: The iconcy.com Team
Version: 2.1
Author URI: http://www.iconcy.com/
*/

include_once('mit3xxx_fw_toolbar.inc');

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
    update_option("mit3xxx_toolbar_twitter_text_begin",$HTTP_POST_VARS['mit3xxx_toolbar_twitter_text_begin']);
    update_option("mit3xxx_toolbar_twitter_text_end",$HTTP_POST_VARS['mit3xxx_toolbar_twitter_text_end']);
    update_option("mit3xxx_toolbar_show_back_to_top",$HTTP_POST_VARS['mit3xxx_toolbar_show_back_to_top']); 
    update_option("mit3xxx_toolbar_show_back_to_bottom",$HTTP_POST_VARS['mit3xxx_toolbar_show_back_to_bottom']);
    update_option("mit3xxx_toolbar_show_twitter",$HTTP_POST_VARS['mit3xxx_toolbar_show_twitter']);
    update_option("mit3xxx_toolbar_show_facebook",$HTTP_POST_VARS['mit3xxx_toolbar_show_facebook']);
    update_option("mit3xxx_toolbar_show_bookmarks",$HTTP_POST_VARS['mit3xxx_toolbar_show_bookmarks']);
    update_option("mit3xxx_toolbar_show_search",$HTTP_POST_VARS['mit3xxx_toolbar_show_search']);
    update_option("mit3xxx_toolbar_search_website",$HTTP_POST_VARS['mit3xxx_toolbar_search_website']);    
    update_option("mit3xxx_toolbar_distance",$HTTP_POST_VARS['mit3xxx_toolbar_distance']);    
    update_option("mit3xxx_toolbar_style",$HTTP_POST_VARS['mit3xxx_toolbar_style']);
    update_option("mit3xxx_toolbar_show_print",$HTTP_POST_VARS['mit3xxx_toolbar_show_print']);
    update_option("mit3xxx_toolbar_distance_from_position",$HTTP_POST_VARS['mit3xxx_toolbar_distance_from_position']);
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
    $positions = array('left', 'right', 'center_left', 'center_right');
    
    $mit3xxx_toolbar_style = get_option("mit3xxx_toolbar_style", "cutter");
    $styles = array('cutter', 'normal');
    
    $mit3xxx_toolbar_show_back_to_top = get_option("mit3xxx_toolbar_show_back_to_top", "show");
    $showBackToTop = array('show', 'hide');
    
    $mit3xxx_toolbar_show_back_to_bottom = get_option("mit3xxx_toolbar_show_back_to_bottom", "show");
    $showBackToBottom = array('show', 'hide');
    
    $mit3xxx_toolbar_show_twitter = get_option("mit3xxx_toolbar_show_twitter", "show");
    $showTwitter = array('show', 'hide');
    
    $mit3xxx_toolbar_show_facebook = get_option("mit3xxx_toolbar_show_facebook", "show");
    $showFacebook = array('show', 'hide');
    
    $mit3xxx_toolbar_show_bookmarks = get_option("mit3xxx_toolbar_show_bookmarks", "show");
    $showBookmarks = array('show', 'hide');

    $mit3xxx_toolbar_show_search = get_option("mit3xxx_toolbar_show_search", "show");
    $showSearch = array('show', 'hide');

    $mit3xxx_toolbar_show_print = get_option("mit3xxx_toolbar_show_print", "show");
    $showPrint = array('show', 'hide');
    
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
          <th nowrap valign="top" align="left" width="33%">Style</th>
          <td>

        <select name="mit3xxx_toolbar_style">    
<?php 
foreach ($styles as $style) {
    if ($mit3xxx_toolbar_style == $style) {
        echo "<option value='" . $style . "' selected='selected'>" . $style . "</option>";
    }
    else {
        echo "<option value='" . $style . "'>" . $style . "</option>";
    }
}
?>
        </select>
            <br />Select a Style.
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
          <th nowrap valign="top" align="left" width="33%">Distance From Top</th>
          <td>
            <input name="mit3xxx_toolbar_distance" value="<?php echo get_option("mit3xxx_toolbar_distance", "100px"); ?>" type="text" size="15" />
            <br />Enter the distance from top. You can use 'px' or '%'. For example: 100px or 20%.
          </td>
        </tr>        

        <tr>
          <th nowrap valign="top" align="left" width="33%">Distance From Position</th>
          <td>
            <input name="mit3xxx_toolbar_distance_from_position" value="<?php echo get_option("mit3xxx_toolbar_distance_from_position", "0px"); ?>" type="text" size="15" />
            <br />Enter the distance from position. For example: 100px or 0px.
          </td>
        </tr>        

        <tr>
          <th nowrap valign="top" align="left" width="33%">Show JumpToTop button</th>
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
            <br />Select JumpToTop visibility
          </td>
        </tr>

        <tr>
          <th nowrap valign="top" align="left" width="33%">Show JumpToBottom button</th>
          <td>
            <select name="mit3xxx_toolbar_show_back_to_bottom">                      
<?php 
foreach ($showBackToBottom as $show) {
    if ($mit3xxx_toolbar_show_back_to_bottom == $show) {
        echo "<option value='" . $show . "' selected='selected'>" . $show . "</option>";
    }
    else {
        echo "<option value='" . $show . "'>" . $show . "</option>";
    }
}
?>
            </select>
            <br />Select JumpToBottom visibility
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
          <th nowrap valign="top" align="left" width="33%">Show facebook button</th>
          <td>
            <select name="mit3xxx_toolbar_show_facebook">                      
<?php 
foreach ($showFacebook as $show) {
    if ($mit3xxx_toolbar_show_facebook == $show) {
        echo "<option value='" . $show . "' selected='selected'>" . $show . "</option>";
    }
    else {
        echo "<option value='" . $show . "'>" . $show . "</option>";
    }
}
?>
            </select>
            <br />Select facebook visibility
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


        <tr>
          <th nowrap valign="top" align="left" width="33%">Show print button</th>
          <td>
            <select name="mit3xxx_toolbar_show_print">                     
<?php 
foreach ($showPrint as $show) {
    if ($mit3xxx_toolbar_show_print == $show) {
        echo "<option value='" . $show . "' selected='selected'>" . $show . "</option>";
    }
    else {
        echo "<option value='" . $show . "'>" . $show . "</option>";
    }
}
?>
            </select>
            <br />Select print visibility
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
          <th nowrap valign="top" align="left" width="33%">Twitter text begin</th>
          <td>
            <input name="mit3xxx_toolbar_twitter_text_begin" value="<?php echo get_option("mit3xxx_toolbar_twitter_text_begin", ""); ?>" type="text" size="50" />
            <br />Enter the start of twitter text.
          </td>
        </tr>

        <tr>
          <th nowrap valign="top" align="left" width="33%">Twitter text end</th>
          <td>
            <input name="mit3xxx_toolbar_twitter_text_end" value="<?php echo get_option("mit3xxx_toolbar_twitter_text_end", ""); ?>" type="text" size="50" />
            <br />Enter the end of twitter text.
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

function mit3xxx_toolbar_footer($content) {
    $sTheme = _mit3xxx_fw_getTheme(get_option("mit3xxx_toolbar_theme", ""));
    $sStyle = _mit3xxx_fw_getStyle(get_option("mit3xxx_toolbar_style", ""));
    $sPosition = _mit3xxx_fw_getPosition(get_option("mit3xxx_toolbar_position", ""));
    $sDistance = _mit3xxx_fw_getDistance(get_option("mit3xxx_toolbar_distance", ""));
    $sDistanceFromPosition = _mit3xxx_fw_getDistanceFromPosition(get_option("mit3xxx_toolbar_distance_from_position", ""));

    $sWebsite = _mit3xxx_fw_getWebsite(get_option("mit3xxx_toolbar_website", ""));
    $sRss = _mit3xxx_fw_getRss(get_option("mit3xxx_toolbar_rss", ""));
    $sShowBackToTopButton = _mit3xxx_fw_getShowBackToTopButton(get_option("mit3xxx_toolbar_show_back_to_top", ""));
    $sShowBackToBottomButton = _mit3xxx_fw_getShowBackToBottomButton(get_option("mit3xxx_toolbar_show_back_to_bottom", ""));

    $sShowTwitterButton = _mit3xxx_fw_getShowTwitterButton(get_option("mit3xxx_toolbar_show_twitter", ""));
    $sTwitterAccount = _mit3xxx_fw_getTwitterAccount(get_option("mit3xxx_toolbar_twitter_account", ""));
    $sTwitterTextBegin = _mit3xxx_fw_getTwitterAccount(get_option("mit3xxx_toolbar_twitter_text_begin", ""));
    $sTwitterTextEnd = _mit3xxx_fw_getTwitterAccount(get_option("mit3xxx_toolbar_twitter_text_end", ""));

    $sShowFacebookButton = _mit3xxx_fw_getShowFacebookButton(get_option("mit3xxx_toolbar_show_facebook", ""));
    
    $sShowBookmarkButton = _mit3xxx_fw_getShowBookmarkButton(get_option("mit3xxx_toolbar_show_bookmarks", ""));

    $sShowSearchButton = _mit3xxx_fw_getShowSearchButton(get_option("mit3xxx_toolbar_show_search", ""));
    $sSearchWebsite = _mit3xxx_fw_getSearchWebsite(get_option("mit3xxx_toolbar_search_website", ""));

    $sShowPrintButton = _mit3xxx_fw_getShowPrintButton(get_option("mit3xxx_toolbar_show_print", ""));
    
    $sAccount = _mit3xxx_fw_getAccount(get_option("mit3xxx_toolbar_account", "m3x-"));

    $sCode = _mit3xxx_fw_getToolbarCode('wordpress', '',
                                        $sTheme, $sStyle, $sPosition, 
                                        $sDistance, $sDistanceFromPosition,
                                        $sWebsite, $sRss, 
                                        $sShowBackToTopButton, $sShowBackToBottomButton,
                                        $sShowTwitterButton, $sTwitterAccount,
                                        $sTwitterTextBegin, $sTwitterTextEnd,
                                        $sShowFacebookButton, $sShowBookmarkButton,
                                        $sShowSearchButton, $sSearchWebsite,
                                        $sShowPrintButton,
                                        $sAccount);
    
    echo $sCode;
    
    return $content;
}

?>
