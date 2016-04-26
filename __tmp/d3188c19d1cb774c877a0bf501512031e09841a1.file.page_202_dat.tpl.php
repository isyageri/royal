<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 11:41:06
         compiled from "__views/client/200/page_202_dat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183376152571ef162b7a705-91789073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3188c19d1cb774c877a0bf501512031e09841a1' => 
    array (
      0 => '__views/client/200/page_202_dat.tpl',
      1 => 1426530206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183376152571ef162b7a705-91789073',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datx' => 0,
    'td' => 0,
    'nav' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571ef1633c96c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571ef1633c96c')) {function content_571ef1633c96c($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_numeric_format')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/modifier.numeric_format.php';
?>
	<tr>
		<th class="hide">BalanceTransferID</th>
		<th>Date</th>
		<th>Account</th>
		<th>Amount (USD)</th>
		<th class="hide">Destination Account</th>
		<th>Destination Account</th>
		<th>Status</th>
		<th>Note</th>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['datx']->value['dat']){?>
	<?php  $_smarty_tpl->tpl_vars['td'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['td']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datx']->value['dat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['td']->key => $_smarty_tpl->tpl_vars['td']->value){
$_smarty_tpl->tpl_vars['td']->_loop = true;
?>
		<tr class="<?php echo smarty_function_cycle(array('values'=>'even,odd'),$_smarty_tpl);?>
">
			<td class="BalanceTransferID hide"><?php echo $_smarty_tpl->tpl_vars['td']->value['BalanceTransferID'];?>
</td>
			<td ><?php echo $_smarty_tpl->tpl_vars['td']->value['TransferDate'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['UserID'];?>
</td>
			<td class="Transfer"><?php echo $_smarty_tpl->tpl_vars['td']->value['Transfer'];?>
</td>
			<td class="DestinationAccount hide"><?php echo $_smarty_tpl->tpl_vars['td']->value['DestinationAccount'];?>
</td>
			<td ><?php echo $_smarty_tpl->tpl_vars['td']->value['DestAcc'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['td']->value['Status']==0){?>Failed<?php }elseif($_smarty_tpl->tpl_vars['td']->value['Status']==1){?>Success<?php }else{ ?> - <?php }?></td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['Note'];?>
</td>
			
		</tr>
	<?php } ?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['datx']->value['dat']){?>
	<tr><td colspan="7" class="bold left sep-top">Page <?php if ($_smarty_tpl->tpl_vars['nav']->value['TotalPage']<$_smarty_tpl->tpl_vars['nav']->value['CurrentPage']){?> 0 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nav']->value['CurrentPage'];?>
 <?php }?> of <?php echo $_smarty_tpl->tpl_vars['nav']->value['TotalPage'];?>
 , Total Data <?php echo smarty_modifier_numeric_format($_smarty_tpl->tpl_vars['datx']->value['tot'],0);?>
</td></tr>
	<?php }?>
	<tr>
		<?php if (!$_smarty_tpl->tpl_vars['datx']->value['dat']){?>
		<td colspan="7" class="center">
			-- Data is not available --
		</td>
		<?php }else{ ?>
		<td colspan="7" class="center left">
			<?php echo $_smarty_tpl->getSubTemplate ("page_btn_nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</td>
		<?php }?>
	</tr>
	<tr>
		<td colspan="7" class="right">
			<a href="#f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" class="button add fr right" onclick="f_open(this)" style="margin-top:10px;">Transfer Your Balance</a>
		</td>
	</tr>
<?php }} ?>