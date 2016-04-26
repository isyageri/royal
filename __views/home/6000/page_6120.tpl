
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tanggal</label><input type="text" class="postit date_alur_barang date"  value="" /><br />
			
				<label >Nama Barang</label><input type="text" class="postit barang_reff_name"  value="" /><br />
				
			
				<label>Kategori</label>
				<select type="text" class="postit trx_cat_id wide"  value=""> 
					<option value="">--Option--</option>
					{foreach from=$opt_kategori item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
				</select>
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Alur Barang</legend>
			<legend class="just_add">Add Alur Barang</legend>
			
			<label>&nbsp;</label><label class="hide">alur id</label><input type="text" id='pkey' class="postit fp_alur_barang_id readonly short hide " readonly value="" /><br />
			
			<label>&nbsp;</label><label class="mandatory">Tanggal</label><input type="text" class="postit date_alur_barang date not_null"  value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Perkiraan</label>
			<select type="text" class="postit trx_cat_id wide not_null"  value=""> 
					<option value="">--Option--</option>
					{foreach from=$opt_kategori item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br/>
			<label>&nbsp;</label><label class="mandatory">Nama Barang</label>
			<select type="text" class="postit barang_reff_id wide not_null"  value=""> 
					<option value="">--Option--</option>
					{foreach from=$opt_barang item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br/>
			<label>&nbsp;</label><label class="mandatory">Harga</label><input type="text" class="postit harga not_null" onkeyup="f_numbers(this); total_harga('#f{$menu}')" value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Jumlah</label><input type="text" class="postit jml not_null" onkeyup="f_float(this); total_harga('#f{$menu}')" value="" /><br />
			<label>&nbsp;</label><label >Total Harga</label><input type="text" class="postit total_harga ro ro_fix"  value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Modal</label>
			<select type="text" class="postit pasca_panen_id wide not_null"  value=""> 
					<option value="">--Option--</option>
					{foreach from=$opt_modal item=i}<option value="{$i.id}">{$i.tgl} {$i.nm}</option>{/foreach}
				</select>
				<br/>
			<label>&nbsp;</label><label class="mandatory">Uraian</label><textarea type="text" class="postit note wide not_null"   value=""></textarea><br />
			<!--<label>&nbsp;</label><label class="hide">ph id</label><input type="text" id='pkey' class="postit ph_id readonly short hide " readonly value="" /><br />
			<label>&nbsp;</label><label >Tanggal</label><input type="text" class="postit date_ph date"  value="" /><br />
			<label>&nbsp;</label><label >Uraian</label><textarea type="text" class="postit note wide"   value=""></textarea><br />
			
			<label>&nbsp;</label><label >Pembeli</label>
			<select type="text" class="postit customer_id wide"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_customer item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label >Produk</label>
			<select type="text" class="postit product_id wide"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_product item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			
			<label>&nbsp;</label><label >QTY</label><input type="text" class="postit jml" onkeyup="f_numbers(this)" value="" /><br />
			<label>&nbsp;</label><label >Harga</label><input type="text" class="postit harga" onkeyup="f_numbers(this)" value="" /><br />
			<label>&nbsp;</label><label >Kredit</label><input type="text" class="postit debet" onkeyup="f_numbers(this)" value="" /><br />
			<label>&nbsp;</label><label >Total Harga</label><input type="text" class="postit total_harga ro ro_fix" ro value="" /><br />
			
			<label>&nbsp;</label><label >Piutang</label><input type="text" class="utang ro ro_fix" value="" /><br />-->
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}