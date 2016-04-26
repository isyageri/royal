function ns_filter(H,F,D,I){var E=D.replace(/\./g,"\\.");
if((!F)||(H.search(new RegExp(":\\/\\/[^\\/\\?]*"+E,"i"))==-1)){var A=":\\/\\/[^\\/\\?]*(";
for(var B=0;
B<I.length;
B++){var G=I[B].replace(/\./g,"\\.");
A=A+G+"|"
}var C=A.substring(0,A.length-1)+")";
myregexp=new RegExp(C,"i");
if(H.search(myregexp)!=-1){return true
}else{return false
}}else{return false
}}function ns_tracking(D,I,F,G,B){var H;
if((G=="adfarm.mediaplex.com")||(G=="altfarm.mediaplex.com")){H="/ad/lt/"
}else{H="/cm/lt/"
}var C=new Date();
var A=C.getTimezoneOffset()+C.getTime();
var E='<img src="http'+F+"://"+G+H+B+"?mpt="+A+"&mpcl="+escape(D)+"&mpvl="+escape(I)+'" border="0">';
document.write(E)
}function ns_landing(D,G,C,F,A,B,H,E){if((G!="")&&(ns_filter(G,C,F,A))){ns_tracking(D,G,B,H,E);
return true
}else{return false
}}function paid_filter(A,C){if((A.search(new RegExp(C[0][0]+"=([^\\"+C[0][1]+"]*)","i"))!=-1)){for(var B=1;
B<C.length;
B++){if(RegExp.$1.toLowerCase==C[B][1].toLowerCase){return true
}}return false
}else{return false
}}function mp_landing(){var F=document.URL;
var J=document.referrer;
var H="adfarm.mediaplex.com";
var G="s";
var I=true;
var E="mediaplex.com";
var A=new Array("yahoo.com","google","msn","aol.com","teoma","hotbot.com","altavista.com","overture","wisenut","netscape","freeserve","web.de","bluewin.ch","search.ch","toile.qc.ca","alltheweb.com","looksmart.com","ask.com","ask.co.uk","lycos.co.uk","lycos.com","freenet.de","shopping.freenet.de","t-online.de","shopping1.t-online.de","webkatalog.lycos.de","lycos.at","lycos.de","aol.de","aol.co.uk","tw.imagesearch.yahoo.com","images.aol.fr","lycos.fr","lycos.ca","advalvas.be","au.altavista.com","yellowpages.com.au","yatv.com","wps.yam.com","dir.yam.com",".ya.com","wanadoo.es","voila.fr","virgilio.it","terra.es","tiscali.fr","tiscali.it","libero.it","goeureka.com.au","bigpond.com","ww2.austronaut.at","www.pchome.com.tw","austronaut.at","dir.pchome.com.tw","ilse.nl","aon.at","free.fr","www.toile.com","news.baidu.com","baidu.com","seek.3721.com","page.zhongsou.com","cha.iask.com","search.sina.com.cn","www.sogou.com/dir/","so.sohu.com","nisearch.163.com","psearch.163.com","search.tom.com","sitesearch.tom.com","cn.websearch.yahoo.com","go.8848.com","sogou.com","yisou.com","cari.com.my","yehey.com","startpagina.nl",".pagina.nl","vinden.nl","lycos.nl","vindex.nl","zoeken.nl","ixquick.com","zoek.nl",".naver.com",".alexa.com","optonline.net","yahoo.com.jp","orange.co.uk","tw.search.yahoo.com","bing.com");
var C="7648-68706-14746-0";
var D=true;
var B=new Array;
B[0]=new Array("mpch","&");
B[1]=new Array("search","sem");
B[2]=new Array("display","ads");
B[3]=new Array("email","mail");
if((D)&&(paid_filter(F,B))){return 1
}else{ns_landing(F,J,I,E,A,G,H,C);
return 2
}}mp_landing();