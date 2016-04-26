
{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<!--<label >Tanggal</label><input type="text" class="postit date_nota date"  value="" /><br />-->
				<label >Nama Customer</label><input type="text" class="postit customer_name"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/8000/page_{$menu}_dat.tpl"}</table>
<div class="additional_data">

</div>
<br/><br/><br/>