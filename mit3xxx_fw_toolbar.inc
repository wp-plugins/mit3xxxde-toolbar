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

#function _mit3xxx_fw_getTwitterTextBegin($sValue) {
#    $sResult = trim($sValue);
#    return $sResult;    
#}

#function _mit3xxx_fw_getTwitterTextEnd($sValue) {
#    $sResult = trim($sValue);
#    return $sResult;    
#}

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

#function _mit3xxx_fw_getShowPrintButton($sValue) {
#    $sResult = _mit3xxx_fw_getBoolValue($sValue);
#    return $sResult;    
#}


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
                                    $sShowFacebookButton, $sShowBookmarkButton,
                                    $sShowSearchButton, $sSearchWebsite,
                                    $sAccount) {
    $sCode = '
    <div id="iconcy_toolbar">   
      <a id="iconcy_powered" href="http://www.iconcy.com/">
        <img src="http://toolbar.iconcy.de/static/images/blank.gif" alt="toolbar powered by www.iconcy.com" title="toolbar powered by www.iconcy.com" />
      </a>
    </div>   
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
    iconcyAccount = "#ACCOUNT#";
    
    iconcyDeprecatedConfig = {"distance_from_top": "#DISTANCE#", // distance 
                              "design": "#DESIGN#",                  
                              "facebook_show": "#SHOW_FACEBOOK#", 
                              "language": "en", 
                              "bookmark_show": "#SHOW_BOOKMARKS#", 
                              "search_website": "#SEARCH_WEBSITE#", 
                              "homepage_url": "#WEBSITE#", 
                              "rss_feed_url": "#RSS#", 
                              "account_status": "s", 
                              "theme": "#THEME#", 
                              "distance_from_position": "#DISTANCE_FROM_POSITION#", 
                              "twitter_show": "#SHOW_TWITTER#", 
                              "twitter_account": "#TWITTER_ACCOUNT#", 
                              "position": "#POSITION#", 
                              "back_to_bottom_show": "#SHOW_BACK_TO_BOTTOM#", 
                              "search_show": "#SHOW_SEARCH#", 
                              "back_to_top_show": "#SHOW_BACK_TO_TOP#",
                              "error": ""};    

    /* ]]> */    
    </script>
    <script src="http://toolbar.iconcy.de/static/js/iconcy.toolbar.main.js" type="text/javascript"></script>    
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
    
    $sCode = str_replace('#SHOW_FACEBOOK#', $sShowFacebookButton, $sCode);
    
    $sCode = str_replace('#SHOW_BOOKMARKS#', $sShowBookmarkButton, $sCode);
    
    $sCode = str_replace('#SHOW_SEARCH#', $sShowSearchButton, $sCode);
    $sCode = str_replace('#SEARCH_WEBSITE#', $sSearchWebsite, $sCode);
    
    $sCode = str_replace('#ACCOUNT#', $sAccount, $sCode);
    
    $sCode = trim($sCode);
    return $sCode;    
}
/* <code_generator> */
/* ------ */

