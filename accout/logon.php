<?php //By WMProject1217
include('../config.php');
$wmui_classnow = "user";
$wmui_title = "登录 - " . $wmsys_name;
$wmui_backpath = "../";
echo "<table class='pagedatamain'>";
echo "<tr>";
echo "<td>";
include('../wmui/wmui.php');
echo "<a href='./logonother.php'><echo class='logonpagela'>从其它区域登录</echo></a>";
echo "<a href='./newuser.php'><echo class='logonpagelb'>创建新用户</echo></a>";
echo "<a><echo class='logonpagelc' id='Power'>Powered by ilibilib</echo></a>";
?>
<button type="button" onclick='document.getElementById("Power").innerHTML = "Not powered by bilibili"'>点击我！</button>
<?php
echo "<img src='$wmsys_imagedb/common/user.png' class='logonpageuserimage' alt='User Image'></img>";
echo "<form action='postlogon.php' method='POST'>";
echo "<input type='text' name='useruid' class='logonpageuseruid'></input>";
echo "<input type='password' name='userpassword' class='logonpageuserpassword'></input>";
echo "<input type='submit' class='logonpagelogonbutton' value='登录'>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
?>