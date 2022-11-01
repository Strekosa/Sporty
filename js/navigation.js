/*
* jquery-match-height 0.7.2 by @liabru
* http://brm.io/jquery-match-height/
* License MIT
*/
!function (t) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof module && module.exports ? module.exports = t(require("jquery")) : t(jQuery)
}(function (t) {
    var e = -1, o = -1, n = function (t) {
        return parseFloat(t) || 0
    }, a = function (e) {
        var o = 1, a = t(e), i = null, r = [];
        return a.each(function () {
            var e = t(this), a = e.offset().top - n(e.css("margin-top")), s = r.length > 0 ? r[r.length - 1] : null;
            null === s ? r.push(e) : Math.floor(Math.abs(i - a)) <= o ? r[r.length - 1] = s.add(e) : r.push(e), i = a
        }), r
    }, i = function (e) {
        var o = {
            byRow: !0, property: "height", target: null, remove: !1
        };
        return "object" == typeof e ? t.extend(o, e) : ("boolean" == typeof e ? o.byRow = e : "remove" === e && (o.remove = !0), o)
    }, r = t.fn.matchHeight = function (e) {
        var o = i(e);
        if (o.remove) {
            var n = this;
            return this.css(o.property, ""), t.each(r._groups, function (t, e) {
                e.elements = e.elements.not(n)
            }), this
        }
        return this.length <= 1 && !o.target ? this : (r._groups.push({
            elements: this,
            options: o
        }), r._apply(this, o), this)
    };
    r.version = "0.7.2", r._groups = [], r._throttle = 80, r._maintainScroll = !1, r._beforeUpdate = null,
        r._afterUpdate = null, r._rows = a, r._parse = n, r._parseOptions = i, r._apply = function (e, o) {
        var s = i(o), h = t(e), l = [h], c = t(window).scrollTop(), p = t("html").outerHeight(!0),
            u = h.parents().filter(":hidden");
        return u.each(function () {
            var e = t(this);
            e.data("style-cache", e.attr("style"))
        }), u.css("display", "block"), s.byRow && !s.target && (h.each(function () {
            var e = t(this), o = e.css("display");
            "inline-block" !== o && "flex" !== o && "inline-flex" !== o && (o = "block"), e.data("style-cache", e.attr("style")), e.css({
                display: o,
                "padding-top": "0",
                "padding-bottom": "0",
                "margin-top": "0",
                "margin-bottom": "0",
                "border-top-width": "0",
                "border-bottom-width": "0",
                height: "100px",
                overflow: "hidden"
            })
        }), l = a(h), h.each(function () {
            var e = t(this);
            e.attr("style", e.data("style-cache") || "")
        })), t.each(l, function (e, o) {
            var a = t(o), i = 0;
            if (s.target) i = s.target.outerHeight(!1); else {
                if (s.byRow && a.length <= 1) return void a.css(s.property, "");
                a.each(function () {
                    var e = t(this), o = e.attr("style"), n = e.css("display");
                    "inline-block" !== n && "flex" !== n && "inline-flex" !== n && (n = "block");
                    var a = {
                        display: n
                    };
                    a[s.property] = "", e.css(a), e.outerHeight(!1) > i && (i = e.outerHeight(!1)), o ? e.attr("style", o) : e.css("display", "")
                })
            }
            a.each(function () {
                var e = t(this), o = 0;
                s.target && e.is(s.target) || ("border-box" !== e.css("box-sizing") && (o += n(e.css("border-top-width")) + n(e.css("border-bottom-width")), o += n(e.css("padding-top")) + n(e.css("padding-bottom"))), e.css(s.property, i - o + "px"))
            })
        }), u.each(function () {
            var e = t(this);
            e.attr("style", e.data("style-cache") || null)
        }), r._maintainScroll && t(window).scrollTop(c / p * t("html").outerHeight(!0)),
            this
    }, r._applyDataApi = function () {
        var e = {};
        t("[data-match-height], [data-mh]").each(function () {
            var o = t(this), n = o.attr("data-mh") || o.attr("data-match-height");
            n in e ? e[n] = e[n].add(o) : e[n] = o
        }), t.each(e, function () {
            this.matchHeight(!0)
        })
    };
    var s = function (e) {
        r._beforeUpdate && r._beforeUpdate(e, r._groups), t.each(r._groups, function () {
            r._apply(this.elements, this.options)
        }), r._afterUpdate && r._afterUpdate(e, r._groups)
    };
    r._update = function (n, a) {
        if (a && "resize" === a.type) {
            var i = t(window).width();
            if (i === e) return;
            e = i;
        }
        n ? o === -1 && (o = setTimeout(function () {
            s(a), o = -1
        }, r._throttle)) : s(a)
    }, t(r._applyDataApi);
    var h = t.fn.on ? "on" : "bind";
    t(window)[h]("load", function (t) {
        r._update(!1, t)
    }), t(window)[h]("resize orientationchange", function (t) {
        r._update(!0, t)
    })
});

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
    const siteNavigation = document.getElementById('site-navigation');

    // Return early if the navigation doesn't exist.
    if (!siteNavigation) {
        return;
    }

    const button = siteNavigation.getElementsByTagName('button')[0];

    // Return early if the button doesn't exist.
    if ('undefined' === typeof button) {
        return;
    }

    const menu = siteNavigation.getElementsByTagName('ul')[0];

    // Hide menu toggle button if menu is empty and return early.
    if ('undefined' === typeof menu) {
        button.style.display = 'none';
        return;
    }

    if (!menu.classList.contains('nav-menu')) {
        menu.classList.add('nav-menu');
    }

    // // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
    // button.addEventListener('click', function () {
    //     siteNavigation.classList.toggle('toggled');
    //
    //     if (button.getAttribute('aria-expanded') === 'true') {
    //         button.setAttribute('aria-expanded', 'false');
    //     } else {
    //         button.setAttribute('aria-expanded', 'true');
    //     }
    // });
    //
    // // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
    // document.addEventListener('click', function (event) {
    //     const isClickInside = siteNavigation.contains(event.target);
    //
    //     if (!isClickInside) {
    //         siteNavigation.classList.remove('toggled');
    //         button.setAttribute('aria-expanded', 'false');
    //     }
    // });

    // Get all the link elements within the menu.
    const links = menu.getElementsByTagName('a');

    // Get all the link elements with children within the menu.
    const linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

    // // Toggle focus each time a menu link is focused or blurred.
    // for (const link of links) {
    //     link.addEventListener('focus', toggleFocus, true);
    //     link.addEventListener('blur', toggleFocus, true);
    // }
    //
    // // Toggle focus each time a menu link with children receive a touch event.
    // for (const link of linksWithChildren) {
    //     link.addEventListener('touchstart', toggleFocus, false);
    // }

    /**
     * Sets or removes .focus class on an element.
     */
    function toggleFocus() {
        if (event.type === 'focus' || event.type === 'blur') {
            let self = this;
            // Move up through the ancestors of the current link until we hit .nav-menu.
            while (!self.classList.contains('nav-menu')) {
                // On li elements toggle the class .focus.
                if ('li' === self.tagName.toLowerCase()) {
                    self.classList.toggle('focus');
                }
                self = self.parentNode;
            }
        }

        if (event.type === 'touchstart') {
            const menuItem = this.parentNode;
            event.preventDefault();
            for (const link of menuItem.parentNode.children) {
                if (menuItem !== link) {
                    link.classList.remove('focus');
                }
            }
            menuItem.classList.toggle('focus');
        }
    }
}());

