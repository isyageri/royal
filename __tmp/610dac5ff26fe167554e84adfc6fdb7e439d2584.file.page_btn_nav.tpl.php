<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 21:36:27
         compiled from "__views/page_btn_nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1439401319571e2b6b492d68-51555783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '610dac5ff26fe167554e84adfc6fdb7e439d2584' => 
    array (
      0 => '__views/page_btn_nav.tpl',
      1 => 1423245324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1439401319571e2b6b492d68-51555783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nav' => 0,
    'p' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e2b6b4f798',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e2b6b4f798')) {function content_571e2b6b4f798($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['nav']->value)&&$_smarty_tpl->tpl_vars['nav']->value){?>
<div class="paging-num">
	<?php if ($_smarty_tpl->tpl_vars['nav']->value['IsPrev']){?>  
		<span class="navButton 1 page-num">First</span>
		<span class="page-num">...</span>
	<?php }?>
	
	<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['p']->value==$_smarty_tpl->tpl_vars['nav']->value['CurrentPage']){?>
			<span  class="page-num active"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</span>
		<?php }else{ ?>
			<span class="navButton <?php echo $_smarty_tpl->tpl_vars['p']->value;?>
 page-num"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</span>
		<?php }?>
	<?php } ?>
			
    <?php if ($_smarty_tpl->tpl_vars['nav']->value['IsNext']){?>  
		<span class="page-num">...</span>
		<span class="navButton <?php echo $_smarty_tpl->tpl_vars['nav']->value['TotalPage'];?>
 page-num">Last</span>
	<?php }?>	    
</div>
<script type="text/javascript">
<!--
$(function() {
	$('span.navButton').click(function() {
		var page = this.className.split(' ')[1],
			post = [{ name:'csrf_token', value: $('#csrf').val()},
					{ name:'page', value: page }],
			targ = '#t'+<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
,
			url  = '#chome/page/<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
/nav';
		
		fetch(url, targ, post, function() {
			$(window).resize();
		});
	});
});
-->
</script>
<?php }?><?php }} ?>