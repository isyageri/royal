<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 11:40:31
         compiled from "__views/client/100/page_104.tpl" */ ?>
<?php /*%%SmartyHeaderCode:931844525571ef13f20ef72-37247015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27d312d34c83cfe536d57e7efc36cde89bf9ee13' => 
    array (
      0 => '__views/client/100/page_104.tpl',
      1 => 1427567372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '931844525571ef13f20ef72-37247015',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'csrf' => 0,
    'datx' => 0,
    'Country' => 0,
    'dt' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571ef13f46d87',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571ef13f46d87')) {function content_571ef13f46d87($_smarty_tpl) {?><div id="content-title">Change Your Contact Information</div>
<div class="menu-desc text-red">
</div>
<form>
	<input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['AccountID'];?>
" name="AccountID" id="AccountID" class="postit AccountID" />
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Country">Country</label></div>
			<select id="CountryID" name="CountryID" class="postit CountryID rib-input-normal" data-placeholder="Click to Choose...">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
				
					<option <?php if ($_smarty_tpl->tpl_vars['datx']->value['CountryID']==$_smarty_tpl->tpl_vars['dt']->value['id']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
			</select>
				
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="Address">Address</label></div>
			<input id="Address" name="Address" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['Address'];?>
" class="postit Address rib-input-wide" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="City">City</label></div>
			<input id="City" name="City" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['City'];?>
" class="postit City rib-input-normal" />
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="Zipcode">Zip / Postal Code</label></div>
			<input id="Zipcode" name="Zipcode" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['Zipcode'];?>
" class="postit Zipcode rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Province">State/Province</label></div>
			<input id="Province" name="Province" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['Province'];?>
" class="postit Province rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Phone">Phone</label></div>
			<input id="Phone" name="Phone" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['Phone'];?>
" class="postit Phone rib-input-normal" />
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label for="MobilePhone">Mobile Phone</label></div>
			<input id="MobilePhone" name="MobilePhone" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['MobilePhone'];?>
" class="postit MobilePhone rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Email">Email Address</label></div>
			<input id="Email" name="Email" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['Email'];?>
" class="postit Email rib-input-normal" />
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >I hereby represent that the information provided above is true and correct. Royal Investment reserves the right, but has no duty, to verify the accuracy of information provided, and to contact the account holder, bankers, brokers, and others, as it deems necessary. Falsified information may result in legal action and is punishable by law.
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		By submitting below, I certify that I am the person authorised to initiate such transactions. I also acknowledge that Royal Investment may neither make nor receive payments via a third party, and is held harmless of any transactions not arising of deliberate negligence.
		
	</div>
	<a href="#" class="button upd rib-save" data-url="#chome/crud/f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
/" style="margin-top:10px;">Save</a>
</form><?php }} ?>