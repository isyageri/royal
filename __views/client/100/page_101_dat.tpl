

	<tr>
		<th>Account</th>
		<th>Account Name</th>
		<th>Account Type</th>
		<th>Balance (USD)</th>
		<th>Status</th>
	</tr>
	{if $datx.dat}
	{foreach name=data from=$datx.dat item=td}
		<tr class="{cycle values='even,odd'}">
			<td >{$td.UserID}</td>
			<td>{$td.FirstName} {$td.MiddleName} {$td.LastName}</td>
			<td>{$td.AccountTypeName}</td>
			<td>{$td.Balance}</td>
			<td>{if $td.Status==1}Deposit Active{else}Deposit Non Active {/if}</td>
		</tr>
	{/foreach}
	{/if}
	{if $datx.dat}
	<tr><td colspan="5" class="bold left sep-top">Page {if $nav.TotalPage < $nav.CurrentPage} 0 {else} {$nav.CurrentPage} {/if} of {$nav.TotalPage} , Total Data {$datx.tot|numeric_format:0}</td></tr>
	{/if}
	<tr>
		{if !$datx.dat}
		<td colspan="5" class="center">
			-- Data is not available --
		</td>
		{else}
		<td colspan="5" class="center left">
			{include file="page_btn_nav.tpl"}
		</td>
		{/if}
	
	</tr>
	
	