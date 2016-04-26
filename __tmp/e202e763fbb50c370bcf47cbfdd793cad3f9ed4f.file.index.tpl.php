<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 10:07:21
         compiled from "__views/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:589316623571dde49c7cfa7-33758911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e202e763fbb50c370bcf47cbfdd793cad3f9ed4f' => 
    array (
      0 => '__views/index.tpl',
      1 => 1431490130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '589316623571dde49c7cfa7-33758911',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'corp_name' => 0,
    'host' => 0,
    'whatweoffer' => 0,
    'wwo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571dde49e3bcd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571dde49e3bcd')) {function content_571dde49e3bcd($_smarty_tpl) {?><!DOCTYPE html>
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
	
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/royal.css?<?php echo time();?>
"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/style.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/animate.css"/>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.css">
	<!--[if IE 6]><link rel="stylesheet" charset="utf-8" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/bootstrap-3.0.0/bootstrap.min.css" media="screen" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" charset="utf-8" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/bootstrap-3.0.0/bootstrap-theme.min.css" media="screen" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" charset="utf-8" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/wf-ie.css" media="screen" /><![endif]-->


</head>


<body class="personal">
<div id="main-header">
    <header>
        <div class="top-navigation">
            <div class="row">
                <div class="col-16 col-6-xs">
                    
                        
                        
                        
                        
                        

                        
                    
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-16 col-6-xs">
                <div class="main-header">

                    <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
">
                        <img class="brand-logo" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/logo.png">
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
index.php/whatwedo"  title="Retirement Assets Management And Education Saving Program">
                                                    Retirement Asset Management And Education Savings Program</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/portfolio" title="Portfolio">
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
 $_from = $_smarty_tpl->tpl_vars['whatweoffer']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                        <form name="searchForm" id="searchForm" action="#" method="get">
                            <input name="nlpq" type="search" id="q" placeholder="Your keyword here">
                            <input type="submit" id="qsubmit" value="Search">
                            <a class="close" href="#">Close</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<div class="wrapper">
    <div id="main-content">
        <div class="row">
            <div class="col-16">
                <div class="bread-crumbs">
                    <ul>
                        <li><span></span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mboxDefault" style="visibility: visible; display: block;">
            <div class="hero-type-one-block with-image" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/2.jpg);">
                <div class="row">
                    <div class="col-16">
                        <!--hero content-->
                        <div class="hero-support-text with-image">
                            <h2 class="title large-text"> RIB</h2>
                            <div class="subheading">
                                <p>We’ve improved your banking to make it easier to use.</p></div>
                        </div>
                        <div class="nest">
                            <div class="col-2-xl hide-lte-l"></div>
                            <div class="col-12">
                                <div class="nest main-col-wrapper">
                                    <div class="col-12">
                                        <div class="nest col-wrapper">
                                            <div class="col-5 col-6-s col-6-xs right">
                                                <div class="hero-right-col">
                                                    <h3 class="hero-marketing-header"><strong></strong></h3></div>
                                            </div>
                                            <div class="col line-division-blue"></div>
                                            <div class="col-5 col-6-s col-6-xs left">
                                                <div class="hero-left-col">
                                                    <ul class="hero-marketing-list">
                                                <li>Easy To Use</li>
                                                <li>Your money is protected – guaranteed</li>
                                                <li>Secure</li>
                                                </ul></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="center">
                                        <div class="hero-cta">
                                            <div class="button-container">
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/chome/RegisterAccountType" class="button button-lg" title="Explore the app">
                                                    Open An Account</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2-xl hide-lte-l">
                            </div>
                            <!-- hero content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="maincontainer tab-carousel gray-background wow fadeInDown">
            <div class="subheading">
                <p>Grab The Best Opportunity By Making A Great Choice </p>
            </div>

            <div class="chooser-page">
                <div class="span8 site-choose-container">
                    <div class="row-fluid">
                        <div id="siteFinancialAdvisors" class="span4 site-choose"><a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/whatweoffer">Education  <span></span>Savings Program<span class="pointer"></span></a> </div>
                        <div id="siteIndividualInvestors" class="span4 site-choose"><a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/whatweoffer">Private <span>Client</span><span class="pointer"></span></a> </div>
                        
                        <div id="siteInstitutionalInvestors" class="span4 site-choose"><a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/whatweoffer">Retirement Asset <span>Management</span><span class="pointer"></span></a> </div>
                    </div>
                </div>
                    
                    
                        
                        
                    
                    
                        
                        
                    
                    
                        
                        
                    
                    
                        
                        
                    
                
            </div>
        </div>
        <div class="mboxDefault" style="visibility: visible; display: block;">
            <div class="maincontainer tab-carousel gray-background wow fadeInDown">
                <div class="row">
                    <div class="col-16">
                        <div class="nest">
                            <h2 class="title">Investor Relation</h2>
                            <div class="subheading">
                                <p>We will always keep in touch with you, so you won't miss anything you need to know.</p></div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="bx-wrapper" style="max-width: 100%;">
                    <div class="bx-viewport" style="overflow: hidden; position: relative; height: 546px; "><div class="tab-carousel-container js-tab-carousel" style="width: 715%; position: relative; left: 0px;">
                            <section style="float: left; list-style: none; position: relative; width: 1349px;">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/3.jpg" alt="">
                                <div class="row">
                                    <div class="col-16">
                                        <div class="product-pod-tb">
                                            <div class="product-pod-tc">
                                                <div class="product-pod" style="margin-right:-20px; margin-top:-20px">
                                                    
                                                    
                                                                
                                                    
                                                    
                                                        
                                                        
                                                        
                                                            
                                                    
                                                    
                                                        
                                                    
                                                    
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mboxDefault" style="visibility: visible; display: block;">
            <div class="maincontainers tab-carousel gray-background wow fadeInDown">
                <div class="row">
                    <div class="col-16">
                        <div class="nest">
                            <h2 class="title">News Room</h2>
                            <div class="subheading">
                                <p>This is the news all about, don't miss it and you'll find the great benefits of an information.</p></div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="teaser-container" id="news-content" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/images/4.jpg);">
                    <div class="col-lg-8 " id="news-image">
                      
                    </div>

                    <div class="col-lg-4" id="news-text" style="float: right">
                        <div id="news">
                            
                            <div class="news_title">
                                    
                                 <p><i class="fa fa-newspaper-o"></i> NEWSROOM</p>

                            </div>
                            <div class="news_frag">
                                <div id="content_news"><a class="news" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/news">Federal Reserve Drama Not Worth Investors Obsessing Over in 2015 </a> </div>
                                <div id="date_news"><i class="fa fa-clock-o"></i>  Jan 05 2015 |  <i class="fa fa-map-marker"></i> New York  </div>
                                <hr class="news">

                                <div id="content_news"><a class="news" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/news">Federal Reserve Drama Not Worth Investors Obsessing Over in 2015 </a> </div>
                                <div id="date_news"><i class="fa fa-clock-o"></i> Jan 05 2015 | <i class="fa fa-map-marker"></i> New York </div>
                                <hr class="news">

                                <div id="content_news"><a class="news" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/news">Federal Reserve Drama Not Worth Investors Obsessing Over in 2015 </a> </div>
                                <div id="date_news"><i class="fa fa-clock-o"></i> Jan 05 2015 | <i class="fa fa-map-marker"></i> New York </div>
                                <hr class="news">

                                <div id="content_news"><a class="news" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
