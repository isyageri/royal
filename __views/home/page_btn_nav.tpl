{if isset($nav) && $nav}
<div class="paginate fkiri">Menampilkan hal #{$nav.pagec}/{$nav.pagel} ({$datx.tot} data)</div>
<div class="paginate fkanan right">
	{if $nav.pagel gt 1}<span class="navButton 1">First</span>{/if}
	{if $nav.pagec gt 2}<span class="navButton {$nav.pagep}">Previous</span>{/if}
	<span>{foreach from=$nav.pages item=p}<span class="navButton {$p}{if $p eq $nav.pagec} active{/if}">{$p}</span>{/foreach}</span>
	{if $nav.pagec neq $nav.pagel}<span class="navButton {$nav.pagen}">Next</span>{/if}
	{if $nav.pagec neq $nav.pagel}<span class="navButton {$nav.pagel}">Last</span>{/if}
</div>
<script type="text/javascript">
<!--
$(function() {
	$('span.navButton').click(function() {
		var page = this.className.split(' ')[1],
			post = [{ name:'csrf_token', value: $('#csrf').val()},
					{ name:'page', value: page }],
			targ = '#t'+{$menu},
			url  = '{$menu}/nav';
		$('input.postit', $('#fsearch')).each(function() {
			var elm = $(this), idx = this.className.split(' ')[1], val = '';
			if(elm.hasClass('date')) val = elm.datebox('getValue');
			else val = elm.val();
			if(val) post.push({ name:idx, value: val });
		});
		$('select.postit', $('#fsearch')).each(function() {
			var elm = $(this), idx = this.className.split(' ')[1], val = elm.val();
			if(val) post.push({ name:idx, value: val });
		});
		fetch(url, targ, post, function() {
			$('.easyui-linkbutton').linkbutton();
			$(window).resize();
		});
	});
});
-->
</script>
{/if}