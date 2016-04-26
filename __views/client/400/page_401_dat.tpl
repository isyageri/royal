
	<tr>
		<th>Date</th>
		<th>Transaction</th>
		<th>Status</th>
		<th>Remarks</th>
		<th>Debit (USD)</th>
		<th>Credit (USD)</th>
		<th>Balance (USD)</th>
		<th>Bonus (USD)</th>
	</tr>
	{if $datx.dat}
	{foreach name=data from=$datx.dat item=td}
		<tr class="{cycle values='even,odd'}">
			<td>{$td.TrxDate}</td>
			<td >{$td.Transaction}</td>
			<td>{if $td.Status==0}Pending{else if $td.Status==1}Success{/if}</td>
			<td>{$td.Remarks}</td>
			<td>{$td.Debit}</td>
			<td>{$td.Credit}</td>
			<td>{$td.CurrentBalance}</td>
			<td>{$td.CurrentBonus}</td>
		</tr>
	{/foreach}
	{/if}
	
	{if $datx.dat}
	<tr><td colspan="8" class="bold left sep-top">Page {if $nav.TotalPage < $nav.CurrentPage} 0 {else} {$nav.CurrentPage} {/if} of {$nav.TotalPage} , Total Data {$datx.tot|numeric_format:0}</td></tr>
	{/if}
	<tr>
		{if !$datx.dat}
		<td colspan="8" class="center">
			-- Data is not available --
		</td>
		{else}
		<td colspan="8" class="center left">
			{include file="page_btn_nav.tpl"}
		</td>
		{/if}
	
	</tr>
	