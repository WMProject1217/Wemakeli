<?php //By WMProject1217
include('./config.php');
echo "<head>";
include('./pattern/autoexec.php');
echo "<title>" . $wmsys_name . "</title>";
echo "</head>";
echo "<body>";
include('./pattern/topline.php');
include('./pattern/leftline.php');
echo "<table>";
echo "<tr>";
echo "<td class='maindata'>";
echo "<br>";

echo "<table border='1'>";
echo "<tr>";
echo "<td >";
echo "<h3>投稿推送</h3>";
include('./main/push/push.php');
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<table border='1'>";
echo "<tr>";
echo "<td>";
echo "<h3>正在建设 " . $wmsys_name. " ...</h3>";
print "Build on Wemakeli Danmaku Video Website System [Version 0.8.1 Build 517]<br>By WMProject1217<br>";
print "已进入第 2 开发阶段,在此阶段主要将修复特性以及修复样式<br>";
//print "奥利给!淦就完了!<br>我们遇到什么困难,也不要怕!微笑着面对它!消除恐惧的最好办法就是面对恐惧!坚持,才是胜利!加油,奥利给!<br>";
//print "AMD YES<br>LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB<br>";
echo "<a href='https://github.com/wmproject1217/wemakeli' target='_blank'>当前项目的Github地址</a><br>";
echo "使用了以下Github项目的一部分<br>";
echo "<a href='https://github.com/stevenjoezhang/live2d-widget' target='_blank'>https://github.com/stevenjoezhang/live2d-widget</a><br>";
echo "<a href='https://github.com/chiruom/DanmuPlayer' target='_blank'>https://github.com/chiruom/DanmuPlayer</a><br>";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<table border='1'>";
echo "<tr>";
echo "<td class='log'>";
echo "<h3>开发日志</h3>";
readfile("./main/txt/mainmsg.txt");
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<table border='1'>";
echo "<tr>";
echo "<td class='talk'>";
echo "<a href='./talk/0/'>进入评论区</a>";
echo "<pre>";
readfile("./talk/0/talk.json");
echo "</pre>";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>