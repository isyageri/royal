<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>{$corp_name}</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="ROBOTS" content="INDEX, FOLLOW"/>
	<meta name="description" content="Investment and Business"/>
	<meta name="keywords" content="Investment,Business,Royal,Money"/>
	<meta name="author" content="Waterfall" />
	<link rel="shortcut icon" href="{$host}favicon.ico" type="image/png" />
	<link rel="stylesheet" href="{$host}__assets/css/ace-admin/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="{$host}__assets/css/clientpage.css?{$smarty.now}"/>
	
	<link rel="stylesheet" type="text/css" href="{$host}__assets/css/style.min.css"/>
    {*<link rel="stylesheet" href="{$host}__assets/css/ui/navigationclient.css" type="text/css" />*}
	<link rel="stylesheet" href="{$host}__assets/lib/sweet/sweet-alert.css">
	<!--[if IE 6]><link rel="stylesheet" charset="utf-8" type="text/css" href="{$host}__assets/css/bootstrap-3.0.0/bootstrap.min.css" media="screen" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" charset="utf-8" type="text/css" href="{$host}__assets/css/bootstrap-3.0.0/bootstrap-theme.min.css" media="screen" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" charset="utf-8" type="text/css" href="{$host}__assets/css/wf-ie.css" media="screen" /><![endif]-->
	<link rel="stylesheet" type="text/css" href="{$host}__assets/css/jquery.ui.button.css">
    {*<link rel="stylesheet" type="text/css" href="{$host}__assets/css/jquery-ui.css">*}
    
	<link rel="stylesheet" type="text/css" href="{$host}__assets/css/datepicker.css">
	{*<link rel="stylesheet" type="text/css" href="{$host}__assets/css/jquery.ui.datepicker.css">*}
    
    
    
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

                    <a href="{$host}" data-track-text="Logo">
                        <img class="brand-logo" src="{$host}__assets/images/logo.png">
                    </a>
                    <div class="main-navigation">
                       <ul id="main-navigation-menu" class="main-navigation-menu menu-1deep">
                            <li class="divider hidden-xs hidden-md"></li>
                                    {foreach name=data from=$mmenu item=mn}
									<li id="menu_{$mn.MenuID}" class="{if $mn.IsParent==1}IsParent{/if}">
										<a href="#" >{$mn.Menu}</a>
										{if $mn.IsParent==1}
											<ul class="menu-2deep clientpage">
												<li>
												<a href="#"> </a>
												<ul class="menu-3deep">
											{foreach name=dt from=$mn.child item=cmn}
												<li id="menu_{$cmn.MenuID}" class="mmenu">
													<a href="#{$cmn.Controller}page/{$cmn.MenuID}">{$cmn.Menu}</a>
												</li>
											{/foreach}
												</ul>
												</li>
											</ul>
										{/if}
										
									</li>
									{/foreach}

                        </ul>
						  

                        <ul class="main-navigation-register-menu">
                            <li>
                                <a href="{$host}" data-mobile-url="" class="button" title="home">Home</a>
                            </li>
							<li>
                                <a href="{$host}index.php/auth/o" data-mobile-url="" class="button" title="logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
	
</div>

<div id="wf-container">
{include file="client/100/page_101.tpl"}
</div>


<div class="hide">
	{$menuHTML}
	<div id="host-rib">{$host}</div>
</div>

	<script type="text/javascript" src="{$host}__assets/js/jquery/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="{$host}__assets/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="{$host}__assets/js/jquery.mousewheel.js"></script>

	<script type="text/javascript" src="{$host}__assets/js/fusioncharts/js/fusioncharts.js"></script>
	<script type="text/javascript" src="{$host}__assets/js/fusioncharts/js/themes/fusioncharts.theme.zune.js"></script>
	<script src="{$host}__assets/lib/sweet/sweet-alert.js"></script>
	<script type="text/javascript" src="{$host}__assets/js/client_royal.js"></script>
	<script type="text/javascript" src="{$host}__assets/js/bootstrap.min.js"></script>
	{if !$auth}
		<script type="text/javascript" src="{$host}__assets/js/enc_md5.min.js"></script>
		<script type="text/javascript" src="{$host}__assets/js/enc_sha256.js"></script>
	{/if}
	<script type="text/javascript" src="{$host}__assets/js/additionalScript.js"></script>
	
	<script type="text/javascript" src="{$host}__assets/js/bootstrap-datepicker.js"></script>
	{*<script type="text/javascript" src="{$host}__assets/js/jquery-ui-1.10.4.min.js"></script>*}
	



</body>
</html>