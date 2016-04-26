<div id="content-title">Account Summary</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions.
</div>

<table class="client-table">
	<tr>
		<th>Account</th>
		<th>Account Name</th>
		<th>Account Type</th>
		<th>Balance (USD)</th>
		<th>Total Bonus (USD)</th>
		<th>Status</th>
	</tr>
	<tr class="even">
		<td>{$Account.UserID}</td>
		<td>{$Account.FirstName} {$Account.MiddleName} {$Account.LastName}</td>
		<td>{$Account.AccountTypeName}</td>
		<td>{$Account.Balance}</td>
		<td>{$Account.TotalBonus}</td>
		<td>{IF $Account.Status==1}Deposit Active{ELSE}Deposit Non Active{/IF}</td>
	</tr>
	
</table>
<br/><br/><br/>
<div id="content-title">Reference</div>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="client-table">{include file="client/100/page_{$menu}_dat.tpl"}</table>
<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="{$csrf}" />
