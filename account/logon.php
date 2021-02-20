<?php //By WMProject1217
echo "<html>";
echo "<head>";
include('../config.php');
$wmui_classnow = "logon";
$wmui_title = "登录 - $wmsys_name";
if ($_POST['backpath'] <> "") {
    if (stripos($backpath,"postlogon.php") == false) {
        if (stripos($backpath,"postjoin.php") == false) {
            $wmui_backpath = $_POST['backpath'];
        } else {
            $wmui_backpath = "../";
        }
    } else {
        $wmui_backpath = "../";
    }
} else {
    if (stripos($_SERVER['HTTP_REFERER'],"postlogon.php") == false) {
        if (stripos($_SERVER['HTTP_REFERER'],"postjoin.php") == false) {
            $wmui_backpath = $_SERVER['HTTP_REFERER'];
        } else {
            $wmui_backpath = "../";
        }
    } else {
        $wmui_backpath = "../";
    }
}
//$wmui_opacityui = 1;
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
?>
<style type="text/css">
#app input {
    width: 88%;
}

#app label {
    width: 35px;
}
</style>

<div id="app" class="wmlogon">
    <div class="main padding-limiter">
        <div class="panel login-panel">
            <div class="double-column">
                <img class="panel-wide login-img" src="/library/image/logon/logon.jpg">
                <div class="panel-narrow">
                    <div class="title">Wemakeli 登录</div>
                    <div class="control-group">
                        <label>账户</label>
                        <div class="controls">
                            <input id="username" type="text" placeholder="用户编号/用户名" title="账户">
                        </div>
                    </div>
                    <div class="control-group">
                        <label>密码</label>
                        <div class="controls">
                            <input id="password" type="password" title="密码">
                        </div>
                    </div>
                    <div style="text-align: right">
                        <label>
                            <a href="./join.php">注册</a>
                            <a href="./repassword.php" style="margin: 0 60px 0 8px" class="wtf-fix">忘记密码?</a>
                        </label>
                    </div>
                    <div class="actions">
                        <button class="wmuibutton" onclick="logontest();">登录</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function logontest() {
if (!$('#username').val()) {
    notify.warning('错误', '请输入用户名',7);
    return;
}
if (!$('#password').val()) {
    notify.warning('错误', '请输入密码',7);
    return;
}
$(this).attr('disabled', true).html('登录中...');
userlogon();
}
function userlogon(){
var params = {
    "username": $('#username').val(),
    "password": $('#password').val(),
    "backpath": '<?php echo $wmui_backpath ;?>'
};
    WMUIHTTPPost("./postlogon.php", params);
}
<?php
if ($_POST['active']=="ERROR") {
    if ($_POST['string']<>"") {
        echo "notify.warning('错误', '". $_POST['string'] . "',7);";
        if ($_POST['username']<>"") {
            echo 'document.getElementById("username").value = "' . $_POST['username'] . '";';
        }
    }
}
?>
</script>
<?php
include("$wmsys_assetsr\wmui\wmuilasload.php");
echo "<div class='wmuibackgrounda'></div>";
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
?>