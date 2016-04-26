<div id="content-title">Deposit</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions. Please log into your trading station for your real time equity balance.
</div>

<h2 class="rib-sub-title">Deposit History</h2>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="client-table">{include file="client/200/page_{$menu}_dat.tpl"}</table>

<form id="f{$menu}" class="hide" method="post" enctype="multipart/form-data">
	<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="hidden" class="postit AccountID keepit" value="{$auth.AccountID}" name="AccountID" id="AccountID" />
	<input type="hidden" class="postit DepositID" value="" name="DepositID" id="DepositID" />
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankName" class="mandatory">Bank Name</label></div>
			<input id="BankName" name="BankName" value="" class="postit BankName rib-input-normal ro" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankAccountName" class="mandatory">Sender Name</label></div>
			<input id="BankAccountName" name="BankAccountName" value="" class="postit BankAccountName ro rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankDestinationID" class="mandatory">Transfer to</label></div>
			<select id="BankDestinationID" name="BankDestinationID" class="postit BankDestinationID rib-input-normal">
				{foreach from=$CorpBank item=dt}
					<option value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
			</select>
			
	
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label >&nbsp;</label></div>
			<a href="#" class="confirm rib-save hastable no-validate" data-url="#chome/confirm/201/bankinfo/" style="font-size:7pt;padding-top:2px;padding-bottom:2px;margin-top:2px;">Bank Info</a>
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="TransferEvidence" class="mandatory">Confirm your deposit ( Transfer Evidence )</label></div>
			<input type="file" id="TransferEvidence" name="TransferEvidence" class="postit TransferEvidence rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Deposit" class="mandatory">Deposit (USD)</label></div>
			<input id="Deposit" name="Deposit" value="" class="postit Deposit ro rib-input-normal number" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Remark">Remark</label></div>
			<input id="Remark" name="Remark" value="" class="postit Remark ro rib-input-normal" />
		</div>
	</div>
	<a href="#" class="button rib-save hastable" data-url="#chome/crud/f{$menu}/" style="margin-top:10px;">Save</a>
	<a href="#" class="button" onclick="back(this)" style="margin-top:10px;">Back</a>
</form>

