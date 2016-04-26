<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 16:15:20
         compiled from "__views/auth/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:479923979571de028ecfd05-88532279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6061611d9258b062ed889139d2f5126e8c50450' => 
    array (
      0 => '__views/auth/login.tpl',
      1 => 1460218584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '479923979571de028ecfd05-88532279',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'host' => 0,
    'url' => 0,
    'csrf' => 0,
    'msg_login' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571de029bcc7d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571de029bcc7d')) {function content_571de029bcc7d($_smarty_tpl) {?><!DOCTYPE HTML>
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
index.php/auth/l" name="contact_form">
        <input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
        <h1 id="title-box" style="font-size: 26px; color: #4B4B4B">Login Into Your Account</h1>
        <ul>
            <li>
                <input type="text" class="textbox1" name="userid" placeholder="User ID" required />
                <span class="form_hint">Enter a UserID</span>
                <p><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/contact.png" alt=""></p>
            </li>
            <li>
                <input type="password" name="passwd" id="passwd" class="textbox2" placeholder="Password">
                <p><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/lock.png" alt=""></p>
            </li>
        </ul>
        <input id="lgn-btn" name="Sign In" value="Sign In"/>
        <div class="clear"></div>
        
        <div class="forgot">
            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
index.php/chome/forgot">forgot password?</a>
        </div>
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
<div id="msg_login" class="hide hidden"><?php echo $_smarty_tpl->tpl_vars['msg_login']->value;?>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/bootstrap-3.0.0/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/wow.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/wow.min.js"></script>
<?php if (!$_smarty_tpl->tpl_vars['auth']->value){?>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/enc_md5.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/enc_sha256.js"></script>
<?php }?>
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
            $('#passwd').val(b64_hmac_sha256($('#csrf').val(), $('#passwd').val()));
            $('#f_login').submit();
        });
    });

    function loginEnter(elm, e)
    {
        if (window.event)
            key = window.event.keyCode;
        else if (e)
            key = e.which;
        else
            return true;
        //keychar = String.fromCharCode(key);
        // control keys
        if ((key==13) )
        {
            $('#passwd').val(b64_hmac_sha256($('#csrf').val(), $('#passwd').val()));
            $('#f_login').submit();
        }
    }
</script>

    


</body>
</html><?php }} ?>