index.php/news">Federal Reserve Drama Not Worth Investors Obsessing Over in 2015 </a> </div>
                                <div id="date_news"><i class="fa fa-clock-o"></i> Jan 05 2015 | <i class="fa fa-map-marker"></i> New York </div>
                                <hr class="news">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        
            
                
                    
                        
                        
                            
                        
                            
                                
                                    
                                        
                                            
                                                
                                                    
                                                    
                                                
                                                
                                                    
                                                        
                                                
                                            
                                        
                                    
                                
                            
                        
                    
                
            
        
		<div id="pp"></div>
        <div style="clear: both"></div>
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
__assets/js/jquery/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery.mousewheel.js"></script>
	
	
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/royal.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/bootstrap.min.js"></script>

	


<script type="text/javascript">
    $(document).ready(function() {
//        $('.account-type a').hover(function() {
//            $(this).stop().animate({
//                opacity: 1
//            }, 300);
//        }, function() {
//            $(this).stop().animate({
//                opacity: 0.8
//            }, 300);
//        });

        $('#search-toggle').click(function(){
               $('#search-bar').toggle();
        });
        $('.close').click(function(){
            $('#search-bar').toggle();
        });
    });
</script>
<script>
//    new WOW().init();
</script>


</body>
</html><?php }} ?>