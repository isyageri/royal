
	<tr>
		<th class="hide">BalanceTransferID</th>
		<th>Date</th>
		<th>Account</th>
		<th>Amount (USD)</th>
		<th class="hide">Destination Account</th>
		<th>Destination Account</th>
		<th>Status</th>
		<th>Note</th>
	</tr>
	{if $datx.dat}
	{foreach name=data from=$datx.dat item=td}
		<tr class="{cycle values='even,odd'}">
			<td class="BalanceTransferID hide">{$td.BalanceTransferID}</td>
			<td >{$td.TransferDate}</td>
			<td>{$td.UserID}</td>
			<td class="Transfer">{$td.Transfer}</td>
			<td class="DestinationAccount hide">{$td.DestinationAccount}</td>
			<td >{$td.DestAcc}</td>
			<td>{if $td.Status==0}Failed{elseif $td.Status==1}Success{else} - {/if}</td>
			<td>{$td.Note}</td>
			
		</tr>
	{/foreach}
	{/if}
	{if $datx.dat}
	<tr><td colspan="7" class="bold left sep-top">Page {if $nav.TotalPage < $nav.CurrentPage} 0 {else} {$nav.CurrentPage} {/if} of {$nav.TotalPage} , Total Data {$datx.tot|numeric_format:0}</td></tr>
	{/if}
	<tr>
		{if !$datx.dat}
		<td colspan="7" class="center">
			-- Data is not available --
		</td>
		{else}
		<td colspan="7" class="center left">
			{include file="page_btn_nav.tpl"}
		</td>
		{/if}
	</tr>
	<tr>
		<td colspan="7" class="right">
			<a href="#f{$menu}" class="button add fr right" onclick="f_open(this)" style="margin-top:10px;">Transfer Your Balance</a>
		</td>
	</tr>
