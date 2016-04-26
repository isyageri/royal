{if !$tblo}
	<form id="fsearch" class="long hide">
		<fieldset class="expose">
			<legend>Data Filter</legend>
				<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
				<label>User ID</label><input type="text" class="postit user_uid long" value="" /><br />
				<label>Activity</label><select class="postit activity" title="Group">
					<option value="">-- Options --</option>
					<option value="Login">LOGIN</option>
					<option value="Change Password">CHANGE PASSWORD</option>
					<option value="Add Data">ADD DATA</option>
					<option value="Update Data">UPDATE DATA</option>
					<option value="Delete Data">DELETE DATA</option>
				</select> <br />
				<label>Activity Date</label>
				<input class="postit ts1 date" readonly value="{if isset($post.ts1)}{$post.ts1|date_format:'%Y-%m-%d'}{/if}" /> s/d 
				<input class="postit ts2 date" readonly value="{if isset($post.ts2)}{$post.ts2|date_format:'%Y-%m-%d'}{/if}" /><br />
			<label></label><button type="reset">Reset</button>
			<br />
				<center>{include file="home/page_btn_search.tpl"}</center>
		</fieldset>
	</form>
{/if}
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/9000/page_{$menu}_dat.tpl"}</table>