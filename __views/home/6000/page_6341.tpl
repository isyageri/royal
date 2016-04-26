<div class="title-rpt">
	<legend>Detail Pembayaran Nota</legend>
	<br/>
	<div>
		<table>
			<tbody>
				<tr>
					<td>Tanggal Nota</td>
					<td> : </td>
					<td>
						<strong>{$opt_nota_all.0.date_nota}</strong>
					</td>
				</tr>
				<tr>
					<td>Pembeli</td>
					<td> : </td>
					<td>
						<strong>{$opt_nota_all.0.nm}</strong>
					</td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>
<br/>
<br/>
<table id="t{$menu}" cellspacing="0" cellpadding="0" class="cgrid">{include file="home/6000/page_{$menu}_dat.tpl"}</table>

{if !$tblo}
	<form class="long hide">
		<input type="hidden" id="csrf" name="csrf_token" value="{$csrf}" />
		<fieldset id="f{$menu}" class="expose">
			<legend class="just_upd">Edit Detail Pembayaran Nota</legend>
			<legend class="just_add">Add Detail Pembayaran Nota</legend>
			<label>&nbsp;</label><label class="hide">nota_id</label><input type="text" class="postit nota_id readonly short hide fix" readonly value="{$opt_nota_all.0.nota_id}" /><br />
			<label>&nbsp;</label><label class="hide">bayar_nota_id</label><input type="text" class="postit bayar_nota_id readonly short hide" id="pkey" readonly value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Tanggal Pembayaran</label><input type="text" class="postit date_bayar_nota date not_null"  value="" /><br />
			<label>&nbsp;</label><label class="mandatory">Jumlah Pembayaran</label><input type="text" class="postit debet not_null"  onkeyup="f_numbers(this)" value="" /><br />
			<label>&nbsp;</label><label  class="mandatory">Keterangan</label><textarea type="text" class="postit note wide not_null"  value=""></textarea><br />
			
			{include file="home/page_btn_crud.tpl"}
		</fieldset>
	</form>
{/if}
