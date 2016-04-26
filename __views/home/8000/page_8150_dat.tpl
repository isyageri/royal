
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th>Nama Barang</th>
		<th>Jumlah Stock</th>
		<th>Keterangan</th>
		<th>Harga</th>
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
			<td class="barang_reff_name">{$td.barang_reff_name}</td>
			<td class="jml">{$td.jml} {$td.barang_reff_sat}</td>
			<td class="note">{$td.note}</td>
			{if !$tblo}
			<td class="right">Rp {$td.harga|number_format}</td>
			<td class="right">Rp {$td.totalharga|number_format}</td>
			{else}
			<td class="right">Rp {$td.harga}</td>
			<td class="right">Rp {$td.totalharga}</td> 
			{/if}
		</tr>
		{$total = $total + $td.totalharga}
		{/foreach}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="right" colspan="5">Total</td>
			{if !$tblo}
			<td class="right">Rp {$total|number_format}</td> 
			{else}
			<td class="right">Rp {$total}</td>
			{/if}
		</tr>
		
		</tbody>
	{/if}
{/if}














	
	

