
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Nama Customer</label><input type="text" class="postit customer_name"  value="" /><br />
				<label >Alamat</label><input type="text" class="postit customer_address"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/1000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Customer</legend>
			<legend class="just_add">Add Customer</legend>
			
			<label>&nbsp;</label><label class="hide">customer id</label><input type="text" id='pkey' class="postit customer_id readonly short hide " readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Nama Customer</label><input type="text" class="postit customer_name wide not_null"  value="" /><br />
			<label>&nbsp;</label><label >Alamat</label><input type="text" class="postit customer_address wide"   value=""/><br />
			<label>&nbsp;</label><label >No. Telepon</label><input type="text" class="postit customer_phone wide"   value=""/><br />
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}