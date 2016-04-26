{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label>User ID</label><input type="text" class="postit user_uid long" value="" /> <br />
				<label>Access Role</label><select class="postit usergroup_id" title="Group">
					<option value="">-- Options --</option>
					{foreach from=$user_group item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
				</select> <br />
				<center>{include file="home/page_btn_search.tpl"}</center>
		</fieldset>
	</form>
{/if}
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/9000/page_{$menu}_dat.tpl"}</table>
{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend>User</legend>
			<label class="hide">Usex ID</label><input type="text" id="pkey" class="postit usex_uid hide" readonly value="" /><br />
			<label class="mandatory">User ID</label><input type="text" class="postit user_uid wide readonly" readonly value="" /><br />
			<label>Password</label><input type="password" class="postit passwd wide readonly" readonly value="" /><br /><br />
			<label class="mandatory">Name</label><input type="text" class="postit user_name wide" value="" /><br />
			<label class="mandatory">Access Role</label><select class="postit usergroup_id" title="Group">
					<option value="">-- Options --</option>
					{foreach from=$user_group item=i}<option value="{$i.id}" {if isset($post.usergroup_id) && $i.id eq $post.usergroup_id}selected{/if}>{$i.nm}</option>{/foreach}
				</select> <br />
			<label class="mandatory">Status</label><select class="postit is_active" title="Status">
					<option value="t" {if isset($post.is_active) && $i.id eq $post.is_active}selected{/if}>Aktif</option>
					<option value="f" {if isset($post.is_active) && $i.id eq $post.is_active}selected{/if}>Tidak Aktif</option>
				</select> <br />
			<!--<label class="mandatory">NSR</label><select class="postit usergroup_id" title="Group">
					<option value="">-- Options --</option>
					{foreach from=$opt_nsr item=i}<option value="{$i.id}" {if isset($post.nsr_id) && $i.id eq $post.nsr_id}selected{/if}>{$i.nm}</option>{/foreach}
				</select> <br />
			-->{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}