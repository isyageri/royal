/*(function tagROLBBtns(){var B=document.title.replace(/[^a-zA-Z0-9]+/g,"");
B=B.substring(B,B.length-8);
var A="dcsMultiTrack('DCS.dcsuri','"+B+"/Header/LogIn','WT.ti','')";
var C="dcsMultiTrack('DCS.dcsuri','"+B+"/Header/Register','WT.ti','')";
$("div.global-navigation a.directional.rolbpopup").attr("onmousedown",A);
$("div.global-navigation a.functional.rolbpopup").attr("onmousedown",C)
}());*/
(function convertListToSelect(){$(".dropdown").each(function(B){var A="";
$(this).children().each(function(){A+="<option value='"+$(this).children().attr("href")+"'>"+$(this).text()+"</option>"
});
A="<form action='#' name='dropdown"+B+"'><fieldset><select>"+A+"</select><div class='btn'><a class='functional'>Go<span class='arrow icon'></span><em class='tl'></em><em class='tr'></em><em class='bl'></em><em class='br'></em></a></div></fieldset></form>";
$(A).replaceAll($(this)).click(function(C){var D=$(C.target);
if(D.is("a")){location.href=$(this).find("select").attr("value")
}return false
})
})
})();
var Barclays=new Object();
Barclays.equalHeightBoxes={init:function(){if(!this.sections){this.getSections();}
if(this.hasStyleAttribute(this.sections.find('.mod:first-child'))){this.removeCurrentHeight();}
this.setEqualHeight();},getSections:function(){if($(".content").siblings(".sidebar").length>0){this.sections=$(".section").filter(function(){return $(this).children(".cont-lg, .cont-fl").length===0;});}else{this.sections=$(".section").filter(function(){return $(this).parent(".column-2").length===0&&$(this).children(".cont-half").length===0&&$(this).children(".cont-fl").length===0&&$(this).children(".expand").length===0;});}},setEqualHeight:function(){this.sections.each(function(){if($(this).find("div.tcContent").length>0){}else{var C=0;var B=0;$(this).children(".mod").each(function(){var E=$(this).height();if(E>C){C=E;}
var D=$(this).children(".rt").height();if(D>B){B=D;}});$(this).children(".mod").css({'min-height':C+'px'});$(this).children().children(".rt").css({'min-height':B+'px'});}});},removeCurrentHeight:function(){this.sections.each(function(){var $this=$(this),$mod=$this.find('.mod'),$rt=$this.find('.rt');$mod.add($rt).each(function(){$(this).css({'height':'auto'});});});},hasStyleAttribute:function($el){return $el.attr('style');}};

