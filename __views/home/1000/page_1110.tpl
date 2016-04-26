
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Nama Produk</label><input type="text" class="postit product_name"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/1000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Produk</legend>
			<legend class="just_add">Add Produk</legend>
			
			<label>&nbsp;</label><label class="hide">product id</label><input type="text" id='pkey' class="postit product_id readonly short hide " readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Perkiraan</label>
			<select type="text" class="postit trx_cat_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_trx_cat item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Nama Produk</label><input type="text" class="postit product_name wide not_null"  value="" /><br />
			<label>&nbsp;</label><label >Satuan</label><input type="text" class="postit product_sat wide"  value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Harga</label><input type="text" class="postit harga wide not_null" onkeyup="f_numbers(this)" value="" /><br />
			<label>&nbsp;</label><label >Deskripsi</label><input type="text" class="postit product_desc wide"   value=""/><br />
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}