<thead>
	<tr><th width="20">NO</th>
		<th>GROUP</th>
		<th>DESCRIPTION</th>
		<th width="100">STATUS</th>
		{if $prop != "xls"}<th class="icon crud"></th>{/if}
	</tr>
</thead>
{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		{foreach name=data from=$datx.dat item=td}
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			{if $prop != "xls"}<td class="usergroup_id pkey hide">{$td.usergroup_id}</td>{/if}
			<td class="user_group center">{$td.user_group}</td>
			<td class="user_group_desc">{$td.user_group_desc}</td>
			{if $prop != "xls"}<td class="is_active hide">{$td.is_active}</td>{/if}
			<td class="status center bold {if $td.is_active=='f'}red {/if} blue">{$td.status}</td>
			<td class="icons center">
				{if $access.p_update==1 and $td.usergroup_id !=1}<a class="upd" rel="#f{$menu}" href="#f{$menu}" title="Edit Data"></a>{/if}
				{if $access.p_delete==1  and $td.usergroup_id !=1}<a class="del" rel="#f{$menu}" href="#f{$menu}" title="Hapus Data"></a>{/if}
			</td>
		</tr>
		{/foreach}
		<tr><td colspan="5" class="bold right red">TOTAL GROUP: {$datx.tot|numeric_format:0}</td></tr>
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=5}