(function revealMoreLinks(){$(".sidebar ul[class^='show-only ']").each(function(){var B=parseInt($(this).attr("class").substring($(this).attr("class").length-2),10);
var D=$(this).children(":not('.skip-links')").length;
if(D>B){var C=$(this).children(":gt("+B+"):not(.reveal)");
C.addClass("js-hide");
$(this).children(".reveal").toggle(function(){C.slideDown("fast");
A(this)
},function(){C.slideUp("fast");
A(this)
})
}});
function A(C){var B=$(C).attr("rel");
$(C).attr("rel",$(C).children().children().text());
$(C).children().children().text(B)
}})();
(function BubbleTooltips(){var A={xOffset:-206,yOffset:7,fadeInSpeed:200};
$("body").append("<iframe id='tooltipIframe' frameborder='0' tabindex='-1' height='0px' width='0px'></iframe><div class='toolTipWrapper' id='tooltipContainer'><div class='toolTipTop'></div><div class='toolTipMid'></div><div class='toolTipBtm'></div></div>");
$(".toolTip").live("mouseover",function(D){var C=$(D.target);
this.t=this.title;
this.title="";
var B=C.offset();
$("#tooltipContainer .toolTipMid").text(this.t);
$("#tooltipIframe").css({visibility:"visible",left:(B.left+A.xOffset)+"px",top:(B.top-A.yOffset-$("#tooltipContainer").height())+"px",height:$("#tooltipContainer").height()-10+"px"});
$("#tooltipContainer").css({visibility:"visible",left:(B.left+A.xOffset)+"px",top:(B.top-A.yOffset-$("#tooltipContainer").height())+"px"}).fadeIn(A.fadeInSpeed)
});
$(".toolTip").live("mouseout",function(){this.title=this.t;
$("#tooltipContainer,#tooltipIframe").css("visibility","hidden")
})
}());
(function insertPrintPageHTML(){if(window.print){$(".global-tools").append("<ul><li><div class='print'><a href='#'><span>Print page</span></a></div></li></ul>").find(".print").click(function(){window.print();
return false
})
}}());
(function stripeTables(){$("table:not(.stripeless)").find("tr:even").addClass("highlight")
}());
(function clearInputTextOnFocus(){$("input.textbox:text").focus(function(){var B=$(this).val();
var A=$(this).attr("title");
if(A===B){$(this).val("")
}}).blur(function(){if($(this).val().length===0){$(this).val($(this).attr("title"))
}})
}());
(function closeExplanation(){$(".info-close a.close").css("display","block");
$(".info-close a.close").click(function(){$(this).parents(".mod").slideUp(function(){$(this).remove()
});
return false
})
}());
(function carousel(){$(".bcarousel-list").each(function(){var E;
var J=0;
var L=$(this).find("li").length;
$("<div class='bcarousel-control'><a href='#' class='bcarousel-control-prev'>Previous</a> <a href='#' class='bcarousel-control-next'>Next</a><ol role='tablist'></ol></div>").insertBefore($(this));
var H="bcarousel-control-"+L+"-items";
var F=$(this).prev(".bcarousel-control");
F.addClass(H);
var G=F.find("ol");
$(this).find("li").each(function(N){var M="bcarousel-item-"+N;
B($(this),M);
C(G,N,M)
});
$(this).find("li:first").attr("aria-hidden","false");
F.find("ol li:first a").addClass("current").attr("aria-selected","true");
F.click(D);
var I=0;
var K=[];
$(".bcarousel-control ol li a[rel]").each(function(M){K[M]=$(this)
});
E=setInterval(function(){I=++I<K.length?I:0;
A(I)
},7000);
G.one("click",function(){clearInterval(E)
})
});
function C(G,E,F){G.append("<li><a role='tab' aria-selected='false' id='"+F+"L' href='#' rel='#"+F+"'>"+(E+1)+"</a></li>")
}function B(E,F){E.attr("id",F);
E.attr("role","tabpanel");
E.attr("aria-hidden","true");
E.attr("aria-labelledby",F+"L")
}function D(H){var J=$(H.target);
if(J.is("a")){var G=J.prop("rel");
if(G.length>0){var I=parseInt(G.substring(G.length-1),10);
A(I)
}else{G=J.attr("class");
var F=J.closest(".bcarousel-container").find(".bcarousel-control a.current").attr("rel");
var E=parseInt(F.substring(F.length-1),10);
if(G==="bcarousel-control-prev"){A(E-1)
}else{if(G==="bcarousel-control-next"){A(E+1)
}}}}return false
}function A(E){$("#bcarousel-item-"+E+"L").addClass("current").attr("aria-selected","true").parent().siblings().children().each(function(){$(this).removeClass("current").attr("aria-selected","false")
});
$("#bcarousel-item-"+E).attr("aria-hidden","false").siblings().each(function(){var F=E*parseInt($(this).css("width"),10);
if(F==0){var G=20
}else{var G=400
}$(this).attr("aria-hidden","true");
$(this).parent().animate({left:"-"+F+"px"},G)
})
}}());
(function popups(){if(window.open){$(".popup").attr("title","This link opens in a new window").append("<span class='popupper'> (Link opens in a new window)</span>");
$(".popup_directional").attr("title","This link opens in a new window").append("<span class='popupper'> (Link opens in a new window)</span>");
$(".popup:not(div.metafaq-window a.popup)").each(function(){
if($('.lightboxcontent').length){
	$(this).attr('target','_blank');
}else{
$(this).click(function(){window.open($(this).attr("href"),"popup","width=1060,height=700,resizable=yes,scrollbars=yes");
return false
});
}
});
$(".popup_directional").click(function(){window.open($(this).attr("href"),"popup","width=1060,height=700,resizable=yes,scrollbars=yes");
return false
});
$(".rolbpopup").click(function(){window.open($(this).attr("href"),"popup","width=1060,height=700,resizable=yes,scrollbars=yes,location=yes,toolbar=yes, menubar=yes");
return false
});
$("form.metafaq-window").submit(function(){var C="width=1060,height=700,resizable=yes,scrollbars=yes,location=yes";
var B=jQuery.param($(this).find(":input"));
var A=$(this).attr("action")+"?"+B;
var D=window.open(A,"metafaq",C);
if(window.focus){D.focus()
}return false
});
$("div.metafaq-window").click(function(A){A.preventDefault ? A.preventDefault() : A.returnValue = false; var D="width=1060,height=700,resizable=yes,scrollbars=yes,location=yes";
var E=$(A.target);
if(!E.is("a")){E=E.parent()
}if(E.is("a")){var G=E.attr("href");
var C=E.attr("title");
if(C=="metafaqquestion"){var B=jQuery.param($(this).find(":input"));
G=G+"?"+B
}var F=window.open(G,"metafaq",D);
if(window.focus){F.focus()
}}
});
$("form.multimap-window").submit(function(){var C="width=1015,height=700,resizable=yes,scrollbars=yes,location=yes";
var B=jQuery.param($(this).find(":input"));
var A=$(this).attr("action")+"?"+B;
var D=window.open(A,"multimap",C);
if(window.focus){D.focus()
}return false
})
}}());
(function loansCalculator(){$(".loan-calculator form").submit(function(A){var B=$(this).find("#loanErrorMessage").val();
$(this).find(".error-message").empty();
$(this).find(".error").removeClass("error");
$(".loan-calculator-results .m-cont").addClass("loading");
$.getJSON($(this).find("input#ajaxUrl").attr("src"),{ajax:true,loanAmount:$("#loan-amount").val(),loanTerm:$("#loan-term").val()},function(C){if(C.error==="true"){$("#loan-amount").parent().parent("tr").addClass("error");
$(".loan-calculator .error-message").append("<span>"+B+"</span>");
$("#monthly-repayments span").text("0");
$("#total-repayable span").text("0")
}else{$("#monthly-repayments span").text(C.monthlyRepayments);
$("#total-repayable span").text(C.totalRepayable)
}$(".loan-calculator-results .m-cont").removeClass("loading")
});
return false
})
}());
(function mortgageCalculator(){var D,C;
$(".mortgage-calculator form").submit(function(E){D=$("#income1").val();
C=$("#income2").val();
var F=$(this).find("#mortgageErrorMessage").val();
$(this).find(".error-message").empty();
$(this).find(".error").removeClass("error");
if(B()&&A()){$(".mortage-calculator .m-cont").addClass("loading");
$.get($(this).find("input#ajaxUrl").attr("src"),{ajax:true,income1:D,income2:C},function(G){$(".mortgage-calculator").after(G).hide();
$(".mortgage-calculator .m-cont").removeClass("loading")
})
}else{if(!B()){$("#income1").parent().parent("tr").addClass("error")
}if(!A()){$("#income2").parent().parent("tr").addClass("error")
}$(this).find(".error-message").append("<span>"+F+"</span>")
}return false
});
$(".mortgage-calculator-result .functional").live("click",function(){$(".mortgage-calculator-result").remove();
$(".mortgage-calculator").show();
$("#income1").focus().select()
});
function B(){return D.length>0&&Barclays.FormValidation.numbersOnly(D)
}function A(){return C.length===0?true:Barclays.FormValidation.numbersOnly(C)
}}());
(function accordion(){$(".accordion h2, .accordion h3").hover(function(){$(this).addClass("hover")
},function(){$(this).removeClass("hover")
}).siblings(".accordion-body").end().click(function(){$(this).next(".accordion-body").slideToggle(200).siblings(".accordion-body").slideUp(200);
$(this).find("span").toggleClass("open").end().siblings().find("span").removeClass("open")
})
}());
(function tabs() {
    $(".mod .tabs .options-tabs:not(.non-js), .hub-chooser #hub-chooser").click(function (A) {
        var B = $(A.target);
        if (B.is("span") || B.is("b")) {
            B = B.parent()
        }
        if (B.is("a")) {
            if (B.parent().is("sup")) {
                return true
            }
            if (B.closest(".jargon-buster").length > 0) {
                B.closest(".jargon-buster").find(".current").removeClass("current")
            } else {
                B.closest(".tabs").find(".current").removeClass("current")
            }
            B.parent().addClass("current");
            $("div" + B.attr("rel")).siblings(".tab-content").removeClass("current").end().addClass("current")
        }
        return false
    })
}());
(function tabsJb(){$(".jargon-buster:not(.non-js)").click(function(A){var B=$(A.target);
if(B.is("span")||B.is("b")){B=B.parent()
}if(B.is("a")){if(B.parent().is("sup")){return true
}if(B.closest(".index").length>0){B.closest(".jargon-buster").find(".current").removeClass("current");
B.parent().addClass("current");
$("div"+B.attr("rel")).siblings(".tab-content").removeClass("current").end().addClass("current")
}else{return true
}}return false
})
}());
(function hoverTabs(){$(".hover-tabs").each(function(){$(this).find(".options-tabs a").hover(function(A){$(this).parent().siblings(".current").removeClass("current").end().addClass("current");$($(this).attr("rel")).siblings(".tab-content").removeClass("current").end().addClass("current")},function(A){})})})();
(function hoverTabs(){$("#change-comparison").click(function(){$(this).siblings("form").show();
$(this).remove();
return false
})
})();
(function swipe(){$(".swipe .default:not(.reverse)").click(function(){$(this).parents(".c-swipe-viewport").animate({left:"-617px"},"slow");return false});$(".swipe .reverse").click(function(){$(this).parents(".c-swipe-viewport").animate({left:"0px"},"slow");return false})}());
(function showHideSitemap(){$("a#footer-nav").toggle(function(){$(this).next(".footer-inner").show();
$(this).parent().parent(".footer-links").removeClass("closed");
return false
},function(){$(this).next(".footer-inner").hide();
$(this).parent().parent(".footer-links").addClass("closed");
return false
})
}());
Barclays.HubChooser=(function(){var A=(function(){var B;
var D=[];
function C(F){var E=$(D[F]);
E.parent().parent().find("li").removeClass("current").end();
E.parent().addClass("current");
$(E.attr("rel")).siblings(".tab-content").removeClass("current").end().addClass("current")
}return{start:function(F,E){var G=0;
E=E||2000;
D=jQuery.makeArray($("#"+F+" li a"));
B=setInterval(function(){G=++G<D.length?G:0;
C(G)
},E)
},stop:function(E){clearInterval(B)
}}
})();
return{rotate:function(B,C){if($("#"+B).length>0){A.start(B,C);
$("#"+B).one("click",function(){A.stop(B)
})
}}}
})();
(function TableSort(){$("table.sortable").each(function(){var A=$(this);
$("th",A).each(function(B){var C;
if($(this).is(".sort-alpha")){C=function(D){return D.find(".sort-key").text().toUpperCase()+" "+D.text().toUpperCase()
}
}else{if($(this).is(".sort-numeric")){C=function(E){var D=parseFloat(E.text().replace(/^[^\d\.]*/,""));
return isNaN(D)?0:D
}
}else{if($(this).is(".sort-product")){C=function(E){
return E.find(".sort-key").text().toUpperCase()+" "+E.text().toUpperCase()
}
}else{if($(this).is(".sort-date")){C=function(D){return Date.parse("1 "+D.text())
}
}}}}if(C){$(this).addClass("clickable").hover(function(){$(this).addClass("hover")
},function(){$(this).removeClass("hover")
}).click(function(){var D=1;
if($(this).is(".sorted-asc")){D=-1
}var F=A.find("tbody > tr").get();
$.each(F,function(G,H){H.sortKey=C($(H).children("td").eq(B))
});
F.sort(function(H,G){if(H.sortKey<G.sortKey){return -D
}if(H.sortKey>G.sortKey){return D
}return 0
});
$.each(F,function(G,H){A.children("tbody").append(H);
H.sortKey=null
});
A.find("th").removeClass("sorted-asc").removeClass("sorted-desc");
var E=A.find("th").filter(":nth-child("+(B+1)+")");
if(D==1){E.addClass("sorted-asc")
}else{E.addClass("sorted-desc")
}A.find("td").removeClass("sorted").filter(":nth-child("+(B+1)+")").addClass("sorted");
Barclays.restripeTable(A)
})
}})
})
}());
(function mortgageFilter(){$(".mortgage-table").each(function(){var E=$(".mortgage-table table");
if(E.length===0){return
}var G=$("#mortgage-filter-url").attr("href");
var I=false;
var B={findingResults:"<div id='find-results'><p>Please wait whilst looking for results</p></div>",noResults:"<div id='no-results'><p>There are no mortgages available for the filter you have selected.</p></div>"};
if(G!==null){$.get(G,function(L){$("#mortgage-filter-url").replaceWith(L);
var J=$("input#find-results-msg").val();
var K=$("input#no-results-msg").val();
if(typeof J!="undefined"&&J.length>0){B.findingResults="<div id='find-results'><p>"+J+"</p></div>"
}if(typeof K!="undefined"&&K.length>0){B.noResults="<div id='no-results'><p>"+K+"</p></div>"
}$(".mortgage-filter").submit(function(){return false
});
$(".mortgage-filter .btn a").bind("click",F)
})
}function F(J){if(!I){I=true;
E.find("tbody").css({display:"none"});
$("#no-results").remove();
$(B.findingResults).insertAfter(E);
H();
A();
Barclays.restripeTable(E);
D()
}return false
}function H(M,J){var L=$("#number-of-years").val();
var K=parseInt(L,10);
E.find("tbody tr").each(function(){var N=$("td",this).filter(":nth-child(1)").text().split(" ")[0];
var O=parseInt(N,10);
if((O===K)||(isNaN(K)&&L==="all")){$(this).show()
}else{$(this).hide()
}})
}function A(){var J=$("#percentage-value-of-home").val();
var K=parseInt(J,10);
E.find("tbody tr").filter(function(){return $(this).css("display")!=="none"
}).each(function(){var M=$("td",this).filter(":nth-child(6)").text().split("%")[0];
var L=parseInt(M,10);
if((L>=K)||(isNaN(K)&&J==="all")){$(this).show()
}else{$(this).hide()
}})
}function D(){setTimeout(function(){var J=$("<tbody></tbody>").css("display");
E.find("tbody").css({display:J});
$("#find-results").remove();
C();
I=false
},500)
}function C(){var J=E.find("tbody tr").filter(function(){return $(this).css("display")!=="none"
}).length;
if(J===0){if($("#no-results").length===0){$(B.noResults).insertAfter(E)
}}else{$("#no-results").remove()
}}})
}());
Barclays.restripeTable=function(B){var A=0;
B.find("tbody tr").filter(function(){return $(this).css("display")!=="none"
}).each(function(C){if(A%2===0){$(this).addClass("highlight")
}else{$(this).removeClass("highlight")
}A++
})
};
Barclays.FormValidation={numbersOnly:function(A){var B=/^\d+$/;
if(A.match(B)){return"true"
}return false
}};
Barclays.Wait=function(B){var C=new Date().getTime();
var A=C;
while(A-C<B){A=new Date().getTime()
}};
Barclays.module_open_close=(function(){$(".nav-module-header h2 a.toggle").click(function(){$(this).parent().parent().parent().toggleClass("closed");
$(this).parent().parent().parent().toggleClass("open");
return false
})
});
Barclays.ImageGallery=(function(){var E={fadeOpacity:0.7,carouselClass:".carousel"};
var F=$(E.carouselClass+" ul");
var C=$(E.carouselClass+" ul li");
function B(G){var H=$(G.target).closest("a");
C.find("img").fadeTo("fast",0.7);
H.children().fadeTo("fast",1);
H.parent().parent().parent().prev().prev(".image-view").children("img").hide().attr({src:H.attr("href"),alt:H.children("img").attr("alt")}).fadeIn("slow");
return false
}function D(){F.bind("click",B);
F.keydown(function(G){if(G.keyCode===39){}else{if(G.keyCode===37){}}})
}function A(){var K=$(E.carouselClass);
var J=F;
var I=$(".thumb-slider").slider({slide:function(M,N){if(J.width()>K.width()){J.css("margin-left",Math.round(N.value/100*(K.width()-J.width()))+"px")
}else{J.css("margin-left",0)
}}});
K.css("overflow","hidden");
function H(){var M=J.width()-K.width();
var N=M/J.width();
var O=K.width()-(N*K.width());
I.find(".ui-slider-handle").css({width:O,"margin-left":-O/2});
handleHelper.width("").width(I.width()-O)
}function L(){var N=K.width()-J.width();
var M=parseInt(J.css("margin-left"),10);
var O=Math.round(M/N*100);
I.slider("value",O)
}function G(){var N=J.width()+parseInt(J.css("margin-left"),10);
var M=K.width()-N;
if(M>0){J.css("margin-left",parseInt(J.css("margin-left"),10)+M)
}}$(window).resize(function(){L();
G()
})
}return{init:function(){$(".carousel").each(function(){C.find("img").fadeTo("fast",E.fadeOpacity);
D();
var G=parseInt(C.innerWidth(),10);
var H=G*C.length;
F.css("width",H+"px");
A()
})
}}
})();
function setQueryTCCookie(D){var B=-1;
var A=null;
if(D!=null){D=D.toLowerCase();
B=D.indexOf("tc=");
if(B!=-1){var C=D.indexOf("&",B);
if(C<0){A=D.substring((B+3),D.length)
}else{A=D.substring((B+3),C)
}}}return A
}function setDomainReferrer(B){var A=-1;
if(B!=null){B=B.toLowerCase();
A=B.indexOf("https://");
if(A!=-1){B=B.substring(A+8)
}else{A=B.indexOf("http://");
if(A!=-1){B=B.substring(A+7)
}}A=B.indexOf("www.");
if(A!=-1){B=B.substring(A+4)
}A=B.indexOf("/");
if(A!=-1){B=B.substring(0,A)
}return B
}}function setCookie(E,B,D){var A=new Date();
if(D!=null){A.setDate(A.getDate()+D)
}var C=escape(B)+((D==null)?"":"; expires="+A.toUTCString())+";path=/";
document.cookie=E+"="+C
}function getCookie(D){var C,E,A,B=document.cookie.split(";");
for(C=0;
C<B.length;
C++){E=B[C].substr(0,B[C].indexOf("="));
A=B[C].substr(B[C].indexOf("=")+1);
E=E.replace(/^\s+|\s+$/g,"");
if(E==D){return unescape(A)
}}}function checkForSpecialCharacter(A){var D=A.length;
var E=true;
for(var C=0;
C<D;
C++){var B=A.charAt(C);
if(!((B>="a"&&B<="z")||(B>="A"&&B<="Z")||(B>="0"&&B<="9"))){E=false;
break
}}if(E){return A
}else{return null
}}$(document).ready(function(){var D=null;
var Q=window.top.location.search.substring(1);
var S=document.referrer;
var F=null;
var N=-1;
if(Q!=null){F=setQueryTCCookie(Q)
}if(F!=null){F=checkForSpecialCharacter(F);
if(F!=null){var J=getCookie("tracker");
if(J==null){setCookie("tracker",F,null)
}}}else{if(S!=null){S=setDomainReferrer(S);
var O=false;
if(referrerArray!=null){var P=referrerArray.length;
if(P>0){for(E=0;
E<P;
E++){var I=referrerArray[E];
if(I!=null){I=I.toLowerCase();
D=new RegExp(I,"g");
D.compile(D);
if(D.test(S)){N=E;
O=true;
break
}}}}}if(O){var R=referrerTCvalue[N];
if(R!=null){R=checkForSpecialCharacter(R);
if(R!=null){var J=getCookie("tracker");
if(J==null){setCookie("tracker",R,null)
}}}}}}var L=getCookie("tracker");
if(L!=null){var B=$(".Trackable");
for(var E=0,C=B.length;
E<C;
E++){var T=B[E];
var M=T.href;
if(M!=null){var K=M.toLowerCase().indexOf("tc=");
if(K<0){var A=M.indexOf("?");
if(A<0){M=M+"?TC="+L
}else{M=M+"&TC="+L
}T.href=M
}else{var G=null;
var A=M.indexOf("&");
if(A<0){G=M.substring(0,M.indexOf("=")+1);
G=G+L
}else{var A=M.toLowerCase().indexOf("tc=");
G=M.substring(0,A+3);
var H=M.indexOf("&",A);
if(H<0){G=G+L
}else{G=G+L+M.substring(H,M.length)
}}T.href=G
}}}}});
//BEGIN Barclays:CMS2 BCLYR-22 - Flash animation support
function setFlash(a){function e(a){return encodeURIComponent(a)}function d(){if(a.flashvars&&a.xml_path){return a.flashvars+"&xml_path="+e(a.xml_path)}else if(a.flashvars){return a.flashvars}else if(a.xml_path){return"xml_path="+e(a.xml_path)}else{return false}}var b=false,c={scale:"showall",wmode:"direct",flashvars:d()};$.ajaxSetup({cache:true});function alertStatus(e){if(e.success){Barclays.equalHeightBoxes.init();}}$.getScript("/js/swfobject.js",function(){if(swfobject.getFlashPlayerVersion().major>=9){swfobject.embedSWF(a.swf_path,a.content_id,a.swf_width,a.swf_height,"9.0.0","/js/expressInstall.swf",b,c,null,alertStatus);}});$.ajaxSetup({cache:false});}
//BEGIN Barclays:CMS2 BCLYR-23 - Video support
function showVideo(v, id) {
    $(document).ready(function () {
        if (true) {
            $('div#' + id + '.videoContainer').html(v);
        } else {
            $('div#' + id + '.videoContainer img').css('visibility', 'visible');
        }
        Barclays.equalHeightBoxes.init();
    })
}
// RSS/ATOM FEED CAPSULE WIDGET: BCLYR-630
(function($){$.feedCapsule=function(el,options){var self=this;self.$el=$(el);self.el=el;self.feedData=[];self.$el.data("feedCapsule",self);self.init=function(){self.options=$.extend({},$.feedCapsule.defaultOptions,options);self.fallbackContent.hide();self.loadingFeedback.show();self.getFeedData.init();};self.ajaxHasLoaded=function(data){self.loadingFeedback.hide();self.storeItem.init(data);self.appendFeedList();};self.ajaxError=function(){self.fallbackContent.show();};self.getFeedData={init:function(){$.getJSON(this.getGoogleApiUrl(),function(data){if(data.responseStatus===200){self.ajaxHasLoaded(data);}else{self.ajaxError();}});},getGoogleApiUrl:function(){var url='http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&q='+self.options.url;if(self.options.limit!==null){url+='&num='+self.options.limit;}
url+='&output=json_xml';url+='&callback=?';return url;},isLimitReached:function(i){return i===self.options.limit-1;}};self.fallbackContent={show:function(){self.$el.children().show();},hide:function(){self.$el.children().hide();}};self.loadingFeedback={show:function(){self.$el.addClass('feed-loading');},hide:function(){self.$el.removeClass('feed-loading');}};self.storeItem={init:function(data){var $xmlItems=$(data.responseData.xmlString).find('item'),i,item;for(i=0;i<data.responseData.feed.entries.length;i+=1){item=data.responseData.feed.entries[i];item.xmlData=$xmlItems[i];self.storeItem.pushItemToFeedData(item);}},pushItemToFeedData:function(item){var itemData=self.storeItem.createItem(item);self.feedData.push(itemData);},createItem:function(item){var itemData={};if(self.options.thumbnail){itemData.thumbnail=this.getThumbnail(item);}
itemData.title=item.title;itemData.link=item.link;itemData.publishedDate=self.helpers.formatDate(item.publishedDate);itemData.description=item.content;return itemData;},getThumbnail:function(item){var $xmlData=$(item.xmlData),thumbnail={url:$xmlData.find('media\\:thumbnail').attr('url'),width:$xmlData.find('media\\:thumbnail').attr('width'),height:$xmlData.find('media\\:thumbnail').attr('height')};return thumbnail;}};self.appendFeedList=function(){self.$el.append(self.createElements.listContainer());self.helpers.equalHeights.init();};self.createElements={listContainer:function(){var i,item,$listItem,$container=$('<ul class="feed-list" />');for(i=0;i<self.feedData.length;i+=1){item=self.feedData[i];$listItem=self.createElements.listItem(item);if(self.helpers.isNumberOdd(i)){$listItem.addClass('odd');}
$container.append($listItem);}
return $container;},listItem:function(item){var $listItem=$('<li class="clearfix" />');if(self.options.thumbnail&&item.thumbnail&&item.thumbnail.url){$listItem.append(this.thumbnail.thumb(item));}
$listItem.append(this.content(item));return $listItem;},content:function(item){var $content=$('<div class="feed-content" />');if(self.options.title){$content.append(this.heading(item));}
if(self.options.description){$content.append(this.description(item));}
if(self.options.date){$content.append(this.date(item));}
return $content;},thumbnail:{thumb:function(item){var $thumb=$('<div class="feed-thumb" />');$thumb.append(this.image(item));return $thumb;},image:function(item){var $image=$('<img />');$image.attr('src',item.thumbnail.url).attr('height',item.thumbnail.height).attr('width',item.thumbnail.width);return $image;}},heading:function(item){var $heading=$('<h4 class="feed-title" />');$heading.append(this.link(item));return $heading;},link:function(item){var $link=$('<a />');$link.attr('href',item.link).text(item.title).attr('target','_blank');return $link;},date:function(item){var $date=$('<p class="feed-date" />');$date.html(item.publishedDate);return $date;},description:function(item){var $description=$('<p class="feed-desc" />');if(self.options.truncate){$description.html(self.helpers.truncate(item.description));}else{$description.html(item.description);}
return $description;}};self.helpers={formatDate:function(dateString){var date=new Date(dateString),time={hour:date.getHours(),minutes:date.getMinutes()},months=["January","February","March","April","May","June","July","August","September","October","November","December"],formattedDate=date.getDate()+' '+months[date.getMonth()]+' '+date.getFullYear()+' '+this.convert24to12hr(time);return formattedDate;},isNumberOdd:function(number){return number%2===0;},convert24to12hr:function(time){var time12={};if(time.hour>12){time12.hour=time.hour-12;time12.suffix='pm';}else if(time.hour==0){time12.hour=12;time12.suffix='am';}else{time12.hour=time.hour;time12.suffix='am';}
if(time.minutes<10){time.minutes='0'+time.minutes;}
return time12.hour+':'+time.minutes+time12.suffix;},truncate:function(string){var truncatedString=string.substr(0,self.options.truncate);truncatedString=truncatedString.substr(0,Math.min(truncatedString.length,truncatedString.lastIndexOf(" ")));return truncatedString+'&hellip;';},equalHeights:{init:function(){var $mod=self.$el.closest('.mod');if(this.isStyleAttribute($mod)){this.removeCurrentHeight();this.applyMaxHeight();}},removeCurrentHeight:function(){self.$el.closest('.section').find('.rt').add(self.$el.closest('.section').find('.mod')).each(function(){$(this).css('height','auto');});},applyMaxHeight:function(){var $containers=self.$el.closest('.section').find('.rt'),tallestHeight=this.getTallestHeight($containers);$containers.each(function(){$(this).css({'min-height':tallestHeight});});},getTallestHeight:function($containers){var maxHeight=0;$containers.each(function(){var height=$(this).height();if(height>maxHeight){maxHeight=height;}});return maxHeight;},isStyleAttribute:function($el){return $el.attr('style');}}};self.init();};$.feedCapsule.defaultOptions={limit:5,title:true,thumbnail:true,description:false,date:true,truncate:false};$.fn.feedCapsule=function(options){return this.each(function(){(new $.feedCapsule(this,options));});};}(jQuery));

