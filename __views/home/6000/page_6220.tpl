
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose" >
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tanggal</label><input type="text" class="postit date_milk_split date"  value="" /><br />
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
<div class="title-rpt">
	<legend>Stock Jenis Susu</legend>

<table id="t6221" class="plus_fetch t6221 6221 cgrid">
			{include file="home/6000/page_6221_dat.tpl"}
</table>
</div><br/><br/>
<div class="title-rpt">
	<legend>Pembagian Susu</legend>
</div>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Pembagian Susu</legend>
			<legend class="just_add">Add Pembagian Susu</legend>
			<label>&nbsp;</label><label class="hide">milk_split_id</label><input type="text" class="postit milk_split_id readonly short hide" id="pkey" readonly value="" /><br />
			<label>&nbsp;</label><label  class="mandatory">Tanggal</label><input type="text" class="postit date_milk_split date not_null" value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Jenis Susu</label>
			<select type="text" class="postit milk_type_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_milk_type item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label class="mandatory">Jumlah</label><input type="text" class="postit jml short not_null" onkeyup="f_float(this)" value="" />Liter<br />
			<label>&nbsp;</label><label class="mandatory">Jumlah Siap Produksi</label><input type="text" class="postit jml_after short not_null" onkeyup="f_float(this)" value="" />Liter<br />
			
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}
<br/><br/>

