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
	<!--basic styles-->

		<link href="{$host}__assets/css/ace-admin/bootstrap.min.css" rel="stylesheet" />
		<link href="{$host}__assets/css/ace-admin/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="{$host}__assets/css/ace-admin/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="{$host}__assets/css/ace-admin/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<link rel="stylesheet" href="{$host}__assets/css/ace-admin/select2.css" />

		<!--fonts-->

		<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
-->
		<!--ace styles-->

		<link rel="stylesheet" href="{$host}__assets/css/ace-admin/ace.min.css" />
		<link rel="stylesheet" href="{$host}__assets/css/ace-admin/ace-responsive.min.css" />
		<link rel="stylesheet" href="{$host}__assets/css/ace-admin/ace-skins.min.css" />
		<!-- This is what you need -->
		<link rel="stylesheet" href="{$host}__assets/lib/sweet/sweet-alert.css">
		<!--.......................-->
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="a{$host}__assets/css/ace-admin/ace-ie.min.css" />
		<![endif]-->
	<link rel="stylesheet" type="text/css" href="{$host}__assets/css/clientpage.css?{$smarty.now}"/>
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
					<img src="{$host}__assets/images/register/AccountTypeStep2.png" alt="account type"/>
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
			<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
			<legend style="border:none;font-size:11pt;margin-bottom:10px;"><strong>APPLY NOW</strong></legend>
			<label class="control-label" for="name" style="font-size:9pt;">CHOOSE YOUR COUNTRY OF RESIDENCE</label>
			<select id="CountryID" name="CountryID" class="postit CountryID select2" data-placeholder="Click to Choose..." style="width:480px;margin-bottom:10px;">
				{foreach from=$Country item=dt}
					<option value="{$dt.id}" />{$dt.nm}
				{/foreach}
			</select>
			<label class="control-label" style="font-size:9pt;" for="name">CHOOSE YOUR REGISTRATION OPTION</label>
			<select id="AccountTypeID" name="AccountTypeID" class="postit AccountTypeID select2" data-placeholder="Click to Choose..." style="width:480px;margin-bottom:10px;">
				{foreach from=$AccountType item=dt}
					<option value="{$dt.id}" />{$dt.nm}
				{/foreach}
			</select>
			<label class="control-label" style="font-size:9pt;" for="name">CHOOSE YOUR ACCOUNT DENOMINATION</label>
			<select id="CurrencyID" name="CurrencyID" class="postit CurrencyID select2" data-placeholder="Click to Choose..." style="width:480px;margin-bottom:10px;">
				{foreach from=$Currency item=dt}
					<option value="{$dt.id}" />{$dt.nm}
				{/foreach}
				
			</select>
		
				<a class="btn rib-save" data-url="#chome/RegisterForm" style="background-color:#0C51A3;margin:20px 0px 0px 98px;">
					BEGIN APPLICATION
					<i class="icon-arrow-right icon-on-right"></i>
				</a>
			
		</form>
	</div>
</div>
<div id="host-rib" class="hide hidden">{$host}</div>
    <script type="text/javascript">
			window.jQuery || document.write("<script src='{$host}__assets/js/jquery/jquery-2.1.1.min.js'>"+"<"+"/script>");
	</script>
	<!--<script type="text/javascript" src="{$host}__assets/js/jquery/jquery-2.1.1.min.js" >
	<script type="text/javascript" src="{$host}__assets/js/bootstrap-3.0.0/bootstrap.min.js"></script>-->
	<script src="{$host}__assets/js/bootstrap-ace.min.js"></script>
	<script src="{$host}__assets/js/fuelux.wizard.min.js"></script>
	<script src="{$host}__assets/js/jquery.validate.min.js"></script>
	<script src="{$host}__assets/js/additional-methods.min.js"></script>
	<script src="{$host}__assets/js/bootbox.min.js"></script>
	<script src="{$host}__assets/js/jquery.maskedinput.min.js"></script>
	<script src="{$host}__assets/js/select2.min.js"></script>

	<!--ace scripts-->

	<script src="{$host}__assets/js/ace-elements.min.js"></script>
	<script src="{$host}__assets/js/ace.min.js"></script>
	<script src="{$host}__assets/lib/sweet/sweet-alert.js"></script>
	<script type="text/javascript" src="{$host}__assets/js/jquery-ui-1.10.4.min.js"></script>
	<script type="text/javascript" src="{$host}__assets/js/royal.js"></script>
	<script src="{$host}__assets/js/rib-registration-ace.js"></script>
	<script src="{$host}__assets/js/jquery.blockUI.js"></script>
	
	<script type="text/javascript>
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
	
	
		
	{if !$auth}
		<script type="text/javascript" src="{$host}__assets/js/enc_md5.min.js"></script>
		<script type="text/javascript" src="{$host}__assets/js/enc_sha256.js"></script>
	{/if}
	
	
	
	
</body>
</html>


