<?php

/* ------ */
/* <design_and_position> */
function _mit3xxx_fw_getTheme($sValue) {
    $sResult = trim($sValue);
    if ("" == $sResult) {
        $sResult = "start";
    }
    return $sResult;
}

function _mit3xxx_fw_getStyle($sValue) {
    $sResult = trim($sValue);
    if ("" == $sResult) {
        $sResult = "cutter";
    }
    return $sResult;   
}

function _mit3xxx_fw_getPosition($sValue) {
    $sResult = trim($sValue);
    if ("" == $sResult) {
        $sResult = "left";
    }
    return $sResult;       
}

function _mit3xxx_fw_getDistance($sValue) {
    $sResult = trim($sValue);
    if ("" == $sResult) {
        $sResult = "100px";
    }
    $sResult = str_replace('px', '', $sResult);
    $sResult = str_replace('%', '', $sResult);
    return $sResult;       
}

function _mit3xxx_fw_getDistanceFromPosition($sValue) {
    $sResult = trim($sValue);
    if ("" == $sResult) {
        $sResult = "0px";
    }
    $sResult = str_replace('px', '', $sResult);
    $sResult = str_replace('%', '', $sResult);
    return $sResult;       
}
/* </design_and_position> */
/* ------ */



/* ------ */
/* <buttons_and_content> */
function _mit3xxx_fw_getWebsite($sValue) {
    $sResult = _mit3xxx_fw_getValidURL($sValue);
    return $sResult;
}

function _mit3xxx_fw_getRss($sValue) {
    $sResult = _mit3xxx_fw_getValidURL($sValue);
    return $sResult;
}

