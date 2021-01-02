<?php //By WMProject1217
if (isset($_COOKIE["useruid"])){
$useruid=$_COOKIE['useruid'];
$userimage = "$wmsys_address/user/$useruid/user.png";
}
echo "<meta charset='UTF-8'>";

//td.toplineback
echo "<table class='toplineback'>";
echo "<tr>";
echo "<td>";
echo "</td>";
echo "</tr>";
echo "</table>";

//td.topline
echo "<table class='topline'>";
echo "<tr>";
echo "<td>";
echo "<a href='" . $wmsys_address . "'>";
echo "<img src=' $wmsys_address/main/picture/common/titleimage.png' class='websitetitleimage' title='$websitename' alt='$websitename'></img>";
echo "</a>";
echo "<a href='" . $wmsys_address . "'>";
echo "<input name='主页' type='button' class='topline_websitemain' title='主页' value='主页'>";
echo "</a>";
echo "<a href='" . $wmsys_address . "/video/'>";
echo "<input name='视频' type='button' class='topline_videolist' title='视频' value='视频'>";
echo "</a>";
echo "<a href='" . $wmsys_address . "/audio/'>";
echo "<input name='音频' type='button' class='topline_audiolist' title='音频' value='音频'>";
echo "</a>";
echo "<a href='" . $wmsys_address . "/read/'>";
echo "<input name='专栏' type='button' class='topline_readlist' title='专栏' value='专栏'>";
echo "</a>";
echo "<a href='" . $wmsys_address . "/file/'>";
echo "<input name='文件' type='button' class='topline_readlist' title='文件' value='文件'>";
echo "</a>";
echo "</td>";
echo "</tr>";
echo "</table>";
//td.topline
echo "<table class='toplinelogin'>";
echo "<tr>";
echo "<td>";
if (isset($_COOKIE["username"])){
  $username=$_COOKIE['username'];
  echo "<a href='" . $wmsys_address . "/user/$useruid/index.php'>";
  echo "<img src='$userimage' class='toplineuserimage' title='$username' alt='$username'></img>";
  echo "<echo class=toplineecho>$username</echo>";
  echo "</a>";
  echo "<a href='" . $wmsys_address . "/accout/message.php'>";
  echo "<input name='消息' type='button' class='topline_message' title='消息' value='消息'>";
  echo "</a>";
  echo "<a href='" . $wmsys_address . "/accout/rtmessage.php'>";
  echo "<input name='动态' type='button' class='topline_rtmessage' title='动态' value='动态'>";
  echo "</a>";
  echo "<a href='" . $wmsys_address . "/accout/favorite.php'>";
  echo "<input name='收藏' type='button' class='topline_favorite' title='收藏' value='收藏'>";
  echo "</a>";
  echo "<a href='" . $wmsys_address . "/accout/history.php'>";
  echo "<input name='历史' type='button' class='topline_history' title='历史' value='历史'>";
  echo "</a>";
  echo "<a href='" . $wmsys_address . "/accout/workcenter.php'>";
  echo "<input name='创作中心' type='button' class='topline_workcenter' title='创作中心' value='创作中心'>";
  echo "</a>";
  echo "<a href='" . $wmsys_address . "/accout/accoutcenter.php'>";
  echo "<input name='用户中心' type='button' class='topline_accoutcenter' title='用户中心' value='用户中心'>";
  echo "</a>";
  echo "<a href='" . $wmsys_address . "/accout/uploadvideo.php'>";
  echo "<input name='投稿' type='button' class='topline_workcenter' title='投稿' value='投稿'>";
  echo "</a>";
  goto ntxlgnbr;
}else{
  echo "用户未登录";
  echo "<a href='" . $wmsys_address . "/accout/accoutlogin.php'>";
  echo "<input name='登录' type='button' class='topline_login' title='登录' value='登录'>";
  echo "</a>";
  goto ntxlgnbr;
}
ntxlgnbr:
echo "</td>";
echo "</tr>";
echo "</table>";
?>