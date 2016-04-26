{if $prop neq 'xls'}
<tfoot>
	<tr><td colspan="{$col}" class="center">
		{if $access.p_retrieve==0}
			-- ANDA TIDAK BERHAK MEMBACA DATA INI --
		{elseif !$datx.dat}
			-- DATA YANG ANDA CARI TIDAK TERSEDIA --
		{else}
			{include file="home/page_btn_nav.tpl"}
		{/if}
		</td>
	</tr>
	<tr>
		<td colspan="{$col}" class="icons right" style="background-color:#BBBBBB">
			
		</td>
	</tr>
</tfoot>
{/if}