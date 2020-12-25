<?php
include('../config.php');
$userinfofile = @ fopen("userinfo.wmst", "r") or die("<title>Error 0x00000007</title>Error 0x00000007<br>User info load unsuccessful.");
$usernamerc = fgets($userinfofile);
$addintime = fgets($userinfofile);
$userid= fgets($userinfofile);
fclose($userinfofile);
$userinfofile = @ fopen("usersettings.wmst", "r") or die("<title>Error 0x00000007</title>Error 0x00000007<br>User info load unsuccessful.");
$useraccout = fgets($userinfofile);
$indexwords = fgets($userinfofile);
$userlevel= fgets($userinfofile);
fclose($userinfofile);
$userspacesettings = @ fopen("space.wmst", "r") or die("<title>Error 0x00000008</title>Error 0x00000008<br>User space info load unsuccessful.");
$visitcontrol = fgets($userspacesettings);
fclose($userspacesettings);

echo "<head>";
include("../pattern/autoexec.php");

echo "<title>" . $usernamerc . "_" . $wmsys_name . "</title>";
echo "</head>";
echo "<body>";
include("../pattern/topline.php");
echo "<table class='maindataindex'>";
echo "<tr>";
echo "<td>";
echo " ";
echo "<img src=./user.png class=userimage></img>";
echo "<h3>$usernamerc</h3>";
echo "<div>等级 : $userlevel , 入站时间 : $addintime , uid : $userid</div>";
echo "<div>$indexwords</div>";
echo "<div>此人发布的作品</div>";
echo "<pre>";
@ readfile("output.wmst");
echo "</pre>";
print "Fatal Error : API not found . ( 0x00CE0404 )";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>