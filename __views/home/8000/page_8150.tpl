
{if !$tblo}
	<form id="fsearch" class="long">
		<fieldset class="expose post_extend" >
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Nama Barang</label><input type="text" class="postit barang_reff_name"  value="" /><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}
<div class="title-rpt">
		<legend>Laporan Stock Barang</legend>
		<div>	
			<table id="t{$menu}desc">
					<tr><td>Tanggal Generate</td><td> : </td><td>{$cur_date}</td></tr>
			</table>
			<br/>
			{if !$tblo}
			<a href="#t{$menu}" class="easyui-linkbutton" onclick="dwld_rpt(8150)" plain="true" iconCls="icon-xls">Export</a>
			{/if}
		</div>	
	</div>
<br/>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid t-rpt">{include file="home/8000/page_{$menu}_dat.tpl"}</table>
<br/><br/>


