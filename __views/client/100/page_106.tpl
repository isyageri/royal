<div id="content-title">Beneficiary or Inheritor</div>
<div class="menu-desc">
	Please enter the required information. Royal Investment is not responsible for errors made by the account holder.
</div>
<form>
	<br/><br/>
	<label><strong>Beneficiary or Inheritor Informantion</strong></label>
	<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="hidden" value="{$datx.AccountID}" name="AccountID" id="AccountID" class="postit AccountID" />
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryName">Beneficiary Name</label></div>
			<input id="BeneficiaryName" name="BeneficiaryName" value="{$datx.BeneficiaryName}" class="postit BeneficiaryName rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryIDType">ID Type</label></div>
			<select id="BeneficiaryIDType" name="BeneficiaryIDType" class="postit BeneficiaryIDType rib-input-normal">
				{foreach from=$IdentificationType item=dt}
					<option {if $datx.BeneficiaryIDType==$dt.id}selected="selected"{/if} value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
			</select>
				
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryIDNumber">ID Number</label></div>
			<input id="BeneficiaryIDNumber" name="BeneficiaryIDNumber" value="{$datx.BeneficiaryIDNumber}" class="postit BeneficiaryIDNumber rib-input-normal" />
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BeneficiaryAddress">Address</label></div>
			<input id="BeneficiaryAddress" name="BeneficiaryAddress" value="{$datx.BeneficiaryAddress}" class="postit BeneficiaryAddress rib-input-wide" />
		</div>
	</div>
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryPhone">Phone</label></div>
			<input id="BeneficiaryPhone" name="BeneficiaryPhone" value="{$datx.BeneficiaryPhone}" class="postit BeneficiaryPhone rib-input-normal" />
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryEmail">Email Address</label></div>
			<input id="BeneficiaryEmail" name="BeneficiaryEmail" value="{$datx.BeneficiaryEmail}" class="postit BeneficiaryEmail rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		By submitting below, I certify that I am the person authorised to initiate such transactions. I also acknowledge that Royal Investment may neither make nor receive payments via a third party, and is held harmless of any transactions not arising of deliberate negligence.
	</div>
	<a href="#" class="button upd rib-save" data-url="#chome/crud/f{$menu}/" style="margin-top:10px;">Save</a>
</form>