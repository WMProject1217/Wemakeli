<?php //By WMProject1217
//WMSYS Automatic Execute
echo "<meta charset='UTF-8'>";
echo "<link href='$wmsys_sysroot/webicon.ico' rel='icon' type='image/ico'>";
//WMSYS Basic Values
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
?>