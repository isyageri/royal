<div id="content-title">Change Your Contact Information</div>
<div class="menu-desc text-red">
</div>
<form>
	<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="hidden" value="{$datx.AccountID}" name="AccountID" id="AccountID" class="postit AccountID" />
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Country">Country</label></div>
			<select id="CountryID" name="CountryID" class="postit CountryID rib-input-normal" data-placeholder="Click to Choose...">
				{foreach from=$Country item=dt}
				
					<option {if $datx.CountryID==$dt.id}selected="selected"{/if} value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
			</select>
				
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="Address">Address</label></div>
			<input id="Address" name="Address" value="{$datx.Address}" class="postit Address rib-input-wide" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="City">City</label></div>
			<input id="City" name="City" value="{$datx.City}" class="postit City rib-input-normal" />
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="Zipcode">Zip / Postal Code</label></div>
			<input id="Zipcode" name="Zipcode" value="{$datx.Zipcode}" class="postit Zipcode rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Province">State/Province</label></div>
			<input id="Province" name="Province" value="{$datx.Province}" class="postit Province rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Phone">Phone</label></div>
			<input id="Phone" name="Phone" value="{$datx.Phone}" class="postit Phone rib-input-normal" />
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="MobilePhone">Mobile Phone</label></div>
			<input id="MobilePhone" name="MobilePhone" value="{$datx.MobilePhone}" class="postit MobilePhone rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Email">Email Address</label></div>
			<input id="Email" name="Email" value="{$datx.Email}" class="postit Email rib-input-normal" />
		</div>
		{*<div class="fr rib-input-normal" >
			<div  class="clear"><label for="VerifyEmail">Verify Email Address</label></div>
			<input id="VerifyEmail" name="VerifyEmail" class="postit VerifyEmail rib-input-normal" />
		</div>*}
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >I hereby represent that the information provided above is true and correct. Royal Investment reserves the right, but has no duty, to verify the accuracy of information provided, and to contact the account holder, bankers, brokers, and others, as it deems necessary. Falsified information may result in legal action and is punishable by law.
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		By submitting below, I certify that I am the person authorised to initiate such transactions. I also acknowledge that Royal Investment may neither make nor receive payments via a third party, and is held harmless of any transactions not arising of deliberate negligence.
		
	</div>
	<a href="#" class="button upd rib-save" data-url="#chome/crud/f{$menu}/" style="margin-top:10px;">Save</a>
</form>