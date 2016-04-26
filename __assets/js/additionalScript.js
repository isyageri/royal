function uploadFile(frm,trg)
{	
	trg = '#'+trg;
	frm = '#'+frm;
	$(trg).html('');
		$(trg).html('<img src="'+assets+'images/loading/loading_001.gif" alt="Uploading...."/>');
	$(frm).ajaxForm({
				target: trg
	}).submit();
}
function download(elm)
{
	var $elm = $(elm),
	url=$elm.attr('href');
	window.location.href = url;
	
}
function setcomboval(elm,trg)
{
	if($('#'+elm).val()!=undefined)
	{
		$('#'+trg).val($('#'+elm).val());
		$('#'+trg+'_text').val($("#"+elm+" option[value='"+$('#'+elm).val()+"']").text());
	}
}

function linkedcombo(obj, to,url) {
	var $me = $(obj),
		$to = $('#'+to),
		val = $me.val();
		
	$.get(site+url+'/'+val, function(resp) {
		if(resp=='1')
		{$to.empty().html('');}
		else
		{$to.empty().html(resp).trigger('change');}
	});
}

