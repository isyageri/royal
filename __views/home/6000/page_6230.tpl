
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose" >
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tanggal</label><input type="text" class="postit date_supply_awal date"  value="" />s/d <input type="text" class="postit date_supply_akhir date"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}
<div class="title-rpt">
	<legend>Stock Jenis Susu</legend>

<table id="t6221" class="plus_fetch t6221 6221 cgrid">
			{include file="home/6000/page_6221_dat.tpl"}
</table>
</div><br/><br/>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>
{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Data Pembagian Produk</legend>
			<legend class="just_add">Add Data Pembagian Produk</legend>
			
			<label>&nbsp;</label><label class="hide">fp distribusi id</label><input type="text" id='pkey' class="postit fp_distribution_id readonly short hide " readonly value="" /><br />	
			<label>&nbsp;</label><label class="mandatory">Tanggal Distribusi</label><input type="text" class="postit date_distribution date not_null"  value="" /><br />		
			<label>&nbsp;</label><label class="mandatory">Produk</label>
			<select type="text" class="postit product_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_product item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Jenis Susu</label>
			<select type="text" class="postit milk_type_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_stock_milk_split item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Jumlah Produk</label><input type="text" class="postit jml_product short not_null" onkeyup="f_numbers(this)" value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Dari Jumlah Susu</label><input type="text" class="postit jml_susu short" onkeyup="f_float(this)" value="" />Liter<br />
			
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}