Barclays.showFragId=function(){var $H=null,I="tab-",F="div",C=document.location.toString().split("#")[1],D=null,$G=null,A=null,J=0,E=null,K=null;if(C){D=$(".tabs").find(".options-tabs").siblings(".current").length;$G=$('#'+C);if($G.val()==null){if(D>0){A=document.getElementsByTagName(F);E=A.length;regex=new RegExp("^"+I);for(J<E;J++;){K=A[J];if(K.id.match(regex)){C=K.id;break;}}}}
if(D>0&&$G.hasClass('tab-content')){$H=$('a[rel="#'+C+'"]');$H.closest('.options-tabs').children().find(".current").removeClass("current");$H.closest('.options-tabs').siblings(".current").removeClass("current");$H.parent().addClass("current");$("#"+C).addClass("current");return;}else{if($G.hasClass('accordion-body')){$G.prev('h2').trigger('click');return;}else{if($G.hasClass('swipe')&&$G.parent().hasClass('c-swipe-viewport')&&$G.find('.btn a').hasClass('reverse')){$G.prev().find('.btn a.default').trigger('click');}}}}}

var FAQ = FAQ || {};
FAQ.topfaq = (function () { 
    return {
        init: function () { 
            if (!$('link[href*="premier.css"]').length) {
                $('#faqTabs li a').css('color','#036');
            } else {
                $('#faqTabs li a').css('color','#444');
            }

            if ( $('.faqTabsModule').length == 1) {
                $('#askFaqContent, #topFaqContent').hide();
                
                var isAskQuestionDefault = $('#askFaqTabHeader').attr("class");
                      
                if("true" ==  isAskQuestionDefault) {
                    $('#topFaqContent').attr("class", "non-default");
                    $('#askFaqContent').attr("class", "default");
                } else {
                   $('#topFaqContent').attr("class", "default");
                   $('#askFaqContent').attr("class", "non-default");
                }
                $('.faqTabsModule div.default').show();
                
                $('.faqTabsModule ul#faqTabs li h3:first').addClass('current');
                $('.faqTabsModule ul#faqTabs li a').click(function(){
                    $('.faqTabsModule ul#faqTabs li h3').removeClass('current');
                    $(this).parent().addClass('current');
                    var currentTab = $(this).attr('href');
                    currentTab=currentTab.substring(currentTab.indexOf('#')); //ie7 fix
                    $('#askFaqContent, #topFaqContent').hide();
                    $(currentTab).show();
                    return false;
                });
                if ($('#topFaqContent li').length == 0) {
                    $('#faqTabs, #topFaqTabHeader, #topFaqContent').hide();
                    $('#askFaqHeader, #askFaqContent').show();
                }
                if ($('#askFaqContent input').length == 0) {
                    $('#faqTabs, #askFaqTabHeader, #askFaqContent').hide();
                    $('#topFaqHeader, #topFaqContent').show();
                }
            }   
            
            if ( $('.faqTabsModule').length > 1) {
                if ($('#topFaqContent li').length >= 1) {
                    $('#topFaqHeader').show();
                }
                if ($('#askFaqContent input').length == 1) {
                    $('#askFaqHeader').show();
                }
            }
        }
    };
}());

