<div id="content-title">Referral</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions. Please log into your trading station for your real time equity balance.
</div>

<h2 class="rib-sub-title">Referral</h2>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="client-table">{include file="client/300/page_{$menu}_dat.tpl"}</table>

<form id="f{$menu}" class="hide">
	<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="hidden" class="postit ParentRefID keepit" value="{$auth.AccountID}" name="ParentRefID" id="ParentRefID" />
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="AccountTypeID" class="mandatory">Account Type</label></div>
			<select id="AccountTypeID" name="AccountTypeID" class="postit AccountTypeID rib-input-normal">
				{foreach from=$AccountType item=dt}
					<option value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
			</select>
				
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="CurrencyID" class="mandatory">Currency</label></div>
			<select id="CurrencyID" name="CurrencyID" class="postit CurrencyID rib-input-normal" >
				{foreach from=$Currency item=dt}
					<option value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
			</select>
				
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Country" class="mandatory">Country</label></div>
			<select id="CountryID" name="CountryID" class="postit CountryID rib-input-normal" >
				{foreach from=$Country item=dt}
					<option value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
			</select>
				
		</div>
		
	</div>
	<div class="clear" style="width: 600px;">
		<div class="fl personal-info" >
			<div  class="clear"><label for="FirstName" class="mandatory">First Name</label></div>
			<input type="text" value="" name="FirstName" id="FirstName" class="postit FirstName" />
		</div>
		<div class="fl  personal-info">
			<div  class="clear"><label for="MiddletName">Middle Name</label>
			</div>
			<input type="text" value="" name="MiddletName" id="MiddletName" class="postit MiddleName" />
		</div>
		<div class="fl  personal-info">
			<div  class="clear"><label for="LastName">Last Name</label></div>
			<input type="text" value="" name="LastName" id="LastName" class="postit LastName" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="IDType" class="mandatory">ID Type</label></div>
			<select id="IDType" name="IDType" class="postit IDType rib-input-normal">
				{foreach from=$IdentificationType item=dt}
					<option value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
			</select>
				
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="IDNumber" class="mandatory">ID Number</label></div>
			<input id="IDNumber" name="IDNumber" value="" class="postit IDNumber rib-input-normal" />
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Gender">Gender</label></div>
			<select id="Gender" name="Gender" class="postit Gender rib-input-normal">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
				
		</div>
		
	</div>
	<div class="clear" style="width: 600px;margin-top:20px;">
	<strong>Date of Birth Verification</strong><br/><br/>
		<input type="text" id="DateOfBirth" class="postit DateOfBirth date" value="" />
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Email" class="mandatory">Email Address</label></div>
			<input id="Email" name="Email" value="" class="postit Email rib-input-normal" />
		</div>
		
	</div>
	<a href="#" class="button rib-save hastable" data-url="#chome/reg/{$menu}/" style="margin-top:10px;">Save</a>
</form>

