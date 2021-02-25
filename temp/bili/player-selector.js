var t, e;
t = window,
e = function() {
    return function(t) {
        var e = {};
        function n(i) {
            if (e[i])
                return e[i].exports;
            var o = e[i] = {
                i: i,
                l: !1,
                exports: {}
            };
            return t[i].call(o.exports, o, o.exports, n),
            o.l = !0,
            o.exports
        }
        return n.m = t,
        n.c = e,
        n.d = function(t, e, i) {
            n.o(t, e) || Object.defineProperty(t, e, {
                enumerable: !0,
                get: i
            })
        }
        ,
        n.r = function(t) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
                value: "Module"
            }),
            Object.defineProperty(t, "__esModule", {
                value: !0
            })
        }
        ,
        n.t = function(t, e) {
            if (1 & e && (t = n(t)),
            8 & e)
                return t;
            if (4 & e && "object" == typeof t && t && t.__esModule)
                return t;
            var i = Object.create(null);
            if (n.r(i),
            Object.defineProperty(i, "default", {
                enumerable: !0,
                value: t
            }),
            2 & e && "string" != typeof t)
                for (var o in t)
                    n.d(i, o, function(e) {
                        return t[e]
                    }
                    .bind(null, o));
            return i
        }
        ,
        n.n = function(t) {
            var e = t && t.__esModule ? function() {
                return t.default
            }
            : function() {
                return t
            }
            ;
            return n.d(e, "a", e),
            e
        }
        ,
        n.o = function(t, e) {
            return Object.prototype.hasOwnProperty.call(t, e)
        }
        ,
        n.p = "",
        n(n.s = 1)
    }([function(t, e, n) {
        "use strict";
        n.r(e),
        n.d(e, "__extends", (function() {
            return o
        }
        )),
        n.d(e, "__assign", (function() {
            return r
        }
        )),
        n.d(e, "__rest", (function() {
            return a
        }
        )),
        n.d(e, "__decorate", (function() {
            return s
        }
        )),
        n.d(e, "__param", (function() {
            return l
        }
        )),
        n.d(e, "__metadata", (function() {
            return c
        }
        )),
        n.d(e, "__awaiter", (function() {
            return f
        }
        )),
        n.d(e, "__generator", (function() {
            return u
        }
        )),
        n.d(e, "__exportStar", (function() {
            return d
        }
        )),
        n.d(e, "__values", (function() {
            return p
        }
        )),
        n.d(e, "__read", (function() {
            return h
        }
        )),
        n.d(e, "__spread", (function() {
            return y
        }
        )),
        n.d(e, "__spreadArrays", (function() {
            return w
        }
        )),
        n.d(e, "__await", (function() {
            return b
        }
        )),
        n.d(e, "__asyncGenerator", (function() {
            return m
        }
        )),
        n.d(e, "__asyncDelegator", (function() {
            return g
        }
        )),
        n.d(e, "__asyncValues", (function() {
            return v
        }
        )),
        n.d(e, "__makeTemplateObject", (function() {
            return _
        }
        )),
        n.d(e, "__importStar", (function() {
            return x
        }
        )),
        n.d(e, "__importDefault", (function() {
            return P
        }
        ));
        /*! *****************************************************************************
Copyright (c) Microsoft Corporation. All rights reserved.
Licensed under the Apache License, Version 2.0 (the "License"); you may not use
this file except in compliance with the License. You may obtain a copy of the
License at http://www.apache.org/licenses/LICENSE-2.0

THIS CODE IS PROVIDED ON AN *AS IS* BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED
WARRANTIES OR CONDITIONS OF TITLE, FITNESS FOR A PARTICULAR PURPOSE,
MERCHANTABLITY OR NON-INFRINGEMENT.

See the Apache Version 2.0 License for specific language governing permissions
and limitations under the License.
***************************************************************************** */
        var i = function(t, e) {
            return (i = Object.setPrototypeOf || {
                __proto__: []
            }instanceof Array && function(t, e) {
                t.__proto__ = e
            }
            || function(t, e) {
                for (var n in e)
                    e.hasOwnProperty(n) && (t[n] = e[n])
            }
            )(t, e)
        };
        function o(t, e) {
            function n() {
                this.constructor = t
            }
            i(t, e),
            t.prototype = null === e ? Object.create(e) : (n.prototype = e.prototype,
            new n)
        }
        var r = function() {
            return (r = Object.assign || function(t) {
                for (var e, n = 1, i = arguments.length; n < i; n++)
                    for (var o in e = arguments[n])
                        Object.prototype.hasOwnProperty.call(e, o) && (t[o] = e[o]);
                return t
            }
            ).apply(this, arguments)
        };
        function a(t, e) {
            var n = {};
            for (var i in t)
                Object.prototype.hasOwnProperty.call(t, i) && e.indexOf(i) < 0 && (n[i] = t[i]);
            if (null != t && "function" == typeof Object.getOwnPropertySymbols) {
                var o = 0;
                for (i = Object.getOwnPropertySymbols(t); o < i.length; o++)
                    e.indexOf(i[o]) < 0 && Object.prototype.propertyIsEnumerable.call(t, i[o]) && (n[i[o]] = t[i[o]])
            }
            return n
        }
        function s(t, e, n, i) {
            var o, r = arguments.length, a = r < 3 ? e : null === i ? i = Object.getOwnPropertyDescriptor(e, n) : i;
            if ("object" == typeof Reflect && "function" == typeof Reflect.decorate)
                a = Reflect.decorate(t, e, n, i);
            else
                for (var s = t.length - 1; s >= 0; s--)
                    (o = t[s]) && (a = (r < 3 ? o(a) : r > 3 ? o(e, n, a) : o(e, n)) || a);
            return r > 3 && a && Object.defineProperty(e, n, a),
            a
        }
        function l(t, e) {
            return function(n, i) {
                e(n, i, t)
            }
        }
        function c(t, e) {
            if ("object" == typeof Reflect && "function" == typeof Reflect.metadata)
                return Reflect.metadata(t, e)
        }
        function f(t, e, n, i) {
            return new (n || (n = Promise))((function(o, r) {
                function a(t) {
                    try {
                        l(i.next(t))
                    } catch (t) {
                        r(t)
                    }
                }
                function s(t) {
                    try {
                        l(i.throw(t))
                    } catch (t) {
                        r(t)
                    }
                }
                function l(t) {
                    t.done ? o(t.value) : new n((function(e) {
                        e(t.value)
                    }
                    )).then(a, s)
                }
                l((i = i.apply(t, e || [])).next())
            }
            ))
        }
        function u(t, e) {
            var n, i, o, r, a = {
                label: 0,
                sent: function() {
                    if (1 & o[0])
                        throw o[1];
                    return o[1]
                },
                trys: [],
                ops: []
            };
            return r = {
                next: s(0),
                throw: s(1),
                return: s(2)
            },
            "function" == typeof Symbol && (r[Symbol.iterator] = function() {
                return this
            }
            ),
            r;
            function s(r) {
                return function(s) {
                    return function(r) {
                        if (n)
                            throw new TypeError("Generator is already executing.");
                        for (; a; )
                            try {
                                if (n = 1,
                                i && (o = 2 & r[0] ? i.return : r[0] ? i.throw || ((o = i.return) && o.call(i),
                                0) : i.next) && !(o = o.call(i, r[1])).done)
                                    return o;
                                switch (i = 0,
                                o && (r = [2 & r[0], o.value]),
                                r[0]) {
                                case 0:
                                case 1:
                                    o = r;
                                    break;
                                case 4:
                                    return a.label++,
                                    {
                                        value: r[1],
                                        done: !1
                                    };
                                case 5:
                                    a.label++,
                                    i = r[1],
                                    r = [0];
                                    continue;
                                case 7:
                                    r = a.ops.pop(),
                                    a.trys.pop();
                                    continue;
                                default:
                                    if (!((o = (o = a.trys).length > 0 && o[o.length - 1]) || 6 !== r[0] && 2 !== r[0])) {
                                        a = 0;
                                        continue
                                    }
                                    if (3 === r[0] && (!o || r[1] > o[0] && r[1] < o[3])) {
                                        a.label = r[1];
                                        break
                                    }
                                    if (6 === r[0] && a.label < o[1]) {
                                        a.label = o[1],
                                        o = r;
                                        break
                                    }
                                    if (o && a.label < o[2]) {
                                        a.label = o[2],
                                        a.ops.push(r);
                                        break
                                    }
                                    o[2] && a.ops.pop(),
                                    a.trys.pop();
                                    continue
                                }
                                r = e.call(t, a)
                            } catch (t) {
                                r = [6, t],
                                i = 0
                            } finally {
                                n = o = 0
                            }
                        if (5 & r[0])
                            throw r[1];
                        return {
                            value: r[0] ? r[1] : void 0,
                            done: !0
                        }
                    }([r, s])
                }
            }
        }
        function d(t, e) {
            for (var n in t)
                e.hasOwnProperty(n) || (e[n] = t[n])
        }
        function p(t) {
            var e = "function" == typeof Symbol && t[Symbol.iterator]
              , n = 0;
            return e ? e.call(t) : {
                next: function() {
                    return t && n >= t.length && (t = void 0),
                    {
                        value: t && t[n++],
                        done: !t
                    }
                }
            }
        }
        function h(t, e) {
            var n = "function" == typeof Symbol && t[Symbol.iterator];
            if (!n)
                return t;
            var i, o, r = n.call(t), a = [];
            try {
                for (; (void 0 === e || e-- > 0) && !(i = r.next()).done; )
                    a.push(i.value)
            } catch (t) {
                o = {
                    error: t
                }
            } finally {
                try {
                    i && !i.done && (n = r.return) && n.call(r)
                } finally {
                    if (o)
                        throw o.error
                }
            }
            return a
        }
        function y() {
            for (var t = [], e = 0; e < arguments.length; e++)
                t = t.concat(h(arguments[e]));
            return t
        }
        function w() {
            for (var t = 0, e = 0, n = arguments.length; e < n; e++)
                t += arguments[e].length;
            var i = Array(t)
              , o = 0;
            for (e = 0; e < n; e++)
                for (var r = arguments[e], a = 0, s = r.length; a < s; a++,
                o++)
                    i[o] = r[a];
            return i
        }
        function b(t) {
            return this instanceof b ? (this.v = t,
            this) : new b(t)
        }
        function m(t, e, n) {
            if (!Symbol.asyncIterator)
                throw new TypeError("Symbol.asyncIterator is not defined.");
            var i, o = n.apply(t, e || []), r = [];
            return i = {},
            a("next"),
            a("throw"),
            a("return"),
            i[Symbol.asyncIterator] = function() {
                return this
            }
            ,
            i;
            function a(t) {
                o[t] && (i[t] = function(e) {
                    return new Promise((function(n, i) {
                        r.push([t, e, n, i]) > 1 || s(t, e)
                    }
                    ))
                }
                )
            }
            function s(t, e) {
                try {
                    (n = o[t](e)).value instanceof b ? Promise.resolve(n.value.v).then(l, c) : f(r[0][2], n)
                } catch (t) {
                    f(r[0][3], t)
                }
                var n
            }
            function l(t) {
                s("next", t)
            }
            function c(t) {
                s("throw", t)
            }
            function f(t, e) {
                t(e),
                r.shift(),
                r.length && s(r[0][0], r[0][1])
            }
        }
        function g(t) {
            var e, n;
            return e = {},
            i("next"),
            i("throw", (function(t) {
                throw t
            }
            )),
            i("return"),
            e[Symbol.iterator] = function() {
                return this
            }
            ,
            e;
            function i(i, o) {
                e[i] = t[i] ? function(e) {
                    return (n = !n) ? {
                        value: b(t[i](e)),
                        done: "return" === i
                    } : o ? o(e) : e
                }
                : o
            }
        }
        function v(t) {
            if (!Symbol.asyncIterator)
                throw new TypeError("Symbol.asyncIterator is not defined.");
            var e, n = t[Symbol.asyncIterator];
            return n ? n.call(t) : (t = p(t),
            e = {},
            i("next"),
            i("throw"),
            i("return"),
            e[Symbol.asyncIterator] = function() {
                return this
            }
            ,
            e);
            function i(n) {
                e[n] = t[n] && function(e) {
                    return new Promise((function(i, o) {
                        !function(t, e, n, i) {
                            Promise.resolve(i).then((function(e) {
                                t({
                                    value: e,
                                    done: n
                                })
                            }
                            ), e)
                        }(i, o, (e = t[n](e)).done, e.value)
                    }
                    ))
                }
            }
        }
        function _(t, e) {
            return Object.defineProperty ? Object.defineProperty(t, "raw", {
                value: e
            }) : t.raw = e,
            t
        }
        function x(t) {
            if (t && t.__esModule)
                return t;
            var e = {};
            if (null != t)
                for (var n in t)
                    Object.hasOwnProperty.call(t, n) && (e[n] = t[n]);
            return e.default = t,
            e
        }
        function P(t) {
            return t && t.__esModule ? t : {
                default: t
            }
        }
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(0);
        n(6),
        n(16);
        var o = i.__importDefault(n(8))
          , r = i.__importDefault(n(10))
          , a = n(3)
          , s = i.__importDefault(n(2))
          , l = function() {
            function t(t) {
                var e = s.default.defaultSearch()
                  , n = i.__assign(i.__assign({
                    show_bv: window.show_bv
                }, e), t);
                n.crossDomain && (document.domain = "bilibili.com"),
                n.gamePlayer || "litePlayer" === n.playerKind ? (n.gamePlayer && (n.playerKind = "gamePlayer"),
                new r.default(n)) : new o.default(n)
            }
            return t.getCid = function(t, e) {
                var n = {}
                  , i = (t.p || 1) - 1;
                window.show_bv ? n.bvid = t.bvid : n.aid = t.aid,
                s.default.ajax({
                    data: n,
                    method: "GET",
                    url: "//wemakeli.net.wm/temp/bili/view",
                    async: !0,
                    withCredentials: !0
                }).then((function(n) {
                    try {
                        var o = JSON.parse(n);
                        if (o && o.data && o.data.pages) {
                            var r = o.data.pages;
                            r[i] ? t.cid = r[i].cid : t.cid = r[0].cid || o.data.cid
                        }
                        e(t)
                    } catch (n) {
                        e(t)
                    }
                }
                )).catch((function() {
                    e(t)
                }
                ))
            }
            ,
            t.metadata = function() {
                return a.metadata
            }
            ,
            t
        }();
        e.default = l
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = {
            get version() {
                var t = navigator.userAgent.toLowerCase();
                return {
                    mobile: /AppleWebKit.*Mobile.*/i.test(t),
                    iPad: /iPad/i.test(t) || "MacIntel" === navigator.platform && navigator.maxTouchPoints > 1
                }
            },
            flashChecker: function() {
                var t = !1;
                if (/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()) && !/Edge/i.test(navigator.userAgent) || /Trident/i.test(navigator.userAgent))
                    try {
                        (e = window.ActiveXObject && new window.ActiveXObject("ShockwaveFlash.ShockwaveFlash")) && (t = !0,
                        e.GetVariable("$version"))
                    } catch (t) {}
                else if (navigator.plugins && navigator.plugins.length > 0) {
                    var e;
                    (e = navigator.plugins["Shockwave Flash"]) && (t = !0)
                }
                return t
            },
            html5Checker: function() {
                var t = !(/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()) || /Trident/i.test(navigator.userAgent) && /Windows NT 6/.test(navigator.userAgent) || !window.URL);
                if (t) {
                    var e = document.createElement("video");
                    return e && e.canPlayType && e.canPlayType('video/mp4; codecs="avc1.42001E, mp4a.40.2"')
                }
                return t
            },
            html5Policy: function() {
                try {
                    var t = void 0;
                    if (/Edge/.test(navigator.userAgent))
                        return !1;
                    if (/Chrome\/\d+/i.test(navigator.userAgent)) {
                        if ((t = navigator.userAgent.match(/Chrome\/(\d+)/)) && parseInt(t[1], 10) >= 45)
                            return !0
                    } else if (/Firefox\/\d+/i.test(navigator.userAgent)) {
                        if ((t = navigator.userAgent.match(/Firefox\/(\d+)/)) && parseInt(t[1], 10) >= 47)
                            return !0
                    } else if (/linux/i.test(navigator.userAgent.toLowerCase()) || /Mac OS X[\s_\-/](\d+[.\-_]\d+[.\-_]?\d*)/i.test(navigator.userAgent))
                        return !0;
                    return !1
                } catch (t) {
                    return !1
                }
            },
            getUrlValue: function(t) {
                var e = new RegExp("(^|&)" + t + "=([^&]*)(&|$)","i")
                  , n = window.location.search.substr(1).match(e);
                if (null != n)
                    try {
                        return decodeURIComponent(n[2])
                    } catch (t) {
                        return ""
                    }
                return ""
            },
            parseConfig: function(t, e, n) {
                if ("enable_ssl_resolve" === e || "enable_ssl_stream" === e)
                    t[e] = "" !== n && 0 == n ? 0 : 1;
                else if ("aid" === e || "cid" === e)
                    t[e] = n;
                else if ("bvid" === e)
                    t[e] = n || "";
                else if ("player_type" === e || "pre_ad" === e)
                    t[e] = n || "";
                else
                    switch (e) {
                    case "danmaku":
                        t[e] = "" !== n && 0 == n ? "" : 1;
                        break;
                    case "autoplay":
                        t[e] = "true" === n || "1" === n ? 1 : "";
                        break;
                    case "as_wide":
                        t[e] = n ? 1 : "";
                        break;
                    case "has_danmaku":
                        t.hasDanmaku = "false" !== n;
                        break;
                    case "urlparam":
                        t.extra_params = n ? decodeURIComponent(n) : "",
                        t[e] = n ? n + encodeURIComponent("&season_type=") + this.getUrlValue("season_type") : "";
                        break;
                    case "p":
                        t[e] = n || this.getUrlValue("page") || 1;
                        break;
                    case "page":
                        t.p = n || this.getUrlValue("p") || 1;
                        break;
                    case "enable_ssl":
                        t[e] = n || 1;
                        break;
                    case "pl_max":
                        t[e] = Number(n);
                        break;
                    default:
                        t[e] = n
                    }
            },
            defaultSearch: function() {
                var t, e = this, n = window.location.search, i = {}, o = [];
                return -1 !== n.indexOf("?") && (o = n.slice(1).split("&")),
                ["aid", "bvid", "cid", "danmaku", "autoplay", "as_wide", "player_type", "pre_ad", "enable_ssl", "enable_ssl_resolve", "enable_ssl_stream", "urlparam", "p"].forEach((function(t) {
                    i[t] || e.parseConfig(i, t, "")
                }
                )),
                o.forEach((function(n) {
                    t = n.split("="),
                    e.parseConfig(i, t[0], t[1])
                }
                )),
                i
            },
            loadScript: function(t, e) {
                var n = e || window
                  , i = n.document.createElement("script");
                return i.onload = function() {
                    t.success && t.success()
                }
                ,
                i.onerror = function() {
                    t.error && t.error()
                }
                ,
                i.src = t.url,
                n.document.head.appendChild(i),
                i
            },
            objToStr: function(t) {
                var e = "";
                for (var n in t)
                    e += n + "=" + t[n] + "&";
                return e.slice(0, -1)
            },
            ajax: function(t) {
                return new Promise((function(e, n) {
                    var o = t.method ? t.method.toUpperCase() : "GET"
                      , r = !!t.async
                      , a = new XMLHttpRequest
                      , s = t.data ? i.objToStr(t.data) : "";
                    if (a.withCredentials = t.withCredentials || !1,
                    "POST" === o)
                        a.open(o, t.url, r),
                        a.setRequestHeader("Content-type", "application/x-www-form-urlencoded"),
                        a.send(s);
                    else if ("GET" === o) {
                        var l = t.url + "?" + s;
                        a.open(o, l, r),
                        a.send()
                    } else
                        a.open(o, t.url),
                        a.send();
                    a.addEventListener("load", (function() {
                        e(a.response)
                    }
                    )),
                    a.addEventListener("error", (function() {
                        n()
                    }
                    )),
                    a.addEventListener("abort", (function() {
                        n()
                    }
                    ))
                }
                ))
            }
        };
        e.default = i
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        }),
        e.metadata = {
            name: "@jsc/player-selector",
            version: "2.28.0",
            hash: "32ceeed",
            branch: "master",
            /*lastModefied: "2020-04-27T05:09:04.406Z"*/
        }
    }
    , function(t, e, n) {
        "use strict";
        var i, o = function() {
            return void 0 === i && (i = Boolean(window && document && document.all && !window.atob)),
            i
        }, r = function() {
            var t = {};
            return function(e) {
                if (void 0 === t[e]) {
                    var n = document.querySelector(e);
                    if (window.HTMLIFrameElement && n instanceof window.HTMLIFrameElement)
                        try {
                            n = n.contentDocument.head
                        } catch (t) {
                            n = null
                        }
                    t[e] = n
                }
                return t[e]
            }
        }(), a = [];
        function s(t) {
            for (var e = -1, n = 0; n < a.length; n++)
                if (a[n].identifier === t) {
                    e = n;
                    break
                }
            return e
        }
        function l(t, e) {
            for (var n = {}, i = [], o = 0; o < t.length; o++) {
                var r = t[o]
                  , l = e.base ? r[0] + e.base : r[0]
                  , c = n[l] || 0
                  , f = "".concat(l, " ").concat(c);
                n[l] = c + 1;
                var u = s(f)
                  , d = {
                    css: r[1],
                    media: r[2],
                    sourceMap: r[3]
                };
                -1 !== u ? (a[u].references++,
                a[u].updater(d)) : a.push({
                    identifier: f,
                    updater: w(d, e),
                    references: 1
                }),
                i.push(f)
            }
            return i
        }
        function c(t) {
            var e = document.createElement("style")
              , i = t.attributes || {};
            if (void 0 === i.nonce) {
                var o = n.nc;
                o && (i.nonce = o)
            }
            if (Object.keys(i).forEach((function(t) {
                e.setAttribute(t, i[t])
            }
            )),
            "function" == typeof t.insert)
                t.insert(e);
            else {
                var a = r(t.insert || "head");
                if (!a)
                    throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
                a.appendChild(e)
            }
            return e
        }
        var f, u = (f = [],
        function(t, e) {
            return f[t] = e,
            f.filter(Boolean).join("\n")
        }
        );
        function d(t, e, n, i) {
            var o = n ? "" : i.media ? "@media ".concat(i.media, " {").concat(i.css, "}") : i.css;
            if (t.styleSheet)
                t.styleSheet.cssText = u(e, o);
            else {
                var r = document.createTextNode(o)
                  , a = t.childNodes;
                a[e] && t.removeChild(a[e]),
                a.length ? t.insertBefore(r, a[e]) : t.appendChild(r)
            }
        }
        function p(t, e, n) {
            var i = n.css
              , o = n.media
              , r = n.sourceMap;
            if (o ? t.setAttribute("media", o) : t.removeAttribute("media"),
            r && btoa && (i += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(r)))), " */")),
            t.styleSheet)
                t.styleSheet.cssText = i;
            else {
                for (; t.firstChild; )
                    t.removeChild(t.firstChild);
                t.appendChild(document.createTextNode(i))
            }
        }
        var h = null
          , y = 0;
        function w(t, e) {
            var n, i, o;
            if (e.singleton) {
                var r = y++;
                n = h || (h = c(e)),
                i = d.bind(null, n, r, !1),
                o = d.bind(null, n, r, !0)
            } else
                n = c(e),
                i = p.bind(null, n, e),
                o = function() {
                    !function(t) {
                        if (null === t.parentNode)
                            return !1;
                        t.parentNode.removeChild(t)
                    }(n)
                }
                ;
            return i(t),
            function(e) {
                if (e) {
                    if (e.css === t.css && e.media === t.media && e.sourceMap === t.sourceMap)
                        return;
                    i(t = e)
                } else
                    o()
            }
        }
        t.exports = function(t, e) {
            (e = e || {}).singleton || "boolean" == typeof e.singleton || (e.singleton = o());
            var n = l(t = t || [], e);
            return function(t) {
                if (t = t || [],
                "[object Array]" === Object.prototype.toString.call(t)) {
                    for (var i = 0; i < n.length; i++) {
                        var o = s(n[i]);
                        a[o].references--
                    }
                    for (var r = l(t, e), c = 0; c < n.length; c++) {
                        var f = s(n[c]);
                        0 === a[f].references && (a[f].updater(),
                        a.splice(f, 1))
                    }
                    n = r
                }
            }
        }
    }
    , function(t, e, n) {
        "use strict";
        t.exports = function(t) {
            var e = [];
            return e.toString = function() {
                return this.map((function(e) {
                    var n = function(t, e) {
                        var n, i, o, r = t[1] || "", a = t[3];
                        if (!a)
                            return r;
                        if (e && "function" == typeof btoa) {
                            var s = (n = a,
                            i = btoa(unescape(encodeURIComponent(JSON.stringify(n)))),
                            o = "sourceMappingURL=data:application/json;charset=utf-8;base64,".concat(i),
                            "/*# ".concat(o, " */"))
                              , l = a.sources.map((function(t) {
                                return "/*# sourceURL=".concat(a.sourceRoot || "").concat(t, " */")
                            }
                            ));
                            return [r].concat(l).concat([s]).join("\n")
                        }
                        return [r].join("\n")
                    }(e, t);
                    return e[2] ? "@media ".concat(e[2], " {").concat(n, "}") : n
                }
                )).join("")
            }
            ,
            e.i = function(t, n, i) {
                "string" == typeof t && (t = [[null, t, ""]]);
                var o = {};
                if (i)
                    for (var r = 0; r < this.length; r++) {
                        var a = this[r][0];
                        null != a && (o[a] = !0)
                    }
                for (var s = 0; s < t.length; s++) {
                    var l = [].concat(t[s]);
                    i && o[l[0]] || (n && (l[2] ? l[2] = "".concat(n, " and ").concat(l[2]) : l[2] = n),
                    e.push(l))
                }
            }
            ,
            e
        }
    }
    , function(t, e, n) {
        var i = n(4)
          , o = n(7);
        "string" == typeof (o = o.__esModule ? o.default : o) && (o = [[t.i, o, ""]]);
        var r = {
            injectType: "singletonStyleTag",
            attributes: {
                "data-injector": "kwe-nav"
            },
            insert: "head",
            singleton: !0
        }
          , a = (i(o, r),
        o.locals ? o.locals : {});
        t.exports = a
    }
    , function(t, e, n) {
        (e = n(5)(!1)).push([t.i, "body,html{overflow:hidden}#bofqi,.player,body,html{margin:0;padding:0;width:100%;height:100%}.player .bilibili-player{-webkit-box-shadow:none;box-shadow:none}.player .bilibili-player-video-bottom-area .bilibili-player-video-sendbar{-webkit-box-sizing:border-box;box-sizing:border-box;border-left:1.5px solid #f4f4f4;border-bottom:1.5px solid #f4f4f4;border-right:1.5px solid #f4f4f4}.player-with-auxiliary{display:-webkit-box;display:-ms-flexbox;display:flex}.player-with-auxiliary .player{-webkit-box-flex:1;-ms-flex:1;flex:1}.player-with-auxiliary .danmaku-box{width:320px;margin-left:30px}.player-mode-widescreen .danmaku-box{display:none}", ""]),
        t.exports = e
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(0).__importDefault(n(9))
          , o = function() {
            function t(t) {
                this.config = t,
                this.globalEvents(),
                this.init()
            }
            return t.prototype.globalEvents = function() {
                var t = this;
                window.getPlayList = function() {
                    return t.callParentFunction("getPlayList")
                }
                ,
                window.PlayerAgent = {
                    showPay: function() {
                        if (t.config && "0" === t.config.type)
                            window.open("https://www.bilibili.com/cheese/play/ep" + t.config.episodeId);
                        else {
                            var e = window.show_bv ? window.bvid : "av" + window.aid;
                            window.open("https://www.bilibili.com/" + e)
                        }
                    },
                    showVipPay: function() {
                        if (t.config && "0" === t.config.type)
                            window.open("https://www.bilibili.com/cheese/play/ep" + t.config.episodeId);
                        else {
                            var e = window.show_bv ? window.bvid : "av" + window.aid;
                            window.open("https://www.bilibili.com/" + e)
                        }
                    }
                },
                window.onunload = function() {
                    try {
                        window.player && window.player.destroy()
                    } catch (t) {}
                }
            }
            ,
            t.prototype.init = function() {
                try {
                    window.parent.GrayManager = window.GrayManager,
                    window.heimu = window.parent.heimu = void 0,
                    window.parent.PlayerAgent && (window.PlayerAgent = window.parent.PlayerAgent),
                    window.elecPlugin = window.parent.elecPlugin;
                    for (var t = ["player_widewin", "player_fullwin", "callAppointPart", "playerCallSendLike", "playerCallSendCollect", "playerCallSendCoin", "showPay", "show1080p", "attentionTrigger", "showRealNameBind", "getAuthorInfo"], e = function(e) {
                        "function" == typeof window.parent[t[e]] && window.parent !== window && (window[t[e]] = function() {
                            for (var n = [], i = 0; i < arguments.length; i++)
                                n[i] = arguments[i];
                            return window.parent[t[e]].apply(window.parent, n)
                        }
                        )
                    }, n = 0; n < t.length; n++)
                        e(n)
                } catch (t) {}
                this.playlist = new i.default(this.config)
            }
            ,
            t.prototype.callParentFunction = function(t) {
                for (var e = [], n = 1; n < arguments.length; n++)
                    e[n - 1] = arguments[n];
                try {
                    return window.top !== window.self && window.parent && window.parent[t] && window.parent[t].apply(null, e)
                } catch (t) {}
            }
            ,
            t
        }();
        e.default = o
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(0)
          , o = i.__importDefault(n(2))
          , r = i.__importDefault(n(1))
          , a = n(3)
          , s = function() {
            function t(t) {
                this.plurl = "//wemakeli.net.wm/temp/bili/x/playlist/video/toview?jsonp=jsonp&pid=",
                this.allow = !0,
                this.config = t,
                this.preinit(),
                this.init()
            }
            return t.prototype.preinit = function() {
                if (window.top !== window.self && window.REFERRER_LIST) {
                    try {
                        var t = window.document.referrer.match(/^http(s)?:\/\/(.*?)\//);
                        t && t[2] && !new RegExp(window.REFERRER_LIST.join("|").replace(/\./g, "\\.").replace(/\*/g, ".*")).test(t[2]) ? this.allow = !1 : window.document.referrer || -1 !== window.navigator.userAgent.indexOf("MicroMessenger") || -1 !== window.navigator.userAgent.indexOf("IqiyiApp") || (this.allow = !1)
                    } catch (t) {}
                    try {
                        this.config.record = window.parent.RECORD_STRING || this.config.record || ""
                    } catch (t) {}
                }
            }
            ,
            t.prototype.init = function() {
                var t = this;
                if (this.allow) {
                    var e = this.config;
                    if ("1" === e.auxiliary && (document.getElementsByClassName("player")[0].insertAdjacentHTML("afterend", '<div id="danmukuBox" class="danmaku-box"><div class="danmaku-wrap"></div></div>'),
                    document.body.classList.add("player-with-auxiliary")),
                    !this.onlyH5())
                        if (e.playlistId)
                            this.loadPlayer(e);
                        else {
                            var n = window.getPlayList();
                            if (e.playlist && n) {
                                var i = n && n.data
                                  , o = JSON.stringify(n);
                                e.aid = e.aid || i && i.list && i.list[0].aid,
                                e.bvid = e.bvid || i && i.list && i.list[0].bvid,
                                e.cid = e.cid || i && i.list && i.list[0].pages[0].cid,
                                e.playlist = encodeURIComponent(o),
                                e.playlist_order = e.playlist_order,
                                this.loadPlayer(e)
                            } else
                                e.cid ? this.loadPlayer(e) : r.default.getCid(e, (function(e) {
                                    t.loadPlayer(e)
                                }
                                ))
                        }
                }
            }
            ,
            t.prototype.getToview = function(t) {
                var e = this
                  , n = this.config
                  , i = o.default.getUrlValue;
                $.ajax({
                    url: this.plurl + t,
                    type: "GET",
                    data: {
                        jsonp: "jsonp"
                    },
                    xhrFields: {
                        withCredentials: !0
                    },
                    success: function(t) {
                        var o = t && t.data
                          , r = JSON.stringify(t);
                        n.aid = i("aid") || o && o.list && o.list[0].aid,
                        n.cid = i("cid") || o && o.list && o.list[0].pages[0].cid,
                        n.playlist = encodeURIComponent(r),
                        n.playlist_order = i("playlist_order"),
                        e.loadPlayer(n)
                    }
                })
            }
            ,
            t.prototype.getCid = function() {
                var t = this
                  , e = this.config
                  , n = new XMLHttpRequest;
                n.addEventListener("load", (function() {
                    try {
                        var i = JSON.parse(n.response);
                        if (i && i.data && Array.isArray(i.data.pages))
                            for (var r = i.data.pages, a = +o.default.getUrlValue("page"), s = 0; s < r.length; s++)
                                if (a === +r[s].page) {
                                    e.cid = r[s].cid;
                                    break
                                }
                        t.loadPlayer(e)
                    } catch (t) {}
                }
                )),
                n.addEventListener("error", (function() {
                    t.loadPlayer(e)
                }
                )),
                n.addEventListener("abort", (function() {
                    t.loadPlayer(e)
                }
                )),
                n.open("GET", "wemakeli.net.wm/temp/bili/view?aid=" + o.default.getUrlValue("aid"), !0),
                n.send()
            }
            ,
            t.prototype.loadPlayer = function(t) {
                var e, n = [];
                for (var i in t)
                    ({}).hasOwnProperty.call(t, i) && n.push(i + "=" + (null !== (e = t[i]) && void 0 !== e ? e : ""));
                window.EmbedPlayer && window.EmbedPlayer("player", "", n.join("&")),
                window.parent !== window && this.setParentPlayer()
            }
            ,
            t.prototype.setParentPlayer = function() {
                var t = this;
                if (window.player)
                    try {
                        window.parent.player = window.player,
                        "function" == typeof window.parent.Html5IframeInitialized && window.parent.Html5IframeInitialized()
                    } catch (t) {}
                else
                    setTimeout((function() {
                        t.setParentPlayer()
                    }
                    ), 200)
            }
            ,
            t.prototype.onlyH5 = function() {
                return !(!this.config.musth5 || (!o.default.flashChecker() || o.default.html5Policy()) && o.default.html5Checker() || (this.mustH5(),
                0))
            }
            ,
            t.prototype.mustH5 = function() {
                o.default.loadScript({
                    url: "//s1.hdslb.com/bfs/static/player/tools/must-h5/musth5.js?lastModefied=" + a.metadata.lastModefied,
                    success: function() {
                        new window.Musth5({
                            id: "bofqi",
                            url: "//s1.hdslb.com/bfs/static/player/img/h5.png",
                            textList: ["您当前的浏览器不支持HTML5播放器", "请切换浏览器再试试哦~"]
                        })
                    }
                })
            }
            ,
            t
        }();
        e.default = s
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(0)
          , o = i.__importDefault(n(11))
          , r = i.__importDefault(n(2))
          , a = n(3)
          , s = i.__importDefault(n(1))
          , l = function() {
            function t(t) {
                this.retry = 3,
                this.config = t,
                this.defaulth5 = !0,
                this.globalEvents(),
                this.preinit(),
                this.loadPlayer()
            }
            return t.prototype.loadPlayer = function() {
                var t = this
                  , e = "?lastModified=" + a.metadata.lastModefied;
                r.default.loadScript({
                    url: this.options.url + e,
                    success: function() {
                        t.init()
                    }
                })
            }
            ,
            t.prototype.globalEvents = function() {
                var t, e = this;
                if (window.location.ancestorOrigins)
                    t = window.location.ancestorOrigins[0];
                else {
                    var n = document.referrer
                      , i = /^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)(?::(\d+))?/.exec(n);
                    i && i.length && (t = i[0])
                }
                window.BILIMessage = function(e) {
                    window.parent && window.parent.postMessage(e, t || "*")
                }
                ,
                window.addEventListener("message", (function(n) {
                    (n.origin || n.originalEvent.origin) === t && e.player && e.player.biliMessage(n.data)
                }
                ), !1)
            }
            ,
            t.prototype.preinit = function() {
                this.options = i.__assign({
                    id: "bofqi",
                    wrapClass: ".player"
                }, {
                    gamePlayer: {
                        url: "//s1.hdslb.com/bfs/static/player/main/html5/player.js",
                        flashUrl: "//wemakeli.net.wm/temp/bili/tools/gameplayer/GamePlayer.swf"
                    },
                    litePlayer: {
                        url: "//wemakeli.net.wm/temp/bili/liteplayer.js",
                        flashUrl: "//wemakeli.net.wm/temp/bili/main/flash/outer/miniloader.swf"
                    }
                }[this.config.playerKind]),
                r.default.flashChecker() && !r.default.html5Policy() || !r.default.html5Checker() || "flash" === r.default.getUrlValue("ptype") ? this.defaulth5 = !1 : this.defaulth5 = !0
            }
            ,
            t.prototype.init = function() {
                var t = this;
                this.config.cid ? this.playerLoader() : s.default.getCid(this.config, (function() {
                    t.playerLoader()
                }
                ))
            }
            ,
            t.prototype.playerLoader = function() {
                var t = this;
                if (this.defaulth5)
                    this.config.element = document.getElementById(this.options.id),
                    this.player = new window.bilibiliPlayer(this.config);
                else {
                    if (window.gameQuickLogin = function() {
                        !r.default.version.mobile || r.default.version.iPad ? t.getScript("biliQuickLogin", "//static.hdslb.com/account/bili_quick_login.js", (function() {
                            window.biliQuickLogin((function() {
                                document.getElementById(t.options.id).mukio_reloadAccess(),
                                window.BILIMessage(JSON.stringify({
                                    type: "login",
                                    value: !0
                                }))
                            }
                            ))
                        }
                        )) : window.location.href = "https://passport.bilibili.com/login"
                    }
                    ,
                    !r.default.flashChecker())
                        return void this.showTips();
                    this.config.hasDanmaku = this.config.hasDanmaku ? 0 : "1",
                    this.config.autoplay = this.config.autoplay ? 1 : 0;
                    var e = {
                        aid: this.config.aid,
                        bvid: this.config.bvid,
                        show_bv: this.config.show_bv,
                        cid: this.config.cid,
                        p: this.config.p,
                        autoplay: this.config.autoplay,
                        gamePlayerType: this.config.hasDanmaku,
                        ptype: this.config.ptype
                    };
                    window.swfobject && window.swfobject.embedSWF ? this.loadFlashPlayer(e) : $.ajax({
                        url: "//s1.hdslb.com/bfs/static/player/tools/swfobject/swfobject-v2.js",
                        type: "get",
                        dataType: "script",
                        success: function() {
                            t.loadFlashPlayer(e)
                        }
                    })
                }
            }
            ,
            t.prototype.loadFlashPlayer = function(t) {
                var e = this.options.id;
                $(this.options.wrapClass).html('<div id="' + e + '" class="flash-player"></div>'),
                window.swfobject.embedSWF(this.options.flashUrl, e, "100%", "100%", "0", "", t, {
                    bgcolor: "#ffffff",
                    allowfullscreeninteractive: "true",
                    allowfullscreen: "true",
                    quality: "high",
                    allowscriptaccess: "always",
                    wmode: /Firefox/.test(navigator.userAgent) ? "opaque" : "direct"
                }, {
                    class: "flash-player"
                })
            }
            ,
            t.prototype.showTips = function() {
                var t = {
                    backgroundColor: "#fff",
                    msg: "主人，未安装Flash插件，暂时无法观看直播，您可以…",
                    msgColor: "#000",
                    msgSize: 14,
                    btnList: [{
                        title: "下载Flash插件",
                        type: "flash",
                        theme: "blue"
                    }],
                    hasOrText: !1,
                    miniType: 0
                };
                this.defaulth5 && (t.btnList[0].theme = "white",
                t.btnList.push({
                    title: "使用HTML5播放器",
                    type: "html5",
                    theme: "blue",
                    onClick: function(t) {
                        "function" == typeof t && t()
                    }
                })),
                new o.default($(this.options.wrapClass)[0],t)
            }
            ,
            t.prototype.getScript = function(t, e, n) {
                var i = this;
                window[t] ? "function" == typeof n && n() : $.ajax({
                    url: e,
                    dataType: "script",
                    cache: !0,
                    success: function() {
                        n()
                    },
                    error: function() {
                        i.retry > -1 ? (i.retry -= 1,
                        setTimeout((function() {
                            i.getScript(t, e, n)
                        }
                        ), 1e3)) : window.BILIMessage(JSON.stringify({
                            type: "login",
                            value: !1
                        }))
                    }
                })
            }
            ,
            t
        }();
        e.default = l
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(0);
        n(12);
        var o = i.__importDefault(n(14))
          , r = function() {
            function t(t, e) {
                this.noFlashTips = new o.default(t,e)
            }
            return t.prototype.destroy = function() {
                return this.noFlashTips && this.noFlashTips.destroy(),
                this
            }
            ,
            t
        }();
        e.default = r
    }
    , function(t, e, n) {
        var i = n(4)
          , o = n(13);
        "string" == typeof (o = o.__esModule ? o.default : o) && (o = [[t.i, o, ""]]);
        var r = {
            injectType: "singletonStyleTag",
            attributes: {
                "data-injector": "kwe-nav"
            },
            insert: "head",
            singleton: !0
        }
          , a = (i(o, r),
        o.locals ? o.locals : {});
        t.exports = a
    }
    , function(t, e, n) {
        (e = n(5)(!1)).push([t.i, "@-webkit-keyframes containerShow{0%{opacity:0}to{opacity:1}}@keyframes containerShow{0%{opacity:0}to{opacity:1}}@-webkit-keyframes containerHide{0%{opacity:1}to{opacity:0}}@keyframes containerHide{0%{opacity:1}to{opacity:0}}.bp-no-flash-tips{position:absolute;background:#141414;top:0;left:0;right:0;bottom:0;padding:0;margin:0;color:#fff;z-index:99;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;font-family:Microsoft YaHei,Microsoft Sans Serif,Microsoft SanSerf,\\\\5fae\\8f6f\\96c5\\9ed1;opacity:1;-webkit-animation:containerShow .3s ease-in-out 1 forwards;animation:containerShow .3s ease-in-out 1 forwards}.bp-no-flash-tips-content{width:440px;height:300px;position:absolute;top:50%;left:50%;margin:-150px 0 0 -220px;text-align:center}.bp-no-flash-tips-missing-image{width:345px;height:204px;margin:0 auto}.bp-no-flash-tips-missing-image img{display:block;width:100%;height:100%}.bp-no-flash-tips-info{font-size:18px;color:#999;cursor:default}.bp-no-flash-tips-btn-content{margin-top:24px}.bp-no-flash-tips-or{font-size:14px;color:#999;margin:0 10px;cursor:default}.bp-no-flash-tips-btn{display:inline-block;height:32px;line-height:32px;color:#fff;text-align:center;border-radius:4px;font-size:14px;font-family:Microsoft YaHei,Microsoft Sans Serif,Microsoft SanSerf,\\\\5fae\\8f6f\\96c5\\9ed1;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;text-decoration:none;-webkit-transition:all .2s ease-in-out;transition:all .2s ease-in-out;width:148px;background:#dc2028;margin:0 10px;border:1px solid #dc2028;outline:none}.bp-no-flash-tips-btn:hover{background:#f6373f;color:#fff;outline:none}.bp-no-flash-tips-btn-red{background:#dc2028;border-color:#dc2028}.bp-no-flash-tips-btn-red:hover{background:#f6373f;color:#fff}.bp-no-flash-tips-btn-orange{background:#f06525;border-color:#f06525}.bp-no-flash-tips-btn-orange:hover{background:#ff793b;color:#fff}.bp-no-flash-tips-btn-white{background:#fff;border-color:#00a1d6;color:#00a1d6}.bp-no-flash-tips-btn-white:hover{background:#fff;border-color:#00b5e5;color:#00b5e5}.bp-no-flash-tips-btn-blue{background:#00a1d6;border-color:#00a1d6;color:#fff}.bp-no-flash-tips-btn-blue:hover{background:#00b5e5;border-color:#00b5e5}.bp-no-flash-tips-destroying{-webkit-animation:containerHide .3s ease-in-out 1 forwards;animation:containerHide .3s ease-in-out 1 forwards}.bp-no-flash-tips-mini-info{display:none;font-size:14px;width:80%;height:auto;min-height:24px;line-height:24px;text-align:center;position:absolute;top:50%;margin:0 10%;-webkit-transform:translateY(-50%);transform:translateY(-50%);letter-spacing:1px;cursor:default}.bp-no-flash-tips-mini .bp-no-flash-tips-content{width:80%;height:200px;margin:-90px 0 0 -40%}.bp-no-flash-tips-mini .bp-no-flash-tips-missing-image{width:200px;height:118px}.bp-no-flash-tips-mini .bp-no-flash-tips-info{font-size:12px!important;line-height:18px}.bp-no-flash-tips-mini .bp-no-flash-tips-btn-content{margin-top:10px;white-space:nowrap}.bp-no-flash-tips-mini .bp-no-flash-tips-or{font-size:12px!important;margin:0 4px}.bp-no-flash-tips-mini .bp-no-flash-tips-btn{width:120px!important;height:24px!important;line-height:24px!important;font-size:12px!important;margin:0 5px}.bp-no-flash-tips-mini .bp-no-flash-tips-btn.bp-no-flash-tips-flash-btn{width:90px!important}.bp-no-flash-tips-mini-info-only .bp-no-flash-tips-content{display:none}.bp-no-flash-tips-mini-info-only .bp-no-flash-tips-mini-info{display:block}", ""]),
        t.exports = e
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(0).__importDefault(n(15))
          , o = function() {
            function t(t, e) {
                if (!(t && t instanceof Element))
                    throw new Error("Container Error");
                this.container = t,
                this.config = i.default.extend({}, {
                    backgroundColor: "#141414",
                    msg: "主人，未安装Flash插件，暂时无法观看视频，您可以…",
                    msgColor: "#999",
                    msgSize: 18,
                    btnList: [{
                        title: "下载Flash插件",
                        width: 120,
                        height: 32,
                        type: "flash",
                        theme: "red"
                    }, {
                        title: "使用HTML5播放器",
                        width: 150,
                        height: 32,
                        type: "html5",
                        theme: "orange",
                        onClick: function() {}
                    }],
                    hasOrText: !0,
                    miniType: 0,
                    miniMsg: "Flash未安装或者被禁用",
                    miniColor: "#fff"
                }, e),
                this.destroyStatus = !1,
                this.REMOVE_INTERVAL = 0,
                this.onMini = !1,
                this.callbackMap = {},
                this.prefix = "bp-no-flash-tips";
                try {
                    this.init()
                } catch (t) {}
            }
            return t.prototype.init = function() {
                var t = this.config;
                this.addContainerPosition(),
                this.tips = document.createElement("div"),
                this.tips.className = "" + this.prefix,
                this.tips.style.backgroundColor = t.backgroundColor,
                this.tips.innerHTML = '\n            <div class="' + this.prefix + '-content">\n                 <div class="' + this.prefix + '-missing-image">\n                    <img src="//s1.hdslb.com/bfs/static/player/img/missing.png">\n                 </div>\n                 <div class="' + this.prefix + '-info" style="color:' + t.msgColor + ";font-size:" + t.msgSize + 'px;">\n                    ' + t.msg + '\n                </div>\n                 <div class="' + this.prefix + '-btn-content">\n                    ' + this.createBtns() + '\n                </div>\n            </div>    \n            <div class="' + this.prefix + '-mini-info" style="color:' + t.miniColor + '">' + t.miniMsg + "</div>",
                this.container.appendChild(this.tips),
                this.bindEvents()
            }
            ,
            t.prototype.bindEvents = function() {
                var t = this
                  , e = this.tips
                  , n = this.callbackMap;
                e.addEventListener && e.addEventListener("click", (function(e) {
                    var o = (e || window.event).target.id;
                    o && n[o] && i.default.callFunction(n[o], t.destroy.bind(t))
                }
                ));
                var o = i.default.bindElemResize(e, (function(e, n) {
                    if (e <= 400 && !t.onMini) {
                        t.onMini = !0;
                        var i = 0 === t.config.miniType ? t.prefix + "-mini" : t.prefix + "-mini " + t.prefix + "-mini-info-only";
                        t.tips.className = t.prefix + " " + i
                    } else
                        e > 400 && t.onMini && (t.onMini = !1,
                        t.tips.className = "" + t.prefix)
                }
                ));
                "function" == typeof o && o()
            }
            ,
            t.prototype.addContainerPosition = function() {
                var t = this.container;
                if (window.getComputedStyle) {
                    var e = window.getComputedStyle(t).position;
                    e && "static" !== e || (t.style.position = "relative")
                }
            }
            ,
            t.prototype.createBtns = function() {
                var t = this
                  , e = this.config
                  , n = e.btnList
                  , o = "";
                return n instanceof Array && n.length && n.forEach((function(r, a) {
                    var s = "width:" + r.width + "px;height:" + (r.height - 2) + "px;line-height:" + (r.height - 2) + "px;";
                    if ("flash" === r.type)
                        o += '<a href="https://www.adobe.com/go/getflashplayer" target="_blank" class="' + t.prefix + "-btn " + t.prefix + "-flash-btn " + t.prefix + "-btn-" + r.theme + '" style="' + s + '">' + r.title + "</a>";
                    else {
                        var l = i.default.getRandomID(12);
                        o += '<a id="' + l + '" href="javascript:;" class="' + t.prefix + "-btn " + t.prefix + "-btn-" + r.theme + '" style="' + s + '">' + r.title + "</a>",
                        r.onClick && t.addCallback(l, r.onClick)
                    }
                    a < n.length - 1 && e.hasOrText && (o += '<span class="' + t.prefix + '-or" style="height:' + (r.height - 2) + "px;line-height:" + (r.height - 2) + 'px;">或</span>')
                }
                )),
                o
            }
            ,
            t.prototype.addCallback = function(t, e) {
                t && "function" == typeof e && (this.callbackMap[t] || (this.callbackMap[t] = []),
                this.callbackMap[t].push(e))
            }
            ,
            t.prototype.destroy = function() {
                if (!this.destroyStatus) {
                    this.destroyStatus = !0;
                    var t = this.container
                      , e = this.tips
                      , n = this.prefix
                      , i = this.onMini ? n + "-mini" : "";
                    e.className = n + " " + i + " " + n + "-destroying",
                    this.callbackMap = {},
                    clearTimeout(this.REMOVE_INTERVAL),
                    this.REMOVE_INTERVAL = window.setTimeout((function() {
                        t && e && e.parentNode && t.removeChild && t.removeChild(e)
                    }
                    ), 300)
                }
            }
            ,
            t
        }();
        e.default = o
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = {
            extend: function(t) {
                for (var e = [], n = 1; n < arguments.length; n++)
                    e[n - 1] = arguments[n];
                var i = t || {};
                return i instanceof Object && e.forEach((function(t) {
                    t instanceof Object && Object.keys(t).forEach((function(e) {
                        i[e] = t[e]
                    }
                    ))
                }
                )),
                i
            },
            getRandomID: function(t) {
                void 0 === t && (t = 8);
                for (var e = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", n = "", i = 0; i < t; i++)
                    n += e.charAt(Math.floor(Math.random() * e.length));
                return n
            },
            callFunction: function(t, e) {
                return t instanceof Array && t.length ? (t.forEach((function(t) {
                    return "function" == typeof t && t(e)
                }
                )),
                null) : "function" == typeof t && t(e)
            },
            bindElemResize: function(t, e) {
                if (!t || !t.getBoundingClientRect)
                    return !1;
                var n = 0
                  , i = 0;
                function o() {
                    var o = t.getBoundingClientRect()
                      , r = o.width
                      , a = o.height;
                    r === n && a === i || (n = r,
                    i = a,
                    "function" == typeof e && e(r, a))
                }
                return document.addEventListener("scroll", o),
                window.addEventListener("resize", o),
                o
            }
        };
        e.default = i
    }
    , function(t, e, n) {
        "use strict";
        n.r(e);
        var i = function(t) {
            var e = this.constructor;
            return this.then((function(n) {
                return e.resolve(t()).then((function() {
                    return n
                }
                ))
            }
            ), (function(n) {
                return e.resolve(t()).then((function() {
                    return e.reject(n)
                }
                ))
            }
            ))
        }
          , o = setTimeout;
        function r(t) {
            return Boolean(t && void 0 !== t.length)
        }
        function a() {}
        function s(t) {
            if (!(this instanceof s))
                throw new TypeError("Promises must be constructed via new");
            if ("function" != typeof t)
                throw new TypeError("not a function");
            this._state = 0,
            this._handled = !1,
            this._value = void 0,
            this._deferreds = [],
            p(t, this)
        }
        function l(t, e) {
            for (; 3 === t._state; )
                t = t._value;
            0 !== t._state ? (t._handled = !0,
            s._immediateFn((function() {
                var n = 1 === t._state ? e.onFulfilled : e.onRejected;
                if (null !== n) {
                    var i;
                    try {
                        i = n(t._value)
                    } catch (t) {
                        return void f(e.promise, t)
                    }
                    c(e.promise, i)
                } else
                    (1 === t._state ? c : f)(e.promise, t._value)
            }
            ))) : t._deferreds.push(e)
        }
        function c(t, e) {
            try {
                if (e === t)
                    throw new TypeError("A promise cannot be resolved with itself.");
                if (e && ("object" == typeof e || "function" == typeof e)) {
                    var n = e.then;
                    if (e instanceof s)
                        return t._state = 3,
                        t._value = e,
                        void u(t);
                    if ("function" == typeof n)
                        return void p((i = n,
                        o = e,
                        function() {
                            i.apply(o, arguments)
                        }
                        ), t)
                }
                t._state = 1,
                t._value = e,
                u(t)
            } catch (e) {
                f(t, e)
            }
            var i, o
        }
        function f(t, e) {
            t._state = 2,
            t._value = e,
            u(t)
        }
        function u(t) {
            2 === t._state && 0 === t._deferreds.length && s._immediateFn((function() {
                t._handled || s._unhandledRejectionFn(t._value)
            }
            ));
            for (var e = 0, n = t._deferreds.length; e < n; e++)
                l(t, t._deferreds[e]);
            t._deferreds = null
        }
        function d(t, e, n) {
            this.onFulfilled = "function" == typeof t ? t : null,
            this.onRejected = "function" == typeof e ? e : null,
            this.promise = n
        }
        function p(t, e) {
            var n = !1;
            try {
                t((function(t) {
                    n || (n = !0,
                    c(e, t))
                }
                ), (function(t) {
                    n || (n = !0,
                    f(e, t))
                }
                ))
            } catch (t) {
                if (n)
                    return;
                n = !0,
                f(e, t)
            }
        }
        s.prototype.catch = function(t) {
            return this.then(null, t)
        }
        ,
        s.prototype.then = function(t, e) {
            var n = new this.constructor(a);
            return l(this, new d(t,e,n)),
            n
        }
        ,
        s.prototype.finally = i,
        s.all = function(t) {
            return new s((function(e, n) {
                if (!r(t))
                    return n(new TypeError("Promise.all accepts an array"));
                var i = Array.prototype.slice.call(t);
                if (0 === i.length)
                    return e([]);
                var o = i.length;
                function a(t, r) {
                    try {
                        if (r && ("object" == typeof r || "function" == typeof r)) {
                            var s = r.then;
                            if ("function" == typeof s)
                                return void s.call(r, (function(e) {
                                    a(t, e)
                                }
                                ), n)
                        }
                        i[t] = r,
                        0 == --o && e(i)
                    } catch (t) {
                        n(t)
                    }
                }
                for (var s = 0; s < i.length; s++)
                    a(s, i[s])
            }
            ))
        }
        ,
        s.resolve = function(t) {
            return t && "object" == typeof t && t.constructor === s ? t : new s((function(e) {
                e(t)
            }
            ))
        }
        ,
        s.reject = function(t) {
            return new s((function(e, n) {
                n(t)
            }
            ))
        }
        ,
        s.race = function(t) {
            return new s((function(e, n) {
                if (!r(t))
                    return n(new TypeError("Promise.race accepts an array"));
                for (var i = 0, o = t.length; i < o; i++)
                    s.resolve(t[i]).then(e, n)
            }
            ))
        }
        ,
        s._immediateFn = "function" == typeof setImmediate && function(t) {
            setImmediate(t)
        }
        || function(t) {
            o(t, 0)
        }
        ,
        s._unhandledRejectionFn = function(t) {
            "undefined" != typeof console && console
        }
        ;
        var h = s
          , y = function() {
            if ("undefined" != typeof self)
                return self;
            if ("undefined" != typeof window)
                return window;
            if ("undefined" != typeof global)
                return global;
            throw new Error("unable to locate global object")
        }();
        "Promise"in y ? y.Promise.prototype.finally || (y.Promise.prototype.finally = i) : y.Promise = h
    }
    ]).default
}
,
"object" == typeof exports && "object" == typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define("PlayerSelector", [], e) : "object" == typeof exports ? exports.PlayerSelector = e() : t.PlayerSelector = e();
//# sourceMappingURL=player-selector.js.map