Barclays.UserAgentContent=function(){
    var theUserAgent = window.navigator.userAgent.toLowerCase();

    if (theUserAgent.indexOf('iphone') != -1 || theUserAgent.indexOf('ipod') != -1) {
        theUserAgent = 'iphone';
    } else if (theUserAgent.indexOf('ipad') != -1) {
        theUserAgent = 'ipad';
    } else if (theUserAgent.indexOf('android') != -1) {
        theUserAgent = 'android';
    } else if (theUserAgent.indexOf('blackberry') != -1) {
        theUserAgent = 'blackberry';         
    } else if (theUserAgent.indexOf('windows phone') != -1 || theUserAgent.indexOf('iemobile') != -1) {
        theUserAgent = 'windows';
    } else {
        theUserAgent= 'computer';
    }

    if (theUserAgent != 'computer') {
        $('.ds-computer').css('display','none');
        $('.ds-'+theUserAgent).css('display','block'); 
    }           
};

Barclays.socialWidget = $(function(){
    var sw = $('#bSocialWidget'),
        hovered = false,
        hoverOffset = '-48px',
        widthLimit = 1036;

    sw.find('a').bind('mouseenter mouseleave',function(e){
        e.preventDefault();
        (e.type === "mouseenter") ? $(this).css('opacity','0.8') : $(this).css('opacity','1');
    });
    $(window).bind('resize',function(e){
        expandContract();
    });
    sw.bind('mouseenter mouseleave',function(e){
        hovered = (e.type === "mouseenter") ? true : false;
        expandContract();
    });

    function expandContract(){
        if($(document).width() > widthLimit || hovered){
            sw.css('right','0');
        }else{
            sw.css('right',hoverOffset);
        }
    }
    sw.show();
    expandContract();
});

