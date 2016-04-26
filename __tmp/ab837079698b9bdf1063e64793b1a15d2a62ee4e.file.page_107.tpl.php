<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 11:40:54
         compiled from "__views/client/100/page_107.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1828457281571ef1567e9301-54886269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab837079698b9bdf1063e64793b1a15d2a62ee4e' => 
    array (
      0 => '__views/client/100/page_107.tpl',
      1 => 1427567372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1828457281571ef1567e9301-54886269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'csrf' => 0,
    'datx' => 0,
    'SecurityQuestion' => 0,
    'dt' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571ef156a754c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571ef156a754c')) {function content_571ef156a754c($_smarty_tpl) {?><div id="content-title">Change My Security Question</div>
<div class="menu-desc">
	Please enter the required information. Royal Investment is not responsible for errors made by the account holder.
</div>
<form>
	<br/><br/>
	<label><strong>Security Informantion</strong></label>
	<input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['AccountID'];?>
" name="AccountID" id="AccountID" class="postit AccountID" />
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="SecurityQuestionID">Security Question</label></div>
			<select id="SecurityQuestionID" name="SecurityQuestionID" class="postit SecurityQuestionID rib-input-wide" data-placeholder="Click to Choose...">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SecurityQuestion']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option <?php if ($_smarty_tpl->tpl_vars['datx']->value['SecurityQuestionID']==$_smarty_tpl->tpl_vars['dt']->value['id']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
			</select>	
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="SecurityQuestionAnswer">Security Answer</label></div>
			<input id="SecurityQuestionAnswer" name="SecurityQuestionAnswer" value="<?php echo $_smarty_tpl->tpl_vars['datx']->value['SecurityQuestionAnswer'];?>
" class="postit SecurityQuestionAnswer rib-input-wide" />
		</div>
	</div>
	
	<label><strong>Change Password</strong></label>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="PrevPassword">Your Password</label></div>
			<input id="PrevPassword" name="PrevPassword" class="postit PrevPassword rib-input-wide" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="passwd">New Password</label></div>
			<input id="passwd" name="passwd" class="postit passwd rib-input-wide" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >
			<div  class="clear"><label for="passwdConfirm">Confirm New Password</label></div>
			<input id="passwdConfirm" name="passwdConfirm" class="postit passwdConfirm rib-input-wide" />
		</div>
	</div>
	
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-wide" >I understand the importance of the details provided in bank information, as this may be used to process withdrawal requests made by me.
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