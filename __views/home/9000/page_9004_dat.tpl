<thead>
	<tr><th width="20">No</th>
		<th width="100">User</th>
		<th width="100">Activity</th>
		<th width="100">Date</th>
		<th>Description</th>
		<th width="150">Agent</th>
		<th width="75">IP Address</th>
		<th width="100">Remark</th>
	</tr>
</thead>
{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody>
		{foreach name=data from=$datx.dat item=td}
			<tr class="{cycle values='even,odds'} hover">
				<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
				<td class="user_uid">{$td.user_uid}</td>
				<td class="activity">{$td.activity}</td>
				<td class="center">{$td.ts|date_format:"%d-%m-%Y %H:%M:%S"}</td>
				<td class="activity_desc">{$td.activity_desc}</td>
				<td class="u_agent">{$td.user_agent_os} - {$td.user_agent} {$td.user_agent_ver}</td>
				<td class="ip_address center">{$td.ip_address}</td>
				<td class="remark center bold {if $td.remark!='Berhasil'}red {/if}blue">{$td.remark}</td>
			</tr>
		{/foreach}
		<tr><td colspan="8" class="bold right red">TOTAL ACTIVITY: {$datx.tot|numeric_format:0}x</td></tr>
		</tbody>
	{/if}
{/if}
{include file="home/page_tfoot.tpl" col=8}