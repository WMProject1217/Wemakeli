//WMUI
console.log(`WMUI Version 0.8.8 Build 390`);
var bottombaruserlsn;
var debugval;
var notify = {
    show: function (title, content, duration, style) {
        duration = duration || 5;
        let ne = $(`<div class="wmuinotify" style="animation:wmuinotify-show-hide ${(duration < 0 ? 5 : duration) / 2}s ease-in-out${duration < 0 ? ';' : ' 2;animation-direction:alternate;'}${style}">
                        <div class="wmuinotify-title">${title}</div>
                        <div class="wmuinotify-content">${content}</div>
                    </div>`)[0];
        $('.wmuinotify-container').append(ne);
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
}
bottombaruserlsn = 0;
debugval = 1;
function showbottombar(){
    document.getElementById("bottombar").style.display="block";
    if (debugval==1) {
    console.log(`Debug : function showbottombar()`);
    }
}
function hidebottombar(){
    document.getElementById("bottombar").style.display="none";
    if (debugval==1) {
    console.log(`Debug : function hidebottombar()`);
    }
}
function showheadbar(){
    document.getElementById("headbar").style.display="block";
    if (debugval==1) {
    console.log(`Debug : function showheadbar()`);
    }
}
function hideheadbar(){
    document.getElementById("headbar").style.display="none";
    if (debugval==1) {
    console.log(`Debug : function hideheadbar()`);
    }
}
function bottombaruserls() {
    if (bottombaruserlsn==0) {
    bottombaruserlsn = 1;
    document.getElementById("bottombaruserls").style.display="block";
    if (debugval==1) {
    console.log(`Debug : function bottombaruserls() show`);
    }
    } else {
    bottombaruserlsn = 0;
    document.getElementById("bottombaruserls").style.display="none"; 
    if (debugval==1) {
    console.log(`Debug : function bottombaruserls() hide`);
    }
    }
}
function autoexec() {
    document.getElementById("bottombar").style.display="block";
    document.getElementById("bottombaruserls").style.display="none";
}
//MainPage
function welcomemessage() {
    var text;
    if (location.pathname === "/") {
        const now = new Date().getHours();
        if (now > 5 && now <= 7) text = "早上好！一日之计在于晨，美好的一天就要开始了。";
        else if (now > 7 && now <= 11) text = "上午好！工作顺利嘛，不要久坐，多起来走动走动哦！";
        else if (now > 11 && now <= 13) text = "中午了，工作了一个上午，现在是午餐时间！";
        else if (now > 13 && now <= 17) text = "午后很容易犯困呢，今天的运动目标完成了吗？";
        else if (now > 17 && now <= 19) text = "傍晚了！窗外夕阳的景色很美丽呢，最美不过夕阳红～";
        else if (now > 19 && now <= 21) text = "晚上好，今天过得怎么样？";
        else if (now > 21 && now <= 23) text = ["已经这么晚了呀，早点休息吧，晚安～", "深夜时要爱护眼睛呀！"];
        else text = "你是夜猫子呀？这么晚还不睡觉，明天起的来嘛？";
    } else if (document.referrer !== "") {
        const referrer = new URL(document.referrer),
            domain = referrer.hostname.split(".")[1];
        if (location.hostname === referrer.hostname) text = `欢迎访问<span>「${document.title.split(" - ")[0]}」</span>`;
        else if (domain === "baidu") text = `Hello！来自 百度搜索 的朋友<br>你是搜索 <span>${referrer.search.split("&wd=")[1].split("&")[0]}</span> 找到的我吗？`;
        else if (domain === "so") text = `Hello！来自 360搜索 的朋友<br>你是搜索 <span>${referrer.search.split("&q=")[1].split("&")[0]}</span> 找到的我吗？`;
        else if (domain === "google") text = `Hello！来自 谷歌搜索 的朋友<br>欢迎阅读<span>「${document.title.split(" - ")[0]}」</span>`;
        else text = `Hello！来自 <span>${referrer.hostname}</span> 的朋友`;
    } else {
        text = `欢迎来到 Wemakeli!`;
    }
    notify.success('Wemakeli 弹幕视频网', text ,7);
}
//Platform

//WMUIBALL
function WMUIBALLABOUT(){
    notify.success('Wemakeli Project', '欢迎来到Wemakeli!',7);
    notify.warning('Wemakeli Project', '欢迎来到Wemakeli!',7);
    notify.error('Wemakeli Project', '欢迎来到Wemakeli!',7);
}