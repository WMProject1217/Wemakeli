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
    echo "<a><echo class='headbaropinion'>=</echo></a>";
}
echo "<div class='headbartitle'>$wmui_title</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
bottombar:
if ($wmui_jumpoffbottombar=="1"){
    goto endwmui;
}
echo "<table class='bottombar'>";
echo "<tr>";
echo "<td>";
if ($wmui_classnow=="about") {
    echo "<a href='$wmsys_sysroot/about/'><img src='$wmsys_imagedb/common/websitelogotp.png' class='bottombarlogo' title='关于 Wemakeli'></img></a>";
} else {
    echo "<a href='$wmsys_sysroot/about/'><img src='$wmsys_imagedb/common/websitelogo.png' class='bottombarlogo' title='关于 Wemakeli'></img></a>";
}
if ($wmsys_userlogon=="1") {
    echo "<a href='" . 'javascript:bottombaruserls()' . "'>";
    echo "<img src='$wmsys_userfolder/userimage.png' class='bottombaruserimage' title='$wmsys_username' alt='$username'></img>";
    echo "<echo class='bottombarusername'>$wmsys_username</echo>";
    echo "</a>";
    echo "<table class='bottombaruserls' id='bottombaruserls'>";
    echo "<tr>";
    echo "<td>";
    echo "<echo class='bottombaruserbtfa'>个人主页</echo>";
    echo "<echo class='bottombaruserbtfb'>消息</echo>";
    echo "<echo class='bottombaruserbtfc'>创作中心</echo>";
    echo "<echo class='bottombaruserbtfd'>动态</echo>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "<a href='$wmsys_sysroot/accout/logon.php'>";
    echo "<img src='$wmsys_imagedb/common/user.png' class='bottombaruserimage' title='登录' alt='登录'></img>";
    echo "<echo class='bottombarusername'>登录</echo>";
    echo "</a>";
}
if ($wmui_classnow=="mainpage") {
    echo "<a href='$wmsys_sysroot/'>";
    echo "<echo class='bottombarfta'>主页</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/'>";
    echo "<echo class='bottombargta'>主页</echo>";
    echo "</a>";
}
if ($wmui_classnow=="video") {
    echo "<a href='$wmsys_sysroot/video/'>";
    echo "<echo class='bottombarftb'>视频</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/video/'>";
    echo "<echo class='bottombargtb'>视频</echo>";
    echo "</a>";
}
if ($wmui_classnow=="audio") {
    echo "<a href='$wmsys_sysroot/audio/'>";
    echo "<echo class='bottombarftc'>音频</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/audio/'>";
    echo "<echo class='bottombargtc'>音频</echo>";
    echo "</a>";
}
if ($wmui_classnow=="read") {
    echo "<a href='$wmsys_sysroot/read/'>";
    echo "<echo class='bottombarftd'>专栏</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/read/'>";
    echo "<echo class='bottombargtd'>专栏</echo>";
    echo "</a>";
}
if ($wmui_classnow=="live") {
    echo "<a href='$wmsys_sysroot/live/'>";
    echo "<echo class='bottombarfte'>直播</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_sysroot/live/'>";
    echo "<echo class='bottombargte'>直播</echo>";
    echo "</a>";
}
echo "</td>";
echo "</tr>";
echo "</table>";
endwmui:
echo "<script src='$wmsys_sysroot/main/js/wmui.js'></script>";
?>