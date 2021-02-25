/* == malihu jquery custom scrollbar plugin == Version: 3.1.5, License: MIT License (MIT) */
(function(q, u) {
    if ("object" === typeof exports && "object" === typeof module)
        module.exports = u();
    else if ("function" === typeof define && define.amd)
        define([], u);
    else {
        u = u();
        for (var A in u)
            ("object" === typeof exports ? exports : q)[A] = u[A]
    }
}
)("undefined" !== typeof self ? self : this, function() {
    return function(q) {
        function u(r) {
            if (A[r])
                return A[r].exports;
            var c = A[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            q[r].call(c.exports, c, c.exports, u);
            c.l = !0;
            return c.exports
        }
        var A = {};
        u.m = q;
        u.c = A;
        u.d = function(r, c, A) {
            u.o(r, c) || Object.defineProperty(r, c, {
                configurable: !1,
                enumerable: !0,
                get: A
            })
        }
        ;
        u.n = function(r) {
            var c = r && r.__esModule ? function() {
                return r["default"]
            }
            : function() {
                return r
            }
            ;
            u.d(c, "a", c);
            return c
        }
        ;
        u.o = function(r, c) {
            return Object.prototype.hasOwnProperty.call(r, c)
        }
        ;
        u.p = "";
        return u(u.s = 0)
    }([function(q, u, A) {
        var r = "function" === typeof Symbol && "symbol" === typeof Symbol.iterator ? function(c) {
            return typeof c
        }
        : function(c) {
            return c && "function" === typeof Symbol && c.constructor === Symbol && c !== Symbol.prototype ? "symbol" : typeof c
        }
        ;
        (function(c) {
            (function() {
                var u = {
                    setTop: 0,
                    setLeft: 0,
                    axis: "y",
                    scrollbarPosition: "inside",
                    scrollInertia: 950,
                    autoDraggerLength: !0,
                    alwaysShowScrollbar: 0,
                    snapOffset: 0,
                    mouseWheel: {
                        enable: !0,
                        scrollAmount: "auto",
                        axis: "y",
                        deltaFactor: "auto",
                        disableOver: ["select", "option", "keygen", "datalist", "textarea"]
                    },
                    scrollButtons: {
                        scrollType: "stepless",
                        scrollAmount: "auto"
                    },
                    keyboard: {
                        enable: !0,
                        scrollType: "stepless",
                        scrollAmount: "auto"
                    },
                    contentTouchScroll: 25,
                    documentTouchScroll: !0,
                    advanced: {
                        autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
                        updateOnContentResize: !0,
                        updateOnImageLoad: "auto",
                        autoUpdateTimeout: 60
                    },
                    theme: "light",
                    callbacks: {
                        onTotalScrollOffset: 0,
                        onTotalScrollBackOffset: 0,
                        alwaysTriggerOffsets: !0
                    }
                }, A = 0, q = {}, Q = window.attachEvent && !window.addEventListener ? 1 : 0, E = !1, L, n = "mCSB_dragger_onDrag mCSB_scrollTools_onDrag mCS_img_loaded mCS_disabled mCS_destroyed mCS_no_scrollbar mCS-autoHide mCS-dir-rtl mCS_no_scrollbar_y mCS_no_scrollbar_x mCS_y_hidden mCS_x_hidden mCSB_draggerContainer mCSB_buttonUp mCSB_buttonDown mCSB_buttonLeft mCSB_buttonRight".split(" "), C = {
                    init: function(a) {
                        a = c.extend(!0, {}, u, a);
                        var d = I.call(this);
                        if (a.live) {
                            var b = a.liveSelector || this.selector || ".mCustomScrollbar";
                            var e = c(b);
                            if ("off" === a.live) {
                                T(b);
                                return
                            }
                            q[b] = setTimeout(function() {
                                e.mCustomScrollbar(a);
                                "once" === a.live && e.length && T(b)
                            }, 500)
                        } else
                            T(b);
                        a.setWidth = a.set_width ? a.set_width : a.setWidth;
                        a.setHeight = a.set_height ? a.set_height : a.setHeight;
                        a.axis = a.horizontalScroll ? "x" : ka(a.axis);
                        a.scrollInertia = 0 < a.scrollInertia && 17 > a.scrollInertia ? 17 : a.scrollInertia;
                        "object" !== r(a.mouseWheel) && 1 == a.mouseWheel && (a.mouseWheel = {
                            enable: !0,
                            scrollAmount: "auto",
                            axis: "y",
                            preventDefault: !1,
                            deltaFactor: "auto",
                            normalizeDelta: !1,
                            invert: !1
                        });
                        a.mouseWheel.scrollAmount = a.mouseWheelPixels ? a.mouseWheelPixels : a.mouseWheel.scrollAmount;
                        a.mouseWheel.normalizeDelta = a.advanced.normalizeMouseWheelDelta ? a.advanced.normalizeMouseWheelDelta : a.mouseWheel.normalizeDelta;
                        a.scrollButtons.scrollType = la(a.scrollButtons.scrollType);
                        da(a);
                        return c(d).each(function() {
                            var b = c(this);
                            if (!b.data("mCS")) {
                                b.data("mCS", {
                                    idx: ++A,
                                    opt: a,
                                    scrollRatio: {
                                        y: null,
                                        x: null
                                    },
                                    overflowed: null,
                                    contentReset: {
                                        y: null,
                                        x: null
                                    },
                                    bindEvents: !1,
                                    tweenRunning: !1,
                                    sequential: {},
                                    langDir: b.css("direction"),
                                    cbOffsets: null,
                                    trigger: null,
                                    poll: {
                                        size: {
                                            o: 0,
                                            n: 0
                                        },
                                        img: {
                                            o: 0,
                                            n: 0
                                        },
                                        change: {
                                            o: 0,
                                            n: 0
                                        }
                                    }
                                });
                                var d = b.data("mCS")
                                  , f = d.opt
                                  , e = b.data("mcs-axis")
                                  , g = b.data("mcs-scrollbar-position")
                                  , l = b.data("mcs-theme");
                                e && (f.axis = e);
                                g && (f.scrollbarPosition = g);
                                l && (f.theme = l,
                                da(f));
                                var g = c(this)
                                  , e = g.data("mCS")
                                  , l = e.opt
                                  , p = l.autoExpandScrollbar ? " " + n[1] + "_expand" : ""
                                  , p = ["<div id='mCSB_" + e.idx + "_scrollbar_vertical' class='mCSB_scrollTools mCSB_" + e.idx + "_scrollbar mCS-" + l.theme + " mCSB_scrollTools_vertical" + p + "'><div class='" + n[12] + "'><div id='mCSB_" + e.idx + "_dragger_vertical' class='mCSB_dragger' style='position:absolute;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>", "<div id='mCSB_" + e.idx + "_scrollbar_horizontal' class='mCSB_scrollTools mCSB_" + e.idx + "_scrollbar mCS-" + l.theme + " mCSB_scrollTools_horizontal" + p + "'><div class='" + n[12] + "'><div id='mCSB_" + e.idx + "_dragger_horizontal' class='mCSB_dragger' style='position:absolute;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>"]
                                  , B = "yx" === l.axis ? "mCSB_vertical_horizontal" : "x" === l.axis ? "mCSB_horizontal" : "mCSB_vertical"
                                  , p = "yx" === l.axis ? p[0] + p[1] : "x" === l.axis ? p[1] : p[0]
                                  , ma = "yx" === l.axis ? "<div id='mCSB_" + e.idx + "_container_wrapper' class='mCSB_container_wrapper' />" : ""
                                  , v = l.autoHideScrollbar ? " " + n[6] : ""
                                  , M = "x" !== l.axis && "rtl" === e.langDir ? " " + n[7] : "";
                                l.setWidth && g.css("width", l.setWidth);
                                l.setHeight && g.css("height", l.setHeight);
                                l.setLeft = "y" !== l.axis && "rtl" === e.langDir ? "989999px" : l.setLeft;
                                g.addClass("mCustomScrollbar _mCS_" + e.idx + v + M).wrapInner("<div id='mCSB_" + e.idx + "' class='mCustomScrollBox mCS-" + l.theme + " " + B + "'><div id='mCSB_" + e.idx + "_container' class='mCSB_container' style='position:relative; top:" + l.setTop + "; left:" + l.setLeft + ";' dir='" + e.langDir + "' /></div>");
                                B = c("#mCSB_" + e.idx);
                                v = c("#mCSB_" + e.idx + "_container");
                                "y" === l.axis || l.advanced.autoExpandHorizontalScroll || v.css("width", ea(v));
                                "outside" === l.scrollbarPosition ? ("static" === g.css("position") && g.css("position", "relative"),
                                g.css("overflow", "visible"),
                                B.addClass("mCSB_outside").after(p)) : (B.addClass("mCSB_inside").append(p),
                                v.wrap(ma));
                                l = c(this).data("mCS");
                                g = l.opt;
                                l = c(".mCSB_" + l.idx + "_scrollbar:first");
                                p = U(g.scrollButtons.tabindex) ? "tabindex='" + g.scrollButtons.tabindex + "'" : "";
                                p = ["<a href='#' class='" + n[13] + "' " + p + " />", "<a href='#' class='" + n[14] + "' " + p + " />", "<a href='#' class='" + n[15] + "' " + p + " />", "<a href='#' class='" + n[16] + "' " + p + " />"];
                                p = ["x" === g.axis ? p[2] : p[0], "x" === g.axis ? p[3] : p[1], p[2], p[3]];
                                g.scrollButtons.enable && l.prepend(p[0]).append(p[1]).next(".mCSB_scrollTools").prepend(p[2]).append(p[3]);
                                e = [c("#mCSB_" + e.idx + "_dragger_vertical"), c("#mCSB_" + e.idx + "_dragger_horizontal")];
                                e[0].css("min-height", e[0].height());
                                e[1].css("min-width", e[1].width());
                                d && f.callbacks.onCreate && "function" === typeof f.callbacks.onCreate && f.callbacks.onCreate.call(this);
                                c("#mCSB_" + d.idx + "_container img:not(." + n[2] + ")").addClass(n[2]);
                                C.update.call(null, b)
                            }
                        })
                    },
                    update: function(a, d) {
                        a = a || I.call(this);
                        return c(a).each(function() {
                            var a = c(this);
                            if (a.data("mCS")) {
                                var e = a.data("mCS")
                                  , k = e.opt
                                  , h = c("#mCSB_" + e.idx + "_container")
                                  , f = c("#mCSB_" + e.idx)
                                  , m = [c("#mCSB_" + e.idx + "_dragger_vertical"), c("#mCSB_" + e.idx + "_dragger_horizontal")];
                                if (h.length) {
                                    e.tweenRunning && G(a);
                                    d && e && k.callbacks.onBeforeUpdate && "function" === typeof k.callbacks.onBeforeUpdate && k.callbacks.onBeforeUpdate.call(this);
                                    a.hasClass(n[3]) && a.removeClass(n[3]);
                                    a.hasClass(n[4]) && a.removeClass(n[4]);
                                    f.css("max-height", "none");
                                    f.height() !== a.height() && f.css("max-height", a.height());
                                    var g = c(this).data("mCS")
                                      , f = g.opt
                                      , g = c("#mCSB_" + g.idx + "_container");
                                    if (f.advanced.autoExpandHorizontalScroll && "y" !== f.axis) {
                                        g.css({
                                            width: "auto",
                                            "min-width": 0,
                                            "overflow-x": "scroll"
                                        });
                                        var l = Math.ceil(g[0].scrollWidth);
                                        3 === f.advanced.autoExpandHorizontalScroll || 2 !== f.advanced.autoExpandHorizontalScroll && l > g.parent().width() ? g.css({
                                            width: l,
                                            "min-width": "100%",
                                            "overflow-x": "inherit"
                                        }) : g.css({
                                            "overflow-x": "inherit",
                                            position: "absolute"
                                        }).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({
                                            width: Math.ceil(g[0].getBoundingClientRect().right + .4) - Math.floor(g[0].getBoundingClientRect().left),
                                            "min-width": "100%",
                                            position: "relative"
                                        }).unwrap()
                                    }
                                    "y" === k.axis || k.advanced.autoExpandHorizontalScroll || h.css("width", ea(h));
                                    var p = c(this).data("mCS")
                                      , f = c("#mCSB_" + p.idx)
                                      , l = c("#mCSB_" + p.idx + "_container")
                                      , g = null == p.overflowed ? l.height() : l.outerHeight(!1)
                                      , p = null == p.overflowed ? l.width() : l.outerWidth(!1)
                                      , B = l[0].scrollHeight
                                      , l = l[0].scrollWidth;
                                    B > g && (g = B);
                                    l > p && (p = l);
                                    f = [g > f.height(), p > f.width()];
                                    e.overflowed = f;
                                    fa.call(this);
                                    k.autoDraggerLength && (f = c(this).data("mCS"),
                                    g = c("#mCSB_" + f.idx),
                                    l = c("#mCSB_" + f.idx + "_container"),
                                    f = [c("#mCSB_" + f.idx + "_dragger_vertical"), c("#mCSB_" + f.idx + "_dragger_horizontal")],
                                    g = [g.height() / l.outerHeight(!1), g.width() / l.outerWidth(!1)],
                                    g = [parseInt(f[0].css("min-height")), Math.round(g[0] * f[0].parent().height()), parseInt(f[1].css("min-width")), Math.round(g[1] * f[1].parent().width())],
                                    l = Q && g[3] < g[2] ? g[2] : g[3],
                                    f[0].css({
                                        height: Q && g[1] < g[0] ? g[0] : g[1],
                                        "max-height": f[0].parent().height() - 10
                                    }).find(".mCSB_dragger_bar").css({
                                        "line-height": g[0] + "px"
                                    }),
                                    f[1].css({
                                        width: l,
                                        "max-width": f[1].parent().width() - 10
                                    }));
                                    f = c(this).data("mCS");
                                    l = c("#mCSB_" + f.idx);
                                    p = c("#mCSB_" + f.idx + "_container");
                                    g = [c("#mCSB_" + f.idx + "_dragger_vertical"), c("#mCSB_" + f.idx + "_dragger_horizontal")];
                                    l = [p.outerHeight(!1) - l.height(), p.outerWidth(!1) - l.width()];
                                    g = [l[0] / (g[0].parent().height() - g[0].height()), l[1] / (g[1].parent().width() - g[1].width())];
                                    f.scrollRatio = {
                                        y: g[0],
                                        x: g[1]
                                    };
                                    na.call(this);
                                    h = [Math.abs(h[0].offsetTop), Math.abs(h[0].offsetLeft)];
                                    "x" !== k.axis && (e.overflowed[0] ? m[0].height() > m[0].parent().height() ? J.call(this) : (y(a, h[0].toString(), {
                                        dir: "y",
                                        dur: 0,
                                        overwrite: "none"
                                    }),
                                    e.contentReset.y = null) : (J.call(this),
                                    "y" === k.axis ? V.call(this) : "yx" === k.axis && e.overflowed[1] && y(a, h[1].toString(), {
                                        dir: "x",
                                        dur: 0,
                                        overwrite: "none"
                                    })));
                                    "y" !== k.axis && (e.overflowed[1] ? m[1].width() > m[1].parent().width() ? J.call(this) : (y(a, h[1].toString(), {
                                        dir: "x",
                                        dur: 0,
                                        overwrite: "none"
                                    }),
                                    e.contentReset.x = null) : (J.call(this),
                                    "x" === k.axis ? V.call(this) : "yx" === k.axis && e.overflowed[0] && y(a, h[0].toString(), {
                                        dir: "y",
                                        dur: 0,
                                        overwrite: "none"
                                    })));
                                    d && e && (2 === d && k.callbacks.onImageLoad && "function" === typeof k.callbacks.onImageLoad ? k.callbacks.onImageLoad.call(this) : 3 === d && k.callbacks.onSelectorChange && "function" === typeof k.callbacks.onSelectorChange ? k.callbacks.onSelectorChange.call(this) : k.callbacks.onUpdate && "function" === typeof k.callbacks.onUpdate && k.callbacks.onUpdate.call(this));
                                    Y.call(this)
                                }
                            }
                        })
                    },
                    scrollTo: function(a, d) {
                        if ("undefined" !== typeof a && null != a) {
                            var b = I.call(this);
                            return c(b).each(function() {
                                var b = c(this);
                                if (b.data("mCS")) {
                                    var k = b.data("mCS")
                                      , h = k.opt
                                      , f = c.extend(!0, {}, {
                                        trigger: "external",
                                        scrollInertia: h.scrollInertia,
                                        scrollEasing: "mcsEaseInOut",
                                        moveDragger: !1,
                                        timeout: 60,
                                        callbacks: !0,
                                        onStart: !0,
                                        onUpdate: !0,
                                        onComplete: !0
                                    }, d)
                                      , m = Z.call(this, a)
                                      , g = 0 < f.scrollInertia && 17 > f.scrollInertia ? 17 : f.scrollInertia;
                                    m[0] = ga.call(this, m[0], "y");
                                    m[1] = ga.call(this, m[1], "x");
                                    f.moveDragger && (m[0] *= k.scrollRatio.y,
                                    m[1] *= k.scrollRatio.x);
                                    f.dur = oa() ? 0 : g;
                                    setTimeout(function() {
                                        null !== m[0] && "undefined" !== typeof m[0] && "x" !== h.axis && k.overflowed[0] && (f.dir = "y",
                                        f.overwrite = "all",
                                        y(b, m[0].toString(), f));
                                        null !== m[1] && "undefined" !== typeof m[1] && "y" !== h.axis && k.overflowed[1] && (f.dir = "x",
                                        f.overwrite = "none",
                                        y(b, m[1].toString(), f))
                                    }, f.timeout)
                                }
                            })
                        }
                    },
                    stop: function() {
                        var a = I.call(this);
                        return c(a).each(function() {
                            var a = c(this);
                            a.data("mCS") && G(a)
                        })
                    },
                    disable: function(a) {
                        var d = I.call(this);
                        return c(d).each(function() {
                            var b = c(this);
                            b.data("mCS") && (b.data("mCS"),
                            Y.call(this, "remove"),
                            V.call(this),
                            a && J.call(this),
                            fa.call(this, !0),
                            b.addClass(n[3]))
                        })
                    },
                    destroy: function() {
                        var a = I.call(this);
                        return c(a).each(function() {
                            var d = c(this);
                            if (d.data("mCS")) {
                                var b = d.data("mCS")
                                  , e = b.opt
                                  , k = c("#mCSB_" + b.idx)
                                  , h = c("#mCSB_" + b.idx + "_container")
                                  , f = c(".mCSB_" + b.idx + "_scrollbar");
                                e.live && T(e.liveSelector || c(a).selector);
                                Y.call(this, "remove");
                                V.call(this);
                                J.call(this);
                                d.removeData("mCS");
                                F(this, "mcs");
                                f.remove();
                                h.find("img." + n[2]).removeClass(n[2]);
                                k.replaceWith(h.contents());
                                d.removeClass("mCustomScrollbar _mCS_" + b.idx + " " + n[6] + " " + n[7] + " " + n[5] + " " + n[3]).addClass(n[4])
                            }
                        })
                    }
                }, I = function() {
                    return "object" !== r(c(this)) || 1 > c(this).length ? ".mCustomScrollbar" : this
                }, da = function(a) {
                    a.autoDraggerLength = -1 < c.inArray(a.theme, ["rounded", "rounded-dark", "rounded-dots", "rounded-dots-dark"]) ? !1 : a.autoDraggerLength;
                    a.autoExpandScrollbar = -1 < c.inArray(a.theme, "rounded-dots rounded-dots-dark 3d 3d-dark 3d-thick 3d-thick-dark inset inset-dark inset-2 inset-2-dark inset-3 inset-3-dark".split(" ")) ? !1 : a.autoExpandScrollbar;
                    a.scrollButtons.enable = -1 < c.inArray(a.theme, ["minimal", "minimal-dark"]) ? !1 : a.scrollButtons.enable;
                    a.autoHideScrollbar = -1 < c.inArray(a.theme, ["minimal", "minimal-dark"]) ? !0 : a.autoHideScrollbar;
                    a.scrollbarPosition = -1 < c.inArray(a.theme, ["minimal", "minimal-dark"]) ? "outside" : a.scrollbarPosition
                }, T = function(a) {
                    q[a] && (clearTimeout(q[a]),
                    F(q, a))
                }, ka = function(a) {
                    return "yx" === a || "xy" === a || "auto" === a ? "yx" : "x" === a || "horizontal" === a ? "x" : "y"
                }, la = function(a) {
                    return "stepped" === a || "pixels" === a || "step" === a || "click" === a ? "stepped" : "stepless"
                }, ea = function(a) {
                    var d = [a[0].scrollWidth, Math.max.apply(Math, a.children().map(function() {
                        return c(this).outerWidth(!0)
                    }).get())];
                    a = a.parent().width();
                    return d[0] > a ? d[0] : d[1] > a ? d[1] : "100%"
                }, W = function(a, d, b) {
                    b = b ? n[0] + "_expanded" : "";
                    var c = a.closest(".mCSB_scrollTools");
                    "active" === d ? (a.toggleClass(n[0] + " " + b),
                    c.toggleClass(n[1]),
                    a[0]._draggable = a[0]._draggable ? 0 : 1) : a[0]._draggable || ("hide" === d ? (a.removeClass(n[0]),
                    c.removeClass(n[1])) : (a.addClass(n[0]),
                    c.addClass(n[1])))
                }, J = function() {
                    var a = c(this)
                      , d = a.data("mCS")
                      , b = d.opt
                      , e = c("#mCSB_" + d.idx)
                      , k = c("#mCSB_" + d.idx + "_container")
                      , h = [c("#mCSB_" + d.idx + "_dragger_vertical"), c("#mCSB_" + d.idx + "_dragger_horizontal")];
                    G(a);
                    if ("x" !== b.axis && !d.overflowed[0] || "y" === b.axis && d.overflowed[0])
                        h[0].add(k).css("top", 0),
                        y(a, "_resetY");
                    if ("y" !== b.axis && !d.overflowed[1] || "x" === b.axis && d.overflowed[1])
                        b = dx = 0,
                        "rtl" === d.langDir && (b = e.width() - k.outerWidth(!1),
                        dx = Math.abs(b / d.scrollRatio.x)),
                        k.css("left", b),
                        h[1].css("left", dx),
                        y(a, "_resetX")
                }, na = function() {
                    var a = c(this)
                      , d = a.data("mCS")
                      , b = d.opt;
                    if (!d.bindEvents) {
                        pa.call(this);
                        b.contentTouchScroll && qa.call(this);
                        ra.call(this);
                        if (b.mouseWheel.enable) {
                            var e = void 0;
                            (function h() {
                                e = setTimeout(function() {
                                    c.event.special.mousewheel ? (clearTimeout(e),
                                    sa.call(a[0])) : h()
                                }, 100)
                            }
                            )()
                        }
                        ta.call(this);
                        ua.call(this);
                        b.advanced.autoScrollOnFocus && va.call(this);
                        b.scrollButtons.enable && wa.call(this);
                        b.keyboard.enable && xa.call(this);
                        d.bindEvents = !0
                    }
                }, V = function() {
                    var a = c(this)
                      , d = a.data("mCS")
                      , b = d.opt
                      , e = "mCS_" + d.idx
                      , k = ".mCSB_" + d.idx + "_scrollbar"
                      , k = c("#mCSB_" + d.idx + ",#mCSB_" + d.idx + "_container,#mCSB_" + d.idx + "_container_wrapper," + k + " ." + n[12] + ",#mCSB_" + d.idx + "_dragger_vertical,#mCSB_" + d.idx + "_dragger_horizontal," + k + ">a")
                      , h = c("#mCSB_" + d.idx + "_container");
                    b.advanced.releaseDraggableSelectors && k.add(c(b.advanced.releaseDraggableSelectors));
                    b.advanced.extraDraggableSelectors && k.add(c(b.advanced.extraDraggableSelectors));
                    d.bindEvents && (c(document).add(c(!N() || top.document)).unbind("." + e),
                    k.each(function() {
                        c(this).unbind("." + e)
                    }),
                    clearTimeout(a[0]._focusTimeout),
                    F(a[0], "_focusTimeout"),
                    clearTimeout(d.sequential.step),
                    F(d.sequential, "step"),
                    clearTimeout(h[0].onCompleteTimeout),
                    F(h[0], "onCompleteTimeout"),
                    d.bindEvents = !1)
                }, fa = function(a) {
                    var d = c(this)
                      , b = d.data("mCS")
                      , e = b.opt
                      , k = c("#mCSB_" + b.idx + "_container_wrapper")
                      , k = k.length ? k : c("#mCSB_" + b.idx + "_container")
                      , h = [c("#mCSB_" + b.idx + "_scrollbar_vertical"), c("#mCSB_" + b.idx + "_scrollbar_horizontal")]
                      , f = [h[0].find(".mCSB_dragger"), h[1].find(".mCSB_dragger")];
                    "x" !== e.axis && (b.overflowed[0] && !a ? (h[0].add(f[0]).add(h[0].children("a")).css("display", "block"),
                    k.removeClass(n[8] + " " + n[10])) : (e.alwaysShowScrollbar ? (2 !== e.alwaysShowScrollbar && f[0].css("display", "none"),
                    k.removeClass(n[10])) : (h[0].css("display", "none"),
                    k.addClass(n[10])),
                    k.addClass(n[8])));
                    "y" !== e.axis && (b.overflowed[1] && !a ? (h[1].add(f[1]).add(h[1].children("a")).css("display", "block"),
                    k.removeClass(n[9] + " " + n[11])) : (e.alwaysShowScrollbar ? (2 !== e.alwaysShowScrollbar && f[1].css("display", "none"),
                    k.removeClass(n[11])) : (h[1].css("display", "none"),
                    k.addClass(n[11])),
                    k.addClass(n[9])));
                    b.overflowed[0] || b.overflowed[1] ? d.removeClass(n[5]) : d.addClass(n[5])
                }, t = function(a) {
                    var d = a.type
                      , b = a.target.ownerDocument !== document && null !== frameElement ? [c(frameElement).offset().top, c(frameElement).offset().left] : null
                      , e = N() && a.target.ownerDocument !== top.document && null !== frameElement ? [c(a.view.frameElement).offset().top, c(a.view.frameElement).offset().left] : [0, 0];
                    switch (d) {
                    case "pointerdown":
                    case "MSPointerDown":
                    case "pointermove":
                    case "MSPointerMove":
                    case "pointerup":
                    case "MSPointerUp":
                        return b ? [a.originalEvent.pageY - b[0] + e[0], a.originalEvent.pageX - b[1] + e[1], !1] : [a.originalEvent.pageY, a.originalEvent.pageX, !1];
                    case "touchstart":
                    case "touchmove":
                    case "touchend":
                        return d = a.originalEvent.touches[0] || a.originalEvent.changedTouches[0],
                        b = a.originalEvent.touches.length || a.originalEvent.changedTouches.length,
                        a.target.ownerDocument !== document ? [d.screenY, d.screenX, 1 < b] : [d.pageY, d.pageX, 1 < b];
                    default:
                        return b ? [a.pageY - b[0] + e[0], a.pageX - b[1] + e[1], !1] : [a.pageY, a.pageX, !1]
                    }
                }, pa = function() {
                    function a(a, c, l, k) {
                        f[0].idleTimer = 233 > e.scrollInertia ? 250 : 0;
                        if (g.attr("id") === h[1]) {
                            var m = "x";
                            a = (g[0].offsetLeft - c + k) * b.scrollRatio.x
                        } else
                            m = "y",
                            a = (g[0].offsetTop - a + l) * b.scrollRatio.y;
                        y(d, a.toString(), {
                            dir: m,
                            drag: !0
                        })
                    }
                    var d = c(this)
                      , b = d.data("mCS")
                      , e = b.opt
                      , k = "mCS_" + b.idx
                      , h = ["mCSB_" + b.idx + "_dragger_vertical", "mCSB_" + b.idx + "_dragger_horizontal"]
                      , f = c("#mCSB_" + b.idx + "_container")
                      , m = c("#" + h[0] + ",#" + h[1])
                      , g = void 0
                      , l = void 0
                      , p = void 0
                      , B = e.advanced.releaseDraggableSelectors ? m.add(c(e.advanced.releaseDraggableSelectors)) : m
                      , n = e.advanced.extraDraggableSelectors ? c(!N() || top.document).add(c(e.advanced.extraDraggableSelectors)) : c(!N() || top.document);
                    m.bind("contextmenu." + k, function(a) {
                        a.preventDefault()
                    }).bind("mousedown." + k + " touchstart." + k + " pointerdown." + k + " MSPointerDown." + k, function(a) {
                        a.stopImmediatePropagation();
                        a.preventDefault();
                        if (!a.which || 1 === a.which) {
                            E = !0;
                            Q && (document.onselectstart = function() {
                                return !1
                            }
                            );
                            ia.call(f, !1);
                            G(d);
                            g = c(this);
                            var b = g.offset()
                              , k = t(a)[0] - b.top;
                            a = t(a)[1] - b.left;
                            var h = g.height() + b.top
                              , b = g.width() + b.left;
                            k < h && 0 < k && a < b && 0 < a && (l = k,
                            p = a);
                            W(g, "active", e.autoExpandScrollbar)
                        }
                    }).bind("touchmove." + k, function(b) {
                        b.stopImmediatePropagation();
                        b.preventDefault();
                        var c = g.offset()
                          , d = t(b)[0] - c.top;
                        b = t(b)[1] - c.left;
                        a(l, p, d, b)
                    });
                    c(document).add(n).bind("mousemove." + k + " pointermove." + k + " MSPointerMove." + k, function(b) {
                        if (g) {
                            var c = g.offset()
                              , d = t(b)[0] - c.top;
                            b = t(b)[1] - c.left;
                            l === d && p === b || a(l, p, d, b)
                        }
                    }).add(B).bind("mouseup." + k + " touchend." + k + " pointerup." + k + " MSPointerUp." + k, function(a) {
                        g && (W(g, "active", e.autoExpandScrollbar),
                        g = null);
                        E = !1;
                        Q && (document.onselectstart = null);
                        ia.call(f, !0)
                    })
                }, qa = function() {
                    function a(a) {
                        if (!X(a) || E || t(a)[2])
                            L = 0;
                        else {
                            L = 1;
                            F = C = 0;
                            v = 1;
                            f.removeClass("mCS_touch_action");
                            var b = B.offset();
                            M = t(a)[0] - b.top;
                            D = t(a)[1] - b.left;
                            q = [t(a)[0], t(a)[1]]
                        }
                    }
                    function d(a) {
                        if (X(a) && !E && !t(a)[2] && (g.documentTouchScroll || a.preventDefault(),
                        a.stopImmediatePropagation(),
                        (!F || C) && v)) {
                            R = S();
                            var b = p.offset()
                              , c = t(a)[0] - b.top
                              , b = t(a)[1] - b.left;
                            u.push(c);
                            w.push(b);
                            q[2] = Math.abs(t(a)[0] - q[0]);
                            q[3] = Math.abs(t(a)[1] - q[1]);
                            if (m.overflowed[0]) {
                                var d = n[0].parent().height() - n[0].height();
                                d = 0 < M - c && c - M > -(d * m.scrollRatio.y) && (2 * q[3] < q[2] || "yx" === g.axis)
                            }
                            if (m.overflowed[1]) {
                                var e = n[1].parent().width() - n[1].width();
                                e = 0 < D - b && b - D > -(e * m.scrollRatio.x) && (2 * q[2] < q[3] || "yx" === g.axis)
                            }
                            d || e ? (J || a.preventDefault(),
                            C = 1) : (F = 1,
                            f.addClass("mCS_touch_action"));
                            J && a.preventDefault();
                            H = "yx" === g.axis ? [M - c, D - b] : "x" === g.axis ? [null, D - b] : [M - c, null];
                            B[0].idleTimer = 250;
                            m.overflowed[0] && h(H[0], 0, "mcsLinearOut", "y", "all", !0);
                            m.overflowed[1] && h(H[1], 0, "mcsLinearOut", "x", A, !0)
                        }
                    }
                    function b(a) {
                        if (!X(a) || E || t(a)[2])
                            L = 0;
                        else {
                            L = 1;
                            a.stopImmediatePropagation();
                            G(f);
                            r = S();
                            var b = p.offset();
                            ha = t(a)[0] - b.top;
                            z = t(a)[1] - b.left;
                            u = [];
                            w = []
                        }
                    }
                    function e(a) {
                        if (X(a) && !E && !t(a)[2]) {
                            v = 0;
                            a.stopImmediatePropagation();
                            F = C = 0;
                            aa = S();
                            var b = p.offset()
                              , c = t(a)[0] - b.top
                              , b = t(a)[1] - b.left;
                            if (!(30 < aa - R)) {
                                K = 1E3 / (aa - r);
                                var d = (a = 2.5 > K) ? [u[u.length - 2], w[w.length - 2]] : [0, 0];
                                O = a ? [c - d[0], b - d[1]] : [c - ha, b - z];
                                c = [Math.abs(O[0]), Math.abs(O[1])];
                                K = a ? [Math.abs(O[0] / 4), Math.abs(O[1] / 4)] : [K, K];
                                a = [Math.abs(B[0].offsetTop) - O[0] * k(c[0] / K[0], K[0]), Math.abs(B[0].offsetLeft) - O[1] * k(c[1] / K[1], K[1])];
                                H = "yx" === g.axis ? [a[0], a[1]] : "x" === g.axis ? [null, a[1]] : [a[0], null];
                                x = [4 * c[0] + g.scrollInertia, 4 * c[1] + g.scrollInertia];
                                a = parseInt(g.contentTouchScroll) || 0;
                                H[0] = c[0] > a ? H[0] : 0;
                                H[1] = c[1] > a ? H[1] : 0;
                                m.overflowed[0] && h(H[0], x[0], "mcsEaseOut", "y", A, !1);
                                m.overflowed[1] && h(H[1], x[1], "mcsEaseOut", "x", A, !1)
                            }
                        }
                    }
                    function k(a, b) {
                        var c = [1.5 * b, 2 * b, b / 1.5, b / 2];
                        return 90 < a ? 4 < b ? c[0] : c[3] : 60 < a ? 3 < b ? c[3] : c[2] : 30 < a ? 8 < b ? c[1] : 6 < b ? c[0] : 4 < b ? b : c[2] : 8 < b ? b : c[3]
                    }
                    function h(a, b, c, d, e, g) {
                        a && y(f, a.toString(), {
                            dur: b,
                            scrollEasing: c,
                            dir: d,
                            overwrite: e,
                            drag: g
                        })
                    }
                    var f = c(this)
                      , m = f.data("mCS")
                      , g = m.opt
                      , l = "mCS_" + m.idx
                      , p = c("#mCSB_" + m.idx)
                      , B = c("#mCSB_" + m.idx + "_container")
                      , n = [c("#mCSB_" + m.idx + "_dragger_vertical"), c("#mCSB_" + m.idx + "_dragger_horizontal")]
                      , v = void 0
                      , M = void 0
                      , D = void 0
                      , ha = void 0
                      , z = void 0
                      , u = []
                      , w = []
                      , r = void 0
                      , R = void 0
                      , aa = void 0
                      , O = void 0
                      , K = void 0
                      , H = void 0
                      , x = void 0
                      , A = "yx" === g.axis ? "none" : "all"
                      , q = []
                      , C = void 0
                      , F = void 0
                      , I = B.find("iframe")
                      , P = ["touchstart." + l + " pointerdown." + l + " MSPointerDown." + l, "touchmove." + l + " pointermove." + l + " MSPointerMove." + l, "touchend." + l + " pointerup." + l + " MSPointerUp." + l]
                      , J = void 0 !== document.body.style.touchAction && "" !== document.body.style.touchAction;
                    B.bind(P[0], function(b) {
                        a(b)
                    }).bind(P[1], function(a) {
                        d(a)
                    });
                    p.bind(P[0], function(a) {
                        b(a)
                    }).bind(P[2], function(a) {
                        e(a)
                    });
                    I.length && I.each(function() {
                        c(this).bind("load", function() {
                            N(this) && c(this.contentDocument || this.contentWindow.document).bind(P[0], function(c) {
                                a(c);
                                b(c)
                            }).bind(P[1], function(a) {
                                d(a)
                            }).bind(P[2], function(a) {
                                e(a)
                            })
                        })
                    })
                }, ra = function() {
                    function a(a, b, c) {
                        k.type = c && g ? "stepped" : "stepless";
                        k.scrollAmount = 10;
                        ba(d, a, b, "mcsLinearOut", c ? 60 : null)
                    }
                    var d = c(this)
                      , b = d.data("mCS")
                      , e = b.opt
                      , k = b.sequential
                      , h = "mCS_" + b.idx
                      , f = c("#mCSB_" + b.idx + "_container")
                      , m = f.parent()
                      , g = void 0;
                    f.bind("mousedown." + h, function(a) {
                        L || g || (g = 1,
                        E = !0)
                    }).add(document).bind("mousemove." + h, function(c) {
                        if (!L && g && (window.getSelection ? window.getSelection().toString() : document.selection && "Control" != document.selection.type && document.selection.createRange().text)) {
                            var d = f.offset()
                              , l = t(c)[0] - d.top + f[0].offsetTop;
                            c = t(c)[1] - d.left + f[0].offsetLeft;
                            0 < l && l < m.height() && 0 < c && c < m.width() ? k.step && a("off", null, "stepped") : ("x" !== e.axis && b.overflowed[0] && (0 > l ? a("on", 38) : l > m.height() && a("on", 40)),
                            "y" !== e.axis && b.overflowed[1] && (0 > c ? a("on", 37) : c > m.width() && a("on", 39)))
                        }
                    }).bind("mouseup." + h + " dragend." + h, function(b) {
                        L || (g && (g = 0,
                        a("off", null)),
                        E = !1)
                    })
                }, sa = function() {
                    function a(a, l) {
                        G(d);
                        var g = d;
                        var k = a.target;
                        var m = k.nodeName.toLowerCase();
                        g = g.data("mCS").opt.mouseWheel.disableOver;
                        var v = ["select", "textarea"];
                        if (!(-1 < c.inArray(m, g)) || -1 < c.inArray(m, v) && !c(k).is(":focus")) {
                            g = "auto" !== e.mouseWheel.deltaFactor ? parseInt(e.mouseWheel.deltaFactor) : Q && 100 > a.deltaFactor ? 100 : a.deltaFactor || 100;
                            m = e.scrollInertia;
                            if ("x" === e.axis || "x" === e.mouseWheel.axis) {
                                k = "x";
                                g = [Math.round(g * b.scrollRatio.x), parseInt(e.mouseWheel.scrollAmount)];
                                var n = "auto" !== e.mouseWheel.scrollAmount ? g[1] : g[0] >= h.width() ? .9 * h.width() : g[0];
                                var D = Math.abs(c("#mCSB_" + b.idx + "_container")[0].offsetLeft);
                                v = f[1][0].offsetLeft;
                                g = f[1].parent().width() - f[1].width();
                                l = "y" === e.mouseWheel.axis ? a.deltaY || l : a.deltaX
                            } else
                                k = "y",
                                g = [Math.round(g * b.scrollRatio.y), parseInt(e.mouseWheel.scrollAmount)],
                                n = "auto" !== e.mouseWheel.scrollAmount ? g[1] : g[0] >= h.height() ? .9 * h.height() : g[0],
                                D = Math.abs(c("#mCSB_" + b.idx + "_container")[0].offsetTop),
                                v = f[0][0].offsetTop,
                                g = f[0].parent().height() - f[0].height(),
                                l = a.deltaY || l;
                            if (("y" !== k || b.overflowed[0]) && ("x" !== k || b.overflowed[1])) {
                                if (e.mouseWheel.invert || a.webkitDirectionInvertedFromDevice)
                                    l = -l;
                                e.mouseWheel.normalizeDelta && (l = 0 > l ? -1 : 1);
                                if (0 < l && 0 !== v || 0 > l && v !== g || e.mouseWheel.preventDefault)
                                    a.stopImmediatePropagation(),
                                    a.preventDefault();
                                5 > a.deltaFactor && !e.mouseWheel.normalizeDelta && (n = a.deltaFactor,
                                m = 17);
                                y(d, (D - l * n).toString(), {
                                    dir: k,
                                    dur: m
                                })
                            }
                        }
                    }
                    if (c(this).data("mCS")) {
                        var d = c(this)
                          , b = d.data("mCS")
                          , e = b.opt
                          , k = "mCS_" + b.idx
                          , h = c("#mCSB_" + b.idx)
                          , f = [c("#mCSB_" + b.idx + "_dragger_vertical"), c("#mCSB_" + b.idx + "_dragger_horizontal")]
                          , m = c("#mCSB_" + b.idx + "_container").find("iframe");
                        m.length && m.each(function() {
                            c(this).bind("load", function() {
                                N(this) && c(this.contentDocument || this.contentWindow.document).bind("mousewheel." + k, function(b, c) {
                                    a(b, c)
                                })
                            })
                        });
                        h.bind("mousewheel." + k, function(b, c) {
                            a(b, c)
                        })
                    }
                }, ca = {}, N = function(a) {
                    var d = !1
                      , b = null;
                    void 0 === a ? d = "#empty" : void 0 !== c(a).attr("id") && (d = c(a).attr("id"));
                    if (!1 !== d && void 0 !== ca[d])
                        return ca[d];
                    if (a)
                        try {
                            var e = a.contentDocument || a.contentWindow.document;
                            b = e.body.innerHTML
                        } catch (k) {}
                    else
                        try {
                            e = top.document,
                            b = e.body.innerHTML
                        } catch (k) {}
                    a = null !== b;
                    !1 !== d && (ca[d] = a);
                    return a
                }, ia = function(a) {
                    var c = this.find("iframe");
                    c.length && c.css("pointer-events", a ? "auto" : "none")
                }, ta = function() {
                    var a = c(this)
                      , d = a.data("mCS")
                      , b = "mCS_" + d.idx
                      , e = c("#mCSB_" + d.idx + "_container")
                      , k = e.parent()
                      , h = void 0;
                    c(".mCSB_" + d.idx + "_scrollbar ." + n[12]).bind("mousedown." + b + " touchstart." + b + " pointerdown." + b + " MSPointerDown." + b, function(a) {
                        E = !0;
                        c(a.target).hasClass("mCSB_dragger") || (h = 1)
                    }).bind("touchend." + b + " pointerup." + b + " MSPointerUp." + b, function(a) {
                        E = !1
                    }).bind("click." + b, function(b) {
                        if (h && (h = 0,
                        c(b.target).hasClass(n[12]) || c(b.target).hasClass("mCSB_draggerRail"))) {
                            G(a);
                            var f = c(this);
                            var g = f.find(".mCSB_dragger");
                            if (0 < f.parent(".mCSB_scrollTools_horizontal").length) {
                                if (!d.overflowed[1])
                                    return;
                                f = "x";
                                b = b.pageX > g.offset().left ? -1 : 1;
                                b = Math.abs(e[0].offsetLeft) - .9 * b * k.width()
                            } else {
                                if (!d.overflowed[0])
                                    return;
                                f = "y";
                                b = b.pageY > g.offset().top ? -1 : 1;
                                b = Math.abs(e[0].offsetTop) - .9 * b * k.height()
                            }
                            y(a, b.toString(), {
                                dir: f,
                                scrollEasing: "mcsEaseInOut"
                            })
                        }
                    })
                }, va = function() {
                    var a = c(this)
                      , d = a.data("mCS")
                      , b = d.opt
                      , e = "mCS_" + d.idx
                      , k = c("#mCSB_" + d.idx + "_container")
                      , h = k.parent();
                    k.bind("focusin." + e, function(d) {
                        var e = c(document.activeElement);
                        d = k.find(".mCustomScrollBox").length;
                        e.is(b.advanced.autoScrollOnFocus) && (G(a),
                        clearTimeout(a[0]._focusTimeout),
                        a[0]._focusTimer = d ? 17 * d : 0,
                        a[0]._focusTimeout = setTimeout(function() {
                            var c = [x(e)[0], x(e)[1]]
                              , d = [k[0].offsetTop, k[0].offsetLeft]
                              , d = [0 <= d[0] + c[0] && d[0] + c[0] < h.height() - e.outerHeight(!1), 0 <= d[1] + c[1] && d[0] + c[1] < h.width() - e.outerWidth(!1)]
                              , f = "yx" !== b.axis || d[0] || d[1] ? "all" : "none";
                            "x" === b.axis || d[0] || y(a, c[0].toString(), {
                                dir: "y",
                                scrollEasing: "mcsEaseInOut",
                                overwrite: f,
                                dur: 0
                            });
                            "y" === b.axis || d[1] || y(a, c[1].toString(), {
                                dir: "x",
                                scrollEasing: "mcsEaseInOut",
                                overwrite: f,
                                dur: 0
                            })
                        }, a[0]._focusTimer))
                    })
                }, ua = function() {
                    var a = c(this).data("mCS")
                      , d = "mCS_" + a.idx
                      , b = c("#mCSB_" + a.idx + "_container").parent();
                    b.bind("scroll." + d, function(d) {
                        0 === b.scrollTop() && 0 === b.scrollLeft() || c(".mCSB_" + a.idx + "_scrollbar").css("visibility", "hidden")
                    })
                }, wa = function() {
                    var a = c(this)
                      , d = a.data("mCS")
                      , b = d.opt
                      , e = d.sequential
                      , k = "mCS_" + d.idx;
                    c(".mCSB_" + d.idx + "_scrollbar>a").bind("contextmenu." + k, function(a) {
                        a.preventDefault()
                    }).bind("mousedown." + k + " touchstart." + k + " pointerdown." + k + " MSPointerDown." + k + " mouseup." + k + " touchend." + k + " pointerup." + k + " MSPointerUp." + k + " mouseout." + k + " pointerout." + k + " MSPointerOut." + k + " click." + k, function(k) {
                        function f(c, d) {
                            e.scrollAmount = b.scrollButtons.scrollAmount;
                            ba(a, c, d)
                        }
                        k.preventDefault();
                        if (!k.which || 1 === k.which) {
                            var h = c(this).attr("class");
                            e.type = b.scrollButtons.scrollType;
                            switch (k.type) {
                            case "mousedown":
                            case "touchstart":
                            case "pointerdown":
                            case "MSPointerDown":
                                if ("stepped" === e.type)
                                    break;
                                E = !0;
                                d.tweenRunning = !1;
                                f("on", h);
                                break;
                            case "mouseup":
                            case "touchend":
                            case "pointerup":
                            case "MSPointerUp":
                            case "mouseout":
                            case "pointerout":
                            case "MSPointerOut":
                                if ("stepped" === e.type)
                                    break;
                                E = !1;
                                e.dir && f("off", h);
                                break;
                            case "click":
                                "stepped" !== e.type || d.tweenRunning || f("on", h)
                            }
                        }
                    })
                }, xa = function() {
                    function a(a) {
                        function f(a, c) {
                            k.type = e.keyboard.scrollType;
                            k.scrollAmount = e.keyboard.scrollAmount;
                            "stepped" === k.type && b.tweenRunning || ba(d, a, c)
                        }
                        switch (a.type) {
                        case "blur":
                            b.tweenRunning && k.dir && f("off", null);
                            break;
                        case "keydown":
                        case "keyup":
                            var h = a.keyCode ? a.keyCode : a.which;
                            var l = "on";
                            if ("x" !== e.axis && (38 === h || 40 === h) || "y" !== e.axis && (37 === h || 39 === h))
                                (38 !== h && 40 !== h || b.overflowed[0]) && (37 !== h && 39 !== h || b.overflowed[1]) && ("keyup" === a.type && (l = "off"),
                                c(document.activeElement).is("input,textarea,select,datalist,keygen,[contenteditable='true']") || (a.preventDefault(),
                                a.stopImmediatePropagation(),
                                f(l, h)));
                            else if (33 === h || 34 === h) {
                                if (b.overflowed[0] || b.overflowed[1])
                                    a.preventDefault(),
                                    a.stopImmediatePropagation();
                                "keyup" === a.type && (G(d),
                                h = 34 === h ? -1 : 1,
                                "x" === e.axis || "yx" === e.axis && b.overflowed[1] && !b.overflowed[0] ? (a = "x",
                                h = Math.abs(m[0].offsetLeft) - .9 * h * g.width()) : (a = "y",
                                h = Math.abs(m[0].offsetTop) - .9 * h * g.height()),
                                y(d, h.toString(), {
                                    dir: a,
                                    scrollEasing: "mcsEaseInOut"
                                }))
                            } else if ((35 === h || 36 === h) && !c(document.activeElement).is("input,textarea,select,datalist,keygen,[contenteditable='true']")) {
                                if (b.overflowed[0] || b.overflowed[1])
                                    a.preventDefault(),
                                    a.stopImmediatePropagation();
                                "keyup" === a.type && ("x" === e.axis || "yx" === e.axis && b.overflowed[1] && !b.overflowed[0] ? (a = "x",
                                h = 35 === h ? Math.abs(g.width() - m.outerWidth(!1)) : 0) : (a = "y",
                                h = 35 === h ? Math.abs(g.height() - m.outerHeight(!1)) : 0),
                                y(d, h.toString(), {
                                    dir: a,
                                    scrollEasing: "mcsEaseInOut"
                                }))
                            }
                        }
                    }
                    var d = c(this)
                      , b = d.data("mCS")
                      , e = b.opt
                      , k = b.sequential
                      , h = "mCS_" + b.idx
                      , f = c("#mCSB_" + b.idx)
                      , m = c("#mCSB_" + b.idx + "_container")
                      , g = m.parent()
                      , l = m.find("iframe")
                      , p = ["blur." + h + " keydown." + h + " keyup." + h];
                    l.length && l.each(function() {
                        c(this).bind("load", function() {
                            N(this) && c(this.contentDocument || this.contentWindow.document).bind(p[0], function(b) {
                                a(b)
                            })
                        })
                    });
                    f.attr("tabindex", "0").bind(p[0], function(b) {
                        a(b)
                    })
                }, ba = function(a, d, b, e, k) {
                    function h(b) {
                        m.snapAmount && (g.scrollAmount = m.snapAmount instanceof Array ? "x" === g.dir[0] ? m.snapAmount[1] : m.snapAmount[0] : m.snapAmount);
                        var c = "stepped" !== g.type
                          , d = k ? k : b ? c ? u / 1.5 : r : 1E3 / 60
                          , p = b ? c ? 7.5 : 40 : 2.5
                          , n = [Math.abs(l[0].offsetTop), Math.abs(l[0].offsetLeft)]
                          , v = [10 < f.scrollRatio.y ? 10 : f.scrollRatio.y, 10 < f.scrollRatio.x ? 10 : f.scrollRatio.x]
                          , p = "x" === g.dir[0] ? n[1] + g.dir[1] * v[1] * p : n[0] + g.dir[1] * v[0] * p
                          , v = "x" === g.dir[0] ? n[1] + g.dir[1] * parseInt(g.scrollAmount) : n[0] + g.dir[1] * parseInt(g.scrollAmount)
                          , p = "auto" !== g.scrollAmount ? v : p
                          , c = e ? e : b ? c ? "mcsLinearOut" : "mcsEaseInOut" : "mcsLinear";
                        b && 17 > d && (p = "x" === g.dir[0] ? n[1] : n[0]);
                        y(a, p.toString(), {
                            dir: g.dir[0],
                            scrollEasing: c,
                            dur: d,
                            onComplete: b ? !0 : !1
                        });
                        b ? g.dir = !1 : (clearTimeout(g.step),
                        g.step = setTimeout(function() {
                            h()
                        }, d))
                    }
                    var f = a.data("mCS")
                      , m = f.opt
                      , g = f.sequential
                      , l = c("#mCSB_" + f.idx + "_container")
                      , p = "stepped" === g.type ? !0 : !1
                      , u = 26 > m.scrollInertia ? 26 : m.scrollInertia
                      , r = 1 > m.scrollInertia ? 17 : m.scrollInertia;
                    switch (d) {
                    case "on":
                        g.dir = [b === n[16] || b === n[15] || 39 === b || 37 === b ? "x" : "y", b === n[13] || b === n[15] || 38 === b || 37 === b ? -1 : 1];
                        G(a);
                        if (U(b) && "stepped" === g.type)
                            break;
                        h(p);
                        break;
                    case "off":
                        clearTimeout(g.step),
                        F(g, "step"),
                        G(a),
                        (p || f.tweenRunning && g.dir) && h(!0)
                    }
                }, Z = function(a) {
                    var d = c(this).data("mCS").opt
                      , b = [];
                    "function" === typeof a && (a = a());
                    a instanceof Array ? b = 1 < a.length ? [a[0], a[1]] : "x" === d.axis ? [null, a[0]] : [a[0], null] : (b[0] = a.y ? a.y : a.x || "x" === d.axis ? null : a,
                    b[1] = a.x ? a.x : a.y || "y" === d.axis ? null : a);
                    "function" === typeof b[0] && (b[0] = b[0]());
                    "function" === typeof b[1] && (b[1] = b[1]());
                    return b
                }, ga = function(a, d) {
                    if (null != a && "undefined" !== typeof a) {
                        var b = c(this)
                          , e = b.data("mCS")
                          , k = e.opt
                          , e = c("#mCSB_" + e.idx + "_container")
                          , h = e.parent()
                          , f = "undefined" === typeof a ? "undefined" : r(a);
                        d || (d = "x" === k.axis ? "x" : "y");
                        var k = "x" === d ? e.outerWidth(!1) - h.width() : e.outerHeight(!1) - h.height()
                          , m = "x" === d ? e[0].offsetLeft : e[0].offsetTop
                          , g = "x" === d ? "left" : "top";
                        switch (f) {
                        case "function":
                            return a();
                        case "object":
                            a = a.jquery ? a : c(a);
                            if (!a.length)
                                break;
                            return "x" === d ? x(a)[1] : x(a)[0];
                        case "string":
                        case "number":
                            if (U(a))
                                return Math.abs(a);
                            if (-1 !== a.indexOf("%"))
                                return Math.abs(k * parseInt(a) / 100);
                            if (-1 !== a.indexOf("-="))
                                return Math.abs(m - parseInt(a.split("-=")[1]));
                            if (-1 !== a.indexOf("+="))
                                return d = m + parseInt(a.split("+=")[1]),
                                0 <= d ? 0 : Math.abs(d);
                            if (-1 !== a.indexOf("px") && U(a.split("px")[0]))
                                return Math.abs(a.split("px")[0]);
                            if ("top" === a || "left" === a)
                                return 0;
                            if ("bottom" === a)
                                return Math.abs(h.height() - e.outerHeight(!1));
                            if ("right" === a)
                                return Math.abs(h.width() - e.outerWidth(!1));
                            if ("first" === a || "last" === a)
                                return a = e.find(":" + a),
                                "x" === d ? x(a)[1] : x(a)[0];
                            if (c(a).length)
                                return "x" === d ? x(c(a))[1] : x(c(a))[0];
                            e.css(g, a);
                            C.update.call(null, b[0])
                        }
                    }
                }, Y = function(a) {
                    function d() {
                        clearTimeout(g[0].autoUpdate);
                        0 === h.parents("html").length ? h = null : g[0].autoUpdate = setTimeout(function() {
                            if (m.advanced.updateOnSelectorChange && (f.poll.change.n = e(),
                            f.poll.change.n !== f.poll.change.o)) {
                                f.poll.change.o = f.poll.change.n;
                                k(3);
                                return
                            }
                            if (m.advanced.updateOnContentResize && (f.poll.size.n = h[0].scrollHeight + h[0].scrollWidth + g[0].offsetHeight + h[0].offsetHeight + h[0].offsetWidth,
                            f.poll.size.n !== f.poll.size.o)) {
                                f.poll.size.o = f.poll.size.n;
                                k(1);
                                return
                            }
                            if (m.advanced.updateOnImageLoad && ("auto" !== m.advanced.updateOnImageLoad || "y" !== m.axis) && (f.poll.img.n = g.find("img").length,
                            f.poll.img.n !== f.poll.img.o)) {
                                f.poll.img.o = f.poll.img.n;
                                g.find("img").each(function() {
                                    b(this)
                                });
                                return
                            }
                            (m.advanced.updateOnSelectorChange || m.advanced.updateOnContentResize || m.advanced.updateOnImageLoad) && d()
                        }, m.advanced.autoUpdateTimeout)
                    }
                    function b(a) {
                        if (c(a).hasClass(n[2]))
                            k();
                        else {
                            var b = new Image;
                            b.onload = function(a, b) {
                                return function() {
                                    return b.apply(a, arguments)
                                }
                            }(b, function() {
                                this.onload = null;
                                c(a).addClass(n[2]);
                                k(2)
                            });
                            b.src = a.src
                        }
                    }
                    function e() {
                        !0 === m.advanced.updateOnSelectorChange && (m.advanced.updateOnSelectorChange = "*");
                        var a = 0
                          , b = g.find(m.advanced.updateOnSelectorChange);
                        m.advanced.updateOnSelectorChange && 0 < b.length && b.each(function() {
                            a += this.offsetHeight + this.offsetWidth
                        });
                        return a
                    }
                    function k(a) {
                        clearTimeout(g[0].autoUpdate);
                        C.update.call(null, h[0], a)
                    }
                    var h = c(this)
                      , f = h.data("mCS")
                      , m = f.opt
                      , g = c("#mCSB_" + f.idx + "_container");
                    a ? (clearTimeout(g[0].autoUpdate),
                    F(g[0], "autoUpdate")) : d()
                }, G = function(a) {
                    a = a.data("mCS");
                    c("#mCSB_" + a.idx + "_container,#mCSB_" + a.idx + "_container_wrapper,#mCSB_" + a.idx + "_dragger_vertical,#mCSB_" + a.idx + "_dragger_horizontal").each(function() {
                        this._mTween || (this._mTween = {
                            top: {},
                            left: {}
                        });
                        for (var a = ["top", "left"], b = 0; b < a.length; b++) {
                            var c = a[b];
                            this._mTween[c].id && (window.requestAnimationFrame ? window.cancelAnimationFrame(this._mTween[c].id) : clearTimeout(this._mTween[c].id),
                            this._mTween[c].id = null,
                            this._mTween[c].stop = 1)
                        }
                    })
                }, y = function(a, d, b) {
                    function e(a) {
                        return h && f.callbacks[a] && "function" === typeof f.callbacks[a]
                    }
                    function k() {
                        var c = [l[0].offsetTop, l[0].offsetLeft]
                          , d = [v[0].offsetTop, v[0].offsetLeft]
                          , e = [l.outerHeight(!1), l.outerWidth(!1)]
                          , f = [g.height(), g.width()];
                        a[0].mcs = {
                            content: l,
                            top: c[0],
                            left: c[1],
                            draggerTop: d[0],
                            draggerLeft: d[1],
                            topPct: Math.round(100 * Math.abs(c[0]) / (Math.abs(e[0]) - f[0])),
                            leftPct: Math.round(100 * Math.abs(c[1]) / (Math.abs(e[1]) - f[1])),
                            direction: b.dir
                        }
                    }
                    var h = a.data("mCS")
                      , f = h.opt;
                    b = c.extend({
                        trigger: "internal",
                        dir: "y",
                        scrollEasing: "mcsEaseOut",
                        drag: !1,
                        dur: f.scrollInertia,
                        overwrite: "all",
                        callbacks: !0,
                        onStart: !0,
                        onUpdate: !0,
                        onComplete: !0
                    }, b);
                    var m = [b.dur, b.drag ? 0 : b.dur]
                      , g = c("#mCSB_" + h.idx)
                      , l = c("#mCSB_" + h.idx + "_container")
                      , p = l.parent()
                      , n = f.callbacks.onTotalScrollOffset ? Z.call(a, f.callbacks.onTotalScrollOffset) : [0, 0]
                      , u = f.callbacks.onTotalScrollBackOffset ? Z.call(a, f.callbacks.onTotalScrollBackOffset) : [0, 0];
                    h.trigger = b.trigger;
                    if (0 !== p.scrollTop() || 0 !== p.scrollLeft())
                        c(".mCSB_" + h.idx + "_scrollbar").css("visibility", "visible"),
                        p.scrollTop(0).scrollLeft(0);
                    "_resetY" !== d || h.contentReset.y || (e("onOverflowYNone") && f.callbacks.onOverflowYNone.call(a[0]),
                    h.contentReset.y = 1);
                    "_resetX" !== d || h.contentReset.x || (e("onOverflowXNone") && f.callbacks.onOverflowXNone.call(a[0]),
                    h.contentReset.x = 1);
                    if ("_resetY" !== d && "_resetX" !== d) {
                        !h.contentReset.y && a[0].mcs || !h.overflowed[0] || (e("onOverflowY") && f.callbacks.onOverflowY.call(a[0]),
                        h.contentReset.x = null);
                        !h.contentReset.x && a[0].mcs || !h.overflowed[1] || (e("onOverflowX") && f.callbacks.onOverflowX.call(a[0]),
                        h.contentReset.x = null);
                        f.snapAmount && (p = f.snapAmount instanceof Array ? "x" === b.dir ? f.snapAmount[1] : f.snapAmount[0] : f.snapAmount,
                        d = Math.round(d / p) * p - f.snapOffset);
                        switch (b.dir) {
                        case "x":
                            var v = c("#mCSB_" + h.idx + "_dragger_horizontal");
                            var r = "left";
                            var D = l[0].offsetLeft;
                            var t = [g.width() - l.outerWidth(!1), v.parent().width() - v.width()];
                            var z = [d, 0 === d ? 0 : d / h.scrollRatio.x];
                            var q = n[1];
                            var w = u[1];
                            var x = 0 < q ? q / h.scrollRatio.x : 0;
                            var R = 0 < w ? w / h.scrollRatio.x : 0;
                            break;
                        case "y":
                            v = c("#mCSB_" + h.idx + "_dragger_vertical"),
                            r = "top",
                            D = l[0].offsetTop,
                            t = [g.height() - l.outerHeight(!1), v.parent().height() - v.height()],
                            z = [d, 0 === d ? 0 : d / h.scrollRatio.y],
                            q = n[0],
                            w = u[0],
                            x = 0 < q ? q / h.scrollRatio.y : 0,
                            R = 0 < w ? w / h.scrollRatio.y : 0
                        }
                        0 > z[1] || 0 === z[0] && 0 === z[1] ? z = [0, 0] : z[1] >= t[1] ? z = [t[0], t[1]] : z[0] = -z[0];
                        a[0].mcs || (k(),
                        e("onInit") && f.callbacks.onInit.call(a[0]));
                        clearTimeout(l[0].onCompleteTimeout);
                        ja(v[0], r, Math.round(z[1]), m[1], b.scrollEasing);
                        !h.tweenRunning && (0 === D && 0 <= z[0] || D === t[0] && z[0] <= t[0]) || ja(l[0], r, Math.round(z[0]), m[0], b.scrollEasing, b.overwrite, {
                            onStart: function() {
                                b.callbacks && b.onStart && !h.tweenRunning && (e("onScrollStart") && (k(),
                                f.callbacks.onScrollStart.call(a[0])),
                                h.tweenRunning = !0,
                                W(v),
                                h.cbOffsets = [f.callbacks.alwaysTriggerOffsets || D >= t[0] + q, f.callbacks.alwaysTriggerOffsets || D <= -w])
                            },
                            onUpdate: function() {
                                b.callbacks && b.onUpdate && e("whileScrolling") && (k(),
                                f.callbacks.whileScrolling.call(a[0]))
                            },
                            onComplete: function() {
                                b.callbacks && b.onComplete && ("yx" === f.axis && clearTimeout(l[0].onCompleteTimeout),
                                l[0].onCompleteTimeout = setTimeout(function() {
                                    e("onScroll") && (k(),
                                    f.callbacks.onScroll.call(a[0]));
                                    e("onTotalScroll") && z[1] >= t[1] - x && h.cbOffsets[0] && (k(),
                                    f.callbacks.onTotalScroll.call(a[0]));
                                    e("onTotalScrollBack") && z[1] <= R && h.cbOffsets[1] && (k(),
                                    f.callbacks.onTotalScrollBack.call(a[0]));
                                    h.tweenRunning = !1;
                                    l[0].idleTimer = 0;
                                    W(v, "hide")
                                }, l[0].idleTimer || 0))
                            }
                        })
                    }
                }, ja = function(a, c, b, e, k, h, f) {
                    function d() {
                        w.stop || (q || n.call(),
                        q = S() - v,
                        g(),
                        q >= w.time && (w.time = q > w.time ? q + r - (q - w.time) : q + r - 1,
                        w.time < q + 1 && (w.time = q + 1)),
                        w.time < e ? w.id = y(d) : u.call())
                    }
                    function g() {
                        0 < e ? (w.currVal = l(w.time, x, A, e, k),
                        z[c] = Math.round(w.currVal) + "px") : z[c] = b + "px";
                        t.call()
                    }
                    function l(a, b, c, d, e) {
                        switch (e) {
                        case "linear":
                        case "mcsLinear":
                            return c * a / d + b;
                        case "mcsLinearOut":
                            return a /= d,
                            a--,
                            c * Math.sqrt(1 - a * a) + b;
                        case "easeInOutSmooth":
                            a /= d / 2;
                            if (1 > a)
                                return c / 2 * a * a + b;
                            a--;
                            return -c / 2 * (a * (a - 2) - 1) + b;
                        case "easeInOutStrong":
                            a /= d / 2;
                            if (1 > a)
                                return c / 2 * Math.pow(2, 10 * (a - 1)) + b;
                            a--;
                            return c / 2 * (-Math.pow(2, -10 * a) + 2) + b;
                        case "easeInOut":
                        case "mcsEaseInOut":
                            a /= d / 2;
                            if (1 > a)
                                return c / 2 * a * a * a + b;
                            a -= 2;
                            return c / 2 * (a * a * a + 2) + b;
                        case "easeOutSmooth":
                            return a /= d,
                            a--,
                            -c * (a * a * a * a - 1) + b;
                        case "easeOutStrong":
                            return c * (-Math.pow(2, -10 * a / d) + 1) + b;
                        default:
                            return d = (a /= d) * a,
                            e = d * a,
                            b + c * (.499999999999997 * e * d + -2.5 * d * d + 5.5 * e + -6.5 * d + 4 * a)
                        }
                    }
                    a._mTween || (a._mTween = {
                        top: {},
                        left: {}
                    });
                    f = f || {};
                    var n = f.onStart || function() {}
                    , t = f.onUpdate || function() {}
                    , u = f.onComplete || function() {}
                    , v = S(), r, q = 0, x = a.offsetTop, z = a.style, y, w = a._mTween[c];
                    "left" === c && (x = a.offsetLeft);
                    var A = b - x;
                    w.stop = 0;
                    "none" !== h && null != w.id && (window.requestAnimationFrame ? window.cancelAnimationFrame(w.id) : clearTimeout(w.id),
                    w.id = null);
                    (function() {
                        r = 1E3 / 60;
                        w.time = q + r;
                        y = window.requestAnimationFrame ? window.requestAnimationFrame : function(a) {
                            g();
                            return setTimeout(a, .01)
                        }
                        ;
                        w.id = y(d)
                    }
                    )()
                }, S = function() {
                    return window.performance && window.performance.now ? window.performance.now() : window.performance && window.performance.webkitNow ? window.performance.webkitNow() : Date.now ? Date.now() : (new Date).getTime()
                }, F = function(a, c) {
                    try {
                        delete a[c]
                    } catch (b) {
                        a[c] = null
                    }
                }, X = function(a) {
                    a = a.originalEvent.pointerType;
                    return !(a && "touch" !== a && 2 !== a)
                }, U = function(a) {
                    return !isNaN(parseFloat(a)) && isFinite(a)
                }, x = function(a) {
                    var c = a.parents(".mCSB_container");
                    return [a.offset().top - c.offset().top, a.offset().left - c.offset().left]
                }, oa = function() {
                    var a = function() {
                        var a = ["webkit", "moz", "ms", "o"];
                        if ("hidden"in document)
                            return "hidden";
                        for (var b = 0; b < a.length; b++)
                            if (a[b] + "Hidden"in document)
                                return a[b] + "Hidden";
                        return null
                    }();
                    return a ? document[a] : !1
                };
                c.fn.mCustomScrollbar = function(a) {
                    if (C[a])
                        return C[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    if ("object" !== ("undefined" === typeof a ? "undefined" : r(a)) && a)
                        c.error("Method " + a + " does not exist");
                    else
                        return C.init.apply(this, arguments)
                }
                ;
                c.mCustomScrollbar = function(a) {
                    if (C[a])
                        return C[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    if ("object" !== ("undefined" === typeof a ? "undefined" : r(a)) && a)
                        c.error("Method " + a + " does not exist");
                    else
                        return C.init.apply(this, arguments)
                }
                ;
                c.mCustomScrollbar.defaults = u;
                window.mCustomScrollbar = !0;
                c(window).bind("load", function() {
                    c(".mCustomScrollbar").mCustomScrollbar();
                    c.extend(c.expr[":"], {
                        mcsInView: c.expr[":"].mcsInView || function(a) {
                            a = c(a);
                            var d = a.parents(".mCSB_container");
                            if (d.length) {
                                var b = d.parent();
                                d = [d[0].offsetTop, d[0].offsetLeft];
                                return 0 <= d[0] + x(a)[0] && d[0] + x(a)[0] < b.height() - a.outerHeight(!1) && 0 <= d[1] + x(a)[1] && d[1] + x(a)[1] < b.width() - a.outerWidth(!1)
                            }
                        }
                        ,
                        mcsInSight: c.expr[":"].mcsInSight || function(a, d, b) {
                            d = c(a);
                            a = d.parents(".mCSB_container");
                            var e = "exact" === b[3] ? [[1, 0], [1, 0]] : [[.9, .1], [.6, .4]];
                            if (a.length)
                                return b = [d.outerHeight(!1), d.outerWidth(!1)],
                                d = [a[0].offsetTop + x(d)[0], a[0].offsetLeft + x(d)[1]],
                                a = [a.parent()[0].offsetHeight, a.parent()[0].offsetWidth],
                                e = [b[0] < a[0] ? e[0] : e[1], b[1] < a[1] ? e[0] : e[1]],
                                0 > d[0] - a[0] * e[0][0] && 0 <= d[0] + b[0] - a[0] * e[0][1] && 0 > d[1] - a[1] * e[1][0] && 0 <= d[1] + b[1] - a[1] * e[1][1]
                        }
                        ,
                        mcsOverflow: c.expr[":"].mcsOverflow || function(a) {
                            if (a = c(a).data("mCS"))
                                return a.overflowed[0] || a.overflowed[1]
                        }
                    })
                })
            }
            )()
        }
        )(jQuery, window, document)
    }
    ])
});

/* == jquery mousewheel plugin == Version: 3.1.13, License: MIT License (MIT) */
(function(l, a) {
    if ("object" === typeof exports && "object" === typeof module)
        module.exports = a();
    else if ("function" === typeof define && define.amd)
        define([], a);
    else {
        a = a();
        for (var h in a)
            ("object" === typeof exports ? exports : l)[h] = a[h]
    }
}
)("undefined" !== typeof self ? self : this, function() {
    return function(l) {
        function a(b) {
            if (h[b])
                return h[b].exports;
            var f = h[b] = {
                i: b,
                l: !1,
                exports: {}
            };
            l[b].call(f.exports, f, f.exports, a);
            f.l = !0;
            return f.exports
        }
        var h = {};
        a.m = l;
        a.c = h;
        a.d = function(b, f, h) {
            a.o(b, f) || Object.defineProperty(b, f, {
                configurable: !1,
                enumerable: !0,
                get: h
            })
        }
        ;
        a.n = function(b) {
            var f = b && b.__esModule ? function() {
                return b["default"]
            }
            : function() {
                return b
            }
            ;
            a.d(f, "a", f);
            return f
        }
        ;
        a.o = function(b, a) {
            return Object.prototype.hasOwnProperty.call(b, a)
        }
        ;
        a.p = "";
        return a(a.s = 1)
    }([, function(l, a, h) {
        (function(b) {
            function a(c) {
                var d = c || window.event
                  , a = u.call(arguments, 1)
                  , g = 0
                  , e = 0
                  , f = 0
                  , l = 0;
                c = b.event.fix(d);
                c.type = "mousewheel";
                "detail"in d && (e = -1 * d.detail);
                "wheelDelta"in d && (e = d.wheelDelta);
                "wheelDeltaY"in d && (e = d.wheelDeltaY);
                "wheelDeltaX"in d && (g = -1 * d.wheelDeltaX);
                "axis"in d && d.axis === d.HORIZONTAL_AXIS && (g = -1 * e,
                e = 0);
                var m = 0 === e ? g : e;
                "deltaY"in d && (m = e = -1 * d.deltaY);
                "deltaX"in d && (g = d.deltaX,
                0 === e && (m = -1 * g));
                if (0 !== e || 0 !== g) {
                    if (1 === d.deltaMode) {
                        var k = b.data(this, "mousewheel-line-height");
                        m *= k;
                        e *= k;
                        g *= k
                    } else
                        2 === d.deltaMode && (k = b.data(this, "mousewheel-page-height"),
                        m *= k,
                        e *= k,
                        g *= k);
                    k = Math.max(Math.abs(e), Math.abs(g));
                    if (!n || k < n)
                        n = k,
                        p.settings.adjustOldDeltas && "mousewheel" === d.type && 0 === k % 120 && (n /= 40);
                    p.settings.adjustOldDeltas && "mousewheel" === d.type && 0 === k % 120 && (m /= 40,
                    g /= 40,
                    e /= 40);
                    m = Math[1 <= m ? "floor" : "ceil"](m / n);
                    g = Math[1 <= g ? "floor" : "ceil"](g / n);
                    e = Math[1 <= e ? "floor" : "ceil"](e / n);
                    p.settings.normalizeOffset && this.getBoundingClientRect && (d = this.getBoundingClientRect(),
                    f = c.clientX - d.left,
                    l = c.clientY - d.top);
                    c.deltaX = g;
                    c.deltaY = e;
                    c.deltaFactor = n;
                    c.offsetX = f;
                    c.offsetY = l;
                    c.deltaMode = 0;
                    a.unshift(c, m, g, e);
                    r && clearTimeout(r);
                    r = setTimeout(h, 200);
                    return (b.event.dispatch || b.event.handle).apply(this, a)
                }
            }
            function h() {
                n = null
            }
            var l = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"]
              , q = "onwheel"in document || 9 <= document.documentMode ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"]
              , u = Array.prototype.slice
              , r = void 0
              , n = void 0;
            if (b.event.fixHooks)
                for (var t = l.length; t; )
                    b.event.fixHooks[l[--t]] = b.event.mouseHooks;
            var p = b.event.special.mousewheel = {
                version: "3.1.12",
                setup: function() {
                    if (this.addEventListener)
                        for (var c = q.length; c; )
                            this.addEventListener(q[--c], a, !1);
                    else
                        this.onmousewheel = a;
                    b.data(this, "mousewheel-line-height", p.getLineHeight(this));
                    b.data(this, "mousewheel-page-height", p.getPageHeight(this))
                },
                teardown: function() {
                    if (this.removeEventListener)
                        for (var c = q.length; c; )
                            this.removeEventListener(q[--c], a, !1);
                    else
                        this.onmousewheel = null;
                    b.removeData(this, "mousewheel-line-height");
                    b.removeData(this, "mousewheel-page-height")
                },
                getLineHeight: function(c) {
                    c = b(c);
                    var a = c["offsetParent"in b.fn ? "offsetParent" : "parent"]();
                    a.length || (a = b("body"));
                    return parseInt(a.css("fontSize"), 10) || parseInt(c.css("fontSize"), 10) || 16
                },
                getPageHeight: function(a) {
                    return b(a).height()
                },
                settings: {
                    adjustOldDeltas: !0,
                    normalizeOffset: !0
                }
            };
            b.fn.extend({
                mousewheel: function(a) {
                    return a ? this.bind("mousewheel", a) : this.trigger("mousewheel")
                },
                unmousewheel: function(a) {
                    return this.unbind("mousewheel", a)
                }
            })
        }
        )(jQuery)
    }
    ])
});
