<?php
/* By WMProject1217
include('../config.php');
$wmui_classnow = "user";
$wmui_title = "$langstr_WMUI_User_4 - " . $wmsys_name;
$wmui_backpath = "../";
echo "<table class='pagedatamain'>";
echo "<tr>";
echo "<td>";
include('../wmui/wmui.php');
echo "<a href='./logonother.php'><echo class='logonpagela'>$langstr_WMUI_logon_0</echo></a>";
echo "<a href='./newuser.php'><echo class='logonpagelb'>$langstr_WMUI_logon_1</echo></a>";
echo "<a><echo class='logonpagelc' id='Power'>Powered by ilibilib</echo></a>";
?>
<button type="button" onclick='document.getElementById("Power").innerHTML = "Not powered by bilibili"'>点击我！</button>
<?php
echo "<img src='$wmsys_imagedb/common/user.png' class='logonpageuserimage' alt='User Image'></img>";
echo "<form action='postlogon.php' method='POST'>";
echo "<input type='text' name='useruid' class='logonpageuseruid'></input>";
echo "<input type='password' name='userpassword' class='logonpageuserpassword'></input>";
echo "<input type='submit' class='logonpagelogonbutton' value='$langstr_WMUI_logon_2'>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";*/
echo "<!--By WMProject1217-->";
echo "<script src='$wmsys_sysroot/main/js/jquery-3.4.1.min.js'></script>";
echo "<script src='$wmsys_sysroot/main/js/fullpage.9.0.2.js'></script>";
?>
<script src="./gt.js"></script>
<script src="./base.js"></script>
<script src="./u2f-api.js"></script>
<?php
echo "<script src='.base.js'></script>";
include('../config.php');
$wmui_classnow = "user";
$wmui_title = "$langstr_WMUI_User_4 - " . $wmsys_name;
$wmui_backpath = "../";
echo "<body>";
echo "<table class='pagedatamainl'>";
echo "<tr>";
echo "<td>";
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
        var u2f_data = {};

        function u2f_try() {
            $('#u2f_status').css('color', 'black')
                .html('插入并点击');
            u2f.sign('https://openid.13a.com', [u2f_data.challenges[0].challenge], u2f_data.challenges, function (data) {
                if (data.errorCode) {
                    $('#u2f_status').css('color', 'red')
                        .html('出现错误:' + data.errorCode + ' <a href="javascript:u2f_try();">重试</a>');
                } else {
                    two_factor(JSON.stringify(data), (message) => $('#u2f_status').css('color', 'red')
                        .html('出现错误:' + message + ' <a href="javascript:u2f_try();">重试</a>'));
                }
            }, 30);
        }

        function two_factor(data, callback) {
            $.post('/ajax/two_factor', {
                data: data
            }, function (data) {
                if (data.success) {
                    notify.success('登录成功', '正在跳转, 请稍候...', -1);
                    location.href = '/redirect';
                } else {
                    notify.error('验证失败', data.message);
                    if (callback) {
                        callback(data.message);
                    }
                }
            }, 'json').fail(function () {
                notify.error('验证失败', '网络错误或服务器出现错误, 请重试');
                if (callback) {
                    callback('未知错误');
                }
            });
        }

        $(function () {
            loadGeetest('?login');

            $('#login').click(function () {
                if (!$('#username').val() || !$('#password').val()) {
                    notify.warning('错误', '请输入用户名和密码');
                    return;
                }

                $(this).attr('disabled', true).html('登录中...');

                callGeetest(captcha => $.post('/ajax/login', {
                    username: $('#username').val(),
                    password: $('#password').val(),
                    c: captcha.geetest_challenge,
                    v: captcha.geetest_validate,
                    s: captcha.geetest_seccode
                }, function (data) {
                    if (data.success) {
                        notify.success('登录成功', '正在跳转, 请稍候...', -1);
                        location.href = '/redirect';
                    } else if (data.two_factor) {
                        $('#p-login').hide(100);
                        if (data.two_factor.type == 1) {
                            $('#p-2fa').show(100);
                        } else {
                            $('#p-u2f').show(100);
                            u2f_data = data.two_factor;
                            u2f_try();
                        }
                    } else {
                        notify.error('登录失败', data.message);
                        $('#login').attr('disabled', false).html('登录');
                    }
                }, 'json').fail(function () {
                    notify.error('登录失败', '网络错误或服务器出现错误, 请重试');
                    $('#login').attr('disabled', false).html('登录');
                }), () => $('#login').attr('disabled', false).html('登录'));
            });

            $('#login_2fa').click(function () {
                if (!$('#2fa').val()) {
                    notify.warning('错误', '请输入两步验证代码');
                    return;
                }

                $(this).attr('disabled', true).html('验证中...');
                two_factor($('#2fa').val(), (_) => $('#login_2fa').attr('disabled', false).html('提交'));
            });
        });
    </script>
<script charset="UTF-8" async="" src="./Nyatwork OpenID - Login_files/gettype.php"></script><script charset="UTF-8" async="" crossorigin="anonymous" src="./Nyatwork OpenID - Login_files/fullpage.9.0.2.js"></script><script charset="UTF-8" src="./Nyatwork OpenID - Login_files/get.php"></script><link href="./style_https.1.5.8.css" rel="stylesheet"></head>

<body>
    <div id="app" class="login">
        <div class="single-bg"></div>
        <div class="notify-container"></div>
        <div class="main padding-limiter">
            <div class="panel login-panel">
                <div class="double-column">
                    <img class="panel-wide login-img" src="./login.jpg">
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
                                <a href="./newuser.php">注册</a>
                                <a href="./repassword.php" style="margin: 0 60px 0 8px" class="wtf-fix">忘记密码?</a>
                            </label>
                        </div>
                        <div class="actions">
                            <button class="wmuibutton" id="login">登录</button>
                        </div>
                    </div>
                    <div class="panel-narrow" id="p-u2f" style="display: none;">
                        <div class="title">
                            :)
                        </div>
                        <div id="u2f_status" style="text-align: center;margin-right: 15px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="geetest_panel geetest_wind" style="display: none;"><div class="geetest_panel_ghost"></div><div class="geetest_panel_box"><div class="geetest_other_offline geetest_panel_offline"></div><div class="geetest_panel_loading"><div class="geetest_panel_loading_icon"></div><div class="geetest_panel_loading_content">智能验证检测中</div></div><div class="geetest_panel_success"><div class="geetest_panel_success_box"><div class="geetest_panel_success_show"><div class="geetest_panel_success_pie"></div><div class="geetest_panel_success_filter"></div><div class="geetest_panel_success_mask"></div></div><div class="geetest_panel_success_correct"><div class="geetest_panel_success_icon"></div></div></div><div class="geetest_panel_success_title">通过验证</div></div><div class="geetest_panel_error"><div class="geetest_panel_error_icon"></div><div class="geetest_panel_error_title">网络超时</div><div class="geetest_panel_error_content">请点击此处重试</div><div class="geetest_panel_error_code"><div class="geetest_panel_error_code_text"></div></div></div><div class="geetest_panel_footer"><div class="geetest_panel_footer_logo"></div><div class="geetest_panel_footer_copyright">由极验提供技术支持</div></div><div class="geetest_panel_next"></div></div></div></body></html>

<?php
echo "<form action='postlogon.php' method='POST'>";
include('../wmui/wmui.php');
echo "</td>";
echo "</tr>";
echo "</table>";
?>