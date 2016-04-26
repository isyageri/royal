<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 20:25:02
         compiled from "__views/auth/step2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1773040611571e1aaebd76e8-03896487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f20f953b8c05e8a3697b415307425a3af770f9aa' => 
    array (
      0 => '__views/auth/step2.tpl',
      1 => 1460305528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1773040611571e1aaebd76e8-03896487',
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
  'unifunc' => 'content_571e1aaede9ab',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e1aaede9ab')) {function content_571e1aaede9ab($_smarty_tpl) {?><h3 class="lighter block green">Employment Information</h3>

<form class="form-horizontal" id="validation-form2" method="get" />
	
	<!-- <div class="control-group">
		<label class="control-label" for="CountryID">Country of Residence</label>

		<div class="controls">
			<span class="span12">
				<select id="CountryID" name="CountryID" class="postit CountryID select2" data-placeholder="Click to Choose...">
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
	
</form><?php }} ?>