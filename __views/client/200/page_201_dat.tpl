
	<tr>
		<th class="hide">DepositID</th>
		<th>Date</th>
		<th>Deposit ID</th>
		<th>Deposit (USD)</th>
		<th>Bank Name</th>
		<th>Sender Name</th>
		<th>Transfer To</th>
		<th>Confirmed Date</th>
		<th>Status</th>
		<th>Remark</th>
		<th>Note</th>
		
		<th>..::..</th>
	</tr>
	{if $datx.dat}
	{foreach name=data from=$datx.dat item=td}
		<tr class="{cycle values='even,odd'}">
			<td class="DepositID hide">{$td.DepositID}</td>
			<td class="BankDestinationID hide">{$td.BankDestinationID}</td>
			<td >{$td.DepositDate}</td>
			<td >{$td.NoDeposit}</td>
			<td class="Deposit">{$td.Deposit}</td>
			<td class="BankName">{$td.BankName}</td>
			<td class="BankAccountName">{$td.BankAccountName}</td>
			<td >{$td.RibBank}</td>
			<td>{$td.ConfirmedDate}</td>
			<td>{if $td.DepositStatus==0}Requesting{elseif $td.DepositStatus==1}Wait for Admin Confirmation{elseif $td.DepositStatus==2}Success{else}Failed{/if}</td>
			<td>{$td.Remark}</td>
			<td>{if $td.DepositStatus==2 && $td.IsValid!=1}Not Active{elseif $td.IsValid==1}Active{else}{$td.Note}{/if}</td>
			<td>{if $td.DepositStatus==0}<a href="#f{$menu}" class="confirm upd" onclick="f_open(this)">Confirm</a>{else}-{/if}</td>
			
		</tr>
	{/foreach}
	{/if}
	{if $datx.dat}
	<tr><td colspan="10" class="bold left sep-top">Page {if $nav.TotalPage < $nav.CurrentPage} 0 {else} {$nav.CurrentPage} {/if} of {$nav.TotalPage} , Total Data {$datx.tot|numeric_format:0}</td></tr>
	{/if}
	<tr>
	
		{if !$datx.dat}
		<td colspan="10" class="center">
			-- Data is not available --
		</td>
		{else}
		<td colspan="10" class="center left">
			{include file="page_btn_nav.tpl"}
		</td>
		{/if}
	
	
	</tr>
	<tr>
		<td colspan="10" class="right">
			<a href="#f{$menu}" class="button add fr right" onclick="f_open(this)" style="margin-top:10px;">New Deposit</a>
		</td>
	</tr>
