
{if isset($accord)}
	<div class="easyui-accordion" style="padding:1px;">
		
		{foreach from=$wmenu item=menu}
			{if isset($menu.child)}
			<div title="{$menu.menu}" style="overflow:auto;padding:10px;">
				{foreach from=$menu.child item=mmenu}
					<a href="#{$mmenu.controller}{$mmenu.menu_uid}/{$mmenu.menu|replace:' ':'_'}" class="wMenu easyui-linkbutton bold {$mmenu.flag}" icon="{$mmenu.icon_css}" plain="true" title="{$mmenu.menu}">{$mmenu.menu}</a><br />
				{/foreach}
			</div>
			{else}
			<a href="#{$menu.menu_uid}/{$menu.menu|replace:' ':'_'}" class="wMenu easyui-linkbutton bold {$menu.flag}" icon="{$menu.icon_css}" plain="true" title="{$menu.menu}">{$menu.menu}</a><br />
			{/if}
		
		{/foreach}
					
	</div>
{else}
<div style="padding:10px;">
	{foreach from=$wmenu item=menu}
		<a href="#{$menu.menu_uid}/{$menu.menu|replace:' ':'_'}" class="wMenu easyui-linkbutton bold {$menu.flag}" icon="{$menu.icon_css}" plain="true" title="{$menu.menu}">{$menu.menu}</a><br />	
	{/foreach}
		
</div>
{/if}
