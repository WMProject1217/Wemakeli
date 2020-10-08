<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000007</title>Error 0x00000007<br>User info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
$userpassword = fopen("./database/user/0/password.wmst", "r") or die('Error 404 : Username is not found');
$userpasswordmd5 = fgets($userpassword);
fclose($userpassword);
if ($password = $userpasswordmd5){
    goto round;
}else{
    echo "Password Error";
    echo "<br>";
    echo "<a href='" . $websiteaddress . "'>";
    echo "<input name='返回主页' type='button' id='topline_websitename' title='返回主页' value='返回主页'>";
    echo "</a>";
    //echo "<meta http-equiv='refresh' content=1;url='$websiteaddress/index.php'>";
    goto stop;
}
round:
$username='rootadmin';
setcookie("username",$username,time()+65535);
//echo "<meta http-equiv='refresh' content=1;url='$websiteaddress/index.php'>";
stop:
?>