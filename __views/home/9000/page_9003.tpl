{if !$tblo}
	<div id="f{$menu}">
	<form id="fsearch" class="long">
		<fieldset class="expose">
			<legend>Select Group Access</legend>
			<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
			<label>Group Access</label>
				<select id="pkey" class="postit usergroup_id" title="User Group">
					<option value="">--Option--</option>
					{foreach from=$user_group item=i}<option value="{$i.id}" {if isset($post.usergroup_id) && $post.usergroup_id eq '$i.id'}selected{/if}>{$i.nm}</option>{/foreach}
				</select> {include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/9000/page_{$menu}_dat.tpl"}</table>
{if !$tblo}
</div>
{/if}