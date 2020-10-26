<?php
$username=$_POST['username'];
$password=$_POST['userpassword'];
if($username=='rootadmin'){
    echo"<meta http-equiv='refresh' content=1;url='../accout/rootadmin/'>";
}else{
$userdb=fopen('../user/user.wmst', "r") or die("<meta http-equiv='refresh' content=1;url='../error/nouserdb.html'>");
while(!feof($userdb)) {
    $userutil=fgets($userdb);
    $userline=explode('=',$userutil);
    if($userline[1]=="$username"){
        $passwordck=$userline[2];
        $passwordsha1=sha1($password);
        if($passwordsha1 <> $passwordck){
            echo "密码错误，请重新登录<br>";
            echo "$passwordck<br>";
            echo $passwordsha1 . "<br>";
            echo "如果浏览器未响应，请<a href='./accoutlogin.php'>单击此处</a>";
            //echo "<meta http-equiv='refresh' content=3;url='./accoutlogin.php'>";
            goto expsk;
        }else{
            $useruid=$userline[0];
            $usernamed=fopen("../user/$useruid/usersettings.wmst", "r");
            $userturename=fgets($usernamed);
            fclose($usernamed);
            setcookie("username",$userturename,time()+16777215,'/');
            setcookie("useraccout",$userline[1],time()+16777215,'/');
            setcookie("useruid",$useruid,time()+16777215,'/');
            setcookie("userpassword",$userline[2],time()+16777215,'/');
            //echo "<meta http-equiv='refresh' content=1;url='./'>";
            goto edxkx;
        }
    }else{
        goto contrack;
    }
    contrack:
}
echo "用户不存在，请重新登录<br>";
echo "如果浏览器未响应，请<a href='./accoutlogin.php'>单击此处</a>";
//echo "<meta http-equiv='refresh' content=3;url='./accoutlogin.php'>";
expsk:
fclose($userdb);
goto ends;
}
edxkx:
echo "登录成功<br>";
echo "如果浏览器未响应，请<a href='../index.php'>单击此处</a>";
//echo "<meta http-equiv='refresh' content=3;url='./index.php'>";
ends:
?>
