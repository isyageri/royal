var tx_out	= 3000000 + 5000; // sync with php max_execution_time + 5 seconds network latency
var host 	= jQuery("#host-rib").text(),
	assets	= host+'__assets/',
	site = host+"index.php/",
	f_act = '';
var m_pid;
jQuery(function(){
  var viewPortWidth = $(window).width();
  if (viewPortWidth > 1900) {$('body').addClass('extraWide')}
  else if (viewPortWidth > 1400) {$('body').addClass('wide')}
  else if (viewPortWidth > 1000) {$('body').addClass('standard')}
  else if (viewPortWidth > 700) {$('body').addClass('narrow')}
  else {$('body').addClass('extraNarrow')}
  jQuery("#main-navigation-menu").on("click",".mmenu",function(){
	$elm = jQuery(this);
	FetchContent($elm);

  });
  InitForm();
});

function getURL(url)
{
	url = url.replace('#', '');
	return /http/ig.test(url) ? url : site+url;
}

function InitForm()
{
	jQuery('.rib-date').each(function() {
		jQuery(this).val(parseToUIDate(jQuery(this).val()));
	});
	jQuery("form").delegate(".rib-save", "click", function () {
        var $savebtn = jQuery(this),
        url = $savebtn.attr("data-url")+f_act,
		eRR 	= 0,
        $form = $savebtn.parents('form:first'),
		post = [];
		
		if(!$savebtn.hasClass('no-validate'))
		{
			$('input, select, textarea', $form).each(function() {
			var _elm = $(this).removeClass('error');
			_elm.prev().removeClass('error');
			eRR += f_validate(_elm);
			});
		
		}
		
		if(eRR) {
			swal({
					title: "Error",
					text: "Invalid value on red lined field. It is mandatory or your input is incorrect.",
					type: "error",
					confirmButtonColor: '#DD6B55',
					confirmButtonText: 'OK'
				});
			return false;
		}
		else {
		
		
		
			if($savebtn.hasClass('upd'))
			{
				url = $savebtn.attr("data-url") + "upd";
			}
			
			post.push({ name:'csrf_token', value: $('#csrf').val() });
			jQuery('.postit', $form).each(function() {
				var obj = this.className.split(' ')[1], val= '';
				
				val = $(this).val();
				
				if($(this).hasClass('rib-date'))
				{
				   val = parseToDBDate(val);
				   
				}
				
				if(this.type=='checkbox') {
				post.push({name:obj, value:$(this).attr('checked') ? '1' : '0'});
				}
				else if(this.type=='radio')
				{
					if($(this).attr('checked')){post.push({name:obj, value: val});}
				}
				else {post.push({name:obj, value:val });}
			});
			
			if($savebtn.hasClass('hastable')) {
				$form.hide().prev().removeClass('hide').show();
			}
			
			fetch_with_notification(url, post, $savebtn, $form);
		}	
    });
}

function fetch_with_notification(url, post, $savebtn, $form)
{
	$savebtn.attr({disabled:true});
	fetch_with_no_target(url, post, function(resp){
		$savebtn.removeAttr('disabled');
		callback(resp, url, post, $savebtn, $form);		
	}); 
}

function fetch_with_upload(url, post, $savebtn, $form)
{
	$savebtn.attr({disabled:true});
	fetch_upload(url, post, function(resp){
		$savebtn.removeAttr('disabled');
		callback(resp, url, post, $savebtn, $form);		
	}); 
}


