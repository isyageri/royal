<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 21:29:51
         compiled from "__views/auth/forgot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:608139171571e29dfb8d206-33671540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86eccadcf83293e6404466f36906d3b4f3a158e5' => 
    array (
      0 => '__views/auth/forgot.tpl',
      1 => 1428510802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '608139171571e29dfb8d206-33671540',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'host' => 0,
    'url' => 0,
    'csrf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e29dfc3c55',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e29dfc3c55')) {function content_571e29dfc3c55($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
    <title>RIB Login Page</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/clientpage.css?<?php echo time();?>
"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/style-login.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
favicon.ico" type="image/png" />
</head>
<body>
<div class="wrap wow zoomIn">
    <!-- strat-contact-form -->
    <p style="text-align: center; margin-right: 30px;"><a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
"> <img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/logo_login.png" alt="" width="400px;"></a></p>
    <!-- start-form -->
    <form id="f_login" class="contact_form"  method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
index.php/chome/processForgot" name="contact_form">
        <input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
        <h1 id="title-box" style="font-size: 26px; color: #4B4B4B">Input your email.</h1>
        <ul>
            <li>
                <input type="text" class="textbox1" name="email" placeholder="Email" required />
                <span class="form_hint">Enter your email</span>
                <p><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/contact.png" alt=""></p>
            </li>
        </ul>
        <input id="lgn-btn" name="forgot" value="Submit"/>
        <div class="clear"></div>
    </form>
    <!-- end-form -->
    <!-- start-account -->

    <!-- end-account -->
    <div class="clear"></div>

    <!-- end-contact-form -->
    <div class="footer">
     </div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/bootstrap-3.0.0/bootstrap.min.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.js"></script>

<script type="text/javascript">
    $(function() {
	var msg_login = jQuery("#msg_login").text();
	if(msg_login!="")
	{
		swal({
						title: "Authentication Error.",
						text: msg_login,
						type: "warning",
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'OK'
						});
	}
        $("#lgn-btn").click(function () {
            $('#f_login').submit();
        });
    });
</script>

</body>
</html><?php }} ?>