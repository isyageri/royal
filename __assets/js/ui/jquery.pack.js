(function(){var M=this,F,Q=M.jQuery,AE=M.$,AF=M.jQuery=M.$=function(A,B){return new AF.fn.init(A,B)
},Y=/^[^<]*(<(.|\s)+>)[^>]*$|^#([\w-]+)$/,G=/^.[^:#\[\.,]*$/;
AF.fn=AF.prototype={init:function(D,A){D=D||document;
if(D.nodeType){this[0]=D;
this.length=1;
this.context=D;
return this
}if(typeof D==="string"){var B=Y.exec(D);
if(B&&(B[1]||!A)){if(B[1]){D=AF.clean([B[1]],A)
}else{var a=document.getElementById(B[3]);
if(a&&a.id!=B[3]){return AF().find(D)
}var C=AF(a||[]);
C.context=document;
C.selector=D;
return C
}}else{return AF(A).find(D)
}}else{if(AF.isFunction(D)){return AF(document).ready(D)
}}if(D.selector&&D.context){this.selector=D.selector;
this.context=D.context
}return this.setArray(AF.isArray(D)?D:AF.makeArray(D))
},selector:"",jquery:"1.3.2",size:function(){return this.length
},get:function(A){return A===F?Array.prototype.slice.call(this):this[A]
},pushStack:function(B,D,C){var A=AF(B);
A.prevObject=this;
A.context=this.context;
if(D==="find"){A.selector=this.selector+(this.selector?" ":"")+C
}else{if(D){A.selector=this.selector+"."+D+"("+C+")"
}}return A
},setArray:function(A){this.length=0;
Array.prototype.push.apply(this,A);
return this
},each:function(B,A){return AF.each(this,B,A)
},index:function(A){return AF.inArray(A&&A.jquery?A[0]:A,this)
},attr:function(B,D,A){var C=B;
if(typeof B==="string"){if(D===F){return this[0]&&AF[A||"attr"](this[0],B)
}else{C={};
C[B]=D
}}return this.each(function(a){for(B in C){AF.attr(A?this.style:this,B,AF.prop(this,C[B],A,a,B))
}})
},css:function(A,B){if((A=="width"||A=="height")&&parseFloat(B)<0){B=F
}return this.attr(A,B,"curCSS")
},text:function(B){if(typeof B!=="object"&&B!=null){return this.empty().append((this[0]&&this[0].ownerDocument||document).createTextNode(B))
}var A="";
AF.each(B||this,function(){AF.each(this.childNodes,function(){if(this.nodeType!=8){A+=this.nodeType!=1?this.nodeValue:AF.fn.text([this])
}})
});
return A
},wrapAll:function(A){if(this[0]){var B=AF(A,this[0].ownerDocument).clone();
if(this[0].parentNode){B.insertBefore(this[0])
}B.map(function(){var C=this;
while(C.firstChild){C=C.firstChild
}return C
}).append(this)
}return this
},wrapInner:function(A){return this.each(function(){AF(this).contents().wrapAll(A)
})
},wrap:function(A){return this.each(function(){AF(this).wrapAll(A)
})
},append:function(){return this.domManip(arguments,true,function(A){if(this.nodeType==1){this.appendChild(A)
}})
},prepend:function(){return this.domManip(arguments,true,function(A){if(this.nodeType==1){this.insertBefore(A,this.firstChild)
}})
},before:function(){return this.domManip(arguments,false,function(A){this.parentNode.insertBefore(A,this)
})
},after:function(){return this.domManip(arguments,false,function(A){this.parentNode.insertBefore(A,this.nextSibling)
})
},end:function(){return this.prevObject||AF([])
},push:[].push,sort:[].sort,splice:[].splice,find:function(A){if(this.length===1){var B=this.pushStack([],"find",A);
B.length=0;
AF.find(A,this[0],B);
return B
}else{return this.pushStack(AF.unique(AF.map(this,function(C){return AF.find(A,C)
})),"find",A)
}},clone:function(A){var C=this.map(function(){if(!AF.support.noCloneEvent&&!AF.isXMLDoc(this)){var b=this.outerHTML;
if(!b){var a=this.ownerDocument.createElement("div");
a.appendChild(this.cloneNode(true));
b=a.innerHTML
}return AF.clean([b.replace(/ jQuery\d+="(?:\d+|null)"/g,"").replace(/^\s*/,"")])[0]
}else{return this.cloneNode(true)
}});
if(A===true){var D=this.find("*").andSelf(),B=0;
C.find("*").andSelf().each(function(){if(this.nodeName!==D[B].nodeName){return 
}var a=AF.data(D[B],"events");
for(var b in a){for(var c in a[b]){AF.event.add(this,b,a[b][c],a[b][c].data)
}}B++
})
}return C
},filter:function(A){return this.pushStack(AF.isFunction(A)&&AF.grep(this,function(B,C){return A.call(B,C)
})||AF.multiFilter(A,AF.grep(this,function(B){return B.nodeType===1
})),"filter",A)
},closest:function(B){var C=AF.expr.match.POS.test(B)?AF(B):null,A=0;
return this.map(function(){var D=this;
while(D&&D.ownerDocument){if(C?C.index(D)>-1:AF(D).is(B)){AF.data(D,"closest",A);
return D
}D=D.parentNode;
A++
}})
},not:function(A){if(typeof A==="string"){if(G.test(A)){return this.pushStack(AF.multiFilter(A,this,true),"not",A)
}else{A=AF.multiFilter(A,this)
}}var B=A.length&&A[A.length-1]!==F&&!A.nodeType;
return this.filter(function(){return B?AF.inArray(this,A)<0:this!=A
})
},add:function(A){return this.pushStack(AF.unique(AF.merge(this.get(),typeof A==="string"?AF(A):AF.makeArray(A))))
},is:function(A){return !!A&&AF.multiFilter(A,this).length>0
},hasClass:function(A){return !!A&&this.is("."+A)
},val:function(d){if(d===F){var a=this[0];
if(a){if(AF.nodeName(a,"option")){return(a.attributes.value||{}).specified?a.value:a.text
}if(AF.nodeName(a,"select")){var A=a.selectedIndex,c=[],b=a.options,B=a.type=="select-one";
if(A<0){return null
}for(var D=B?A:0,e=B?A+1:b.length;
D<e;
D++){var C=b[D];
if(C.selected){d=AF(C).val();
if(B){return d
}c.push(d)
}}return c
}return(a.value||"").replace(/\r/g,"")
}return F
}if(typeof d==="number"){d+=""
}return this.each(function(){if(this.nodeType!=1){return 
}if(AF.isArray(d)&&/radio|checkbox/.test(this.type)){this.checked=(AF.inArray(this.value,d)>=0||AF.inArray(this.name,d)>=0)
}else{if(AF.nodeName(this,"select")){var f=AF.makeArray(d);
AF("option",this).each(function(){this.selected=(AF.inArray(this.value,f)>=0||AF.inArray(this.text,f)>=0)
});
if(!f.length){this.selectedIndex=-1
}}else{this.value=d
}}})
},html:function(A){return A===F?(this[0]?this[0].innerHTML.replace(/ jQuery\d+="(?:\d+|null)"/g,""):null):this.empty().append(A)
},replaceWith:function(A){return this.after(A).remove()
},eq:function(A){return this.slice(A,+A+1)
},slice:function(){return this.pushStack(Array.prototype.slice.apply(this,arguments),"slice",Array.prototype.slice.call(arguments).join(","))
},map:function(A){return this.pushStack(AF.map(this,function(B,C){return A.call(B,C,B)
}))
},andSelf:function(){return this.add(this.prevObject)
},domManip:function(e,b,c){if(this[0]){var A=(this[0].ownerDocument||this[0]).createDocumentFragment(),D=AF.clean(e,(this[0].ownerDocument||this[0]),A),B=A.firstChild;
if(B){for(var C=0,a=this.length;
C<a;
C++){c.call(d(this[C],B),this.length>1||C>0?A.cloneNode(true):A)
}}if(D){AF.each(D,O)
}}return this;
function d(g,f){return b&&AF.nodeName(g,"table")&&AF.nodeName(f,"tr")?(g.getElementsByTagName("tbody")[0]||g.appendChild(g.ownerDocument.createElement("tbody"))):g
}}};
AF.fn.init.prototype=AF.fn;
function O(A,B){if(B.src){AF.ajax({url:B.src,async:false,dataType:"script"})
}else{AF.globalEval(B.text||B.textContent||B.innerHTML||"")
}if(B.parentNode){B.parentNode.removeChild(B)
}}function H(){return +new Date
}AF.extend=AF.fn.extend=function(){var C=arguments[0]||{},b=1,a=arguments.length,D=false,c;
if(typeof C==="boolean"){D=C;
C=arguments[1]||{};
b=2
}if(typeof C!=="object"&&!AF.isFunction(C)){C={}
}if(a==b){C=this;
--b
}for(;
b<a;
b++){if((c=arguments[b])!=null){for(var A in c){var B=C[A],d=c[A];
if(C===d){continue
}if(D&&d&&typeof d==="object"&&!d.nodeType){C[A]=AF.extend(D,B||(d.length!=null?[]:{}),d)
}else{if(d!==F){C[A]=d
}}}}}return C
};
var K=/z-?index|font-?weight|opacity|zoom|line-?height/i,AC=document.defaultView||{},X=Object.prototype.toString;
AF.extend({noConflict:function(A){M.$=AE;
if(A){M.jQuery=Q
}return AF
},isFunction:function(A){return X.call(A)==="[object Function]"
},isArray:function(A){return X.call(A)==="[object Array]"
},isXMLDoc:function(A){return A.nodeType===9&&A.documentElement.nodeName!=="HTML"||!!A.ownerDocument&&AF.isXMLDoc(A.ownerDocument)
},globalEval:function(C){if(C&&/\S/.test(C)){var A=document.getElementsByTagName("head")[0]||document.documentElement,B=document.createElement("script");
B.type="text/javascript";
if(AF.support.scriptEval){B.appendChild(document.createTextNode(C))
}else{B.text=C
}A.insertBefore(B,A.firstChild);
A.removeChild(B)
}},nodeName:function(B,A){return B.nodeName&&B.nodeName.toUpperCase()==A.toUpperCase()
},each:function(a,b,c){var A,D=0,C=a.length;
if(c){if(C===F){for(A in a){if(b.apply(a[A],c)===false){break
}}}else{for(;
D<C;
){if(b.apply(a[D++],c)===false){break
}}}}else{if(C===F){for(A in a){if(b.call(a[A],A,a[A])===false){break
}}}else{for(var B=a[0];
D<C&&b.call(B,D,B)!==false;
B=a[++D]){}}}return a
},prop:function(A,a,B,C,D){if(AF.isFunction(a)){a=a.call(A,C)
}return typeof a==="number"&&B=="curCSS"&&!K.test(D)?a+"px":a
},className:{add:function(A,B){AF.each((B||"").split(/\s+/),function(D,C){if(A.nodeType==1&&!AF.className.has(A.className,C)){A.className+=(A.className?" ":"")+C
}})
},remove:function(A,B){if(A.nodeType==1){A.className=B!==F?AF.grep(A.className.split(/\s+/),function(C){return !AF.className.has(B,C)
}).join(" "):""
}},has:function(B,A){return B&&AF.inArray(A,(B.className||B).toString().split(/\s+/))>-1
}},swap:function(A,B,a){var D={};
for(var C in B){D[C]=A.style[C];
A.style[C]=B[C]
}a.call(A);
for(var C in B){A.style[C]=D[C]
}},css:function(b,A,C,D){if(A=="width"||A=="height"){var c,d={position:"absolute",visibility:"hidden",display:"block"},B=A=="width"?["Left","Right"]:["Top","Bottom"];
function a(){c=A=="width"?b.offsetWidth:b.offsetHeight;
if(D==="border"){return 
}AF.each(B,function(){if(!D){c-=parseFloat(AF.curCSS(b,"padding"+this,true))||0
}if(D==="margin"){c+=parseFloat(AF.curCSS(b,"margin"+this,true))||0
}else{c-=parseFloat(AF.curCSS(b,"border"+this+"Width",true))||0
}})
}if(b.offsetWidth!==0){a()
}else{AF.swap(b,d,a)
}return Math.max(0,Math.round(c))
}return AF.curCSS(b,A,C)
},curCSS:function(A,D,C){var c,a=A.style;
if(D=="opacity"&&!AF.support.opacity){c=AF.attr(a,"opacity");
return c==""?"1":c
}if(D.match(/float/i)){D=T
}if(!C&&a&&a[D]){c=a[D]
}else{if(AC.getComputedStyle){if(D.match(/float/i)){D="float"
}D=D.replace(/([A-Z])/g,"-$1").toLowerCase();
var b=AC.getComputedStyle(A,null);
if(b){c=b.getPropertyValue(D)
}if(D=="opacity"&&c==""){c="1"
}}else{if(A.currentStyle){var e=D.replace(/\-(\w)/g,function(g,f){return f.toUpperCase()
});
c=A.currentStyle[D]||A.currentStyle[e];
if(!/^\d+(px)?$/i.test(c)&&/^\d/.test(c)){var B=a.left,d=A.runtimeStyle.left;
A.runtimeStyle.left=A.currentStyle.left;
a.left=c||0;
c=a.pixelLeft+"px";
a.left=B;
A.runtimeStyle.left=d
}}}}return c
},clean:function(A,B,a){B=B||document;
if(typeof B.createElement==="undefined"){B=B.ownerDocument||B[0]&&B[0].ownerDocument||document
}if(!a&&A.length===1&&typeof A[0]==="string"){var b=/^<(\w+)\s*\/?>$/.exec(A[0]);
if(b){return[B.createElement(b[1])]
}}var c=[],C=[],d=B.createElement("div");
AF.each(A,function(h,e){if(typeof e==="number"){e+=""
}if(!e){return 
}if(typeof e==="string"){e=e.replace(/(<(\w+)[^>]*?)\/>/g,function(n,m,l){return l.match(/^(abbr|br|col|img|input|link|meta|param|hr|area|embed)$/i)?n:m+"></"+l+">"
});
var i=e.replace(/^\s+/,"").substring(0,10).toLowerCase();
var g=!i.indexOf("<opt")&&[1,"<select multiple='multiple'>","</select>"]||!i.indexOf("<leg")&&[1,"<fieldset>","</fieldset>"]||i.match(/^<(thead|tbody|tfoot|colg|cap)/)&&[1,"<table>","</table>"]||!i.indexOf("<tr")&&[2,"<table><tbody>","</tbody></table>"]||(!i.indexOf("<td")||!i.indexOf("<th"))&&[3,"<table><tbody><tr>","</tr></tbody></table>"]||!i.indexOf("<col")&&[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"]||!AF.support.htmlSerialize&&[1,"div<div>","</div>"]||[0,"",""];
d.innerHTML=g[1]+e+g[2];
while(g[0]--){d=d.lastChild
}if(!AF.support.tbody){var f=/<tbody/i.test(e),j=!i.indexOf("<table")&&!f?d.firstChild&&d.firstChild.childNodes:g[1]=="<table>"&&!f?d.childNodes:[];
for(var k=j.length-1;
k>=0;
--k){if(AF.nodeName(j[k],"tbody")&&!j[k].childNodes.length){j[k].parentNode.removeChild(j[k])
}}}if(!AF.support.leadingWhitespace&&/^\s/.test(e)){d.insertBefore(B.createTextNode(e.match(/^\s*/)[0]),d.firstChild)
}e=AF.makeArray(d.childNodes)
}if(e.nodeType){c.push(e)
}else{c=AF.merge(c,e)
}});
if(a){for(var D=0;
c[D];
D++){if(AF.nodeName(c[D],"script")&&(!c[D].type||c[D].type.toLowerCase()==="text/javascript")){C.push(c[D].parentNode?c[D].parentNode.removeChild(c[D]):c[D])
}else{if(c[D].nodeType===1){c.splice.apply(c,[D+1,0].concat(AF.makeArray(c[D].getElementsByTagName("script"))))
}a.appendChild(c[D])
}}return C
}return c
},attr:function(C,c,A){if(!C||C.nodeType==3||C.nodeType==8){return F
}var b=!AF.isXMLDoc(C),d=A!==F;
c=b&&AF.props[c]||c;
if(C.tagName){var B=/href|src|style/.test(c);
if(c=="selected"&&C.parentNode){C.parentNode.selectedIndex
}if(c in C&&b&&!B){if(d){if(c=="type"&&AF.nodeName(C,"input")&&C.parentNode){throw"type property can't be changed"
}C[c]=A
}if(AF.nodeName(C,"form")&&C.getAttributeNode(c)){return C.getAttributeNode(c).nodeValue
}if(c=="tabIndex"){var a=C.getAttributeNode("tabIndex");
return a&&a.specified?a.value:C.nodeName.match(/(button|input|object|select|textarea)/i)?0:C.nodeName.match(/^(a|area)$/i)&&C.href?0:F
}return C[c]
}if(!AF.support.style&&b&&c=="style"){return AF.attr(C.style,"cssText",A)
}if(d){C.setAttribute(c,""+A)
}var D=!AF.support.hrefNormalized&&b&&B?C.getAttribute(c,2):C.getAttribute(c);
return D===null?F:D
}if(!AF.support.opacity&&c=="opacity"){if(d){C.zoom=1;
C.filter=(C.filter||"").replace(/alpha\([^)]*\)/,"")+(parseInt(A)+""=="NaN"?"":"alpha(opacity="+A*100+")")
}return C.filter&&C.filter.indexOf("opacity=")>=0?(parseFloat(C.filter.match(/opacity=([^)]*)/)[1])/100)+"":""
}c=c.replace(/-([a-z])/ig,function(f,e){return e.toUpperCase()
});
if(d){C[c]=A
}return C[c]
},trim:function(A){return(A||"").replace(/^\s+|\s+$/g,"")
},makeArray:function(C){var B=[];
if(C!=null){var A=C.length;
if(A==null||typeof C==="string"||AF.isFunction(C)||C.setInterval){B[0]=C
}else{while(A){B[--A]=C[A]
}}}return B
},inArray:function(A,D){for(var C=0,B=D.length;
C<B;
C++){if(D[C]===A){return C
}}return -1
},merge:function(A,D){var C=0,B,a=A.length;
if(!AF.support.getAll){while((B=D[C++])!=null){if(B.nodeType!=8){A[a++]=B
}}}else{while((B=D[C++])!=null){A[a++]=B
}}return A
},unique:function(b){var c=[],A={};
try{for(var a=0,D=b.length;
a<D;
a++){var B=AF.data(b[a]);
if(!A[B]){A[B]=true;
c.push(b[a])
}}}catch(C){c=b
}return c
},grep:function(D,a,b){var C=[];
for(var B=0,A=D.length;
B<A;
B++){if(!b!=!a(D[B],B)){C.push(D[B])
}}return C
},map:function(a,b){var D=[];
for(var C=0,B=a.length;
C<B;
C++){var A=b(a[C],C);
if(A!=null){D[D.length]=A
}}return D.concat.apply([],D)
}});
var AA=navigator.userAgent.toLowerCase();
AF.browser={version:(AA.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/)||[0,"0"])[1],safari:/webkit/.test(AA),opera:/opera/.test(AA),msie:/msie/.test(AA)&&!/opera/.test(AA),mozilla:/mozilla/.test(AA)&&!/(compatible|webkit)/.test(AA)};
AF.each({parent:function(A){return A.parentNode
},parents:function(A){return AF.dir(A,"parentNode")
},next:function(A){return AF.nth(A,2,"nextSibling")
},prev:function(A){return AF.nth(A,2,"previousSibling")
},nextAll:function(A){return AF.dir(A,"nextSibling")
},prevAll:function(A){return AF.dir(A,"previousSibling")
},siblings:function(A){return AF.sibling(A.parentNode.firstChild,A)
},children:function(A){return AF.sibling(A.firstChild)
},contents:function(A){return AF.nodeName(A,"iframe")?A.contentDocument||A.contentWindow.document:AF.makeArray(A.childNodes)
}},function(A,B){AF.fn[A]=function(D){var C=AF.map(this,B);
if(D&&typeof D=="string"){C=AF.multiFilter(D,C)
}return this.pushStack(AF.unique(C),A,D)
}
});
AF.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(A,B){AF.fn[A]=function(D){var c=[],a=AF(D);
for(var b=0,C=a.length;
b<C;
b++){var d=(b>0?this.clone(true):this).get();
AF.fn[B].apply(AF(a[b]),d);
c=c.concat(d)
}return this.pushStack(c,A,D)
}
});
AF.each({removeAttr:function(A){AF.attr(this,A,"");
if(this.nodeType==1){this.removeAttribute(A)
}},addClass:function(A){AF.className.add(this,A)
},removeClass:function(A){AF.className.remove(this,A)
},toggleClass:function(B,A){if(typeof A!=="boolean"){A=!AF.className.has(this,B)
}AF.className[A?"add":"remove"](this,B)
},remove:function(A){if(!A||AF.filter(A,[this]).length){AF("*",this).add([this]).each(function(){AF.event.remove(this);
AF.removeData(this)
});
if(this.parentNode){this.parentNode.removeChild(this)
}}},empty:function(){AF(this).children().remove();
while(this.firstChild){this.removeChild(this.firstChild)
}}},function(A,B){AF.fn[A]=function(){return this.each(B,arguments)
}
});
function P(A,B){return A[0]&&parseInt(AF.curCSS(A[0],B,true),10)||0
}var E="jQuery"+H(),U=0,AD={};
AF.extend({cache:{},data:function(B,C,A){B=B==M?AD:B;
var D=B[E];
if(!D){D=B[E]=++U
}if(C&&!AF.cache[D]){AF.cache[D]={}
}if(A!==F){AF.cache[D][C]=A
}return C?AF.cache[D][C]:D
},removeData:function(B,C){B=B==M?AD:B;
var D=B[E];
if(C){if(AF.cache[D]){delete AF.cache[D][C];
C="";
for(C in AF.cache[D]){break
}if(!C){AF.removeData(B)
}}}else{try{delete B[E]
}catch(A){if(B.removeAttribute){B.removeAttribute(E)
}}delete AF.cache[D]
}},queue:function(B,C,D){if(B){C=(C||"fx")+"queue";
var A=AF.data(B,C);
if(!A||AF.isArray(D)){A=AF.data(B,C,AF.makeArray(D))
}else{if(D){A.push(D)
}}}return A
},dequeue:function(D,A){var C=AF.queue(D,A),B=C.shift();
if(!A||A==="fx"){B=C[0]
}if(B!==F){B.call(D)
}}});
AF.fn.extend({data:function(C,A){var D=C.split(".");
D[1]=D[1]?"."+D[1]:"";
if(A===F){var B=this.triggerHandler("getData"+D[1]+"!",[D[0]]);
if(B===F&&this.length){B=AF.data(this[0],C)
}return B===F&&D[1]?this.data(D[0]):B
}else{return this.trigger("setData"+D[1]+"!",[D[0],A]).each(function(){AF.data(this,C,A)
})
}},removeData:function(A){return this.each(function(){AF.removeData(this,A)
})
},queue:function(A,B){if(typeof A!=="string"){B=A;
A="fx"
}if(B===F){return AF.queue(this[0],A)
}return this.each(function(){var C=AF.queue(this,A,B);
if(A=="fx"&&C.length==1){C[0].call(this)
}})
},dequeue:function(A){return this.each(function(){AF.dequeue(this,A)
})
}});
(function(){var i=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^[\]]*\]|['"][^'"]*['"]|[^[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?/g,D=0,d=Object.prototype.toString;
var f=function(n,v,m,z){m=m||[];
v=v||document;
if(v.nodeType!==1&&v.nodeType!==9){return[]
}if(!n||typeof n!=="string"){return m
}var l=[],r,w,q,p,y,t,o=true;
i.lastIndex=0;
while((r=i.exec(n))!==null){l.push(r[1]);
if(r[2]){t=RegExp.rightContext;
break
}}if(l.length>1&&C.exec(n)){if(l.length===2&&c.relative[l[0]]){w=b(l[0]+l[1],v)
}else{w=c.relative[l[0]]?[v]:f(l.shift(),v);
while(l.length){n=l.shift();
if(c.relative[n]){n+=l.shift()
}w=b(n,w)
}}}else{var x=z?{expr:l.pop(),set:g(z)}:f.find(l.pop(),l.length===1&&v.parentNode?v.parentNode:v,j(v));
w=f.filter(x.expr,x.set);
if(l.length>0){q=g(w)
}else{o=false
}while(l.length){var s=l.pop(),u=s;
if(!c.relative[s]){s=""
}else{u=l.pop()
}if(u==null){u=v
}c.relative[s](q,u,j(v))
}}if(!q){q=w
}if(!q){throw"Syntax error, unrecognized expression: "+(s||n)
}if(d.call(q)==="[object Array]"){if(!o){m.push.apply(m,q)
}else{if(v.nodeType===1){for(var AI=0;
q[AI]!=null;
AI++){if(q[AI]&&(q[AI]===true||q[AI].nodeType===1&&a(v,q[AI]))){m.push(w[AI])
}}}else{for(var AI=0;
q[AI]!=null;
AI++){if(q[AI]&&q[AI].nodeType===1){m.push(w[AI])
}}}}}else{g(q,m)
}if(t){f(t,v,m,z);
if(e){hasDuplicate=false;
m.sort(e);
if(hasDuplicate){for(var AI=1;
AI<m.length;
AI++){if(m[AI]===m[AI-1]){m.splice(AI--,1)
}}}}}return m
};
f.matches=function(m,l){return f(m,null,null,l)
};
f.find=function(l,s,t){var m,o;
if(!l){return[]
}for(var p=0,q=c.order.length;
p<q;
p++){var n=c.order[p],o;
if((o=c.match[n].exec(l))){var r=RegExp.leftContext;
if(r.substr(r.length-1)!=="\\"){o[1]=(o[1]||"").replace(/\\/g,"");
m=c.find[n](o,s,t);
if(m!=null){l=l.replace(c.match[n],"");
break
}}}}if(!m){m=s.getElementsByTagName("*")
}return{set:m,expr:l}
};
f.filter=function(y,z,v,r){var t=y,q=[],AI=z,m,p,l=z&&z[0]&&j(z[0]);
while(y&&z.length){for(var n in c.filter){if((m=c.match[n].exec(y))!=null){var u=c.filter[n],s,w;
p=false;
if(AI==q){q=[]
}if(c.preFilter[n]){m=c.preFilter[n](m,AI,v,q,r,l);
if(!m){p=s=true
}else{if(m===true){continue
}}}if(m){for(var o=0;
(w=AI[o])!=null;
o++){if(w){s=u(w,m,o,AI);
var x=r^!!s;
if(v&&s!=null){if(x){p=true
}else{AI[o]=false
}}else{if(x){q.push(w);
p=true
}}}}}if(s!==F){if(!v){AI=q
}y=y.replace(c.match[n],"");
if(!p){return[]
}break
}}}if(y==t){if(p==null){throw"Syntax error, unrecognized expression: "+y
}else{break
}}t=y
}return AI
};
var c=f.selectors={order:["ID","NAME","TAG"],match:{ID:/#((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,CLASS:/\.((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF_-]|\\.)+)['"]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF_-]|\\.)+)\s*(?:(\S?=)\s*(['"]*)(.*?)\3|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*_-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\((even|odd|[\dn+-]*)\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^-]|$)/,PSEUDO:/:((?:[\w\u00c0-\uFFFF_-]|\\.)+)(?:\((['"]*)((?:\([^\)]+\)|[^\2\(\)]*)+)\2\))?/},attrMap:{"class":"className","for":"htmlFor"},attrHandle:{href:function(l){return l.getAttribute("href")
}},relative:{"+":function(l,s,m){var o=typeof s==="string",t=o&&!/\W/.test(s),n=o&&!t;
if(t&&!m){s=s.toUpperCase()
}for(var p=0,q=l.length,r;
p<q;
p++){if((r=l[p])){while((r=r.previousSibling)&&r.nodeType!==1){}l[p]=n||r&&r.nodeName===s?r||false:r===s
}}if(n){f.filter(s,l,true)
}},">":function(s,r,q){var m=typeof r==="string";
if(m&&!/\W/.test(r)){r=q?r:r.toUpperCase();
for(var o=0,p=s.length;
o<p;
o++){var l=s[o];
if(l){var n=l.parentNode;
s[o]=n.nodeName===r?n:false
}}}else{for(var o=0,p=s.length;
o<p;
o++){var l=s[o];
if(l){s[o]=m?l.parentNode:l.parentNode===r
}}if(m){f.filter(r,s,true)
}}},"":function(n,p,l){var o=D++,q=h;
if(!p.match(/\W/)){var m=p=l?p:p.toUpperCase();
q=k
}q("parentNode",p,o,n,m,l)
},"~":function(n,p,l){var o=D++,q=h;
if(typeof p==="string"&&!p.match(/\W/)){var m=p=l?p:p.toUpperCase();
q=k
}q("previousSibling",p,o,n,m,l)
}},find:{ID:function(l,o,n){if(typeof o.getElementById!=="undefined"&&!n){var m=o.getElementById(l[1]);
return m?[m]:[]
}},NAME:function(o,l,r){if(typeof l.getElementsByName!=="undefined"){var p=[],m=l.getElementsByName(o[1]);
for(var n=0,q=m.length;
n<q;
n++){if(m[n].getAttribute("name")===o[1]){p.push(m[n])
}}return p.length===0?null:p
}},TAG:function(m,l){return l.getElementsByTagName(m[1])
}},preFilter:{CLASS:function(n,r,o,p,s,q){n=" "+n[1].replace(/\\/g,"")+" ";
if(q){return n
}for(var m=0,l;
(l=r[m])!=null;
m++){if(l){if(s^(l.className&&(" "+l.className+" ").indexOf(n)>=0)){if(!o){p.push(l)
}}else{if(o){r[m]=false
}}}}return false
},ID:function(l){return l[1].replace(/\\/g,"")
},TAG:function(n,l){for(var m=0;
l[m]===false;
m++){}return l[m]&&j(l[m])?n[1]:n[1].toUpperCase()
},CHILD:function(m){if(m[1]=="nth"){var l=/(-?)(\d*)n((?:\+|-)?\d*)/.exec(m[2]=="even"&&"2n"||m[2]=="odd"&&"2n+1"||!/\D/.test(m[2])&&"0n+"+m[2]||m[2]);
m[2]=(l[1]+(l[2]||1))-0;
m[3]=l[3]-0
}m[0]=D++;
return m
},ATTR:function(m,p,o,q,l,r){var n=m[1].replace(/\\/g,"");
if(!r&&c.attrMap[n]){m[1]=c.attrMap[n]
}if(m[2]==="~="){m[4]=" "+m[4]+" "
}return m
},PSEUDO:function(m,p,o,q,l){if(m[1]==="not"){if(m[3].match(i).length>1||/^\w/.test(m[3])){m[3]=f(m[3],null,null,p)
}else{var n=f.filter(m[3],p,o,true^l);
if(!o){q.push.apply(q,n)
}return false
}}else{if(c.match.POS.test(m[0])||c.match.CHILD.test(m[0])){return true
}}return m
},POS:function(l){l.unshift(true);
return l
}},filters:{enabled:function(l){return l.disabled===false&&l.type!=="hidden"
},disabled:function(l){return l.disabled===true
},checked:function(l){return l.checked===true
},selected:function(l){l.parentNode.selectedIndex;
return l.selected===true
},parent:function(l){return !!l.firstChild
},empty:function(l){return !l.firstChild
},has:function(m,n,l){return !!f(l[3],m).length
},header:function(l){return/h\d/i.test(l.nodeName)
},text:function(l){return"text"===l.type
},radio:function(l){return"radio"===l.type
},checkbox:function(l){return"checkbox"===l.type
},file:function(l){return"file"===l.type
},password:function(l){return"password"===l.type
},submit:function(l){return"submit"===l.type
},image:function(l){return"image"===l.type
},reset:function(l){return"reset"===l.type
},button:function(l){return"button"===l.type||l.nodeName.toUpperCase()==="BUTTON"
},input:function(l){return/input|select|textarea|button/i.test(l.nodeName)
}},setFilters:{first:function(l,m){return m===0
},last:function(o,l,m,n){return l===n.length-1
},even:function(l,m){return m%2===0
},odd:function(l,m){return m%2===1
},lt:function(m,n,l){return n<l[3]-0
},gt:function(m,n,l){return n>l[3]-0
},nth:function(m,n,l){return l[3]-0==n
},eq:function(m,n,l){return l[3]-0==n
}},filter:{PSEUDO:function(s,o,n,r){var q=o[1],m=c.filters[q];
if(m){return m(s,n,o,r)
}else{if(q==="contains"){return(s.textContent||s.innerText||"").indexOf(o[3])>=0
}else{if(q==="not"){var l=o[3];
for(var n=0,p=l.length;
n<p;
n++){if(l[n]===s){return false
}}return true
}}}},CHILD:function(s,p){var m=p[1],r=s;
switch(m){case"only":case"first":while(r=r.previousSibling){if(r.nodeType===1){return false
}}if(m=="first"){return true
}r=s;
case"last":while(r=r.nextSibling){if(r.nodeType===1){return false
}}return true;
case"nth":var q=p[2],t=p[3];
if(q==1&&t==0){return true
}var n=p[0],u=s.parentNode;
if(u&&(u.sizcache!==n||!s.nodeIndex)){var o=0;
for(r=u.firstChild;
r;
r=r.nextSibling){if(r.nodeType===1){r.nodeIndex=++o
}}u.sizcache=n
}var l=s.nodeIndex-t;
if(q==0){return l==0
}else{return(l%q==0&&l/q>=0)
}}},ID:function(l,m){return l.nodeType===1&&l.getAttribute("id")===m
},TAG:function(l,m){return(m==="*"&&l.nodeType===1)||l.nodeName===m
},CLASS:function(l,m){return(" "+(l.className||l.getAttribute("class"))+" ").indexOf(m)>-1
},ATTR:function(l,n){var o=n[1],q=c.attrHandle[o]?c.attrHandle[o](l):l[o]!=null?l[o]:l.getAttribute(o),r=q+"",m=n[2],p=n[4];
return q==null?m==="!=":m==="="?r===p:m==="*="?r.indexOf(p)>=0:m==="~="?(" "+r+" ").indexOf(p)>=0:!p?r&&q!==false:m==="!="?r!=p:m==="^="?r.indexOf(p)===0:m==="$="?r.substr(r.length-p.length)===p:m==="|="?r===p||r.substr(0,p.length+1)===p+"-":false
},POS:function(m,p,o,l){var q=p[2],n=c.setFilters[q];
if(n){return n(m,o,p,l)
}}}};
var C=c.match.POS;
for(var A in c.match){c.match[A]=RegExp(c.match[A].source+/(?![^\[]*\])(?![^\(]*\))/.source)
}var g=function(l,m){l=Array.prototype.slice.call(l);
if(m){m.push.apply(m,l);
return m
}return l
};
try{Array.prototype.slice.call(document.documentElement.childNodes)
}catch(B){g=function(m,n){var p=n||[];
if(d.call(m)==="[object Array]"){Array.prototype.push.apply(p,m)
}else{if(typeof m.length==="number"){for(var o=0,l=m.length;
o<l;
o++){p.push(m[o])
}}else{for(var o=0;
m[o];
o++){p.push(m[o])
}}}return p
}
}var e;
if(document.documentElement.compareDocumentPosition){e=function(n,l){var m=n.compareDocumentPosition(l)&4?-1:n===l?0:1;
if(m===0){hasDuplicate=true
}return m
}
}else{if("sourceIndex" in document.documentElement){e=function(n,l){var m=n.sourceIndex-l.sourceIndex;
if(m===0){hasDuplicate=true
}return m
}
}else{if(document.createRange){e=function(n,p){var o=n.ownerDocument.createRange(),l=p.ownerDocument.createRange();
o.selectNode(n);
o.collapse(true);
l.selectNode(p);
l.collapse(true);
var m=o.compareBoundaryPoints(Range.START_TO_END,l);
if(m===0){hasDuplicate=true
}return m
}
}}}(function(){var n=document.createElement("form"),m="script"+(new Date).getTime();
n.innerHTML="<input name='"+m+"'/>";
var l=document.documentElement;
l.insertBefore(n,l.firstChild);
if(!!document.getElementById(m)){c.find.ID=function(o,r,q){if(typeof r.getElementById!=="undefined"&&!q){var p=r.getElementById(o[1]);
return p?p.id===o[1]||typeof p.getAttributeNode!=="undefined"&&p.getAttributeNode("id").nodeValue===o[1]?[p]:F:[]
}};
c.filter.ID=function(q,p){var o=typeof q.getAttributeNode!=="undefined"&&q.getAttributeNode("id");
return q.nodeType===1&&o&&o.nodeValue===p
}
}l.removeChild(n)
})();
(function(){var l=document.createElement("div");
l.appendChild(document.createComment(""));
if(l.getElementsByTagName("*").length>0){c.find.TAG=function(q,m){var n=m.getElementsByTagName(q[1]);
if(q[1]==="*"){var o=[];
for(var p=0;
n[p];
p++){if(n[p].nodeType===1){o.push(n[p])
}}n=o
}return n
}
}l.innerHTML="<a href='#'></a>";
if(l.firstChild&&typeof l.firstChild.getAttribute!=="undefined"&&l.firstChild.getAttribute("href")!=="#"){c.attrHandle.href=function(m){return m.getAttribute("href",2)
}
}})();
if(document.querySelectorAll){(function(){var m=f,l=document.createElement("div");
l.innerHTML="<p class='TEST'></p>";
if(l.querySelectorAll&&l.querySelectorAll(".TEST").length===0){return 
}f=function(n,o,q,p){o=o||document;
if(!p&&o.nodeType===9&&!j(o)){try{return g(o.querySelectorAll(n),q)
}catch(r){}}return m(n,o,q,p)
};
f.find=m.find;
f.filter=m.filter;
f.selectors=m.selectors;
f.matches=m.matches
})()
}if(document.getElementsByClassName&&document.documentElement.getElementsByClassName){(function(){var l=document.createElement("div");
l.innerHTML="<div class='test e'></div><div class='test'></div>";
if(l.getElementsByClassName("e").length===0){return 
}l.lastChild.className="e";
if(l.getElementsByClassName("e").length===1){return 
}c.order.splice(1,0,"CLASS");
c.find.CLASS=function(n,m,o){if(typeof m.getElementsByClassName!=="undefined"&&!o){return m.getElementsByClassName(n[1])
}}
})()
}function k(r,m,n,t,l,u){var v=r=="previousSibling"&&!u;
for(var p=0,q=t.length;
p<q;
p++){var s=t[p];
if(s){if(v&&s.nodeType===1){s.sizcache=n;
s.sizset=p
}s=s[r];
var o=false;
while(s){if(s.sizcache===n){o=t[s.sizset];
break
}if(s.nodeType===1&&!u){s.sizcache=n;
s.sizset=p
}if(s.nodeName===m){o=s;
break
}s=s[r]
}t[p]=o
}}}function h(r,m,n,t,l,u){var v=r=="previousSibling"&&!u;
for(var p=0,q=t.length;
p<q;
p++){var s=t[p];
if(s){if(v&&s.nodeType===1){s.sizcache=n;
s.sizset=p
}s=s[r];
var o=false;
while(s){if(s.sizcache===n){o=t[s.sizset];
break
}if(s.nodeType===1){if(!u){s.sizcache=n;
s.sizset=p
}if(typeof m!=="string"){if(s===m){o=true;
break
}}else{if(f.filter(m,[s]).length>0){o=s;
break
}}}s=s[r]
}t[p]=o
}}}var a=document.compareDocumentPosition?function(l,m){return l.compareDocumentPosition(m)&16
}:function(l,m){return l!==m&&(l.contains?l.contains(m):true)
};
var j=function(l){return l.nodeType===9&&l.documentElement.nodeName!=="HTML"||!!l.ownerDocument&&j(l.ownerDocument)
};
var b=function(p,s){var n=[],m="",l,o=s.nodeType?[s]:s;
while((l=c.match.PSEUDO.exec(p))){m+=l[0];
p=p.replace(c.match.PSEUDO,"")
}p=c.relative[p]?p+"*":p;
for(var r=0,q=o.length;
r<q;
r++){f(p,o[r],n)
}return f.filter(m,n)
};
AF.find=f;
AF.filter=f.filter;
AF.expr=f.selectors;
AF.expr[":"]=AF.expr.filters;
f.selectors.filters.hidden=function(l){return l.offsetWidth===0||l.offsetHeight===0
};
f.selectors.filters.visible=function(l){return l.offsetWidth>0||l.offsetHeight>0
};
f.selectors.filters.animated=function(l){return AF.grep(AF.timers,function(m){return l===m.elem
}).length
};
AF.multiFilter=function(m,l,n){if(n){m=":not("+m+")"
}return f.matches(m,l)
};
AF.dir=function(o,l){var m=[],n=o[l];
while(n&&n!=document){if(n.nodeType==1){m.push(n)
}n=n[l]
}return m
};
AF.nth=function(m,l,o,n){l=l||1;
var p=0;
for(;
m;
m=m[o]){if(m.nodeType==1&&++p==l){break
}}return m
};
AF.sibling=function(m,n){var l=[];
for(;
m;
m=m.nextSibling){if(m.nodeType==1&&m!=n){l.push(m)
}}return l
};
return ;
M.Sizzle=f
})();
AF.event={add:function(C,b,D,c){if(C.nodeType==3||C.nodeType==8){return 
}if(C.setInterval&&C!=M){C=M
}if(!D.guid){D.guid=this.guid++
}if(c!==F){var a=D;
D=this.proxy(a);
D.data=c
}var A=AF.data(C,"events")||AF.data(C,"events",{}),B=AF.data(C,"handle")||AF.data(C,"handle",function(){return typeof AF!=="undefined"&&!AF.event.triggered?AF.event.handle.apply(arguments.callee.elem,arguments):F
});
B.elem=C;
AF.each(b.split(/\s+/),function(d,g){var f=g.split(".");
g=f.shift();
D.type=f.slice().sort().join(".");
var e=A[g];
if(AF.event.specialAll[g]){AF.event.specialAll[g].setup.call(C,c,f)
}if(!e){e=A[g]={};
if(!AF.event.special[g]||AF.event.special[g].setup.call(C,c,f)===false){if(C.addEventListener){C.addEventListener(g,B,false)
}else{if(C.attachEvent){C.attachEvent("on"+g,B)
}}}}e[D.guid]=D;
AF.event.global[g]=true
});
C=null
},guid:1,global:{},remove:function(A,b,C){if(A.nodeType==3||A.nodeType==8){return 
}var c=AF.data(A,"events"),B,D;
if(c){if(b===F||(typeof b==="string"&&b.charAt(0)==".")){for(var a in c){this.remove(A,a+(b||""))
}}else{if(b.type){C=b.handler;
b=b.type
}AF.each(b.split(/\s+/),function(i,g){var e=g.split(".");
g=e.shift();
var h=RegExp("(^|\\.)"+e.slice().sort().join(".*\\.")+"(\\.|$)");
if(c[g]){if(C){delete c[g][C.guid]
}else{for(var f in c[g]){if(h.test(c[g][f].type)){delete c[g][f]
}}}if(AF.event.specialAll[g]){AF.event.specialAll[g].teardown.call(A,e)
}for(B in c[g]){break
}if(!B){if(!AF.event.special[g]||AF.event.special[g].teardown.call(A,e)===false){if(A.removeEventListener){A.removeEventListener(g,AF.data(A,"handle"),false)
}else{if(A.detachEvent){A.detachEvent("on"+g,AF.data(A,"handle"))
}}}B=null;
delete c[g]
}}})
}for(B in c){break
}if(!B){var d=AF.data(A,"handle");
if(d){d.elem=null
}AF.removeData(A,"events");
AF.removeData(A,"handle")
}}},trigger:function(a,A,b,C){var c=a.type||a;
if(!C){a=typeof a==="object"?a[E]?a:AF.extend(AF.Event(c),a):AF.Event(c);
if(c.indexOf("!")>=0){a.type=c=c.slice(0,-1);
a.exclusive=true
}if(!b){a.stopPropagation();
if(this.global[c]){AF.each(AF.cache,function(){if(this.events&&this.events[c]){AF.event.trigger(a,A,this.handle.elem)
}})
}}if(!b||b.nodeType==3||b.nodeType==8){return F
}a.result=F;
a.target=b;
A=AF.makeArray(A);
A.unshift(a)
}a.currentTarget=b;
var D=AF.data(b,"handle");
if(D){D.apply(b,A)
}if((!b[c]||(AF.nodeName(b,"a")&&c=="click"))&&b["on"+c]&&b["on"+c].apply(b,A)===false){a.result=false
}if(!C&&b[c]&&!a.isDefaultPrevented()&&!(AF.nodeName(b,"a")&&c=="click")){this.triggered=true;
try{b[c]()
}catch(d){}}this.triggered=false;
if(!a.isPropagationStopped()){var B=b.parentNode||b.ownerDocument;
if(B){AF.event.trigger(a,A,B,true)
}}},handle:function(A){var C,D;
A=arguments[0]=AF.event.fix(A||M.event);
A.currentTarget=this;
var c=A.type.split(".");
A.type=c.shift();
C=!c.length&&!A.exclusive;
var a=RegExp("(^|\\.)"+c.slice().sort().join(".*\\.")+"(\\.|$)");
D=(AF.data(this,"events")||{})[A.type];
for(var d in D){var b=D[d];
if(C||a.test(b.type)){A.handler=b;
A.data=b.data;
var B=b.apply(this,arguments);
if(B!==F){A.result=B;
if(B===false){A.preventDefault();
A.stopPropagation()
}}if(A.isImmediatePropagationStopped()){break
}}}},props:"altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode metaKey newValue originalTarget pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which".split(" "),fix:function(B){if(B[E]){return B
}var D=B;
B=AF.Event(D);
for(var C=this.props.length,a;
C;
){a=this.props[--C];
B[a]=D[a]
}if(!B.target){B.target=B.srcElement||document
}if(B.target.nodeType==3){B.target=B.target.parentNode
}if(!B.relatedTarget&&B.fromElement){B.relatedTarget=B.fromElement==B.target?B.toElement:B.fromElement
}if(B.pageX==null&&B.clientX!=null){var A=document.documentElement,b=document.body;
B.pageX=B.clientX+(A&&A.scrollLeft||b&&b.scrollLeft||0)-(A.clientLeft||0);
B.pageY=B.clientY+(A&&A.scrollTop||b&&b.scrollTop||0)-(A.clientTop||0)
}if(!B.which&&((B.charCode||B.charCode===0)?B.charCode:B.keyCode)){B.which=B.charCode||B.keyCode
}if(!B.metaKey&&B.ctrlKey){B.metaKey=B.ctrlKey
}if(!B.which&&B.button){B.which=(B.button&1?1:(B.button&2?3:(B.button&4?2:0)))
}return B
},proxy:function(B,A){A=A||function(){return B.apply(this,arguments)
};
A.guid=B.guid=B.guid||A.guid||this.guid++;
return A
},special:{ready:{setup:AB,teardown:function(){}}},specialAll:{live:{setup:function(A,B){AF.event.add(this,B[0],J)
},teardown:function(C){if(C.length){var B=0,A=RegExp("(^|\\.)"+C[0]+"(\\.|$)");
AF.each((AF.data(this,"events").live||{}),function(){if(A.test(this.type)){B++
}});
if(B<1){AF.event.remove(this,C[0],J)
}}}}}};
AF.Event=function(A){if(!this.preventDefault){return new AF.Event(A)
}if(A&&A.type){this.originalEvent=A;
this.type=A.type
}else{this.type=A
}this.timeStamp=H();
this[E]=true
};
function N(){return false
}function V(){return true
}AF.Event.prototype={preventDefault:function(){this.isDefaultPrevented=V;
var A=this.originalEvent;
if(!A){return 
}if(A.preventDefault){A.preventDefault()
}A.returnValue=false
},stopPropagation:function(){this.isPropagationStopped=V;
var A=this.originalEvent;
if(!A){return 
}if(A.stopPropagation){A.stopPropagation()
}A.cancelBubble=true
},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=V;
this.stopPropagation()
},isDefaultPrevented:N,isPropagationStopped:N,isImmediatePropagationStopped:N};
var L=function(A){var B=A.relatedTarget;
while(B&&B!=this){try{B=B.parentNode
}catch(C){B=this
}}if(B!=this){A.type=A.data;
AF.event.handle.apply(this,arguments)
}};
AF.each({mouseover:"mouseenter",mouseout:"mouseleave"},function(B,A){AF.event.special[A]={setup:function(){AF.event.add(this,B,L,A)
},teardown:function(){AF.event.remove(this,B,L)
}}
});
AF.fn.extend({bind:function(A,C,B){return A=="unload"?this.one(A,C,B):this.each(function(){AF.event.add(this,A,B||C,B&&C)
})
},one:function(A,D,B){var C=AF.event.proxy(B||D,function(a){AF(this).unbind(a,C);
return(B||D).apply(this,arguments)
});
return this.each(function(){AF.event.add(this,A,C,B&&D)
})
},unbind:function(B,A){return this.each(function(){AF.event.remove(this,B,A)
})
},trigger:function(A,B){return this.each(function(){AF.event.trigger(A,B,this)
})
},triggerHandler:function(B,C){if(this[0]){var A=AF.Event(B);
A.preventDefault();
A.stopPropagation();
AF.event.trigger(A,C,this[0]);
return A.result
}},toggle:function(C){var B=arguments,A=1;
while(A<B.length){AF.event.proxy(C,B[A++])
}return this.click(AF.event.proxy(C,function(D){this.lastToggle=(this.lastToggle||0)%A;
D.preventDefault();
return B[this.lastToggle++].apply(this,arguments)||false
}))
},hover:function(A,B){return this.mouseenter(A).mouseleave(B)
},ready:function(A){AB();
if(AF.isReady){A.call(document,AF)
}else{AF.readyList.push(A)
}return this
},live:function(C,A){var B=AF.event.proxy(A);
B.guid+=this.selector+C;
AF(document).bind(S(C,this.selector),this.selector,B);
return this
},die:function(B,A){AF(document).unbind(S(B,this.selector),A?{guid:A.guid+this.selector+B}:null);
return this
}});
function J(D){var C=RegExp("(^|\\.)"+D.type+"(\\.|$)"),A=true,B=[];
AF.each(AF.data(this,"events").live||[],function(a,c){if(C.test(c.type)){var b=AF(D.target).closest(c.data)[0];
if(b){B.push({elem:b,fn:c})
}}});
B.sort(function(a,b){return AF.data(a.elem,"closest")-AF.data(b.elem,"closest")
});
AF.each(B,function(){if(this.fn.call(this.elem,D,this.fn.data)===false){return(A=false)
}});
return A
}function S(B,A){return["live",B,A.replace(/\./g,"`").replace(/ /g,"|")].join(".")
}AF.extend({isReady:false,readyList:[],ready:function(){if(!AF.isReady){AF.isReady=true;
if(AF.readyList){AF.each(AF.readyList,function(){this.call(document,AF)
});
AF.readyList=null
}AF(document).triggerHandler("ready")
}}});
var R=false;
function AB(){if(R){return 
}R=true;
if(document.addEventListener){document.addEventListener("DOMContentLoaded",function(){document.removeEventListener("DOMContentLoaded",arguments.callee,false);
AF.ready()
},false)
}else{if(document.attachEvent){document.attachEvent("onreadystatechange",function(){if(document.readyState==="complete"){document.detachEvent("onreadystatechange",arguments.callee);
AF.ready()
}});
if(document.documentElement.doScroll&&M==M.top){(function(){if(AF.isReady){return 
}try{document.documentElement.doScroll("left")
}catch(A){setTimeout(arguments.callee,0);
return 
}AF.ready()
})()
}}}AF.event.add(M,"load",AF.ready)
}AF.each(("blur,focus,load,resize,scroll,unload,click,dblclick,mousedown,mouseup,mousemove,mouseover,mouseout,mouseenter,mouseleave,change,select,submit,keydown,keypress,keyup,error").split(","),function(B,A){AF.fn[A]=function(C){return C?this.bind(A,C):this.trigger(A)
}
});
AF(M).bind("unload",function(){for(var A in AF.cache){if(A!=1&&AF.cache[A].handle){AF.event.remove(AF.cache[A].handle.elem)
}}});
(function(){AF.support={};
var b=document.documentElement,a=document.createElement("script"),c=document.createElement("div"),A="script"+(new Date).getTime();
c.style.display="none";
c.innerHTML='   <link/><table></table><a href="/a" style="color:red;float:left;opacity:.5;">a</a><select><option>text</option></select><object><param/></object>';
var D=c.getElementsByTagName("*"),B=c.getElementsByTagName("a")[0];
if(!D||!D.length||!B){return 
}AF.support={leadingWhitespace:c.firstChild.nodeType==3,tbody:!c.getElementsByTagName("tbody").length,objectAll:!!c.getElementsByTagName("object")[0].getElementsByTagName("*").length,htmlSerialize:!!c.getElementsByTagName("link").length,style:/red/.test(B.getAttribute("style")),hrefNormalized:B.getAttribute("href")==="/a",opacity:B.style.opacity==="0.5",cssFloat:!!B.style.cssFloat,scriptEval:false,noCloneEvent:true,boxModel:null};
a.type="text/javascript";
try{a.appendChild(document.createTextNode("window."+A+"=1;"))
}catch(C){}b.insertBefore(a,b.firstChild);
if(M[A]){AF.support.scriptEval=true;
delete M[A]
}b.removeChild(a);
if(c.attachEvent&&c.fireEvent){c.attachEvent("onclick",function(){AF.support.noCloneEvent=false;
c.detachEvent("onclick",arguments.callee)
});
c.cloneNode(true).fireEvent("onclick")
}AF(function(){var d=document.createElement("div");
d.style.width=d.style.paddingLeft="1px";
document.body.appendChild(d);
AF.boxModel=AF.support.boxModel=d.offsetWidth===2;
document.body.removeChild(d).style.display="none"
})
})();
var T=AF.support.cssFloat?"cssFloat":"styleFloat";
AF.props={"for":"htmlFor","class":"className","float":T,cssFloat:T,styleFloat:T,readonly:"readOnly",maxlength:"maxLength",cellspacing:"cellSpacing",rowspan:"rowSpan",tabindex:"tabIndex"};
AF.fn.extend({_load:AF.fn.load,load:function(a,A,b){if(typeof a!=="string"){return this._load(a)
}var C=a.indexOf(" ");
if(C>=0){var B=a.slice(C,a.length);
a=a.slice(0,C)
}var D="GET";
if(A){if(AF.isFunction(A)){b=A;
A=null
}else{if(typeof A==="object"){A=AF.param(A);
D="POST"
}}}var c=this;
AF.ajax({url:a,type:D,dataType:"html",data:A,complete:function(d,e){if(e=="success"||e=="notmodified"){c.html(B?AF("<div/>").append(d.responseText.replace(/<script(.|\s)*?\/script>/g,"")).find(B):d.responseText)
}if(b){c.each(b,[d.responseText,e,d])
}}});
return this
},serialize:function(){return AF.param(this.serializeArray())
},serializeArray:function(){return this.map(function(){return this.elements?AF.makeArray(this.elements):this
}).filter(function(){return this.name&&!this.disabled&&(this.checked||/select|textarea/i.test(this.nodeName)||/text|hidden|password|search/i.test(this.type))
}).map(function(B,A){var C=AF(this).val();
return C==null?null:AF.isArray(C)?AF.map(C,function(D,a){return{name:A.name,value:D}
}):{name:A.name,value:C}
}).get()
}});
AF.each("ajaxStart,ajaxStop,ajaxComplete,ajaxError,ajaxSuccess,ajaxSend".split(","),function(A,B){AF.fn[B]=function(C){return this.bind(B,C)
}
});
var Z=H();
AF.extend({get:function(C,A,D,B){if(AF.isFunction(A)){D=A;
A=null
}return AF.ajax({type:"GET",url:C,data:A,success:D,dataType:B})
},getScript:function(A,B){return AF.get(A,null,B,"script")
},getJSON:function(B,A,C){return AF.get(B,A,C,"json")
},post:function(C,A,D,B){if(AF.isFunction(A)){D=A;
A={}
}return AF.ajax({type:"POST",url:C,data:A,success:D,dataType:B})
},ajaxSetup:function(A){AF.extend(AF.ajaxSettings,A)
},ajaxSettings:{url:location.href,global:true,type:"GET",contentType:"application/x-www-form-urlencoded",processData:true,async:true,xhr:function(){return M.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):new XMLHttpRequest()
},accepts:{xml:"application/xml, text/xml",html:"text/html",script:"text/javascript, application/javascript",json:"application/json, text/javascript",text:"text/plain",_default:"*/*"}},lastModified:{},ajax:function(c){c=AF.extend(true,c,AF.extend(true,{},AF.ajaxSettings,c));
var l,j=/=\?(&|$)/g,B,m,i=c.type.toUpperCase();
if(c.data&&c.processData&&typeof c.data!=="string"){c.data=AF.param(c.data)
}if(c.dataType=="jsonp"){if(i=="GET"){if(!c.url.match(j)){c.url+=(c.url.match(/\?/)?"&":"?")+(c.jsonp||"callback")+"=?"
}}else{if(!c.data||!c.data.match(j)){c.data=(c.data?c.data+"&":"")+(c.jsonp||"callback")+"=?"
}}c.dataType="json"
}if(c.dataType=="json"&&(c.data&&c.data.match(j)||c.url.match(j))){l="jsonp"+Z++;
if(c.data){c.data=(c.data+"").replace(j,"="+l+"$1")
}c.url=c.url.replace(j,"="+l+"$1");
c.dataType="script";
M[l]=function(q){m=q;
g();
d();
M[l]=F;
try{delete M[l]
}catch(p){}if(h){h.removeChild(o)
}}
}if(c.dataType=="script"&&c.cache==null){c.cache=false
}if(c.cache===false&&i=="GET"){var k=H();
var n=c.url.replace(/(\?|&)_=.*?(&|$)/,"$1_="+k+"$2");
c.url=n+((n==c.url)?(c.url.match(/\?/)?"&":"?")+"_="+k:"")
}if(c.data&&i=="GET"){c.url+=(c.url.match(/\?/)?"&":"?")+c.data;
c.data=null
}if(c.global&&!AF.active++){AF.event.trigger("ajaxStart")
}var C=/^(\w+:)?\/\/([^\/?#]+)/.exec(c.url);
if(c.dataType=="script"&&i=="GET"&&C&&(C[1]&&C[1]!=location.protocol||C[2]!=location.host)){var h=document.getElementsByTagName("head")[0];
var o=document.createElement("script");
o.src=c.url;
if(c.scriptCharset){o.charset=c.scriptCharset
}if(!l){var a=false;
o.onload=o.onreadystatechange=function(){if(!a&&(!this.readyState||this.readyState=="loaded"||this.readyState=="complete")){a=true;
g();
d();
o.onload=o.onreadystatechange=null;
h.removeChild(o)
}}
}h.appendChild(o);
return F
}var e=false;
var f=c.xhr();
if(c.username){f.open(i,c.url,c.async,c.username,c.password)
}else{f.open(i,c.url,c.async)
}try{if(c.data){f.setRequestHeader("Content-Type",c.contentType)
}if(c.ifModified){f.setRequestHeader("If-Modified-Since",AF.lastModified[c.url]||"Thu, 01 Jan 1970 00:00:00 GMT")
}f.setRequestHeader("X-Requested-With","XMLHttpRequest");
f.setRequestHeader("Accept",c.dataType&&c.accepts[c.dataType]?c.accepts[c.dataType]+", */*":c.accepts._default)
}catch(A){}if(c.beforeSend&&c.beforeSend(f,c)===false){if(c.global&&!--AF.active){AF.event.trigger("ajaxStop")
}f.abort();
return false
}if(c.global){AF.event.trigger("ajaxSend",[f,c])
}var b=function(r){if(f.readyState==0){if(D){clearInterval(D);
D=null;
if(c.global&&!--AF.active){AF.event.trigger("ajaxStop")
}}}else{if(!e&&f&&(f.readyState==4||r=="timeout")){e=true;
if(D){clearInterval(D);
D=null
}B=r=="timeout"?"timeout":!AF.httpSuccess(f)?"error":c.ifModified&&AF.httpNotModified(f,c.url)?"notmodified":"success";
if(B=="success"){try{m=AF.httpData(f,c.dataType,c)
}catch(p){B="parsererror"
}}if(B=="success"){var q;
try{q=f.getResponseHeader("Last-Modified")
}catch(p){}if(c.ifModified&&q){AF.lastModified[c.url]=q
}if(!l){g()
}}else{AF.handleError(c,f,B)
}d();
if(r){f.abort()
}if(c.async){f=null
}}}};
if(c.async){var D=setInterval(b,13);
if(c.timeout>0){setTimeout(function(){if(f&&!e){b("timeout")
}},c.timeout)
}}try{f.send(c.data)
}catch(A){AF.handleError(c,f,null,A)
}if(!c.async){b()
}function g(){if(c.success){c.success(m,B)
}if(c.global){AF.event.trigger("ajaxSuccess",[f,c])
}}function d(){if(c.complete){c.complete(f,B)
}if(c.global){AF.event.trigger("ajaxComplete",[f,c])
}if(c.global&&!--AF.active){AF.event.trigger("ajaxStop")
}}return f
},handleError:function(B,D,C,A){if(B.error){B.error(D,C,A)
}if(B.global){AF.event.trigger("ajaxError",[D,B,A])
}},active:0,httpSuccess:function(B){try{return !B.status&&location.protocol=="file:"||(B.status>=200&&B.status<300)||B.status==304||B.status==1223
}catch(A){}return false
},httpNotModified:function(A,C){try{var D=A.getResponseHeader("Last-Modified");
return A.status==304||D==AF.lastModified[C]
}catch(B){}return false
},httpData:function(a,B,C){var D=a.getResponseHeader("content-type"),b=B=="xml"||!B&&D&&D.indexOf("xml")>=0,A=b?a.responseXML:a.responseText;
if(b&&A.documentElement.tagName=="parsererror"){throw"parsererror"
}if(C&&C.dataFilter){A=C.dataFilter(A,B)
}if(typeof A==="string"){if(B=="script"){AF.globalEval(A)
}if(B=="json"){A=M["eval"]("("+A+")")
}}return A
},param:function(C){var A=[];
function D(b,a){A[A.length]=encodeURIComponent(b)+"="+encodeURIComponent(a)
}if(AF.isArray(C)||C.jquery){AF.each(C,function(){D(this.name,this.value)
})
}else{for(var B in C){if(AF.isArray(C[B])){AF.each(C[B],function(){D(B,this)
})
}else{D(B,AF.isFunction(C[B])?C[B]():C[B])
}}}return A.join("&").replace(/%20/g,"+")
}});
var AH={},AG,I=[["height","marginTop","marginBottom","paddingTop","paddingBottom"],["width","marginLeft","marginRight","paddingLeft","paddingRight"],["opacity"]];
function W(A,B){var C={};
AF.each(I.concat.apply([],I.slice(0,B)),function(){C[this]=A
});
return C
}AF.fn.extend({show:function(C,c){if(C){return this.animate(W("show",3),C,c)
}else{for(var b=0,A=this.length;
b<A;
b++){var D=AF.data(this[b],"olddisplay");
this[b].style.display=D||"";
if(AF.css(this[b],"display")==="none"){var d=this[b].tagName,B;
if(AH[d]){B=AH[d]
}else{var a=AF("<"+d+" />").appendTo("body");
B=a.css("display");
if(B==="none"){B="block"
}a.remove();
AH[d]=B
}AF.data(this[b],"olddisplay",B)
}}for(var b=0,A=this.length;
b<A;
b++){this[b].style.display=AF.data(this[b],"olddisplay")||""
}return this
}},hide:function(A,a){if(A){return this.animate(W("hide",3),A,a)
}else{for(var B=0,C=this.length;
B<C;
B++){var D=AF.data(this[B],"olddisplay");
if(!D&&D!=="none"){AF.data(this[B],"olddisplay",AF.css(this[B],"display"))
}}for(var B=0,C=this.length;
B<C;
B++){this[B].style.display="none"
}return this
}},_toggle:AF.fn.toggle,toggle:function(C,A){var B=typeof C==="boolean";
return AF.isFunction(C)&&AF.isFunction(A)?this._toggle.apply(this,arguments):C==null||B?this.each(function(){var D=B?C:AF(this).is(":hidden");
AF(this)[D?"show":"hide"]()
}):this.animate(W("toggle",3),C,A)
},fadeTo:function(B,C,A){return this.animate({opacity:C},B,A)
},animate:function(a,C,A,B){var D=AF.speed(C,A,B);
return this[D.queue===false?"each":"queue"](function(){var e=AF.extend({},D),c,d=this.nodeType==1&&AF(this).is(":hidden"),b=this;
for(c in a){if(a[c]=="hide"&&d||a[c]=="show"&&!d){return e.complete.call(this)
}if((c=="height"||c=="width")&&this.style){e.display=AF.css(this,"display");
e.overflow=this.style.overflow
}}if(e.overflow!=null){this.style.overflow="hidden"
}e.curAnim=AF.extend({},a);
AF.each(a,function(k,g){var h=new AF.fx(b,e,k);
if(/toggle|show|hide/.test(g)){h[g=="toggle"?d?"show":"hide":g](a)
}else{var i=g.toString().match(/^([+-]=)?([\d+-.]+)(.*)$/),f=h.cur(true)||0;
if(i){var l=parseFloat(i[2]),j=i[3]||"px";
if(j!="px"){b.style[k]=(l||1)+j;
f=((l||1)/h.cur(true))*f;
b.style[k]=f+j
}if(i[1]){l=((i[1]=="-="?-1:1)*l)+f
}h.custom(f,l,j)
}else{h.custom(f,g,"")
}}});
return true
})
},stop:function(A,B){var C=AF.timers;
if(A){this.queue([])
}this.each(function(){for(var D=C.length-1;
D>=0;
D--){if(C[D].elem==this){if(B){C[D](true)
}C.splice(D,1)
}}});
if(!B){this.dequeue()
}return this
}});
AF.each({slideDown:W("show",1),slideUp:W("hide",1),slideToggle:W("toggle",1),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"}},function(A,B){AF.fn[A]=function(D,C){return this.animate(B,D,C)
}
});
AF.extend({speed:function(A,D,B){var C=typeof A==="object"?A:{complete:B||!B&&D||AF.isFunction(A)&&A,duration:A,easing:B&&D||D&&!AF.isFunction(D)&&D};
C.duration=AF.fx.off?0:typeof C.duration==="number"?C.duration:AF.fx.speeds[C.duration]||AF.fx.speeds._default;
C.old=C.complete;
C.complete=function(){if(C.queue!==false){AF(this).dequeue()
}if(AF.isFunction(C.old)){C.old.call(this)
}};
return C
},easing:{linear:function(A,D,C,B){return C+B*A
},swing:function(A,D,C,B){return((-Math.cos(A*Math.PI)/2)+0.5)*B+C
}},timers:[],fx:function(A,B,C){this.options=B;
this.elem=A;
this.prop=C;
if(!B.orig){B.orig={}
}}});
AF.fx.prototype={update:function(){if(this.options.step){this.options.step.call(this.elem,this.now,this)
}(AF.fx.step[this.prop]||AF.fx.step._default)(this);
if((this.prop=="height"||this.prop=="width")&&this.elem.style){this.elem.style.display="block"
}},cur:function(B){if(this.elem[this.prop]!=null&&(!this.elem.style||this.elem.style[this.prop]==null)){return this.elem[this.prop]
}var A=parseFloat(AF.css(this.elem,this.prop,B));
return A&&A>-10000?A:parseFloat(AF.curCSS(this.elem,this.prop))||0
},custom:function(a,A,B){this.startTime=H();
this.start=a;
this.end=A;
this.unit=B||this.unit||"px";
this.now=this.start;
this.pos=this.state=0;
var D=this;
function C(b){return D.step(b)
}C.elem=this.elem;
if(C()&&AF.timers.push(C)&&!AG){AG=setInterval(function(){var c=AF.timers;
for(var b=0;
b<c.length;
b++){if(!c[b]()){c.splice(b--,1)
}}if(!c.length){clearInterval(AG);
AG=F
}},13)
}},show:function(){this.options.orig[this.prop]=AF.attr(this.elem.style,this.prop);
this.options.show=true;
this.custom(this.prop=="width"||this.prop=="height"?1:0,this.cur());
AF(this.elem).show()
},hide:function(){this.options.orig[this.prop]=AF.attr(this.elem.style,this.prop);
this.options.hide=true;
this.custom(this.cur(),0)
},step:function(B){var C=H();
if(B||C>=this.options.duration+this.startTime){this.now=this.end;
this.pos=this.state=1;
this.update();
this.options.curAnim[this.prop]=true;
var a=true;
for(var D in this.options.curAnim){if(this.options.curAnim[D]!==true){a=false
}}if(a){if(this.options.display!=null){this.elem.style.overflow=this.options.overflow;
this.elem.style.display=this.options.display;
if(AF.css(this.elem,"display")=="none"){this.elem.style.display="block"
}}if(this.options.hide){AF(this.elem).hide()
}if(this.options.hide||this.options.show){for(var A in this.options.curAnim){AF.attr(this.elem.style,A,this.options.orig[A])
}}this.options.complete.call(this.elem)
}return false
}else{var b=C-this.startTime;
this.state=b/this.options.duration;
this.pos=AF.easing[this.options.easing||(AF.easing.swing?"swing":"linear")](this.state,b,0,1,this.options.duration);
this.now=this.start+((this.end-this.start)*this.pos);
this.update()
}return true
}};
AF.extend(AF.fx,{speeds:{slow:600,fast:200,_default:400},step:{opacity:function(A){AF.attr(A.elem.style,"opacity",A.now)
},_default:function(A){if(A.elem.style&&A.elem.style[A.prop]!=null){A.elem.style[A.prop]=A.now+A.unit
}else{A.elem[A.prop]=A.now
}}}});
if(document.documentElement.getBoundingClientRect){AF.fn.offset=function(){if(!this[0]){return{top:0,left:0}
}if(this[0]===this[0].ownerDocument.body){return AF.offset.bodyOffset(this[0])
}var c=this[0].getBoundingClientRect(),C=this[0].ownerDocument,A=C.body,D=C.documentElement,d=D.clientTop||A.clientTop||0,B=D.clientLeft||A.clientLeft||0,a=c.top+(self.pageYOffset||AF.boxModel&&D.scrollTop||A.scrollTop)-d,b=c.left+(self.pageXOffset||AF.boxModel&&D.scrollLeft||A.scrollLeft)-B;
return{top:a,left:b}
}
}else{AF.fn.offset=function(){if(!this[0]){return{top:0,left:0}
}if(this[0]===this[0].ownerDocument.body){return AF.offset.bodyOffset(this[0])
}AF.offset.initialized||AF.offset.initialize();
var B=this[0],a=B.offsetParent,b=B,d=B.ownerDocument,f,D=d.documentElement,A=d.body,g=d.defaultView,c=g.getComputedStyle(B,null),e=B.offsetTop,C=B.offsetLeft;
while((B=B.parentNode)&&B!==A&&B!==D){f=g.getComputedStyle(B,null);
e-=B.scrollTop,C-=B.scrollLeft;
if(B===a){e+=B.offsetTop,C+=B.offsetLeft;
if(AF.offset.doesNotAddBorder&&!(AF.offset.doesAddBorderForTableAndCells&&/^t(able|d|h)$/i.test(B.tagName))){e+=parseInt(f.borderTopWidth,10)||0,C+=parseInt(f.borderLeftWidth,10)||0
}b=a,a=B.offsetParent
}if(AF.offset.subtractsBorderForOverflowNotVisible&&f.overflow!=="visible"){e+=parseInt(f.borderTopWidth,10)||0,C+=parseInt(f.borderLeftWidth,10)||0
}c=f
}if(c.position==="relative"||c.position==="static"){e+=A.offsetTop,C+=A.offsetLeft
}if(c.position==="fixed"){e+=Math.max(D.scrollTop,A.scrollTop),C+=Math.max(D.scrollLeft,A.scrollLeft)
}return{top:e,left:C}
}
}AF.offset={initialize:function(){if(this.initialized){return 
}var e=document.body,a=document.createElement("div"),C,D,c,B,d,b,A=e.style.marginTop,f='<div style="position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;"><div></div></div><table style="position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;" cellpadding="0" cellspacing="0"><tr><td></td></tr></table>';
d={position:"absolute",top:0,left:0,margin:0,border:0,width:"1px",height:"1px",visibility:"hidden"};
for(b in d){a.style[b]=d[b]
}a.innerHTML=f;
e.insertBefore(a,e.firstChild);
C=a.firstChild,D=C.firstChild,B=C.nextSibling.firstChild.firstChild;
this.doesNotAddBorder=(D.offsetTop!==5);
this.doesAddBorderForTableAndCells=(B.offsetTop===5);
C.style.overflow="hidden",C.style.position="relative";
this.subtractsBorderForOverflowNotVisible=(D.offsetTop===-5);
e.style.marginTop="1px";
this.doesNotIncludeMarginInBodyOffset=(e.offsetTop===0);
e.style.marginTop=A;
e.removeChild(a);
this.initialized=true
},bodyOffset:function(B){AF.offset.initialized||AF.offset.initialize();
var C=B.offsetTop,A=B.offsetLeft;
if(AF.offset.doesNotIncludeMarginInBodyOffset){C+=parseInt(AF.curCSS(B,"marginTop",true),10)||0,A+=parseInt(AF.curCSS(B,"marginLeft",true),10)||0
}return{top:C,left:A}
}};
AF.fn.extend({position:function(){var A=0,B=0,D;
if(this[0]){var C=this.offsetParent(),a=this.offset(),b=/^body|html$/i.test(C[0].tagName)?{top:0,left:0}:C.offset();
a.top-=P(this,"marginTop");
a.left-=P(this,"marginLeft");
b.top+=P(C,"borderTopWidth");
b.left+=P(C,"borderLeftWidth");
D={top:a.top-b.top,left:a.left-b.left}
}return D
},offsetParent:function(){var A=this[0].offsetParent||document.body;
while(A&&(!/^body|html$/i.test(A.tagName)&&AF.css(A,"position")=="static")){A=A.offsetParent
}return AF(A)
}});
AF.each(["Left","Top"],function(A,B){var C="scroll"+B;
AF.fn[C]=function(D){if(!this[0]){return null
}return D!==F?this.each(function(){this==M||this==document?M.scrollTo(!A?D:AF(M).scrollLeft(),A?D:AF(M).scrollTop()):this[C]=D
}):this[0]==M||this[0]==document?self[A?"pageYOffset":"pageXOffset"]||AF.boxModel&&document.documentElement[C]||document.body[C]:this[0][C]
}
});
AF.each(["Height","Width"],function(A,C){var a=A?"Left":"Top",B=A?"Right":"Bottom",D=C.toLowerCase();
AF.fn["inner"+C]=function(){return this[0]?AF.css(this[0],D,false,"padding"):null
};
AF.fn["outer"+C]=function(c){return this[0]?AF.css(this[0],D,false,c?"margin":"border"):null
};
var b=C.toLowerCase();
AF.fn[b]=function(c){return this[0]==M?document.compatMode=="CSS1Compat"&&document.documentElement["client"+C]||document.body["client"+C]:this[0]==document?Math.max(document.documentElement["client"+C],document.body["scroll"+C],document.documentElement["scroll"+C],document.body["offset"+C],document.documentElement["offset"+C]):c===F?(this.length?AF.css(this[0],b):null):this.css(b,typeof c==="string"?c:c+"px")
}
})
})();