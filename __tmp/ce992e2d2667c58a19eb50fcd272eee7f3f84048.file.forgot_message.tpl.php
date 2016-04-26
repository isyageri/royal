<?php /* Smarty version Smarty-3.1.7, created on 2016-04-26 06:50:33
         compiled from "__views/auth/forgot_message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1024754882571ead498e1288-13190630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce992e2d2667c58a19eb50fcd272eee7f3f84048' => 
    array (
      0 => '__views/auth/forgot_message.tpl',
      1 => 1428510802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1024754882571ead498e1288-13190630',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'host' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571ead49df1d6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571ead49df1d6')) {function content_571ead49df1d6($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
    <title>RIB Forgot Password Page</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/clientpage.css?<?php echo time();?>
"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/style-login.css" rel="stylesheet" type="text/css" media="all" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
favicon.ico" type="image/png" />
</head>
<body>
<div class="wrap">
    <div style="text-align: center; margin-right: 30px; padding:20px;width:500px; background-color:#fefefe;border-radius:5px;">
		<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

	</div>
</div>
</body>
</html><?php }} ?>