//
// document.addEventListener("DOMContentLoaded", function (event) {
//     var menuToggle = document.querySelector('header div.menu');
//     menuToggle.addEventListener('click', function () {
//         menuToggle.classList.toggle('active');
//         document.querySelector('body').classList.toggle('stop-scrolling');
//     });
// });
//
//
// document.addEventListener("DOMContentLoaded", function (event) {
//     var selected = $('.drop-dl .current-lang img').attr('src');
//     $('.lang-chose img').attr('src', selected);
//
//     $('.lang-chose').click(function (event) {
//         $('.drop-dl ul').slideToggle(500);
//         event.preventDefault();
//         return false;
//     });
//
//     $(document).bind('click', function (e) {
//         var $clicked = $(e.target);
//         if (!$clicked.parents().hasClass("drop-dl"))
//             $(".drop-dl ul").hide();
//     });
// });

$(document).ready(function () {
    $('.nav-tgl').click(function (event) {
        $('.nav-tgl,.header-menu').toggleClass('active');
        $('body').toggleClass('lock');
    });


    $('.footer-menu .menu-item-has-children').click(function (event) {
        event.preventDefault();
        if ($(this).hasClass('open')) {
            $(this).removeClass('open').find('.sub-menu').slideUp();
        } else {
            $(this).addClass('open').find('.sub-menu').slideDown();
        }

    });

    //AJAX loadmore

    var loaddata = {
        'action': 'loadmore',
        'page': 2,
        'post_per_page': 7
    };
    if ($(window).width() < 767) {
        loaddata.page = 1;
    }

    $('#loadmore').click(function (e) {
        e.preventDefault();
        let $counter = $(this).data('counter');
        if ($(window).width() < 767) {
            loaddata.post_per_page = 'mobile';
            $(this).hide();
        }
        loaddata.page = loaddata.page + 1;
        console.log(loaddata.page);
        if ($counter < (loaddata.page * loaddata.post_per_page)) {
            $(this).hide();
        }
        $.ajax({
            url: my_ajax_object.ajax_url,
            data: loaddata,
            type: 'POST',
            success: function (data) {

                $('.all-posts').append(data);
            }
        });

    });

    //Accordion

    $('.accordion-list > li > .answer').hide();

    $('.accordion-list > li').click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active").find(".answer").slideUp();
        } else {
            $(".accordion-list > li.active .answer").slideUp();
            $(".accordion-list > li.active").removeClass("active");
            $(this).addClass("active").find(".answer").slideDown();
        }
        return false;
    });


});


