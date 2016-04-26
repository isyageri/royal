
<thead frozen="true">
	<tr align="center" valign="middle">
		<th width="32">NO</th>
		<th>Tanggal</th>
		<th>Perkiraan</th>
		<th>Uraian</th>
		<th>QTY</th>
		<th>Satuan</th>
		<th>Harga</th>
		
		<th>Debet</th>
		<th>Kredit</th>
		<th>Saldo</th>
		
    </tr>
</thead>


{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		{$debet = 0}
		{$kredit = 0}
		{$saldo = 0}
		{foreach name=data from=$datx.dat item=td}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td >{$td.date_kas}</td>
			<td >{$td.perkiraan}</td>
			<td >{$td.note}</td>
			
			{if isset($td.satuan)}
			<td >{$td.jml}</td>
			<td >{$td.satuan}</td>
			{else}
			<td></td>
			<td></td>
			{/if}
			
			
			{if !$tblo}
			
			{if isset($td.satuan)}
			<td class="right">Rp {$td.harga|number_format}</td>
			{else}
			<td></td>
			{/if}
			
			<td class="right">{if $td.debit_kredit==1}
								Rp {$td.dana|number_format} {$debet = $debet + $td.dana} {$saldo = $saldo + $td.dana}
								{else}
									{if $td.perkiraan eq 'Piutang' }
									Rp {$td.dana|number_format} {$debet = $debet + $td.dana}
									{$saldo = $saldo + $td.dana}
									{else}-{/if}
								{/if}</td>
			<td class="right">{if $td.debit_kredit==2}Rp {$td.dana|number_format} {$kredit = $kredit + $td.dana} {$saldo = $saldo - $td.dana}{else}-{/if}</td>
			<td class="right">Rp {$saldo|number_format} </td>
			
			{else}
			
			{if isset($td.satuan)}
			<td class="right">Rp {$td.harga}</td>
			{else}
			<td></td>
			{/if}
			
			<td class="right">{if $td.debit_kredit==1}Rp {$td.dana}{$debet = $debet + $td.dana} {$saldo = $saldo + $td.dana}
							{else}
								{if $td.perkiraan eq 'Piutang' }
								Rp {$td.dana}{$debet = $debet + $td.dana}
								{$saldo = $saldo + $td.dana}
								{else}-{/if}
								{/if}</td>
			<td class="right">{if $td.debit_kredit==2}Rp {$td.dana}{$kredit = $kredit + $td.dana}{$saldo = $saldo - $td.dana}{/if}</td>
			<td class="right">Rp {$saldo} </td>
			{/if}
		</tr>
		{/foreach}
		
		<tr class="{cycle values='even,odds'} hover">
			<td class="right" colspan="7">Total</td>
			{if !$tblo}
			<td class="right">Rp {$debet|number_format}</td>
			<td class="right">Rp {$kredit|number_format}</td>
			<td class="right">Rp {$saldo|number_format} </td>
			{else}
			<td class="right">Rp {$debet}</td>
			<td class="right">Rp {$kredit}</td>
			<td class="right">Rp {$saldo} </td>
			{/if}
		</tr>
		
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot_report.tpl" col=10}