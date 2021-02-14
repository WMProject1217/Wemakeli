<?php //By WMProject1217
echo "<html>";
echo "<head>";
include('../config.php');
$wmui_classnow = "join";
$wmui_title = "注册 - $wmsys_name";
$wmui_backpath = "../";
//$wmui_opacityui = 1;
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
?>
<style>
.joinaddlevel{
    position:fixed;
    left: 0px;
    top: 35px;
    width: 400px;
    height: calc(100% - 35px - 39px);
    background:rgba(0,0,0,0.64);
}
</style>
<script>
function jointest() {
if (!$('#username').val()) {
    notify.warning('错误', '请输入用户名',7);
    return;
}
if (!$('#password').val()) {
    notify.warning('错误', '请输入密码',7);
    return;
}
$(this).attr('disabled', true).html('登录中...');
userjoin();
}
function userjoin(){
var params = {
    "username": $('#username').val(),
    "password": $('#password').val(),
    "backpath": document.referrer
};
    WMUIHTTPPost("./postjoin.php", params);
}
</script>
<div class='joinaddlevel'>
    <div class="title">Wemakeli 注册</div>
    <div class="control-group">
    <label style='font-size:18px;width: 60px;'>用户名</label>
    <input style='font-size:16px;width: 220px;' id="username" type="text" placeholder="输入你喜欢的名称吧~" title="用户名">
    </div>
    <div class="control-group">
    <label style='font-size:18px;width: 60px;'>密码</label>
    <input style='font-size:16px;width: 220px;' id="password" type="password" title="密码">
    </div>
    <div style="text-align: right">
        <label>
            <a class='wmuiaslinkm' href="./logon.php" style="margin: 0 60px 0 8px">切换到登录</a>
        </label>
    </div>
    <div style='display: flex;align-items: center;justify-content: center;'>
    <button class='wmuibutton' style='position: relative;top: 7px;text-align: center;padding: 15px 40px;' onclick="jointest();">注册</button>
    </div>
</div>

<?php
include("$wmsys_assetsr\wmui\wmuilasload.php");
echo "<div class='wmuibackgrounda'></div>";
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
?>