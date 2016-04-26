<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 20:25:02
         compiled from "__views/auth/step1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121530475571e1aaeadb9a6-75329871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b5a2ad78751835d79223e31a4e4137283011339' => 
    array (
      0 => '__views/auth/step1.tpl',
      1 => 1460306770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121530475571e1aaeadb9a6-75329871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'csrf' => 0,
    'user' => 0,
    'AccountTitleRef' => 0,
    'dt' => 0,
    'Citizenship' => 0,
    'IdentificationType' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e1aaebcc2d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e1aaebcc2d')) {function content_571e1aaebcc2d($_smarty_tpl) {?><h3 class="lighter block green">Personal Contact Information</h3>

<form class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data" />
	<input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="text" name="CountryID" id="CountryID" class="postit CountryID hide" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['CountryID'];?>
" />
	<input type="text" name="AccountTypeID" id="AccountTypeID" class="postit AccountTypeID hide" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['AccountTypeID'];?>
" />
	<input type="text" name="CurrencyID" id="CurrencyID" class="postit CurrencyID hide" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['CurrencyID'];?>
" />
	<div class="control-group">
		<label class="control-label" for="AccountTitle">Title :</label>
		<div class="controls">
			<span class="span4">
				<select class="postit AccountTitle span4" id="AccountTitle" name="AccountTitle">
					<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AccountTitleRef']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>

					<?php } ?>
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
					<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Citizenship']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
		<label class="control-label" for="IDType">ID Type :</label>
		<div class="controls">
			<span class="span4">
				<select class="postit IDType span4" id="IDType" name="IDType">
					<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['IdentificationType']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
				
			</span>
		</div>
	</div>
	

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<script type="text/javascript">
		$( document ).ready(function() {
			$("#DateOfBirth").birthdayPicker(); 
		});
	</script>
	
</form><?php }} ?>