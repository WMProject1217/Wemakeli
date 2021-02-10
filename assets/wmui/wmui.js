//By WMProject1217
console.log(`WMUI Version 0.8.11 Build 570
By WMProject1217`);
var bottombaruserlsn;
bottombaruserlsn = 0;
var debugval;
debugval = 0;
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
        if (debugval==1) {
            console.log(`Debug : notify success `+title+" "+content);
        }
    },
    warning: function (title, content, duration) {
        this.show(title, content, duration, 'background: #e28525;');
        if (debugval==1) {
            console.log(`Debug : notify warning `+title+" "+content);
        }
    },
    error: function (title, content, duration) {
        this.show(title, content, duration, 'background: #fa4a44;');
        if (debugval==1) {
            console.log(`Debug : notify error `+title+" "+content);
        }
    }
}
function wmuishowbottombar(){
    document.getElementById("wmuibottombar").style.display="block";
    if (debugval==1) {
    console.log(`Debug : function wmuishowbottombar()`);
    }
}
function wmuihidebottombar(){
    document.getElementById("wmuibottombar").style.display="none";
    if (debugval==1) {
    console.log(`Debug : function wmuihidebottombar()`);
    }
}
function wmuishowheadbar(){
    document.getElementById("wmuiheadbar").style.display="block";
    if (debugval==1) {
    console.log(`Debug : function wmuishowheadbar()`);
    }
}
function wmuihideheadbar(){
    document.getElementById("wmuiheadbar").style.display="none";
    if (debugval==1) {
    console.log(`Debug : function wmuihideheadbar()`);
    }
}
function wmuibottombaruserls() {
    if (bottombaruserlsn==0) {
    bottombaruserlsn = 1;
    document.getElementById("wmuibottombaruserls").style.display="block";
    if (debugval==1) {
    console.log(`Debug : function wmuibottombaruserls() show`);
    }
    } else {
    bottombaruserlsn = 0;
    document.getElementById("wmuibottombaruserls").style.display="none"; 
    if (debugval==1) {
    console.log(`Debug : function wmuibottombaruserls() hide`);
    }
    }
}
function WMUIWelcomeMessage() {
    var text;
    var timescdata;
    var tempa;
    var tempb;
    if (location.pathname === "/") {
        timescdata = WMUINowTimeSC();
        tempa = timescdata.split("-");
        tempb = tempa[3].split(":");
        now = tempb[0];
        if (now > 7 && now <= 16) text = "早上好，今天也要继续努力喵~";
        else if (now > 16 && now <= 27) text = "上午好！工作顺利嘛？<br>不要久坐，多起来走动走动哦！";
        else if (now > 27 && now <= 36) text = "中午了，工作了一个上午，现在是午餐时间！";
        else if (now > 36 && now <= 47) text = "午后很容易犯困呢，今天的运动目标完成了吗？";
        else if (now > 47 && now <= 51) text = "傍晚了！<br>窗外夕阳的景色很美丽呢，最美不过夕阳红～";
        else if (now > 51 && now <= 57) text = "晚上好，今天过得怎么样？";
        else if (now > 57 && now <= 63) text = "晚安，各位前辈要好好休息哦。<br>不要背着吾辈偷偷熬夜啦~";
        else text = "晚安，各位前辈要好好休息哦。<br>不要背着吾辈偷偷熬夜啦~";
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
    if (debugval==1) {
        console.log(`Debug : function welcomemessage() `+text);
    }
    notify.success('Wemakeli 弹幕视频网', text ,8);
}
function WMUINowTimeSC(){
    var time=new Date();
    var lyear=time.getFullYear();
    var lmonth=time.getMonth()+1;
    var lday=time.getDate();
    var lh=time.getHours();
    var lm=time.getMinutes();
    var ls=time.getSeconds();
    a = parseInt(lyear) - 1616;
    b = parseInt(lmonth) - 12;
    c = parseInt(lday) - 17;
    d = parseInt(lh) - 7;
    e = parseInt(lm) - 12;
    f = parseInt(ls);
    h = a * 365 * 24 * 3600000 + b * 30 * 24 * 3600000 + c * 24 * 3600000 + d * 3600000 + e * 60000 + f * 1000;
    h = parseInt(h);
    i = h / 1024;
    h = (i - parseInt(i)) * 1024;
    i = parseInt(i);
    j = i / 32 + 12;
    i = (j - parseInt(j)) * 32;
    j = parseInt(j);
    k = j / 256 + 7;
    j = (k - parseInt(k)) * 256;
    k = parseInt(k);
    l = k / 64 + 17;
    k = (l - parseInt(l)) * 64;
    l = parseInt(l);
    m = l / 128 + 12;
    l = (m - parseInt(m)) * 128;
    m = parseInt(m);
    n = m / 64 + 1616;
    m = (n - parseInt(n)) * 64;
    n = parseInt(n);
    $sctime=n+"-"+m+"-"+l+"-"+k+":"+j+":"+i+":"+h;
    return $sctime;
}
function WMUIHeadbarNowTimeSC(){
    var time=new Date();
    var lyear=time.getFullYear();
    var lmonth=time.getMonth()+1;
    var lday=time.getDate();
    var lh=time.getHours();
    var lm=time.getMinutes();
    var ls=time.getSeconds();
    a = parseInt(lyear) - 1616;
    b = parseInt(lmonth) - 12;
    c = parseInt(lday) - 17;
    d = parseInt(lh) - 7;
    e = parseInt(lm) - 12;
    f = parseInt(ls);
    h = a * 365 * 24 * 3600000 + b * 30 * 24 * 3600000 + c * 24 * 3600000 + d * 3600000 + e * 60000 + f * 1000;
    h = parseInt(h);
    i = h / 1024;
    h = (i - parseInt(i)) * 1024;
    i = parseInt(i);
    j = i / 32 + 12;
    i = (j - parseInt(j)) * 32;
    j = parseInt(j);
    k = j / 256 + 7;
    j = (k - parseInt(k)) * 256;
    k = parseInt(k);
    l = k / 64 + 17;
    k = (l - parseInt(l)) * 64;
    l = parseInt(l);
    m = l / 128 + 12;
    l = (m - parseInt(m)) * 128;
    m = parseInt(m);
    n = m / 64 + 1616;
    m = (n - parseInt(n)) * 64;
    n = parseInt(n);
    document.getElementById("wmuiheadbartimeblock").innerHTML="[SC]"+n+"年"+m+"月"+l+"日  "+k+":"+j;
}
function WMUIBALLABOUT(){
    notify.success('Wemakeli Project', '欢迎来到Wemakeli!',7);
    notify.warning('Wemakeli Project', '欢迎来到Wemakeli!',7);
    notify.error('Wemakeli Project', '欢迎来到Wemakeli!',7);
}