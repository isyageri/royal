<div id="content-title">Personal Information</div>
<div class="menu-desc text-red">
</div>
<form>
	<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="hidden" value="{$datx.AccountID}" name="AccountID" id="AccountID" class="postit AccountID" />
	<label>Name Verification</label><br/><br/>
	<div class="clear" style="width: 600px;">
		<div class="fl personal-info" >
			<div  class="clear"><label for="FirstName" class="mandatory">First Name</label></div>
			<input type="text" value="{$datx.FirstName}" name="FirstName" id="FirstName" class="postit FirstName" disabled readonly />
		</div>
		<div class="fl  personal-info">
			<div  class="clear"><label for="MiddletName">Middle Name</label>
			</div>
			<input type="text" value="{$datx.MiddleName}" name="MiddletName" id="MiddletName" class="postit MiddleName"  disabled readonly />
		</div>
		<div class="fl  personal-info">
			<div  class="clear"><label for="LastName">Last Name</label></div>
			<input type="text" value="{$datx.LastName}" name="LastName" id="LastName" class="postit LastName"  disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="IDType">ID Type</label></div>
			<select id="IDType" name="IDType" class="postit IDType rib-input-normal">
				{foreach from=$IdentificationType item=dt}
					<option {if $datx.IDType==$dt.id}selected="selected"{/if} value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
			</select>
				
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="IDNumber">ID Number</label></div>
			<input id="IDNumber" name="IDNumber" value="{$datx.IDNumber}" class="postit IDNumber rib-input-normal" />
		</div>
		
	</div>
	<div class="clear" style="width: 600px;margin-top:20px;">
	<strong>Date of Birth Verification</strong><br/><br/>
		<div class="input-append date" id="dp3" data-date="12-02-2014" data-date-format="dd-mm-yyyy">
		  <input id="DateOfBirth" class="postit DateOfBirth rib-date" value="{$datx.DateOfBirth}" size="16" type="text">
		  <span class="add-on"><i class="icon-th"></i></span>
		</div>
		{*<input type="text" id="DateOfBirth" class="postit DateOfBirth date" value="{$datx.DateOfBirth}" />*}
	</div>
	    <a href="#" class="button upd rib-save" data-url="#chome/crud/f{$menu}/" style="margin-top:10px;">Save</a>

</form>