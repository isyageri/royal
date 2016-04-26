<?php /* Smarty version Smarty-3.1.7, created on 2016-04-25 21:36:27
         compiled from "__views/client/200/page_201.tpl" */ ?>
<?php /*%%SmartyHeaderCode:970466337571e2b6b2f29a2-03651778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e2d868204ef53f0d3efefa605e7141eb1e96964' => 
    array (
      0 => '__views/client/200/page_201.tpl',
      1 => 1430327110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '970466337571e2b6b2f29a2-03651778',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'csrf' => 0,
    'auth' => 0,
    'CorpBank' => 0,
    'dt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_571e2b6b38d58',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e2b6b38d58')) {function content_571e2b6b38d58($_smarty_tpl) {?><div id="content-title">Deposit</div>
<div class="menu-desc">
Below is a summary of your account details. Please note that the Account Balance does not include floating balances on open positions. Please log into your trading station for your real time equity balance.
</div>

<h2 class="rib-sub-title">Deposit History</h2>
<table id="t<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" cellspacing="0" cellpadding="0" class="client-table"><?php echo $_smarty_tpl->getSubTemplate ("client/200/page_".($_smarty_tpl->tpl_vars['menu']->value)."_dat.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</table>

<form id="f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
" class="hide" method="post" enctype="multipart/form-data">
	<input type="hidden" class="keepit" id="csrf" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" />
	<input type="hidden" class="postit AccountID keepit" value="<?php echo $_smarty_tpl->tpl_vars['auth']->value['AccountID'];?>
" name="AccountID" id="AccountID" />
	<input type="hidden" class="postit DepositID" value="" name="DepositID" id="DepositID" />
	
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankName" class="mandatory">Bank Name</label></div>
			<input id="BankName" name="BankName" value="" class="postit BankName rib-input-normal ro" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankAccountName" class="mandatory">Sender Name</label></div>
			<input id="BankAccountName" name="BankAccountName" value="" class="postit BankAccountName ro rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="BankDestinationID" class="mandatory">Transfer to</label></div>
			<select id="BankDestinationID" name="BankDestinationID" class="postit BankDestinationID rib-input-normal">
				<?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CorpBank']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value){
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dt']->value['nm'];?>
</option>
				<?php } ?>
			</select>
			
	
		</div>
		<div class="fr rib-input-normal" >
			<div  class="clear"><label >&nbsp;</label></div>
			<a href="#" class="confirm rib-save hastable no-validate" data-url="#chome/confirm/201/bankinfo/" style="font-size:7pt;padding-top:2px;padding-bottom:2px;margin-top:2px;">Bank Info</a>
		</div>
		
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="TransferEvidence" class="mandatory">Confirm your deposit ( Transfer Evidence )</label></div>
			<input type="file" id="TransferEvidence" name="TransferEvidence" class="postit TransferEvidence rib-input-normal" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Deposit" class="mandatory">Deposit (USD)</label></div>
			<input id="Deposit" name="Deposit" value="" class="postit Deposit ro rib-input-normal number" />
		</div>
	</div>
	<div class="clear rib-input-wrapper">
		<div class="fl rib-input-normal" >
			<div  class="clear"><label for="Remark">Remark</label></div>
			<input id="Remark" name="Remark" value="" class="postit Remark ro rib-input-normal" />
		</div>
	</div>
	<a href="#" class="button rib-save hastable" data-url="#chome/crud/f<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
/" style="margin-top:10px;">Save</a>
	<a href="#" class="button" onclick="back(this)" style="margin-top:10px;">Back</a>
</form>

<?php }} ?>