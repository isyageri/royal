<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 11:40:17
         compiled from "__views/client/100/page_103.tpl" */ ?>
<?php /*%%SmartyHeaderCode:320495272571ef1314b0ba8-33000385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c33ea823f16f59caa59e18f3a5c0b9d0be909b23' => 
    array (
      0 => '__views/client/100/page_103.tpl',
      1 => 1427567372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320495272571ef1314b0ba8-33000385',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'csrf' => 0,
    'datx' => 0,
    'IdentificationType' => 0,
    'dt' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571ef131b00f9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571ef131b00f9')) {function content_571ef131b00f9($_smarty_tpl) {?><div id="content-title">Personal Information</div>
<div class="menu-desc text-red">
</div>
<form>
	<input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['AccountID'];?>
" name="AccountID" id="AccountID" class="postit AccountID" />
	<label>Name Verification</label><br/><br/>
	<div class="clear" style="width: 600px;">
		<div class="fl personal-info" >
			<div  class="clear"><label for="FirstName" class="mandatory">First Name</label></div>
			<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['FirstName'];?>
" name="FirstName" id="FirstName" class="postit FirstName" disabled readonly />
		</div>
		<div class="fl  personal-info">
			<div  class="clear"><label for="MiddletName">Middle Name</label>
			</div>
			<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['MiddleName'];?>
" name="MiddletName" id="MiddletName" class="postit MiddleName"  disabled readonly />
		</div>
		<div class="fl  personal-info">
			<div  class="clear"><label for="LastName">Last Name</label></div>
			<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['LastName'];?>
" name="LastName" id="LastName" class="postit LastName"  disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="IDType">ID Type</label></div>
			<select id="IDType" name="IDType" class="postit IDType rib-input-normal">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['IdentificationType']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option <?php if ($_smarty_tpl->tpl_vars['datx']->value['IDType']==$_smarty_tpl->tpl_vars['dt']->value['id']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
			</select>
				
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="IDNumber">ID Number</label></div>
			<input id="IDNumber" name="IDNumber" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['IDNumber'];?>
" class="postit IDNumber rib-input-normal" />
		</div>
		
	</div>
	<div class="clear" style="width: 600px;margin-top:20px;">
	<strong>Date of Birth Verification</strong><br/><br/>
		<div class="input-append date" id="dp3" data-date="12-02-2014" data-date-format="dd-mm-yyyy">
		  <input id="DateOfBirth" class="postit DateOfBirth rib-date" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['DateOfBirth'];?>
" size="16" type="text">
		  <span class="add-on"><i class="icon-th"></i></span>
		</div>
		
	</div>
	    <a href="#" class="button upd rib-save" data-url="#chome/crud/f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
/" style="margin-top:10px;">Save</a>

</form><?php }} ?>