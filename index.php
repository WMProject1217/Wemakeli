<?php //By WMProject1217
echo "<html>";
echo "<head>";
include('./config.php');
$wmui_classnow = "mainpage";
$wmui_title = "主页 - $wmsys_name";
$wmui_backpath = "./";
$wmui_jumpoffheadbar = "1";
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
$asser = date("Y-m-d H:i:s");
?>
<table border='1'>
<tr>
<td>
<h3>Debug</h3>
<?php
echo "<div id='wmuisctimeblock'>See this message means js error</div>";
/*
date()
Y - 完整表示年份（四位数字：2019）
y - 表示年份（两位数字：19）
F - 表示月份（完整的文本格式： January 或者 March）
M - 表示月份（3个字母：Jun）
m - 表示月份，有前导0（数字：04）
n - 表示月份，无前导0（数字：4）
d - 表示月份中的第几天，有前导0（01-31）
j -  表示月份中的第几天，无前导0（1-31）
D - 表示星期几（3字母：Wed）
l - 表示星期几（完整英文：Wednesday）
w - 表示星期中的第几天（数字，0表示星期天）
W - 表示一年中的第几周
z - 表示一年中的第几天（0-366）
H - 24小时格式，有前导0（08，18）
h - 12小时格式，有前导0（06，11）
G - 24小时格式，无前导0（9，17）
g - 12小时格式，无前导0（6，12）
i - 表示分钟，有前导0（00-59）
s - 表示秒，有前导0（00 -59）
A - 大写的午前和午后（AM 或 PM）
a - 小写的午前和午后（am 或 pm）
I - 判断是否为夏令时

$ert = explode(':',$asser);
if ($ert[3]=="pm") {
    $ert[0] = $ert[0] + 12 ;
}
*/
?>
<script>
window.onload=function(){
NowTimeSC();
setInterval("NowTimeSC()",16);
}
function NowTimeSC(){
var time=new Date();
var lyear=time.getFullYear();
var lmonth=time.getMonth()+1;
var lday=time.getDate();
var lh=time.getHours();
var lm=time.getMinutes();
var ls=time.getSeconds();
var lms=time.getMilliseconds();
a = parseInt(lyear) - 1616;
b = parseInt(lmonth) - 12;
c = parseInt(lday) - 17;
d = parseInt(lh) - 7;
e = parseInt(lm) - 12;
f = parseInt(ls);
g = parseInt(lms);
h = a * 365 * 24 * 3600000 + b * 30 * 24 * 3600000 + c * 24 * 3600000 + d * 3600000 + e * 60000 + f * 1000 + g;
h = parseInt(h);
i = h / 1024;
h = (i - parseInt(i)) * 1024;
i = parseInt(i);
j = i / 32 + 12;
i = (j - parseInt(j)) * 32;
j = parseInt(j);
k = j / 256 + 7;
j = (k - parseInt(k)) * 256;
k = parseInt(k);
l = k / 64 + 17;
k = (l - parseInt(l)) * 64;
l = parseInt(l);
m = l / 128 + 12;
l = (m - parseInt(m)) * 128;
m = parseInt(m);
n = m / 64 + 1616;
m = (n - parseInt(n)) * 64;
n = parseInt(n);
document.getElementById("wmuisctimeblock").innerHTML="Time : [SC]"+n+"年"+m+"月"+l+"日  "+k+":"+j+":"+i+":"+h;
}
wmuiwelcomemessage();
notify.success('Buy Indihome now','IndiHome Paket Streamix<br>10 Mbps Rp320.000<br>20 Mbps Rp385.000<br>50 Mbps Rp615.000<br>100 Mbps Rp957.000' ,-1);
</script>
<?php
echo "用户端应用程序 : " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "用户访问时 IP : " .  $_SERVER['REMOTE_ADDR'] . "<br>";
echo "用户访问时端口 : " .  $_SERVER['REMOTE_PORT'] . "<br>";
echo "用户页面跳转 : " .  $_SERVER['HTTP_REFERER'] . "<br>";
?>
</td>
</tr>
</table>


<style>
.wmuitopshowimage{
    z-index:0;
    width:240px;
    height:135px;
}
.wmuitopshowtitle{
    position: relative;
    z-index:1;
    color:#EE0000;
    font-size:20px;
    top:-60px;
    width:240px;
    height:37px;
    text-shadow: 1px 1px 3px #000000;
}
.wmuitopshowinfo{
    position: relative;
    z-index:1;
    color:#EEEE00;
    font-size:16px;
    top:-74px;
    width:240px;
    height:24px;
    text-shadow: 1px 1px 3px #000000;
}
.wmuitopshowupmaster{
    position: relative;
    z-index:1;
    color:#66CCFF;
    font-size:16px;
    top:-82px;
    width:240px;
    height:37px;
    text-shadow: 1px 1px 3px #000000;
}
.wmuitopshowlink{
    position: relative;
    z-index:2;
    top:-230px;
    width:240px;
    height:135px;
}
</style>
<img class='wmuitopshowimage' src='./library/image/videotop/wv-1.png'>
<div class='wmuitopshowtitle'>Bad Apple!!</div>
<div class='wmuitopshowinfo'>播放 560 弹幕 38</div>
<div class='wmuitopshowupmaster'>UP : ?</div>
<a href='./video/wv-1/'><div class='wmuitopshowlink'></div></a>


<?php
include("$wmsys_assetsr\wmui\wmuilasload.php");
?>