!function (a, b, c, d) {
    var e = a[d.k] = {
        w: a, d: b, n: c, a: d, s: {}, f: function () {
            return {
                callback: [], debug: function (a, b) {
                    (e.v.config.debug || b) && (e.w.console && e.w.console.log ? e.w.console.log(a) : e.d.URL = e.d.URL + "#" + a)
                }, listen: function (a, b, c, d) {
                    d ? "undefined" !== typeof a.removeEventListener ? a.removeEventListener(b, c, !1) : "undefined" !== typeof a.detachEvent && a.detachEvent("on" + b, c) : "undefined" !== typeof e.w.addEventListener ? a.addEventListener(b, c, !1) : "undefined" !== typeof e.w.attachEvent && a.attachEvent("on" + b, c)
                }, getEl: function (a) {
                    var b = null;
                    return b = a.target ? 3 === a.target.nodeType ? a.target.parentNode : a.target : a.srcElement
                }, get: function (a, b) {
                    var c = "";
                    return c = "string" === typeof a[b] ? a[b] : a.getAttribute(b)
                }, getData: function (a, b) {
                    return b = e.a.dataAttributePrefix + b, e.f.get(a, b)
                }, set: function (a, b, c) {
                    "string" === typeof a[b] ? a[b] = c : a.setAttribute(b, c)
                }, make: function (a) {
                    var b, c, d = !1;
                    for (b in a) if (a[b].hasOwnProperty) {
                        d = e.d.createElement(b);
                        for (c in a[b]) a[b][c].hasOwnProperty && "string" === typeof a[b][c] && e.f.set(d, c, a[b][c]);
                        break
                    }
                    return d
                }, kill: function (a) {
                    "string" === typeof a && (a = e.d.getElementById(a)), a && a.parentNode && a.parentNode.removeChild(a)
                }, replace: function (a, b) {
                    "object" === typeof a && "object" === typeof b && e.w.setTimeout(function () {
                        a.parentNode.insertBefore(b, a), e.w.setTimeout(function () {
                            e.f.kill(a)
                        }, 1)
                    }, 1)
                }, parse: function (a, b) {
                    var c, d, e, f, g, h, i;
                    if (i = {}, c = a.split("#")[0].split("?"), c[1]) for (d = c[1].split("&"), f = 0, g = d.length; f < g; f += 1) if (e = d[f].split("="), 2 === e.length && b[e[0]]) {
                        try {
                            h = decodeURIComponent(e[1])
                        } catch (j) {
                            h = e[1]
                        }
                        i[e[0]] = h
                    }
                    return i
                }, preventDefault: function (a) {
                    a.preventDefault ? a.preventDefault() : a.returnValue = !1
                }, getVendorPrefix: function () {
                    var a = /^(moz|webkit|ms)(?=[A-Z])/i, b = "";
                    for (var c in e.d.b.style) if (a.test(c)) {
                        b = "-" + c.match(a)[0].toLowerCase() + "-";
                        break
                    }
                    return b
                }, call: function (a, b) {
                    var c, d, f, g, h = "?";
                    c = e.f.callback.length, d = e.a.k + ".f.callback[" + c + "]", e.f.callback[c] = function (h) {
                        h && (h.theCall = a, h.status && "failure" === h.status && (g = h.message || h.status, "string" === typeof e.v.config.error && "function" === typeof e.w[e.v.config.error] && e.w[e.v.config.error](g), f = e.d.getElementById(e.a.k + ".f.callback[" + c + "]"), f && f.src && e.f.log("&type=api_error&code=" + h.code + "&msg=" + g + "&url=" + encodeURIComponent(f.src.split("?")[0])))), "function" === typeof b && b(h, c), e.f.kill(d)
                    }, a.match(/\?/) && (h = "&"), e.d.b.appendChild(e.f.make({
                        SCRIPT: {
                            id: d,
                            type: "text/javascript",
                            charset: "utf-8",
                            src: a + h + "callback=" + d
                        }
                    }))
                }, btoa: function (a) {
                    var b = "data:image/svg+xml;base64,";
                    if (e.w.btoa) b += e.w.btoa(a); else for (var c, d, f = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=", g = 0; a.charAt(0 | g) || (f = "=", g % 1); b += f.charAt(63 & c >> 8 - g % 1 * 8)) d = a.charCodeAt(g += .75), c = c << 8 | d;
                    return b
                }, makeSVG: function (a, b) {
                    var c, d, f;
                    for (f = '<svg xmlns="http://www.w3.org/2000/svg" height="%h%px" width="%w%px" viewBox="%x1% %y1% %x2% %y2%"><g>', f = f.replace(/%h%/, a.h), f = f.replace(/%w%/, a.w), f = f.replace(/%x1%/, a.x1 || "0"), f = f.replace(/%y1%/, a.y1 || "0"), f = f.replace(/%x2%/, a.x2 || a.w), f = f.replace(/%y2%/, a.y2 || a.h), c = 0, d = a.p.length; c < d; c += 1) f = f + '<path d="' + a.p[c].d + '"', f = f + ' fill="#' + (b || a.p[c].f || "#000") + '"', a.p[c].s && (f = f + ' stroke="#' + a.p[c].s + '"', a.p[c].w || (a.p[c].w = "2"), f = f + ' stroke-width="' + a.p[c].w + '"'), f += "></path>";
                    return f += "</g></svg>", e.f.btoa(f)
                }, buildStyleSheet: function () {
                    var a, b, c, f;
                    a = e.f.make({STYLE: {type: "text/css"}}), b = e.v.css, b = b.replace(/\._/g, "." + d.k + "_");
                    var f = {
                        "%widgetBorderRadius%": "5px",
                        "%buttonBorderRadius%": "3px",
                        "%buttonBorderRadiusTall%": "3px",
                        "%native%": e.f.makeSVG(e.a.svg["native"]),
                        "%above%": e.f.makeSVG(e.a.svg.above),
                        "%beside%": e.f.makeSVG(e.a.svg.beside),
                        "%repins%": e.f.makeSVG(e.a.svg.repins),
                        "%done%": e.f.makeSVG(e.a.svg.done),
                        "%menu%": e.f.makeSVG(e.a.svg.menu),
                        "%logo%": e.f.makeSVG(e.a.svg.logo),
                        "%lockup%": e.f.makeSVG(e.a.svg.lockup),
                        "%pinit_en_red%": e.f.makeSVG(e.a.svg.pinit_en),
                        "%pinit_en_white%": e.f.makeSVG(e.a.svg.pinit_en, "fff"),
                        "%pinit_ja_red%": e.f.makeSVG(e.a.svg.pinit_ja),
                        "%pinit_ja_white%": e.f.makeSVG(e.a.svg.pinit_ja, "fff"),
                        "%prefix%": e.f.getVendorPrefix()
                    };
                    e.f.makeSVG(e.a.svg.pinit_en, "fff");
                    for (c in f) f[c].hasOwnProperty && (b = b.replace(new RegExp(c, "g"), f[c]));
                    a.styleSheet ? a.styleSheet.cssText = b : a.appendChild(e.d.createTextNode(b)), e.d.h ? e.d.h.appendChild(a) : e.d.b.appendChild(a)
                }, presentation: function (a, b) {
                    var c, d, f = "", g = b || "";
                    for (c in a) a[c].hasOwnProperty && "string" === typeof a[c] && (f = f + "\n  " + c + ": " + a[c] + ";");
                    g && f && (e.v.css = e.v.css + g + " { " + f + "\n}\n");
                    for (c in a) a[c].hasOwnProperty && "object" === typeof a[c] && (d = g + " " + c, d = d.replace(/ &/g, ""), d = d.replace(/,/g, ", " + g), e.f.presentation(a[c], d));
                    a === e.a.styles && e.w.setTimeout(function () {
                        e.f.buildStyleSheet()
                    }, 1)
                }, log: function (a) {
                    if (!e.v.here.match(/^https?:\/\/(.*?\.|)(pinterest|pinadmin)\.com\//)) {
                        var b = "?guid=" + e.v.guid;
                        e.a.tv && (b = b + "&tv=" + e.a.tv), a && (b += a), e.v.config.tag && (b = b + "&tag=" + e.v.config.tag), b = b + "&via=" + encodeURIComponent(e.v.here), e.f.call(e.a.endpoint.log + b)
                    }
                }, buildQuery: function (a) {
                    var b = "";
                    for (var c in a) a.hasOwnProperty(c) && a[c] && (b && (b += "&"), b = b + c + "=" + encodeURIComponent(a[c]));
                    return b
                }, util: {
                    pinAny: function () {
                        e.f.debug("opening the grid"), e.d.b.appendChild(e.f.make({
                            SCRIPT: {
                                type: "text/javascript",
                                charset: "utf-8",
                                pinMethod: "button",
                                guid: e.v.guid,
                                src: e.a.endpoint.bookmark + "?r=" + 99999999 * Math.random()
                            }
                        }))
                    }, pinOne: function (a) {
                        if (a.href) {
                            var b = e.f.parse(a.href, {url: !0, media: !0, description: !0});
                            b.url && b.url.match(/^http/i) && b.media && b.media.match(/^http/i) ? (b.description || (e.f.log("&type=config_warning&warning_msg=no_description&href=" + encodeURIComponent(e.d.URL)), b.description = e.d.title), e.w.open(a.href, "pin" + (new Date).getTime(), e.a.pop.base.replace("%dim%", e.a.pop.small))) : (e.f.log("&type=config_error&error_msg=invalid_url&href=" + encodeURIComponent(e.d.URL)), e.f.util.pinAny())
                        } else a.media ? (a.url || (e.f.log("&type=config_warning&warning_msg=no_url&href=" + encodeURIComponent(e.d.URL)), a.url = e.d.URL), a.description || (e.f.log("&type=config_warning&warning_msg=no_description&href=" + encodeURIComponent(e.d.URL)), a.description = e.d.title), e.f.log("&type=button_pinit_custom"), a.href = e.v.config.pinterest + "/pin/create/button/?guid=" + e.v.guid + "&url=" + encodeURIComponent(a.url) + "&media=" + encodeURIComponent(a.media) + "&description=" + encodeURIComponent(a.description), e.w.open(a.href, "pin" + (new Date).getTime(), e.a.pop.base.replace("%dim%", e.a.pop.small))) : (e.f.log("&type=config_error&error_msg=no_media&href=" + encodeURIComponent(e.d.URL)), e.f.util.pinAny());
                        a.v && a.v.preventDefault ? a.v.preventDefault() : e.w.event.returnValue = !1
                    }, repinHoverButton: function (a) {
                        e.f.util.repin(a, !0)
                    }, repin: function (a, b) {
                        var c, d;
                        if ("object" === typeof a ? a.href && (d = a.href.split("/")[4]) : d = a, parseInt(d)) {
                            var c = e.v.config.pinterest + e.a.path.repin.replace("%s", d) + "?guid=" + e.v.guid;
                            e.w.open(c, "pin" + (new Date).getTime(), e.a.pop.base.replace("%dim%", e.a.pop.small))
                        } else e.f.debug(e.v.config.util + ".repin requires an integer pinId")
                    }, follow: function (a) {
                        e.w.open(a.href, "pin" + (new Date).getTime(), e.a.pop.base.replace("%dim%", e.a.pop.large))
                    }, play: function (a) {
                        var b = a.el.previousSibling;
                        a.el.className.match("_playing") ? (a.el.className = e.a.k + "_control " + e.a.k + "_paused", b.style.backgroundImage = "url(" + e.f.getData(b, "src") + ")") : (a.el.className = e.a.k + "_control " + e.a.k + "_playing", b.style.backgroundImage = "url(" + e.f.getData(a.el, "src") + ")")
                    }, "native": function (a) {
                        var b = a.el.previousSibling;
                        b.style.display = "block", b.play(), e.f.kill(a.el)
                    }, menu: function (a) {
                        var b = a.el.nextSibling;
                        "block" === b.style.display ? b.style.display = "" : b.style.display = "block"
                    }, log: function (a) {
                        a ? e.f.log("&" + e.f.buildQuery(a)) : e.f.debug(e.v.config.util + ".log requires valid query params")
                    }
                }, buildOne: function (a, b) {
                    if (!b) {
                        var c = {};
                        "A" === a.tagName && a.href ? c.A = {
                            className: e.a.k + "_" + a.className.replace(/ /g, " " + e.a.k + "_"),
                            href: a.href
                        } : c.SPAN = {className: e.a.k + "_" + a.className.replace(/ /g, " " + e.a.k + "_")};
                        var d = e.f.make(c);
                        return e.f.buildOne(a, d), d
                    }
                    if (a && a.length) for (var f = 0; f < a.length; f += 1) e.f.buildOne(a[f], b); else for (var g in a) if ("string" === typeof a[g]) {
                        var h = a[g];
                        "text" === g && (b.innerHTML = b.innerHTML + h), "addClass" === g && (b.className = b.className + " " + e.a.k + "_" + h), e.a.build.setStyle[g] && ("backgroundImage" === g ? (b.style[g] = "url(" + h + ")", e.f.set(b, "data-pin-src", h)) : b.style[g] = h), e.a.build.setData[g] && e.f.set(b, "data-pin-" + g, h)
                    } else {
                        var i = e.f.make({
                            SPAN: {
                                className: e.a.k + "_" + g.replace(/ /g, " " + e.a.k),
                                "data-pin-href": e.f.getData(b, "href"),
                                "data-pin-log": e.f.getData(b, "log")
                            }
                        });
                        if ("embed" === g || "video" === g) if ("embed" === g) {
                            var j = a[g];
                            j.type && "gif" === j.type ? b.appendChild(e.f.make({
                                SPAN: {
                                    className: e.a.k + "_control " + e.a.k + "_paused",
                                    "data-pin-log": "embed_pin_play",
                                    "data-pin-src": j.src
                                }
                            })) : j.src && b.appendChild(e.f.make({
                                IFRAME: {
                                    className: e.a.k + "_iframe",
                                    src: j.src.replace(/autoplay=/i, "nerfAutoPlay=")
                                }
                            }))
                        } else {
                            var k = e.f.make({
                                VIDEO: {
                                    controls: "controls",
                                    width: a.video.width + "",
                                    className: e.a.k + "_video",
                                    "data-pin-log": "embed_pin_video"
                                }
                            });
                            k.appendChild(e.f.make({
                                SOURCE: {
                                    src: a.video.m3u8,
                                    type: "video/m3u8"
                                }
                            })), k.appendChild(e.f.make({
                                SOURCE: {
                                    src: a.video.mp4,
                                    type: "video/mp4"
                                }
                            })), k.style.display = "none", b.appendChild(k), b.appendChild(e.f.make({
                                SPAN: {
                                    className: e.a.k + "_native",
                                    "data-pin-log": "embed_pin_native"
                                }
                            }))
                        } else b.appendChild(i), e.f.buildOne(a[g], i)
                    }
                }, click: function (a) {
                    a = a || e.w.event;
                    var b, c, d, f;
                    b = e.f.getEl(a), b && (c = e.f.getData(b, "log"), !c && b.parentNode && (b = b.parentNode, c = e.f.getData(b, "log")), c && (d = e.f.getData(b, "x") || "", f = e.f.getData(b, "href"), d && (d = "&x=" + encodeURIComponent(d)), e.f.log("&type=" + c + d + "&href=" + encodeURIComponent(f)), "function" === typeof e.f.util[e.a.util[c]] ? e.f.util[e.a.util[c]]({
                        el: b,
                        href: f,
                        v: a
                    }) : f && e.w.open(f, "_blank")))
                }, getSelection: function () {
                    return ("" + (e.w.getSelection ? e.w.getSelection() : e.d.getSelection ? e.d.getSelection() : e.d.selection.createRange().text)).replace(/(^\s+|\s+$)/g, "")
                }, getStyle: function (a, b, c) {
                    var d = null;
                    return e.w.getComputedStyle ? d = e.w.getComputedStyle(a).getPropertyValue(b) : a.currentStyle && (d = a.currentStyle[b]), d && c && (d = parseInt(d) || 0), d
                }, getPos: function (a) {
                    var b, c, d, f, g, h = 0, i = 0;
                    if (a.offsetParent) {
                        do h += a.offsetLeft, i += a.offsetTop; while (a = a.offsetParent);
                        if (!e.v.hazIE) {
                            var b = e.d.getElementsByTagName("HTML")[0], c = e.f.getStyle(b, "margin-top", !0) || 0,
                                d = e.f.getStyle(b, "padding-top", !0) || 0,
                                f = e.f.getStyle(b, "margin-left", !0) || 0,
                                g = e.f.getStyle(b, "padding-left", !0) || 0;
                            h += f + g, i += c + d
                        }
                        return {left: h, top: i}
                    }
                }, showHoverButton: function (a) {
                    e.f.kill(e.s.hoverButton);
                    var b = {
                        id: e.f.getData(a, "id"),
                        url: e.f.getData(a, "url"),
                        media: e.f.getData(a, "media"),
                        description: e.f.getData(a, "description"),
                        height: e.f.getData(a, "height") || e.v.config.height || "20",
                        color: e.f.getData(a, "color") || e.v.config.color || "gray",
                        shape: e.f.getData(a, "shape") || e.v.config.shape || "rect",
                        lang: e.f.getData(a, "lang") || e.v.config.lang,
                        tall: e.f.getData(a, "tall") || e.v.config.tall,
                        round: e.f.getData(a, "round") || e.v.config.round
                    };
                    if ("28" === b.height && (b.tall = !0), "round" === b.shape && (b.round = !0), a.height > e.a.hoverButtonMinImgSize && a.width > e.a.hoverButtonMinImgSize) {
                        var c = e.a.k + "_button_pin";
                        c = b.round ? c + " " + e.a.k + "_round" : c + " " + e.a.k + "_save", b.tall && (c = c + " " + e.a.k + "_tall");
                        var d, f, g = e.f.getPos(a);
                        b.id ? (d = e.v.config.pinterest + e.a.path.repin.replace(/%s/, b.id), f = "button_pinit_floating_repin") : (d = e.v.config.pinterest + e.a.path.create + "guid=" + e.v.guid, d = d + "&url=" + encodeURIComponent(b.url || e.d.URL), d = d + "&media=" + encodeURIComponent(b.media || a.src), d = d + "&description=" + encodeURIComponent(e.f.getSelection() || b.description || a.title || a.alt || e.d.title), f = "button_pinit_floating"), e.s.hoverButton = e.f.make({
                            SPAN: {
                                className: c,
                                "data-pin-log": f,
                                "data-pin-href": d
                            }
                        }), b.round || (e.s.hoverButton.innerHTML = e.a.strings[b.lang].save), b.id && e.f.set(e.s.hoverButton, "data-pin-id", b.id), e.s.hoverButton.style.position = "absolute", e.s.hoverButton.style.top = g.top + e.a.hoverButtonOffsetTop + "px", e.s.hoverButton.style.left = g.left + e.a.hoverButtonOffsetLeft + "px", e.s.hoverButton.style.zIndex = "8675309", e.d.b.appendChild(e.s.hoverButton)
                    }
                }, over: function (a) {
                    var b, c, d;
                    b = a || e.w.event, c = e.f.getEl(b), c && (d = e.f.getData(c, "media") || c.src, "IMG" !== c.tagName || !d || d.match(/^data/) || d.match(/\.webp/) || e.f.getData(c, "no-hover") || e.f.get(c, "nopin") || e.f.getData(c, "nopin") ? e.v.hazHoverButton && c !== e.s.hoverButton && (e.v.hazHoverButton = !1, e.f.kill(e.s.hoverButton)) : (e.v.hazHoverButton || (e.v.hazHoverButton = !0), e.f.showHoverButton(c)))
                }, formatCount: function (a) {
                    return a ? a > 999 && (a = a < 1e6 ? parseInt(a / 1e3, 10) + "K+" : a < 1e9 ? parseInt(a / 1e6, 10) + "M+" : "++") : a = "0", a += ""
                }, structure: {
                    buttonPin: function (a, b) {
                        var c, d;
                        return c = {
                            className: "button_pin",
                            log: b.log
                        }, b.id && (c.id = b.id), "button_pinit" === b.log && (c.tagName = "A", c.href = e.v.config.pinterest + "/pin/create/button/?guid=" + e.v.guid + "-" + e.v.countButton + "&url=" + encodeURIComponent(b.url) + "&media=" + encodeURIComponent(b.media) + "&description=" + encodeURIComponent(b.description)), "button_pinit_bookmarklet" === b.log && (c.href = e.v.config.pinterest + "/pin/create/button/"), "button_pinit_repin" === b.log ? c.href = e.v.config.pinterest + "/pin/" + b.id + "/repin/x/?guid=" + e.v.guid : b.count && (a.count || "above" === b.count || "beside" === b.count && b.zero) && (d = e.f.formatCount(a.count), c.className = c.className + " " + b.count, c.x = d, c.count = {
                            text: d,
                            x: d
                        }), b.round ? c.className = c.className + " round" : "false" !== b.save ? (c.className = c.className + " save", c.text = e.a.strings[b.lang].save || e.a.strings[e.v.config.lang].save) : ("ja" === b.lang && (c.className = c.className + " ja"), "red" === b.color && (c.className = c.className + " red"), "white" === b.color && (c.className = c.className + " white")), b.padded && (c.className = c.className + " padded"), b.tall && (c.className = c.className + " tall"), e.f.buildOne(c)
                    }, buttonFollow: function (a, b) {
                        var c = {className: "button_follow", log: "button_follow", text: a.name};
                        return b.tall && (c.className = c.className + " tall"), a.id.match(/\//) ? c.href = e.v.config.pinterest + "/" + a.id + "/follow/?guid=" + e.v.guid : c.href = e.v.config.pinterest + "/" + a.id + "/pins/follow/?guid=" + e.v.guid, e.v.countFollow = e.v.countFollow + 1, e.f.buildOne(c)
                    }, embedGrid: function (a, b) {
                        var c, d, f, g, h, i, j, k, l, m, n, o, p, q, r, s;
                        if (a.data) {
                            for (c = a.data, (!b.columns || b.columns < 1 || b.columns > 10) && (b.columns = 5), b.height < 200 && (b.height = 340), s = e.v.config.pinterest + "/" + c.user.profile_url.split("pinterest.com/")[1], d = {
                                className: "embed_grid c" + b.columns,
                                log: "embed_grid",
                                href: e.v.config.pinterest,
                                hd: {
                                    href: s,
                                    img: {backgroundImage: c.user.image_small_url.replace(/_30.jpg/, "_60.jpg")},
                                    pinner: {text: c.user.full_name}
                                },
                                bd: {height: b.height - 110 + "px", ct: []},
                                ft: {log: "embed_user_ft", href: s + "pins/follow/?guid=" + e.v.guid, button: {}}
                            }, b.noscroll && (d.className = d.className + " noscroll"), b.width && (d.width = b.width + "px"), f = [], g = 0; g < b.columns; g += 1) d.bd.ct.push({col: []}), f[g] = 0;
                            for (g = 0; g < c.pins.length; g += 1) {
                                for (h = c.pins[g], i = f[0], j = 0, k = 0; k < b.columns; k += 1) f[k] < i && (j = k, i = f[k]);
                                d.bd.ct[j].col.push({
                                    img: {
                                        href: e.v.config.pinterest + "/pin/" + h.id,
                                        backgroundImage: h.images["237x"].url,
                                        backgroundColor: h.dominant_color,
                                        paddingBottom: h.images["237x"].height / h.images["237x"].width * 100 + "%"
                                    }
                                }), f[j] = f[j] + h.images["237x"].height
                            }
                            return c.board ? (d.className = d.className + " board", n = e.v.config.pinterest + c.board.url, d.hd.board = {
                                text: c.board.name,
                                href: n
                            }, a.data.section ? (d.hd.board = {
                                text: a.data.section.title,
                                href: n + a.theCall.split("/pins/")[0].split("/").pop() + "/"
                            }, l = d.hd.board.href + "follow/?guid=" + e.v.guid, m = "embed_section_ft", e.v.countSection = e.v.countSection + 1) : (l = n + "follow/?guid=" + e.v.guid, m = "embed_board_ft", d.ft.href = l, e.v.countBoard = e.v.countBoard + 1)) : (l = s + "pins/follow?guid=" + e.v.guid, m = "embed_user_ft", e.v.countProfile = e.v.countProfile + 1), o = e.a.strings[b.lang].followOn, p = o.split("%s"), q = "bottom", r = '<span class="' + e.a.k + '_string" data-pin-href="' + l + '" data-pin-log="' + m + '">' + p[0] + '</span><span class="' + e.a.k + '_logo" data-pin-href="' + l + '" data-pin-log="' + m + '"></span>', "" === p[0] && (q = "top", r = '<span class="' + e.a.k + '_logo" data-pin-href="' + l + '" data-pin-log="' + m + '"></span><span class="' + e.a.k + '_string" data-pin-href="' + l + '" data-pin-log="' + m + '">' + p[1] + "</span>"), d.ft.button.label = {
                                addClass: q,
                                text: r
                            }, e.f.buildOne(d)
                        }
                    }, embedPin: function (a, b) {
                        var c, d, f, g, h, i, j, k;
                        return a.data && a.data[0] ? (c = a.data[0], c.error ? (e.f.log("&type=api_error&code=embed_pin_not_found&pin_id=" + c.id), !1) : (c.rich_metadata || (c.rich_metadata = {}), f = "", g = "", h = "", i = {
                            url: c.images["237x"].url,
                            height: c.images["237x"].height,
                            width: c.images["237x"].width
                        }, !b.width || "medium" !== b.width && "large" !== b.width || (g = " " + b.width, h = "_" + b.width, "medium" === b.width && (i.url = i.url.replace(/237x/, "345x"), i.width = 345, i.height = ~~(1.456 * i.height), e.v.countPinMedium = e.v.countPinMedium + 1), "large" === b.width && (i.url = i.url.replace(/237x/, "600x"), i.width = 600, i.height = ~~(2.532 * i.height), e.v.countPinLarge = e.v.countPinLarge + 1)), b.lang && (f = " " + b.lang), d = {
                            className: "embed_pin" + g + f,
                            log: "embed_pin" + h,
                            href: e.v.config.pinterest + "/pin/" + c.id + "/",
                            id: c.id,
                            bd: {
                                hd: {
                                    container: {
                                        paddingBottom: ~~(i.height / i.width * 1e4) / 100 + "%",
                                        img: {backgroundImage: i.url, log: "embed_pin_img" + h}
                                    }, repin: {log: "embed_pin_repin" + h, id: c.id}
                                },
                                source: {
                                    log: "embed_pin_domain",
                                    href: c.rich_metadata.url || e.v.config.pinterest + "/pin/" + c.id + "/",
                                    img: {backgroundImage: c.rich_metadata.favicon_link || ""},
                                    domain: {text: c.rich_metadata.site_name || e.a.strings[b.lang].from.replace(/%s/, c.domain)},
                                    menu: {
                                        toggle: {href: "", log: "embed_pin_toggle"},
                                        dropdown: {
                                            text: e.a.strings[b.lang].report,
                                            log: "embed_pin_report",
                                            href: e.v.config.pinterest + e.a.path.report + "?id=" + c.id
                                        }
                                    }
                                }
                            },
                            ft: {
                                href: c.pinner.profile_url.replace(/https?:\/\/www\.pinterest\.com\//, e.v.config.pinterest + "/"),
                                log: "embed_pin_pinner" + h,
                                img: {backgroundImage: c.pinner.image_small_url.replace(/_30.jpg/, "_60.jpg")},
                                pinner: {text: c.pinner.full_name},
                                board: {
                                    href: e.v.config.pinterest + c.board.url,
                                    log: "embed_pin_board" + h,
                                    text: c.board.name
                                }
                            }
                        }, d.bd.hd.repin.addClass = "save", d.bd.hd.repin.text = e.a.strings[b.lang].save, b.terse || (d.bd.description = {text: c.description}), c.rich_metadata.favicon_link || (d.bd.source.addClass = "nofav"), c.attribution && c.attribution.author_name && c.attribution.author_url && (d.bd.attribution = {
                            href: c.attribution.author_url,
                            log: "embed_pin_attrib",
                            img: {backgroundImage: c.attribution.provider_icon_url},
                            by: {text: e.a.strings[b.lang].by.replace(/%s/, c.attribution.author_name)}
                        }), c.embed && c.embed.src && (d.bd.hd.container.embed = c.embed), c.videos && c.videos.video_list && c.videos.video_list.V_HLSV4 && c.videos.video_list.V_720P && (d.bd.hd.container.video = {
                            width: i.width,
                            height: i.height,
                            m3u8: c.videos.video_list.V_HLSV4.url,
                            mp4: c.videos.video_list.V_720P.url
                        }), c.repin_count && (j = c.repin_count), c.aggregated_pin_data && c.aggregated_pin_data.aggregated_stats && (c.aggregated_pin_data.aggregated_stats.saves && (j = c.aggregated_pin_data.aggregated_stats.saves), c.aggregated_pin_data.aggregated_stats.done && (k = c.aggregated_pin_data.aggregated_stats.done)), (j || k) && (d.bd.stats = {}, j && (d.bd.stats.repins = {
                            text: e.f.formatCount(j),
                            x: "count_save",
                            href: e.v.config.pinterest + "/pin/" + c.id + "/repins/"
                        }), k && (d.bd.stats.done = {
                            text: e.f.formatCount(k),
                            x: "count_done",
                            href: e.v.config.pinterest + "/pin/" + c.id + "/activity/tried/"
                        })), e.v.countPin = e.v.countPin + 1, e.f.buildOne(d))) : void 0
                    }
                }, getLegacy: {
                    grid: function (a, b) {
                        var c = parseInt(e.f.getData(a, "scale-height")), d = parseInt(e.f.getData(a, "scale-width")),
                            f = parseInt(e.f.getData(a, "board-width"));
                        f > a.parentNode.offsetWidth && (f = ""), c && (b.height = c + 110), d && f && d > 59 && d < 238 && (b.columns = Math.floor(f / d), b.width = f + 20)
                    }, buttonPin: function (a, b) {
                        var c = {
                            zero: e.f.getData(a, "zero") || e.v.config.zero,
                            pad: e.f.getData(a, "count-pad"),
                            height: e.f.getData(a, "height"),
                            shape: e.f.getData(a, "shape"),
                            config: e.f.getData(a, "config"),
                            countLayout: e.f.get(a, "count-layout")
                        };
                        c.zero && (b.zero = !0), b.count ? (b.padded = !0, b.zero = !0) : (c.pad && (b.padded = !0), "beside" === c.config || "horizontal" === c.countLayout ? b.count = "beside" : ("above" === c.config || "vertical" === c.countLayout) && (b.count = "above")), "round" === c.shape && (b.round = !0), ("28" === c.height || "32" === c.height) && (b.tall = !0)
                    }
                }, seek: {
                    buttonPin: function (a) {
                        var b, c, d, f;
                        if (e.a.noneParam[e.f.getData(a, "do")] === !0) return void e.f.debug('Found a link to pin create form with data-pin-do="none"');
                        if (a.href && (b = e.f.parse(a.href, {
                                url: !0,
                                media: !0,
                                description: !0
                            })), f = e.f.getData(a, "custom"), c = {
                                "do": e.f.getData(a, "do"),
                                id: e.f.getData(a, "id"),
                                url: e.f.getData(a, "url") || b.url || e.d.URL,
                                media: e.f.getData(a, "media") || b.media,
                                description: e.f.getData(a, "description") || b.description || e.d.title,
                                custom: f || e.v.config.custom,
                                count: e.f.getData(a, "count") || e.v.config.count,
                                color: e.f.getData(a, "color") || e.v.config.color,
                                round: e.f.getData(a, "round") || e.v.config.round,
                                tall: e.f.getData(a, "tall") || e.v.config.tall,
                                lang: e.f.getData(a, "lang") || e.v.config.lang,
                                save: e.f.getData(a, "save") || e.v.config.save
                            }, e.v.config.custom && (e.v.log.customGlobal = 1), f && (e.v.log.customLocal = 1), "false" === e.v.config.save && (e.v.log.pinit = 1), e.f.checkLang(c), c.media ? c.log = "button_pinit" : c.id ? c.log = "button_pinit_repin" : c.log = "button_pinit_bookmarklet", e.v.countButton = e.v.countButton + 1, c.custom) return a.removeAttribute("href"), e.f.set(a, "data-pin-log", "button_pinit"), e.f.set(a, "data-pin-href", e.v.config.pinterest + "/pin/create/button?guid=" + e.v.guid + "-" + e.v.countButton + "&url=" + encodeURIComponent(c.url) + "&media=" + encodeURIComponent(c.media) + "&description=" + encodeURIComponent(c.description)), e.f.debug('Found a link with data-pin-custom="true"'), void e.f.debug(a);
                        if (e.f.getLegacy.buttonPin(a, c), d = !1, ("above" === c.count || "beside" === c.count) && (d = !0, c.url && e.f.call(e.a.endpoint.count.replace(/%s/, encodeURIComponent(c.url)), function (b) {
                                e.f.replace(a, e.f.structure.buttonPin(b, c))
                            })), !d) {
                            var g = e.f.structure.buttonPin(a, c);
                            e.f.replace(a, g)
                        }
                    }, buttonBookmark: function (a) {
                        return e.f.getData(a, "custom") ? (e.f.set(a, "data-pin-log", "button_pinit_bookmarklet"), e.f.set(a, "data-pin-href", e.v.config.pinterest + "/pin/create/button/"), void a.removeAttribute("href")) : void e.f.seek.buttonPin(a)
                    }, buttonFollow: function (a) {
                        var b, c, d, f;
                        if (d = {}, c = {
                                custom: e.f.getData(a, "custom"),
                                tall: e.f.getData(a, "tall"),
                                lang: e.f.getData(a, "lang") || e.v.config.lang
                            }, e.f.checkLang(c), b = e.f.getPath(a.href), b.length) {
                            if (d.name = a.textContent, d.id = b[0], b[0] && b[1] && (d.id = b[0] + "/" + b[1]), c.custom) return f = d.id.match(/\//) ? e.v.config.pinterest + "/" + d.id + "/follow/?guid=" + e.v.guid : e.v.config.pinterest + "/" + d.id + "/pins/follow/?guid=" + e.v.guid, e.f.set(a, "data-pin-href", f), e.f.set(a, "data-pin-log", "button_follow"), e.w.setTimeout(function () {
                                a.removeAttribute("href")
                            }, 1), void e.f.debug('Found a link with data-pin-custom="true"');
                            e.f.replace(a, e.f.structure.buttonFollow(d, c))
                        }
                    }, embedBoard: function (a, b, c) {
                        var d, f, g, h, i;
                        f = e.f.getPath(b), "" === f[f.length - 1] && f.pop(), c && f.pop(), f.length > 1 && (h = {
                            columns: e.f.getData(a, "columns") || e.v.config.grid.columns,
                            height: e.f.getData(a, "height") - 0 || e.v.config.grid.height,
                            width: e.f.getData(a, "width") || null,
                            noscroll: e.f.getData(a, "noscroll") || null,
                            lang: e.f.getData(a, "lang") || e.v.config.lang
                        }, 2 === f.length && (g = f[0] + "/" + f[1], d = "board"), 3 === f.length && (g = f[0] + "/" + f[1] + "/" + f[2], d = "section"), c && (d = "board"), e.f.checkLang(h), e.f.getLegacy.grid(a, h), i = "", "https:" === e.w.location.protocol && (i = "&base_scheme=https"), e.f.call(e.a.endpoint[d].replace(/%s/, g) + "?sub=" + e.v.domain + i, function (c) {
                            "success" === c.status && ("board" === d && e.f.replace(a, e.f.structure.embedGrid(c, h)), "section" === d && (c.data.pins.length ? e.f.replace(a, e.f.structure.embedGrid(c, h)) : e.f.seek.embedBoard(a, b, !0))), "failure" === c.status && "section" === d && e.f.seek.embedBoard(a, b, !0)
                        }))
                    }, embedUser: function (a, b) {
                        var c, d, f;
                        c = e.f.getPath(b), c.length && (d = {
                            columns: e.f.getData(a, "columns") || e.v.config.grid.columns,
                            height: e.f.getData(a, "height") - 0 || e.v.config.grid.height,
                            width: e.f.getData(a, "width") || null,
                            noscroll: e.f.getData(a, "noscroll") || null,
                            lang: e.f.getData(a, "lang") || e.v.config.lang
                        }, e.f.checkLang(d), e.f.getLegacy.grid(a, d), f = "", "https:" === e.w.location.protocol && (f = "&base_scheme=https"), e.f.call(e.a.endpoint.user.replace(/%s/, c[0]) + "?sub=" + e.v.domain + f, function (b) {
                            e.f.replace(a, e.f.structure.embedGrid(b, d))
                        }))
                    }, embedPin: function (a) {
                        var b, c, d;
                        b = e.f.getPath(a.href), b.length && (c = {
                            width: e.f.getData(a, "width") || null,
                            terse: e.f.getData(a, "terse") || null,
                            lang: e.f.getData(a, "lang") || e.v.config.lang
                        }, d = "", "https:" === e.w.location.protocol && (d = "&base_scheme=https"), e.f.call(e.a.endpoint.pin.replace(/%s/, b[1]) + "&sub=" + e.v.domain + d, function (b) {
                            e.f.replace(a, e.f.structure.embedPin(b, c))
                        }))
                    }
                }, getPath: function (a) {
                    var b = a.split("#")[0].split("?")[0].split("/");
                    return b.length > 2 ? (b.shift(), b.shift(), b.shift()) : b = [], b
                }, build: function (a) {
                    var b, c, d, f, g, h;
                    for (a || (a = e.d), b = a.getElementsByTagName("A"), c = [], d = 0; d < b.length; d += 1) b[d].href && c.push(b[d]);
                    for (d = 0, f = c.length; d < f; d += 1) if (g = c[d].href, g && g.match(e.a.myDomain)) {
                        if (h = e.f.getData(c[d], "do"), "function" === typeof e.f.seek[h]) {
                            try {
                                g = decodeURIComponent(decodeURIComponent(g))
                            } catch (i) {
                            }
                            e.f.seek[h](c[d], g);
                            continue
                        }
                        if (g.match(/\/pin\/create\/button\//)) {
                            e.f.seek.buttonPin(c[d]);
                            continue
                        }
                        if (e.f.getData(c[d], "custom")) {
                            e.f.seek.buttonPin(c[d]);
                            continue
                        }
                    }
                }, exposeUtil: function () {
                    var a = e.w[e.v.config.util] = e.f.util;
                    e.v.config.build ? (e.f.debug("exposing $.f.build as " + e.v.config.build), a.build = e.w[e.v.config.build]) : (e.f.debug("exposing $.f.build at " + e.v.config.util + ".build"), a.build = e.f.build)
                }, checkLang: function (a) {
                    e.a.strings[a.lang] || (a.lang = e.v.config.lang)
                }, config: function () {
                    var a, b, c, d = e.d.getElementsByTagName("SCRIPT");
                    for (a = d.length - 1; a > -1; a -= 1) if (e.a.me && d[a] && d[a].src && d[a].src.match(e.a.me)) {
                        for (b = 0; b < e.a.configParam.length; b += 1) c = e.f.getData(d[a], e.a.configParam[b]), c && (e.v.config[e.a.configParam[b]] = c);
                        e.f.kill(d[a])
                    }
                    e.v.config.lang ? e.a.strings[e.v.config.lang] || (e.f.debug(e.v.config.lang + " not found in valid languages, changing back to " + e.v.lang), e.v.config.lang = e.v.lang) : e.v.config.lang = e.v.lang, "string" === typeof e.v.config.build && (e.w[e.v.config.build] = function (a) {
                        e.f.build(a)
                    }), e.v.config.tag && (e.v.config.tag = e.v.config.tag.replace(/[^a-zA-Z0-9_]/g, "").substr(0, 32)), e.v.config.pinterest = "https://" + e.v.domain + ".pinterest.com", e.w.setTimeout(function () {
                        var a = "&type=pidget&sub=" + e.v.domain + "&button_count=" + e.v.countButton + "&follow_count=" + e.v.countFollow + "&pin_count=" + e.v.countPin;
                        e.v.canHazHoverButtons && (a += "&button_hover=1"), e.v.countPinMedium && (a = a + "&pin_count_medium=" + e.v.countPinMedium), e.v.countPinLarge && (a = a + "&pin_count_large=" + e.v.countPinLarge), e.v.log.customGlobal && (a += "&custom_global=1"), e.v.log.customLocal && (a += "&custom_local=1"), e.v.log.save && (a += "&save_flag=1"), a = a + "&profile_count=" + e.v.countProfile + "&board_count=" + e.v.countBoard + "&section_count=" + e.v.countSection, a = a + "&lang=" + e.v.config.lang, "number" !== typeof e.w["PIN_" + ~~((new Date).getTime() / 864e5)] && (a += "&xload=1"), e.f.log(a)
                    }, 1e3)
                }, langLocLookup: function () {
                    var a, b, c, d, f, g;
                    if (e.v.lang = "en", e.v.domain = "www", a = e.n.language || e.v.lang, e.f.debug("Looking up language and domain for " + a), a = a.toLowerCase(), a = a.replace(/[^a-z0-9]/g, " "), a = a.replace(/^\s+|\s+$/g, ""), a = a.replace(/\s+/g, " "), a = a.split(" "), a.length > 2) for (b = a.length - 1; b > -1; b -= 1) 2 !== a[b].length && a.splice(b, 1);
                    return a[0] && (c = a[0], e.a.strings[c] && (e.v.lang = c), e.a.save.domain[c] && (e.v.domain = c), a[1] && (d = a[1], d !== c && (f = !1, g = e.a.save.lookup[c], g && (g === !0 ? e.a.save.domain[d] || (e.v.domain = "www") : g.d === d ? e.v.domain = g.d : g.alt && g.alt[d] && ("string" === typeof g.alt[d] ? e.v.domain = g.alt[d] : (g.alt[d].d && (e.v.domain = g.alt[d].d, hazAltDom = !0), g.alt[d].s && (e.v.lang = g.alt[d].s)))), f || e.a.save.domain[d] && (e.v.domain = d)))), e.f.debug("Lang: " + e.v.lang), e.f.debug("Domain: " + e.v.domain), {
                        s: e.v.lang,
                        d: e.v.domain
                    }
                }, init: function () {
                    var a, b, c = "", d = !1;
                    for (e.d.b = e.d.getElementsByTagName("BODY")[0], e.d.h = e.d.getElementsByTagName("HEAD")[0], e.v = {
                        guid: "",
                        css: "",
                        config: {debug: !1, util: "PinUtils", grid: {height: 400, columns: 3}},
                        userAgent: e.w.navigator.userAgent,
                        lang: "en",
                        urls: e.a.urls,
                        here: e.d.URL.split("#")[0],
                        countButton: 0,
                        countFollow: 0,
                        countPin: 0,
                        countPinMedium: 0,
                        countPinLarge: 0,
                        countBoard: 0,
                        countSection: 0,
                        countProfile: 0,
                        log: {customGlobal: 0, customLocal: 0, save: 0}
                    }, e.f.langLocLookup(), a = 0; a < 12; a += 1) e.v.guid = e.v.guid + "0123456789ABCDEFGHJKLMNPQRSTUVWXYZ_abcdefghijkmnopqrstuvwxyz".substr(Math.floor(60 * Math.random()), 1);
                    null !== e.v.userAgent.match(/MSIE/) && (e.v.hazIE = !0, e.v.userAgent.match(/MSIE [5-8]/) && (d = !0, e.f.log("&type=oldie_error&ua=" + encodeURIComponent(e.v.userAgent)))), d || (e.f.config(), e.f.presentation(e.a.styles), e.f.build(), e.f.listen(e.d.b, "click", e.f.click), b = e.v.here.split("/"), b[2] && (c = b[2].split(".").pop()), (e.v.config.hover || e.a.forceHover[c]) && "false" !== e.v.config.hover && (e.v.canHazHoverButtons = !0, e.v.countButton = e.v.countButton + 1, e.d.b.setAttribute("data-pin-hover", !0), e.f.listen(e.d.b, "mouseover", e.f.over)), e.f.exposeUtil())
                }
            }
        }()
    };
    e.f.init()
}(window, document, navigator, {
    k: "PIN_" + (new Date).getTime(),
    tv: "2017100302",
    me: /pinit\.js$/,
    myDomain: /^https?:\/\/(([a-z]{1,3})\.)?pinterest\.([a-z]{0,2}\.)?([a-z]{1,3})/,
    noneParam: {ignore: !0, none: !0, nothing: !0},
    forceHover: {},
    configParam: ["save", "hover", "color", "lang", "custom", "tall", "round", "count", "zero", "terse", "debug", "tag", "build", "error", "util", "height", "shape"],
    hoverButtonMinImgSize: 119,
    hoverButtonOffsetTop: 10,
    hoverButtonOffsetLeft: 10,
    dataAttributePrefix: "data-pin-",
    endpoint: {
        pinterest: "https://www.pinterest.com",
        bookmark: "https://assets.pinterest.com/js/pinmarklet.js",
        count: "https://widgets.pinterest.com/v1/urls/count.json?url=%s",
        pin: "https://widgets.pinterest.com/v3/pidgets/pins/info/?pin_ids=%s",
        board: "https://widgets.pinterest.com/v3/pidgets/boards/%s/pins/",
        section: "https://widgets.pinterest.com/v3/pidgets/sections/%s/pins/",
        user: "https://widgets.pinterest.com/v3/pidgets/users/%s/pins/",
        log: "https://log.pinterest.com/"
    },
    path: {repin: "/pin/%s/repin/x/", report: "/about/copyright/dmca-pin/", create: "/pin/create/button/?"},
    pop: {
        base: "status=no,resizable=yes,scrollbars=yes,personalbar=no,directories=no,location=no,toolbar=no,menubar=no,%dim%,left=0,top=0",
        small: "width=750,height=320",
        large: "width=1040,height=640"
    },
    build: {
        setStyle: {backgroundImage: !0, backgroundColor: !0, height: !0, width: !0, paddingBottom: !0},
        setData: {href: !0, id: !0, log: !0, x: !0}
    },
    util: {
        embed_pin_toggle: "menu",
        embed_pin_play: "play",
        embed_pin_native: "native",
        button_pinit: "pinOne",
        button_pinit_floating: "pinOne",
        button_pinit_bookmarklet: "pinAny",
        button_follow: "follow",
        embed_board_ft: "follow",
        embed_user_ft: "follow",
        embed_section_ft: "follow",
        repin: "repin",
        button_pinit_repin: "repin",
        button_pinit_floating_repin: "repinHoverButton",
        embed_pin_repin: "repin",
        embed_pin_repin_small: "repin",
        embed_pin_repin_medium: "repin",
        embed_pin_repin_large: "repin"
    },
    save: {
        domain: {
            www: !0,
            uk: !0,
            br: !0,
            jp: !0,
            fr: !0,
            es: !0,
            pl: !0,
            de: !0,
            ru: !0,
            it: !0,
            au: !0,
            nl: !0,
            tr: !0,
            id: !0,
            hu: !0,
            pt: !0,
            se: !0,
            cz: !0,
            gr: !0,
            kr: !0,
            ro: !0,
            dk: !0,
            sk: !0,
            fi: !0,
            "in": !0,
            no: !0,
            za: !0,
            nz: !0
        },
        lookup: {
            cs: {d: "cz"},
            da: {d: "dk"},
            de: {alt: {at: "de"}},
            el: {d: "gr", alt: {cy: "gr"}},
            en: {alt: {au: "au", gb: "uk", ie: "uk", "in": "in", nz: "nz", uk: "uk", za: "za"}},
            es: {
                alt: {
                    419: "www",
                    ar: "www",
                    cl: "www",
                    co: "www",
                    la: "www",
                    mx: "www",
                    pe: "www",
                    us: "www",
                    uy: "www",
                    ve: "www",
                    xl: "www"
                }
            },
            fi: !0,
            fr: {alt: {be: "fr", ca: "www"}},
            hi: {d: "in"},
            hu: !0,
            id: !0,
            it: !0,
            ja: {d: "jp"},
            ko: {d: "kr"},
            ms: {d: "www"},
            nl: {alt: {be: "nl"}},
            nb: {d: "no"},
            pl: !0,
            pt: {alt: {br: {d: "br", s: "pt-br"}}},
            ro: !0,
            ru: !0,
            sk: !0,
            sv: {d: "se"},
            tl: {d: "www"},
            th: {d: "www"},
            tr: {alt: {cy: "tr"}},
            uk: !0,
            vi: !0
        }
    },
    strings: {
        cs: {
            followOn: "Sledujte na %s",
            from: "od %s",
            report: "Probl&#233;m s autorsk&#253;mi pr&#225;vy",
            by: "od %s",
            save: "Ulo&#382;it"
        },
        da: {
            followOn: "F&#248;lg p&#229; %s",
            from: "fra %s",
            report: "Problemer med ophavsret",
            by: "af %s",
            save: "Gem"
        },
        de: {followOn: " %s", from: "von %s", report: "Urheberrechtsverletzung", by: "von %s", save: "Merken"},
        el: {
            followOn: "&#913;&#954;&#959;&#955;&#959;&#965;&#952;&#942;&#963;&#964;&#949; &#956;&#945;&#962; &#963;&#964;&#959; %s",
            from: "&#945;&#960;&#972; &#964;&#959; %s",
            report: "&#918;&#942;&#964;&#951;&#956;&#945; &#960;&#957;&#949;&#965;&#956;&#945;&#964;&#953;&#954;&#974;&#957; &#948;&#953;&#954;&#945;&#953;&#969;&#956;&#940;&#964;&#969;&#957;",
            by: "&alpha;&pi;&omicron;&delta;&#943;&delta;&epsilon;&tau;&alpha;&iota; &sigma;&tau;&omicron; %s",
            save: "&Kappa;&rho;&#940;&tau;&alpha; &tau;&omicron;"
        },
        en: {followOn: "Follow On %s", from: "from %s", report: "Copyright issue", by: "by %s", save: "Save"},
        es: {followOn: "Seguir en %s", from: "de %s", report: "Problema de copyright", by: "por %s", save: "Guardar"},
        fi: {
            followOn: "Seuraa %s",
            from: "palvelusta %s",
            report: "Tekij&#228;noikeusloukkaus",
            by: "tekij&#228; %s",
            save: "Tallenna"
        },
        fr: {
            followOn: "Suivre sur %s",
            from: "&#224; partir de %s",
            report: "Probl&#232;me de droits d'auteur",
            by: "par %s",
            save: "Enregistrer"
        },
        hi: {
            followOn: "%s &#2346;&#2375; &#2347;&#2377;&#2354;&#2379; &#2325;&#2352;&#2375;&#2306;",
            from: "%s &#2360;&#2375;",
            report: "&#2325;&#2377;&#2346;&#2368;&#2352;&#2366;&#2311;&#2335; &#2325;&#2366; &#2350;&#2369;&#2342;&#2381;&#2342;&#2366;",
            by: "&#2325;&#2379; &#2358;&#2381;&#2352;&#2375;&#2351; &#2342;&#2375;&#2344;&#2366; %s",
            save: "&#2360;&#2375;&#2357; &#2325;&#2352;&#2375;&#2306;"
        },
        hu: {
            followOn: "K&#246;vesd a %s",
            from: "innen: %s",
            report: "Szerz&#337;i jogi probl&#233;ma",
            by: "Hozz&aacute;rendelve a k&ouml;vetkez&#337;h&ouml;z: %s",
            save: "Ment&eacute;s"
        },
        id: {
            followOn: "Ikuti di Pinterest %s",
            from: "dari %s",
            report: "Masalah hak cipta",
            by: "oleh %s",
            save: "Simpan"
        },
        it: {followOn: "Segui su %s", from: "da %s", report: "Problema di copyright", by: "da %s", save: "Salva"},
        ja: {
            followOn: "%s &#12391;&#12501;&#12457;&#12525;&#12540;",
            from: "&#12500;&#12531;&#12418;&#12392;&#65306; %s",
            report: "&#33879;&#20316;&#27177;&#12395;&#12388;&#12356;&#12390;&#22577;&#21578;&#12377;&#12427;",
            by: "%s",
            save: "&#20445;&#23384;"
        },
        ko: {
            followOn: "%s &#50640;&#49436; &#54036;&#47196;&#50864;",
            from: "%s &#50640;&#49436;",
            report: "&#51200;&#51089;&#44428; &#47928;&#51228;",
            by: "&#51060; &#54592;&#54632; %s",
            save: "&#51200;&#51109;"
        },
        ms: {followOn: "Ikut di %s", from: "dari %s", report: "Isu hak cipta", by: "attribut ke %s", save: "Simpan"},
        nb: {
            followOn: "F&#248;lg p&#229; %s",
            from: "fra %s",
            report: "Opphavsrettslig problem",
            by: "av %s",
            save: "Lagre"
        },
        nl: {
            followOn: "Volgen op %s",
            from: "van %s",
            report: "Probleem met copyright",
            by: "door %s",
            save: "Bewaren"
        },
        pl: {
            followOn: "Obserwuj na %s",
            from: "od %s",
            report: "Problem z prawami autorskimi",
            by: "przez",
            save: "Zapisz"
        },
        pt: {
            followOn: "Seguir no %s",
            from: "de %s",
            report: "Assunto relativo a direitos de autor",
            by: "por %s",
            save: "Guardar"
        },
        "pt-br": {
            followOn: "Siga no %s",
            from: "de %s",
            report: "Problema de direitos autorais",
            by: "por %s",
            save: "Salvar"
        },
        ro: {
            followOn: "Urm&#259;re&#537;te pe %s",
            from: "de la %s",
            report: "Problem&#259; legat&#259; de drepturile de autor",
            by: "de la %s",
            save: "Salveaz&#259;"
        },
        ru: {
            followOn: "&#1055;&#1086;&#1076;&#1087;&#1080;&#1089;&#1072;&#1090;&#1100;&#1089;&#1103; &#1074; %s",
            from: "&#1080;&#1079; %s",
            report: "&#1042;&#1086;&#1087;&#1088;&#1086;&#1089; &#1086;&#1073; &#1072;&#1074;&#1090;&#1086;&#1088;&#1089;&#1082;&#1080;&#1093; &#1087;&#1088;&#1072;&#1074;&#1072;&#1093;",
            by: "&#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1077;&#1084; %s",
            save: "&#1057;&#1086;&#1093;&#1088;&#1072;&#1085;&#1080;&#1090;&#1100;"
        },
        sk: {
            followOn: "Sledujte na %s",
            from: "od %s",
            report: "Probl&#233;m s autorsk&#253;mi pr&#225;vami",
            by: "od %s",
            save: "Ulo&#382;i&#357;"
        },
        sv: {
            followOn: "F&#246;lj p&#229; %s",
            from: "fr&#229;n %s",
            report: "Upphovsr&#228;ttsligt problem",
            by: "av %s",
            save: "Spara"
        },
        tl: {followOn: "Sundan sa %s", from: "galing sa %s", report: "Isyu sa copyright", by: "%s", save: "I-save"},
        th: {
            followOn: "&#3605;&#3636;&#3604;&#3605;&#3634;&#3617;&#3651;&#3609; %s",
            from: "&#3592;&#3634;&#3585; %s",
            report: "&#3611;&#3633;&#3597;&#3627;&#3634;&#3648;&#3619;&#3639;&#3656;&#3629;&#3591;&#3621;&#3636;&#3586;&#3626;&#3636;&#3607;&#3608;&#3636;&#3660;",
            by: "&#3648;&#3586;&#3637;&#3618;&#3609;&#3650;&#3604;&#3618; %s",
            save: "&#3610;&#3633;&#3609;&#3607;&#3638;&#3585;"
        },
        tr: {
            followOn: "%s takip et",
            from: "%s sitesinden",
            report: "Telif hakk&#305; sorunu",
            by: "taraf&#305;ndan %s",
            save: "Kaydet"
        },
        uk: {
            followOn: "&#1055;&#1086;&#1076;&#1087;&#1080;&#1089;&#1072;&#1090;&#1100;&#1089;&#1103; &#1074; %s",
            from: "&#1074;&#1110;&#1076; %s",
            report: "&#1055;&#1088;&#1086;&#1073;&#1083;&#1077;&#1084;&#1072; &#1079;&#1072;&#1093;&#1080;&#1089;&#1090;&#1091; &#1072;&#1074;&#1090;&#1086;&#1088;&#1089;&#1100;&#1082;&#1080;&#1093; &#1087;&#1088;&#1072;&#1074;",
            by: "&#1086;&#1087;&#1080;&#1089; %s",
            save: "&#1047;&#1073;&#1077;&#1088;&#1077;&#1075;&#1090;&#1080;"
        },
        vi: {
            followOn: "Theo d&#245;i tr&#234;n %s",
            from: "t&#7915; %s",
            report: "V&#7845;n &#273;&#7873; v&#7873; b&#7843;n quy&#7873;n",
            by: "&#273;&#432;a v&agrave;o %s",
            save: "L&#432;u"
        }
    },
    svg: {
        "native": {
            w: "63",
            h: "63",
            x1: "0",
            y1: "0",
            x2: "64",
            y2: "64",
            p: [{f: "000", d: "M 32 32 m -32, 0 a 31, 31 0 1, 0 63, 0 a 31, 31 0 1,0 -63, 0 z"}, {
                f: "fff",
                d: "M 25 19 L 48 32  L 25 45 Z"
            }]
        },
        above: {
            w: "114",
            h: "76",
            p: [{
                s: "b5b5b5",
                f: "fff",
                d: "M9 1C4.6 1 1 4.6 1 9v43c0 4.3 3.6 8 8 8h26l18 15h7.5l16-15H105c4.4 0 8-3.7 8-8V9c0-4.4-3.6-8-8-8H9z"
            }]
        },
        beside: {
            w: "126",
            h: "56",
            x1: "2",
            y1: "0",
            x2: "130",
            y2: "60",
            p: [{
                s: "b5b5b5",
                f: "fff",
                d: "M119.6 2c4.5 0 8 3.6 8 8v40c0 4.4-3.5 8-8 8H23.3L1.6 32.4v-4.6L23.3 2h96.3z"
            }]
        },
        logo: {
            w: "30",
            h: "30",
            x1: "-1",
            y1: "-1",
            x2: "31",
            y2: "31",
            p: [{
                f: "fff",
                s: "fff",
                w: "1",
                d: "M29.449,14.662 C29.449,22.722 22.868,29.256 14.75,29.256 C6.632,29.256 0.051,22.722 0.051,14.662 C0.051,6.601 6.632,0.067 14.75,0.067 C22.868,0.067 29.449,6.601 29.449,14.662"
            }, {
                f: "bd081c",
                d: "M14.733,1.686 C7.516,1.686 1.665,7.495 1.665,14.662 C1.665,20.159 5.109,24.854 9.97,26.744 C9.856,25.718 9.753,24.143 10.016,23.022 C10.253,22.01 11.548,16.572 11.548,16.572 C11.548,16.572 11.157,15.795 11.157,14.646 C11.157,12.842 12.211,11.495 13.522,11.495 C14.637,11.495 15.175,12.326 15.175,13.323 C15.175,14.436 14.462,16.1 14.093,17.643 C13.785,18.935 14.745,19.988 16.028,19.988 C18.351,19.988 20.136,17.556 20.136,14.046 C20.136,10.939 17.888,8.767 14.678,8.767 C10.959,8.767 8.777,11.536 8.777,14.398 C8.777,15.513 9.21,16.709 9.749,17.359 C9.856,17.488 9.872,17.6 9.84,17.731 C9.741,18.141 9.52,19.023 9.477,19.203 C9.42,19.44 9.288,19.491 9.04,19.376 C7.408,18.622 6.387,16.252 6.387,14.349 C6.387,10.256 9.383,6.497 15.022,6.497 C19.555,6.497 23.078,9.705 23.078,13.991 C23.078,18.463 20.239,22.062 16.297,22.062 C14.973,22.062 13.728,21.379 13.302,20.572 C13.302,20.572 12.647,23.05 12.488,23.657 C12.193,24.784 11.396,26.196 10.863,27.058 C12.086,27.434 13.386,27.637 14.733,27.637 C21.95,27.637 27.801,21.828 27.801,14.662 C27.801,7.495 21.95,1.686 14.733,1.686"
            }]
        },
        lockup: {
            w: "50",
            h: "12",
            x1: "0",
            y1: "0",
            x2: "50",
            y2: "12",
            p: [{
                f: "bd081c",
                d: "M19.69,9.28 L19.69,4.28 L21.27,4.28 L21.27,9.28 L19.69,9.28 Z M5.97,0.00 C9.27,0.00 11.95,2.69 11.95,6.00 C11.95,9.31 9.27,12.00 5.97,12.00 C5.38,12.00 4.80,11.91 4.26,11.75 C4.26,11.75 4.26,11.75 4.26,11.75 C4.25,11.75 4.24,11.74 4.23,11.74 L4.21,11.73 C4.21,11.73 4.21,11.73 4.21,11.73 C4.45,11.33 4.81,10.68 4.95,10.16 C5.02,9.88 5.32,8.73 5.32,8.73 C5.52,9.11 6.08,9.42 6.69,9.42 C8.49,9.42 9.79,7.76 9.79,5.69 C9.79,3.71 8.18,2.23 6.11,2.23 C3.53,2.23 2.16,3.96 2.16,5.86 C2.16,6.74 2.63,7.83 3.37,8.18 C3.49,8.23 3.55,8.21 3.57,8.10 C3.59,8.02 3.69,7.61 3.74,7.42 C3.75,7.36 3.75,7.31 3.70,7.25 C3.45,6.95 3.25,6.39 3.25,5.88 C3.25,4.55 4.25,3.27 5.95,3.27 C7.42,3.27 8.45,4.28 8.45,5.71 C8.45,7.34 7.63,8.46 6.57,8.46 C5.98,8.46 5.54,7.98 5.68,7.38 C5.85,6.67 6.18,5.90 6.18,5.38 C6.18,4.92 5.93,4.54 5.42,4.54 C4.82,4.54 4.34,5.16 4.34,5.99 C4.34,6.52 4.52,6.88 4.52,6.88 C4.52,6.88 3.93,9.40 3.82,9.87 C3.70,10.38 3.75,11.11 3.80,11.59 L3.80,11.59 C3.79,11.59 3.78,11.58 3.78,11.58 C3.77,11.58 3.76,11.58 3.76,11.57 C3.76,11.57 3.76,11.57 3.76,11.57 C1.56,10.69 0.00,8.53 0.00,6.00 C0.00,2.69 2.67,0.00 5.97,0.00 Z M16.87,2.31 C17.71,2.31 18.34,2.54 18.76,2.95 C19.21,3.37 19.46,3.96 19.46,4.66 C19.46,6.00 18.54,6.95 17.11,6.95 L15.72,6.95 L15.72,9.28 L14.12,9.28 L14.12,2.31 L16.87,2.31 Z M16.94,5.58 C17.56,5.58 17.91,5.21 17.91,4.65 C17.91,4.10 17.55,3.76 16.94,3.76 L15.72,3.76 L15.72,5.58 L16.94,5.58 Z M50.00,5.28 L49.19,5.28 L49.19,7.62 C49.19,8.01 49.40,8.11 49.74,8.11 C49.83,8.11 49.93,8.10 50.00,8.10 L50.00,9.28 C49.84,9.31 49.58,9.33 49.22,9.33 C48.30,9.33 47.64,9.03 47.64,7.96 L47.64,5.28 L47.16,5.28 L47.16,4.28 L47.64,4.28 L47.64,2.70 L49.19,2.70 L49.19,4.28 L50.00,4.28 L50.00,5.28 Z M45.31,6.13 C46.18,6.27 47.21,6.50 47.21,7.77 C47.21,8.87 46.25,9.43 44.95,9.43 C43.55,9.43 42.65,8.81 42.54,7.78 L44.05,7.78 C44.15,8.20 44.46,8.40 44.94,8.40 C45.42,8.40 45.72,8.22 45.72,7.90 C45.72,7.45 45.12,7.40 44.46,7.29 C43.59,7.14 42.67,6.91 42.67,5.74 C42.67,4.68 43.64,4.14 44.82,4.14 C46.22,4.14 46.98,4.75 47.06,5.74 L45.60,5.74 C45.54,5.29 45.24,5.15 44.80,5.15 C44.42,5.15 44.12,5.30 44.12,5.61 C44.12,5.96 44.68,6.01 45.31,6.13 Z M20.48,2.00 C21.00,2.00 21.43,2.42 21.43,2.95 C21.43,3.48 21.00,3.90 20.48,3.90 C19.95,3.90 19.53,3.48 19.53,2.95 C19.53,2.42 19.95,2.00 20.48,2.00 Z M28.48,7.62 C28.48,8.01 28.70,8.11 29.04,8.11 C29.10,8.11 29.18,8.10 29.24,8.10 L29.24,9.29 C29.08,9.31 28.83,9.33 28.52,9.33 C27.60,9.33 26.94,9.03 26.94,7.96 L26.94,5.28 L26.42,5.28 L26.42,4.28 L26.94,4.28 L26.94,2.70 L28.48,2.70 L28.48,4.28 L29.24,4.28 L29.24,5.28 L28.48,5.28 L28.48,7.62 Z M24.69,4.14 C25.77,4.14 26.41,4.92 26.41,6.03 L26.41,9.28 L24.83,9.28 L24.83,6.35 C24.83,5.82 24.57,5.46 24.05,5.46 C23.53,5.46 23.18,5.90 23.18,6.52 L23.18,9.28 L21.60,9.28 L21.60,4.28 L23.12,4.28 L23.12,4.97 L23.15,4.97 C23.52,4.43 24.00,4.14 24.69,4.14 Z M33.42,4.76 C32.99,4.37 32.43,4.14 31.72,4.14 C30.20,4.14 29.16,5.28 29.16,6.77 C29.16,8.28 30.17,9.42 31.81,9.42 C32.44,9.42 32.95,9.26 33.37,8.96 C33.80,8.66 34.10,8.23 34.20,7.78 L32.66,7.78 C32.52,8.10 32.25,8.28 31.83,8.28 C31.18,8.28 30.81,7.86 30.72,7.19 L34.29,7.19 C34.30,6.18 34.01,5.31 33.42,4.76 L33.42,4.76 Z M41.66,4.76 C42.26,5.31 42.55,6.18 42.54,7.19 L38.97,7.19 C39.06,7.86 39.43,8.28 40.08,8.28 C40.50,8.28 40.77,8.10 40.91,7.78 L42.45,7.78 C42.34,8.23 42.05,8.66 41.62,8.96 C41.20,9.26 40.69,9.42 40.06,9.42 C38.42,9.42 37.41,8.28 37.41,6.77 C37.41,5.28 38.45,4.14 39.97,4.14 C40.67,4.14 41.24,4.37 41.66,4.76 Z M30.73,6.24 C30.83,5.65 31.14,5.27 31.75,5.27 C32.26,5.27 32.63,5.65 32.69,6.24 L30.73,6.24 Z M38.98,6.24 L40.94,6.24 C40.88,5.65 40.51,5.27 40.00,5.27 C39.39,5.27 39.08,5.65 38.98,6.24 Z M37.54,4.21 L37.54,5.60 C36.64,5.51 36.07,5.99 36.07,7.03 L36.07,9.28 L34.48,9.28 L34.48,4.28 L36.00,4.28 L36.00,5.06 L36.03,5.06 C36.38,4.47 36.78,4.21 37.39,4.21 C37.45,4.21 37.50,4.21 37.54,4.21 Z"
            }]
        },
        menu: {
            w: "20",
            h: "5",
            p: [{
                f: "b5b5b5",
                d: "M17.5,5 C18.881,5 20,3.881 20,2.5 C20,1.119 18.881,0 17.5,0 C16.119,0 15,1.119 15,2.5 C15,3.881 16.119,5 17.5,5 Z M10,5 C11.38,5 12.5,3.881 12.5,2.5 C12.5,1.119 11.38,0 10,0 C8.62,0 7.5,1.119 7.5,2.5 C7.5,3.881 8.62,5 10,5 M2.5,5 C3.881,5 5,3.881 5,2.5 C5,1.119 3.881,0 2.5,0 C1.12,0 0,1.119 0,2.5 C0,3.881 1.12 5,2.5,5 Z"
            }]
        },
        repins: {
            h: "14",
            w: "14",
            p: [{
                f: "b5b5b5",
                d: "M11.979,6.859 L13.99,5.011 L11.241,5.011 L10.486,0 L9.739,5.011 L7,5.011 L8.986,6.858 L8.986,11.017 C8.505,10.985 8.143,11.012 8.143,11.213 C8.143,11.687 8.503,12.001 8.986,12.001 L11.982,12 C12.465,12 12.888,11.686 12.888,11.213 C12.888,11.011 12.465,10.985 11.982,11.017 L11.979,6.859 Z M4.979,7.142 L6.99,8.99 L4.241,8.99 L3.486,14.001 L2.739,8.99 L0,8.99 L1.986,7.143 L1.986,2.984 C1.505,3.016 1.143,2.989 1.143,2.788 C1.143,2.315 1.503,2 1.986,2 L4.982,2.001 C5.465,2.001 5.888,2.315 5.888,2.789 C5.888,2.99 5.465,3.017 4.982,2.984 L4.979,7.142 Z"
            }]
        },
        done: {h: "12", w: "12", p: [{f: "b5b5b5", d: "M0,6 L2,4 L5,7 L10,1 L12,3 L5,11 Z"}]},
        pinit_en: {
            w: "42",
            h: "18",
            p: [{
                f: "bd081c",
                d: "M16.853,6.345 C17.632,6.345 18.38,5.702 18.51,4.909 C18.664,4.138 18.135,3.494 17.357,3.494 C16.578,3.494 15.83,4.138 15.698,4.909 C15.546,5.702 16.053,6.345 16.853,6.345 Z M7.458,0 C2.5,0 0,3.522 0,6.459 C0,8.237 0.68,9.819 2.137,10.409 C2.376,10.505 2.59,10.412 2.66,10.15 C2.708,9.969 2.822,9.511 2.873,9.32 C2.943,9.061 2.916,8.97 2.723,8.744 C2.302,8.253 2.034,7.617 2.034,6.716 C2.034,4.104 4.007,1.765 7.172,1.765 C9.975,1.765 11.514,3.461 11.514,5.726 C11.514,8.708 10.183,11.18 8.206,11.18 C7.114,11.18 6.297,10.329 6.559,9.233 C6.872,7.922 7.48,6.509 7.48,5.564 C7.48,4.717 7.022,4.011 6.072,4.011 C4.956,4.011 4.06,5.155 4.06,6.687 C4.06,7.663 4.393,8.323 4.393,8.323 C4.393,8.323 3.251,13.117 3.051,13.957 C2.652,15.629 2.991,17.679 3.019,17.886 C3.036,18.009 3.195,18.038 3.267,17.946 C3.37,17.812 4.7,16.187 5.151,14.562 C5.279,14.102 5.885,11.72 5.885,11.72 C6.248,12.406 7.308,13.009 8.435,13.009 C11.79,13.009 14.066,9.979 14.066,5.923 C14.066,2.857 11.444,0 7.458,0 Z M26.896,14.189 C26.348,14.189 26.117,13.915 26.117,13.328 C26.117,12.404 27.035,10.091 27.035,9.041 C27.035,7.638 26.276,6.826 24.72,6.826 C23.739,6.826 22.722,7.453 22.291,8.003 C22.291,8.003 22.422,7.553 22.467,7.38 C22.515,7.196 22.415,6.884 22.173,6.884 L20.651,6.884 C20.328,6.884 20.238,7.055 20.191,7.244 C20.172,7.32 19.624,9.584 19.098,11.632 C18.738,13.034 17.863,14.205 16.928,14.205 C16.447,14.205 16.233,13.906 16.233,13.399 C16.233,12.959 16.519,11.877 16.86,10.534 C17.276,8.898 17.642,7.551 17.681,7.394 C17.732,7.192 17.642,7.017 17.379,7.017 L15.849,7.017 C15.572,7.017 15.473,7.161 15.414,7.361 C15.414,7.361 14.983,8.977 14.527,10.775 C14.196,12.079 13.83,13.409 13.83,14.034 C13.83,15.148 14.336,15.944 15.724,15.944 C16.796,15.944 17.644,15.45 18.292,14.764 C18.197,15.135 18.136,15.414 18.13,15.439 C18.074,15.65 18.142,15.838 18.394,15.838 L19.961,15.838 C20.233,15.838 20.337,15.73 20.394,15.494 C20.449,15.269 21.619,10.667 21.619,10.667 C21.928,9.443 22.692,8.632 23.768,8.632 C24.279,8.632 24.72,8.967 24.669,9.618 C24.612,10.333 23.741,12.903 23.741,14.031 C23.741,14.884 24.06,15.945 25.683,15.945 C26.789,15.945 27.603,15.464 28.195,14.786 L27.489,13.941 C27.311,14.094 27.114,14.189 26.896,14.189 Z M41.701,6.873 L40.134,6.873 C40.134,6.873 40.856,4.109 40.873,4.035 C40.942,3.745 40.698,3.578 40.441,3.631 C40.441,3.631 39.23,3.866 39.005,3.913 C38.779,3.958 38.604,4.081 38.522,4.403 C38.512,4.445 37.88,6.873 37.88,6.873 L36.622,6.873 C36.385,6.873 36.245,6.968 36.192,7.188 C36.115,7.504 35.975,8.145 35.936,8.297 C35.885,8.494 36,8.644 36.222,8.644 L37.457,8.644 C37.448,8.677 37.064,10.125 36.725,11.521 L36.724,11.516 C36.72,11.532 36.716,11.546 36.712,11.562 L36.712,11.556 C36.712,11.556 36.708,11.571 36.702,11.598 C36.324,12.968 35.118,14.209 34.201,14.209 C33.721,14.209 33.506,13.909 33.506,13.402 C33.506,12.963 33.792,11.88 34.134,10.537 C34.549,8.901 34.915,7.555 34.955,7.397 C35.006,7.196 34.915,7.02 34.652,7.02 L33.122,7.02 C32.845,7.02 32.746,7.164 32.687,7.364 C32.687,7.364 32.257,8.98 31.8,10.778 C31.469,12.083 31.103,13.412 31.103,14.037 C31.103,15.151 31.609,15.948 32.997,15.948 C34.07,15.948 35.136,15.453 35.783,14.767 C35.783,14.767 36.011,14.521 36.23,14.229 C36.241,14.581 36.324,14.837 36.411,15.018 C36.458,15.119 36.515,15.215 36.581,15.303 C36.582,15.304 36.583,15.306 36.585,15.308 L36.585,15.308 C36.891,15.713 37.398,15.962 38.151,15.962 C39.894,15.962 40.944,14.938 41.562,13.909 L40.704,13.239 C40.333,13.774 39.839,14.175 39.324,14.175 C38.846,14.175 38.579,13.878 38.579,13.372 C38.579,12.935 38.889,11.868 39.229,10.53 C39.344,10.083 39.516,9.401 39.708,8.644 L41.302,8.644 C41.539,8.644 41.678,8.549 41.732,8.329 C41.808,8.012 41.948,7.372 41.988,7.221 C42.039,7.023 41.923,6.873 41.701,6.873 Z M34.126,6.348 C34.905,6.348 35.653,5.706 35.783,4.912 C35.937,4.141 35.409,3.498 34.63,3.498 C33.851,3.498 33.103,4.141 32.971,4.912 C32.819,5.706 33.326,6.348 34.126,6.348 Z"
            }]
        },
        pinit_ja: {
            w: "41",
            h: "18",
            p: [{
                f: "bd081c",
                d: "M19.822,7.173 C19.822,6.51 19.835,6.276 19.887,5.964 L18.145,5.964 C18.197,6.289 18.197,6.497 18.197,7.16 L18.21,13.192 C18.21,13.946 18.223,14.167 18.249,14.388 C18.327,15.025 18.522,15.441 18.886,15.714 C19.393,16.104 20.29,16.273 21.928,16.273 C22.721,16.273 24.359,16.195 25.126,16.117 C26.504,15.987 26.569,15.974 26.842,15.974 L26.764,14.245 C26.192,14.414 25.906,14.479 25.282,14.557 C24.333,14.687 23.137,14.765 22.266,14.765 C21.005,14.765 20.264,14.648 20.043,14.427 C19.861,14.245 19.809,13.959 19.809,13.231 C19.809,13.179 19.809,13.101 19.822,13.023 L19.822,11.307 C21.993,10.904 24.008,10.228 25.932,9.24 L26.27,9.071 C26.374,9.019 26.4,9.006 26.543,8.954 L25.503,7.485 C24.658,8.278 21.785,9.435 19.822,9.799 L19.822,7.173 Z M27.31,4.872 C26.491,4.872 25.815,5.548 25.815,6.367 C25.815,7.199 26.491,7.875 27.31,7.875 C28.142,7.875 28.818,7.199 28.818,6.367 C28.818,5.548 28.142,4.872 27.31,4.872 L27.31,4.872 Z M27.31,5.522 C27.791,5.522 28.168,5.899 28.168,6.367 C28.168,6.835 27.791,7.225 27.31,7.225 C26.842,7.225 26.465,6.835 26.465,6.367 C26.465,5.899 26.842,5.522 27.31,5.522 L27.31,5.522 Z M30.586,7.654 C31.795,8.33 32.861,9.188 33.901,10.293 L35.019,8.876 C34.018,7.927 33.212,7.329 31.665,6.367 L30.586,7.654 Z M31.041,16.234 C31.34,16.13 31.379,16.117 31.899,16.013 C33.914,15.584 35.526,14.947 36.852,14.063 C38.633,12.88 39.868,11.346 40.973,8.967 C40.31,8.499 40.102,8.304 39.595,7.693 C39.205,8.746 38.841,9.461 38.269,10.293 C37.242,11.775 36.033,12.776 34.408,13.478 C33.225,13.998 31.678,14.375 30.56,14.44 L31.041,16.234 Z M7.458,0 C2.5,0 0,3.522 0,6.459 C0,8.237 0.68,9.819 2.137,10.409 C2.376,10.505 2.59,10.412 2.66,10.15 C2.708,9.969 2.822,9.511 2.873,9.32 C2.943,9.061 2.916,8.97 2.723,8.744 C2.302,8.253 2.034,7.617 2.034,6.716 C2.034,4.104 4.007,1.765 7.172,1.765 C9.975,1.765 11.514,3.461 11.514,5.726 C11.514,8.708 10.183,11.18 8.206,11.18 C7.114,11.18 6.297,10.329 6.559,9.233 C6.872,7.922 7.48,6.509 7.48,5.564 C7.48,4.717 7.022,4.011 6.072,4.011 C4.956,4.011 4.06,5.155 4.06,6.687 C4.06,7.663 4.393,8.323 4.393,8.323 C4.393,8.323 3.251,13.117 3.051,13.957 C2.652,15.629 2.991,17.679 3.019,17.886 C3.036,18.009 3.195,18.038 3.267,17.946 C3.37,17.812 4.7,16.187 5.151,14.562 C5.279,14.102 5.885,11.72 5.885,11.72 C6.248,12.406 7.308,13.009 8.435,13.009 C11.79,13.009 14.066,9.979 14.066,5.923 C14.066,2.857 11.444,0 7.458,0 Z"
            }]
        }
    },
    styles: {
        "._embed_grid": {
            width: "100%",
            "max-width": "257px",
            "min-width": "140px",
            display: "inline-block",
            "box-shadow": "inset 0 0 1px #000",
            "border-radius": "%widgetBorderRadius%",
            overflow: "hidden",
            font: '12px "Helvetica Neue", Helvetica, arial, sans-serif',
            color: "rgb(54, 54, 54)",
            "box-sizing": "border-box",
            background: "#fff",
            cursor: "pointer",
            "%prefix%font-smoothing": "antialiased",
            "*": {
                display: "block",
                position: "relative",
                font: "inherit",
                cursor: "inherit",
                "box-sizing": "inherit",
                margin: "0",
                padding: "0",
                "text-align": "left"
            },
            "._hd": {
                height: "55px",
                "._img": {
                    position: "absolute",
                    top: "10px",
                    left: "10px",
                    height: "36px",
                    width: "36px",
                    "border-radius": "18px",
                    background: "transparent url () 0 0 no-repeat",
                    "background-size": "cover"
                },
                "._pinner": {
                    "white-space": "nowrap",
                    overflow: "hidden",
                    "text-overflow": "ellipsis",
                    width: "75%",
                    position: "absolute",
                    top: "20px",
                    left: "56px",
                    "font-size": "14px",
                    "font-weight": "bold"
                }
            },
            "._bd": {
                padding: "0 10px",
                "-moz-scrollbars": "none",
                "-ms-overflow-style": "none",
                "overflow-x": "hidden",
                "overflow-y": "auto",
                "._ct": {
                    width: "100%",
                    height: "auto",
                    "._col": {
                        display: "inline-block",
                        width: "100%",
                        padding: "1px",
                        "vertical-align": "top",
                        "min-width": "60px",
                        "._img": {
                            margin: "0",
                            display: "inline-block",
                            width: "100%",
                            background: "transparent url() 0 0 no-repeat",
                            "background-size": "cover",
                            "box-shadow": "inset 0 0 1px #000",
                            "border-radius": "2px"
                        }
                    }
                }
            },
            "._ft": {
                padding: "11px",
                "._button": {
                    "border-radius": "%buttonBorderRadiusTall%",
                    "text-align": "center",
                    "box-shadow": "inset 0 0 1px #888",
                    "background-color": "#efefef",
                    position: "relative",
                    display: "block",
                    overflow: "hidden",
                    height: "33px",
                    width: "100%",
                    "min-width": "70px",
                    padding: "0 3px",
                    "._label": {
                        position: "absolute",
                        left: "0",
                        width: "100%",
                        "text-align": "center",
                        "&._top": {top: "0"},
                        "&._bottom": {bottom: "0"},
                        "._string": {
                            "white-space": "pre",
                            color: "#746d6a",
                            "font-size": "13px",
                            "font-weight": "bold",
                            "vertical-align": "top",
                            display: "inline-block",
                            height: "33px",
                            "line-height": "33px"
                        },
                        "._logo": {
                            display: "inline-block",
                            "vertical-align": "bottom",
                            height: "32px",
                            width: "80px",
                            background: "transparent url(%lockup%) 50% 50% no-repeat",
                            "background-size": "80px 32px"
                        }
                    },
                    "&:hover": {"box-shadow": "inset 0 0 1px #000"}
                }
            },
            "&._noscroll ._bd": {overflow: "hidden"},
            "&._board": {
                "._hd": {
                    "._pinner": {top: "10px"},
                    "._board": {
                        "white-space": "nowrap",
                        overflow: "hidden",
                        "text-overflow": "ellipsis",
                        width: "75%",
                        position: "absolute",
                        bottom: "10px",
                        left: "56px",
                        color: "#363636",
                        "font-size": "12px"
                    }
                }
            },
            "&._c2": {"max-width": "494px", "min-width": "140px", "._bd ._ct ._col": {width: "50%"}},
            "&._c3": {"max-width": "731px", "min-width": "200px", "._bd ._ct ._col": {width: "33.33%"}},
            "&._c4": {"max-width": "968px", "min-width": "260px", "._bd ._ct ._col": {width: "25%"}},
            "&._c5": {"max-width": "1205px", "min-width": "320px", "._bd ._ct ._col": {width: "20%"}},
            "&._c6": {"max-width": "1442px", "min-width": "380px", "._bd ._ct ._col": {width: "16.66%"}},
            "&._c7": {"max-width": "1679px", "min-width": "440px", "._bd ._ct ._col": {width: "14.28%"}},
            "&._c8": {"max-width": "1916px", "min-width": "500px", "._bd ._ct ._col": {width: "12.5%"}},
            "&._c9": {"max-width": "2153px", "min-width": "560px", "._bd ._ct ._col": {width: "11.11%"}},
            "&._c10": {"max-width": "2390px", "min-width": "620px", "._bd ._ct ._col": {width: "10%"}}
        },
        "._embed_pin": {
            width: "100%",
            "min-width": "160px",
            "max-width": "236px",
            display: "inline-block",
            "box-sizing": "border-box",
            "box-shadow": "inset 0 0 1px #000",
            "border-radius": "%widgetBorderRadius%",
            overflow: "hidden",
            font: '12px "Helvetica Neue", Helvetica, arial, sans-serif',
            color: "#363636",
            background: "#fff",
            cursor: "pointer",
            "%prefix%font-smoothing": "antialiased",
            "*": {
                display: "block",
                position: "relative",
                font: "inherit",
                cursor: "inherit",
                "box-sizing": "inherit",
                margin: "0",
                padding: "0",
                "text-align": "left"
            },
            "._bd": {
                "border-bottom": "1px solid rgba(0, 0, 0, 0.09)",
                "._hd": {
                    "border-bottom": "1px solid rgba(0, 0, 0, 0.09)",
                    "._container": {
                        width: "100%",
                        "._img, ._iframe, ._video": {
                            width: "100%",
                            height: "100%",
                            position: "absolute",
                            left: "0",
                            background: "transparent url() 0 0 no-repeat",
                            "background-size": "cover",
                            border: "none"
                        },
                        "._native": {
                            height: "64px",
                            width: "64px",
                            background: "transparent url(%native%) 0 0 no-repeat",
                            position: "absolute",
                            top: "50%",
                            left: "50%",
                            "margin-top": "-32px",
                            "margin-left": "-32px",
                            opacity: ".75"
                        },
                        "._control": {
                            width: "50px",
                            height: "24px",
                            position: "absolute",
                            bottom: "12px",
                            left: "12px",
                            background: "rgba(0, 0, 0, .4)",
                            color: "#fff",
                            "box-shadow": "0 0 2px rgba(0, 0, 0, .2)",
                            border: "2px solid rgba(255, 255, 255, .68)",
                            "border-radius": "13px",
                            "&._paused::after, &._playing::after": {
                                position: "absolute",
                                top: "0",
                                left: "0",
                                width: "100%",
                                height: "100%",
                                "font-size": "10px",
                                "line-height": "19px",
                                "white-space": "pre",
                                "font-weight": "bold",
                                "font-style": "normal",
                                "text-align": "center"
                            },
                            "&._paused::after": {content: '"▶ GIF"'},
                            "&._playing::after": {content: '"❙ ❙ GIF"'}
                        }
                    },
                    "._repin": {
                        position: "absolute",
                        top: "10px",
                        left: "10px",
                        height: "28px",
                        width: "56px",
                        color: "#fff",
                        background: "#bd081c url(%logo%) 5px 50% no-repeat",
                        "background-size": "18px 18px",
                        "text-indent": "28px",
                        font: '14px/28px "Helvetica Neue", Helvetica, Arial, "sans-serif"',
                        "font-weight": "bold",
                        "border-radius": "4px",
                        padding: "0 6px 0 0",
                        width: "auto",
                        "&:hover": {"background-color": "#aa0719", "box-shadow": "none"}
                    }
                },
                "._source": {
                    height: "38px",
                    "border-bottom": "1px solid rgba(0, 0, 0, 0.09)",
                    "._img": {
                        position: "absolute",
                        top: "50%",
                        "margin-top": "-8px",
                        left: "10px",
                        height: "16px",
                        width: "16px",
                        background: "transparent url() 0 0 no-repeat",
                        "background-size": "16px 16px"
                    },
                    "._domain": {
                        "line-height": "38px",
                        "max-width": "75%",
                        "white-space": "nowrap",
                        overflow: "hidden",
                        "text-overflow": "ellipsis",
                        "font-weight": "bold",
                        color: "#b9b9b9",
                        position: "absolute",
                        top: "0px",
                        left: "35px"
                    },
                    "&._nofav": {"._img": {display: "none"}, "._domain": {"max-width": "85%", left: "10px"}},
                    "._menu": {
                        height: "inherit",
                        "._toggle": {
                            position: "absolute",
                            top: "0",
                            right: "5px",
                            height: "inherit",
                            width: "30px",
                            "border-bottom": "1px solid rgba(0, 0, 0, 0.09)",
                            background: "#fff url(%menu%) 50% 50% no-repeat",
                            "background-size": "fill"
                        },
                        "._dropdown": {
                            display: "none",
                            "border-radius": "5px",
                            "box-shadow": "0 1px 3px rgba(0, 0, 0, .33)",
                            "font-weight": "bold",
                            "font-size": "12px",
                            background: "#fff",
                            "text-align": "left",
                            padding: "10px",
                            position: "absolute",
                            "max-width": "195px",
                            right: "10px",
                            top: "39px",
                            "z-index": "1",
                            "&::after": {
                                content: '""',
                                position: "absolute",
                                top: "-6px",
                                right: "1px",
                                "border-bottom": "8px solid #fff",
                                "border-right": "8px solid transparent",
                                "border-left": "8px solid transparent"
                            },
                            "&::before": {
                                content: '""',
                                position: "absolute",
                                top: "-7px",
                                right: "2px",
                                "border-bottom": "7px solid #e2e2e2",
                                "border-right": "7px solid transparent",
                                "border-left": "7px solid transparent"
                            }
                        }
                    }
                },
                "._description": {"font-size": "14px", "line-height": "17px", margin: "8px 12px"},
                "._attribution": {
                    height: "22px",
                    "margin-top": "5px",
                    "._img": {
                        position: "absolute",
                        top: "50%",
                        "margin-top": "-8px",
                        left: "10px",
                        height: "16px",
                        width: "16px",
                        background: "transparent url() 0 0 no-repeat",
                        "background-size": "16px 16px"
                    },
                    "._by": {
                        "line-height": "22px",
                        "max-width": "75%",
                        "white-space": "nowrap",
                        overflow: "hidden",
                        "text-overflow": "ellipsis",
                        "font-size": "11px",
                        "font-weight": "bold",
                        color: "#b9b9b9",
                        position: "absolute",
                        top: "0px",
                        left: "35px"
                    }
                },
                "._stats": {
                    height: "24px",
                    "line-height": "24px",
                    margin: "0 0 0 10px",
                    "._repins": {
                        "padding-left": "17px",
                        "padding-right": "10px",
                        color: "#a8a8a8",
                        "font-size": "11px",
                        "font-weight": "bold",
                        display: "inline-block",
                        background: "transparent url(%repins%) 0 50% no-repeat"
                    },
                    "._done": {
                        "padding-left": "15px",
                        "padding-right": "10px",
                        color: "#a8a8a8",
                        "font-size": "11px",
                        "font-weight": "bold",
                        display: "inline-block",
                        background: "transparent url(%done%) 0 50% no-repeat"
                    }
                }
            },
            "._ft": {
                height: "50px",
                "margin-right": "10px",
                overflow: "hidden",
                "&:after": {
                    content: "'-------------------------------------------------------------------------------------'",
                    display: "block",
                    height: "1px",
                    "line-height": "1px",
                    color: "#fff"
                },
                "._img": {
                    position: "absolute",
                    left: "10px",
                    top: "10px",
                    height: "30px",
                    width: "30px",
                    "border-radius": "30px",
                    background: "transparent url() 0 0 no-repeat",
                    "background-size": "30px 30px"
                },
                "._pinner,  ._board": {
                    position: "absolute",
                    left: "50px",
                    "white-space": "nowrap",
                    overflow: "hidden",
                    "text-overflow": "ellipsis",
                    width: "75%"
                },
                "._pinner": {"font-weight": "bold", top: "10px"},
                "._board": {bottom: "10px"}
            },
            "&._ja ._bd ._hd ._repin": {
                "background-image": "url(%pinit_ja_white%)",
                "&._save": {background: "#bd081c url(%logo%) 5px 50% no-repeat", "background-size": "16px 16px"}
            },
            "&._medium": {"min-width": "237px", "max-width": "345px"},
            "&._large": {
                "min-width": "345px",
                "max-width": "600px",
                padding: "30px 34px 10px",
                "font-size": "14px",
                "._bd": {
                    "border-bottom": "none",
                    "._hd": {
                        "padding-top": "50px",
                        "border-bottom": "none",
                        "._container ._img, ._container ._video": {"border-radius": "8px"},
                        "._repin": {top: "0px", left: "0px"}
                    },
                    "._source": {height: "50px", "._domain": {"line-height": "50px"}},
                    "._stats": {position: "absolute", top: "0", right: "0", "text-align": "right"},
                    "._description": {"font-size": "16px", "line-height": "20px"},
                    "._menu": {height: "inherit", "._dropdown": {top: "50px", "font-size": "14px", padding: "10px"}}
                },
                "._ft": {
                    height: "60px",
                    "font-size": "16px",
                    "._board, ._pinner": {left: "60px"},
                    "._img": {
                        height: "40px",
                        width: "40px",
                        height: "40px",
                        "background-size": "40px 40px",
                        "border-radius": "20px"
                    }
                }
            }
        },
        "._button_follow": {
            display: "inline-block",
            color: "#363636",
            "box-sizing": "border-box",
            "box-shadow": "inset 0 0 1px #888",
            "border-radius": "%buttonBorderRadius%",
            font: '11px "Helvetica Neue", Helvetica, arial, sans-serif',
            "font-weight": "bold",
            "box-sizing": "border-box",
            cursor: "pointer",
            "%prefix%font-smoothing": "antialiased",
            height: "20px",
            "line-height": "20px",
            padding: "0 4px 0 20px",
            "background-color": "#efefef",
            position: "relative",
            "white-space": "nowrap",
            "vertical-align": "top",
            "&:hover": {"box-shadow": "inset 0 0 1px #000"},
            "&::after": {
                content: '""',
                position: "absolute",
                height: "14px",
                width: "14px",
                top: "3px",
                left: "3px",
                background: "transparent url(%logo%) 0 0 no-repeat",
                "background-size": "14px 14px"
            },
            "&._tall": {
                height: "26px",
                "line-height": "26px",
                "font-size": "13px",
                padding: "0 6px 0 25px",
                "border-radius": "%buttonBorderRadiusTall%",
                "&::after": {height: "18px", width: "18px", top: "4px", left: "4px", "background-size": "18px 18px"}
            }
        },
        "._button_pin": {
            cursor: "pointer",
            display: "inline-block",
            "box-sizing": "border-box",
            "box-shadow": "inset 0 0 1px #888",
            "border-radius": "%buttonBorderRadius%",
            height: "20px",
            width: "40px",
            "%prefix%font-smoothing": "antialiased",
            background: "#efefef url(%pinit_en_red%) 50% 50% no-repeat",
            "background-size": "75%",
            position: "relative",
            font: '12px "Helvetica Neue", Helvetica, arial, sans-serif',
            color: "#555",
            "box-sizing": "border-box",
            "text-align": "center",
            "vertical-align": "top",
            "&:hover": {"box-shadow": "inset 0 0 1px #000"},
            "&._above": {
                "._count": {
                    position: "absolute",
                    top: "-28px",
                    left: "0",
                    height: "28px",
                    width: "inherit",
                    "line-height": "24px",
                    background: "transparent url(%above%) 0 0 no-repeat",
                    "background-size": "40px 28px"
                }, "&._padded": {"margin-top": "28px"}
            },
            "&._beside": {
                "._count": {
                    position: "absolute",
                    right: "-45px",
                    "text-align": "center",
                    "text-indent": "5px",
                    height: "inherit",
                    width: "45px",
                    "font-size": "11px",
                    "line-height": "20px",
                    background: "transparent url(%beside%)",
                    "background-size": "cover"
                }, "&._padded": {"margin-right": "45px"}
            },
            "&._ja": {"background-image": "url(%pinit_ja_red%)", "background-size": "72%"},
            "&._red": {
                "background-color": "#bd081c",
                "background-image": "url(%pinit_en_white%)",
                "&._ja": {"background-image": "url(%pinit_ja_white%)"}
            },
            "&._white": {"background-color": "#fff"},
            "&._save": {
                "&:hover": {"background-color": "#aa0719", "box-shadow": "none", color: "#fff!important"},
                "border-radius": "2px",
                "text-indent": "20px",
                width: "auto",
                padding: "0 4px 0 0",
                "text-align": "center",
                "text-decoration": "none",
                font: '11px/20px "Helvetica Neue", Helvetica, sans-serif',
                "font-weight": "bold",
                color: "#fff!important",
                background: "#bd081c url(%logo%) 3px 50% no-repeat",
                "background-size": "14px 14px",
                "font-weight": "bold",
                "-webkit-font-smoothing": "antialiased",
                "._count": {
                    "text-indent": "0",
                    position: "absolute",
                    color: "#555",
                    background: "#efefef",
                    "border-radius": "2px",
                    "&::before": {content: '""', position: "absolute"}
                },
                "&._beside": {
                    "._count": {
                        right: "-46px",
                        height: "20px",
                        width: "40px",
                        "font-size": "10px",
                        "line-height": "20px",
                        "&::before": {
                            top: "3px",
                            left: "-4px",
                            "border-right": "7px solid #efefef",
                            "border-top": "7px solid transparent",
                            "border-bottom": "7px solid transparent"
                        }
                    }
                },
                "&._above": {
                    "._count": {
                        top: "-36px",
                        width: "100%",
                        height: "30px",
                        "font-size": "10px",
                        "line-height": "30px",
                        "&::before": {
                            bottom: "-4px",
                            left: "4px",
                            "border-top": "7px solid #efefef",
                            "border-right": "7px solid transparent",
                            "border-left": "7px solid transparent"
                        }
                    }, "&._padded": {"margin-top": "28px"}
                }
            },
            "&._tall": {
                height: "28px",
                width: "56px",
                "border-radius": "%buttonBorderRadiusTall%",
                "&._above": {
                    "._count": {
                        position: "absolute",
                        height: "37px",
                        width: "inherit",
                        top: "-37px",
                        left: "0",
                        "line-height": "30px",
                        "font-size": "14px",
                        background: "transparent url(%above%)",
                        "background-size": "cover"
                    }, "&._padded": {"margin-top": "37px"}
                },
                "&._beside": {
                    "._count": {
                        "text-indent": "5px",
                        position: "absolute",
                        right: "-63px",
                        height: "inherit",
                        width: "63px",
                        "font-size": "14px",
                        "line-height": "28px",
                        background: "transparent url(%beside%)",
                        "background-size": "cover"
                    }, "&._padded": {"margin-right": "63px"}
                },
                "&._save": {
                    "border-radius": "4px",
                    width: "auto",
                    "background-position-x": "6px",
                    "background-size": "18px 18px",
                    "text-indent": "29px",
                    font: '14px/28px "Helvetica Neue", Helvetica, Arial, "sans-serif"',
                    "font-weight": "bold",
                    padding: "0 6px 0 0",
                    "._count": {
                        position: "absolute",
                        color: "#555",
                        "font-size": "12px",
                        "text-indent": "0",
                        background: "#efefef",
                        "border-radius": "4px",
                        "&::before": {content: '""', position: "absolute"}
                    },
                    "&._above": {
                        "._count": {
                            "font-size": "14px",
                            top: "-50px",
                            width: "100%",
                            height: "44px",
                            "line-height": "44px",
                            "&::before": {
                                bottom: "-4px",
                                left: "7px",
                                "border-top": "7px solid #efefef",
                                "border-right": "7px solid transparent",
                                "border-left": "7px solid transparent"
                            }
                        }
                    },
                    "&._beside": {
                        "._count": {
                            "font-size": "14px",
                            right: "-63px",
                            width: "56px",
                            height: "28px",
                            "line-height": "28px",
                            "&::before": {
                                top: "7px",
                                left: "-4px",
                                "border-right": "7px solid #efefef",
                                "border-top": "7px solid transparent",
                                "border-bottom": "7px solid transparent"
                            }
                        }
                    }
                }
            },
            "&._round": {
                height: "16px",
                width: "16px",
                background: "transparent url(%logo%) 0 0 no-repeat",
                "background-size": "16px 16px",
                "box-shadow": "none",
                "&._tall": {height: "32px", width: "32px", "background-size": "32px 32px"}
            }
        }
    }
});