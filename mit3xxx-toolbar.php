<?php
/*  Copyright 2011  iconcy.com

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
Plugin Name: iconcy.com Toolbar
Plugin URI: http://wordpress.org/extend/plugins/mit3xxxde-toolbar
Description: The iconcy website toolbar allows you to add the following features to your site: * navigate to the start page * integrate a button to your rss-feed * let your users tweet your content * let your users share your content to social network sites such as Delicious, Digg, Facebook, and more social bookmarking and sharing sites * Provides more then 20 themes
Author: The iconcy.com Team
Version: 4.02
Author URI: http://www.iconcy.com/
*/

include_once('common/iconcy_common.php');

// register the hooks
add_action('admin_menu', 'iconcy_toolbar_add_menu');
add_filter('wp_footer', 'iconcy_toolbar_footer');

// Adminmenu Optionen erweitern
function iconcy_toolbar_add_menu() {
    add_options_page('iconcy toolbar', 'iconcy toolbar', 9, __FILE__, 'iconcy_toolbar_option_page'); //optionenseite hinzufuegen

	//call register settings function
	add_action( 'admin_init', 'iconcy_toolbar_registersettings' );	
}

function iconcy_toolbar_registersettings() {
	//register settings
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_account' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_website' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_rss' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_theme' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_position' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_twitter_account' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_show_back_to_top' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_show_back_to_bottom' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_show_twitter' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_show_facebook' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_show_bookmarks' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_show_search' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_search_website' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_distance' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_style' );
	register_setting( 'iconcy-toolbar-settings-group', 'mit3xxx_toolbar_distance_from_position' );	
}


function iconcy_getSelectBox($sLabel, $sDescription, $sName, $lValues, $oCurrentVal) {
?>

        <tr>
          <th nowrap valign="top" align="left" width="33%"><?php echo $sLabel ?></th>
          <td>
        <select name="<?php echo $sName ?>" style="width:200px">   
<?php 
foreach ($lValues as $oValue) {
    if ($oCurrentVal == $oValue) {
        echo "<option value='" . $oValue . "' selected='selected'>" . $oValue . "</option>";
    }
    else {
        echo "<option value='" . $oValue . "'>" . $oValue . "</option>";
    }
}
?>
        </select>
           <?php echo $sDescription ?>
          </td>
        </tr>
		
<?php
}

function iconcy_getTextBox($sLabel, $sDescription, $sName, $oValue) {
?>
        <tr>
          <th nowrap valign="top" align="left" width="33%"><?php echo $sLabel ?></th>
          <td>
            <input name="<?php echo $sName ?>" value="<?php echo $oValue ?>" type="text" style="width:200px" />
            <?php echo $sDescription ?>
          </td>
        </tr>        
<?php
}


