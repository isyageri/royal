
{if !$tblo}
	<form id="fsearch" class="long">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label>SP </label><select type="text" class="postit sp_id wide"  value=""> 
				<option value="all">--All--</option>
				{foreach from=$opt_sp item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
				</select><br />
				<label>NSR </label><select type="text" class="postit nsr_id wide"  value=""> 
				<option value="all">--All--</option>
				{foreach from=$opt_nsr item=i}<option value="{$i.id}">{$i.nm}</option>{/foreach}
				</select><br />
				<label>Period </label><input type="text" class="postit start_period short date" value="" />
				s/d<input type="text" class="postit end_period short date" value="" /><br/>
				{include file="home/page_btn_search_opt.tpl" src_opt=Submit}
		</fieldset>
	</form>
{/if}
	<div class="title-rpt">
		<legend>Executive Summary</legend>
		<div>	
			<table id="t{$menu}desc" class="plus_fetch t{$menu}desc 3107">
			<tr><td>Nomor Report</td><td> : </td><td><strong>RPT/SUM-EX/001</strong></td></tr>
					<tr><td>Project</td><td> : </td><td>Pengadaan dan Pemasangan Manage WIFI untuk program Indonesia WIFI</td></tr>
					<tr><td>Period</td><td> : </td><td >{$periodlabel}</td></tr>
					<tr><td>Tanggal Generate</td><td> : </td><td>{$cur_date}</td></tr>
					<tr><td></td><td></td><td>&nbsp;</td></tr>
					<tr><td>NSR</td><td> : </td><td>{$nsr}</td></tr>
					<tr><td>Surat Pesanan</td><td> : </td><td>{$sp}</td></tr>
					<tr><td>Tanggal SP</td><td> : </td><td>{$tgl_sp}</td></tr>
					<tr><td>Waktu TOC</td><td> : </td><td>{$toc}</td></tr>
					
			</table>
			<br/>
{if !$tblo}

<a href="#t{$menu}" class="easyui-linkbutton" onclick="dwld_rpt({$menu})" plain="true" iconCls="icon-xls">Export</a>
{/if}
		</div>	
	</div>
	
	<br/>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid t-rpt">{include file="home/3000/page_{$menu}_dat.tpl"}</table>

<br/><br/><br/><br/>
