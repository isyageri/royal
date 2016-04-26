<div class="title-rpt">
	<legend>Detail Penjualan Produk</legend>
	<br/>
	<div>
		<table>
			<tbody>
				<tr>
					<td>Tanggal</td>
					<td> : </td>
					<td>
						<strong>{$opt_nota_all.0.date_nota}</strong>
					</td>
				</tr>
				<tr>
					<td>Pembeli</td>
					<td> : </td>
					<td>
						<strong>{$opt_nota_all.0.nm}</strong>
					</td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>
<br/>
<br/>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Detail Penjualan Produk</legend>
			<legend class="just_add">Add Detail Penjualan Produk</legend>
			<label>&nbsp;</label><label class="hide">nota_id</label><input type="text" class="postit nota_id readonly short hide fix" readonly value="{$opt_nota_all.0.nota_id}" /><br />
			<label>&nbsp;</label><label class="hide">trx_cat_id</label><input type="text" class="postit trx_cat_id readonly short hide fix" readonly value="1" /><br />
			
			<label>&nbsp;</label><label class="hide">ph_id</label><input type="text" class="postit ph_id readonly short hide" id="pkey" readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Produk</label>
			<select type="text" class="postit product_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_stock_product item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Jumlah</label><input type="text" class="postit jml short not_null"  onkeyup="f_numbers(this); total_harga('#f{$menu}')" value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Harga</label><input type="text" class="postit harga not_null"  onkeyup="f_numbers(this); total_harga('#f{$menu}')" value="" /><br />
			<label>&nbsp;</label><label >Total Harga</label><input type="text" class="postit total_harga readonly ro_fix ro" readonly value="" /><br />
			<label>&nbsp;</label><label >Keterangan</label><textarea type="text" class="postit note wide"  value=""></textarea><br />
			
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}
