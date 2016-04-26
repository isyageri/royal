<h3 class="lighter block green">Employment Information</h3>

<form class="form-horizontal" id="validation-form2" method="get" />
	
	<!-- <div class="control-group">
		<label class="control-label" for="CountryID">Country of Residence</label>

		<div class="controls">
			<span class="span12">
				<select id="CountryID" name="CountryID" class="postit CountryID select2" data-placeholder="Click to Choose...">
					{foreach from=$Country item=dt}
					<option value="{$dt.id}">{$dt.nm}
					{/foreach}
				</select>
			</span>
		</div>
	</div> -->
	
	<div class="control-group">
		<label class="control-label" for="Address">Address :</label>
		<div class="controls">
			<div class="span12">
				<input type="text" name="Address" id="Address" class="postit Address span12" />
			</div>
		</div>
		
	</div>
	<div class="control-group">
		<div class="controls">
			<div class="span12">
				<input type="text" name="Address2" id="Address2" class="postit Address2 span12" />
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="City">City/Town :</label>
		<div class="controls">
			<div class="span6">
				<input type="text" name="City" id="City" class="postit City span6" />
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="Province">State/Province :</label>
		<div class="controls">
			<div class="span6">
				<input type="text" name="Province" id="Province" class="postit Province span6" />
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="Zipcode">Zip/Postal code :</label>
		<div class="controls">
			<div class="span2">
				<input type="text" name="Zipcode" id="Zipcode" class="postit Zipcode span6" />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="Phone">Telephone:</label>

		<div class="controls">
			<div class="span3 input-prepend">
				<span class="add-on">
					<i class="icon-phone"></i>
				</span>

				<input class="postit Phone span12" type="tel" id="Phone" name="Phone" />
			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="MobilePhone">Mobile Telephone:</label>
		<div class="controls">
			<div class="span3 input-prepend">
				<span class="add-on">
					<i class="icon-phone"></i>
				</span>

				<input class="postit MobilePhone span12" type="tel" id="MobilePhone" name="MobilePhone" />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="Email">Email Address:</label>

		<div class="controls">
			<div class="span12">
				<input type="email" name="Email" id="Email" class="postit Email span6" />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="ConfirmEmail">Confirm Email Address:</label>

		<div class="controls">
			<div class="span12">
				<input type="email" name="ConfirmEmail" id="ConfirmEmail" class="span6" />
			</div>
		</div>
	</div>
	
</form>