<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 11:40:46
         compiled from "__views/client/100/page_106.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1161257975571ef14e4584f2-37675923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd5452ca9fd4b67331dc31c5d9d0d7a632f359a5' => 
    array (
      0 => '__views/client/100/page_106.tpl',
      1 => 1427567372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1161257975571ef14e4584f2-37675923',
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
  'unifunc' => 'content_571ef14e5f1a0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571ef14e5f1a0')) {function content_571ef14e5f1a0($_smarty_tpl) {?><div id="content-title">Beneficiary or Inheritor</div>
<div class="menu-desc">
	Please enter the required information. Royal Investment is not responsible for errors made by the account holder.
</div>
<form>
	<br/><br/>
	<label><strong>Beneficiary or Inheritor Informantion</strong></label>
	<input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['AccountID'];?>
" name="AccountID" id="AccountID" class="postit AccountID" />
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryName">Beneficiary Name</label></div>
			<input id="BeneficiaryName" name="BeneficiaryName" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BeneficiaryName'];?>
" class="postit BeneficiaryName rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryIDType">ID Type</label></div>
			<select id="BeneficiaryIDType" name="BeneficiaryIDType" class="postit BeneficiaryIDType rib-input-normal">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['IdentificationType']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option <?php if ($_smarty_tpl->tpl_vars['datx']->value['BeneficiaryIDType']==$_smarty_tpl->tpl_vars['dt']->value['id']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
			</select>
				
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryIDNumber">ID Number</label></div>
			<input id="BeneficiaryIDNumber" name="BeneficiaryIDNumber" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BeneficiaryIDNumber'];?>
" class="postit BeneficiaryIDNumber rib-input-normal" />
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="BeneficiaryAddress">Address</label></div>
			<input id="BeneficiaryAddress" name="BeneficiaryAddress" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BeneficiaryAddress'];?>
" class="postit BeneficiaryAddress rib-input-wide" />
		</div>
	</div>
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryPhone">Phone</label></div>
			<input id="BeneficiaryPhone" name="BeneficiaryPhone" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BeneficiaryPhone'];?>
" class="postit BeneficiaryPhone rib-input-normal" />
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BeneficiaryEmail">Email Address</label></div>
			<input id="BeneficiaryEmail" name="BeneficiaryEmail" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['BeneficiaryEmail'];?>
" class="postit BeneficiaryEmail rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		By submitting below, I certify that I am the person authorised to initiate such transactions. I also acknowledge that Royal Investment may neither make nor receive payments via a third party, and is held harmless of any transactions not arising of deliberate negligence.
	</div>
	<a href="#" class="button upd rib-save" data-url="#chome/crud/f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
/" style="margin-top:10px;">Save</a>
</form><?php }} ?>