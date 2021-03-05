<?php
include('../config.php');
$wmui_backpath='../';
$wmui_classnow='read';
$wmui_jumpoffheadbar='0';
$title = $_GET['index'];
$wmui_title = "$title - $wmsys_name";
echo "<head>";
echo "<script src='$wmsys_sysroot/main/js/wmui.js'></script>";
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
function detectEncoding($file_path, $filesize = '1000') {
    $list = array('ANSI', 'UTF-8', 'UTF-16LE', 'UTF-16BE', 'ISO-8859-1');
    foreach ($list as $item) {
        if (md5($tmp) == md5($str)) {
            return $item;
        }
    }
    return 'Text identifies error !';
}
function convToUtf8($str){
    $encode = detectEncoding($str);
    if($encode=='UTF-8'){
    return $str;
    }
    switch($encode){
    case 'utf-8bom':
    $str = substr($str, 3);
    break;
    case 'ANSI':
    $str = iconv('GBK', 'UTF-8//IGNORE', $str);
    break;
    case 'UTF-16LE':
    $str = iconv('UTF-16le', 'UTF-8//IGNORE', substr($str, 2));
    break;
    case 'UTF-16BE':
    $str = iconv('UTF-16be', 'UTF-8//IGNORE', substr($str, 2));
    break;
    default:
    break;
    }
    return $str;
    }
?> 
<pre>
<?php //By WMProject1217
$str = file_get_contents($_GET['index']);
echo "File : " . $wmsys_sysrootr . "/read/wr2/" . $_GET['index'] . "<br>";
echo "File Encode : " . detectEncoding($str) . "<br>";
$response = convToUtf8($str);
echo $response;
?>
</pre>
<?php
include("$wmsys_assetsr\wmui\wmuilasload.php");
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
?> 


