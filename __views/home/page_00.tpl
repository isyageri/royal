{if $browser.compliance || $browser.ignore}
	{if $auth}
	<div style="height:100%; margin:5px; background:url({$host}__assets/images/siswifi_bg.png);">
	</div>
	{else}
		{include file="auth.tpl"}
	{/if}
{else}
{include file="warning_browser.tpl"}
{/if}