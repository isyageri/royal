
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose" >
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tanggal</label><input type="text" class="postit date_nota_search date"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="plus_fetch t{$menu} 6320 cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Penjualan Harian</legend>
			<legend class="just_add">Add Penjualan Harian</legend>
			
			<label>&nbsp;</label><label class="hide">nota id</label><input type="text" id='pkey' class="postit nota_id readonly short hide" readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Tanggal</label><input type="text" class="postit date_nota date not_null"  value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Pembeli</label>
			<select type="text" class="postit customer_id wide not_null"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_customer item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
			</select><br />
			<label>&nbsp;</label><label >Total Harga</label><input type="text" class="postit total_harga readonly ro ro_fix" readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Uraian</label><textarea type="text" class="postit note wide not_null"   value=""></textarea><br />

			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}
<br/><br/>
<div class="additional_data">
</div>
<br/><br/><br/>

