<br clear="all" />
<div {*id="mmenu_"*} style="padding:2px; border:1px solid white; background:url({$host}__assets/images/navir_bg.png);">
	<a href="#" class="easyui-linkbutton bold fkanan" icon="icon-clock" plain="true">{$wib|date_format:"%e-%b-%Y"}</a>
	{if $auth}
		<a href="#" plain="true" class="easyui-menubutton bold fkanan"  menu="#mm1" icon="icon-user">{$auth.user_name}</a>
		<div id="mm1" style="width:150px;">  
			<div icon="icon-login"><a href="{$url}999" plain="true">Change Password</a></div>
			<div class="menu-sep"></div>
			<div icon="icon-logout"><a href="{$url}auth/o" plain="true">Logout</a></div>
		</div>
		<a href="{$url}home" class="easyui-linkbutton bold {if $cmenu eq 'Home'}hover{/if}" plain="true" icon="icon-home">HOME</a>
		{foreach from=$mmenu item=menu}
			<a href="{$url}{$menu.menu_uid}/{$menu.menu|replace:' ':'_'}" class="easyui-linkbutton bold {if $menu.menu_uid eq $cmenu}hover{/if}" icon="{$menu.icon_css}" plain="true" title="{$menu.menu_app}">{$menu.menu}</a>
		{/foreach}	
		
	{/if}
	<br clear="all" />
</div>