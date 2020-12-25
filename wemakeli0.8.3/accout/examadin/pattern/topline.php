<?php //By WMProject1217
if (isset($_COOKIE["useruid"])){
$useruid=$_COOKIE['useruid'];
$userimage = "$websiteaddress/user/$useruid/user.png";
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
echo "<img src=' $websiteaddress/main/picture/website/titleimage.png' class='websitetitleimage' title='$websitename' alt='$websitename'></img>";
echo "<echo class=toplineecho>入站考试 - Wemakeli</echo>";
echo "</td>";
echo "</tr>";
echo "</table>";
//td.topline
echo "<table class='toplinelogin'>";
echo "<tr>";
echo "<td>";
if (isset($_COOKIE["username"])){
  $username=$_COOKIE['username'];
  echo "<img src='$userimage' class='toplineuserimage' title='$username' alt='$username'></img>";
  echo "<echo class=toplineecho>$username</echo>";
  goto ntxlgnbrl;
}else{
  echo "用户未登录";
  echo "<a href='" . $websiteaddress . "/accout/accoutlogin.php'>";
  echo "<input name='登录' type='button' class='topline_login' title='登录' value='登录'>";
  echo "</a>";
  goto ntxlgnbr;
}
ntxlgnbr:
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table class=maindataindex>";
echo "<tr>";
echo "<td>";
die("请先登录，然后才能参加考试");
echo "</td>";
echo "</tr>";
echo "</table>";
ntxlgnbrl:
echo "</td>";
echo "</tr>";
echo "</table>";

?>