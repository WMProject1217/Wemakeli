<?php //by WMProject1217
echo "<!DOCTYPE html>";
echo "<html>";
include('../config.php');
$wmui_backpath='../';
$wmui_classnow='video';
$wmui_jumpoffheadbar='1';
$videoinfofile = @ fopen("./info.wmst", "r") or die("<title>Error 0x00000002</title>Error 0x00000002<br>Video info load unsuccessful.");
$title = fgets($videoinfofile);
$outputtime = fgets($videoinfofile);
$uploadmaster = fgets($videoinfofile);
$videonumber= fgets($videoinfofile);
fclose($videoinfofile);
$countfile = @ fopen("./count.wmst", "r");
$playnumber=fgets($countfile);
$playnumber = $playnumber + 1;
fclose($countfile);
$countfile = @ fopen("./count.wmst", "w");
fwrite($countfile,$playnumber);
fclose($countfile);
$danmakufile = @ file_get_contents("./danmaku.xml");
$danmakunumber = substr_count($danmakufile,"</d>");
echo "<head>";
echo "<link href='$wmsys_assets/css/scojs.css' rel='stylesheet'>";
echo "<link href='$wmsys_assets/css/colpick.css' rel='stylesheet'>";
echo "<link href='$wmsys_assets/css/bootstrap.css' rel='stylesheet'>";
echo "<link rel='stylesheet' href='$wmsys_assets/css/main.css'>";
echo "<title>$title - $wmsys_name</title>";
echo "<link rel='stylesheet' href='$wmsys_assets/css/aliplayer.css'/>";
echo "<script type='text/javascript' charset='utf-8' src='$wmsys_assets/js/aliplayer.js'></script>";
?>
<link href="/assets/css/as.css" rel="stylesheet" type="text/css">
<link href="/assets/css/normalize.css" rel="stylesheet" type="text/css">
<link href="/assets/css/night.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/assets/css/base.css" rel="stylesheet" type="text/css"/>
<script src="/assets/js/CommentCoreLibrary.min.js" type="text/javascript"></script>
<script src="/assets/js/ABPlayerHTML5.js" type="text/javascript"></script>
<?php
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
echo "<h3>" . $title . "</h3>";
echo "<div>" . $outputtime . " , " . $videonumber . " , 播放 " . $playnumber . " , 弹幕 " . $danmakunumber . "</div>";
/*echo "<table>";
echo "<tr>";
echo "<td class='pushonuser'>";
echo "<a href='" . $wmsys_address . "/user/default/index.php'>";
echo "<img src='" . $wmsys_address . "/user/default/user.png' class='pushonuserimage' title=' $uploadmaster' alt=' $uploadmaster'></img>";
echo "</a>";
echo "<echo class=toplineecho>" . $uploadmaster . "</echo><br>";
echo "<echo class=toplineecho>这个人很神秘,还没有个人简介呢</echo><br>";
echo "<a href='" . $wmsys_address . "/accout/submit.php?$uploadmaster'>";
echo "<input name='关注' type='button' class='submit' title='关注' value='关注'></a>";
echo "<echo> </echo";
echo "<a href='" . $wmsys_address . "/user/space.php?$uploadmaster'>";
echo "<input name='个人主页' type='button' class='submit' title='个人主页' value='个人主页'></a>";
echo "</td>";
echo "</tr>";
echo "</table>";*/
?>
<video id="video-1" autobuffer="true" data-setup="{}" width="800" height="450">
<source src="./video.mp4" type="video/mp4">
<p>Your browser does not support html5 video!</p>
</video>
<div id="load-player"></div>
<script>
var inst = ABP.create(document.getElementById("load-player"), {
  "src":{
    "playlist":[
      {
        "video":document.getElementById("video-1"),
        "comments":"./danmaku.xml"
      }
    ]
  },
  "width":800,
  "height":522
});
</script>
<pre>
<?php @ readfile('./info.wmexsr'); ?>
</pre>
<?php
//td.talk
if (isset($_COOKIE["username"])){
  echo "<table>";
  echo "<tr>";
  echo "<td class='talk'>";
  echo "<div>评论区</div>";
  echo "<form action='posttalk.php' method='POST'>";
  echo "<textarea style='OVERFLOW:  Visble' name='usertalk' value='' class='talkboxinput'></textarea>";
  echo "<input type='submit' value='提交'>";
  echo "</form>";
  @ include('talk.php');
  echo "</td>";
  echo "</tr>";
  echo "</table>";
  include("$wmsys_assetsr\wmui\wmuilasload.php");
}else{
  echo "<table>";
  echo "<tr>";
  echo "<td class='talk'>";
  echo "<div>评论区</div>";
  echo "你必须登录才能发表评论。";
  @ include('talk.php');
  echo "</td>";
  echo "</tr>";
  echo "</table>";
  include("$wmsys_assetsr\wmui\wmuilasload.php");
}
?>
</html>