<?php //By WMProject1217
//Draw UI
headbar:
if ($wmui_jumpoffheadbar=="1"){
    goto bottombar;
}
echo "<table class='wmuiheadbar' id='wmuiheadbar'>";
echo "<tr>";
echo "<td>";
if ($wmui_classnow<>"mainpage") {
    echo "<a class='wmuiheadbarbackbutton' href='$wmui_backpath'><</a>";
    echo "<a class='wmuiheadbartimeblock' id='wmuiheadbartimeblock'>See this text means js error</a>";
}
echo "<div class='wmuiheadbartitle'>$wmui_title</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
bottombar:
if ($wmui_jumpoffbottombar=="1"){
    goto enddrawui;
}
echo "<table class='wmuibottombar' id='wmuibottombar'>";
echo "<tr>";
echo "<td>";
if ($wmui_classnow=="about") {
    echo "<a href='$wmsys_sysroot/about/'><img src='$wmsys_dbroot/image/common/websitelogotp.png' class='wmuibottombarlogo' title='$langstr_WMUI_bar_about Wemakeli'></img></a>";
} else {
    echo "<a href='$wmsys_sysroot/about/'><img src='$wmsys_dbroot/image/common/websitelogo.png' class='wmuibottombarlogo' title='$langstr_WMUI_bar_about Wemakeli'></img></a>";
}
if ($wmsys_userlogon=="1") {
    echo "<a href='" . 'javascript:bottombaruserls()' . "'>";
    echo "<img src='$wmsys_userfolder/userimage.png' class='wmuibottombaruserimage' title='$wmsys_username' alt='$username'></img>";
    echo "<echo class='wmuibottombarusername'>$wmsys_username</echo>";
    echo "</a>";
    echo "<table class='wmuibottombaruserls' id='wmuibottombaruserls'>";
    echo "<tr>";
    echo "<td>";
    echo "<a href='$wmsys_sysroot/user/?useruid=$wmsys_useruid'><echo class='wmuibottombaruserbtfa'>$langstr_WMUI_User_0</echo></a>";
    echo "<a href='$wmsys_sysroot/account/message.php'><echo class='wmuibottombaruserbtfb'>$langstr_WMUI_User_1</echo></a>";
    echo "<a href='$wmsys_sysroot/account/platform.php'><echo class='wmuibottombaruserbtfc'>$langstr_WMUI_User_2</echo></a>";
    echo "<a href='$wmsys_sysroot/account/dynamic.php'><echo class='wmuibottombaruserbtfd'>$langstr_WMUI_User_3</echo></a>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "<a href='$wmsys_sysroot/account/logon.php'>";
    echo "<img src='$wmsys_dbroot/image/common/user.png' class='wmuibottombaruserimage' title='$langstr_WMUI_User_4' alt='$langstr_WMUI_User_4'></img>";
    echo "<echo class='wmuibottombarusername'>$langstr_WMUI_User_4</echo>";
    echo "</a>";
}
if ($wmui_classnow=="mainpage") {
    echo "<a href='$wmsys_sysroot/'>";
    echo "<echo class='wmuibottombarfta'>$langstr_WMUI_tabs_0</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/'>";
    echo "<echo class='wmuibottombargta'>$langstr_WMUI_tabs_0</echo>";
    echo "</a>";
}
if ($wmui_classnow=="video") {
    echo "<a href='$wmsys_sysroot/video/'>";
    echo "<echo class='wmuibottombarftb'>$langstr_WMUI_tabs_1</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/video/'>";
    echo "<echo class='wmuibottombargtb'>$langstr_WMUI_tabs_1</echo>";
    echo "</a>";
}
if ($wmui_classnow=="audio") {
    echo "<a href='$wmsys_sysroot/audio/'>";
    echo "<echo class='wmuibottombarftc'>$langstr_WMUI_tabs_2</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/audio/'>";
    echo "<echo class='wmuibottombargtc'>$langstr_WMUI_tabs_2</echo>";
    echo "</a>";
}
if ($wmui_classnow=="read") {
    echo "<a href='$wmsys_sysroot/read/'>";
    echo "<echo class='wmuibottombarftd'>$langstr_WMUI_tabs_3</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/read/'>";
    echo "<echo class='wmuibottombargtd'>$langstr_WMUI_tabs_3</echo>";
    echo "</a>";
}
if ($wmui_classnow=="live") {
    echo "<a href='$wmsys_sysroot/live/'>";
    echo "<echo class='wmuibottombarfte'>$langstr_WMUI_tabs_4</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/live/'>";
    echo "<echo class='wmuibottombargte'>$langstr_WMUI_tabs_4</echo>";
    echo "</a>";
}
echo "</td>";
echo "</tr>";
echo "</table>";
enddrawui:
?>