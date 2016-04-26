
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th class="hide">pengeluaran id</th>
		<th class="hide">barang id</th>
		<th>Tanggal</th>
		<th>Nama Barang</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th class="crud"></th>
		
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="fp_pengeluaran_barang_id hide pkey">{$td.fp_pengeluaran_barang_id}</td>
			<td class="barang_reff_id hide">{$td.barang_reff_id}</td>
			<td class="date_pengeluaran_barang">{$td.date_pengeluaran_barang}</td>
			<td class="barang_reff_name">{$td.barang_reff_name}</td>
			<td class="jml hide">{$td.jml}</td>
			<td class="right">{$td.jml} {$td.barang_reff_sat}</td>
			<td class="note">{$td.note}</td>
			
			
			{include file="home/page_btn_updel.tpl"}
		</tr>
		{/foreach}
		
		<tr><td colspan="8" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=8}













	
	

