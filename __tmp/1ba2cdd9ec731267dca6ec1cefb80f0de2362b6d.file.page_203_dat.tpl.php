<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 21:36:32
         compiled from "__views/client/200/page_203_dat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:241438827571e2b70099577-09930859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ba2cdd9ec731267dca6ec1cefb80f0de2362b6d' => 
    array (
      0 => '__views/client/200/page_203_dat.tpl',
      1 => 1426530206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241438827571e2b70099577-09930859',
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
  'unifunc' => 'content_571e2b7013f53',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e2b7013f53')) {function content_571e2b7013f53($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_numeric_format')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/modifier.numeric_format.php';
?>
	<tr>
		<th class="hide">WithdrawID</th>
		<th>Withdraw Date</th>
		<th>Withdraw Type</th>
		<th>Withdraw (USD)</th>
		<th>Admin Fee (USD)</th>
		<th>Confirmed Date</th>
		<th>Status</th>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['datx']->value['dat']){?>
	<?php  $_smarty_tpl->tpl_vars['td'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['td']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datx']->value['dat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['td']->key => $_smarty_tpl->tpl_vars['td']->value){
$_smarty_tpl->tpl_vars['td']->_loop = true;
?>
		<tr class="<?php echo smarty_function_cycle(array('values'=>'even,odd'),$_smarty_tpl);?>
">
			<td class="WithdrawID hide"><?php echo $_smarty_tpl->tpl_vars['td']->value['WithdrawID'];?>
</td>
			<td ><?php echo $_smarty_tpl->tpl_vars['td']->value['WithdrawDate'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['td']->value['WithdrawType']==1){?>Deposit Withdraw<?php }else{ ?>Bonus Withdraw<?php }?></td>
			<td class="Withdraw"><?php echo $_smarty_tpl->tpl_vars['td']->value['Withdraw'];?>
</td>
			<td class="WithdrawFee"><?php echo $_smarty_tpl->tpl_vars['td']->value['WithdrawFee'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['ConfirmedDate'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['td']->value['WithdrawStatus']==0){?>Wait for Confirmation<?php }elseif($_smarty_tpl->tpl_vars['td']->value['WithdrawStatus']==1){?>Success <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['td']->value['Note'];?>
 <?php }?></td>
			
		</tr>
	<?php } ?>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['datx']->value['dat']){?>
	<tr><td colspan="8" class="bold left sep-top">Page <?php if ($_smarty_tpl->tpl_vars['nav']->value['TotalPage']<$_smarty_tpl->tpl_vars['nav']->value['CurrentPage']){?> 0 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nav']->value['CurrentPage'];?>
 <?php }?> of <?php echo $_smarty_tpl->tpl_vars['nav']->value['TotalPage'];?>
 , Total Data <?php echo smarty_modifier_numeric_format($_smarty_tpl->tpl_vars['datx']->value['tot'],0);?>
</td></tr>
	<?php }?>
	<tr>
		<?php if (!$_smarty_tpl->tpl_vars['datx']->value['dat']){?>
		<td colspan="8" class="center">
			-- Data is not available --
		</td>
		<?php }else{ ?>
		<td colspan="8" class="center left">
			<?php echo $_smarty_tpl->getSubTemplate ("page_btn_nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</td>
		<?php }?>
	
	</tr>
	
	<tr>
		<td colspan="8" class="right">
			<a href="#f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" class="button add fr right" onclick="f_open(this)" style="margin-top:10px;">New Withdraw</a>
		</td>
	</tr>
<?php }} ?>