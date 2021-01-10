

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
    }, 'json').fail(function () {
        if (loadFailureHandler) {
            loadFailureHandler();
        }
        notify.error('错误', '哦,草,找不到服务器了诶', 10);
        notify.success('Wemakeli Project', 'Welcome to Wemakeli!',7);
    });
}