var productsHub = productsHub || {};
productsHub.tables = (function () { 
    return {
        init: function () { 
            $('.svMLInfo a').bind('click',function(e){
                e.preventDefault();
                var text = $(this).find('span.txt').html() == 'Show details' ? '<span class="txt">Hide details</span><span class="ico">&nbsp;</span>' : '<span class="txt">Show details</span><span class="ico">&nbsp;</span>';
                $(this).toggleClass('closed').html(text);
                $(this).parent().siblings('.svDetails').toggleClass('closed');
            });

            var prodSumtbodyTotal = $("#productsSummarySib").find("tbody");
            if (prodSumtbodyTotal.length > 0) {
                prodSumtbodyTotal.each(function(i){
                    $(this).attr('id', "tbodySummary"+i);
                    var tbodyID = $(this).attr('id');
                    $("#"+tbodyID).find(".svDetails .btn").clone().appendTo("#"+tbodyID+" .svNameWrap");
                });
            }
        }
    };
}());

var accordionModule = (function () {
    var accordion = {};

    function slideUp (ele) {
        ele.find('div.accordionText').slideUp();
        ele.find('div.accordionTitle').removeClass('accordionopenarrow');
        ele.find('div.accordionTitle').addClass('accordionclosedarrow');
    }

    function slideDown (ele) {
        ele.nextUntil('div.accordionTitle').slideDown();
        ele.removeClass('accordionclosedarrow');
        ele.addClass('accordionopenarrow');
    }

    accordion.init = function (ref) {
        ref.find('div.accordionText').hide();
        ref.find('div.accordionTitle').addClass('accordionclosedarrow');
        ref.find('div.accordionTitle:first').nextUntil('div.accordionTitle').show();
        ref.find('div.accordionTitle:first').removeClass('accordionclosedarrow');
        ref.find('div.accordionTitle:first').addClass('accordionopenarrow');

        ref.find('div.accordionTitle').click(function(){
            var $this = $(this);
            if ($this.next('div.accordionText').css('display') == 'none') {
                slideUp(ref);
                slideDown($this);
            } else {
                slideUp(ref);
            }
        });
    };
    return accordion;
}());

