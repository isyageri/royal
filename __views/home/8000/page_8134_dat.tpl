<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th>Tanggal</th>
		<th>Perkiraan</th>
		<th>Uraian</th>
		<th>Debit</th>
		<th>Kredit</th>
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $dat}
		<tbody>
		{$debet = 0}
		{$kredit = 0}
		{foreach name=data from=$dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td >{$td.date_kas}</td>
			<td >{$td.perkiraan}</td>
			<td >{$td.note}</td>
			{if !$tblo}
			<td class="right">{if $td.debit_kredit==2}Rp {$td.dana|number_format}{$debet = $debet + $td.dana }{else}-{/if}</td>
			<td class="right">{if $td.debit_kredit==1}Rp {$td.dana|number_format} {$kredit = $kredit + $td.dana } {else}-{/if}</td>
			{else}
			<td class="right">{if $td.debit_kredit==2}Rp {$td.dana}{$debet = $debet + $td.dana }{else}-{/if}</td>
			<td class="right">{if $td.debit_kredit==1}Rp {$td.dana}{$kredit = $kredit + $td.dana }{else}-{/if}</td>
			{/if}
		</tr>
		{/foreach}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="right" colspan="4">Total</td>
			{if !$tblo}
			<td class="right">Rp {$debet|number_format}</td>
			<td class="right">Rp {$kredit|number_format}</td>
			{else}
			<td class="right">Rp {$debet}</td>
			<td class="right">Rp {$kredit}</td>
			{/if}
		</tr>
		
		</tbody>
	{/if}
{/if}

