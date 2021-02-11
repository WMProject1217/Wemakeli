<?php //By WMProject1217
//Main Page
echo "<html>";
echo "<head>";
include('../config.php');
$wmui_classnow = "logon";
$wmui_title = "登录 - $wmsys_name";
$wmui_backpath = "../";
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
<script>
function httpPost(URL, PARAMS) {
 var temp = document.createElement("form");
 temp.action = URL;
 temp.method = "post";
 temp.style.display = "none";
 
 for (var x in PARAMS) {
  var opt = document.createElement("textarea");
  opt.name = x;
  opt.value = PARAMS[x];
  temp.appendChild(opt);
 }
 
 document.body.appendChild(temp);
 temp.submit();
 
 return temp;
}
function login() {
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
  "password": $('#password').val()
 };
 
 httpPost("./postlogon.php", params);
}
    </script>

<body>
    <div id="app" class="wmlogon">
        <div class="main padding-limiter">
            <div class="panel login-panel">
                <div class="double-column">
                    <img class="panel-wide login-img" src="/library/image/logon/logon.jpg">
                    <div class="panel-narrow" id="p-login">
                        <div class="title">
                            Wemakeli 登录
                        </div>
                        <div class="control-group">
                            <label>账户</label>
                            <div class="controls">
                                <input id="username" type="text" placeholder="用户名/邮箱/手机号" title="账户">
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
                            <button class="wmuibutton" id="login" onclick="login();">登录</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="geetest_panel geetest_wind" style="display: none;"><div class="geetest_panel_ghost"></div><div class="geetest_panel_box"><div class="geetest_other_offline geetest_panel_offline"></div><div class="geetest_panel_loading"><div class="geetest_panel_loading_icon"></div><div class="geetest_panel_loading_content">智能验证检测中</div></div><div class="geetest_panel_success"><div class="geetest_panel_success_box"><div class="geetest_panel_success_show"><div class="geetest_panel_success_pie"></div><div class="geetest_panel_success_filter"></div><div class="geetest_panel_success_mask"></div></div><div class="geetest_panel_success_correct"><div class="geetest_panel_success_icon"></div></div></div><div class="geetest_panel_success_title">通过验证</div></div><div class="geetest_panel_error"><div class="geetest_panel_error_icon"></div><div class="geetest_panel_error_title">网络超时</div><div class="geetest_panel_error_content">请点击此处重试</div><div class="geetest_panel_error_code"><div class="geetest_panel_error_code_text"></div></div></div><div class="geetest_panel_footer"><div class="geetest_panel_footer_logo"></div><div class="geetest_panel_footer_copyright">由极验提供技术支持</div></div><div class="geetest_panel_next"></div></div></div></body></html>

<?php
echo "<form action='postlogon.php' method='POST'>";
include("$wmsys_assetsr\wmui\wmuilasload.php");
echo "<div class='wmuibackgrounda'></div>";
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
?>