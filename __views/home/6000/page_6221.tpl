<div class="title-rpt">
	<legend>Detail Pembagian Jenis Susu</legend>
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
			<legend class="just_upd">Edit Pembagian Susu</legend>
			<legend class="just_add">Add Pembagian Susu</legend>
			<label>&nbsp;</label><label class="hide">fp_milk_supply_id</label><input type="text" class="postit fp_milk_supply_id readonly short hide fix" readonly value="{$opt_supply.0.fp_milk_supply_id}" /><br />
			<label>&nbsp;</label><label class="hide">milk_split_id</label><input type="text" class="postit milk_split_id readonly short hide" id="pkey" readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Jenis Susu</label>
			<select type="text" class="postit milk_type_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_milk_type item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Jumlah</label><input type="text" class="postit jml short not_null" onkeyup="f_numbers(this)" value="" />Liter<br />
			<label>&nbsp;</label><label >Jumlah Siap Produksi</label><input type="text" class="postit jml_after short" onkeyup="f_numbers(this)" value="" />Liter<br />
			
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}
