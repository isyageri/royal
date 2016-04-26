<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 21:36:27
         compiled from "__views/client/200/page_201_dat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1288587724571e2b6b393142-33275797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12887548639bab8fee3858111d3793bdf13c8ee0' => 
    array (
      0 => '__views/client/200/page_201_dat.tpl',
      1 => 1430327110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1288587724571e2b6b393142-33275797',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datx' => 0,
    'td' => 0,
    'menu' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e2b6b48db1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e2b6b48db1')) {function content_571e2b6b48db1($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_numeric_format')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/modifier.numeric_format.php';
?>
	<tr>
		<th class="hide">DepositID</th>
		<th>Date</th>
		<th>Deposit ID</th>
		<th>Deposit (USD)</th>
		<th>Bank Name</th>
		<th>Sender Name</th>
		<th>Transfer To</th>
		<th>Confirmed Date</th>
		<th>Status</th>
		<th>Remark</th>
		<th>Note</th>
		
		<th>..::..</th>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['datx']->value['dat']){?>
	<?php  $_smarty_tpl->tpl_vars['td'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['td']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datx']->value['dat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['td']->key => $_smarty_tpl->tpl_vars['td']->value){
$_smarty_tpl->tpl_vars['td']->_loop = true;
?>
		<tr class="<?php echo smarty_function_cycle(array('values'=>'even,odd'),$_smarty_tpl);?>
">
			<td class="DepositID hide"><?php echo $_smarty_tpl->tpl_vars['td']->value['DepositID'];?>
</td>
			<td class="BankDestinationID hide"><?php echo $_smarty_tpl->tpl_vars['td']->value['BankDestinationID'];?>
</td>
			<td ><?php echo $_smarty_tpl->tpl_vars['td']->value['DepositDate'];?>
</td>
			<td ><?php echo $_smarty_tpl->tpl_vars['td']->value['NoDeposit'];?>
</td>
			<td class="Deposit"><?php echo $_smarty_tpl->tpl_vars['td']->value['Deposit'];?>
</td>
			<td class="BankName"><?php echo $_smarty_tpl->tpl_vars['td']->value['BankName'];?>
</td>
			<td class="BankAccountName"><?php echo $_smarty_tpl->tpl_vars['td']->value['BankAccountName'];?>
</td>
			<td ><?php echo $_smarty_tpl->tpl_vars['td']->value['RibBank'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['ConfirmedDate'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['td']->value['DepositStatus']==0){?>Requesting<?php }elseif($_smarty_tpl->tpl_vars['td']->value['DepositStatus']==1){?>Wait for Admin Confirmation<?php }elseif($_smarty_tpl->tpl_vars['td']->value['DepositStatus']==2){?>Success<?php }else{ ?>Failed<?php }?></td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['Remark'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['td']->value['DepositStatus']==2&&$_smarty_tpl->tpl_vars['td']->value['IsValid']!=1){?>Not Active<?php }elseif($_smarty_tpl->tpl_vars['td']->value['IsValid']==1){?>Active<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['td']->value['Note'];?>
<?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['td']->value['DepositStatus']==0){?><a href="#f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" class="confirm upd" onclick="f_open(this)">Confirm</a><?php }else{ ?>-<?php }?></td>
			
		</tr>
	<?php } ?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['datx']->value['dat']){?>
	<tr><td colspan="10" class="bold left sep-top">Page <?php if ($_smarty_tpl->tpl_vars['nav']->value['TotalPage']<$_smarty_tpl->tpl_vars['nav']->value['CurrentPage']){?> 0 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nav']->value['CurrentPage'];?>
 <?php }?> of <?php echo $_smarty_tpl->tpl_vars['nav']->value['TotalPage'];?>
 , Total Data <?php echo smarty_modifier_numeric_format($_smarty_tpl->tpl_vars['datx']->value['tot'],0);?>
</td></tr>
	<?php }?>
	<tr>
	
		<?php if (!$_smarty_tpl->tpl_vars['datx']->value['dat']){?>
		<td colspan="10" class="center">
			-- Data is not available --
		</td>
		<?php }else{ ?>
		<td colspan="10" class="center left">
			<?php echo $_smarty_tpl->getSubTemplate ("page_btn_nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</td>
		<?php }?>
	
	
	</tr>
	<tr>
		<td colspan="10" class="right">
			<a href="#f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" class="button add fr right" onclick="f_open(this)" style="margin-top:10px;">New Deposit</a>
		</td>
	</tr>
<?php }} ?>