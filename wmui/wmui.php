<?php
echo "<script src='$wmsys_wmuipath/wmui.js'></script>";
echo "<link rel='stylesheet' href='$wmsys_wmuipath/wmui.css'>";
echo "<table class='headbar'>";
echo "<tr>";
echo "<td>";
echo "<a href='" . $wmui_backpath . "'><echo class='headbarbackbutton'><</echo></a>";
echo "<a><echo class='headbaropinion'>=</echo></a>";
echo "<div class='headbartitle'>$wmui_title</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table class='bottombar'>";
echo "<tr>";
echo "<td>";
if ($wmui_classnow=="about") {
    echo "<a href='$wmsys_wmuipath/about/'><img src='$wmsys_imagedb/common/websitelogotp.png' class='bottombarlogo' title='关于 Wemakeli'></img></a>";
} else {
    echo "<a href='$wmsys_wmuipath/about/'><img src='$wmsys_imagedb/common/websitelogo.png' class='bottombarlogo' title='关于 Wemakeli'></img></a>";
}
if ($wmsys_userlogon=="1") {
    echo "<a href='$wmsys_userfolder/'>";
    echo "<img src='$wmsys_userfolder/userimage.png' class='bottombaruserimage' title='$wmsys_username' alt='$username'></img>";
    echo "<echo class='bottombarusername'>$wmsys_username</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_accoutpath/logon.php'>";
    echo "<img src='$wmsys_imagedb/common/user.png' class='bottombaruserimage' title='登录' alt='登录'></img>";
    echo "<echo class='bottombarusername'>登录</echo>";
    echo "</a>";
}
if ($wmui_classnow=="mainpage") {
    echo "<a href='$wmsys_wmuipath/'>";
    echo "<echo class='bottombarfta'>主页</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_wmuipath/'>";
    echo "<echo class='bottombargta'>主页</echo>";
    echo "</a>";
}
if ($wmui_classnow=="video") {
    echo "<a href='$wmsys_wmuipath/video/'>";
    echo "<echo class='bottombarftb'>视频</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_wmuipath/video/'>";
    echo "<echo class='bottombargtb'>视频</echo>";
    echo "</a>";
}
if ($wmui_classnow=="audio") {
    echo "<a href='$wmsys_wmuipath/audio/'>";
    echo "<echo class='bottombarftc'>音频</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_wmuipath/audio/'>";
    echo "<echo class='bottombargtc'>音频</echo>";
    echo "</a>";
}
if ($wmui_classnow=="read") {
    echo "<a href='$wmsys_wmuipath/read/'>";
    echo "<echo class='bottombarftd'>专栏</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_wmuipath/read/'>";
    echo "<echo class='bottombargtd'>专栏</echo>";
    echo "</a>";
}
if ($wmui_classnow=="rtmessage") {
    echo "<a href='$wmsys_wmuipath/rtmessage/'>";
    echo "<echo class='bottombarfte'>动态</echo>";
    echo "</a>";
} else {
    echo "<a href='$wmsys_wmuipath/rtmessage/'>";
    echo "<echo class='bottombargte'>动态</echo>";
    echo "</a>";
}
echo "</td>";
echo "</tr>";
echo "</table>";

?>