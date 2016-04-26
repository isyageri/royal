<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 21:36:32
         compiled from "__views/client/200/page_203.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31634521571e2b7002ebd2-72450228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34c40176d281e7ae03659d62814766a2d565a0ab' => 
    array (
      0 => '__views/client/200/page_203.tpl',
      1 => 1426284500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31634521571e2b7002ebd2-72450228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'csrf' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e2b7009530',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e2b7009530')) {function content_571e2b7009530($_smarty_tpl) {?><div id="content-title">Withdraw</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions. Please log into your trading station for your real time equity balance.
</div>

<h2 class="rib-sub-title">Withdraw History</h2>
<table id="t<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" cellspacing="0" cellpadding="0" class="client-table"><?php echo $_smarty_tpl->getSubTemplate ("client/200/page_".($_smarty_tpl->tpl_vars['menu']->value)."_dat.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</table>

<form id="f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" class="hide">
	<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="hidden" class="postit AccountID keepit" value="<?php echo $_smarty_tpl->tpl_vars['auth']->value['AccountID'];?>
" name="AccountID" id="AccountID" />
	<input type="hidden" class="postit WithdrawID" value="" name="WithdrawID" id="WithdrawID" />
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="WithdrawType" class="mandatory">Withdraw type</label></div>
			<select onchange="WithdrawTypeChanged(this)" id="WithdrawType" name="WithdrawType" value="" class="postit WithdrawType rib-input-normal ro" >
				<option value="1">Deposit</option>
				<option value="2" selected>Bonus</option>
			</select>
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Withdraw">Withdraw (USD)</label></div>
			<input id="Withdraw" name="Withdraw" value="" class="postit Withdraw ro rib-input-normal numeric" />
		</div>
	</div>
	
	<a href="#" class="button rib-save hastable" data-url="#chome/confirm/<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
/" style="margin-top:10px;">Save</a>
	<a href="#" class="button" onclick="back(this)" style="margin-top:10px;">Back</a>
</form>

<?php }} ?>