function callback(resp, url, post, $savebtn, $form)
{
	resp = jQuery.parseJSON(resp);
				
	if(resp.status=='success') {
		
		if(resp.action=="notify")
		{
			swal({
				title: "Success",
				text: resp.message,
				type: "success",
				confirmButtonColor: '#6BDD55',
				confirmButtonText: 'OK'
				},
				function(){
					if(resp.hasOwnProperty('url')){
						if(resp.hasOwnProperty('target')){
							fetch(resp.url, resp.target, null, function() {
								jQuery(".date").datepicker();
								InitForm();
							});
						}
						else
						{
							window.location.href = getURL(resp.url);
						}
						
					}
				}
				);
		}
		
		if(resp.action=="info")
		{
			swal({
				title: resp.title,
				text: resp.message,
				type: "info",
				confirmButtonText: 'OK'
				}, function(){
					if($savebtn.hasClass('hastable')) {
						$form.show().prev().addClass('hide').hide();
					}
				});
		}
		
		if(resp.action == "confirm")
		{
			swal({
					title: "Are you sure?",
					text: resp.message,
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: '#6BDD55',
					confirmButtonText: 'Yes',
					cancelButtonText: "No",
					closeOnConfirm: false,
					closeOnCancel: true
				},
				function(isConfirm){
				if (isConfirm){
				  if(resp.hasOwnProperty('url')){
						fetch_with_notification(resp.url, post, $savebtn, $form);
					}
				}
				else
				{
					if($savebtn.hasClass('hastable')) {
						$form.show().prev().addClass('hide').hide();
					}
					
				}
				});
			
		}
		
		if(resp.action=="redirect")
		{
			window.location.href = getURL(resp.url);
		}
		
		if(resp.action=="upload")
		{
			console.log($form);
			var formData = new FormData($("#f201")[0]);
			fetch_with_upload(resp.url, formData, $savebtn, $form);
		}
	}
	else if(resp.status=='warning')
	{
		swal({
				title: "Warning",
				text: resp.message,
				type: "warning",
				confirmButtonText: 'OK'
				}, function(){
					if($savebtn.hasClass('hastable')) {
						$form.show().prev().addClass('hide').hide();
					}
				});
	}
	else{
	
		if($savebtn.hasClass('hastable')) {
			$form.show().prev().addClass('hide').hide();
		}
		
		swal({
				title: "Error",
				text: resp.message,
				type: "error",
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'OK'
				});
	}
}

function parseToDBDate(date)
{
	var date = date.split("-");
	if(date.length>1)
	{	
		return date[2]+"-"+date[1]+"-"+date[0];
	}
	else
	{
		return date;
	}
}
function parseToUIDate(date)
{
	var date = date.split("-");
	if(date.length>1)
	{	
		return date[2]+"-"+date[1]+"-"+date[0];
	}
	else
	{
		return date;
	}
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
			alert("tes");//window.location.href = host+'index.php/auth/o/'+id_bin+'/'+id_ivx;
		}
	); */
}

function fetch(url, trg, data, callback) {
	var _$trg	= trg ==undefined ? $('#wf-container') : $(trg),
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
				alert("something wrong!");
			}
		}
	});
};

