var tx_out	= 3000000 + 5000; // sync with php max_execution_time + 5 seconds network latency
var host 	= jQuery("#host-rib").text(),
	assets	= host+'__assets/',
	site = host+"index.php/";
var m_pid;
jQuery(function(){
  var viewPortWidth = $(window).width();
  if (viewPortWidth > 1900) {$('body').addClass('extraWide')}
  else if (viewPortWidth > 1400) {$('body').addClass('wide')}
  else if (viewPortWidth > 1000) {$('body').addClass('standard')}
  else if (viewPortWidth > 700) {$('body').addClass('narrow')}
  else {$('body').addClass('extraNarrow')}
  jQuery("#main-nav").on("click",".mmenu",function(){
	$elm = jQuery(this);
	FetchContent($elm);

  });
  jQuery("#nav-content").on("click",".mmenu",function(){
	$elm = jQuery(this);
	jQuery(".mmenu").removeClass("active");
	jQuery("#nav-content").addClass("hide");

	FetchContent($elm);


  });

    jQuery("form").delegate(".rib-save", "click", function () {
        var $savebtn = jQuery(this),
        url = $savebtn.attr("data-url"),
        $form = $savebtn.parents('form:first'),
		post = [];
		post.push({ name:'csrf_token', value: $('#csrf').val() });
		jQuery('.postit', $form).each(function() {
			var obj = this.className.split(' ')[1], val= '';
			if($(this).hasClass('date'))
			{
			   $(this).val($(this).datebox('getValue'));
			   
			}
			
			val = $(this).val();
			if(this.type=='checkbox') {
			post.push({name:obj, value:$(this).attr('checked') ? '1' : '0'});
			}
			else if(this.type=='radio')
			{
				if($(this).attr('checked')){post.push({name:obj, value: val});}
			}
			else {post.push({name:obj, value:val });}
		});
		
		fetch_with_no_target(url, post, function(resp){
			resp = jQuery.parseJSON(resp);
			
			if(resp.status=='success') {
				if(resp.action=="redirect")
				{
					window.location.href = getURL(resp.url);
				}
			}
			else{
				
				swal({
						title: "Fail to submit your data",
						text: resp.message,
						type: "warning",
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'OK'
						});
			}
		}); 
			
    });

  
  
});

function getURL(url)
{
	url = url.replace('#', '');
	return /http/ig.test(url) ? url : site+url;
}

function ts_out() {
	swal({
		title: "SESSION TIME OUT",
		text: "Your login session is over. Please back to login.",
		type: "error",
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'OK'
		},
		function(){
			window.location.href = host+"index.php/auth/o/";
		}
	);
	/* jQuery.messager.alert('SESSION TIME OUT',
		'Session login anda sudah tidak valid lagi, mohon login kembali',
		'error', function() {
			window.location.href = host+'index.php/auth/o/'+id_bin+'/'+id_ivx;
		}
	); */
}

function fetch(url, trg, data, callback) {
	var _$trg	= trg ==undefined ? $('.content-kiri') : $(trg),
		_data	= data==undefined ? null : data,
		_type	= data==undefined ? 'GET' : 'POST',
		_url 	= url.replace('#', ''),
		_cls	= 'loading4';
		_url	= /http/ig.test(_url) ? _url : site+_url;
	
	_$trg.empty().addClass(_cls);
	ajax = jQuery.ajax({
		type: _type,
		url : _url,
		data: _data,
		timeout: tx_out,
		success: function(resp) {
			_$trg.removeClass(_cls);
			if(resp=='expired') {
				ajax.abort();
				ts_out();
				
			}
			else {
				_$trg.html(resp);
				if(typeof callback=='function') callback(resp, status);
			};
		},
		error: function (jqXHR, textStatus, errorThrown) {
			_$trg.removeClass(_cls);
			if(textStatus=="timeout") {
				jax.abort();
				ts_out();
			}
			else {
				_$trg.html(jqXHR.responseText);
			}
		}
	});
};

