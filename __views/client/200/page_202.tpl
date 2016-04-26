<div id="content-title">Transfer</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions. Please log into your trading station for your real time equity balance.
</div>

<h2 class="rib-sub-title">Transfer History</h2>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="client-table">{include file="client/200/page_{$menu}_dat.tpl"}</table>

<form id="f{$menu}" class="hide">
	<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="hidden" class="postit AccountID keepit" value="{$auth.AccountID}" name="AccountID" id="AccountID" />
	<input type="hidden" class="postit BalanceTransferID" value="" name="BalanceTransferID" id="BalanceTransferID" />
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="DestinationAccount" class="mandatory">Destination Account</label></div>
			<input id="DestinationAccount" name="DestinationAccount" value="" class="postit DestinationAccount rib-input-normal ro" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Transfer" class="mandatory">Amount (USD)</label></div>
			<input id="Transfer" name="Transfer" value="" class="postit Transfer ro rib-input-normal number" />
		</div>
	</div>
	<a href="#" class="button rib-save hastable" data-url="#chome/confirm/{$menu}/" style="margin-top:10px;">Save</a>
	<a href="#" class="button" onclick="back(this)" style="margin-top:10px;">Back</a>
</form>

