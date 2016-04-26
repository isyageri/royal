
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Nama Type Susu</label><input type="text" class="postit milk_type_name"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/1000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Type Susu</legend>
			<legend class="just_add">Add Type Susu</legend>
			
			<label>&nbsp;</label><label class="hide">Type Susu id</label><input type="text" id='pkey' class="postit milk_type_id readonly short hide " readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Nama Tipe Susu</label><input type="text" class="postit milk_type_name wide not_null"  value="" /><br />

			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}