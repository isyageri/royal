<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 11:40:36
         compiled from "__views/client/100/page_105.tpl" */ ?>
<?php /*%%SmartyHeaderCode:877621149571ef144d1cbf4-98275966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c601c856e5580fc5092b92b2043d42070c85fafa' => 
    array (
      0 => '__views/client/100/page_105.tpl',
      1 => 1427775110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '877621149571ef144d1cbf4-98275966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'csrf' => 0,
    'datx' => 0,
    'Country' => 0,
    'dt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571ef14500fe1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571ef14500fe1')) {function content_571ef14500fe1($_smarty_tpl) {?><div id="content-title">Change My Bank Information</div>
<div class="menu-desc">
	Please enter the required information. Royal Investment is not responsible for errors made by the account holder. Royal Investment strongly encourages clients to verify banking details with their financial institution prior to submitting below. Royal Investment only maintains one set of banking instructions. Any changes made below will overwrite your existing profile.
</div>
<form>
	<input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['AccountID'];?>
" name="AccountID" id="AccountID" class="postit AccountID" />
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankCountryID">Country</label></div>
			<select id="BankCountryID" name="BankCountryID" class="postit BankCountryID rib-input-normal" data-placeholder="Click to Choose..." disabled readonly >
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
				
					<option <?php if ($_smarty_tpl->tpl_vars['datx']->value['BankCountryID']==$_smarty_tpl->tpl_vars['dt']->value['id']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
				
			</select>
				
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BankName">Bank Name</label></div>
			<input id="BankName" name="BankName" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BankName'];?>
" class="postit BankName rib-input-wide" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BankAddress">Bank Address</label></div>
			<input id="BankAddress" name="BankAddress" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BankAddress'];?>
" class="postit BankAddress rib-input-wide" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankCity">City</label></div>
			<input id="BankCity" name="BankCity" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BankCity'];?>
" class="postit BankCity rib-input-normal" disabled readonly />
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="BankProvince">State / Province</label></div>
			<input id="BankProvince" name="BankProvince" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BankProvince'];?>
" class="postit BankProvince rib-input-normal" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankPhone">Bank Telephone </label></div>
			<input id="BankPhone" name="BankPhone" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BankPhone'];?>
" class="postit BankPhone rib-input-normal" disabled readonly />
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="BankZipcode">Zip / Postal code </label></div>
			<input id="BankZipcode" name="BankZipcode" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BankZipcode'];?>
" class="postit BankZipcode rib-input-normal" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BankAccountNumber">Bank Account Number</label></div>
			<input id="BankAccountNumber" name="BankAccountNumber" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BankAccountNumber'];?>
" class="postit BankAccountNumber rib-input-wide" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BankSwift">Swift</label></div>
			<input id="BankSwift" name="BankSwift" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BankSwift'];?>
" class="postit BankSwift rib-input-wide" disabled readonly />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >Contact Royal Investment's Admin ( Admin@rib.company ) for any changes.
		</div>
	</div>
	
	
</form><?php }} ?>