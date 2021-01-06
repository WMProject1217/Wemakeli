var notify = {
    show: function (title, content, duration, style) {
        duration = duration || 5;
        let ne = $(`<div class="notify" style="animation:notify-show-hide ${(duration < 0 ? 5 : duration) / 2}s ease-in-out${duration < 0 ? ';' : ' 2;animation-direction:alternate;'}${style}">
                        <div class="notify-title">${title}</div>
                        <div class="notify-content">${content}</div>
                    </div>`)[0];
        $('.notify-container').append(ne);
        if (duration > 0) {
            setTimeout(function () { ne.remove() }, duration * 1000 - 50);
        }
    },
    success: function (title, content, duration) {
        this.show(title, content, duration, 'background: #13af17;');
    },
    warning: function (title, content, duration) {
        this.show(title, content, duration, 'background: #e28525;');
    },
    error: function (title, content, duration) {
        this.show(title, content, duration, 'background: #fa4a44;');
    }
};

var geetest = null;
var closeHandler = null, successHandler = null, loadFailureHandler = function () {
    $('button').attr('disabled', true).html('拒绝访问');
};

function loadGeetest(query) {
    $.get('/ajax/geetest' + (query || ''), function (data) {
        if (!data.gt) {
            if (loadFailureHandler) {
                loadFailureHandler();
            }
            notify.error('错误', 'WDNMD' + (data.message ? ': ' + data.message : ''), -1);
            return;
        }
        initGeetest({
            gt: data.gt,
            challenge: data.challenge,
            new_captcha: data.new_captcha,
            product: 'bind',
            offline: !data.online
        }, function (captchaObj) {
            geetest = captchaObj;
            geetest.onSuccess(function () {
                if (successHandler) {
                    successHandler(geetest.getValidate());
                }
            }).onClose(function () {
                if (closeHandler) {
                    closeHandler();
                }
            }).onReady(function () {
                if (successHandler) {
                    geetest.verify();
                }
            });
        });
    }, 'json').fail(function () {
        if (loadFailureHandler) {
            loadFailureHandler();
        }
        notify.error('错误', '哦,草,找不到服务器了诶', 10);
        notify.success('Wemakeli Project', 'Welcome to Wemakeli!',7);
    });
}

function callGeetest(success, close) {
    closeHandler = close;
    successHandler = success;
    if (!geetest) {
        notify.warning('注意', '验证码加载中, 请稍候...')
    } else {
        geetest.verify();
    }
}
