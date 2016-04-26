
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
			<a href="#t{$menu}" class="easyui-linkbutton" onclick="f_search({$menu},'search','lp_global')" plain="true" iconCls="icon-search">Search</a>
		</fieldset>
	</form>
{/if}
<div class="title-rpt">
		<legend>Laporan Global</legend>
		<div>	
			<table id="t{$menu}desc" class="plus_fetch t{$menu}desc 8132">
					<tr><td>Period</td><td> : </td><td >{$periodlabel}</td></tr>
					<tr><td>Tanggal Generate</td><td> : </td><td>{$cur_date}</td></tr>
			</table>
			<br/>
			{if !$tblo}
			<a href="#t{$menu}" class="easyui-linkbutton" onclick="dwld_rpt(8131)" plain="true" iconCls="icon-xls">Export</a>
			{/if}
		</div>	
	</div>
	
<br/>

<div id="lp_global">
{include file="home/8000/page_{$menu}_dat.tpl"}
</div>
<br/><br/><br/>
