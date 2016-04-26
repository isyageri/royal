/* equal heights function - manual call */
function equalHeightBoxesManual(){

	var b;
	if($(".content").siblings(".sidebar").length>0){
		b=$(".section").filter(function(){return $(this).find(".cont-lg, .cont-fl").length===0})
	}
	else{
		b=$(".section").filter(function(){return $(this).parent(".column-2").length===0&&$(this).find(".cont-half").length===0&&$(this).find(".cont-fl").length===0&&$(this).find(".expand").length===0})
	}
	
	b.each(function(){
		// touch clarity legacy code
		// if($(this).find("div.tcContent").length>0){	
		if($(this).find("div.tcContent").length===100){		
			//do nothing
		}
		else{
			var a=0;var d=0;$(this).find(".mod").each(function(){
			var c=$(this).height();if(c>a){a=c}var f=$(this).find(".rt").height();
			if(f>d){d=f}});$(this).find(".mod").css({'min-height':a+'px'});;
			$(this).children().find(".rt").css({'min-height':d+'px'});
			}})
}
		
$(document).ready(function() {
equalHeightBoxesManual();
});

// re-try the function for dynamic content that takes a while to load
setTimeout( function() {
equalHeightBoxesManual();
}, 10000);

