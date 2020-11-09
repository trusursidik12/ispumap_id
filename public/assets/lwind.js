! function (t) {
    if ("object" == typeof exports && "undefined" != typeof module) module.exports = t();
    else if ("function" == typeof define && define.amd) define([], t);
    else {
        ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).leafletVelocity = t()
    }
}((function () {
    return function t(e, n, i) {
        function o(r, s) {
            if (!n[r]) {
                if (!e[r]) {
                    var l = "function" == typeof require && require;
                    if (!s && l) return l(r, !0);
                    if (a) return a(r, !0);
                    var h = new Error("Cannot find module '" + r + "'");
                    throw h.code = "MODULE_NOT_FOUND", h
                }
                var c = n[r] = {
                    exports: {}
                };
                e[r][0].call(c.exports, (function (t) {
                    return o(e[r][1][t] || t)
                }), c, c.exports, t, e, n, i)
            }
            return n[r].exports
        }
        for (var a = "function" == typeof require && require, r = 0; r < i.length; r++) o(i[r]);
        return o
    }({
        1: [function (t, e, n) {
            "use strict";
            L.DomUtil.setTransform || (L.DomUtil.setTransform = function (t, e, n) {
                var i = e || new L.Point(0, 0);
                t.style[L.DomUtil.TRANSFORM] = (L.Browser.ie3d ? "translate(" + i.x + "px," + i.y + "px)" : "translate3d(" + i.x + "px," + i.y + "px,0)") + (n ? " scale(" + n + ")" : "")
            }), L.CanvasLayer = (L.Layer ? L.Layer : L.Class).extend({
                initialize: function (t) {
                    this._map = null, this._canvas = null, this._frame = null, this._delegate = null, L.setOptions(this, t)
                },
                delegate: function (t) {
                    return this._delegate = t, this
                },
                needRedraw: function () {
                    return this._frame || (this._frame = L.Util.requestAnimFrame(this.drawLayer, this)), this
                },
                _onLayerDidResize: function (t) {
                    this._canvas.width = t.newSize.x, this._canvas.height = t.newSize.y
                },
                _onLayerDidMove: function () {
                    var t = this._map.containerPointToLayerPoint([0, 0]);
                    L.DomUtil.setPosition(this._canvas, t), this.drawLayer()
                },
                getEvents: function () {
                    var t = {
                        resize: this._onLayerDidResize,
                        moveend: this._onLayerDidMove
                    };
                    return this._map.options.zoomAnimation && L.Browser.any3d && (t.zoomanim = this._animateZoom), t
                },
                onAdd: function (t) {
                    console.log("canvas onAdd", this), this._map = t, this._canvas = L.DomUtil.create("canvas", "leaflet-layer"), this.tiles = {};
                    var e = this._map.getSize();
                    this._canvas.width = e.x, this._canvas.height = e.y;
                    var n = this._map.options.zoomAnimation && L.Browser.any3d;
                    L.DomUtil.addClass(this._canvas, "leaflet-zoom-" + (n ? "animated" : "hide")), this.options.pane.appendChild(this._canvas), t.on(this.getEvents(), this);
                    var i = this._delegate || this;
                    i.onLayerDidMount && i.onLayerDidMount(), this.needRedraw();
                    var o = this;
                    setTimeout((function () {
                        o._onLayerDidMove()
                    }), 0)
                },
                onRemove: function (t) {
                    var e = this._delegate || this;
                    e.onLayerWillUnmount && e.onLayerWillUnmount(), this.options.pane.removeChild(this._canvas), t.off(this.getEvents(), this), this._canvas = null
                },
                addTo: function (t) {
                    return t.addLayer(this), this
                },
                drawLayer: function () {
                    var t = this._map.getSize(),
                        e = this._map.getBounds(),
                        n = this._map.getZoom(),
                        i = this._map.options.crs.project(this._map.getCenter()),
                        o = this._map.options.crs.project(this._map.containerPointToLatLng(this._map.getSize())),
                        a = this._delegate || this;
                    a.onDrawLayer && a.onDrawLayer({
                        layer: this,
                        canvas: this._canvas,
                        bounds: e,
                        size: t,
                        zoom: n,
                        center: i,
                        corner: o
                    }), this._frame = null
                },
                _setTransform: function (t, e, n) {
                    var i = e || new L.Point(0, 0);
                    t.style[L.DomUtil.TRANSFORM] = (L.Browser.ie3d ? "translate(" + i.x + "px," + i.y + "px)" : "translate3d(" + i.x + "px," + i.y + "px,0)") + (n ? " scale(" + n + ")" : "")
                },
                _animateZoom: function (t) {
                    var e = this._map.getZoomScale(t.zoom),
                        n = L.Layer ? this._map._latLngToNewLayerPoint(this._map.getBounds().getNorthWest(), t.zoom, t.center) : this._map._getCenterOffset(t.center)._multiplyBy(-e).subtract(this._map._getMapPanePos());
                    L.DomUtil.setTransform(this._canvas, n, e)
                }
            }), L.canvasLayer = function (t) {
                return new L.CanvasLayer(t)
            }, L.Control.Velocity = L.Control.extend({
                options: {
                    position: "bottomleft",
                    emptyString: "Unavailable",
                    angleConvention: "bearingCCW",
                    speedUnit: "m/s",
                    onAdd: null,
                    onRemove: null
                },
                onAdd: function (t) {
                    return this._container = L.DomUtil.create("div", "leaflet-control-velocity"), L.DomEvent.disableClickPropagation(this._container), t.on("mousemove", this._onMouseMove, this), this._container.innerHTML = this.options.emptyString, this.options.leafletVelocity.options.onAdd && this.options.leafletVelocity.options.onAdd(), this._container
                },
                onRemove: function (t) {
                    t.off("mousemove", this._onMouseMove, this), this.options.leafletVelocity.options.onRemove && this.options.leafletVelocity.options.onRemove()
                },
                vectorToSpeed: function (t, e, n) {
                    var i = Math.sqrt(Math.pow(t, 2) + Math.pow(e, 2));
                    return "k/h" === n ? this.meterSec2kilometerHour(i) : "kt" === n ? this.meterSec2Knots(i) : i
                },
                vectorToDegrees: function (t, e, n) {
                    n.endsWith("CCW") && (e = e > 0 ? e = -e : Math.abs(e));
                    var i = Math.sqrt(Math.pow(t, 2) + Math.pow(e, 2)),
                        o = 180 * Math.atan2(t / i, e / i) / Math.PI + 180;
                    return "bearingCW" !== n && "meteoCCW" !== n || (o += 180) >= 360 && (o -= 360), o
                },
                meterSec2Knots: function (t) {
                    return t / .514
                },
                meterSec2kilometerHour: function (t) {
                    return 3.6 * t
                },
                _onMouseMove: function (t) {
                    var e = this.options.leafletVelocity._map.containerPointToLatLng(L.point(t.containerPoint.x, t.containerPoint.y)),
                        n = this.options.leafletVelocity._windy.interpolatePoint(e.lng, e.lat),
                        i = "";
                    i = n && !isNaN(n[0]) && !isNaN(n[1]) && n[2] ? "<strong>" + this.options.velocityType + " Direction: </strong>" + this.vectorToDegrees(n[0], n[1], this.options.angleConvention).toFixed(2) + "Â°, <strong>" + this.options.velocityType + " Speed: </strong>" + this.vectorToSpeed(n[0], n[1], this.options.speedUnit).toFixed(2) + this.options.speedUnit : this.options.emptyString, this._container.innerHTML = i
                }
            }), L.Map.mergeOptions({
                positionControl: !1
            }), L.Map.addInitHook((function () {
                this.options.positionControl && (this.positionControl = new L.Control.MousePosition, this.addControl(this.positionControl))
            })), L.control.velocity = function (t) {
                return new L.Control.Velocity(t)
            }, L.VelocityLayer = (L.Layer ? L.Layer : L.Class).extend({
                options: {
                    displayValues: !0,
                    displayOptions: {
                        velocityType: "Velocity",
                        position: "bottomleft",
                        emptyString: "No velocity data"
                    },
                    maxVelocity: 10,
                    colorScale: null,
                    data: null
                },
                _map: null,
                _canvasLayer: null,
                _windy: null,
                _context: null,
                _timer: 0,
                _mouseControl: null,
                initialize: function (t) {
                    L.setOptions(this, t)
                },
                onAdd: function (t) {
                    this._paneName = this.options.paneName || "overlayPane";
                    var e = t._panes.overlayPane;
                    t.getPane && ((e = t.getPane(this._paneName)) || (e = t.createPane(this._paneName))), this._canvasLayer = L.canvasLayer({
                        pane: e
                    }).delegate(this), this._canvasLayer.addTo(t), this._map = t
                },
                onRemove: function (t) {
                    this._destroyWind()
                },
                setData: function (t) {
                    this.options.data = t, this._windy && (this._windy.setData(t), this._clearAndRestart()), this.fire("load")
                },
                setOpacity: function (t) {
                    console.log("this._canvasLayer", this._canvasLayer), this._canvasLayer.setOpacity(t)
                },
                setOptions: function (t) {
                    this.options = Object.assign(this.options, t), t.hasOwnProperty("displayOptions") && (this.options.displayOptions = Object.assign(this.options.displayOptions, t.displayOptions), this._initMouseHandler(!0)), t.hasOwnProperty("data") && (this.options.data = t.data), this._windy && (this._windy.setOptions(t), t.hasOwnProperty("data") && this._windy.setData(t.data), this._clearAndRestart()), this.fire("load")
                },
                onDrawLayer: function (t, e) {
                    var n = this;
                    this._windy ? this.options.data && (this._timer && clearTimeout(n._timer), this._timer = setTimeout((function () {
                        n._startWindy()
                    }), 750)) : this._initWindy(this)
                },
                _startWindy: function () {
                    var t = this._map.getBounds(),
                        e = this._map.getSize();
                    this._windy.start([
                        [0, 0],
                        [e.x, e.y]
                    ], e.x, e.y, [
                        [t._southWest.lng, t._southWest.lat],
                        [t._northEast.lng, t._northEast.lat]
                    ])
                },
                _initWindy: function (t) {
                    var e = Object.assign({
                        canvas: t._canvasLayer._canvas,
                        map: this._map
                    }, t.options);
                    this._windy = new i(e), this._context = this._canvasLayer._canvas.getContext("2d"), this._canvasLayer._canvas.classList.add("velocity-overlay"), this.onDrawLayer(), this._map.on("dragstart", t._windy.stop), this._map.on("dragend", t._clearAndRestart), this._map.on("zoomstart", t._windy.stop), this._map.on("zoomend", t._clearAndRestart), this._map.on("resize", t._clearWind), this._initMouseHandler(!1)
                },
                _initMouseHandler: function (t) {
                    if (t && (this._map.removeControl(this._mouseControl), this._mouseControl = !1), !this._mouseControl && this.options.displayValues) {
                        var e = this.options.displayOptions || {};
                        e.leafletVelocity = this, this._mouseControl = L.control.velocity(e).addTo(this._map)
                    }
                },
                _clearAndRestart: function () {
                    this._context && this._context.clearRect(0, 0, 3e3, 3e3), this._windy && this._startWindy()
                },
                _clearWind: function () {
                    this._windy && this._windy.stop(), this._context && this._context.clearRect(0, 0, 3e3, 3e3)
                },
                _destroyWind: function () {
                    this._timer && clearTimeout(this._timer), this._windy && this._windy.stop(), this._context && this._context.clearRect(0, 0, 3e3, 3e3), this._mouseControl && this._map.removeControl(this._mouseControl), this._mouseControl = null, this._windy = null, this._map.removeLayer(this._canvasLayer)
                }
            }), L.velocityLayer = function (t) {
                return new L.VelocityLayer(t)
            };
            var i = function (t) {
                var e, n, i, o, a, r, s, l, h, c, d = t.minVelocity || 0,
                    u = t.maxVelocity || 10,
                    p = (t.velocityScale || .005) * (Math.pow(window.devicePixelRatio, 1 / 3) || 1),
                    m = t.particleAge || 90,
                    y = t.lineWidth || 1,
                    f = t.particleMultiplier || 1 / 300,
                    _ = Math.pow(window.devicePixelRatio, 1 / 3) || 1.6,
                    v = t.frameRate || 15,
                    g = 1e3 / v,
                    w = .97,
                    M = t.colorScale || ["rgb(36,104, 180)", "rgb(60,157, 194)", "rgb(128,205,193 )", "rgb(151,218,168 )", "rgb(198,231,181)", "rgb(238,247,217)", "rgb(255,238,159)", "rgb(252,217,125)", "rgb(255,182,100)", "rgb(252,150,75)", "rgb(250,112,52)", "rgb(245,64,32)", "rgb(237,45,28)", "rgb(220,24,32)", "rgb(180,0,35)"],
                    x = [NaN, NaN, null],
                    C = t.data,
                    b = function (t, e, n, i, o, a) {
                        var r = 1 - t,
                            s = 1 - e,
                            l = r * s,
                            h = t * s,
                            c = r * e,
                            d = t * e,
                            u = n[0] * l + i[0] * h + o[0] * c + a[0] * d,
                            p = n[1] * l + i[1] * h + o[1] * c + a[1] * d;
                        return [u, p, Math.sqrt(u * u + p * p)]
                    },
                    P = function (t) {
                        var e = null,
                            n = null;
                        return t.forEach((function (t) {
                                switch (t.header.parameterCategory + "," + t.header.parameterNumber) {
                                    case "1,2":
                                    case "2,2":
                                        e = t;
                                        break;
                                    case "1,3":
                                    case "2,3":
                                        n = t;
                                        break;
                                    default:
                                        t
                                }
                            })),
                            function (t, e) {
                                var n = t.data,
                                    i = e.data;
                                return {
                                    header: t.header,
                                    data: function (t) {
                                        return [n[t], i[t]]
                                    },
                                    interpolate: b
                                }
                            }(e, n)
                    },
                    O = function (t, i) {
                        if (!n) return null;
                        var l, h = T(t - o, 360) / r,
                            c = (a - i) / s,
                            d = Math.floor(h),
                            u = d + 1,
                            p = Math.floor(c),
                            m = p + 1;
                        if (l = n[p]) {
                            var y = l[d],
                                f = l[u];
                            if (D(y) && D(f) && (l = n[m])) {
                                var _ = l[d],
                                    v = l[u];
                                if (D(_) && D(v)) return e.interpolate(h - d, c - p, y, f, _, v)
                            }
                        }
                        return null
                    },
                    D = function (t) {
                        return null != t
                    },
                    T = function (t, e) {
                        return t - e * Math.floor(t / e)
                    },
                    R = function (t, e, n, i, o, a, r) {
                        var s = r[0] * a,
                            l = r[1] * a,
                            h = S(t, e, n, i, o);
                        return r[0] = h[0] * s + h[2] * l, r[1] = h[1] * s + h[3] * l, r
                    },
                    S = function (t, e, n, i, o) {
                        var a = 2 * Math.PI,
                            r = e < 0 ? 5 : -5,
                            s = n < 0 ? 5 : -5,
                            l = V(n, e + r),
                            h = V(n + s, e),
                            c = Math.cos(n / 360 * a);
                        return [(l[0] - i) / r / c, (l[1] - o) / r / c, (h[0] - i) / s, (h[1] - o) / s]
                    },
                    A = function (t, e, n) {
                        function i(e, n) {
                            var i = t[Math.round(e)];
                            return i && i[Math.round(n)] || x
                        }
                        i.release = function () {
                            t = []
                        }, i.randomize = function (t) {
                            var n, o, a = 0;
                            do {
                                n = Math.round(Math.floor(Math.random() * e.width) + e.x), o = Math.round(Math.floor(Math.random() * e.height) + e.y)
                            } while (null === i(n, o)[2] && a++ < 30);
                            return t.x = n, t.y = o, t
                        }, n(e, i)
                    },
                    W = function (t) {
                        return t / 180 * Math.PI
                    },
                    z = function (e, n, i) {
                        var o = t.map.containerPointToLatLng(L.point(e, n));
                        return [o.lng, o.lat]
                    },
                    V = function (e, n, i) {
                        var o = t.map.latLngToContainerPoint(L.latLng(e, n));
                        return [o.x, o.y]
                    },
                    N = function (e, n) {
                        var i, o, a = (i = d, o = u, M.indexFor = function (t) {
                                return Math.max(0, Math.min(M.length - 1, Math.round((t - i) / (o - i) * (M.length - 1))))
                            }, M),
                            r = a.map((function () {
                                return []
                            })),
                            s = Math.round(e.width * e.height * f);
                        /android|blackberry|iemobile|ipad|iphone|ipod|opera mini|webos/i.test(navigator.userAgent) && (s *= _);
                        for (var l = "rgba(0, 0, 0, ".concat(w, ")"), h = [], p = 0; p < s; p++) h.push(n.randomize({
                            age: Math.floor(Math.random() * m) + 0
                        }));
                        var v = t.canvas.getContext("2d");
                        v.lineWidth = y, v.fillStyle = l, v.globalAlpha = .6;
                        var L = Date.now();
                        ! function t() {
                            c = requestAnimationFrame(t);
                            var i = Date.now(),
                                o = i - L;
                            o > g && (L = i - o % g, r.forEach((function (t) {
                                t.length = 0
                            })), h.forEach((function (t) {
                                t.age > m && (n.randomize(t).age = 0);
                                var e = t.x,
                                    i = t.y,
                                    o = n(e, i),
                                    s = o[2];
                                if (null === s) t.age = m;
                                else {
                                    var l = e + o[0],
                                        h = i + o[1];
                                    null !== n(l, h)[2] ? (t.xt = l, t.yt = h, r[a.indexFor(s)].push(t)) : (t.x = l, t.y = h)
                                }
                                t.age += 1
                            })), v.globalCompositeOperation = "destination-in", v.fillRect(e.x, e.y, e.width, e.height), v.globalCompositeOperation = "lighter", v.globalAlpha = 0 === w ? 0 : .9 * w, r.forEach((function (t, e) {
                                t.length > 0 && (v.beginPath(), v.strokeStyle = a[e], t.forEach((function (t) {
                                    v.moveTo(t.x, t.y), v.lineTo(t.xt, t.yt), t.x = t.xt, t.y = t.yt
                                })), v.stroke())
                            })))
                        }()
                    },
                    U = function () {
                        E.field && E.field.release(), c && cancelAnimationFrame(c)
                    },
                    E = {
                        params: t,
                        start: function (t, c, d, u) {
                            var m = {
                                south: W(u[0][1]),
                                north: W(u[1][1]),
                                east: W(u[1][0]),
                                west: W(u[0][0]),
                                width: c,
                                height: d
                            };
                            U(),
                                function (t, c) {
                                    var d = !0;
                                    t.length < 2 && (d = !1), d || console.log("Windy Error: data must have at least two components (u,v)");
                                    var u = (e = P(t)).header;
                                    if (u.hasOwnProperty("gridDefinitionTemplate") && 0 != u.gridDefinitionTemplate && (d = !1), d || console.log("Windy Error: Only data with Latitude_Longitude coordinates is supported"), d = !0, o = u.lo1, a = u.la1, r = u.dx, s = u.dy, l = u.nx, h = u.ny, u.hasOwnProperty("scanMode")) {
                                        var p = u.scanMode.toString(2),
                                            m = (p = ("0" + p).slice(-8)).split("").map(Number).map(Boolean);
                                        m[0] && (r = -r), m[1] && (s = -s), m[2] && (d = !1), m[3] && (d = !1), m[4] && (d = !1), m[5] && (d = !1), m[6] && (d = !1), m[7] && (d = !1), d || console.log("Windy Error: Data with scanMode: " + u.scanMode + " is not supported.")
                                    }(i = new Date(u.refTime)).setHours(i.getHours() + u.forecastTime), n = [];
                                    for (var y = 0, f = Math.floor(l * r) >= 360, _ = 0; _ < h; _++) {
                                        for (var v = [], g = 0; g < l; g++, y++) v[g] = e.data(y);
                                        f && v.push(v[0]), n[_] = v
                                    }
                                    c({
                                        date: i,
                                        interpolate: O
                                    })
                                }(C, (function (e) {
                                    ! function (t, e, n, i) {
                                        var o = {},
                                            a = (n.south - n.north) * (n.west - n.east),
                                            r = p * Math.pow(a, .4),
                                            s = [],
                                            l = e.x;

                                        function h(n) {
                                            for (var i = [], a = e.y; a <= e.yMax; a += 2) {
                                                var l = z(n, a);
                                                if (l) {
                                                    var h = l[0],
                                                        c = l[1];
                                                    if (isFinite(h)) {
                                                        var d = t.interpolate(h, c);
                                                        d && (d = R(o, h, c, n, a, r, d), i[a + 1] = i[a] = d)
                                                    }
                                                }
                                            }
                                            s[n + 1] = s[n] = i
                                        }! function t() {
                                            for (var n = Date.now(); l < e.width;)
                                                if (h(l), l += 2, Date.now() - n > 1e3) return void setTimeout(t, 25);
                                            A(s, e, i)
                                        }()
                                    }(e, function (t, e, n) {
                                        var i = t[0],
                                            o = t[1],
                                            a = Math.round(i[0]),
                                            r = Math.max(Math.floor(i[1], 0), 0);
                                        Math.min(Math.ceil(o[0], e), e - 1);
                                        return {
                                            x: a,
                                            y: r,
                                            xMax: e,
                                            yMax: Math.min(Math.ceil(o[1], n), n - 1),
                                            width: e,
                                            height: n
                                        }
                                    }(t, c, d), m, (function (t, e) {
                                        E.field = e, N(t, e)
                                    }))
                                }))
                        },
                        stop: U,
                        createField: A,
                        interpolatePoint: O,
                        setData: function (t) {
                            C = t
                        },
                        setOptions: function (t) {
                            t.hasOwnProperty("minVelocity") && (d = t.minVelocity), t.hasOwnProperty("maxVelocity") && (u = t.maxVelocity), t.hasOwnProperty("velocityScale") && (p = (t.velocityScale || .005) * (Math.pow(window.devicePixelRatio, 1 / 3) || 1)), t.hasOwnProperty("particleAge") && (m = t.particleAge), t.hasOwnProperty("lineWidth") && (y = t.lineWidth), t.hasOwnProperty("particleMultiplier") && (f = t.particleMultiplier), t.hasOwnProperty("opacity") && (w = +t.opacity), t.hasOwnProperty("frameRate") && (v = t.frameRate), g = 1e3 / v
                        }
                    };
                return E
            };
            window.cancelAnimationFrame || (window.cancelAnimationFrame = function (t) {
                clearTimeout(t)
            })
        }, {}]
    }, {}, [1])(1)
}));