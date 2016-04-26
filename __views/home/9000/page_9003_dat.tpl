<thead>
	<tr><th rowspan="2" width="12">No</th>
		<th rowspan="2">Menu</th>
		<th colspan="5">Privilege</th>
	</tr>
	<tr><th width="50">Menu</th>
		<th width="50">View Data</th>
		<th width="50">Create</th>
		<th width="50">Update</th>
		<th width="50">Delete</th>
	</tr>
</thead>
{if $access.p_retrieve==1}
	{if $datx.dat}
		<tbody id="f{$menu}dt">
			{foreach name=data from=$datx.dat key=k item=td}
				<tr class="{cycle values='even,odds'} hover">
					<td class="center">{(($nav.pagec - 1) * {$limit}) + $smarty.foreach.data.iteration}</td>
					<td>{if $td.menu_pid}{$td.menu|indent:10:'&nbsp;'}{else}{$td.menu}{/if}</td>
					<td><input class="postit mmn[{$td.menu_uid}]" type="checkbox" {if $td.p_menu==1} checked{/if}  /></td>
					{if isset($td.menu_pid) || isset($td.is_parent)}
					<td><input class="postit sel[{$td.menu_uid}]" type="checkbox" {if $td.p_retrieve==1}checked{/if} /></td>
					<td>{if $td.menu_flag eq 1}<input class="postit ins[{$td.menu_uid}]" type="checkbox" {if $td.p_create==1}checked{/if} />{/if}</td>
					<td>{if $td.menu_flag eq 1 || $td.menu_flag eq 8}<input class="postit upd[{$td.menu_uid}]" type="checkbox" {if $td.p_update==1}checked{/if} />{/if}</td>
					<td>{if $td.menu_flag eq 1}<input class="postit del[{$td.menu_uid}]" type="checkbox" {if $td.p_delete==1}checked{/if} />{/if}</td>
					{else}
					<td colspan="4">&nbsp;</td>
					{/if}
				</tr>
			{/foreach}
		</tbody>
	{/if}
{/if}
<tfoot>
	{if $access.p_update}
	<tr><td>&nbsp;</td>
		<td colspan="1">
			<button onclick="go_check(true)">Check All</button>
			<button onclick="go_check(false)">UnCheck All</button>
		</td>
		<td colspan="5" class="center">
			<button href="#f{$menu}" class="add" onclick="f_save(this, event, 'add')"> Save </button>
		</td>
	</tr>
	<script type="text/javascript">
		<!--
		f_act = 'add';
		function go_check(check) {
			$('input.postit[type="checkbox"]', $('#f{$menu}dt')).attr('checked', check);
		}
		-->
		</script>
	{/if}
	<tr><td colspan="7" class="center">
		{if $access.p_retrieve==0}
			-- ANDA TIDAK BERHAK MEMBACA DATA INI --
		{/if}
		</td>
	</tr>
</tfoot>