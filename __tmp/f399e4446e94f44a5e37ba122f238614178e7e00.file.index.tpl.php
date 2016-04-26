<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 21:36:00
         compiled from "__views/client/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:636793246571e2b500f3ed1-41115729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f399e4446e94f44a5e37ba122f238614178e7e00' => 
    array (
      0 => '__views/client/index.tpl',
      1 => 1431283544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '636793246571e2b500f3ed1-41115729',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'corp_name' => 0,
    'host' => 0,
    'mmenu' => 0,
    'mn' => 0,
    'cmn' => 0,
    'menuHTML' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e2b5029242',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e2b5029242')) {function content_571e2b5029242($_smarty_tpl) {?><!DOCTYPE html>
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
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/clientpage.css?<?php echo time();?>
"/>
	
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/style.min.css"/>
    
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.css">
	<!--[if IE 6]><link rel="stylesheet" charset="utf-8" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/bootstrap-3.0.0/bootstrap.min.css" media="screen" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" charset="utf-8" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/bootstrap-3.0.0/bootstrap-theme.min.css" media="screen" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" charset="utf-8" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/wf-ie.css" media="screen" /><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/jquery.ui.button.css">
    
    
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/datepicker.css">
	
    
    
    
</head>

<body>
<div id="main-header">
    <header data-track-component="Header" data-track-component-name="Personal">
        <div class="top-navigation">
            <div class="row">
                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-16 col-6-xs">
                <div class="main-header" data-track-component="Header">

                    <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
" data-track-text="Logo">
                        <img class="brand-logo" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/logo.png">
                    </a>
                    <div class="main-navigation">
                       <ul id="main-navigation-menu" class="main-navigation-menu menu-1deep">
                            <li class="divider hidden-xs hidden-md"></li>
                                    <?php  $_smarty_tpl->tpl_vars['mn'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mn']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mmenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mn']->key => $_smarty_tpl->tpl_vars['mn']->value){
$_smarty_tpl->tpl_vars['mn']->_loop = true;
?>
									<li id="menu_<?php echo $_smarty_tpl->tpl_vars['mn']->value['MenuID'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['mn']->value['IsParent']==1){?>IsParent<?php }?>">
										<a href="#" ><?php echo $_smarty_tpl->tpl_vars['mn']->value['Menu'];?>
</a>
										<?php if ($_smarty_tpl->tpl_vars['mn']->value['IsParent']==1){?>
											<ul class="menu-2deep clientpage">
												<li>
												<a href="#"> </a>
												<ul class="menu-3deep">
											<?php  $_smarty_tpl->tpl_vars['cmn'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cmn']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mn']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cmn']->key => $_smarty_tpl->tpl_vars['cmn']->value){
$_smarty_tpl->tpl_vars['cmn']->_loop = true;
?>
												<li id="menu_<?php echo $_smarty_tpl->tpl_vars['cmn']->value['MenuID'];?>
" class="mmenu">
													<a href="#<?php echo $_smarty_tpl->tpl_vars['cmn']->value['Controller'];?>
page/<?php echo $_smarty_tpl->tpl_vars['cmn']->value['MenuID'];?>
"><?php echo $_smarty_tpl->tpl_vars['cmn']->value['Menu'];?>
</a>
												</li>
											<?php } ?>
												</ul>
												</li>
											</ul>
										<?php }?>
										
									</li>
									<?php } ?>

                        </ul>
						  

                        <ul class="main-navigation-register-menu">
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
" data-mobile-url="" class="button" title="home">Home</a>
                            </li>
							<li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/auth/o" data-mobile-url="" class="button" title="logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
	
</div>

<div id="wf-container">
<?php echo $_smarty_tpl->getSubTemplate ("client/100/page_101.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>


<div class="hide">
	<?php echo $_smarty_tpl->tpl_vars['menuHTML']->value;?>

	<div id="host-rib"><?php echo $_smarty_tpl->tpl_vars['host']->value;?>
</div>
</div>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery.mousewheel.js"></script>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/fusioncharts/js/fusioncharts.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/fusioncharts/js/themes/fusioncharts.theme.zune.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/client_royal.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/bootstrap.min.js"></script>
	<?php if (!$_smarty_tpl->tpl_vars['auth']->value){?>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/enc_md5.min.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/enc_sha256.js"></script>
	<?php }?>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/additionalScript.js"></script>
	
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/bootstrap-datepicker.js"></script>
	
	



</body>
</html><?php }} ?>