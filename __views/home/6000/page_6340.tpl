
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
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="plus_fetch t{$menu} 6340 cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

<br/><br/>
<div class="additional_data">
</div>
<br/><br/><br/>