function fetch_with_no_target(url, data, callback) {
	var _data	= data==undefined ? null : data,
		_type	= data==undefined ? 'GET' : 'POST',
		_url 	= url.replace('#', ''),
		_cls	= 'loading4';
		_url	= /http/ig.test(_url) ? _url : site+_url;
	
	ajax = jQuery.ajax({
		type: _type,
		url : _url,
		data: _data,
		timeout: tx_out,
		success: function(resp) {
			if(resp=='expired') {
				ajax.abort();
				ts_out();
				
			}
			else {
			
				if(typeof callback=='function') callback(resp);
			};
		},
		error: function (jqXHR, textStatus, errorThrown) {
			
			if(textStatus=="timeout") {
				ajax.abort();
				ts_out();
			}
			else {
				//alert("error")
			}
		}
	});
};

function FetchContent($elm, trg)
{
	var $trg	= trg == undefined ? $('#inner-content-rib').offset() : $(trg).offset();
	jQuery("#account-menu").hide();
	var url = jQuery("a:first-child",$elm).attr("href");
	fetch(url, null, null, function() {
		if(url == "#Portfolio/")
		{
			fetch_with_no_target("#Portfolio/GetSectorIndustryData/", null, function(chartJson){
				RenderChart(chartJson, "chartContainer");
			});
			
		}

		//$('body').animate({ scrollTop: $trg.top });
//		window.scrollTo($trg.left,$trg.top);
		window.scrollTo(0,570);
//        jQuery(window).scrollTop($('#kiri').offset().top);

	});
}

function RenderChart(chartJson, targetId)
{
	FusionCharts.ready(function(){
		var revenueChart = new FusionCharts(chartJson);
		revenueChart.render(targetId);
	});
}


function ShowMenu(elm,menuid,level){
	var $elm = jQuery(elm);
	var $elm_anchor = jQuery("a:first-child",$elm);
	var $menu = jQuery("#"+menuid);
	var pid = $menu.attr("class").split(" ")[0];
	var mid = menuid.split("_")[1];
	var $navContent = jQuery("#nav-content");
	var sm_pid = $elm.attr("class").split(" ")[1];
	var $navContentLv = [];
	m_pid = pid;
	jQuery("#"+pid).addClass("active");
	jQuery("#"+sm_pid).addClass("active");

    if(level==0)
    {
        var rect = elm.getBoundingClientRect();
        $navContent.css({left: ''+(rect.left+570)+'px', position:'absolute'});
    }

	for(i= level;i<2;i++)
	{
		$navContentLv[i+1] = jQuery("#nav-content-lv_"+(i+1)).empty().removeClass("w320");
		//jQuery("#nav-content-lv_"+(i+1)).empty().removeClass("w320");
	}
	
	var $desc = jQuery("#nav-content-desc").empty().removeClass("w320").removeClass("w640").removeClass("w960");
	if($elm.hasClass('IsParent'))
	{
		level++;
		var $subMenu = $navContentLv[level].addClass("w320");//jQuery("#nav-content-lv_"+level).addClass("w320");
		var $subMenuTag = "<ul class='submenu-ul'>";
		$ul = jQuery("#lv_"+level+"_"+mid);
		$ul.children('li').each(function() {
			var $mn = jQuery(this);
		    var $anchor = jQuery("a:first-child",$mn);
			$subMenuTag += "<li id=\"menu_"+
									$mn.attr("id").split("_")[1]+
									"\"onmouseout=\"DisposeMenu_content('"+
									$mn.attr("class").split(" ")[1]+
									"')\" onmouseover=\"ShowMenu(this,'"+
									$mn.attr("id")+"',"+level+")\" class='"+
									$mn.attr("class")+" submenu mmenu'><a href='"+
									$anchor.attr("href")+"' >"+$anchor.html()+"</a></li>";
		});
		$subMenuTag += "</ul>";
		$subMenuTag += "<div style='background-color:#E7EBF1;width:100%;padding:10px;'><strong>It's your world. Trade it.</strong></div>";
		$subMenu.html($subMenuTag);
	}
	var width = 960-(level*320);
	$desc.addClass("w"+width);
	$desc.html("<a href='"+$elm_anchor.attr("href")+"' >"+jQuery("#desc-"+menuid).html()+"</a>");
	$navContent.removeClass("hide");
}
function ShowMenuOnly(){
	jQuery("#"+m_pid).addClass("active");
	jQuery("#nav-content").removeClass("hide");
}
function DisposeMenu(){
	jQuery(".mmenu").removeClass("active");
	jQuery("#nav-content").addClass("hide");
}

function DisposeMenu_content(pid){
	jQuery("#"+pid).removeClass("active");
}

function addClass(elm, className)
{
	$(elm).addClass(className);
}
$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});