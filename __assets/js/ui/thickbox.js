// Start of additional code created by LBI 30/04/2012
/**
 * @namespace Root namespace for holding all objects created for LBI.
 */
var barclays = window.barclays || {};

/**
 * Created for LBI.
 * Callback function to fire once thickbox has loaded / shown popup content
 */
function privacyContentCallback() {

    // Only call the privacy management function if the ECN exists in the page
    if ($('#TB_window #cookiePermissionsForm')) {
        barclays.privacy.management.contentCallback();
    }

}
/**
 * applyMortgage Callback function to fire once thickbox has loaded / shown popup content
*/
function applyMortgageContentCallback(J) {

    var varObj = [],
        varStr = '';

    for(var key in J) {
        var value = J[key];

        //Do not pass the following
        //preview key objects - c, childpagename, cid, pagename, rendermode
        //popup window key objects - width, inlineId, url, readonlyvalue
        if (key !== 'c' && key !== 'childpagename' && key !== 'cid' && key !== 'pagename' && key !== 'rendermode' && key !== 'width' && key !== 'inlineId' && key !== 'url' && key !== 'readonlyvalue') {
            varObj.push('&'+key+'='+value);
        }
    }

    for (var i = 0, l = varObj.length; i < l; i++ ) {
        varStr += varObj[i]
    }

    if ($('#TB_window #applyMortgageContent')) {
        $('#TB_window #noApplyMortgage').click(tb_remove);
        
        $('#TB_window #yesApplyMortgage').on({
            click: function(event) {
                // prevent default event cross browser
                event.preventDefault ? event.preventDefault() : event.returnValue = false;
                window.open(J.url+'?readonlyvalue='+J.readonlyvalue+varStr,'_blank');
                tb_remove();
            }     
        });
    }

}
// End of additional code created by LBI 30/04/2012

// Additional inline LBI code is commented separately below this point

var tb_pathToImage = "/images/loadingAnimation.gif";
/*!!!!!!!!!!!!!! edit below this line at your own risk !!!!!!!!!!!!!!!!!!!!!!!*/
$(document).ready(function () {
    tb_init("a.thickbox, area.thickbox, input.thickbox");
    imgLoader = new Image();
    imgLoader.src = tb_pathToImage
});