var colsModule = (function () {
    var cols = {};

    cols.init = function () {
        var totalCols = $('div.columns').length;

        $('div.columns').each(function (index) {
            $(this).attr('id', 'col-index' + index.toString());
        });

        for (var i = 0; i < totalCols; i++) {
            var totalCol = $('#col-index'+i+' .column').length,
                tabsContWidth,
                colWidth,
                imgWidth,
                imgCol2Width,
                col2MarginL,
                colMarginL,
                contWidth;

            //define vars properties for columns in carousel, tabs panel and default modules
            if ( ( $('#col-index'+i).parent().prop('className') == 'carouselSlide' ) || ( $('#col-index'+i).parent().parent().prop('className') == 'carouselSlide' )) {
                tabsContWidth = 720;
                colWidth = tabsContWidth/totalCol;
                imgWidth = tabsContWidth/2.5;
                imgCol2Width = tabsContWidth-(imgWidth);
                col2MarginL = 40;
                colMarginL = 20;
            } else if ( ( $('#col-index'+i).parent().prop('className') == 'tabInfoServicesPanel' ) || ( $('#col-index'+i).parent().parent().prop('className') == 'tabInfoServicesPanel' )) {
                tabsContWidth = 840;
                colWidth = tabsContWidth/totalCol;
                imgWidth = tabsContWidth/2.5;
                imgCol2Width = tabsContWidth-(imgWidth);
                col2MarginL = 40;
                colMarginL = 20;
            } else {
                if ( $('#col-index'+i).parent().prop('className') != '.mboxDefault' ) {
                    contWidth = $('#col-index'+i).parent().width();
                } else {
                    contWidth = $('#col-index'+i).parent().parent().width();
                }
                if (totalCol == '2') {
                    tabsContWidth = contWidth-40;
                } else {
                    tabsContWidth = contWidth-80;
                }
                colWidth = tabsContWidth/totalCol;
                imgWidth = tabsContWidth/2.5;
                imgCol2Width = tabsContWidth-(imgWidth);
                col2MarginL = 20;
                colMarginL = 20;
            }

            //set properties for each column
            if (totalCol == '2') { 
                if ( ($('#col-index'+i+' .column:first p').length < '2') && ($('#col-index'+i+' .column:first img').length == '1') ) {
                    $('#col-index'+i+' .column:first').css('width', imgWidth+'px');
                    $('#col-index'+i+' .column:first img').css({'display': 'block', 'margin': '0px auto'});
                    $('#col-index'+i+' .column:nth-child(2)').css({'width': imgCol2Width+'px', 'margin-left': col2MarginL+'px'});
                } else if ( ($('#col-index'+i+' .column:nth-child(2) p').length < '2') && ($('#col-index'+i+' .column:nth-child(2) img').length == '1') ) {
                    $('#col-index'+i+' .column:first').css('width', imgCol2Width+'px');
                    $('#col-index'+i+' .column:nth-child(2)').css({'width': imgWidth+'px', 'margin-left': col2MarginL+'px'});
                    $('#col-index'+i+' .column:nth-child(2) img').css({'display': 'block', 'margin': '0px auto'});        
                } else {
                    $('#col-index'+i+' .column').css('width', colWidth+'px');
                    $('#col-index'+i+' .column:not(:first)').css('margin-left', col2MarginL+'px');
                }   
            } 
                
            if (totalCol > '2') {
                $('#col-index'+i+' .column').css('width', colWidth+'px');
                $('#col-index'+i+' .column:not(:first)').css('margin-left', colMarginL+'px');
            }
        }
    };
    return cols;
}());