function _mit3xxx_fw_getShowBackToTopButton($sValue) {
    $sResult = _mit3xxx_fw_getBoolValue($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getShowBackToBottomButton($sValue) {
    $sResult = _mit3xxx_fw_getBoolValue($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getShowTwitterButton($sValue) {
    $sResult = _mit3xxx_fw_getBoolValue($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getTwitterAccount($sValue) {
    $sResult = trim($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getTwitterTextBegin($sValue) {
    $sResult = trim($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getTwitterTextEnd($sValue) {
    $sResult = trim($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getShowFacebookButton($sValue) {
    $sResult = _mit3xxx_fw_getBoolValue($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getShowBookmarkButton($sValue) {
    $sResult = _mit3xxx_fw_getBoolValue($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getShowSearchButton($sValue) {
    $sResult = _mit3xxx_fw_getBoolValue($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getSearchWebsite($sValue) {
    $sResult = trim($sValue);
    return $sResult;    
}

function _mit3xxx_fw_getShowPrintButton($sValue) {
    $sResult = _mit3xxx_fw_getBoolValue($sValue);
    return $sResult;    
}


/* </buttons_and_content> */
/* ------ */


/* ------ */
/* <account> */
function _mit3xxx_fw_getAccount($sValue) {
    $sResult = "anonymous";
    $account = trim($sValue);
    if ("" != $account && "m3x-" != $account) {
        $sResult = $account;
    }
    return $sResult;
}
/* </account> */
/* ------ */


/* ------ */
/* <helper> */
function _mit3xxx_fw_getValidURL($sUrl) {
    $sResult = "";
    $sTrim = trim($sUrl);
    if ("http://" != $sTrim && "" != $sTrim) {
        $sResult = $sTrim;
    }
    return $sResult;
}

function _mit3xxx_fw_getBoolValue($sValue) {
    $sResult = "false";
    $sTmpValue = trim($sValue);
    if ("show" == $sTmpValue) {
        $sResult = "true";
    }
    return $sResult;
}
/* </helper> */
/* ------ */

/* ------ */
/* <code_generator> */
function _mit3xxx_fw_getToolbarCode($sSource, $sVersion,
                                    $sTheme, $sStyle, $sPosition, 
                                    $sDistance, $sDistanceFromPosition,
                                    $sWebsite, $sRss, 
                                    $sShowBackToTopButton, $sShowBackToBottomButton,
                                    $sShowTwitterButton, $sTwitterAccount,
                                    $sTwitterTextBegin, $sTwitterTextEnd,
                                    $sShowFacebookButton, $sShowBookmarkButton,
                                    $sShowSearchButton, $sSearchWebsite,
                                    $sShowPrintButton,
                                    $sAccount) {
    $sCode = '
    <div id="mit3xxx_toolbar" class="mit3xxx_toolbar">
      <a id="mit3xxx_toolbar_powered" href="http://www.iconcy.com/">
        <img src="http://toolbar.mit3xxx.de/static/images/blank.gif" alt="toolbar powered by www.iconcy.com" title="toolbar powered by www.iconcy.com" />
      </a>
    </div>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */    
    mit3xxxToolbarOptions = {};
    mit3xxxToolbarOptions.source = "#SOURCE#";
    mit3xxxToolbarOptions.version = "#VERSION#";
    
    mit3xxxToolbarOptions.theme = "#THEME#";
    mit3xxxToolbarOptions.design = "#DESIGN#";
    mit3xxxToolbarOptions.position = "#POSITION#";
    mit3xxxToolbarOptions.distance = "#DISTANCE#";
    mit3xxxToolbarOptions.distance_from_position = "#DISTANCE_FROM_POSITION#";
    
    mit3xxxToolbarOptions.homepage = "#WEBSITE#";
    mit3xxxToolbarOptions.show_back_to_top = #SHOW_BACK_TO_TOP#;
    mit3xxxToolbarOptions.show_back_to_bottom = #SHOW_BACK_TO_BOTTOM#;
    mit3xxxToolbarOptions.rss = "#RSS#";
    
    mit3xxxToolbarOptions.show_twitter = #SHOW_TWITTER#;
    mit3xxxToolbarOptions.twitter_account = "#TWITTER_ACCOUNT#";
    mit3xxxToolbarOptions.twitter_text_begin = "#TWITTER_TEXT_BEGIN#";
    mit3xxxToolbarOptions.twitter_text_end = "#TWITTER_TEXT_END#";
    
    mit3xxxToolbarOptions.show_facebook = #SHOW_FACEBOOK#;
    
    mit3xxxToolbarOptions.show_bookmarks = #SHOW_BOOKMARKS#;
    
    mit3xxxToolbarOptions.show_search = #SHOW_SEARCH#;
    mit3xxxToolbarOptions.search_website = "#SEARCH_WEBSITE#";
    
    mit3xxxToolbarOptions.show_print = #SHOW_PRINT#;
    
    mit3xxxToolbarOptions.account = "#ACCOUNT#";
    /* ]]> */    
    </script>
    <script src="http://toolbar.mit3xxx.de/static/js/m3x-toolbar.js" type="text/javascript"></script>    
    ';
    
    $sCode = str_replace('#SOURCE#', $sSource, $sCode);
    $sCode = str_replace('#VERSION#', $sVersion, $sCode);
    
    $sCode = str_replace('#THEME#', $sTheme, $sCode);
    $sCode = str_replace('#DESIGN#', $sStyle, $sCode);
    $sCode = str_replace('#POSITION#', $sPosition, $sCode);
    $sCode = str_replace('#DISTANCE#', $sDistance, $sCode);
    $sCode = str_replace('#DISTANCE_FROM_POSITION#', $sDistanceFromPosition, $sCode); 
    
    $sCode = str_replace('#WEBSITE#', $sWebsite, $sCode);
    $sCode = str_replace('#SHOW_BACK_TO_TOP#', $sShowBackToTopButton, $sCode);
    $sCode = str_replace('#SHOW_BACK_TO_BOTTOM#', $sShowBackToBottomButton, $sCode);
    $sCode = str_replace('#RSS#', $sRss, $sCode);
    
    $sCode = str_replace('#SHOW_TWITTER#', $sShowTwitterButton, $sCode);
    $sCode = str_replace('#TWITTER_ACCOUNT#', $sTwitterAccount, $sCode);
    $sCode = str_replace('#TWITTER_TEXT_BEGIN#', $sTwitterTextBegin, $sCode);
    $sCode = str_replace('#TWITTER_TEXT_END#', $sTwitterTextEnd, $sCode);
    
    $sCode = str_replace('#SHOW_FACEBOOK#', $sShowFacebookButton, $sCode);
    
    $sCode = str_replace('#SHOW_BOOKMARKS#', $sShowBookmarkButton, $sCode);
    
    $sCode = str_replace('#SHOW_SEARCH#', $sShowSearchButton, $sCode);
    $sCode = str_replace('#SEARCH_WEBSITE#', $sSearchWebsite, $sCode);
    
    $sCode = str_replace('#SHOW_PRINT#', $sShowPrintButton, $sCode);
    
    $sCode = str_replace('#ACCOUNT#', $sAccount, $sCode);
    
    $sCode = trim($sCode);
    return $sCode;    
}
/* <code_generator> */
/* ------ */

