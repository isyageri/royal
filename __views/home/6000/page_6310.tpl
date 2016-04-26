{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tanggal</label><input type="text" class="postit date_pasca_panen date"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Data Modal</legend>
			<legend class="just_add">Add Data Modal</legend>
			
			<label>&nbsp;</label><label class="hide">pasca id</label><input type="text" id='pkey' class="postit pasca_panen_id readonly short hide " readonly value="" /><br />	
			<label>&nbsp;</label><label class="mandatory">Tanggal</label><input type="text" class="postit date_pasca_panen date not_null"  value="" /><br />		
			<label>&nbsp;</label><label class="mandatory">Nama Modal</label><input type="text" class="postit modal_name not_null" value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Modal</label><input type="text" class="postit modal not_null" onkeyup="f_numbers(this)" value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Uraian</label><textarea type="text" class="postit modal_desc wide not_null"   value=""></textarea><br />
			
			
			<!--<label>&nbsp;</label><label >Kategori Modal</label>
			<select type="text" class="postit cat"  value=""> 
					<option value="0">Modal Barang</option>
					<option value="1">Modal Gaji</option>
			</select><br/>-->
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}