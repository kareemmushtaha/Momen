!(function (e, t, n) {
    if ("ar" == GN_lang)
        var a = "ليالي",
            r = "من",
            i = "الى",
            c = "ليلة واحدة";
    else (a = "Nights"), (r = "from"), (i = "to"), (c = "one night");
    var o = 0;
    function s(t, a, r) {
        var i, c, o;
        return (
            (i = e("<div></div>").addClass(t + "-presets")),
            (c = e("<ul></ul>")),
            (o = e.ui.menu.prototype.options.items === n ? { start: '<li><a href="#">', end: "</a></li>" } : { start: "<li><div>", end: "</div></li>" }),
            e.each(a.presetRanges, function () {
                e(o.start + this.text + o.end)
                    .data("dateStart", this.dateStart)
                    .data("dateEnd", this.dateEnd)
                    .click(r)
                    .appendTo(c);
            }),
            i.append(c),
            (c.menu().data("ui-menu").delay = 0),
            {
                getElement: function () {
                    return i;
                },
            }
        );
    }
    e.widget("comiseo.daterangepicker", {
        version: "0.6.0-beta.1",
        options: {
            presetRanges: [],
            initialText: "Select date range...",
            icon: "ui-icon-triangle-1-s",
            applyButtonText: "Apply",
            clearButtonText: "Clear",
            cancelButtonText: "Cancel",
            rangeSplitter: " - ",
            dateFormat: "M d, yy",
            altFormat: "yy-mm-dd",
            verticalOffset: 0,
            mirrorOnCollision: !0,
            autoFitCalendars: !0,
            applyOnMenuSelect: !0,
            open: null,
            close: null,
            change: null,
            clear: null,
            cancel: null,
            onOpen: null,
            onClose: null,
            onChange: null,
            onClear: null,
            datepickerOptions: { numberOfMonths: 6, maxDate: 0 },
        },
        _create: function () {
            this._dateRangePicker = (function (n, l, d) {
                var u,
                    _,
                    g,
                    p,
                    f,
                    h,
                    m = "comiseo-daterangepicker",
                    b = !1,
                    k = 0,
                    y = 1,
                    O = 2,
                    D = 3,
                    I = ["left", "right", "top", "bottom"],
                    N = y,
                    v = null;
                function G() {
                    if (d.autoFitCalendars) {
                        var e = u.outerWidth(!0),
                            t = f.getElement(),
                            n = t.datepicker("option", "numberOfMonths"),
                            a = n;
                        if (e > 5e4) {
                            for (; n > 1 && u.outerWidth(!0) > 5e4; ) t.datepicker("option", "numberOfMonths", --n);
                            n !== a && (G.monthWidth = (e - u.outerWidth(!0)) / (a - n));
                        } else for (; n < G.numberOfMonths && 5e4 - u.outerWidth(!0) >= G.monthWidth; ) t.datepicker("option", "numberOfMonths", ++n);
                        w(), !1;
                    }
                }
                function x(t) {
                    var n = d.dateFormat;
                    return e.datepicker.formatDate(n, t.start) + (+t.end != +t.start ? d.rangeSplitter + e.datepicker.formatDate(n, t.end) : "");
                }
                function S() {
                    var e = C();
                    e ? (g.setLabel(x(e)), f.setRange(e)) : f.reset();
                }
                function M(t, a) {
                    var r = t || f.getRange();
                    r.start &&
                        (r.end || (r.end = r.start),
                        t && f.setRange(r),
                        g.setLabel(x(r)),
                        n
                            .val(
                                (function (t) {
                                    var n = d.altFormat,
                                        a = {};
                                    return (a.start = e.datepicker.formatDate(n, t.start)), (a.end = e.datepicker.formatDate(n, t.end)), JSON.stringify(a);
                                })(r)
                            )
                            .change(),
                        d.onChange && d.onChange(),
                        l._trigger("change", a, { instance: l }));
                }
                function C() {
                    return (function (t) {
                        var n = d.altFormat,
                            a = null;
                        if (t)
                            try {
                                a = JSON.parse(t, function (t, a) {
                                    return t ? e.datepicker.parseDate(n, a) : a;
                                });
                            } catch (e) {}
                        return a;
                    })(n.val());
                }
                function Y(e) {
                    g.reset(), f.reset(), d.onClear && d.onClear(), l._trigger("clear", e, { instance: l });
                }
                function R(t) {
                    var n = e(this),
                        a = n.data("dateStart")().startOf("day").toDate(),
                        r = n.data("dateEnd")().startOf("day").toDate();
                    return f.setRange({ start: a, end: r }), d.applyOnMenuSelect && (W(t), M(null, t)), !1;
                }
                function w() {
                    u.position({
                        my: "left top",
                        at: "left bottom" + (d.verticalOffset < 0 ? d.verticalOffset : "+" + d.verticalOffset),
                        of: g.getElement(),
                        collision: "flipfit flipfit",
                        using: function (e, t) {
                            var n,
                                a,
                                r = t.element.left + t.element.width / 2,
                                i = t.target.left + t.target.width / 2,
                                c = N,
                                o = t.element.top + t.element.height / 2,
                                s = t.target.top + t.target.height / 2,
                                l = v;
                            (N = r > i ? y : k) !== c && (d.mirrorOnCollision && ((n = N === k ? p : f), u.children().first().append(n.getElement())), u.removeClass(m + "-" + I[c]), u.addClass(m + "-" + I[N])),
                                u.css({ left: e.left, top: e.top }),
                                (v = o > s ? D : O) !== l && (null !== l && g.getElement().removeClass(m + "-" + I[l]), g.getElement().addClass(m + "-" + I[v])),
                                (a = (v === D && t.element.top - t.target.top !== t.target.height + d.verticalOffset) || (v === O && t.target.top - t.element.top !== t.element.height + d.verticalOffset)),
                                g.getElement().toggleClass(m + "-vfit", a);
                        },
                    });
                }
                function E(e) {
                    e.preventDefault(), e.stopPropagation();
                }
                function A(t) {
                    switch (t.which) {
                        case e.ui.keyCode.UP:
                        case e.ui.keyCode.DOWN:
                            return E(t), void T(t);
                        case e.ui.keyCode.ESCAPE:
                            return E(t), W(t), void S();
                        case e.ui.keyCode.TAB:
                            return void W(t);
                    }
                }
                function T(e) {
                    b || (g.getElement().addClass(m + "-active"), _.show(), (b = !0), f.scrollToRangeStart(), u.show(), w()), d.onOpen && d.onOpen(), l._trigger("open", e, { instance: l });
                }
                function W(e) {
                    b && (u.hide(), _.hide(), g.getElement().removeClass(m + "-active"), (b = !1)), d.onClose && d.onClose(), l._trigger("close", e, { instance: l });
                }
                function P(e) {
                    b ? (W(e), S()) : T(e);
                }
                return (
                    "ar" == GN_lang
                        ? ((e.datepicker.regional.ar = {
                              monthNames: [
                                  GN_calendar_settings.eb_calendar_january,
                                  GN_calendar_settings.eb_calendar_february,
                                  GN_calendar_settings.eb_calendar_march,
                                  GN_calendar_settings.eb_calendar_april,
                                  GN_calendar_settings.eb_calendar_may,
                                  GN_calendar_settings.eb_calendar_june,
                                  GN_calendar_settings.eb_calendar_july,
                                  GN_calendar_settings.eb_calendar_august,
                                  GN_calendar_settings.eb_calendar_september,
                                  GN_calendar_settings.eb_calendar_october,
                                  GN_calendar_settings.eb_calendar_november,
                                  GN_calendar_settings.eb_calendar_december,
                              ],
                              monthNamesShort: [
                                  GN_calendar_settings.eb_calendar_january,
                                  GN_calendar_settings.eb_calendar_february,
                                  GN_calendar_settings.eb_calendar_march,
                                  GN_calendar_settings.eb_calendar_april,
                                  GN_calendar_settings.eb_calendar_may,
                                  GN_calendar_settings.eb_calendar_june,
                                  GN_calendar_settings.eb_calendar_july,
                                  GN_calendar_settings.eb_calendar_august,
                                  GN_calendar_settings.eb_calendar_september,
                                  GN_calendar_settings.eb_calendar_october,
                                  GN_calendar_settings.eb_calendar_november,
                                  GN_calendar_settings.eb_calendar_december,
                              ],
                              dayNames: [
                                  GN_calendar_settings.eb_calendar_sunday,
                                  GN_calendar_settings.eb_calendar_monday,
                                  GN_calendar_settings.eb_calendar_tuesday,
                                  GN_calendar_settings.eb_calendar_wednesday,
                                  GN_calendar_settings.eb_calendar_thursday,
                                  GN_calendar_settings.eb_calendar_friday,
                                  GN_calendar_settings.eb_calendar_saturday,
                              ],
                              dayNamesShort: [
                                  GN_calendar_settings.eb_calendar_sunday,
                                  GN_calendar_settings.eb_calendar_monday,
                                  GN_calendar_settings.eb_calendar_tuesday,
                                  GN_calendar_settings.eb_calendar_wednesday,
                                  GN_calendar_settings.eb_calendar_thursday,
                                  GN_calendar_settings.eb_calendar_friday,
                                  GN_calendar_settings.eb_calendar_saturday,
                              ],
                              dayNamesMin: [
                                  GN_calendar_settings.eb_calendar_sunday,
                                  GN_calendar_settings.eb_calendar_monday,
                                  GN_calendar_settings.eb_calendar_tuesday,
                                  GN_calendar_settings.eb_calendar_wednesday,
                                  GN_calendar_settings.eb_calendar_thursday,
                                  GN_calendar_settings.eb_calendar_friday,
                                  GN_calendar_settings.eb_calendar_saturday,
                              ],
                              weekHeader: "W",
                              dateFormat: GN_calendar_settings.booking_date_format,
                              firstDay: 0,
                              isRTL: !0,
                              yearSuffix: "",
                          }),
                          e.datepicker.setDefaults(e.datepicker.regional.ar))
                        : ((e.datepicker.regional.en = {
                              dateFormat: GN_calendar_settings.booking_date_format,
                              dayNamesMin: [
                                  GN_calendar_settings.eb_calendar_sunday,
                                  GN_calendar_settings.eb_calendar_monday,
                                  GN_calendar_settings.eb_calendar_tuesday,
                                  GN_calendar_settings.eb_calendar_wednesday,
                                  GN_calendar_settings.eb_calendar_thursday,
                                  GN_calendar_settings.eb_calendar_friday,
                                  GN_calendar_settings.eb_calendar_saturday,
                              ],
                              yearSuffix: "",
                          }),
                          e.datepicker.setDefaults(e.datepicker.regional.en),
                          console.log(e.datepicker)),
                    (g = (function (t, n, a) {
                        var r, i;
                        function c(e) {
                            r.button("option", "label", e);
                        }
                        return (
                            (i = "drp_autogen" + o++),
                            e('label[for="' + t.attr("id") + '"]').attr("for", i),
                            (r = e('<button type="button"></button>')
                                .addClass(n + "-triggerbutton")
                                .attr({ title: t.attr("title"), tabindex: t.attr("tabindex"), id: i })
                                .button({ icons: { secondary: a.icon }, icon: a.icon, iconPosition: "end", label: a.initialText })),
                            {
                                getElement: function () {
                                    return r;
                                },
                                getLabel: function () {
                                    return r.button("option", "label");
                                },
                                setLabel: c,
                                reset: function () {
                                    t.val("").change(), c(a.initialText);
                                },
                                enforceOptions: function () {
                                    r.button("option", { icons: { secondary: a.icon }, icon: a.icon, iconPosition: "end", label: a.initialText });
                                },
                            }
                        );
                    })(n, m, d)),
                    (p = s(m, d, R)),
                    (f = (function (t, n) {
                        var o,
                            s = { start: null, end: null };
                        function l(t, o) {
                            var l = n.datepickerOptions.dateFormat || e.datepicker._defaults.dateFormat,
                                d = e.datepicker.parseDate(l, t);
                            !s.start || s.end ? ((s.start = d), (s.end = null)) : d < s.start ? ((s.end = s.start), (s.start = d)) : (s.end = d),
                                null != s.start &&
                                    ((checkInDate = s.start),
                                    (checkOutDate = s.end),
                                    null != s.end
                                        ? ((totalNights = (function (e, t) {
                                              var n = e,
                                                  a = t;
                                              if (n == a) return 0;
                                              var r = moment(n).format("YYYY-MM-DD"),
                                                  i = moment(a).format("YYYY-MM-DD"),
                                                  c = moment(r, "YYYY-MM-DD"),
                                                  o = moment(i, "YYYY-MM-DD");
                                              return (booking_nights_number = moment.duration(o.diff(c)).asDays()), booking_nights_number;
                                          })(checkInDate, checkOutDate)),
                                          totalNights > 1
                                              ? ((textInOutInput = "<b>" + totalNights + " " + a + "</b>"),
                                                (textInOutInput += "<span>"),
                                                (textInOutInput += r + " " + dayOfWeekAsString(checkInDate.getDay()) + " " + checkInDate.getDate() + " " + monthOfAsString(checkInDate.getMonth())),
                                                (textInOutInput += " " + i + " " + dayOfWeekAsString(checkOutDate.getDay()) + " " + checkOutDate.getDate() + " " + monthOfAsString(checkOutDate.getMonth())),
                                                (textInOutInput += "</span>"),
                                                (textInOutInputHint = r + " " + dayOfWeekAsString(checkInDate.getDay()) + " " + checkInDate.getDate() + " " + monthOfAsString(checkInDate.getMonth())),
                                                (textInOutInputHint += " " + i + " " + dayOfWeekAsString(checkOutDate.getDay()) + " " + checkOutDate.getDate() + " " + monthOfAsString(checkOutDate.getMonth())))
                                              : ((textInOutInput = "<b>" + c + "</b><span>" + dayOfWeekAsString(checkInDate.getDay()) + " " + checkInDate.getDate() + " " + monthOfAsString(checkInDate.getMonth()) + "</span>"),
                                                (textInOutInputHint = dayOfWeekAsString(checkInDate.getDay()) + " " + checkInDate.getDate() + " " + monthOfAsString(checkInDate.getMonth()))),
                                          e(".multiNightsInfo").html(textInOutInput),
                                          e(".checkInGroup .hintCheckIn").html(textInOutInputHint),
                                          (checkInInput = moment(checkInDate).format("YYYY-MM-DD")),
                                          (checkOutInput = moment(checkOutDate).format("YYYY-MM-DD")),
                                          e(".checkInValue").val(checkInInput),
                                          e(".checkOutValue").val(checkOutInput))
                                        : ((checkInInput = moment(checkInDate).format("YYYY-MM-DD")),
                                          (checkOutInput = moment(checkInDate).add(1, "days").format("YYYY-MM-DD")),
                                          e(".checkInValue").val(checkInInput),
                                          e(".checkOutValue").val(checkOutInput),
                                          (textInOutInputHint = dayOfWeekAsString(checkInDate.getDay()) + " " + checkInDate.getDate() + " " + monthOfAsString(checkInDate.getMonth())),
                                          (textInOutInput = "<b>" + c + "</b>" + dayOfWeekAsString(checkInDate.getDay()) + " " + checkInDate.getDate() + " " + monthOfAsString(checkInDate.getMonth())),
                                          e(".multiNightsInfo").html(textInOutInput),
                                          e(".checkInGroup .hintCheckIn").html(textInOutInputHint))),
                                n.datepickerOptions.hasOwnProperty("onSelect") && n.datepickerOptions.onSelect(t, o);
                        }
                        function d(e) {
                            var t = [!0, null != s.start && (+e == +s.start || (s.end && s.start <= e && e <= s.end)) ? "ui-state-highlight" : ""],
                                a = [!0, "", ""];
                            return n.datepickerOptions.hasOwnProperty("beforeShowDay") && (a = n.datepickerOptions.beforeShowDay(e)), [t[0] && a[0], t[1] + " " + a[1], a[2]];
                        }
                        function u() {
                            o.datepicker("refresh"), o.datepicker("setDate", null);
                        }
                        return (
                            (textInOutInput = ""),
                            (textInOutInputHint = ""),
                            (o = e("<div></div>", { class: t + "-calendar ui-widget-content" })).datepicker(e.extend({}, n.datepickerOptions, { beforeShowDay: d, onSelect: l })),
                            (function e() {
                                setTimeout(function () {
                                    u(), e();
                                }, moment().endOf("day") - moment());
                            })(),
                            {
                                getElement: function () {
                                    return o;
                                },
                                scrollToRangeStart: function () {
                                    s.start && o.datepicker("setDate", s.start);
                                },
                                getRange: function () {
                                    return s;
                                },
                                setRange: function (e) {
                                    (s = e), u();
                                },
                                refresh: u,
                                reset: function () {
                                    (s = { start: null, end: null }), u();
                                },
                                enforceOptions: function () {
                                    o.datepicker("option", e.extend({}, n.datepickerOptions, { beforeShowDay: d, onSelect: l }));
                                },
                            }
                        );
                    })(m, d)),
                    (G.numberOfMonths = d.datepickerOptions.numberOfMonths),
                    G.numberOfMonths instanceof Array && (d.autoFitCalendars = !1),
                    (h = (function (t, n, a) {
                        var r, i, c, o;
                        return (
                            (r = e("<div></div>").addClass(t + "-buttonpanel")),
                            n.applyButtonText && ((i = e('<button type="button" class="ui-priority-primary applyMultiDate"></button>').text(n.applyButtonText).button()), r.append(i)),
                            n.clearButtonText && ((c = e('<button type="button" class="ui-priority-secondary clearMultiDate"></button>').text(n.clearButtonText).button()), r.append(c)),
                            n.cancelButtonText && ((o = e('<button type="button" class="ui-priority-secondary cancelMultiDate"></button>').html(n.cancelButtonText).button()), r.append(o)),
                            a && (i && i.click(a.onApply), c && c.click(a.onClear), o && o.click(a.onCancel)),
                            {
                                getElement: function () {
                                    return r;
                                },
                                enforceOptions: function () {
                                    i && i.button("option", "label", n.applyButtonText), c && c.button("option", "label", n.clearButtonText), o && o.button("option", "label", n.cancelButtonText);
                                },
                            }
                        );
                    })(m, d, {
                        onApply: function (e) {
                            W(e), M(null, e);
                        },
                        onClear: function (e) {
                            Y(e);
                        },
                        onCancel: function (e) {
                            l._trigger("cancel", e, { instance: l }), W(e), S();
                        },
                    })),
                    (u = e("<div></div>", { class: m + " " + m + "-" + I[N] + " ui-widget ui-widget-content ui-corner-all ui-front" })
                        .append(
                            e("<div></div>", { class: m + "-main ui-widget-content" })
                                .append(p.getElement())
                                .append(f.getElement())
                        )
                        .append(e('<div class="ui-helper-clearfix"></div>').append("<div class='multiNightsInfo'></div>").append(h.getElement()))
                        .hide()),
                    n.hide().after(g.getElement()),
                    (_ = e("<div></div>", { class: "ui-front " + m + "-mask" }).hide()),
                    e("body").append(_).append(u),
                    G(),
                    S(),
                    g.getElement().click(P),
                    g.getElement().keydown(A),
                    _.click(function (e) {
                        W(e), S();
                    }),
                    e(t).resize(function () {
                        b ? G() : !0;
                    }),
                    {
                        toggle: P,
                        destroy: function () {
                            u.remove(), g.getElement().remove(), n.show();
                        },
                        open: T,
                        close: W,
                        setRange: M,
                        getRange: C,
                        clearRange: Y,
                        reset: S,
                        enforceOptions: function () {
                            var e = p;
                            (p = s(m, d, R)), e.getElement().replaceWith(p.getElement()), f.enforceOptions(), h.enforceOptions(), g.enforceOptions();
                            var t = C();
                            t && g.setLabel(x(t));
                        },
                        getContainer: function () {
                            return u;
                        },
                    }
                );
            })(this.element, this, this.options);
        },
        _destroy: function () {
            this._dateRangePicker.destroy();
        },
        _setOptions: function (e) {
            this._super(e), this._dateRangePicker.enforceOptions();
        },
        open: function () {
            this._dateRangePicker.open();
        },
        close: function () {
            this._dateRangePicker.close();
        },
        setRange: function (e) {
            this._dateRangePicker.setRange(e);
        },
        getRange: function () {
            return this._dateRangePicker.getRange();
        },
        clearRange: function () {
            this._dateRangePicker.clearRange();
        },
        widget: function () {
            return this._dateRangePicker.getContainer();
        },
    });
})(jQuery, window);
