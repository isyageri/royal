
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Nama Perkiraan</label><input type="text" class="postit trx_cat_desc"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/1000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Perkiraan</legend>
			<legend class="just_add">Add Perkiraan</legend>
			
			<label>&nbsp;</label><label class="hide">perkiraan id</label><input type="text" id='pkey' class="postit trx_cat_id readonly short hide " readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Nama Perkiraan</label><input type="text" class="postit trx_cat_desc wide not_null"  value="" /><br />
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}