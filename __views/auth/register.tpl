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
		<link rel="stylesheet" href="{$host}__assets/lib/sweet/sweet-alert.css">
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="a{$host}__assets/css/ace-admin/ace-ie.min.css" />
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="{$host}__assets/css/clientpage.css?{$smarty.now}"/>
		<!--<link rel="stylesheet" type="text/css" href="{$host}__assets/css/jquery.ui.datepicker.css">-->
		<link rel="stylesheet" type="text/css" href="{$host}__assets/css/datepicker.css">
		
		<link rel="stylesheet" type="text/css" href="{$host}__assets/css/jquery.ui.button.css">
		<link rel="stylesheet" type="text/css" href="{$host}__assets/css/jquery-ui.css">
		
	
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
							{include file="auth/step1.tpl"}
						</div>
						<div class="step-pane" id="step2">
							{include file="auth/step2.tpl"}
						</div>
						<div class="step-pane" id="step3">
							{include file="auth/step3.tpl"}
						</div>
						<div class="step-pane" id="step4">
							{include file="auth/step4.tpl"}
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
	<div id="host-rib">{$host}</div>
</div>
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
	<!--<script type="text/javascript" src="{$host}__assets/js/jquery-ui-1.10.4.min.js"></script>-->
	<script type="text/javascript" src="{$host}__assets/js/bootstrap-datepicker.js"></script>
	
	<script type="text/javascript" src="{$host}__assets/js/jquery-birthday-picker.js"></script>
	<script type="text/javascript" src="{$host}__assets/js/jquery-birthday-picker.min.js"></script>
	
	<script src="{$host}__assets/js/ace-elements.min.js"></script>
	<script src="{$host}__assets/js/ace.min.js"></script>
	<script src="{$host}__assets/js/jquery.form.js"></script>
	<script src="{$host}__assets/js/rib-registration-ace.js"></script>
	<script src="{$host}__assets/lib/sweet/sweet-alert.js"></script>
	
		
	{if !$auth}
		<script type="text/javascript" src="{$host}__assets/js/enc_md5.min.js"></script>
		<script type="text/javascript" src="{$host}__assets/js/enc_sha256.js"></script>
	{/if}
	
	
</body>
</html>


