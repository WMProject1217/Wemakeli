<?php //By WMProject1217

echo "<head>";
include('./patterns/autoexec.php');
echo "<title>用户中心_" . $websitename . "</title>";
echo "</head>";
echo "<body>";
include('./patterns/topline.php');
echo "<table class=maindataindex>";
echo "<tr>";
echo "<td>";
echo "<a href='./examadin/'>";
echo "<input name='考试' type='button' class='accout_exam' title='考试' value='考试'>";
echo "</a><br>";
echo "<a href='/accout/workcenter.php'>";
echo "<input name='修改名称' type='button' class='accout_changename' title='修改名称' value='修改名称'>";
echo "</a>";
echo "<a href='/accout/workcenter.php'>";
echo "<input name='修改备注' type='button' class='accout_changeindex' title='修改备注' value='修改备注'>";
echo "</a>";
echo "<a href='/accout/workcenter.php'>";
echo "<input name='修改密码' type='button' class='accout_changepassword' title='修改密码' value='修改密码'>";
echo "</a>";
echo "<a href='./accoutlogoff.php'>";
echo "<input name='退出登录' type='button' class='accout_logoff' title='退出登录' value='退出登录'>";
echo "</a>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>