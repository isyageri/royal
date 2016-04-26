
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tanggal</label><input type="text" class="postit date_pengeluaran_barang date"  value="" /><br />
				<label >Nama Barang</label><input type="text" class="postit barang_reff_name"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Penggunaan Barang</legend>
			<legend class="just_add">Add Penggunaan Barang</legend>
			
			<label>&nbsp;</label><label class="hide">pengeluaran id</label><input type="text" id='pkey' class="postit fp_pengeluaran_barang_id readonly short hide " readonly value="" /><br />
			
			<label>&nbsp;</label><label class="mandatory">Tanggal</label><input type="text" class="postit date_pengeluaran_barang date not_null"  value="" /><br />
		
			<label>&nbsp;</label><label class="mandatory">Nama Barang</label>
			<select type="text" class="postit barang_reff_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_stock_barang item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Jumlah</label><input type="text" class="postit jml not_null" onkeyup="f_float(this)" value="" /><br />
			<label>&nbsp;</label><label >Keterangan</label><textarea type="text" class="postit note wide"   value=""></textarea><br />
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}