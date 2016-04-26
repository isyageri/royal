<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 20:25:02
         compiled from "__views/auth/step3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1643394360571e1aaedf8304-74181152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffa9c0084954d0762fa584a2e6fdde28ce1a1062' => 
    array (
      0 => '__views/auth/step3.tpl',
      1 => 1427775110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1643394360571e1aaedf8304-74181152',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Country' => 0,
    'dt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e1aaeef8fa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e1aaeef8fa')) {function content_571e1aaeef8fa($_smarty_tpl) {?><h3 class="lighter block green">Bank Information</h3>

<form class="form-horizontal" id="validation-form3" method="get" />
	
	<div class="control-group">
		<label class="control-label" for="BankCountryID">Bank Country</label>
		<div class="controls">
			<span class="span12">
				<select id="BankCountryID" name="BankCountryID" class="postit BankCountryID select2" data-placeholder="Click to Choose...">
					<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>

					<?php } ?>
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
	
</form><?php }} ?>