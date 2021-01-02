<?php //By WMProject1217
//WMSYS Automatic Execute
echo "<meta charset='UTF-8'>";
echo "<link href='$wmsys_sysroot/webicon.ico' rel='icon' type='image/ico'>";
//WMSYS Basic Values
$wmsys_langmode="zh-cn";
$wmsys_address="http://wemakeli.net.wm";
$wmsys_name="Wemakeli";
$wmsys_sysroot=$wmsys_address;
$wmsys_imagedb=$wmsys_address . "/main/picture";
//WMSYS User Values
if (isset($_COOKIE["username"])){
    $wmsys_userlogon="1";
    $wmsys_username=$_COOKIE['username'];
    $wmsys_useruid=$_COOKIE['useruid'];
    $wmsys_userfolder=$wmsys_sysroot . "/user/$wmsys_useruid";
} else {
    $wmsys_userlogon="0";
    $wmsys_username="?";
    $wmsys_useruid="-1";
    $wmsys_userfolder=$wmsys_imagedb . "/common/user.png";
}
//Language String
if ($wmsys_langmode=='zh-cn'){
    $langstr_WMUI_User_0='个人主页';
    $langstr_WMUI_User_1='消息';
    $langstr_WMUI_User_2='创作中心';
    $langstr_WMUI_User_3='动态';
    $langstr_WMUI_User_4='登录';
    $langstr_WMUI_tabs_0='主页';
    $langstr_WMUI_tabs_1='视频';
    $langstr_WMUI_tabs_2='音频';
    $langstr_WMUI_tabs_3='专栏';
    $langstr_WMUI_tabs_4='直播';
    $langstr_WMUI_bar_about='关于';
    $langstr_WMUI_logon_0='从其它区域登录';
    $langstr_WMUI_logon_1='创建新用户';
    $langstr_WMUI_logon_2='登录';
} else if ($wmsys_langmode=='en-us'){
    $langstr_WMUI_User_0='User Page';
    $langstr_WMUI_User_1='Messgae';
    $langstr_WMUI_User_2='Platform';
    $langstr_WMUI_User_3='Dynamic';
    $langstr_WMUI_User_4='Logon';
    $langstr_WMUI_tabs_0='Main';
    $langstr_WMUI_tabs_1='Video';
    $langstr_WMUI_tabs_2='Audio';
    $langstr_WMUI_tabs_3='Read';
    $langstr_WMUI_tabs_4='Live';
    $langstr_WMUI_bar_about='About';
    $langstr_WMUI_logon_0='Logon other domain';
    $langstr_WMUI_logon_1='Create new user';
    $langstr_WMUI_logon_2='Logon';
}
?>