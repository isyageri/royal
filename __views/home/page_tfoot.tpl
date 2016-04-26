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
			{if $access.p_create==1}
			<a class="add easyui-linkbutton bold"  rel="#f{$menu}" href="#f{$menu}" iconCls="icon-add">Create New</a>
			{/if}
		</td>
	</tr>
</tfoot>
{/if}