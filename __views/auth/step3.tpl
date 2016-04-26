<h3 class="lighter block green">Bank Information</h3>

<form class="form-horizontal" id="validation-form3" method="get" />
	
	<div class="control-group">
		<label class="control-label" for="BankCountryID">Bank Country</label>
		<div class="controls">
			<span class="span12">
				<select id="BankCountryID" name="BankCountryID" class="postit BankCountryID select2" data-placeholder="Click to Choose...">
					{foreach from=$Country item=dt}
					<option value="{$dt.id}">{$dt.nm}
					{/foreach}
				</select>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="BankName">Bank Name</label>
		<div class="controls">
			<div class="span6">
				<input type="text" name="BankName" id="BankName" class="postit BankName span6" />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="BankAddress">Bank Address</label>
		<div class="controls">
			<div class="span12">
				<input type="text" name="BankAddress" id="BankAddress" class="postit BankAddress span12" />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="BankPhone">Bank Telephone</label>
		<div class="controls">
			<div class="span12">
				<input type="text" name="BankPhone" id="BankPhone" class="postit BankPhone span12" />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="BankCity">City</label>
		<div class="controls">
			<div class="span12">
				<input type="text" name="BankCity" id="BankCity" class="postit BankCity span12" />
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="BankProvince">State / Province</label>
		<div class="controls">
			<div class="span12">
				<input type="text" name="BankProvince" id="BankProvince" class="postit BankProvince span12" />
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="BankZipcode">Zip / Postal code </label>
		<div class="controls">
			<div class="span12">
				<input type="text" name="BankZipcode" id="BankZipcode" class="postit BankZipcode span12" />
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="BankAccountNumber">Bank Account Number </label>
		<div class="controls">
			<div class="span12">
				<input type="text" name="BankAccountNumber" id="BankAccountNumber" class="postit BankAccountNumber span12" />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="BankAccountName">Bank Account Name </label>
		<div class="controls">
			<div class="span12">
				<input type="text" name="BankAccountName" id="BankAccountName" class="postit BankAccountName span12" />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="BankSwift">Swift </label>
		<div class="controls">
			<div class="span12">
				<input type="text" name="BankSwift" id="BankSwift" class="postit BankSwift span12" />
			</div>
		</div>
	</div>
	
</form>