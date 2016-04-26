<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 01:01:12
         compiled from "__views/client/400/page_401_dat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:934002948571e5b68dd86b0-07965346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ae133020783dcaa53b0949cc210e54c101dadf4' => 
    array (
      0 => '__views/client/400/page_401_dat.tpl',
      1 => 1426530206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '934002948571e5b68dd86b0-07965346',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datx' => 0,
    'td' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e5b68e8534',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e5b68e8534')) {function content_571e5b68e8534($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_numeric_format')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/modifier.numeric_format.php';
?>
	<tr>
		<th>Date</th>
		<th>Transaction</th>
		<th>Status</th>
		<th>Remarks</th>
		<th>Debit (USD)</th>
		<th>Credit (USD)</th>
		<th>Balance (USD)</th>
		<th>Bonus (USD)</th>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['datx']->value['dat']){?>
	<?php  $_smarty_tpl->tpl_vars['td'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['td']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datx']->value['dat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['td']->key => $_smarty_tpl->tpl_vars['td']->value){
$_smarty_tpl->tpl_vars['td']->_loop = true;
?>
		<tr class="<?php echo smarty_function_cycle(array('values'=>'even,odd'),$_smarty_tpl);?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['TrxDate'];?>
</td>
			<td ><?php echo $_smarty_tpl->tpl_vars['td']->value['Transaction'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['td']->value['Status']==0){?>Pending<?php }elseif($_smarty_tpl->tpl_vars['td']->value['Status']==1){?>Success<?php }?></td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['Remarks'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['Debit'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['Credit'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['CurrentBalance'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['CurrentBonus'];?>
</td>
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
	<?php }} ?>