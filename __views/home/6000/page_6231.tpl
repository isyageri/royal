<div class="title-rpt">
	<legend>Detail Pembagian Produk</legend>
	<br/>
	<div>
		<table>
			<tbody>
				<tr>
					<td>Tanggal Supply</td>
					<td> : </td>
					<td>
						<strong>{$opt_supply.0.date_supply}</strong>
					</td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td> : </td>
					<td>
						<strong>{$opt_supply.0.jml} Liter</strong>
					</td>
				</tr>

				<tr>
					<td>Keterangan</td>
					<td> : </td>
					<td>
						<strong>{$opt_supply.0.note}</strong>
					</td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				
			</tbody>
		</table>
		<table id="t6232" class="plus_fetch t6232 6232 cgrid">
			{include file="home/6000/page_6232_dat.tpl"}
		</table>
		{if !$tblo}
			<a href="#t{$menu}" class="easyui-linkbutton" onclick="dwld_rpt(6231)" plain="true" iconCls="icon-xls">Export</a>
			{/if}
	</div>
</div>
<br/>

<br/>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Pembagian Produk</legend>
			<legend class="just_add">Add Pembagian Produk</legend>
			<label>&nbsp;</label><label class="hide">fp_distribution_id</label><input type="text" class="postit fp_distribution_id readonly short hide" id="pkey" readonly value="" /><br />
			
			<label>&nbsp;</label><label class="mandatory">Jenis Susu</label>
			<select type="text" class="postit milk_split_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_milk_type_prod item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Produk</label>
			<select type="text" class="postit product_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_product item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Jumlah Produk</label><input type="text" class="postit jml_product short not_null" onkeyup="f_numbers(this)" value="" /><input type="text" class="product_sat wide readonly ro ro_fix" readonly value="" /><br />
			
			<label>&nbsp;</label><label >Dari Jumlah Susu</label><input type="text" class="postit jml_susu short" onkeyup="f_numbers(this)" value="" />Liter<br />
			
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}