function iconcy_toolbar_option_page() {
    $toolbar_theme = get_option("mit3xxx_toolbar_theme", "start");
    $themes = array('black-tie', 'blitzer', 'cupertino', 'dark-hive',
                    'dot-luv', 'eggplant', 'excite-bike', 'flick',
                    'hot-sneaks', 'humanity', 'le-frog', 'mint-choc',
                    'overcast', 'pepper-grinder', 'redmond', 'smoothness',
                    'south-street', 'start', 'sunny', 'swanky-purse',
                    'trontastic', 'ui-darkness', 'ui-lightness', 'vader'
                   );

    $toolbar_position = get_option("mit3xxx_toolbar_position", "left");
    $positions = array('left', 'right', 'center_left', 'center_right');
    
    $toolbar_style = get_option("mit3xxx_toolbar_style", "cutter");
    $styles = array('cutter', 'normal');
    
    $toolbar_show_back_to_top = get_option("mit3xxx_toolbar_show_back_to_top", "show");
    $showBackToTop = array('show', 'hide');
    
    $toolbar_show_back_to_bottom = get_option("mit3xxx_toolbar_show_back_to_bottom", "show");
    $showBackToBottom = array('show', 'hide');
    
    $toolbar_show_twitter = get_option("mit3xxx_toolbar_show_twitter", "show");
    $showTwitter = array('show', 'hide');
    
    $toolbar_show_facebook = get_option("mit3xxx_toolbar_show_facebook", "show");
    $showFacebook = array('show', 'hide');
    
    $toolbar_show_bookmarks = get_option("mit3xxx_toolbar_show_bookmarks", "show");
    $showBookmarks = array('show', 'hide');

    $toolbar_show_search = get_option("mit3xxx_toolbar_show_search", "show");
    $showSearch = array('show', 'hide');

    
    ?>
	<div class="wrap">
	<h2>iconcy.com toolbar options</h2>
	
	<table width="100%" cellspacing="2" cellpadding="5" class="editform">
        <tr>
          <th nowrap valign="top" align="left" width="33%">This is a free service of <a href="http://www.iconcy.com/">iconcy.com</a>.<br/>If you like it, please donate.</th>
          <td>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick" />
			<input type="hidden" name="hosted_button_id" value="H685CBHW2RKPN" />
			<input type="image" src="https://www.paypal.com/en_US/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" />
			<img alt="" border="0" src="https://www.paypal.com/de_DE/i/scr/pixel.gif" width="1" height="1" />
			</form>
          </td>
        </tr>   	
	</table>
	
	  <form method="post" action="options.php">
        <?php settings_fields('iconcy-toolbar-settings-group'); ?>

        <legend>Layout settings</legend>
        <table width="100%" cellspacing="2" cellpadding="5" class="editform">
		
		<?php echo iconcy_getSelectBox('Theme', 'Select a theme.', 
									   'mit3xxx_toolbar_theme', $themes, $toolbar_theme); ?>
		
		
		<?php echo iconcy_getSelectBox('Style', 'Select a Style.', 
									   'mit3xxx_toolbar_style', $styles, $toolbar_style); ?>
									   
		<?php echo iconcy_getSelectBox('Position', 'Select a position.', 
		                               'mit3xxx_toolbar_position', $positions, $toolbar_position); ?>
		
		<?php echo iconcy_getTextBox('Distance From Top', 'Enter the distance from position. For example: 100px or 0px.', 
									 'mit3xxx_toolbar_distance', get_option("mit3xxx_toolbar_distance", "100px")); ?>

		<?php echo iconcy_getTextBox('Distance From Position', 'Enter the distance from position. For example: 100px or 0px.', 
									 'mit3xxx_toolbar_distance_from_position', get_option("mit3xxx_toolbar_distance_from_position", "0px")); ?>

		<?php echo iconcy_getSelectBox('Show JumpToTop button', 'Select JumpToTop visibility', 
		                               'mit3xxx_toolbar_show_back_to_top', $showBackToTop, $toolbar_show_back_to_top); ?>

		<?php echo iconcy_getSelectBox('Show JumpToBottom button', 'Select JumpToBottom visibility', 
		                               'mit3xxx_toolbar_show_back_to_bottom', $showBackToBottom, $toolbar_show_back_to_bottom); ?>
   
		<?php echo iconcy_getSelectBox('Show twitter button', 'Select twitter visibility', 
		                               'mit3xxx_toolbar_show_twitter', $showTwitter, $toolbar_show_twitter); ?>
        
		<?php echo iconcy_getSelectBox('Show facebook button', 'Select facebook visibility', 
		                               'mit3xxx_toolbar_show_facebook', $showFacebook, $toolbar_show_facebook); ?>
        
		<?php echo iconcy_getSelectBox('Show bookmark button', 'Select bookmark visibility', 
		                               'mit3xxx_toolbar_show_bookmarks', $showBookmarks, $toolbar_show_bookmarks); ?>

		<?php echo iconcy_getSelectBox('Show search button', 'Select search visibility', 
		                               'mit3xxx_toolbar_show_search', $showSearch, $toolbar_show_search); ?>

        </table>

        <legend>Optional settings</legend>
        <table width="100%" cellspacing="2" cellpadding="5" class="editform">

		<?php echo iconcy_getTextBox('Website', 'Enter the url of your website. For example: http://www.iconcy.com/', 
									 'mit3xxx_toolbar_website', get_option("mit3xxx_toolbar_website", "http://")); ?>
		
		<?php echo iconcy_getTextBox('RSS', 'Enter the url of your RSS-Feed. For example: http://www.iconcy.com/rss', 
									 'mit3xxx_toolbar_rss', get_option("mit3xxx_toolbar_rss", "http://")); ?>
 
		<?php echo iconcy_getTextBox('Twitter Account', 'Enter your twitter account. For example: iconcy_com', 
									 'mit3xxx_toolbar_twitter_account', get_option("mit3xxx_toolbar_twitter_account", "")); ?>

		<?php echo iconcy_getTextBox('Search Website', 'Enter the url of your website. For example: http://www.iconcy.com/', 
									 'mit3xxx_toolbar_search_website', get_option("mit3xxx_toolbar_search_website", "http://")); ?>

        </table>
		
        <legend>Account settings</legend>
        <table width="100%" cellspacing="2" cellpadding="5" class="editform">       

		<?php echo iconcy_getTextBox('Account ID (optional)', 'Enter your iconcy toolbar account ID. The format is: m3x-****-**', 
									 'mit3xxx_toolbar_account', get_option("mit3xxx_toolbar_account", "m3x-")); ?>
		
        </table>
        </fieldset>        


        <p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
                
      </form>
     
    </div>
<?php
} 



