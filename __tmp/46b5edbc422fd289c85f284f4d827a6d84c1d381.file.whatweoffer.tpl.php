<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 10:09:37
         compiled from "__views/whatweoffer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2033341651571dded16e0ca9-24688771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46b5edbc422fd289c85f284f4d827a6d84c1d381' => 
    array (
      0 => '__views/whatweoffer.tpl',
      1 => 1431486146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2033341651571dded16e0ca9-24688771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'corp_name' => 0,
    'host' => 0,
    'whatweoffermenu' => 0,
    'wwo' => 0,
    'content_title' => 0,
    'whatweoffer' => 0,
    'csrf_hash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571dded19b3be',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571dded19b3be')) {function content_571dded19b3be($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en-GB">
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
__assets/css/ui/layout.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/tablecomp.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/modules.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/typography.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/content.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/button.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/theme.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/thickbox.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/fck.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/navigation.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/footer.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/cookie.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/breadcrumbs.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/services.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ui/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/animate.css"/>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery/jquery-2.1.1.min.js"></script>
	
	
</head>

<body class='personal Campaign'>
<div id="main-header">
    <header>
        <div class="top-navigation">
            
                
                
                
                
                
                    
                    
                
            
        </div>
        <div class="main-header">
            <div class="main-navigation-toggle hidden-lg">
                <a href="#" id="navigation-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </div>
            <a href='<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
'>
                <img class="brand-logo" height='46' width='269' src='<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/logo.png'/>
            </a>
            <div class="main-navigation">
                <ul id="main-navigation-menu" class="main-navigation-menu menu-1deep" style="width: auto;">
                    <li class="divider hidden-xs hidden-md"></li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/whoweare">Who We Are</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/whatwedo">What We Do</a>
                        <ul class="menu-2deep">
                            <li>
                                <a href="#">What We Do</a>
                                <ul class="menu-3deep">
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/whatwedo" title="Private Wealth Management">
                                            Private Wealth Management</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/whatwedo" title="Retirement Assets Management And Education Saving Program">
                                            Retirement Asset Management And Education Savings Program</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/portfolio" title="Premier loan">
                                            Portfolio</a>
                                    </li>
                                    <li class="important-information hidden-xs hidden-md">
                                        <ul>
                                            <li><span>&nbsp;</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/whatweoffer">What We Offer</a>
                        <ul class="menu-2deep">
                            <li>
                                <a href="#">What We Offer</a>
                                <ul class="menu-3deep">
                                    <?php  $_smarty_tpl->tpl_vars['wwo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wwo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['whatweoffermenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['wwo']->key => $_smarty_tpl->tpl_vars['wwo']->value){
$_smarty_tpl->tpl_vars['wwo']->_loop = true;
?>
                                        <li>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/<?php echo $_smarty_tpl->tpl_vars['wwo']->value['Controller'];?>
" title="Individual Client / Basic Account">
                                                <?php echo $_smarty_tpl->tpl_vars['wwo']->value['Menu'];?>
</a>
                                        </li>

                                    <?php } ?>
                                </ul>
                            </li>

                            <li class="important-information hidden-xs hidden-md">
                                <ul>
                                    <li><span>&nbsp;</span></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/contactus">Contact Us</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/faq">FAQ</a>
                    </li>

                </ul>
                <ul class="main-navigation-register-menu">
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/chome/Login" class="button" title="Log">Log in</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/chome/RegisterAccountType" class="hidden-xs" title="Register">Register</a>
                    </li>
                    <li class="divider hidden-xs"></li>
                    <li>
                        <a href="#" id="search-toggle">null</a>
                    </li>
                </ul>
            </div>
            <div id="search-bar">
                
                    
                    
                    
                
            </div>
        </div>
    </header>
</div>
<div class="page">
<div class="inner-content-title">
    <i class="fa fa-home"></i>
    <span><?php echo $_smarty_tpl->tpl_vars['content_title']->value;?>
</span>
</div>
<div class="content" style="width:940px;">
   
        
          <div id="wwo">
              <?php  $_smarty_tpl->tpl_vars['wwo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wwo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['whatweoffer']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['wwo']->key => $_smarty_tpl->tpl_vars['wwo']->value){
$_smarty_tpl->tpl_vars['wwo']->_loop = true;
?>
                  <?php echo $_smarty_tpl->tpl_vars['wwo']->value['Description'];?>

              <?php } ?>
              <div id="compar" style="clear: both">
                  <h3 style="text-align: center"><a href="#" id="comparison">See our comparison table.</a></h3>
              </div>
          </div>

       

		
	<div id="main-footer">
		<footer>
		<ul id="footer-links" tabindex="-1">
		<li><a href="#">Privacy and Security</a></li>
		<li><a href="#">Terms of Use</a></li>
		<li><a href="#">Site Map</a></li>
		<li><a href="#">FAQ</a></li>
		<p>© Copyright 2015 Royal Investment and Business, All Rights Reserved</p>
		</footer>
	</div>
</div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/wow.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/wow.min.js"></script>

<script>
    new WOW().init();
</script>
<script type="text/javascript">
    $(document).ready(function(){
       var csrf_hash = '<?php echo $_smarty_tpl->tpl_vars['csrf_hash']->value;?>
';
        $("#comparison").click(function(){
            $.ajax({
                type: 'POST',
                url: '<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/whatweoffer/comparison',
                data: { csrf_token:csrf_hash },
                success: function(data){
                    $("#wwo").html(data);
                }
            })
        });
    });
</script>
</body>
</html>
<?php }} ?>