$(document).ready(function () {
    FAQ.topfaq.init();
    colsModule.init();
    $('.m-cont:not(:has(.column))').each(function(){
        accordionModule.init($(this));
    });
    $('.column').each(function(){
        accordionModule.init($(this));
    });
    Barclays.UserAgentContent();
    //Check for a fragment ID and respond accordingly
    Barclays.showFragId();
    productsHub.tables.init();
    //BEGIN Barclays:CMS2 BCLYR-393 - Tooltip stack overflow bug
    if ($("a.helpPointV2, a.helpPoint").length > 0) {
        //turn on caching, then load the script that applies the tooltips
        $.ajaxSetup({cache: true});
        $.getScript('/js/tooltip3.min.js', function() {
            //only load the plugin if it doesn't already exist
            if (jQuery().qtip) {
                toolTipV3();
            } else {
                $.ajaxSetup({cache: true});
                $.getScript('/js/jquery.qtip-1.0.min.js', function() {
                    toolTipV3();
                });
            }
        });
        //turn off caching (which is the default)
        $.ajaxSetup({cache: false});
    }

    Barclays.equalHeightBoxes.init();
    $('html').addClass('hasJS'); // add hasJs to the form html tag page for javascript enabled functions 
    //trigger on click event for table sort
    if($('.sort-product')){
        $('.sort-product').trigger('click');
    }
    //if we are in a popup window - the close button should close the window
    $('.closePopWin').click(function(){
        window.close();
    });
});