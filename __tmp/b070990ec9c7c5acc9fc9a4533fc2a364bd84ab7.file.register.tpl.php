<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 20:25:02
         compiled from "__views/auth/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1791401625571e1aae64b1c0-33237520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b070990ec9c7c5acc9fc9a4533fc2a364bd84ab7' => 
    array (
      0 => '__views/auth/register.tpl',
      1 => 1460304980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1791401625571e1aae64b1c0-33237520',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'corp_name' => 0,
    'host' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e1aaead143',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e1aaead143')) {function content_571e1aaead143($_smarty_tpl) {?><!DOCTYPE html>
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
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.css">
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="a<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/ace-admin/ace-ie.min.css" />
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/clientpage.css?<?php echo time();?>
"/>
		<!--<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/jquery.ui.datepicker.css">-->
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/datepicker.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/jquery.ui.button.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/css/jquery-ui.css">
		
	
</head>
<body>
<div id="wf-container">
	
	<div class="widget-box">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="lighter">Royal Investment Registration</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class="row-fluid">
					<div id="fuelux-wizard" class="row-fluid" data-target="#step-container">
						<ul class="wizard-steps">
							<li data-target="#step1" class="active">
								<span class="step">1</span>
								<span class="title">Personal Contact Information</span>
							</li>

							<li data-target="#step2">
								<span class="step">2</span>
								<span class="title">Employment Information</span>
							</li>

							<li data-target="#step3">
								<span class="step">3</span>
								<span class="title">Financial and Information</span>
							</li>

							<li data-target="#step4">
								<span class="step">4</span>
								<span class="title">Security and Agreements</span>
							</li>
						</ul>
					</div>

					<hr />
					<div class="step-content row-fluid position-relative" id="step-container">
						<div class="step-pane active" id="step1">
							<?php echo $_smarty_tpl->getSubTemplate ("auth/step1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						</div>
						<div class="step-pane" id="step2">
							<?php echo $_smarty_tpl->getSubTemplate ("auth/step2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						</div>
						<div class="step-pane" id="step3">
							<?php echo $_smarty_tpl->getSubTemplate ("auth/step3.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						</div>
						<div class="step-pane" id="step4">
							<?php echo $_smarty_tpl->getSubTemplate ("auth/step4.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						</div>
					</div>

					<hr />
					<div class="row-fluid wizard-actions">
						<button class="btn btn-prev">
							<i class="icon-arrow-left"></i>
							Prev
						</button>

						<button class="btn btn-success btn-next" data-last="Finish ">
							Next
							<i class="icon-arrow-right icon-on-right"></i>
						</button>
					</div>
				</div>
			</div><!--/widget-main-->
		</div><!--/widget-body-->
	</div>
				

	<div id="modal-wizard" class="modal hide">
		<div class="modal-header" data-target="#modal-step-contents">
			<ul class="wizard-steps clearfix">
				<li data-target="#modal-step1" class="active">
					<span class="step">1</span>
					<span class="title">Personal Contact Information</span>
				</li>

				<li data-target="#modal-step2">
					<span class="step">2</span>
					<span class="title">Employment Information</span>
				</li>

				<li data-target="#modal-step3">
					<span class="step">3</span>
					<span class="title">Financial and Information</span>
				</li>

				<li data-target="#modal-step4">
					<span class="step">4</span>
					<span class="title">Security and Agreements</span>
				</li>
			</ul>
		</div>

		<div class="modal-body step-content" id="modal-step-contents">
			<div class="step-pane active" id="modal-step1">
				<div class="center">
					<h4 class="blue">Step 1</h4>
				</div>
			</div>

			<div class="step-pane" id="modal-step2">
				<div class="center">
					<h4 class="blue">Step 2</h4>
				</div>
			</div>

			<div class="step-pane" id="modal-step3">
				<div class="center">
					<h4 class="blue">Step 3</h4>
				</div>
			</div>

			<div class="step-pane" id="modal-step4">
				<div class="center">
					<h4 class="blue">Step 4</h4>
				</div>
			</div>
		</div>

		<div class="modal-footer wizard-actions">
			<button class="btn btn-small btn-prev">
				<i class="icon-arrow-left"></i>
				Prev
			</button>

			<button class="btn btn-success btn-small btn-next" data-last="Finish ">
				Next
				<i class="icon-arrow-right icon-on-right"></i>
			</button>

			<button class="btn btn-danger btn-small pull-left" data-dismiss="modal">
				<i class="icon-remove"></i>
				Cancel
			</button>
		</div>
	</div><!--PAGE CONTENT ENDS-->
		
</div>
<div class="hide">
	<div id="host-rib"><?php echo $_smarty_tpl->tpl_vars['host']->value;?>
</div>
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
	<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery-ui-1.10.4.min.js"></script>-->
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/bootstrap-datepicker.js"></script>
	
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery-birthday-picker.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery-birthday-picker.min.js"></script>
	
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/ace-elements.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/ace.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/jquery.form.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/rib-registration-ace.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/sweet/sweet-alert.js"></script>
	
		
	<?php if (!$_smarty_tpl->tpl_vars['auth']->value){?>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/enc_md5.min.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/js/enc_sha256.js"></script>
	<?php }?>
	
	
</body>
</html>


<?php }} ?>