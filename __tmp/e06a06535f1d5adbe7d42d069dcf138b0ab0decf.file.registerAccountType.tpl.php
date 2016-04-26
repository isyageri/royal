<?php /* Smarty version Smarty-3.1.7, created on 2016-04-27 01:31:47
         compiled from "__views/auth/registerAccountType.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149117509571e1a838f9106-78010048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e06a06535f1d5adbe7d42d069dcf138b0ab0decf' => 
    array (
      0 => '__views/auth/registerAccountType.tpl',
      1 => 1461695460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149117509571e1a838f9106-78010048',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e1a83a8d35',
  'variables' => 
  array (
    'corp_name' => 0,
    'host' => 0,
    'csrf' => 0,
    'Country' => 0,
    'dt' => 0,
    'AccountType' => 0,
    'Currency' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e1a83a8d35')) {function content_571e1a83a8d35($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?php echo $_smarty_tpl->tpl_vars['corp_name']->value;?>
</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="ROBOTS" content="INDEX, FOLLOW"/>
	<meta name="description" content="Investment and Business"/>
	<meta name="keywords" content="Investment,Business,Royal,Money"/>
	<meta name="author" content="Waterfall" />
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
favicon.ico" type="image/png" />
	<!--basic styles-->

		<link href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/select2.css" />

		<!--fonts-->

		<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
-->
		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/ace.min.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/ace-skins.min.css" />
		<!-- This is what you need -->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.css">
		<!--.......................-->
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="a<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/ace-ie.min.css" />
		<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/clientpage.css?<?php echo time();?>
"/>
	<style>
		#s2id_state{
			width:370px !important;
		}
		#form-account-type{
			font-size:12pt;
		}
		ul{
			list-style-type: none;
		}
		
	</style>
</head>
<body>
<div id="wf-container">
	<h1 style="margin-top:20px;">Open an Account</h1>
	<div style="width:740px; float:left;">
		<ul>
			<li>
				<h2>Step 1</h2>
				<p>
					To get started, complete the form on the right and then click <strong>BEGIN APPLICATION</strong>
				</p>
			</li>
			<li>
				<h2>Step 2</h2>
				<p>
					You will then be redirected to a secure <strong>WEBSITE</strong>. Fill out the application.
					<img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/register/AccountTypeStep2.png" alt="account type"/>
				</p>
			</li>
			<li>
				<h2>Step 3</h2>
				<p>
					You will be provided with a username and password upon completing the application. Log in to the secure client portal, and 
					deposit funds. 
				</p>
			</li>
		</ul>
	</div>
	<div style="width:400px;float:right;">
		<form id="form-account-type" style="background-color:#E0E4E9;padding:15px;">
			<input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
			<legend style="border:none;font-size:11pt;margin-bottom:10px;"><strong>APPLY NOW</strong></legend>
			<label class="control-label" for="name" style="font-size:9pt;">CHOOSE YOUR COUNTRY OF RESIDENCE</label>
			<select id="CountryID" name="CountryID" class="postit CountryID select2" data-placeholder="Click to Choose..." style="width:480px;margin-bottom:10px;">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
" /><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>

				<?php } ?>
			</select>
			<label class="control-label" style="font-size:9pt;" for="name">CHOOSE YOUR REGISTRATION OPTION</label>
			<select id="AccountTypeID" name="AccountTypeID" class="postit AccountTypeID select2" data-placeholder="Click to Choose..." style="width:480px;margin-bottom:10px;">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AccountType']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
" /><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>

				<?php } ?>
			</select>
			<label class="control-label" style="font-size:9pt;" for="name">CHOOSE YOUR ACCOUNT DENOMINATION</label>
			<select id="CurrencyID" name="CurrencyID" class="postit CurrencyID select2" data-placeholder="Click to Choose..." style="width:480px;margin-bottom:10px;">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Currency']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
" /><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>

				<?php } ?>
				
			</select>
		
				<a class="btn rib-save" data-url="#chome/RegisterForm" style="background-color:#0C51A3;margin:20px 0px 0px 98px;">
					BEGIN APPLICATION
					<i class="icon-arrow-right icon-on-right"></i>
				</a>
			
		</form>
	</div>
</div>
<div id="host-rib" class="hide hidden"><?php echo $_smarty_tpl->tpl_vars['host']->value;?>
</div>
    <script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery/jquery-2.1.1.min.js'>"+"<"+"/script>");
	</script>
	<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery/jquery-2.1.1.min.js" >
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/bootstrap-3.0.0/bootstrap.min.js"></script>-->
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/bootstrap-ace.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/fuelux.wizard.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/additional-methods.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/bootbox.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/select2.min.js"></script>

	<!--ace scripts-->

	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/ace-elements.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/ace.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery-ui-1.10.4.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/royal.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/rib-registration-ace.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery.blockUI.js"></script>
	
	<script type="text/javascript">
	 $(document).ajaxStart(function () {
        //Global Jquery UI Block
        $(document).ajaxStart($.blockUI({
            message: 'Loading...',
            css: {
                border: 'none', 
				padding: '15px', 
				backgroundColor: '#000', 
				'-webkit-border-radius': '10px', 
				'-moz-border-radius': '10px', 
				opacity: .5, 
				color: '#fff' 
            }

        })).ajaxStop($.unblockUI);

    });
	
	</script>
	
	
		
	<?php if (!$_smarty_tpl->tpl_vars['auth']->value){?>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/enc_md5.min.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/enc_sha256.js"></script>
	<?php }?>
	
	
	
	
</body>
</html>


<?php }} ?>