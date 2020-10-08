<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000007</title>Error 0x00000007<br>User info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
$password = sha1($_GET['password']);
echo $password . "<br>" ;
if ($password=="fc0598218e3b040ab2a12106be93b2883224318c") {
    goto round;
}else{
    echo "Error password";
    echo "<br>";
    echo "<a href='" . $websiteaddress . "'>";
    echo "<input name='主页' type='button' id='topline_websitemain' title='主页' value='主页'>";
    echo "</a>";
    goto stop;
}
round:
$username='WMProject1217';
echo setcookie("username",$username,time()+65535,'/');
echo "<br>Login succcessful<br>";
echo isset($_COOKIE["username"]);
echo "<meta http-equiv='refresh' content=1;url='$websiteaddress/index.php'>";
stop:
?>