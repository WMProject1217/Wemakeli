<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
echo "<meta charset='UTF-8'>";

//td.toplineback
echo "<table border='1' id='toplineback'>";
echo "<tr>";
echo "<td class='back'>";
echo "</td>";
echo "</tr>";
echo "</table>";

//td.topline
echo "<table border='1' id='topline'>";
echo "<tr>";
echo "<td class='topline'>";
echo "<a href='" . $websiteaddress . "'>";
echo "<input name='" . $websitename . "' type='button' id='topline_websitename' title='" . $websitename . "' value='" . $websitename . "'>";
echo "</a>";
echo "<a href='" . $websiteaddress . "'>";
echo "<input name='主页' type='button' id='topline_websitemain' title='主页' value='主页'>";
echo "</a>";
echo "<a href='" . $websiteaddress . "/videolist.php'>";
echo "<input name='视频' type='button' id='topline_videolist' title='视频' value='视频'>";
echo "</a>";
echo "<a href='" . $websiteaddress . "/audiolist.php'>";
echo "<input name='音频' type='button' id='topline_audiolist' title='音频' value='音频'>";
echo "</a>";
echo "<a href='" . $websiteaddress . "/readlist.php'>";
echo "<input name='专栏' type='button' id='topline_readlist' title='专栏' value='专栏'>";
echo "</a>";
echo "</td>";
echo "</tr>";
echo "</table>";
//td.topline
echo "<table border='1' id='toplinelogin'>";
echo "<tr>";
echo "<td class='accout'>";
if (isset($_COOKIE["username"])){
  echo $_COOKIE["username"];
  echo "<a href='" . $websiteaddress . "/uploadvideo.php'>";
  echo "<input name='投稿视频' type='button' id='topline_workcenter' title='投稿视频' value='投稿视频'>";
  echo "</a>";
  echo "<a href='" . $websiteaddress . "/workcenter.php'>";
  echo "<input name='创作中心' type='button' id='topline_workcenter' title='创作中心' value='创作中心'>";
  echo "</a>";
  echo "<a href='" . $websiteaddress . "/accoutcenter.php'>";
  echo "<input name='用户中心' type='button' id='topline_accoutcenter' title='用户中心' value='用户中心'>";
  echo "</a>";
  echo "<a href='" . $websiteaddress . "/accoutlogoff.php'>";
  echo "<input name='退出登录' type='button' id='topline_logoff' title='退出登录' value='退出登录'>";
  echo "</a>";
  echo "</td>";
  echo "</tr>";
  echo "</table>";
}else{
  echo "用户未登录";
  echo "<a href='" . $websiteaddress . "/accoutlogin.php'>";
  echo "<input name='登录' type='button' id='topline_login' title='登录' value='登录'>";
  echo "</a>";
  echo "</td>";
  echo "</tr>";
  echo "</table>";
}
?>