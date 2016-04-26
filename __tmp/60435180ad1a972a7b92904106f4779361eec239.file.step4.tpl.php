<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 20:25:02
         compiled from "__views/auth/step4.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41820658571e1aaef02401-34137931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60435180ad1a972a7b92904106f4779361eec239' => 
    array (
      0 => '__views/auth/step4.tpl',
      1 => 1424507540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41820658571e1aaef02401-34137931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SecurityQuestion' => 0,
    'dt' => 0,
    'host' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e1aaf121f8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e1aaf121f8')) {function content_571e1aaf121f8($_smarty_tpl) {?><h3 class="lighter block green">Security and Agreements</h3>

<form class="form-horizontal" id="validation-form4" method="get" />
	<div class="control-group">
		<label class="control-label" for="SecurityQuestionID">Security Question :</label>
		<div class="controls">
			<span class="span6">
			
				<select class="postit SecurityQuestionID span6" id="SecurityQuestionID" name="SecurityQuestionID">
					<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SecurityQuestion']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>

					<?php } ?>
				</select>
			</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="SecurityQuestionAnswer">Security Answer :</label>
		<div class="controls">
			<div class="span6">
				<input type="text" name="SecurityQuestionAnswer" id="SecurityQuestionAnswer" class="postit SecurityQuestionAnswer span6" />
			</div>
		</div>
	</div>

</form>
<h3 class="lighter block green">Attached Documentation</h3>
<div class="row-fluid">
	<p>If you reside in the United Kingdom, your account application will be reviewed by Royal Investment. We will contact you if additional documentation is required. If you do not reside in the United Kingdom, please attach the following documents. If completing a joint
	account application, please submit requested documentation for both account holders.</p>
	<p>You may also submit your documents as scanned images (jpg, gif, doc, pdf -- no password protection please) to our new accounts departement at [Royal Investment email] or via fax to [Royal Investment fax].
		<ul>
			<li>One form of government issued photo identification (ie, driver's lisence, national ID card) which shows the residential address</li>
			<li>Please note, in some cases you may be requested to submit additional documentation once application has been reviewed</li>
		</ul>
	</p>
</div>
<h3 class="lighter block green">Term of Use and Disclaimer</h3>
<div class="row-fluid">
	<pre>
Important Notice to Investors

Read this page before proceeding. 
The material on this website is aimed at and may only be used by appropriately authorised 
and regulated investment professionals in certain jurisdictions. 
The Royal Trade And Business Investments will not be liable for any damages or losses suffered by 
private/individual/group clients accessing this website. 

THIS WEBSITE IS DIRECTED EXCLUSIVELY TO CERTAIN TYPES OF PROFESSIONAL INVESTORS AS DEFINED BELOW. 

Definition of a Professional Investor: 
1. any recognized exchange company, recognized clearing house, recognized exchange controller or recognized investor compensation company, 
   or any person authorized to provide automated trading services under section of the Securities and Futures Ordinance.
2. any intermediary, or any other person carrying on the business of the provision of investment services. 
3. any authorized financial institution, or any bank which is not an authorized financial institution.
4. any insurer authorized under the Insurance Companies Ordinance (Cap 41), or any other person carrying on insurance business.
5. any scheme which is a collective investment scheme.
6. or any person by whom any such scheme is operated;
   1. is a registered scheme as defined in section 2(1) of the Occupational Retirement Schemes Ordinance (Cap 426); or 
   2. is an offshore scheme as defined in section 2(1) of that Ordinance and, 
      if it is regulated under the law of the place in which it is domiciled, is permitted to be operated under the law of such place, 
7. or any person who, in relation to any such scheme, is an administrator as defined in section 2(1) of that Ordinance; 
8. any government (other than a municipal government authority), any institution which performs the functions of a central bank, 
   or any multilateral agency.
9. a holding company which holds all the issued share capital of- 
   1. an intermediary, or any other person carrying on the business of the provision of investment services and
      regulated under the law of any place.
   2. an authorized financial institution, or any bank which is not an authorized financial institution but 
      is regulated under the law of any place.

BY PROCEEDING INTO THIS WEBSITE: 
You represent and warrant that you are a Professional Investor as defined above and accessing this website from within a jurisdiction in which the use of this website by investment professionals is not under local laws and regulations. 

	</pre>
	<div class="span12">Please review the Customer Agreement and click '<strong>Yes</strong>' if you agree to such terms</div>
	<form class="form-horizontal" id="validation-form5" method="get" >
		<div class="control-group">
			<label>I have read, understood, and agree the term of business</label>

				<span class="span12">
					<div class="control-group">
						<div class="controls control-flat-radio">
							<input class="postit AgreeTerm" name="AgreeTerm" value="1" type="radio"/>
							<span class="lbl"  style="margin-right:10px;"> Yes</span>
							<input class="postit AgreeTerm" name="AgreeTerm" value="0" type="radio" />
							<span class="lbl"> No</span>
						</div>
					</div>

				</span>
			
		</div>
		<div class="control-group">
			
				
						<img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/securimage/securimage_show.php?sid=<<?php ?>?php echo md5(uniqid()) ?<?php ?>>" alt="CAPTCHA Image" align="left" />
						<object class="fl" type="application/x-shockwave-flash" data="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/securimage/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/securimage/images/audio_icon.ico&amp;audio_file=<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/securimage/securimage_play.php" height="32" width="32">
						<param name="movie" value="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/securimage/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/securimage/images/audio_icon.ico&amp;audio_file=<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/securimage/securimage_play.php" />
						</object>
						&nbsp;
						<a class="fl" tabindex="-1" style="border-style: none;margin-left:5px;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = '<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/securimage/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
__assets/lib/securimage/images/refresh.png" alt="Reload Image" height="32" width="32" onclick="this.blur()" align="bottom" border="0" /></a><br />
						<br/>
						<strong>Enter Code*:</strong><br />
						<input type="text" class="postit ct_captcha" name="ct_captcha" size="12" maxlength="8" />
				
			
		</div>
		
	</form>
</div>



<?php }} ?>