function FetchContent($elm, trg)
{
	var url = jQuery("a:first-child",$elm).attr("href");
	fetch(url, '#wf-container', null, function() {
		jQuery(".date").datepicker();
		InitForm();
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

function f_open(elm, event) {
	var $me		= $(elm),
		$fuid	= null,
		$tuid	= '';
	f_uid	= $me.attr('href');
	f_act	= $me.hasClass('upd') ? 'upd' : 'add';
	$fuid	= $(f_uid);
	$tuid	= $(f_uid.replace('f', 't'));
	if($me.hasClass('upd')) {
		$tds = $me.parents('tr:first').children();
		$tds.each(function() {
			var elm = this.className.split(' ')[0],
				val = $(this).html().replace(/&nbsp;/g, '');
			if(elm && $('.'+elm, $fuid).length) {
				var __elm = $('.'+elm, $fuid);
				__elm.val(val).trigger('change');
				if(__elm.hasClass('ro')) __elm.attr({readonly:true, disabled:true}).addClass('readonly');
				
				/*modul survey kalo belum survey boleh isi jumlah ap 29 10 2012*/
				if(__elm.hasClass('date')) __elm.datebox('setValue', val);
				/* ini sebelumnya biar ap survey ga boleh di edit jika setelah di survey
				if(__elm.hasClass('date_survey') ){
					if(val!='' ){
						$('.ap_survey', $fuid).attr({readonly:true, disabled:true}).addClass('readonly');
					}
				}
				*/
				
			}
		});
		$('.just_upd').show();
		$('.just_add').hide();
	}
	else {
		$('input,select,textarea', $fuid).each(function() {
			if(!jQuery(this).hasClass("keepit"))
			{
				$(this).val('').removeClass('error readonly').removeAttr('readonly disabled').prev().removeClass('validated error');
			}
			
		});
		$('.just_upd').hide();
		$('.just_add').show();
	}
	$tuid.hide().next().removeClass('hide').show();
	$(window).resize();
};

function WithdrawTypeChanged(elm)
{
	$elm = jQuery(elm);
	if($elm.val()==1 || $elm.val()=='1') 
	{jQuery("#Withdraw").attr({readonly:true, disabled:true}).addClass('readonly');}
	else
	{
		jQuery("#Withdraw").val('').removeClass('error readonly').removeAttr('readonly disabled').prev().removeClass('validated error');
	}
}

function f_validate($obj) {
	var err = 0,
		val = $.trim($obj.val()),
		$lbl = jQuery("label:eq(0)",$obj.prev()),
		invalid = /^.+@.+\..{2,3}$/ ,
		illegal = /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
	if($obj.is(':visible') ) {
		// if($obj.hasClass('date'))
		// {
		   // $obj.val($obj.datebox('getValue'));
		   // val = $obj.val();
		// }
		if($lbl.hasClass('error')) err = 1;
		if($lbl.hasClass('mandatory') && !val) err = 1;
		if($obj.hasClass('numeric') && val && isNaN(parseFloat(val))) err = 1;
		if($obj.hasClass('number')  && val && isNaN(parseInt(val))) err = 1;
		if($obj.hasClass('nonZero') && parseFloat(format_number(val))==0.00) err = 1;
		if($obj.hasClass('email') && val && (!invalid.test(val) || val.match(illegal))) err = 1;
		if($obj.hasClass('unique') && $obj.is(':disabled') == false) {
			if(!lbl.hasClass('validated')) err = 1;
		}
		if(err) $obj.addClass('error');
	}
	return err;
};

function Upload(url, formID, $savebtn, $form)
{
	url = url.replace('#', '');
	url	= /http/ig.test(url) ? url : site + url;
	var formData = new FormData($(formID)[0]);
	jQuery.ajax({
		url: url,
		type: 'POST',
		data: formData,
		async: false,
		success: function (data) {
			data = jQuery.parseJSON(data);
			
			if(data.status=='success') {
			
				if(data.action=="notify")
				{
					swal({
						title: "Success",
						text: data.message,
						type: "success",
						confirmButtonColor: '#6BDD55',
						confirmButtonText: 'OK'
						},
						function(){
							if(data.hasOwnProperty('url')){
								if(resp.hasOwnProperty('target')){
									fetch(resp.url, resp.target, null, function() {
										jQuery(".date").datepicker();
										InitForm();
									});
								}
								else
								{
									window.location.href = getURL(resp.url);
								}
							}
						}
						);
				}
				
				if(data.action=="redirect")
				{
					window.location.href = getURL(data.url);
				}
			}
			else{
				
				if($savebtn.hasClass('hastable')) {
					$form.show().prev().addClass('hide').hide();
				}
				
				swal({
						title: "Error Message",
						text: data.message,
						type: "error",
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'OK'
						});
			}
		},
		cache: false,
		contentType: false,
		processData: false
	});
}

function fetch_upload(url, data, callback) {
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
		async: false,
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
				alert("something wrong!");
			}
		},
		cache: false,
		contentType: false,
		processData: false
	});
};

function back(elm)
{
	var $backbtn = jQuery(elm),
    $form = $backbtn.parents('form:first');
	$form.hide().prev().removeClass('hide').show();
}