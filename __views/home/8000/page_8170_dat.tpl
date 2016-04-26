
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th>Tanggal</th>
		<th>Nama Barang</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td class="date_pengeluaran_barang">{$td.date_pengeluaran_barang}</td>
			<td class="barang_reff_name">{$td.barang_reff_name}</td>
			<td class="jml">{$td.jml} {$td.barang_reff_sat}</td>
			<td class="note">{$td.note}</td>	
		</tr>
		{/foreach}
		
		
		
		</tbody>
	{/if}
{/if}

