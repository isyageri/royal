
	<tr>
		<th class="hide">AccountID</th>
		<th>Registration Date</th>
		<th>Account</th>
		<th>Account Name</th>
		<th>Status</th>
	</tr>
	{if $datx.dat}
	{foreach name=data from=$datx.dat item=td}
		<tr class="{cycle values='even,odd'}">
			<td class="hide">{$td.AccountID}</td>
			<td>{$td.CreatedDate}</td>
			<td>{$td.UserID}</td>
			<td>{$td.FirstName} {$td.MiddleName} {$td.LastName}</td>
			<td>{if $td.status==0}Requesting{elseif $td.status==1}Active{/if}</td>
			
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
	
	<tr>
		<td colspan="5" class="right">
			<a href="#f{$menu}" class="button add fr right" onclick="f_open(this)" style="margin-top:10px;">Refer New Account</a>
		</td>
	</tr>
