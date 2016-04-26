<div style="margin:0 50px; height:500px;">
	<form class="long" method="post" action="{$url}/999">
		<fieldset class="expose">
			<legend>Ganti Kata Sandi</legend><br>
			<div class="shadow" style="font-size:16pt; font-weight:bold; color:{if $msg.err}red{else}blue{/if}">{$msg.msg}</div><br />
			<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
			<label>User ID</label><input type="text" class="wide readonly"    readonly value="{$auth.user_uid}"/><br />
			<label>User Name</label><input type="text" class="wide readonly"  readonly value="{$auth.user_name}"/><br />
			<label class="mandatory">Sandi Lama</label><input type="password" class="wide" name="old" /><br />
			<label class="mandatory">Sandi Baru</label><input type="password" class="wide" name="new" /><br />
			<label class="mandatory">Ulangi Sandi Baru</label><input type="password" class="wide" name="con" /><br />
			<label></label><button type="submit">Submit</button>
		</fieldset>	
	</form>
</div>