
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tanggal Supply</label><input type="text" class="postit date_supply date"  value="" /><br />
				<label >Status Pembelian</label><select type="text" class="postit stat_cash wide"  value=""> 
					<option value="2">All</option>
					<option value="1">Lunas</option>
					<option value="3">Utang</option>
				</select><br/>
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}
<br/><br/>
<div class="title-rpt">
	<legend>Stock Supply Susu</legend>

<table id="t6222" class="plus_fetch t6222 6222 cgrid">
			{include file="home/6000/page_6222_dat.tpl"}
</table>
</div><br/><br/>

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Supply Susu</legend>
			<legend class="just_add">Add Supply Susu</legend>
			
			<label>&nbsp;</label><label class="hide">supply susu id</label><input type="text" id='pkey' class="postit fp_milk_supply_id readonly short hide " readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Tanggal Supply</label><input type="text" class="postit date_supply  not_null date"  value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Jumlah</label><input type="text" class="postit jml not_null"  onkeyup="f_float(this); total_harga('#f{$menu}')" value="" /> Liter<br />
			<label>&nbsp;</label><label class="mandatory">Harga</label><input type="text" class="postit harga not_null" onkeyup="f_numbers(this); total_harga('#f{$menu}')" value="" /><br />
			<label>&nbsp;</label><label >Total Harga</label><input type="text" class="postit total_harga ro ro_fix"  value="" /><br />
			<label>&nbsp;</label><label id="modal_supply" class="mandatory">Modal yang Digunakan</label>
			<select type="text" id="dd_supply" class="postit pasca_panen_id wide not_null readonly chch"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_pasca_panen item=i}<option value="{$i.id}">{$i.dt} {$i.nm}</option>{/foreach}
			</select><input type="checkbox" id="check_utang" class="postit is_utang" onchange="makeDisable()">utang<br />
			<label>&nbsp;</label><label class="mandatory">Keterangan</label><textarea type="text" class="postit note wide"  value=""><textarea/><br />

			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}