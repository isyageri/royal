
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		{if !$tblo}<th class="hide">nota id</th>{/if}
		<th>Tanggal Piutang</th>
		<th>Nama</th>
		<th>Piutang</th>
		
		
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		{$total_piutang = 0}
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			{if !$tblo}<td class="nota_id pkey hide">{$td.nota_id}</td>{/if}
			
			<td class="date_nota">{$td.date_nota}</td>
			<td class="customer_name">{$td.customer_name}</td>
			{if !$tblo}
				<td class="right">Rp {$td.piutang|number_format}</td>
			{else}
				<td class="piutang">Rp {$td.piutang}</td>
			{/if}
			
		</tr>
		{$total_piutang = $total_piutang + $td.piutang} 
		{/foreach}
		<tr class="{cycle values='even,odds'} hover">
			<td class="right" colspan="3">Total</td>
			{if !$tblo}
				<td class="right">Rp {$total_piutang|number_format}</td>
			{else}
				<td class="right">Rp {$total_piutang}</td>
			{/if}
		</tr>
		
		</tbody>
	{/if}
{/if}














	
	

