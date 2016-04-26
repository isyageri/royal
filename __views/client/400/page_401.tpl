<div id="content-title">Report</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions. Please log into your trading station for your real time equity balance.
</div>

<h2 class="rib-sub-title">Transaction Report</h2>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="client-table">{include file="client/400/page_{$menu}_dat.tpl"}</table>

<form id="f{$menu}" class="hide">
	<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="hidden" class="postit AccountID keepit" value="{$auth.AccountID}" name="AccountID" id="AccountID" />
	<input type="hidden" class="postit WithdrawID" value="" name="WithdrawID" id="WithdrawID" />
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="WithdrawType" class="mandatory">Withdraw type</label></div>
			<select onchange="WithdrawTypeChanged(this)" id="WithdrawType" name="WithdrawType" value="" class="postit WithdrawType rib-input-normal ro" >
				<option value="1">Deposit</option>
				<option value="2" selected>Bonus</option>
			</select>
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Withdraw">Withdraw</label></div>
			<input id="Withdraw" name="Withdraw" value="" class="postit Withdraw ro rib-input-normal numeric" />
		</div>
	</div>
	
	<a href="#" class="button rib-save hastable" data-url="#chome/crud/f{$menu}/" style="margin-top:10px;">Save</a>
</form>

