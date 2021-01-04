<?php //By WMProject1217
include('../config.php');
$wmui_classnow = "about";
$wmui_title = "关于 - " . $wmsys_name;
$wmui_backpath = "../";
echo "<table class='pagedatamain'>";
echo "<tr>";
echo "<td>";
echo "<h3>$wmsys_name</h3>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>";
echo "<h3>正在建设 " . $wmsys_name. " ...</h3>";
//print "Build on Wemakeli Danmaku Video Website System [Version 0.8.5 Build 771]<br>By WMProject1217<br>";
//print "已进入第 2 开发阶段,在此阶段主要将修复特性以及修复样式<br>";
print "奥利给!淦就完了!<br>我们遇到什么困难,也不要怕!微笑着面对它!消除恐惧的最好办法就是面对恐惧!坚持,才是胜利!加油,奥利给!<br>";
print "AMD YES<br>LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB<br>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<pre>";
readfile('./about.wmexsr');
echo "</pre>";
echo "<h3>开发日志</h3>";
readfile("../main/txt/mainmsg.txt");
include('../wmui/wmui.php');
echo "</td>";
echo "</tr>";
echo "</table>";

?>