function tb_init(A) {
    $(A).click(function () {
        var D = this.title || this.name || null;
        var C = this.href || this.alt;
        var B = this.rel || false;
        tb_show(D, C, B);
        this.blur();
        return false
    })
}
function tb_show(E, H, C) {
    try {
        if (typeof document.body.style.maxHeight === "undefined") {
            $("body", "html").css({
                height: "100%",
                width: "100%"
            });
            $("html").css("overflow", "hidden");
            if (document.getElementById("TB_HideSelect") === null) {
                $("body").append("<iframe id='TB_HideSelect'></iframe><div id='TB_overlay'></div><div id='TB_window'></div>");
                $("#TB_overlay").click(tb_remove)
            }
        } else {
            if (document.getElementById("TB_overlay") === null) {
                $("body").append("<div id='TB_overlay'></div><div id='TB_window'></div>");
                $("#TB_overlay").click(tb_remove)
            }
        }
        if (tb_detectMacXFF()) {
            $("#TB_overlay").addClass("TB_overlayMacFFBGHack")
        } else {
            $("#TB_overlay").addClass("TB_overlayBG")
        }
        if (E === null) {
            E = ""
        }
        $("body").append("<div id='TB_load'><img src='" + imgLoader.src + "' /></div>");
        $("#TB_load").show();
        var I;
        if (H.indexOf("?") !== -1) {
            I = H.substr(0, H.indexOf("?"))
        } else {
            I = H
        }
        var A = /\.jpg$|\.jpeg$|\.png$|\.gif$|\.bmp$/;
        var F = I.toLowerCase().match(A);
        if (F == ".jpg" || F == ".jpeg" || F == ".png" || F == ".gif" || F == ".bmp") {
            TB_PrevCaption = "";
            TB_PrevURL = "";
            TB_PrevHTML = "";
            TB_NextCaption = "";
            TB_NextURL = "";
            TB_NextHTML = "";
            TB_imageCount = "";
            TB_FoundURL = false;
            if (C) {
                TB_TempArray = $("a[rel=" + C + "]").get();
                for (TB_Counter = 0;
                ((TB_Counter < TB_TempArray.length) && (TB_NextHTML === ""));
                TB_Counter++) {
                    var B = TB_TempArray[TB_Counter].href.toLowerCase().match(A);
                    if (!(TB_TempArray[TB_Counter].href == H)) {
                        if (TB_FoundURL) {
                            TB_NextCaption = TB_TempArray[TB_Counter].title;
                            TB_NextURL = TB_TempArray[TB_Counter].href;
                            TB_NextHTML = "<span id='TB_next'>&nbsp;&nbsp;<a href='#'>Next &gt;</a></span>"
                        } else {
                            TB_PrevCaption = TB_TempArray[TB_Counter].title;
                            TB_PrevURL = TB_TempArray[TB_Counter].href;
                            TB_PrevHTML = "<span id='TB_prev'>&nbsp;&nbsp;<a href='#'>&lt; Prev</a></span>"
                        }
                    } else {
                        TB_FoundURL = true;
                        TB_imageCount = "Image " + (TB_Counter + 1) + " of " + (TB_TempArray.length)
                    }
                }
            }
            imgPreloader = new Image();
            imgPreloader.onload = function () {
                imgPreloader.onload = null;
                var M = tb_getPageSize();
                var K = M[0] - 150;
                var P = M[1] - 150;
                var L = imgPreloader.width;
                var Q = imgPreloader.height;
                if (L > K) {
                    Q = Q * (K / L);
                    L = K;
                    if (Q > P) {
                        L = L * (P / Q);
                        Q = P
                    }
                } else {
                    if (Q > P) {
                        L = L * (P / Q);
                        Q = P;
                        if (L > K) {
                            Q = Q * (K / L);
                            L = K
                        }
                    }
                }
                TB_WIDTH = L + 30;
                TB_HEIGHT = Q + 60;
                $("#TB_window").append("<a href='' id='TB_ImageOff' title='Close'><img id='TB_Image' src='" + H + "' width='" + L + "' height='" + Q + "' alt='" + E + "'/></a><div id='TB_caption'>" + E + "<div id='TB_secondLine'>" + TB_imageCount + TB_PrevHTML + TB_NextHTML + "</div></div><div id='TB_closeWindow'><a href='#' id='TB_closeWindowButton' title='Close'>Close window</a></div>");
                $("#TB_closeWindowButton").click(tb_remove);
                if (!(TB_PrevHTML === "")) {
                    function O() {
                        if ($(document).unbind("click", O)) {
                            $(document).unbind("click", O)
                        }
                        $("#TB_window").remove();
                        $("body").append("<div id='TB_window'></div>");
                        tb_show(TB_PrevCaption, TB_PrevURL, C);
                        return false
                    }
                    $("#TB_prev").click(O)
                }
                if (!(TB_NextHTML === "")) {
                    function N() {
                        $("#TB_window").remove();
                        $("body").append("<div id='TB_window'></div>");
                        tb_show(TB_NextCaption, TB_NextURL, C);
                        return false
                    }
                    $("#TB_next").click(N)
                }
                document.onkeydown = function (R) {
                    if (R == null) {
                        keycode = event.keyCode
                    } else {
                        keycode = R.which
                    }
                    if (keycode == 27) {
                        tb_remove()
                    } else {
                        if (keycode == 190) {
                            if (!(TB_NextHTML == "")) {
                                document.onkeydown = "";
                                N()
                            }
                        } else {
                            if (keycode == 188) {
                                if (!(TB_PrevHTML == "")) {
                                    document.onkeydown = "";
                                    O()
                                }
                            }
                        }
                    }
                };
                tb_position();
                $("#TB_load").remove();
                $("#TB_ImageOff").click(tb_remove);
                $("#TB_window").css({
                    display: "block"
                })
            };
            imgPreloader.src = H
        } else {
            var G = H.replace(/^[^\?]+\??/, "");
            var J = tb_parseQuery(G);
            TB_WIDTH = (J.width * 1) + 30 || 630;
            TB_HEIGHT = (J.height * 1) + 40 || 440;
            ajaxContentW = TB_WIDTH - 30;
            ajaxContentMinH = TB_HEIGHT - 285;
            ajaxContentMaxH = TB_HEIGHT - 45;
            if (H.indexOf("TB_iframe") != -1) {
                urlNoQuery = H.split("TB_");
                $("#TB_iframeContent").remove();
                if (J.modal != "true") {
                    $("#TB_window").append("<div id='TB_title'><div id='TB_ajaxWindowTitle'>" + E + "</div><div id='TB_closeAjaxWindow'><a href='#' id='TB_closeWindowButton' title='Close'>Close window</a></div></div><iframe frameborder='0' hspace='0' src='" + urlNoQuery[0] + "' id='TB_iframeContent' name='TB_iframeContent" + Math.round(Math.random() * 1000) + "' onload='tb_showIframe()' style='width:" + (ajaxContentW + 29) + "px;min-height:" + (ajaxContentMinH + 17) + "px;max-height:" + (ajaxContentMaxH + 17) + "px;' > </iframe>")
                } else {
                    $("#TB_overlay").unbind();
                    $("#TB_window").append("<iframe frameborder='0' hspace='0' src='" + urlNoQuery[0] + "' id='TB_iframeContent' name='TB_iframeContent" + Math.round(Math.random() * 1000) + "' onload='tb_showIframe()' style='width:" + (ajaxContentW + 29) + "px;min-height:" + (ajaxContenMinH + 17) + "px;max-height:" + (ajaxContentMaxH + 17) + "px;'> </iframe>")
                }
            } else {
                if ($("#TB_window").css("display") != "block") {
                    if (J.modal != "true") {
                        $("#TB_window").append("<div id='TB_title'><div id='TB_ajaxWindowTitle'>" + E + "</div><div id='TB_closeAjaxWindow'><a href='#' id='TB_closeWindowButton'>Close window</a></div></div><div id='TB_ajaxContent' style='width:" + ajaxContentW + "px;min-height:" + ajaxContentMinH + "px;max-height:" + (ajaxContentMaxH + 17) + "px;'></div>")
                    } else {
                        $("#TB_overlay").unbind();
                        $("#TB_window").append("<div id='TB_ajaxContent' class='TB_modal' style='width:" + ajaxContentW + "px;min-height:" + ajaxContentMinH + "px;max-height:" + (ajaxContentMaxH + 17) + "px;'></div>")
                    }
                } else {
                    $("#TB_ajaxContent")[0].style.width = ajaxContentW + "px";
                    $("#TB_ajaxContent")[0].style.minHeight = ajaxContentMinH + "px";
                    $("#TB_ajaxContent")[0].style.maxHeight = ajaxContentMaxH + "px";
                    $("#TB_ajaxContent")[0].scrollTop = 0;
                    $("#TB_ajaxWindowTitle").html(E)
                }
            }
            $("#TB_closeWindowButton").click(tb_remove);

            // Start of unminified code to highlight LBI amends

            if (H.indexOf("TB_inline") != -1) {
                $("#TB_ajaxContent").append($("#" + J.inlineId).children());
                if (J.inlineId == "editCookiePermissions") {
                    $("#TB_ajaxContent").css('maxHeight','100%')
                }
                if (J.inlineId == "applyMortgage") {
                    $("#TB_ajaxContent").css('maxHeight','100%')
                }
                $("#TB_window").unload(function () {
                    $("#" + J.inlineId).append($("#TB_ajaxContent").children())
                });
                tb_position();
                $("#TB_load").remove();
                $("#TB_window").css({
                    display: "block"
                });
                // Code created by LBI 30/04/2012
                // Trigger function once thickbox has loaded / shown popup content - LBI code
                privacyContentCallback(); // LBI code
                // Trigger function apply mortgage
                applyMortgageContentCallback(J);
            } else {
                if (H.indexOf("TB_iframe") != -1) {
                    tb_position();
                    if ($.browser.safari) {
                        $("#TB_load").remove();
                        $("#TB_window").css({
                            display: "block"
                        });
                        // Code created by LBI 30/04/2012
                        // Trigger function once thickbox has loaded / shown popup content - LBI code
                        privacyContentCallback(); // LBI code
                    }
                } else {

                    $.get(H += "&random=" + (new Date().getTime()), function (data) {
                        // Code created by LBI 13/08/2012
                        // Trigger function to load in only the wanted html
                        tb_loadHtmlIntoThickbox(data);
                        (function stripeTables(){$("table:not(.stripeless)").find("tr:even").addClass("highlight")}());
                        tb_position();
                        $("#TB_load").remove();
                        tb_init("#TB_ajaxContent a.thickbox");
                        $("#TB_window").css({
                            display: "block"
                        });
                        // Code created by LBI 30/04/2012
                        // Trigger function once thickbox has loaded / shown popup content - LBI code
                        privacyContentCallback(); // LBI code
                    });

                }

                // End of unminified code to highlight LBI amends

            }
        }
        if (!J.modal) {
            document.onkeyup = function (K) {
                if (K == null) {
                    keycode = event.keyCode
                } else {
                    keycode = K.which
                }
                if (keycode == 27) {
                    tb_remove()
                }
            }
        }
    } catch (D) {}
}
function tb_showIframe() {
    $("#TB_load").remove();
    $("#TB_window").css({
        display: "block"
    })
}
function tb_remove() {
    $("#TB_window #noApplyMortgage, #TB_window #yesApplyMortgage").unbind("click");
    $("#TB_imageOff").unbind("click");
    $("#TB_closeWindowButton").unbind("click");
    $("#TB_window").fadeOut("fast", function () {
        $("#TB_window,#TB_overlay,#TB_HideSelect").trigger("unload").unbind().remove()
    });
    $("#TB_load").remove();
    if (typeof document.body.style.maxHeight == "undefined") {
        $("body", "html").css({
            height: "auto",
            width: "auto"
        });
        $("html").css("overflow", "")
    }
    document.onkeydown = "";
    document.onkeyup = "";
    return false
}
function tb_position() {

    $("#TB_window").css({
        marginLeft: parseInt((($(window).width() - TB_WIDTH) / 2), 10)-60 + "px",
        width: TB_WIDTH + "px"
    });

    if (!(jQuery.browser.msie && jQuery.browser.version < 7)) {

        var height = $(window).height() - TB_HEIGHT;
        if(height < 20){

            $("#TB_window").css({
                marginTop: parseInt(20+$(window).scrollTop(),11) + "px"
            })

        }else{
            
            $("#TB_window").css({
                marginTop: parseInt((height / 2) + $(window).scrollTop(), 10) + "px"
            })
        }
        
    }
}
function tb_parseQuery(A) {
    var B = {};
    if (!A) {
        return B
    }
    var E = A.split(/[;&]/);
    for (var G = 0;
    G < E.length;
    G++) {
        var D = E[G].split("=");
        if (!D || D.length != 2) {
            continue
        }
        var F = unescape(D[0]);
        var C = unescape(D[1]);
        C = C.replace(/\+/g, " ");
        B[F] = C
    }
    return B
}
function tb_getPageSize() {
    var B = document.documentElement;
    var C = window.innerWidth || self.innerWidth || (B && B.clientWidth) || document.body.clientWidth;
    var A = window.innerHeight || self.innerHeight || (B && B.clientHeight) || document.body.clientHeight;
    arrayPageSize = [C, A];
    return arrayPageSize
}
function tb_detectMacXFF() {
    var A = navigator.userAgent.toLowerCase();
    if (A.indexOf("mac") != -1 && A.indexOf("firefox") != -1) {
        return true
    }
}

function tb_loadHtmlIntoThickbox(data) {

    var $TB_ajaxContent = $("#TB_ajaxContent");

    // if this is a lightbox fallback eneabled page, it should have a div with an id called = '#lightboxcontent'
    if ($(data).find('#lightboxcontent').length > 0) {
        $TB_ajaxContent.html($(data).find('#lightboxcontent').html());
        $TB_ajaxContent.find(".popup").attr("title","This link opens in a new window").append("<span class='popupper'> (Link opens in a new window)</span>");
    } else {
        $TB_ajaxContent.html($(data).html());
    }

}

$(function () {
    $("a.thickbox").click(function () {
        $("#TB_window").prepend('<div class="tr"><div></div><div>');
        $("#TB_window").append('<div class="br"><div></div><div>')
    })
});