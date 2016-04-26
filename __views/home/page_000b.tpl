				<td class="icons center">
					{if $access.p_update}<a class="upd" rel="#f{$menu}" href="#f{$menu}" onclick="go_form(this, event)" title="Edit Data"></a>{/if}
					{if $access.p_delete}<a class="del" rel="#f{$menu}" href="#f{$menu}" onclick="go_del(this, event)" title="Hapus Data"></a>{/if}
				</td>
			</tr>
		{/foreach}
	{else}
		<tr><td colspan="{count($datx[0])+2}" class="center">-- DATA YANG ANDA CARI TIDAK TERSEDIA --</td></tr>
	{/if}
{else}
	<tr><td colspan="{count($datx[0])+2}" class="center">-- ANDA TIDAK BERHAK MEMBACA DATA INI --</td></tr>
{/if}