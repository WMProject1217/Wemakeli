<?php //By WMProject1217
echo "<html>";
echo "<head>";
include('../config.php');
$wmui_classnow = "logon";
$wmui_title = "登录 - $wmsys_name";
$wmui_backpath = "../";
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
$username=$_POST['username'];
$password=$_POST['password'];
$backpath=$_POST['backpath'];
if($username=='rootadmin'){
    echo"<meta http-equiv='refresh' content=0;url='/account/rootadmin.php'>";
}else{
$userdb= fopen("$wmsys_dbrootw/user/index.wmst", "r") or die("<meta http-equiv='refresh' content=0;url='/error/nouserdb.html'>");
while(!feof($userdb)) {
    $userutil=@ fgets($userdb);
    $userlineg=explode(';',$userutil);
    $userline=explode('=',$userlineg[0]);
    if($userline[1]=="$username"){
        $passwordck=$userline[2];
        $passwordsha1=sha1($password);
        if($passwordsha1 <> $passwordck){
            echo "密码错误，请重新登录<br>";
            echo $passwordck . "<br>";
            echo $passwordsha1 . "<br>";
            echo "如果浏览器未响应，请<a href='./accoutlogin.php'>单击此处</a>";
            echo "<script>
            var params = {
            'active': 'ERROR',
            'string': '密码错误，请重新登录',
            'username' : '" . $_POST['username'] . "',
            'backpath' : '" . $_POST['backpath'] . "'
            };
            WMUIHTTPPost('./logon.php', params);
            </script>";
            goto expsk;
        }else{
            $useruid=$userline[0];
            $usernamed=@ fopen("$wmsys_dbrootw/user/$useruid/settings.wmst", "r");
            $userturename=@ fgets($usernamed);
            @ fclose($usernamed);
            setcookie("username",$userturename,time()+16777215,'/');
            setcookie("useraccout",$userline[1],time()+16777215,'/');
            setcookie("useruid",$useruid,time()+16777215,'/');
            goto edxkx;
        }
    }else{
        goto contrack;
    }
    contrack:
}
echo "用户不存在，请重新登录<br>";
echo "如果浏览器未响应，请<a href='./accoutlogin.php'>单击此处</a><br>";
echo "<script>
var params = {
'backpath' : '" . $_POST['backpath'] . "'
};
WMUIHTTPPost('./logon.php', params);
</script>";
expsk:
fclose($userdb);
goto ends;
}
edxkx:
echo "登录成功<br>";
echo "如果浏览器未响应，请<a href='../index.php'>单击此处</a>";
if ($backpath <> "") {
    if (stripos($backpath,"postlogon.php") == false) {
        echo "<meta http-equiv='refresh' content=0;url='$backpath'>";
    } else {
        echo "<meta http-equiv='refresh' content=0;url='$wmui_backpath'>";
    }
} else {
    echo "<meta http-equiv='refresh' content=0;url='$wmui_backpath'>";
}
ends:
include("$wmsys_assetsr\wmui\wmuilasload.php");
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
?>