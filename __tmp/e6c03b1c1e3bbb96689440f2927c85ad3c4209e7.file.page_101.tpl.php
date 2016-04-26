<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 21:36:00
         compiled from "__views/client/100/page_101.tpl" */ ?>
<?php /*%%SmartyHeaderCode:921937371571e2b5042eb68-63322931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6c03b1c1e3bbb96689440f2927c85ad3c4209e7' => 
    array (
      0 => '__views/client/100/page_101.tpl',
      1 => 1426777498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '921937371571e2b5042eb68-63322931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Account' => 0,
    'menu' => 0,
    'csrf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e2b504c0c9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e2b504c0c9')) {function content_571e2b504c0c9($_smarty_tpl) {?><div id="content-title">Account Summary</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions.
</div>

<table class="client-table">
	<tr>
		<th>Account</th>
		<th>Account Name</th>
		<th>Account Type</th>
		<th>Balance (USD)</th>
		<th>Total Bonus (USD)</th>
		<th>Status</th>
	</tr>
	<tr class="even">
		<td><?php echo $_smarty_tpl->tpl_vars['Account']->value['UserID'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['Account']->value['FirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['Account']->value['MiddleName'];?>
 <?php echo $_smarty_tpl->tpl_vars['Account']->value['LastName'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['Account']->value['AccountTypeName'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['Account']->value['Balance'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['Account']->value['TotalBonus'];?>
</td>
		<td><?php if ($_smarty_tpl->tpl_vars['Account']->value['Status']==1){?>Deposit Active<?php }else{ ?>Deposit Non Active<?php }?></td>
	</tr>
	
</table>
<br/><br/><br/>
<div id="content-title">Reference</div>
<table id="t<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" cellspacing="0" cellpadding="0" class="client-table"><?php echo $_smarty_tpl->getSubTemplate ("client/100/page_".($_smarty_tpl->tpl_vars['menu']->value)."_dat.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</table>
<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
<?php }} ?>