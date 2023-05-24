/* © InvestisDigital, All rights reserved, v2.0.0 */
var CookieConsent = function CookieConsent(_ref) {
    var _this = this,
        title = _ref.title,
        description = _ref.description,
        acceptAllBtnText = _ref.acceptAllBtnText,
        saveBtnText = _ref.saveBtnText,
        categoriesTitle = _ref.categoriesTitle,
        _ref$excludePages = _ref.excludePages,
        excludePages = void 0 !== _ref$excludePages && _ref$excludePages,
        cookieCategory = _ref.categories,
        cookieName = _ref.cookieName,
        _ref$expiry = _ref.expiry,
        expiry = void 0 === _ref$expiry ? 90 : _ref$expiry,
        _ref$modalClassName = _ref.modalClassName,
        modalClassName = void 0 === _ref$modalClassName ? "ccModal" : _ref$modalClassName,
        _ref$beforeInit = _ref.beforeInit,
        beforeInit = void 0 === _ref$beforeInit ? function() {} : _ref$beforeInit,
        _ref$onPreferenceChan = _ref.onPreferenceChange,
        onPreferenceChange = void 0 === _ref$onPreferenceChan ? function() {} : _ref$onPreferenceChan,
        cookieSettingBtnText = _ref.cookieSettingBtnText,
        noticeText = _ref.noticeText,
        noticeButtonText = _ref.noticeButtonText,
        _ref$legacyCookieName = _ref.legacyCookieName,
        legacyCookieName = void 0 === _ref$legacyCookieName ? "" : _ref$legacyCookieName,
        _ref$debug = _ref.debug,
        debug = void 0 !== _ref$debug && _ref$debug,
        disableOptionalBtnText = _ref.disableOptionalBtnText,
        _ref$consentRecord = _ref.consentRecord,
        consentRecord = void 0 === _ref$consentRecord || _ref$consentRecord;
    this.categories = {}, this.version = function() {
        return "2.0.0"
    };
    var euCheck = !1,
        getCookies = function() {
            var e = document.cookie.split(";"),
                n = [],
                i = new RegExp("^\\s*([^=]+)\\s*=\\s*(.*?)$");
            return e.forEach(function(e, o) {
                var t = e,
                    c = i.exec(t);
                null !== c && n.push({
                    name: c[1],
                    value: c[2]
                })
            }), debug && console.log("cookie values are: ".concat(JSON.stringify(n))), n
        },
        getCookie = function(e) {
            for (var o = getCookies(), t = 0; t < o.length; t++)
                if (o[t].name === e) return o[t];
            return null
        },
        deleteCookie = function(e, o, t) {
            var c = "".concat(e, "=; Max-Age=-99999999;").concat(void 0 !== o ? " path=".concat(o, ";") : " path=/;");
            void 0 === t ? (document.cookie = c, document.cookie = "".concat(c, " domain=.").concat(location.hostname, ";"), document.cookie = "".concat(c, " domain=.").concat(location.hostname.split(".").slice(-2).join("."), ";")) : document.cookie = "".concat(c, " domain=").concat(t, ";")
        },
        setCookie = function(e, o, t) {
            debug && console.log("SetCookie Called");
            var c = "";
            if (t) {
                var n = new Date;
                n.setTime(n.getTime() + 24 * t * 60 * 60 * 1e3), c = "; expires=" + n.toUTCString()
            }
            document.cookie = e + "=" + (o || "") + c + "; path=/"
        },
        consentRecorder = function(e) {
            var o = new XMLHttpRequest;
            o.onreadystatechange = function() {
                if (4 === this.readyState && 200 === this.status) return o.responseText
            }, o.open("POST", "https://cookiemanager.investisdigital.com", !0), o.onload = function(e) {
                setUniqueID(JSON.parse(e.srcElement.response).id)
            }, o.setRequestHeader("Content-type", "application/json"), o.send(JSON.stringify({
                operation: e,
                consent: JSON.parse(getCookie(cookieName).value).consent,
                id: getUniqueId(),
                expiry: new Date(Date.now() + 24 * expiry * 60 * 60 * 1e3)
            }))
        },
        isCCEnabled = function() {
            return null == getCookie(cookieName) ? (debug && console.log("isCCEnabled() is ".concat(euCheck)), euCheck) : (debug && console.log("isCCEnabled() is true"), !0)
        },
        isCNAccepted = function() {
            return null !== getCookie(cookieName) ? (debug && console.log("isCNAccepted(): ", JSON.parse(getCookie(cookieName).value).accepted), JSON.parse(getCookie(cookieName).value).accepted) : (debug && console.log("isCNAccepted(): ", !1), !1)
        },
        setUniqueID = function(e) {
            var o = JSON.parse(getCookie(cookieName).value);
            o.id = e, storeCookieValue(o)
        },
        getUniqueId = function() {
            return null !== getCookie(cookieName) ? JSON.parse(getCookie(cookieName).value).id : ""
        },
        storeCookieValue = function(e) {
            e.euCheck = euCheck, debug && console.log("value: ".concat(JSON.stringify(e), " ")), setCookie(cookieName, JSON.stringify(e), expiry)
        };
    "" !== legacyCookieName && (debug && console.log("Deleting legacy cookie: ", legacyCookieName), deleteCookie(legacyCookieName));
    var userCookiePopupClose = function() {
        debug && console.log("Binding User click on background"), null !== getCookie(cookieName) ? (document.querySelector("#__cookieWrapper .ccBg").addEventListener("click", function() {
            document.querySelector("#__cookieWrapper .cookieModal").outerHTML = "", euCheck || cookiePresent()
        }, !1), document.onkeydown = function(e) {
            ("key" in (e = e || window.event) ? "Escape" === e.key || "Esc" === e.key : 27 === e.keyCode) && (document.querySelector("#__cookieWrapper .cookieModal").outerHTML = "", euCheck || cookiePresent())
        }) : debug && console.log("User Click Not binned as Cookie Consent is not yet accepted even once.")
    };
    this.show = function() {
        document.querySelector("#__cookieWrapper").innerHTML = "", detailsBox()
    }, beforeInit();
    var init = function() {
            var e = "__cookieWrapper",
                o = !1;
            if (isCCEnabled()) {
                var t = window.location.pathname + window.location.search;
                excludePages && excludePages.forEach(function(e) {
                    -1 < t.indexOf(e) && (debug && console.log("exclude page"), o = !0)
                }), execute()
            } else execute(!0);
            var c = document.createElement("div");
            c.id = e, c.className = e, c.innerHTML = "", document.querySelector("body").prepend(c), o || (null == getCookie(cookieName) ? detailsBox() : cookiePresent(!o))
        },
        cookiePresent = function() {
            euCheck || isCNAccepted() || (debug && console.log("Cookie Present"), document.getElementById("__cookieWrapper").innerHTML += '<div class="__cookieNotice"><div class="__cookieNoticeBody"><p>' + noticeText + '</p><button name="cookieAgree" id="cc-cookieAgree" class="cookieAgree ccBtn" type="button">' + noticeButtonText + '</button><button id="cc-openBoxBtn" class="ccBtn ccBtnOpenBox" type="button">' + cookieSettingBtnText + "</button></div></div>")
        },
        detailsBox = function(e) {
            var o = '<button id="cc-acceptAll-btn" class="ccBtn ccBtnAcceptAll" type="button">' + acceptAllBtnText + '</button><button id="cc-reject-Btn" class="ccBtn ccBtnReject" type="button">' + disableOptionalBtnText + "</button>",
                t = '<button class="ccBtn ccBtnSave" type="button">' + saveBtnText + "</button>",
                c = document.querySelector("#__cookieWrapper");
            c.innerHTML += '<div class="cookieModal"><div class="ccBg"></div><div class="' + modalClassName + '"></div></div>', (c = document.createElement("div")).className = "ccHeader", c.innerHTML = '<p class="title">' + title + "</p>", document.getElementsByClassName(modalClassName)[0].append(c), (c = document.createElement("div")).className = "ccDescription", "" !== description && (c.innerHTML = "<p>" + description + "</p>"), document.getElementsByClassName(modalClassName)[0].append(c), (c = document.createElement("div")).className = "ccFooter", c.innerHTML = o, document.getElementsByClassName(modalClassName)[0].append(c);
            var n = "",
                i = !(_this.categories = {});
            null !== getCookie(cookieName) && (i = !0, _this.categories = JSON.parse(getCookie(cookieName).value).consent), cookieCategory.forEach(function(e) {
                if (!i) {
                    var o = !1;
                    o = !!e.required || e.defaultState, _this.categories[e.name] = o
                }
                n += appItem(e)
            }), (c = document.createElement("div")).className = "ccBodyTitle", c.innerHTML = '<p class="title">' + categoriesTitle + "</p>", document.getElementsByClassName(modalClassName)[0].append(c), (c = document.createElement("div")).className = "ccBody", document.getElementsByClassName(modalClassName)[0].append(c), (c = document.createElement("div")).className = "ccCategories", c.innerHTML = n, document.querySelector(".ccBody").append(c), (c = document.createElement("div")).className = "ccBodyFooter", c.innerHTML = t, document.getElementsByClassName(modalClassName)[0].append(c), document.querySelector("#__cookieWrapper .ccBtnSave").addEventListener("click", function() {
                cookieCategory.forEach(function(e) {
                    null !== document.querySelector("#app-item-" + e.name) && (_this.categories[e.name] = document.querySelector("#app-item-" + e.name).checked)
                }), storeCookieValue({
                    consent: _this.categories,
                    accepted: e || isCNAccepted(),
                    id: getUniqueId()
                }), consentRecord && consentRecorder("Custom Preference"), execute(), document.querySelector("#__cookieWrapper .cookieModal").outerHTML = ""
            }, !1);
            for (var a = document.getElementsByClassName("appTitleClick"), r = 0; r < a.length; r++) a[r].onclick = function() {
                this.classList.toggle("is-open");
                var e = this.parentElement.nextElementSibling;
                "block" !== e.style.display ? e.style.display = "block" : e.style.display = "none"
            };
            userCookiePopupClose()
        },
        appItem = function(e) {
            var o = '<div class="ccApp"><div class="appTitle" id="app-item-' + e.name + '-title"><p class="ccAppTitle leftPart">' + e.title + '</p><div class="rightPart">';
            if (e.required) o += '<span class="ccRequired">' + e.requiredText + "</span></div></div>";
            else {
                var t = !0 === _this.categories[e.name] ? "checked" : "";
                o += '<input id="app-item-' + e.name + '"' + t + ' class="ccAppInput" aria-describedBy="app-item-' + e.name + '-description" type="checkbox"><label for="app-item-' + e.name + '" class="ccApp-label"><span class="switch"><div class="slider round active"></div></span></label></div></div>'
            }
            return o += '<div class="appDescription" id="app-item-' + e.name + '-description"><p class="ccAppDescription" >' + e.description + "</p></div></div>"
        },
        execute = function execute(acceptAll, tobeAccepted) {
            debug && console.log("acceptAll: ", acceptAll), void 0 !== acceptAll ? (cookieCategory.forEach(function(e) {
                _this.categories[e.name] = !!acceptAll || !!e.required
            }), storeCookieValue({
                consent: _this.categories,
                accepted: tobeAccepted || isCNAccepted(),
                id: getUniqueId()
            })) : null !== getCookie(cookieName) ? _this.categories = JSON.parse(getCookie(cookieName).value).consent : cookieCategory.forEach(function(e) {
                var o = !1;
                o = !!e.required || e.defaultState, _this.categories[e.name] = o
            });
            var objectCount = -1;
            for (var key in _this.categories) objectCount++, _this.categories[key] ? document.querySelectorAll("script[data-name=" + key + "]").forEach(function(i) {
                if (!i.hasAttribute("data-processed")) {
                    if ("" !== i.innerHTML.trim() && eval(i.innerHTML), "" !== i.src) {
                        var script = document.createElement("script");
                        script.type = "text/javascript", script.src = i.src, i.insertAdjacentElement("afterend", script)
                    }
                    i.setAttribute("data-processed", "true")
                }
            }) : (document.querySelectorAll("script[data-name=" + key + "]").forEach(function(e) {
                e.removeAttribute("data-processed")
            }), cookieCategory[objectCount].cookieList && cookieCategory[objectCount].cookieList.forEach(function(e) {
                deleteCookie(e)
            }));
            setTimeout(function() {
                onPreferenceChange()
            }, 500)
        };
    if (null === getCookie(cookieName)) {
        var xhr = new XMLHttpRequest;
        xhr.onreadystatechange = function() {
            4 === this.readyState && 200 === this.status && (euCheck = JSON.parse(xhr.responseText).__CCEUUser, init())
        }, xhr.open("GET", "https://geoid.investisdigital.com/", !0), xhr.send(null)
    } else euCheck = JSON.parse(getCookie(cookieName).value).euCheck, debug && console.log("euCheck: ".concat(euCheck)), init();
    document.addEventListener("click", function(e) {
        for (var o = e.target; o && o !== this; o = o.parentNode) {
            if ("cc-CookieSetting" === o.id) {
                e.preventDefault(), debug && console.log("cc-CookieSetting is clicked"), window.CookieConsent.show();
                break
            }
            if ("cc-openBoxBtn" === o.id) {
                debug && console.log("btnDetailsBox clicked"), document.querySelector("#__cookieWrapper .__cookieNotice").outerHTML = "", detailsBox(!euCheck);
                break
            }
            if ("cc-acceptAll-btn" === o.id) {
                execute(!0, !euCheck), consentRecord && consentRecorder("AcceptAll"), document.querySelector("#__cookieWrapper .cookieModal").outerHTML = "";
                break
            }
            if ("cc-reject-Btn" === o.id) {
                execute(!1, !euCheck), consentRecord && consentRecorder("DisableAll"), document.querySelector("#__cookieWrapper .cookieModal").outerHTML = "";
                break
            }
            if ("cc-cookieAgree" === o.id) {
                document.querySelector("#__cookieWrapper .__cookieNotice").outerHTML = "";
                var t = JSON.parse(getCookie(cookieName).value).consent;
                storeCookieValue({
                    consent: t,
                    accepted: !0,
                    id: getUniqueId()
                }), consentRecord && consentRecorder("Consent Accepted");
                break
            }
        }
    }, !1)
};
"undefined" != typeof NodeList && NodeList.prototype && !NodeList.prototype.forEach && (NodeList.prototype.forEach = Array.prototype.forEach), [Element.prototype, Document.prototype, DocumentFragment.prototype].forEach(function(e) {
    e.hasOwnProperty("append") || Object.defineProperty(e, "append", {
        configurable: !0,
        enumerable: !0,
        writable: !0,
        value: function() {
            var e = Array.prototype.slice.call(arguments),
                t = document.createDocumentFragment();
            e.forEach(function(e) {
                var o = e instanceof Node;
                t.appendChild(o ? e : document.createTextNode(String(e)))
            }), this.appendChild(t)
        }
    })
}), [Element.prototype, Document.prototype, DocumentFragment.prototype].forEach(function(e) {
    e.hasOwnProperty("prepend") || Object.defineProperty(e, "prepend", {
        configurable: !0,
        enumerable: !0,
        writable: !0,
        value: function() {
            var e = Array.prototype.slice.call(arguments),
                t = document.createDocumentFragment();
            e.forEach(function(e) {
                var o = e instanceof Node;
                t.appendChild(o ? e : document.createTextNode(String(e)))
            }), this.insertBefore(t, this.firstChild)
        }
    })
});