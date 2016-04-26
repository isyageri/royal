
{if !$tblo}
	<form id="fsearch" class="long">
		<fieldset class="expose post_extend" >
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tanggal Supply dan Bagi Susu</label><input type="text" class="postit date_supply_awal date"  value="" />
				s/d
				<input type="text" class="postit date_supply_akhir date"  value="" />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}

<div class="title-rpt">
		<legend>Laporan Supply dan Pembagian Susu</legend>
		<div>	
			<table id="t{$menu}desc" class="plus_fetch t{$menu}desc 8194">
					<tr><td>Period</td><td> : </td><td >{$periodlabel}</td></tr>
					<tr><td>Tanggal Generate</td><td> : </td><td>{$cur_date}</td></tr>
			</table>
			<br/>
			{if !$tblo}
			<a href="#t{$menu}" class="easyui-linkbutton" onclick="dwld_rpt(8193)" plain="true" iconCls="icon-xls">Export</a>
			{/if}
		</div>	
	</div>
<br/>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid t-rpt">{include file="home/8000/page_{$menu}_dat.tpl"}</table>
<br/><br/>

