<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 01:01:11
         compiled from "__views/client/300/page_301_dat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:271028056571e5b67b6df54-91146761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee7419183edbcea70942e5cb7a6edf1fe143a57b' => 
    array (
      0 => '__views/client/300/page_301_dat.tpl',
      1 => 1426530206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271028056571e5b67b6df54-91146761',
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
  'unifunc' => 'content_571e5b67c3781',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e5b67c3781')) {function content_571e5b67c3781($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_numeric_format')) include '/home/sloki/user/isyageri/sites/ribcommunity.com/www/application/libraries/smarty/libs/plugins/modifier.numeric_format.php';
?>
	<tr>
		<th class="hide">AccountID</th>
		<th>Registration Date</th>
		<th>Account</th>
		<th>Account Name</th>
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
			<td class="hide"><?php echo $_smarty_tpl->tpl_vars['td']->value['AccountID'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['CreatedDate'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['UserID'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['td']->value['FirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['td']->value['MiddleName'];?>
 <?php echo $_smarty_tpl->tpl_vars['td']->value['LastName'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['td']->value['status']==0){?>Requesting<?php }elseif($_smarty_tpl->tpl_vars['td']->value['status']==1){?>Active<?php }?></td>
			
		</tr>
	<?php } ?>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['datx']->value['dat']){?>
	<tr><td colspan="5" class="bold left sep-top">Page <?php if ($_smarty_tpl->tpl_vars['nav']->value['TotalPage']<$_smarty_tpl->tpl_vars['nav']->value['CurrentPage']){?> 0 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nav']->value['CurrentPage'];?>
 <?php }?> of <?php echo $_smarty_tpl->tpl_vars['nav']->value['TotalPage'];?>
 , Total Data <?php echo smarty_modifier_numeric_format($_smarty_tpl->tpl_vars['datx']->value['tot'],0);?>
</td></tr>
	<?php }?>
	<tr>
		<?php if (!$_smarty_tpl->tpl_vars['datx']->value['dat']){?>
		<td colspan="5" class="center">
			-- Data is not available --
		</td>
		<?php }else{ ?>
		<td colspan="5" class="center left">
			<?php echo $_smarty_tpl->getSubTemplate ("page_btn_nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</td>
		<?php }?>
	
	</tr>
	
	<tr>
		<td colspan="5" class="right">
			<a href="#f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" class="button add fr right" onclick="f_open(this)" style="margin-top:10px;">Refer New Account</a>
		</td>
	</tr>
<?php }} ?>