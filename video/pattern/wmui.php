<?php
echo "<br>";
echo "<br>";
echo "<div></div>";
echo "<link rel='stylesheet' href='$wmsys_sysroot/main/css/wmui.css'>";
echo "<title>$wmui_title</title>";
headbar:
if ($wmui_jumpoffheadbar=="1"){
    goto bottombar;
}
echo "<table class='headbar'>";
echo "<tr>";
echo "<td>";
if ($wmui_classnow<>"mainpage") {
    echo "<a href='" . $wmui_backpath . "'><echo class='headbarbackbutton'><</echo></a>";
    //echo "<a><echo class='headbaropinion'>=</echo></a>";
}
echo "<div class='headbartitle'>$wmui_title</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
bottombar:
if ($wmui_jumpoffbottombar=="1"){
    goto endwmui;
}
echo "<table class='bottombar' id='bottombar'>";
echo "<tr>";
echo "<td>";
if ($wmui_classnow=="about") {
    echo "<a href='$wmsys_sysroot/about/'><img src='$wmsys_imagedb/common/websitelogotp.png' class='bottombarlogo' title='$langstr_WMUI_bar_about Wemakeli'></img></a>";
} else {
    echo "<a href='$wmsys_sysroot/about/'><img src='$wmsys_imagedb/common/websitelogo.png' class='bottombarlogo' title='$langstr_WMUI_bar_about Wemakeli'></img></a>";
}
if ($wmsys_userlogon=="1") {
    echo "<a href='" . 'javascript:bottombaruserls()' . "'>";
    echo "<img src='$wmsys_userfolder/userimage.png' class='bottombaruserimage' title='$wmsys_username' alt='$username'></img>";
    echo "<echo class='bottombarusername'>$wmsys_username</echo>";
    echo "</a>";
    echo "<table class='bottombaruserls' id='bottombaruserls'>";
    echo "<tr>";
    echo "<td>";
    echo "<a href='$wmsys_sysroot/user/$wmsys_useruid'><echo class='bottombaruserbtfa'>$langstr_WMUI_User_0</echo></a>";
    echo "<a href='$wmsys_sysroot/accout/message.php'><echo class='bottombaruserbtfb'>$langstr_WMUI_User_1</echo></a>";
    echo "<a href='$wmsys_sysroot/accout/platform.php'><echo class='bottombaruserbtfc'>$langstr_WMUI_User_2</echo></a>";
    echo "<a href='$wmsys_sysroot/accout/dynamic.php'><echo class='bottombaruserbtfd'>$langstr_WMUI_User_3</echo></a>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "<a href='$wmsys_sysroot/accout/logon.php'>";
    echo "<img src='$wmsys_imagedb/common/user.png' class='bottombaruserimage' title='$langstr_WMUI_User_4' alt='$langstr_WMUI_User_4'></img>";
    echo "<echo class='bottombarusername'>$langstr_WMUI_User_4</echo>";
    echo "</a>";
}
if ($wmui_classnow=="mainpage") {
    echo "<a href='$wmsys_sysroot/'>";
    echo "<echo class='bottombarfta'>$langstr_WMUI_tabs_0</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/'>";
    echo "<echo class='bottombargta'>$langstr_WMUI_tabs_0</echo>";
    echo "</a>";
}
if ($wmui_classnow=="video") {
    echo "<a href='$wmsys_sysroot/video/'>";
    echo "<echo class='bottombarftb'>$langstr_WMUI_tabs_1</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/video/'>";
    echo "<echo class='bottombargtb'>$langstr_WMUI_tabs_1</echo>";
    echo "</a>";
}
if ($wmui_classnow=="audio") {
    echo "<a href='$wmsys_sysroot/audio/'>";
    echo "<echo class='bottombarftc'>$langstr_WMUI_tabs_2</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/audio/'>";
    echo "<echo class='bottombargtc'>$langstr_WMUI_tabs_2</echo>";
    echo "</a>";
}
if ($wmui_classnow=="read") {
    echo "<a href='$wmsys_sysroot/read/'>";
    echo "<echo class='bottombarftd'>$langstr_WMUI_tabs_3</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/read/'>";
    echo "<echo class='bottombargtd'>$langstr_WMUI_tabs_3</echo>";
    echo "</a>";
}
if ($wmui_classnow=="live") {
    echo "<a href='$wmsys_sysroot/live/'>";
    echo "<echo class='bottombarfte'>$langstr_WMUI_tabs_4</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/live/'>";
    echo "<echo class='bottombargte'>$langstr_WMUI_tabs_4</echo>";
    echo "</a>";
}
echo "</td>";
echo "</tr>";
echo "</table>";
endwmui:
echo "<script src='$wmsys_sysroot/main/js/wmui.js'></script>";
?>