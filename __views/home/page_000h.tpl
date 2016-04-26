{if $access.p_select}
	{if $datx}
		{foreach name=data from=$datx item=td}
			<tr class="{cycle values='even,odds'} hover">
				<td class="center">{$smarty.foreach.data.iteration}</td>