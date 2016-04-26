<thead>
	<tr>
    <th class="center">No</th>
    <th>Nama File</th>
    <th >Description</th>
    <th class="crud"></th>
  </tr>
</thead>
{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		{foreach name=data from=$datx.dat item=td}
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			<td>{$td.file_name}</td>
			<td>{$td.file_desc}</td>
			<td class="icons center">
			<a rel="#f{$menu}" href="{$host}index.php/home/download/{$td.source}" class="easyui-linkbutton bold" iconCls="icon-save">Download</a>
			</td>
		</tr>
		{/foreach}
		</tbody>
	{/if}
{/if}
{if $prop neq 'xls'}
<tfoot>
	
	<tr>
		<td colspan="4" class="icons right" style="background-color:#BBBBBB">
			
		</td>
	</tr>
	<tr><td colspan="4" class="center">
		{if $access.p_retrieve==0}
			-- ANDA TIDAK BERHAK MEMBACA DATA INI --
		{elseif !$datx.dat}
			-- DATA YANG ANDA CARI TIDAK TERSEDIA --
		{else}
			{include file="home/page_btn_nav.tpl"}
		{/if}
		</td>
	</tr>
</tfoot>
{/if}












	
	

