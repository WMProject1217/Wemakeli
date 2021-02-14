<?php //By WMProject1217
//Config File
$wmsys_name = "Wemakeli";
$wmsys_lang = "zh-cn";
$wmsys_sysroot = "http://wemakeli.net.wm";
$wmsys_sysrootr = "C:/Wemakeli";
$wmsys_assets = $wmsys_sysroot . "/assets";
$wmsys_assetsr = $wmsys_sysrootr . "/assets";
$wmsys_dbroot = $wmsys_sysroot . "/library";
$wmsys_dbrootw = $wmsys_sysrootr . "/library";
echo "<script src='$wmsys_assets/js/jquery-3.4.1.js'></script>";
echo "<script src='$wmsys_assets/wmui/wmui.js'></script>";
echo "<link rel='stylesheet' href='$wmsys_assets/wmui/wmui.css'>";
echo "<link href='$wmsys_sysroot/favicon.ico' rel='icon' type='image/ico'>";
include("$wmsys_assetsr/language/lang$wmsys_lang.php");
if (isset($_COOKIE["username"])){
    $wmsys_userlogon="1";
    $wmsys_username=$_COOKIE['username'];
    $wmsys_useruid=$_COOKIE['useruid'];
    $wmsys_userfolder=$wmsys_sysroot . "/user/$wmsys_useruid";
}
?>