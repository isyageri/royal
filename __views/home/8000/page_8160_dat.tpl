
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th>Tanggal</th>
		<th>Nama Barang</th>
		<th>Uraian</th>
		<th>Jumlah</th>
		<th>Harga Satuan</th>
		<th>Total Harga</th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		{$total=0}
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="date_alur_barang">{$td.date_alur_barang}</td>
			<td class="barang_reff_name">{$td.barang_reff_name}</td>
			<td class="note">{$td.note}</td>
			<td class="jml">{$td.jml} {$td.barang_reff_sat}</td>
			{if !$tblo}
			<td class="right">Rp {$td.harga|number_format}</td>
			<td class="right">Rp {$td.total_harga|number_format}</td>
			{else}
			<td class="right">Rp {$td.harga}</td>
			<td class="right">Rp {$td.total_harga}</td> 
			{/if}
		</tr>
		{$total = $total + $td.total_harga}
		{/foreach}
		
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="right" colspan="6">Total</td>
			{if !$tblo}
			<td class="right">Rp {$total|number_format}</td> 
			{else}
			<td class="right">Rp {$total}</td>
			{/if}
		</tr>
		
		
		</tbody>
	{/if}
{/if}



