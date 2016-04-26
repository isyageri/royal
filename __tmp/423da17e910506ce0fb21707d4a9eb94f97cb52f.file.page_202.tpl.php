<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 11:41:06
         compiled from "__views/client/200/page_202.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2095036579571ef1624997c3-54337612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '423da17e910506ce0fb21707d4a9eb94f97cb52f' => 
    array (
      0 => '__views/client/200/page_202.tpl',
      1 => 1424507174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2095036579571ef1624997c3-54337612',
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
  'unifunc' => 'content_571ef162b7366',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571ef162b7366')) {function content_571ef162b7366($_smarty_tpl) {?><div id="content-title">Transfer</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions. Please log into your trading station for your real time equity balance.
</div>

<h2 class="rib-sub-title">Transfer History</h2>
<table id="t<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" cellspacing="0" cellpadding="0" class="client-table"><?php echo $_smarty_tpl->getSubTemplate ("client/200/page_".($_smarty_tpl->tpl_vars['menu']->value)."_dat.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</table>

<form id="f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" class="hide">
	<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="hidden" class="postit AccountID keepit" value="<?php echo $_smarty_tpl->tpl_vars['auth']->value['AccountID'];?>
" name="AccountID" id="AccountID" />
	<input type="hidden" class="postit BalanceTransferID" value="" name="BalanceTransferID" id="BalanceTransferID" />
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="DestinationAccount" class="mandatory">Destination Account</label></div>
			<input id="DestinationAccount" name="DestinationAccount" value="" class="postit DestinationAccount rib-input-normal ro" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Transfer" class="mandatory">Amount (USD)</label></div>
			<input id="Transfer" name="Transfer" value="" class="postit Transfer ro rib-input-normal number" />
		</div>
	</div>
	<a href="#" class="button rib-save hastable" data-url="#chome/confirm/<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
/" style="margin-top:10px;">Save</a>
	<a href="#" class="button" onclick="back(this)" style="margin-top:10px;">Back</a>
</form>

<?php }} ?>