function iconcy_toolbar_footer($content) {
	$helper = new iconcy_common();
    $sTheme = $helper->formatTheme(get_option("mit3xxx_toolbar_theme", ""));
    $sStyle = $helper->formatStyle(get_option("mit3xxx_toolbar_style", ""));
    $sPosition = $helper->formatPosition(get_option("mit3xxx_toolbar_position", ""));
    $sDistance = $helper->formatDistance(get_option("mit3xxx_toolbar_distance", ""));
    $sDistanceFromPosition = $helper->formatDistanceFromPosition(get_option("mit3xxx_toolbar_distance_from_position", ""));

    $sWebsite = $helper->formatWebsite(get_option("mit3xxx_toolbar_website", ""));
    $sRss = $helper->formatRss(get_option("mit3xxx_toolbar_rss", ""));
    $sShowBackToTopButton = $helper->formatShowBackToTopButton(get_option("mit3xxx_toolbar_show_back_to_top", ""));
    $sShowBackToBottomButton = $helper->formatShowBackToBottomButton(get_option("mit3xxx_toolbar_show_back_to_bottom", ""));

    $sShowTwitterButton = $helper->formatShowTwitterButton(get_option("mit3xxx_toolbar_show_twitter", ""));
    $sTwitterAccount = $helper->formatTwitterAccount(get_option("mit3xxx_toolbar_twitter_account", ""));

    $sShowFacebookButton = $helper->formatShowFacebookButton(get_option("mit3xxx_toolbar_show_facebook", ""));
    
    $sShowBookmarkButton = $helper->formatShowBookmarkButton(get_option("mit3xxx_toolbar_show_bookmarks", ""));

    $sShowSearchButton = $helper->formatShowSearchButton(get_option("mit3xxx_toolbar_show_search", ""));
    $sSearchWebsite = $helper->formatSearchWebsite(get_option("mit3xxx_toolbar_search_website", ""));
    
    $sAccount = $helper->formatAccount(get_option("mit3xxx_toolbar_account", "m3x-"));

    $sCode = $helper->getToolbarCode('wordpress', '4.02',
                                      $sTheme, $sStyle, $sPosition, 
                                      $sDistance, $sDistanceFromPosition,
                                      $sWebsite, $sRss, 
                                      $sShowBackToTopButton, $sShowBackToBottomButton,
                                      $sShowTwitterButton, $sTwitterAccount,
                                      $sShowFacebookButton, $sShowBookmarkButton,
                                      $sShowSearchButton, $sSearchWebsite,
                                      $sAccount);
    
    echo $sCode;
    
    return $content;
}

?>
