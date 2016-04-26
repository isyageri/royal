<div id="content-title">Change My Bank Information</div>
<div class="menu-desc">
	Please enter the required information. Royal Investment is not responsible for errors made by the account holder. Royal Investment strongly encourages clients to verify banking details with their financial institution prior to submitting below. Royal Investment only maintains one set of banking instructions. Any changes made below will overwrite your existing profile.
</div>
<form>
	<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="hidden" value="{$datx.AccountID}" name="AccountID" id="AccountID" class="postit AccountID" />
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankCountryID">Country</label></div>
			<select id="BankCountryID" name="BankCountryID" class="postit BankCountryID rib-input-normal" data-placeholder="Click to Choose..." disabled readonly >
				{foreach from=$Country item=dt}
				
					<option {if $datx.BankCountryID==$dt.id}selected="selected"{/if} value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
				
			</select>
				
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BankName">Bank Name</label></div>
			<input id="BankName" name="BankName" value="{$datx.BankName}" class="postit BankName rib-input-wide" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BankAddress">Bank Address</label></div>
			<input id="BankAddress" name="BankAddress" value="{$datx.BankAddress}" class="postit BankAddress rib-input-wide" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankCity">City</label></div>
			<input id="BankCity" name="BankCity" value="{$datx.BankCity}" class="postit BankCity rib-input-normal" disabled readonly />
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="BankProvince">State / Province</label></div>
			<input id="BankProvince" name="BankProvince" value="{$datx.BankProvince}" class="postit BankProvince rib-input-normal" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankPhone">Bank Telephone </label></div>
			<input id="BankPhone" name="BankPhone" value="{$datx.BankPhone}" class="postit BankPhone rib-input-normal" disabled readonly />
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="BankZipcode">Zip / Postal code </label></div>
			<input id="BankZipcode" name="BankZipcode" value="{$datx.BankZipcode}" class="postit BankZipcode rib-input-normal" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BankAccountNumber">Bank Account Number</label></div>
			<input id="BankAccountNumber" name="BankAccountNumber" value="{$datx.BankAccountNumber}" class="postit BankAccountNumber rib-input-wide" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BankSwift">Swift</label></div>
			<input id="BankSwift" name="BankSwift" value="{$datx.BankSwift}" class="postit BankSwift rib-input-wide" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >Contact Royal Investment's Admin ( Admin@rib.company ) for any changes.
		</div>
	</div>
	{*<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >I understand the importance of the details provided in bank information, as this may be used to process withdrawal requests made by me.
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >I hereby represent that the information provided above is true and correct. Royal Investment reserves the right, but has no duty, to verify the accuracy of information provided, and to contact the account holder, bankers, brokers, and others, as it deems necessary. Falsified information may result in legal action and is punishable by law.
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		By submitting below, I certify that I am the person authorised to initiate such transactions. I also acknowledge that Royal Investment may neither make nor receive payments via a third party, and is held harmless of any transactions not arising of deliberate negligence.
	</div>*}
	{*<a href="#" class="button upd rib-save" data-url="#chome/crud/f{$menu}/" style="margin-top:10px;">Save</a>*}
</form>