<h3 class="lighter block green">Personal Contact Information</h3>

<form class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data" />
	<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
	<input type="text" name="CountryID" id="CountryID" class="postit CountryID hide" value="{$user.CountryID}" />
	<input type="text" name="AccountTypeID" id="AccountTypeID" class="postit AccountTypeID hide" value="{$user.AccountTypeID}" />
	<input type="text" name="CurrencyID" id="CurrencyID" class="postit CurrencyID hide" value="{$user.CurrencyID}" />
	<div class="control-group">
		<label class="control-label" for="AccountTitle">Title :</label>
		<div class="controls">
			<span class="span4">
				<select class="postit AccountTitle span4" id="AccountTitle" name="AccountTitle">
					{foreach from=$AccountTitleRef item=dt}
					<option value="{$dt.nm}">{$dt.nm}
					{/foreach}
				</select>
			</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="FirstName">Name :</label>
		<div class="controls">
			<div class="span6">
				<input type="text" name="FirstName" id="FirstName" class="postit FirstName span6" />
			</div>
		</div>
	</div>

	<!-- <div class="control-group">
		<label class="control-label" for="MiddleName">Middle Name :</label>
		<div class="controls">
			<div class="span6">
				<input type="text" name="MiddleName" id="MiddleName" class="postit MiddleName span6" />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="LastName">Last Name :</label>
		<div class="controls">
			<div class="span6">
				<input type="text" name="LastName" id="LastName" class="postit LastName span6" />
			</div>
		</div>
	</div> -->

	<div class="hr hr-dotted"></div>

<!--	<div class="control-group">
		<label class="control-label" for="CitizenshipID">Citizenship</label>
		<div class="controls">
			<span class="span12">
				<select id="CitizenshipID" name="CitizenshipID" class="postit CitizenshipID select2" data-placeholder="Click to Choose...">
					{foreach from=$Citizenship item=dt}
					<option value="{$dt.id}">{$dt.nm}
					{/foreach}
				</select>
			</span>
		</div>
	</div> -->
	
	<div class="control-group">
		<label class="control-label" for="IDType">ID Type :</label>
		<div class="controls">
			<span class="span4">
				<select class="postit IDType span4" id="IDType" name="IDType">
					{foreach from=$IdentificationType item=dt}
					<option value="{$dt.id}">{$dt.nm}
					{/foreach}
				</select>
			</span>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="IDNumber">Identification Number:</label>

		<div class="controls">
			<span class="span6">
				<input class="postit IDNumber span6" type="text" id="IDNumber" name="IDNumber" />
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="IdentificationDoc">Identification Doc:</label>

		<div class="controls">
			<span class="span6">
				<input class="postit IdentificationDoc span6" type="file" id="IdentificationDoc" name="IdentificationDoc" />
			</span>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label">Gender</label>
		<div class="controls">
			<span class="span12">
				<label class="blue">
					<input class="postit Gender" name="Gender" value="Male" type="radio" />
					<span class="lbl"> Male</span>
				</label>

				<label class="blue">
					<input class="postit Gender" name="Gender" value="Female" type="radio" />
					<span class="lbl"> Female</span>
				</label>
			</span>
		</div>
	</div>
	
	
	
	<div class="control-group">
		<label class="control-label" for="DateofBirth">Date of Birth :</label>
		<div class="controls">
			<span class="span12">
			<!--<div id="DateOfBirth" name="DateOfBirth"></div>-->
				<div class="input-append date" id="dp3" data-date="01-01-1990" data-date-format="dd-mm-yyyy">
				  <input id="DateOfBirth" class="postit DateOfBirth rib-date" value="" size="16" type="text">
				  <span class="add-on"><i class="icon-th"></i></span>
				</div>
				{*<input type="text" id="DateOfBirth" class="postit DateOfBirth date" value="" />*}
			</span>
		</div>
	</div>
	

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<script type="text/javascript">
		$( document ).ready(function() {
			$("#DateOfBirth").birthdayPicker(); 
		});
	</script>
	
</form>