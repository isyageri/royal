<!DOCTYPE html>
<html lang="en-GB">
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
    <link rel="stylesheet" href="{$host}__assets/css/ui/layout.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/modules.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/typography.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/content.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/button.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/theme.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/thickbox.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/fck.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/navigation.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/footer.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/cookie.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/breadcrumbs.css" type="text/css" />
    {*<link rel="stylesheet" href="{$host}__assets/css/royal.css" type="text/css" />*}
    <link rel="stylesheet" type="text/css" href="{$host}__assets/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="{$host}__assets/css/font-awesome.min.css"/>

</head>
<body class='personal Campaign'>
<div id="main-header">

<header>
<div class="top-navigation">
    {*<ul>*}
        {*<li class="active"><a href="#"><span>Individual</span></a></li>*}
        {*<li><a href="#" title="Individual"><span>Community</span></a></li>*}
        {*<li><a href="#" title="Private"><span>Private</span></a></li>*}
        {*<li><a href="#" title="Retirement & Saving"><span>Retirement & Saving</span></a></li>*}
        {*<li class="top-navigation-accessability">*}
            {*<a href="#" class="" title="Accessibility">*}
            {*</a>*}
        {*</li>*}
    {*</ul>*}
</div>
<div class="main-header">
<div class="main-navigation-toggle hidden-lg">
    <a href="#" id="navigation-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
</div>
<a href='{$host}'>
    <img class="brand-logo" height='46' width='269' src='{$host}__assets/images/logo.png'/>
</a>
    <div class="main-navigation">
        <ul id="main-navigation-menu" class="main-navigation-menu menu-1deep" style="width: auto;">
            <li class="divider hidden-xs hidden-md"></li>
            <li>
                <a href="{$host}index.php/whoweare">Who We Are</a>
            </li>
            <li>
                <a href="{$host}index.php/whatwedo">What We Do</a>
                <ul class="menu-2deep">
                    <li>
                        <a href="#">What We Do</a>
                        <ul class="menu-3deep">
                            <li>
                                <a href="{$host}index.php/whatwedo" title="Private Wealth Management">
                                    Private Wealth Management</a>
                            </li>
                            <li>
                                <a href="{$host}index.php/whatwedo" title="Retirement Assets Management And Education Saving Program">
                                    Retirement Asset Management And Education Savings Program</a>
                            </li>
                            <li>
                                <a href="{$host}index.php/portfolio" title="Premier loan">
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
                <a href="{$host}index.php/whatweoffer">What We Offer</a>
                <ul class="menu-2deep">
                    <li>
                        <a href="#">What We Offer</a>
                        <ul class="menu-3deep">
                            {foreach name=data from=$whatweoffer item=wwo}
                                <li>
                                    <a href="{$host}index.php/{$wwo.Controller}" title="Individual Client / Basic Account">
                                        {$wwo.Menu}</a>
                                </li>

                            {/foreach}
                        </ul>
                    </li>

                    <li class="important-information hidden-xs hidden-md">
                        <ul>
                            {*<li><span>&nbsp;</span></li>*}
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{$host}index.php/contactus">Contact Us</a>
            </li>
            <li>
                <a href="{$host}index.php/faq">FAQ</a>
            </li>

        </ul>
        <ul class="main-navigation-register-menu">
            <li>
                <a href="{$host}index.php/chome/Login" class="button" title="Log">Log in</a>
            </li>
            <li>
                <a href="{$host}index.php/chome/RegisterAccountType" class="hidden-xs" title="Register">Register</a>
            </li>
            <li class="divider hidden-xs"></li>
            <li>
                <a href="#" id="search-toggle">null</a>
            </li>
        </ul>
    </div>
<div id="search-bar">
    <form name="searchForm" id="searchForm" action='' method="get">
        <input name="nlpq" type="search" id="q" placeholder='Your keyword here'>
        <input type="submit" id="qsubmit" value='Search'>
        <a class="close" href="#">Close</a>
    </form>
</div>
</div>
</header>
</div>
<div class="page">
<div class="inner-content-title">
    <i class="fa fa-home"></i>
    <span>{$content_title}</span>
</div>
<div class="content" style="width:940px;">
    <div class="content-list-desc">
        <div class="container"> 
            <div class="columns">
			{foreach name=data from=$whoweare item=wwa}
			{$wwa.Description}
			{/foreach}
            </div>
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

</body>
</html>
