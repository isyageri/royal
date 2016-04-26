<thead>
	<tr><th width="20">No</th>
		<th width="100">User ID</th>
		<th>Name</th>
		<th width="100">Access Role</th>
		<th width="100">Created Date</th>
		<th width="100">Created By</th>
		<th width="75">Status</th>
		{if $prop != "xls"}<th class="icon crud"></th>{/if}
	</tr>
</thead>
{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		{foreach name=data from=$datx.dat item=td}
		<tr class="{cycle values='even,odds'} hover">
			<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
			{if $prop != "xls"}<td class="usex_uid pkey hide">{$td.usex_uid}</td>{/if}
			<td class="user_uid">{$td.user_uid}</td>
			<td class="user_name">{$td.user_name}</td>
			{if $prop != "xls"}<td class="usergroup_id hide">{$td.usergroup_id}</td>{/if}
			<td class="user_group center">{$td.user_group}</td>
			<td class="created_date center">{$td.created_date|date_format:'%d-%m-%Y %H:%M:%S'}</td>
			<td class="createdby center">{$td.createdby}</td>
			{if $prop != "xls"}<td class="user_status_uid hide">{$td.user_status_uid}</td>{/if}
			<td class="status center  bold {if $td.is_active eq 'f'}red {/if} blue">{$td.status}</td>
			<td class="icons center">
				{if $access.p_update==1 and $td.usex_uid !=1}<a class="upd" rel="#f{$menu}" href="#f{$menu}" title="Edit Data"></a>{/if}
			</td>
		</tr>
		{/foreach}
		<tr><td colspan="8" class="bold right red">TOTAL USER: {$datx.tot|numeric_format:0}</td></tr>
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=8}