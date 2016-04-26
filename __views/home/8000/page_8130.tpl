
{if !$tblo}
	<form id="fsearch" class="long">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label >Tahun</label>
				<select type="text" class="postit year wide"  value=""> 
				<option value="">--Option--</option>
				{foreach from=$opt_year item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
				</select><br />
				<label >Bulan</label>
				<select type="text" class="postit month wide"  value=""> 
				<option value="">--Option--</option>
				<option value="01">Januari</option>
				<option value="02">Februari</option>
				<option value="03">Maret</option>
				<option value="04">April</option>
				<option value="05">Mei</option>
				<option value="06">Juni</option>
				<option value="07">Juli</option>
				<option value="08">Agustus</option>
				<option value="09">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
				</select><br />
				<label >Minggu Ke</label>
				<select type="text" class="postit minggu_ke wide"  value=""> 
				<option value="">--Option--</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				</select><br />
			{include file="home/page_btn_search.tpl"}
		</fieldset>
	</form>
{/if}
<div class="title-rpt">
		<legend>Laporan Kas</legend>
		<div>	
			<table id="t{$menu}desc" class="plus_fetch t{$menu}desc 8137">
					<tr><td>Period</td><td> : </td><td >{$periodlabel}</td></tr>
					<tr><td>Tanggal Generate</td><td> : </td><td>{$cur_date}</td></tr>
			</table>
			<br/>
			{if !$tblo}
			<a href="#t{$menu}" class="easyui-linkbutton" onclick="dwld_rpt(8130)" plain="true" iconCls="icon-xls">Export</a>
			{/if}
		</div>	
	</div>
	
<br/>

<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/8000/page_{$menu}_dat.tpl"}</table>
<br/><br/><br/>