{if $browser.compliance || $browser.ignore}
	{if $auth}
		<!--<div region="west" split="false" title="Menu" style="width:250px; overflow:auto;">
		-->		
		
		<!--</div>-->
	{capture name="page_script"}
	<script type="text/javascript">
	<!--
	$(function() {
		id_bin = '{$uidx.bin}';
		id_ivx = '{$uidx.ivx}';
		id_csr = '{$csrf}';
	});
	-->
	</script>
	{/capture}
	{else}
		{include file="auth.tpl"}
	{/if}
{else}
{include file="warning_browser.tpl"}
{/if}
