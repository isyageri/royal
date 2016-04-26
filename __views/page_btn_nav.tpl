{if isset($nav) && $nav}
<div class="paging-num">
	{if $nav.IsPrev}  
		<span class="navButton 1 page-num">First</span>
		<span class="page-num">...</span>
	{/if}
	
	{foreach from=$nav.pages item=p}
		{if $p==$nav.CurrentPage}
			<span  class="page-num active">{$p}</span>
		{else}
			<span class="navButton {$p} page-num">{$p}</span>
		{/if}
	{/foreach}
			
    {if $nav.IsNext}  
		<span class="page-num">...</span>
		<span class="navButton {$nav.TotalPage} page-num">Last</span>
	{/if}	    
</div>
<script type="text/javascript">
<!--
$(function() {
	$('span.navButton').click(function() {
		var page = this.className.split(' ')[1],
			post = [{ name:'csrf_token', value: $('#csrf').val()},
					{ name:'page', value: page }],
			targ = '#t'+{$menu},
			url  = '#chome/page/{$menu}/nav';
		
		fetch(url, targ, post, function() {
			$(window).resize();
		});
	});
});
-->
</script>
{/if}