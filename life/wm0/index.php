<?php
//WMProject1217 Game
//[WM00] Retworld (PHP Edition)
//By WMProject1217
//Project create on 2021-02-13 19:26:54
if ($_POST['action']=="newsave") {
    goto newsave;
}
defaultpagedata:
echo "<head>";
echo "<title>Retworld</title>";
echo "<link rel='stylesheet' href='./wmui.css'></link>";
echo "<script src='./wmui.js'></script>";
echo "</head>";
echo "<body>";
echo "<table class='wmuiheadbar' id='wmuiheadbar'>";
echo "<tr>";
echo "<td>";
echo "<a class='wmuiheadbartimeblock' id='wmuiheadbartimeblock'>See this text means js error</a>";
echo "<div class='wmuiheadbartitle'>Retworld</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table class='wmuipagemain'>";
echo "<div class='wmuinotify-container'></div>";
echo "<tr>";
echo "<td>";
echo "<script>function wnewsave(){
    var params = {
        'action': 'newsave'
    };
        WMUIHTTPPost('./index.php', params);
    }</script>";
echo "<h3>Retworld</h3>";
echo "<button class='wmuibutton' onclick='wnewsave()'>新的存档</button>";
echo "<button class='wmuibutton' onclick='wloadsave()'>加载记录</button>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<div>By WMProject1217,[WM00] Retworld (PHP Edition)</div><div>Version 0.77</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
goto sysendall;
newsave:
echo "<head>";
echo "<title>创建新的存档 - Retworld</title>";
echo "<link rel='stylesheet' href='./wmui.css'></link>";
echo "<script src='./wmui.js'></script>";
echo "</head>";
echo "<body>";
echo "<table class='wmuiheadbar' id='wmuiheadbar'>";
echo "<tr>";
echo "<td>";
echo "<a class='wmuiheadbarbackbutton' href='./index.php'><</a>";
echo "<a class='wmuiheadbartimeblock' id='wmuiheadbartimeblock'>See this text means js error</a>";
echo "<div class='wmuiheadbartitle'>创建新的存档 - Retworld</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table class='wmuipagemain'>";
echo "<div class='wmuinotify-container'></div>";
echo "<tr>";
echo "<td>";
echo "<script>function wnewsave(){
    var params = {
        'action': 'newsave'
    };
        WMUIHTTPPost('./index.php', params);
    }</script>";
echo "<h3>创建新的存档 - Retworld</h3>";
echo "<button class='wmuibutton' onclick='wnewsave()'>新的存档</button>";
echo "<button class='wmuibutton' onclick='wloadsave()'>加载记录</button>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<div>By WMProject1217,[WM00] Retworld (PHP Edition)</div><div>Version 0.77</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
goto sysendall;
function headbar(){
echo "<table class='wmuiheadbar' id='wmuiheadbar'>";
echo "<tr>";
echo "<td>";
if ($wmui_backbutton <> 0) {
echo "<a class='wmuiheadbarbackbutton' href='$wmui_backpath'><</a>";
}
echo "<a class='wmuiheadbartimeblock' id='wmuiheadbartimeblock'>See this text means js error</a>";
echo "<div class='wmuiheadbartitle'>Retworld</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table class='wmuipagemain'>";
echo "<div class='wmuinotify-container'></div>";
echo "<tr>";
echo "<td>";
}
function bottombar(){
echo "<br>";
echo "<br>";
echo "<br>";
echo "<div>By WMProject1217,[WM00] Retworld (PHP Edition)</div><div>Version 0.77</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
}
sysendall:
?>