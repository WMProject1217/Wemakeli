<?php //By WMProject1217
echo "<html>";
echo "<head>";
include('./config.php');
$wmui_classnow = "video";
$wmui_title = "视频列表 - $wmsys_name";
$wmui_backpath = "../";
$wmui_jumpoffheadbar = "1";
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
echo "<table class='wmuivideolistr' id='wmuivideolistr'>";
echo "<tr>";
echo "<td>";
/*$videoread = -1;
$videoendfile = @ fopen("./videoend.wmst", "r") or die("<title>Error 0x00000007</title>Error 0x00000007<br>Page data load unsuccessful.");
$videoendun = @ fgets($videoendfile);
@ fclose($videoendfile);
$videoendsplit = explode(';',$videoendun);
$videoend = $videoendsplit[0];*/
if ($_GET['type']=="all") {
    $videoread = intval($_GET['page']) * 10 - 1;
    $videoend = $videoread + 10;
    $viewtype = "all";
    //echo "<script>alert('" . $videoread . "//" . $videoend ."');</script>";
} else {
    endsearchval:
    $videoread = -1;
    $videoend = $videoread + 10;
    $viewtype = "all";
}
while ($videoread<>$videoend) {
    $videoinfofile = @ fopen("./wv$videoread/info.wmst", "r");
    $title = @ fgets($videoinfofile);
    $outputtime = @ fgets($videoinfofile);
    $uploadmaster = @ fgets($videoinfofile);
    $videonumber= @ fgets($videoinfofile);
    @ fclose($videoinfofile);
    $videonumber = str_replace(array("\r\n", "\r", "\n"), "", $videonumber);
    $title = str_replace(array("\r\n", "\r", "\n"), "", $title);  
    $outputtime = str_replace(array("\r\n", "\r", "\n"), "", $outputtime);  
    $uploadmaster = str_replace(array("\r\n", "\r", "\n"), "", $uploadmaster);  
    if ($outputtime=="") {
        goto offechooutline;
    }
    //echo "<a href='/video/$videonumber/'>[wv$videoread]    $title [$outputtime][$uploadmaster]</a><br>";
    echo "<div class='wmuishowert'>";
    echo "<a href='/video/$videonumber/' target=" . '"_blank"' . ">";
    echo "<img class='wmuishowerttop' src='/library/image/videotop/wv$videoread.png'></img>";
    echo "<div class='wmuishowerttitle'>$title</div></a>";
    echo "<pre class='wmuishowertexsr'>";
    $exsrfile = @ file_get_contents("$wmsys_sysrootr/video/$videonumber/info.wmexsr");
    echo mb_strlen($exsrfile,'utf-8') > "160" ? mb_substr($exsrfile, 0, "160", "utf-8").'....' : mb_substr($exsrfile, 0, "160", "utf-8");
    echo "</pre>";
    echo "<a href='/video/$videonumber/' target=" . '"_blank"' . ">";
    $countfile = @ fopen("./$videonumber/count.wmst", "r");
    $playnumber = fgets($countfile);
    fclose($countfile);
    if(file_exists("$wmsys_sysrootr/video/$videonumber/danmaku.wml")) {
        $danmakufile = @ fopen("$wmsys_sysrootr/video/$videonumber/danmaku.wml", "r");
        $danmakudata = @ fread($danmakufile,filesize("$wmsys_sysrootr/video/$videonumber/danmaku.wml"));
        $danmakunumber = substr_count($danmakudata,"\n");
        fclose($danmakufile);
    } else {
        $danmakufile = @ file_get_contents("$wmsys_sysrootr/video/$videonumber/danmaku.xml");
        $danmakunumber = substr_count($danmakufile,"</d>");
    }
    echo "<div class='wmuishowertplaycount'>播放 $playnumber 弹幕 $danmakunumber</div>";
    echo "<div class='wmuishowertupmaster'>UP : $uploadmaster</div></a>";
    echo "</div><br><br><br><br><br><br><br>";
    offechooutline:
    $videoread = $videoread + 1;
}
echo "<br>";
echo "<div class='wmuicenterutil'>";
echo "<button onclick='firstpage();'>返回第零页</button>";
echo "<button onclick='beforepage();'>上一页</button>";
echo "<echo style='color:#FFFFFF;'>第 " . intval($_GET['page']) . " 页 , 共 -inf 页</echo>";
echo "<button onclick='nextpage();'>下一页</button>";
echo "<button onclick='lastpage();'>到最后一页</button>";
echo "</div>";
$tempa = intval($_GET['page']) - 1;
$tempb = intval($_GET['page']) + 1;
echo "<script>
function firstpage(){
    window.location.href='./index.php?type=$viewtype&page=0';
}

function beforepage(){
    window.location.href='./index.php?type=$viewtype&page=$tempa';
}

function nextpage(){
    window.location.href='./index.php?type=$viewtype&page=$tempb';
}

function lastpage(){
    window.location.href='./index.php?type=$viewtype&page=1152921504606846975';
}</script>";
echo "<br><br><br><br><br><br>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table class='wmuivideolistt' id='wmuivideolistt'>";
echo "<tr>";
echo "<td>";
echo "<h3 style='color:#EEEE00;'>分类列表</h3>";
echo "<echo style='color:#FFFFFF;'>前面的分类啊，以后再来探索吧</echo>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br><br>";
echo "<br><br><br><br><br>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<div class='wmuibackgrounda'></div>";
include("$wmsys_assetsr\wmui\wmuilasload.php");
?>