!function(e) {
}(jQuery),
function(e) {
    e(document).ready(function() {
        function t(t) {
            e(t).on({
                mouseenter: function() {
                    var a = e(t).attr("class");
                    a += " hoverz",
                    e(t).attr("class", a)
                },
                mouseleave: function() {
                    var a = e(t).attr("class");
                    a = a.replace("hoverz", ""),
                    e(t).attr("class", a)
                }
            })
        }
        jQuery.scrollSpeed(100, 800),
        e("#block-views-slider-view-block .view-content").owlCarousel({
            loop: !0,
            margin: 0,
            nav: !0,
            items: 1
        }),
        e(".land").on("click", function() {
            var t = e(this).attr("id");
            e("#block-views-territorial-view-block").find("path").each(function() {
                var t = e(this)
                  , a = t.attr("class");
                if (-1 != a.indexOf("hhover")) {
                    var i = a.replace("hhover", "");
                    t.attr("class", i)
                }
            }),
            -1 != e(this).attr("class").indexOf("vadiy") && e("#block-views-territorial-view-block").find("path").each(function() {
                var t = e(this)
                  , a = t.attr("class");
                if (-1 != a.indexOf("vadiy")) {
                    var i = a + " hhover";
                    t.attr("class", i)
                }
            }),
            -1 != e(this).attr("class").indexOf("tash") && e("#block-views-territorial-view-block").find("path").each(function() {
                var t = e(this)
                  , a = t.attr("class");
                if (-1 != a.indexOf("tash")) {
                    var i = a + " hhover";
                    t.attr("class", i)
                }
            }),
            -1 != e(this).attr("class").indexOf("sam") && e("#block-views-territorial-view-block").find("path").each(function() {
                var t = e(this)
                  , a = t.attr("class");
                if (-1 != a.indexOf("sam")) {
                    var i = a + " hhover";
                    t.attr("class", i)
                }
            });
            var a = e(this).attr("class");
            if (-1 == a.indexOf("sam") && -1 == a.indexOf("tash") && -1 == a.indexOf("sam")) {
                var i = e(this).attr("class")
                  , n = i + " hhover";
                e(this).attr("class", n)
            }
            e(".view-territorial-view .views-row").each(function() {
                e(this).find(".nid").text() == t && (e(".view-territorial-view .views-row").hide(),
                e(this).fadeIn())
            })
        }),
        e(".toolb_second").each(function() {
            e(this).appendTo("#block-block-6 .content").wrap('<div class="links">')
        }),
        e("#style_select").appendTo("#block-block-6 .content").wrap('<div class="links">'),
        t(".tash"),
        t(".vadiy"),
        t(".sam")
    })
}(jQuery),
jQuery(function() {
    function e() {
        var e = "ny2012.swf";
        e = e + "?nc=" + (new Date).getTime(),
        swfobject.embedSWF(e, "z-audio__player", "1", "1", "9.0.0", null, {}, {
            allowScriptAccess: "always",
            hasPriority: "true"
        })
    }
    function t(e) {
        return jQuery.browser.msie ? window[e] : document[e]
    }
    function a(e) {
        e.className.indexOf("b-ball__right") > -1 && (e = e.parentNode);
        var t = /b-ball_n(\d+)/.exec(e.className)
          , a = /b-head-decor__inner_n(\d+)/.exec(e.parentNode.className);
        t && a && (t = parseInt(t[1], 10) - 1,
        a = parseInt(a[1], 10) - 1,
        n((t + 9 * a) % r))
    }
    function i(e) {
        function t() {
            function e() {
                function e() {
                    function e() {
                        a.removeClass("bounce3")
                    }
                    a.removeClass("bounce2").addClass("bounce3"),
                    setTimeout(e, 300)
                }
                a.removeClass("bounce1").addClass("bounce2"),
                setTimeout(e, 300)
            }
            a.removeClass("bounce").addClass("bounce1"),
            setTimeout(e, 300)
        }
        var a = jQuery(e);
        e.className.indexOf(" bounce") > -1 || (a.addClass("bounce"),
        setTimeout(t, 300))
    }
    var n = function() {};
    jQuery(document).delegate(".b-ball_bounce", "mouseenter", function() {
        a(this),
        i(this)
    }).delegate(".b-ball_bounce .b-ball__right", "mouseenter", function(e) {
        e.stopPropagation(),
        a(this),
        i(this)
    }),
    window.flashInited = function() {
        n = function(e) {
            try {
                t("z-audio__player").playSound(e)
            } catch (e) {}
        }
    }
    ,
    window.swfobject && window.setTimeout(function() {
        jQuery("body").append('<div class="g-invisible"><div id="z-audio__player"></div></div>'),
        e()
    }, 100);
    for (var o = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "-", "=", "q", "w", "e", "r", "t", "y", "u", "i", "o", "p", "[", "]", "a", "s", "d", "f", "g", "h", "j", "k", "l", ";", "'", "\\"], s = ["z", "x", "c", "v", "b", "n", "m", ",", ".", "/"], r = 36, c = {}, l = 0, d = o.length; l < d; l++)
        c[o[l].charCodeAt(0)] = l;
    for (var l = 0, d = s.length; l < d; l++)
        c[s[l].charCodeAt(0)] = l;
    jQuery(document).keypress(function(e) {
        !jQuery(e.target).is("input") && e.which in c && n(c[e.which])
    })
});
