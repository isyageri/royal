
{if !$tblo}
	<form id="fsearch" class="long">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Nama Pembeli</label><input type="text" class="postit customer_name"  value="" /><br />
				<label >Tanggal Penjualan</label><input type="text" class="postit date_nota_awal date"  value="" /> s/d <input type="text" class="postit date_nota_akhir date"  value="" /><br />
				
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}
<div class="title-rpt">
		<legend>Laporan Penjualan Harian</legend>
		<div>	
			<table id="t{$menu}desc" class="plus_fetch t{$menu}desc 8117">
					<tr><td>Period</td><td> : </td><td >{$periodlabel}</td></tr>
					<tr><td>Tanggal Generate</td><td> : </td><td>{$cur_date}</td></tr>
			</table>
			<br/>
			{if !$tblo}
			<a href="#t{$menu}" class="easyui-linkbutton" onclick="dwld_rpt(8110)" plain="true" iconCls="icon-xls">Export</a>
			{/if}
		</div>	
	</div>
	
<br/>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid t-rpt">{include file="home/8000/page_{$menu}_dat.tpl"}</table>
