
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th>Tanggal</th>
		<th>Uraian</th>
		<th>QTY</th>
		<th>Satuan</th>
		<th>Harga</th>
		<th>Total Harga</th>
		
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		{$total_harga = 0}
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="date_pengeluaran_barang">{$td.date_pengeluaran_produksi}</td>
			<td class="note">{$td.note}</td>
			<td >{$td.jml}</td>
			<td >{$td.satuan}</td>
			
			{if !$tblo}
				<td class="right">Rp {$td.harga|number_format}</td>
				<td class="right">Rp {$td.total_harga|number_format}</td>
			{else}
				<td class="cost">Rp {$td.harga}</td>
				<td class="cost">Rp {$td.total_harga}</td>
			{/if}
		</tr>
		{$total_harga = $total_harga+$td.total_harga}
		{/foreach}
		
		<!--<tr><td colspan="9" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>-->
		<tr class="{cycle values='even,odds'} hover">
			<td class="right" colspan="6">Total</td>
			{if !$tblo}
				<td class="right">Rp {$total_harga|number_format}</td>
			{else}
				<td class="right">Rp {$total_harga}</td>
			{/if}
		</tr>
		</tbody>
	{/if}
{/if}



