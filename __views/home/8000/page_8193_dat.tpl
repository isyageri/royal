<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th>Tanggal</th>
		<th>Jumlah Supply Susu (Liter)</th>
		<th>Jenis Susu</th>
		<th>Jumlah (Liter)</th>
    </tr>
</thead>

{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		
		{foreach name=data from=$datx.dat item=td}
			{$flag = 0}
			{foreach name=datax from=$td.dat item=tds}
			
			<tr class="{cycle values='even,odds'} hover">

			{if $flag==0}
				<td rowspan="{$td.size}" class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
				<td rowspan="{$td.size}" class="date_supply">{$td.date_supply}</td>
				<td rowspan="{$td.size}" class="jml_supply">{$td.jml_supply}</td>
			{/if}
				
			<td class="milk_type_name">{$tds.milk_type_name}</td>
			<td class="jml_jenis">{$tds.jml_jenis}</td>
			
			{$flag = 1}
			</tr>

			{/foreach}
		{/foreach}
		</tbody>
	{/if}
{/if}