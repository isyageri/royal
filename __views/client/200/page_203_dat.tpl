
	<tr>
		<th class="hide">WithdrawID</th>
		<th>Withdraw Date</th>
		<th>Withdraw Type</th>
		<th>Withdraw (USD)</th>
		<th>Admin Fee (USD)</th>
		<th>Confirmed Date</th>
		<th>Status</th>
	</tr>
	{if $datx.dat}
	{foreach name=data from=$datx.dat item=td}
		<tr class="{cycle values='even,odd'}">
			<td class="WithdrawID hide">{$td.WithdrawID}</td>
			<td >{$td.WithdrawDate}</td>
			<td>{if $td.WithdrawType==1}Deposit Withdraw{else}Bonus Withdraw{/if}</td>
			<td class="Withdraw">{$td.Withdraw}</td>
			<td class="WithdrawFee">{$td.WithdrawFee}</td>
			<td>{$td.ConfirmedDate}</td>
			<td>{if $td.WithdrawStatus==0}Wait for Confirmation{elseif $td.WithdrawStatus==1}Success {else} {$td.Note} {/if}</td>
			
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
	
	<tr>
		<td colspan="8" class="right">
			<a href="#f{$menu}" class="button add fr right" onclick="f_open(this)" style="margin-top:10px;">New Withdraw</a>
		</td>
	</tr>
