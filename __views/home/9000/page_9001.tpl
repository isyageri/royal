{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label>User Group</label><input type="text" class="postit user_group long" value="" />
				{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/9000/page_{$menu}_dat.tpl"}</table>
{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend>User Group</legend>
			<label class="hide">Group ID</label><input type="text" id="pkey" class="postit usergroup_id hide" value="" /><br />
			<label class="mandatory">Group Name</label><input type="text" class="postit user_group wide" value="" /><br />
			<label class="mandatory">Description</label><input type="text" class="postit user_group_desc wide" value="" /><br />
			<label class="mandatory">Status</label><select class="postit is_active wide" title="Status">
					<option value="t" {if isset($post.is_active)}selected{/if}>Aktif</option>
					<option value="f" {if isset($post.is_active)}selected{/if}>Tidak Aktif</option>
				</select><br />
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}