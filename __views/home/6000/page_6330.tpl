{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tanggal</label><input type="text" class="postit date_pengeluaran_produksi_awal date"  value="" />s/d <input type="text" class="postit date_pengeluaran_produksi_akhir date"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Data Pengeluaran Produksi</legend>
			<legend class="just_add">Add Data Pengeluaran Produksi</legend>
			
			<label>&nbsp;</label><label class="hide">pengeluaran produksi id</label><input type="text" id='pkey' class="postit fp_pengeluaran_produksi_id readonly short hide " readonly value="" /><br />	
			<label>&nbsp;</label><label class="mandatory">Modal yang Digunakan</label>
			<select type="text" class="postit pasca_panen_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_pasca_panen item=i}<option value="{$i.id}">{$i.dt} {$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Perkiraan</label>
			<select type="text" class="postit trx_cat_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_kategori item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Tanggal</label><input type="text" class="postit date_pengeluaran_produksi date not_null"  value="" /><br />		
			<label>&nbsp;</label><label class="mandatory">Jumlah</label><input type="text" class="postit jml not_null" onkeyup="f_numbers(this); total_harga('#f{$menu}')" value="" /><br />
			<label>&nbsp;</label><label>Satuan</label><input type="text" class="postit satuan"  value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Harga</label><input type="text" class="postit harga not_null" onkeyup="f_numbers(this); total_harga('#f{$menu}')" value="" /><br />
			<label>&nbsp;</label><label >Total Harga</label><input type="text" class="postit total_harga ro ro_fix"  value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Uraian</label><textarea type="text" class="postit note wide not_null"   value=""></textarea><br />
			
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}