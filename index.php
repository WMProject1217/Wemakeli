<?php //By WMProject1217
/*$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);*/
echo "<head>";
include('./main/patterns/autoexec.php');
echo "<title>" . $websitename . "</title>";
echo "</head>";
echo "<body>";
include('./main/patterns/topline.php');
include('./main/patterns/leftline.php');
echo "<table id='maindata'>";
echo "<tr>";
echo "<td class='videopush'>";

echo "<br>";
echo "<br>";
print "By WMProject1217<br>";
print "奥利给!淦就完了!<br>我们遇到什么困难,也不要怕!微笑着面对它!消除恐惧的最好办法就是面对恐惧!坚持,才是胜利!加油,奥利给!<br>";
print "AMD YES<br>LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB<br>";
echo "使用了以下Github项目的一部分<br>";
echo "https://github.com/stevenjoezhang/live2d-widget<br>";
echo "https://github.com/chiruom/DanmuPlayer<br>";
echo "当前项目的Github地址<br>";
echo "https://github.com/wmproject1217/wemakeli<br>";
//td.videopush
echo "<table border='1'>";
echo "<tr>";
echo "<td class='videopush'>";
include('./videopush.php');
echo "</td>";
echo "</tr>";
echo "</table>";

//td.MESSAGE
echo "<table border='1'>";
echo "<tr>";
echo "<td class='MESSAGE'>";
echo "正在建设 " . $websitename . " ...";
echo "</td>";
echo "</tr>";
echo "</table>";

//td.log
echo "<table border='1'>";
echo "<tr>";
echo "<td class='log'>";
echo "<div>Log</div>";
readfile("./main/txt/mainmsg.txt");
echo "</td>";
echo "</tr>";
echo "</table>";

//td.talk
if (isset($_COOKIE["username"])){
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td class='talk'>";
    echo "<div>评论区</div>";
    echo "<form action='posttalk.php' method='POST'>";
    echo "<textarea style='OVERFLOW:  Visble' name='usertalk' value='' id='talkboxinput'></textarea>";
    echo "<input type='submit' value='提交'>";
    echo "</form>";
    include('talk.php');
    echo "</td>";
    echo "</tr>";
    echo "</table>";

    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</body>";
  }else{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td class='talk'>";
    echo "<div>评论区</div>";
    echo "你必须登录才能发表评论。";
    include('talk.php');
    echo "</td>";
    echo "</tr>";
    echo "</table>";

    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</body>";
}
?>