<div id="content-title">Change My Security Question</div>
<div class="menu-desc">
	Please enter the required information. Royal Investment is not responsible for errors made by the account holder.
</div>
<form>
	<br/><br/>
	<label><strong>Security Informantion</strong></label>
	<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="hidden" value="{$datx.AccountID}" name="AccountID" id="AccountID" class="postit AccountID" />
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="SecurityQuestionID">Security Question</label></div>
			<select id="SecurityQuestionID" name="SecurityQuestionID" class="postit SecurityQuestionID rib-input-wide" data-placeholder="Click to Choose...">
				{foreach from=$SecurityQuestion item=dt}
					<option {if $datx.SecurityQuestionID==$dt.id}selected="selected"{/if} value="{$dt.id}">{$dt.nm}</option>
				{/foreach}
			</select>	
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="SecurityQuestionAnswer">Security Answer</label></div>
			<input id="SecurityQuestionAnswer" name="SecurityQuestionAnswer" value="{$datx.SecurityQuestionAnswer}" class="postit SecurityQuestionAnswer rib-input-wide" />
		</div>
	</div>
	
	<label><strong>Change Password</strong></label>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="PrevPassword">Your Password</label></div>
			<input id="PrevPassword" name="PrevPassword" class="postit PrevPassword rib-input-wide" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="passwd">New Password</label></div>
			<input id="passwd" name="passwd" class="postit passwd rib-input-wide" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="passwdConfirm">Confirm New Password</label></div>
			<input id="passwdConfirm" name="passwdConfirm" class="postit passwdConfirm rib-input-wide" />
		</div>
	</div>
	
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >I understand the importance of the details provided in bank information, as this may be used to process withdrawal requests made by me.
		</div>
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