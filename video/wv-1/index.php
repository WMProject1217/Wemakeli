﻿<?php //by WMProject1217
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
$danmakufile =@ fopen("./danmaku.wml", "r");
$danmakudata=@ fread($danmakufile,filesize("./$videolabel/danmaku.wml"));
$danmakunumber=substr_count($danmakudata,"\n");
fclose($danmakufile);
echo "<head>";
echo "<link href='$wmsys_assets/css/scojs.css' rel='stylesheet'>";
echo "<link href='$wmsys_assets/css/colpick.css' rel='stylesheet'>";
echo "<link href='$wmsys_assets/css/bootstrap.css' rel='stylesheet'>";
echo "<link rel='stylesheet' href='$wmsys_assets/css/main.css'>";
echo "<title>$title - $wmsys_name</title>";
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

<div id="danmup" style="left: 2%;/*margin-left:-400px;*/">

</div>
<div style="display: none">
  <span class="glyphicon" aria-hidden="true">&#xe072</span>
  <span class="glyphicon" aria-hidden="true">&#xe073</span>
  <span class="glyphicon" aria-hidden="true">&#xe242</span>
  <span class="glyphicon" aria-hidden="true">&#xe115</span>
  <span class="glyphicon" aria-hidden="true">&#xe111</span>
  <span class="glyphicon" aria-hidden="true">&#xe096</span>
  <span class="glyphicon" aria-hidden="true">&#xe097</span>
</div>
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
<script src="<?php echo $wmsys_assets?>/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo $wmsys_assets?>/js/jquery.shCircleLoader.js"></script>
<script src="<?php echo $wmsys_assets?>/js/sco.tooltip.js"></script>
<script src="<?php echo $wmsys_assets?>/js/colpick.js"></script>
<script src="<?php echo $wmsys_assets?>/js/jquery.danmu.js"></script>
<script src="<?php echo $wmsys_assets?>/js/main.js"></script>
<script>

$("#danmup").DanmuPlayer({
    src:"video.mp4",
    height: "480px", //区域的高度
    width: "800px" //区域的宽度
    ,urlToGetDanmu:"<?php echo $wmsys_address?>/video/<?php echo $videonumber?>/query.php"
    ,urlToPostDanmu:"<?php echo $wmsys_address?>/video/<?php echo $videonumber?>/stone.php"
  });

  $("#danmup .danmu-div").danmu("addDanmu",[
    <?php
    $danmakufile = @ fopen("danmaku.wml", "r") or die("])");
    echo ",";
    while(!feof($danmakufile)) {
    print fgets($danmakufile) . ",";
  
}
fclose($danmakufile);
    ?>
  ])
</script>
</html>