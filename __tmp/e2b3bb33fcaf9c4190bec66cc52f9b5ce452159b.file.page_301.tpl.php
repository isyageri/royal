<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 01:01:11
         compiled from "__views/client/300/page_301.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180739813571e5b679f8145-16419543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2b3bb33fcaf9c4190bec66cc52f9b5ce452159b' => 
    array (
      0 => '__views/client/300/page_301.tpl',
      1 => 1423245324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180739813571e5b679f8145-16419543',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'csrf' => 0,
    'auth' => 0,
    'AccountType' => 0,
    'dt' => 0,
    'Currency' => 0,
    'Country' => 0,
    'IdentificationType' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e5b67b3ef1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e5b67b3ef1')) {function content_571e5b67b3ef1($_smarty_tpl) {?><div id="content-title">Referral</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions. Please log into your trading station for your real time equity balance.
</div>

<h2 class="rib-sub-title">Referral</h2>
<table id="t<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" cellspacing="0" cellpadding="0" class="client-table"><?php echo $_smarty_tpl->getSubTemplate ("client/300/page_".($_smarty_tpl->tpl_vars['menu']->value)."_dat.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</table>

<form id="f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" class="hide">
	<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="hidden" class="postit ParentRefID keepit" value="<?php echo $_smarty_tpl->tpl_vars['auth']->value['AccountID'];?>
" name="ParentRefID" id="ParentRefID" />
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="AccountTypeID" class="mandatory">Account Type</label></div>
			<select id="AccountTypeID" name="AccountTypeID" class="postit AccountTypeID rib-input-normal">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AccountType']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
			</select>
				
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="CurrencyID" class="mandatory">Currency</label></div>
			<select id="CurrencyID" name="CurrencyID" class="postit CurrencyID rib-input-normal" >
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Currency']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
			</select>
				
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Country" class="mandatory">Country</label></div>
			<select id="CountryID" name="CountryID" class="postit CountryID rib-input-normal" >
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
			</select>
				
		</div>
		
	</div>
	<div class="clear" style="width: 600px;">
		<div class="fl personal-info" >
			<div  class="clear"><label for="FirstName" class="mandatory">First Name</label></div>
			<input type="text" value="" name="FirstName" id="FirstName" class="postit FirstName" />
		</div>
		<div class="fl  personal-info">
			<div  class="clear"><label for="MiddletName">Middle Name</label>
			</div>
			<input type="text" value="" name="MiddletName" id="MiddletName" class="postit MiddleName" />
		</div>
		<div class="fl  personal-info">
			<div  class="clear"><label for="LastName">Last Name</label></div>
			<input type="text" value="" name="LastName" id="LastName" class="postit LastName" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="IDType" class="mandatory">ID Type</label></div>
			<select id="IDType" name="IDType" class="postit IDType rib-input-normal">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['IdentificationType']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
			</select>
				
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="IDNumber" class="mandatory">ID Number</label></div>
			<input id="IDNumber" name="IDNumber" value="" class="postit IDNumber rib-input-normal" />
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Gender">Gender</label></div>
			<select id="Gender" name="Gender" class="postit Gender rib-input-normal">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
				
		</div>
		
	</div>
	<div class="clear" style="width: 600px;margin-top:20px;">
	<strong>Date of Birth Verification</strong><br/><br/>
		<input type="text" id="DateOfBirth" class="postit DateOfBirth date" value="" />
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Email" class="mandatory">Email Address</label></div>
			<input id="Email" name="Email" value="" class="postit Email rib-input-normal" />
		</div>
		
	</div>
	<a href="#" class="button rib-save hastable" data-url="#chome/reg/<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
/" style="margin-top:10px;">Save</a>
</form>

<?php }} ?>